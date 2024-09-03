<?php

if (!function_exists('pll__')) {
	function pll__($string)
	{
		return $string;
	}
}

if (!function_exists('pll_e')) {
	function pll_e($string)
	{
		echo $string;
	}
}

add_action('init', 'polylang_strings');

function polylang_strings()
{
	if (!function_exists('pll_register_string')) {
		return;
	}

	pll_register_string(
		'learn_more', // название строки
		'Learn More', // сама строка
		'Общие', // категория для удобства
		false // будут ли тут переносы строк в тексте или нет
	);
	pll_register_string(
		'read_more',
		'Read more',
		'Общие',
		false
	);
	pll_register_string(
		'dashboard',
		'Dashboard',
		'Общие',
		false
	);
	pll_register_string(
		'special',
		'Special',
		'Подборка',
		false
	);
	pll_register_string(
		'addresses',
		'Addresses',
		'Общие',
		false
	);
	pll_register_string(
		'account_details',
		'Account details',
		'Общие',
		false
	);
	pll_register_string(
		'log_out',
		'Log out',
		'Общие',
		false
	);
	pll_register_string(
		'add_new_product',
		'Add new product',
		'Общие',
		false
	);
	pll_register_string(
		'personal_account',
		'Personal account',
		'Общие',
		false
	);
	pll_register_string(
		'orders',
		'Orders',
		'Общие',
		false
	);
	pll_register_string(
		'products',
		'Products',
		'Общие',
		false
	);
	pll_register_string(
		'view_detail',
		'View Detail',
		'Общие',
		false
	);
	pll_register_string(
		'categories',
		'Categories',
		'Общие',
		false
	);
	pll_register_string(
		'popular_products',
		'Popular Products',
		'Общие',
		false
	);
	pll_register_string(
		'just_arrived',
		'Just Arrived',
		'Общие',
		false
	);
	pll_register_string(
		'just_arrived_text',
		'Just Arrived Text',
		'Общие',
		false
	);
	pll_register_string(
		'menu',
		'Menu',
		'Общие',
		false
	);
	pll_register_string(
		'contacts',
		'Contacts',
		'Общие',
		false
	);
	pll_register_string(
		'site_search',
		'Site search',
		'Общие',
		false
	);
	pll_register_string(
		'all_rights_reserved',
		'All rights reserved',
		'Общие',
		false
	);
	pll_register_string(
		'your_name',
		'Your Name',
		'Общие',
		false
	);
	pll_register_string(
		'your_email',
		'Your Email',
		'Общие',
		false
	);
	pll_register_string(
		'subject',
		'Subject',
		'Общие',
		false
	);
	pll_register_string(
		'message',
		'Message',
		'Общие',
		false
	);
	pll_register_string(
		'send_message',
		'Send Message',
		'Общие',
		false
	);
	pll_register_string(
		'contact_for_any_queries',
		'Contact For Any Queries',
		'Общие',
		false
	);
	pll_register_string(
		'balance',
		'Balance',
		'Общие',
		false
	);
	pll_register_string(
		'login',
		'Login',
		'Общие',
		false
	);
	pll_register_string(
		'register',
		'Register',
		'Общие',
		false
	);
	pll_register_string(
		'explore_the_world',
		'Explore the World!',
		'Общие',
		false
	);
	pll_register_string(
		'similar_directions',
		'Similar directions',
		'Общие',
		false
	);
	pll_register_string(
		'what_we_serve',
		'What We Serve',
		'Общие',
		false
	);
	pll_register_string(
		'top_values_for_you',
		'Top Values For You!',
		'Общие',
		false
	);
	pll_register_string(
		'explore_wonderful_experience',
		'Explore wonderful experience',
		'Общие',
		false
	);
	pll_register_string(
		'visit_popular_destinations_in_the_world',
		'Visit Popular Destinations in the World',
		'Общие',
		false
	);
	pll_register_string(
		'top_destinations',
		'Top Destinations',
		'Общие',
		false
	);
	pll_register_string(
		'explore_the_beauty_of_the_world',
		'Explore the Beauty of The World',
		'Общие',
		false
	);
	pll_register_string(
		'about_treveltrek',
		'About TrevelTrek',
		'Общие',
		false
	);
	pll_register_string(
		'find_tours',
		'Find Tours',
		'Общие',
		false
	);

	pll_register_string(
		'your_email',
		'Your Email',
		'Общие',
		false
	);
	pll_register_string(
		'your_phone',
		'Your Phone',
		'Общие',
		false
	);
	pll_register_string(
		'your_message',
		'Your Message',
		'Общие',
		false
	);
	pll_register_string(
		'get_in_touch_with_us',
		'Get in Touch With Us',
		'Общие',
		false
	);
	pll_register_string(
		'contact_info',
		'Contact Info',
		'Общие',
		false
	);
	pll_register_string(
		'talk_with_our_team',
		'Talk with our team',
		'Общие',
		false
	);
	pll_register_string(
		'any_question',
		'Any Question? Feel Free to Contact',
		'Общие',
		false
	);
	pll_register_string(
		'tours',
		'Tours',
		'Woo Post type',
		false
	);
	pll_register_string(
		'tour',
		'Tour',
		'Woo Post type',
		false
	);

	pll_register_string(
		'your_phone',
		'Your phone',
		'Общие',
		false
	);
	pll_register_string(
		'your_email',
		'Your email',
		'Общие',
		false
	);
	pll_register_string(
		'sum',
		'Sum',
		'Общие',
		false
	);
	pll_register_string(
		'send',
		'Send',
		'Общие',
		false
	);
	pll_register_string(
		'request_a_withdrawal',
		'Request a withdrawal',
		'Общие',
		false
	);
	pll_register_string(
		'enter_personal_account',
		'Enter personal account',
		'Общие',
		false
	);
	pll_register_string(
		'leave_personal_account',
		'Leave personal account',
		'Общие',
		false
	);
	pll_register_string(
		'personal_posts',
		'Personal posts',
		'Общие',
		false
	);
	pll_register_string(
		'product_extend',
		'Product extend',
		'Общие',
		false
	);
	pll_register_string(
		'product_delete',
		'Product delete',
		'Общие',
		false
	);
	pll_register_string(
		'active_until',
		'Active until',
		'Общие',
		false
	);
}
