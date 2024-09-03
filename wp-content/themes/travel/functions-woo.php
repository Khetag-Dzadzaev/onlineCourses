<?php
// поддержка woo
add_action('after_setup_theme', 'mytheme_add_woocommerce_support');
function mytheme_add_woocommerce_support()
{
	add_theme_support('woocommerce');
}

// добавление автора продукта
add_action('init', 'add_author_support_to_products');
function add_author_support_to_products()
{
	add_post_type_support('product', 'author');
}

// кол-во товаров на странице в архиве
add_filter('loop_shop_per_page', 'woo_products_per_page', 20);
function woo_products_per_page($per_page)
{
	$per_page = 9;
	return $per_page;
}

// обновление кол-во в корзине
add_filter('add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');
function woocommerce_header_add_to_cart_fragment($fragments)
{
	ob_start();
?>
	<a href="<?php echo get_permalink(pll_get_post(11)); ?>" class="btn border">
		<i class="fas fa-shopping-cart text-primary"></i>
		<span class="badge"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
	</a>
<?php
	$fragments['a#cart-sidebar'] = ob_get_clean();
	return $fragments;
}


// ЭКШЕНЫ В ШАБЛОНАХ НАЧАЛО
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
// remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
remove_action('woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);

add_action('woocommerce_single_product_summary_right', 'woocommerce_single_product_summary_right', 10);
function woocommerce_single_product_summary_right()
{
	global $product;
	wc_get_template('single-product/price.php');
	do_action('woocommerce_' . $product->get_type() . '_add_to_cart');
}


remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);


remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
add_action('woocommerce_before_shop_loop_item_title', 'loop_product_custom_thumbnail', 10);
function loop_product_custom_thumbnail()
{
	echo the_post_thumbnail('woocommerce_thumbnail', array('class' => 'img-fluid w-100'));
}

remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
add_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title_custom', 10);
function woocommerce_template_loop_product_title_custom()
{
	global $product;
	echo '<h6 class="product-tree-lines"><a href="' . $product->get_permalink() . '">' . get_the_title() . '</a></h6>';
}

remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
add_action('woocommerce_before_shop_loop_custom', 'woocommerce_result_count_custom', 20);
function woocommerce_result_count_custom()
{
	// woocommerce_result_count();
	woocommerce_catalog_ordering();
}
// ЭКШЕНЫ В ШАБЛОНАХ КОНЕЦ



// страница оформления
add_filter('woocommerce_checkout_fields', 'override_billing_checkout_fields', 20, 1);
function override_billing_checkout_fields($fields)
{

	foreach ($fields as &$fieldset) {
		foreach ($fieldset as &$field) {
			if ($field['label'] === 'First name' || $field['label'] === 'Last name') {
				$field['class'][] = 'col-md-6 mb-3';
			} else {
				$field['class'][] = 'col-md-6 form-group';
			}
			$field['input_class'][] = 'form-control';
		}
	}
	return $fields;
}

// поля в личном кабинете
add_filter('woocommerce_default_address_fields', 'filter_remove_fields');
function filter_remove_fields($fields)
{
	unset($fields['company']);
	unset($fields['address_2']);
	unset($fields['address_1']['required']);
	return $fields;
}

// поля в админке
add_filter('woocommerce_customer_meta_fields', 'filter_admin_address_field');
function filter_admin_address_field($admin_fields)
{
	unset($admin_fields['shipping']);
	unset($admin_fields['billing']['fields']['billing_company']);
	unset($admin_fields['billing']['fields']['billing_address_2']);
	return $admin_fields;
}

// поля в лк - редактировать адрес
add_filter('woocommerce_form_field_args', 'custom_wc_form_field_args', 10, 3);
function custom_wc_form_field_args($args, $key, $value)
{
	// Only on My account > Edit Adresses
	if (is_wc_endpoint_url('edit-account') || is_checkout()) return $args;

	$args['class'] = array('form-input-group', 'mb-3', 'p-0');
	$args['input_class'] = array('form-control');

	return $args;
}


