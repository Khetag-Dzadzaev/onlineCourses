<?php

$rates = json_decode(file_get_contents('https://www.cbr-xml-daily.ru/daily_json.js'), true);

// $number = $rates['Valute']['KZT']['Value'] / $rates['Valute']['KZT']['Nominal'];
// $pos = strrpos($number, '.'); // при необходимости заменить на просто strpos
// if ($pos !== false) {
// 	$number = substr($number, 0, $pos + 1 + 4);
// }


// echo "<hr /><h1>DEBUG</h1><pre>";
// var_dump($rates['Valute']['KZT']['Value']);
// var_dump($rates['Valute']['KZT']['Nominal']);
// var_dump($rates['Valute']['KZT']['Value'] / $rates['Valute']['KZT']['Nominal']);
// var_dump($number);
// var_dump(number_format($rates['Valute']['KZT']['Value'] / $rates['Valute']['KZT']['Nominal'], 2, '', ''));
// echo "</pre>";
// // die();

$kzt_to_rub = round($rates['Valute']['KZT']['Value'] / round($rates['Valute']['KZT']['Nominal'], 2), 4);
$usd_to_rub = round($rates['Valute']['USD']['Value'] / round($rates['Valute']['USD']['Nominal'], 2), 4);
$kzt_to_usd = round(1 / ($kzt_to_rub / $usd_to_rub), 0);


$currencyKztUsdOption = get_option('currency_kzt_usd');
if ($currencyKztUsdOption === false) {
	add_option('currency_kzt_usd', $kzt_to_usd);
} else {
	update_option('currency_kzt_usd', $kzt_to_usd);
}

echo '<h1>KZT to USD</h1>';
echo '1KZT = ' . $kzt_to_rub . 'RUB';
echo '<br>';
echo '1USD = ' . $usd_to_rub . 'RUB';
echo '<br>';
echo '1USD = ' . $kzt_to_usd . 'KZT';
echo '<br>';
echo '<br>';
echo "Вывод в php: <code>echo do_shortcode('[currencykztusd]');</code>";
