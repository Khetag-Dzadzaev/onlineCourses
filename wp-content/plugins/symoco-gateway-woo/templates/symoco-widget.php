<!doctype html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<?php wp_head(); ?>

	<title>Symoco</title>
</head>

<body>
	<div id="widget"></div>
</body>

<script>
	PSP.Widget.init({
		display: {
			mode: "embedded",
			params: {
				container: "widget",
				// pcidss: "full",
			},
		},
		payUrl: '<?php echo $_GET['url']; ?>',
	});
</script>

</html>