// обновление счета автора в лк
add_action('woocommerce_checkout_order_processed', 'update_wallet', 10, 1);
function update_wallet($order_id)
{
	$order = wc_get_order($order_id);
	$items = $order->get_items();

	foreach ($items as $item) {
		$product_name = $item->get_name();
		$product_price = intval($item->get_subtotal());
		$product_id = $item->get_product_id();
		$author_id = get_post_field('post_author', $product_id);

		$price = intval(get_user_meta($author_id, 'account_wallet', true));
		$price = $price + $product_price;

		update_user_meta($author_id, 'account_wallet', $price);
	}
}

// добавление в лк кастомные пункты меню 
add_action('init', 'add_product_endpoint');
function add_product_endpoint()
{
	add_rewrite_endpoint('add-product', EP_ROOT | EP_PAGES);
	add_rewrite_endpoint('wallet', EP_ROOT | EP_PAGES);
	add_rewrite_endpoint('selection', EP_ROOT | EP_PAGES);
	add_rewrite_endpoint('personal-posts', EP_ROOT | EP_PAGES);
}

// добавление в лк пункт меню новый пост
add_action('woocommerce_account_add-product_endpoint', 'add_product_content');
function add_product_content()
{
	echo get_template_part("template_parts/lk-new-post");
}

// добавление в лк пункт меню счет
add_action('woocommerce_account_wallet_endpoint', 'wallet_content');
function wallet_content()
{
	echo get_template_part("template_parts/lk-wallet");
}

// добавление в лк пункт меню подборка
add_action('woocommerce_account_selection_endpoint', 'selection_content');
function selection_content()
{
	echo get_template_part("template_parts/lk-selection");
}

// добавление в лк пункт меню "ваши посты"
add_action('woocommerce_account_personal-posts_endpoint', 'personal_posts_content');
function personal_posts_content()
{
	echo get_template_part("template_parts/lk-personal-posts");
}

// сортировка пунктов меню в лк
add_filter('woocommerce_account_menu_items', 'wk_new_menu_items');
function wk_new_menu_items($items)
{
	if (is_user_logged_in() && current_user_can('customer') || is_user_logged_in() && current_user_can('administrator')) {
		$items['add-product'] = esc_attr(pll__('Add new product'));
		$items['selection'] = esc_attr(pll__('Special'));
		$items['wallet'] = esc_attr(pll__('Balance'));
		$items['personal-posts'] = esc_attr(pll__('Personal posts'));
	}
	$items['dashboard'] = esc_attr(pll__('Dashboard'));
	$items['edit-address'] = esc_attr(pll__('Addresses'));
	$items['orders'] = esc_attr(pll__('Orders'));
	$items['edit-account'] = esc_attr(pll__('Account details'));

	unset($items['customer-logout']);
	$items['customer-logout'] = esc_attr(pll__('Log out'));
	return $items;
}


//скрывать все меню, кроме админ
add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar()
{
	if (!current_user_can('administrator') && !is_admin()) {
		show_admin_bar(false);
	}
}

//редирект кроме админа 
add_action('admin_init', 'redirect_admin_pages');
function redirect_admin_pages()
{
	if (!current_user_can('administrator') && (!wp_doing_ajax())) {
		wp_safe_redirect(home_url());
		exit;
	}
}


// мета поле счет аккаунта в админ
add_action('show_user_profile', 'my_user_profile_edit_action');
add_action('edit_user_profile', 'my_user_profile_edit_action');
function my_user_profile_edit_action($user)
{
	$account_wallet = get_user_meta($user->ID, 'account_wallet', true);
?>
	<h3>Счет аккаунта</h3>
	<table class="form-table">
		<tbody>
			<tr>
				<th>
					<label for="account_wallet">Сумма</label>
				</th>
				<td>
					<input type="number" name="account_wallet" id="account_wallet" value="<?php echo $account_wallet ? $account_wallet : 0; ?>" class="regular-text">
				</td>
			</tr>
		</tbody>
	</table>
<?php
}

// обновление мета поле счет аккаунта в админ
add_action('personal_options_update', 'my_user_profile_update_action');
add_action('edit_user_profile_update', 'my_user_profile_update_action');
function my_user_profile_update_action($user_id)
{
	update_user_meta($user_id, 'account_wallet', $_POST['account_wallet']);
}


add_filter('woocommerce_output_related_products_args', 'jk_related_products_args', 20);
function jk_related_products_args($args)
{
	$args['posts_per_page'] = 3; // 4 related products
	$args['columns'] = 2; // arranged in 2 columns
	return $args;
}

