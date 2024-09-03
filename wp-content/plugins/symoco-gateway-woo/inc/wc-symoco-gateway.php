<?php
if (!defined('ABSPATH')) {
	exit;
}

class WC_Symoco_Gateway extends WC_Payment_Gateway {

	public function __construct() {
		$this->setup_properties();

		$this->init_form_fields();
		$this->init_settings();

		$this->supports = array(
			'products'
		);

		$this->title = $this->get_option('title');
		$this->description = $this->get_option('description');
		$this->enabled = $this->get_option('enabled');
		$this->testmode = 'yes' === $this->get_option('testmode');

		$this->access_token = $this->testmode ? $this->get_option('test_publishable_key') : $this->get_option('access_token');
		$this->refresh_token = $this->testmode ? $this->get_option('test_private_key') : $this->get_option('refresh_token');
		$this->expires_at = $this->get_option('expires_at');
		$this->api_url = $this->get_option('api_url');

		// This action hook saves the settings
		add_action('woocommerce_update_options_payment_gateways_' . $this->id, array($this, 'process_admin_options'));

		// We need custom JavaScript to obtain a token
		add_action('wp_enqueue_scripts', array($this, 'payment_scripts'));
		add_action('woocommerce_api_symoco_widget', array($this, 'symoco_widget'));
	}

	public function symoco_widget() {
		require(SYMOCO_PLUGIN_DIR . 'templates/symoco-widget.php');
		die();
	}

	protected function setup_properties() {
		$this->id = 'symoco';
		$this->icon = SYMOCO_PLUGIN_URL . 'assets/img/visa-mastercard.png';
		$this->has_fields = false;
		$this->method_title = 'Symoco Woo';
		$this->method_description = 'Description';
	}

	public function init_form_fields() {
		$this->form_fields = array(
			'enabled' => array(
				'title'       => 'Enable/Disable',
				'label'       => 'Symoco Gateway',
				'type'        => 'checkbox',
				'description' => '',
				'default'     => 'no'
			),
			'title' => array(
				'title'       => 'Title',
				'type'        => 'text',
				'description' => 'This controls the title which the user sees during checkout.',
				'default'     => 'Credit Card',
				'desc_tip'    => true,
			),
			'description' => array(
				'title'       => 'Description',
				'type'        => 'textarea',
				'description' => 'This controls the description which the user sees during checkout.',
				'default'     => 'Pay with your credit card via our super-cool payment gateway.',
			),
			'testmode' => array(
				'title'       => 'Test mode',
				'label'       => 'Enable Test Mode',
				'type'        => 'checkbox',
				'description' => 'Place the payment gateway in test mode using test API keys.',
				'default'     => 'yes',
				'desc_tip'    => true,
			),
			'test_publishable_key' => array(
				'title'       => 'Test Publishable Key',
				'type'        => 'text'
			),
			'test_private_key' => array(
				'title'       => 'Test Private Key',
				'type'        => 'text',
			),
			'access_token' => array(
				'title'       => 'Access token',
				'type'        => 'text'
			),
			'refresh_token' => array(
				'title'       => 'Refresh token',
				'type'        => 'text'
			),
			'expires_at' => array(
				'title'       => 'Expires at',
				'type'        => 'text'
			),
			'api_url' => array(
				'title'       => 'Api URL',
				'type'        => 'select',
				'default' => 'https://api.sandbox.symoco.com/v1/',
				'options' => array(
					'https://api.sandbox.symoco.com/v1/' => 'Sandbox server',
					'https://api.symoco.com/v1/' => 'Production server',
				),
				'default' => 'https://api.symoco.com/v1/'
			)
		);
	}

	// public function payment_fields() {
	// }

	public function payment_scripts() {
		wp_register_script('symoco_pay', SYMOCO_PLUGIN_URL . '/assets/js/pay.js');
		// wp_register_script('symoco_send_order', SYMOCO_PLUGIN_URL . '/assets/js/symoco_send_order.js');
		wp_enqueue_script('symoco_pay');
		// wp_enqueue_script('symoco_send_order');
	}

	public function validate_fields() {
	}

	public function process_payment($order_id) {
		$order = wc_get_order($order_id);
		if ($order->get_total() > 0) {
			$response = $this->symoco_payment_processing($order);
			// echo "<hr /><h1>DEBUG</h1><pre>";
			// var_dump($response);
			// echo "</pre>";
			// die();
			if (json_decode($response, true)['error']['code'] == 0) {
				// $order->payment_complete();
				// $order->reduce_order_stock();
				// $order->add_order_note('Thanks for your payment!!!!', true);
				$order->update_status('pending');
				if ($order->get_currency() === "USD") {
					$order->set_currency('KZT');
					$order->save();
				}
				return array(
					'result'   => 'success',
					// 'url' => json_decode($response, true)['object']['payUrl'],
					// 'redirect' => home_url('/wc-api/symoco_widget?') . http_build_query($query)
					'redirect' => json_decode($response, true)['object']['payUrl']
					// 'redirect' => $this->get_return_url($order),
				);
			}
		}
	}

