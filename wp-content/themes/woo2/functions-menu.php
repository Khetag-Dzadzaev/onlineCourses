<?php
add_action('after_setup_theme', 'nav_menus');
function nav_menus() {
	add_image_size('blog-item', 370, 225, true);
	add_image_size('cat-item', 520, 400, true);

	register_nav_menus(
		array(
			'menu_main_header' => 'Меню в хедер',
			'menu_main_footer' => 'Меню в футер',
			'categories' => 'Категории',
			'lang_switcher' => 'Переключатель языков',
		)
	);
}

class categories_menu_Walker extends Walker_Nav_Menu {
	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
		if ($depth == 0) {
			if ($args->has_children && $item->current) {
				$output .= '<li class="nav-item dropdown active"><a href="' . $item->url . '" class="nav-link" data-toggle="dropdown">' . $item->title . '<i class="fa fa-angle-down float-right mt-1"></i></a>';
			} else if ($args->has_children && $item->url != '#') {
				$output .= '<li class="nav-item dropdown"><a href="#" class="nav-link" data-toggle="dropdown">' . $item->title . '<i class="fa fa-angle-down float-right mt-1"></i></a>';
			} else if ($args->has_children && $item->url == '#') {
				$output .= '<li class="menu__item"><span class="nav-item nav-link">' . $item->title . '</span><span class="menu__item-svg-block"><svg class="menu__item-svg"><use xlink:href="' . get_template_directory_uri() . '/images/sprite.svg#arrow-menu"></use></svg></span>';
			} else if ($item->current) {
				$output .= '<li><a href="' . $item->url . '" class="nav-item nav-link active">' . $item->title . '</a>';
			} else {
				$output .= '<li><a href="' . $item->url . '" class="nav-item nav-link">' . $item->title . '</a>';
			}
		}
		if ($depth == 1) {
			if ($item->current) {
				$output .= '<li><a href="' . $item->url . '" class="dropdown-item active">' . $item->title . '</a>';
			} else {
				$output .= '<li><a href="' . $item->url . '" class="dropdown-item">' . $item->title . '</a>';
			}
		}
	}
	function start_lvl(&$output, $depth = 0, $args = array()) {
		$output .= '<ul class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">';
	}

	function end_lvl(&$output, $depth = 0, $args = array()) {
		$output .= '</ul>';
	}
	function display_element($element, &$children_elements, $max_depth, $depth = 0, $args, &$output) {
		$id_field = $this->db_fields['id'];
		if (is_object($args[0])) {
			$args[0]->has_children = !empty($children_elements[$element->$id_field]);
		}
		return parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
	}
}

class langswitcher_Walker extends Walker_Nav_Menu {
	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
		$my_lang = pll_current_language();


		if ($my_lang == 'kk' && $item->title == 'Kz' || $my_lang == 'ru' && $item->title == 'Ru' || $my_lang == 'en' && $item->title == 'En') {
			$output .= '<li class="lang__item active"><a class="lang__link" href="' . $item->url . '">' . $item->title . '</a>';
		} else {
			$output .= '<li class="lang__item"><a class="lang__link" href="' . $item->url . '">' . $item->title . '</a>';
		}
	}
}

class footer_menu_Walker extends Walker_Nav_Menu {
	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
		if ($depth == 0) {
			if ($item->current) {
				$output .= '<li class="mb-2"><a class="text-dark" href="' . $item->url . '"><i class="fa fa-angle-right mr-2"></i>' . $item->title . '</a>';
			} else {
				$output .= '<li class="mb-2"><a class="text-dark mb-2" href="' . $item->url . '"><i class="fa fa-angle-right mr-2"></i>' . $item->title . '</a>';
			}
		}
	}
}

class main_nav_menu_Walker extends Walker_Nav_Menu {
	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
		if ($depth == 0) {
			if ($item->current) {
				$output .= '<li><a href="' . $item->url . '" class="nav-item nav-link active">' . $item->title . '</a>';
			} else {
				$output .= '<li><a href="' . $item->url . '" class="nav-item nav-link">' . $item->title . '</a>';
			}
		}
	}
}

class sub_menu_Walker extends Walker_Nav_Menu {
	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
		if ($depth == 0) {
			if ($args->has_children && $item->current) {
				$output .= '<li class="menu__item menu__item_sub active"><a href="' . $item->url . '" class="menu__link">' . $item->title . '</a><span class="menu__item-svg-block"><svg class="menu__item-svg"><use xlink:href="' . get_template_directory_uri() . '/images/sprite.svg#arrow-menu"></use></svg></span>';
			} else if ($args->has_children && $item->url != '#') {
				$output .= '<li class="menu__item menu__item_sub"><a href="' . $item->url . '" class="menu__link">' . $item->title . '</a><span class="menu__item-svg-block"><svg class="menu__item-svg"><use xlink:href="' . get_template_directory_uri() . '/images/sprite.svg#arrow-menu"></use></svg></span>';
			} else if ($args->has_children && $item->url == '#') {
				$output .= '<li class="menu__item"><span class="menu__link">' . $item->title . '</span><span class="menu__item-svg-block"><svg class="menu__item-svg"><use xlink:href="' . get_template_directory_uri() . '/images/sprite.svg#arrow-menu"></use></svg></span>';
			} else if ($item->current) {
				$output .= '<li class="menu__item active"><a href="' . $item->url . '" class="menu__link">' . $item->title . '</a>';
			} else {
				$output .= '<li class="menu__item"><a href="' . $item->url . '" class="menu__link">' . $item->title . '</a>';
			}
		}
		if ($depth == 1) {
			if ($item->current) {
				$output .= '<li class="menu__sub-item"><a href="' . $item->url . '" class="menu__sub-link menu__sub-link_active">' . $item->title . '</a>';
			} else {
				$output .= '<li class="menu__sub-item"><a href="' . $item->url . '" class="menu__sub-link">' . $item->title . '</a>';
			}
		}
	}
	function start_lvl(&$output, $depth = 0, $args = array()) {
		$output .= '<ul class="menu__sub">';
	}

	function end_lvl(&$output, $depth = 0, $args = array()) {
		$output .= '</ul>';
	}
	function display_element($element, &$children_elements, $max_depth, $depth = 0, $args, &$output) {
		$id_field = $this->db_fields['id'];
		if (is_object($args[0])) {
			$args[0]->has_children = !empty($children_elements[$element->$id_field]);
		}
		return parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
	}
}