add_action('woocommerce_product_query', 'wpdd_exclude_product_cat_from_wc_shop');
/**
 * Exclude selected product category/categories from the main WooCommerce Shop page
 * 
 * @param object $query data
 *
 */
function wpdd_exclude_product_cat_from_wc_shop($query)
{
	if ($query->is_main_query() && !is_admin() && $query->is_post_type_archive('product')) {
		$query->set('tax_query', array(array(
			'taxonomy' => 'product_cat',
			'field' => 'id',
			'terms' => [209, 211, 213], // Enter comma-separated slugs of product categories to be excluded here
			'operator' => 'NOT IN'
		)));
	}
}

/**
 * @snippet       Add First & Last Name to My Account Register Form - WooCommerce
 * @how-to        Get CustomizeWoo.com FREE
 * @author        Rodolfo Melogli
 * @compatible    WooCommerce 8
 * @community     https://businessbloomer.com/club/
 */

// VALIDATE FIELDS

// add_filter('woocommerce_registration_errors', 'bbloomer_validate_name_fields', 10, 3);

// function bbloomer_validate_name_fields($errors, $username, $email)
// {
// 	if (isset($_POST['billing_first_name']) && empty($_POST['billing_first_name'])) {
// 		$errors->add('billing_first_name_error', __('<strong>Error</strong>: First name is required!', 'woocommerce'));
// 	}

// 	if (isset($_POST['billing_last_name']) && empty($_POST['billing_last_name'])) {
// 		$errors->add('billing_last_name_error', __('<strong>Error</strong>: Last name is required!.', 'woocommerce'));
// 	}

// 	return $errors;
// }

// SAVE FIELDS

add_action('woocommerce_created_customer', 'bbloomer_save_name_fields');

function bbloomer_save_name_fields($customer_id)
{
	if (isset($_POST['billing_first_name'])) {
		update_user_meta($customer_id, 'billing_first_name', sanitize_text_field($_POST['billing_first_name']));
		update_user_meta($customer_id, 'first_name', sanitize_text_field($_POST['billing_first_name']));
	}
	if (isset($_POST['billing_last_name'])) {
		update_user_meta($customer_id, 'billing_last_name', sanitize_text_field($_POST['billing_last_name']));
		update_user_meta($customer_id, 'last_name', sanitize_text_field($_POST['billing_last_name']));
	}
}

add_filter('woocommerce_checkout_fields', 'remove_billing_company_field');

/**
 * Удаляет из форм на странице "Оформление заказа" поле "Название компании".
 *
 * @param array $fields
 *
 * @return array
 */
function remove_billing_company_field($fields)
{
	unset($fields['billing']['billing_address_1']);
	unset($fields['billing']['billing_city']);
	unset($fields['billing']['billing_state']);
	unset($fields['billing']['billing_postcode']);

	return $fields;
}

/**
 * Method to delete Woo Product
 * 
 * @param int $id the product ID.
 * @param bool $force true to permanently delete product, false to move to trash.
 * @return \WP_Error|boolean
 */
function wh_deleteProduct($id, $force = FALSE)
{
	$product = wc_get_product($id);

	if (empty($product))
		return new WP_Error(999, sprintf(__('No %s is associated with #%d', 'woocommerce'), 'product', $id));

	// If we're forcing, then delete permanently.
	if ($force) {
		if ($product->is_type('variable')) {
			foreach ($product->get_children() as $child_id) {
				$child = wc_get_product($child_id);
				$child->delete(true);
			}
		} elseif ($product->is_type('grouped')) {
			foreach ($product->get_children() as $child_id) {
				$child = wc_get_product($child_id);
				$child->set_parent_id(0);
				$child->save();
			}
		}

		$product->delete(true);
		$result = $product->get_id() > 0 ? false : true;
	} else {
		$product->delete();
		$result = 'trash' === $product->get_status();
	}

	if (!$result) {
		return new WP_Error(999, sprintf(__('This %s cannot be deleted', 'woocommerce'), 'product'));
	}

	// Delete parent product transients.
	if ($parent_id = wp_get_post_parent_id($id)) {
		wc_delete_product_transients($parent_id);
	}
	return true;
}
