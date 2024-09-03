// jQuery(document).ready(function ($) {

// 	var checkout_form = $('form.checkout');

// 	checkout_form.on('checkout_place_order', function () {
// 		if ($('#confirm-order-flag').length == 0) {
// 			checkout_form.append('<input type="hidden" id="confirm-order-flag" name="confirm-order-flag" value="1">');
// 		}
// 		return true;
// 	});


// 	$(document.body).on('checkout_error', function () {
// 		var error_count = $('.woocommerce-error li').length;

// 		if (error_count == 1) { // Validation Passed (Just the Fake Error I Created Exists)
// 			console.log('qwe');
// 		} else { // Validation Failed (Real Errors Exists, Remove the Fake One)
// 			$('.woocommerce-error li').each(function () {
// 				var error_text = $(this).text();
// 				if (error_text == 'custom_notice') {
// 					$(this).css('display', 'none');
// 				}
// 			});
// 		}
// 	});
// });

// document.addEventListener("DOMContentLoaded", function () {
// 	const formOrder = document.querySelector('form[name="checkout"]');
// 	formOrder.addEventListener('submit', (e) => {
// 		e.preventDefault();
// 		console.log('cowdrhnglksng');
// 		console.log(e);
// 	});
// 	// const widget = document.querySelector('#widget');
// 	// const formOrder = document.querySelector('form[name="checkout"]');

// 	// const act = '/wp-admin/admin-ajax.php';
// 	// if (formOrder) {
// 	// 	formOrder.addEventListener('submit', (e) => {
// 	// 		e.preventDefault();
// 	// 		const xhr = new XMLHttpRequest();
// 	// 		const formData = new FormData(formOrder);

// 	// 		formData.append("action", "send_order");
// 	// 		xhr.onreadystatechange = function () {
// 	// 			if (xhr.readyState === 4) {
// 	// 				if (xhr.status === 200) {
// 	// 					let response = JSON.parse(xhr.responseText);
// 	// 					if (response.error.code !== 0) {
// 	// 						return;
// 	// 					}
// 	// 					// formOrder.style.display = 'none';
// 	// 					PSP.Widget.init({
// 	// 						display: {
// 	// 							mode: "embedded",
// 	// 							params: {
// 	// 								container: widget,
// 	// 								pcidss: "full",
// 	// 							},
// 	// 						},
// 	// 						payUrl: response.object.payUrl,
// 	// 					});
// 	// 					return false;
// 	// 				} else {
// 	// 					console.log('An error occurred during your request: ' + xhr.status + ' ' + xhr.statusText);
// 	// 				}
// 	// 			}
// 	// 		}
// 	// 		xhr.open("POST", act);
// 	// 		xhr.send(formData);
// 	// 	});
// 	// }
// });