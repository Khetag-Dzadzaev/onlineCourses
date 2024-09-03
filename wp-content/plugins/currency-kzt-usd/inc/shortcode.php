<?php

add_shortcode('currencykztusd', 'currencykztusd_shortcode');
function currencykztusd_shortcode($atts) {
	ob_start();
?>
	<ul class="currency-switcher mt-30 mb-30">
		<li class="currency-switcher__item <?php if (isset($_COOKIE[CURRENCYKZTUSD_PLUGIN_COOKIE]) && $_COOKIE[CURRENCYKZTUSD_PLUGIN_COOKIE] === 'KZT' || !isset($_COOKIE[CURRENCYKZTUSD_PLUGIN_COOKIE])) echo 'active'; ?>" data-currency="KZT"><span class="currency-switcher__link">KZT</span></li>
		<li class="currency-switcher__item <?php if (isset($_COOKIE[CURRENCYKZTUSD_PLUGIN_COOKIE]) && $_COOKIE[CURRENCYKZTUSD_PLUGIN_COOKIE] === 'USD') echo 'active'; ?>" data-currency="USD"><span class="currency-switcher__link">USD</span></li>
	</ul>
<?php
	return ob_get_clean();
}
