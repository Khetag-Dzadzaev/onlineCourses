document.addEventListener("DOMContentLoaded", function () {
	let currencies = document.querySelectorAll('.currency-switcher li');
	currencies.forEach(el => {
		el.addEventListener('click', (e) => {
			e.preventDefault();
			document.cookie = `${currencyKztUsdName.currency_kzt_usd_name}=${e.currentTarget.dataset.currency}; max-age=31536000; path=/`;
			window.location.reload();
		});
	})
});