	private function symoco_payment_processing($order) {
		// $this->update_option('test_publishable_key', 'qwe');
		// echo "<hr /><h1>DEBUG</h1><pre>";
		// var_dump($this->get_option('test_publishable_key'));
		// echo "</pre>";
		// die();

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			$orderId = 'Order #' . $order->ID;
			$productPrice = $order->get_total();
			$currency = $order->currency;
			if ($currency === 'USD') {
				if (function_exists('convert_kzt_to_usd')) {
					$productPrice = convert_kzt_to_usd(intval($productPrice));
				} else {
					$productPrice = number_format(round($productPrice / 450, 2), 2);
				}
			}


			$name = $_POST['billing_first_name'];
			$last_name = $_POST['billing_last_name'];
			$country = $_POST['billing_country'];
			$address = $_POST['billing_address_1'];
			$city = $_POST['billing_city'];
			$state = $_POST['billing_state'];
			$postcode = $_POST['billing_postcode'];
			$phone = $_POST['billing_phone'];
			$email = $_POST['billing_email'];
			$comments = $_POST['order_comments'];

			// $file = dirname(__FILE__) . '/../../../../tokens/tokens.json';
			// $json = json_decode(file_get_contents($file), true);
			$accessToken = $this->access_token;
			$refreshToken = $this->refresh_token;
			$accessTokenExpireAt = $this->expires_at;

			if (time() >= strtotime($accessTokenExpireAt)) {
				$newTokens = $this->refreshToken($accessToken, $refreshToken);

				$accessToken = $newTokens->accessToken;
				$this->update_option('access_token', $accessToken);
				// $json['access_token'] = $accessToken;

				$refreshToken = $newTokens->refreshToken;
				$this->update_option('refresh_token', $refreshToken);
				// $json['refresh_token'] = $refreshToken;

				$accessTokenExpireAt = $newTokens->accessTokenExpireAt;
				$this->update_option('expires_at', $accessTokenExpireAt);
				// $json['expires_at'] = $accessTokenExpireAt;

				// file_put_contents($file, json_encode($json));
			}

			/* Order create */
			$postFields = array(
				"description" => $orderId,
				"autoConfirm" => true,
				"expireAt" => gmdate("Y-m-d\TH:i:s\Z", strtotime('+1 hour')),
				"amount" => array(
					"value" => $productPrice,
					"currency" => $currency
				),
				"successUrl" => $this->get_return_url($order),
				"customer" => array(
					"phone" => $phone,
					"email" => $email,
					"fullName" => $name . ' ' . $last_name,
					// "country" => $country,
					"address" => $address,
					"city" => $city,
					"state" => $state,
					"postalCode" => $postcode,
				),
				"customFields" => array(
					"cf1" => $comments,
					"cf2" => $country,
				),
			);

			$payload = json_encode($postFields);
			$result = $this->createOrder($payload, $accessToken, $refreshToken);

			return json_encode($result);
		}
	}

	private function createOrder($payload, $accessToken, $refreshToken) {
		$url = $this->api_url . "orders";
		$result = $this->curlPost($url, $accessToken, $payload);
		return $result;
	}

	private function refreshToken($accessToken, $refreshToken) {
		$url = $this->api_url . "oauth/tokens/refresh";
		$result = $this->curlPost($url, $accessToken, json_encode(array("refreshToken" => $refreshToken)));
		return $result;
	}

	private function curlPost($url, $bearer, $payload) {
		$headers = [];
		$headers['Content-Type'] = 'application/json';
		$headers['Authorization'] = 'Bearer ' . $bearer;
		$args = [
			'method' => 'POST',
			'headers'     => $headers,
			'body'        => $payload,
			'timeout'     => 60,
			'redirection' => 5,
			'httpversion' => '1.0',
			'blocking'    => true,
			'cookies'     => array(),
			'sslverify' => false,
		];

		$response = wp_remote_post($url, $args);

		if (json_decode(wp_remote_retrieve_body($response), true)['error']['code'] != 0) {
			$error_message = $response->get_error_message();
			return "Something went wrong: $error_message";
		} else {
			return json_decode(wp_remote_retrieve_body($response), true);
		}
	}
}
