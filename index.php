<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.twitter.com/2/tweets/search/recent?query=%23vacaciones&max_results=100&tweet.fields=public_metrics,author_id&expansions=author_id',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Authorization: Bearer AAAAAAAAAAAAAAAAAAAAAAaohAEAAAAAzk8Jv5Zbsj8qG6JwayWRgGtCFI0%3DSmHQxEBo8rZQfuTxVzBpn45eqCeWPn5AmEtuoYkJiku0I02Qiv',
    'P95Mzrl6bY5mUxGt6gnYo6LF6: dBRJm5bD42opvAJhWA2xpfWJEhTtrZxxv9eQcVWqlPA5fPYb75',
    'Cookie: guest_id=v1%3A166342337489536763'
  ),
));

$response = curl_exec($curl);

curl_close($curl);

$page = 'home';
if (isset($_GET['p'])) $page = $_GET['p'];
$body = 'pages/'.$page.'.php';
$css = 'css/'.$page.'.css';

?>

<html>

	<head>

		<link rel="stylesheet" href="css/style.css">
		<?php if (file_exists($css)) echo '<link rel="stylesheet" href="'.$css.'">'; ?>

	</head>

	<body>

		<nav>
			<div class="nav-links">
			    <a <?php if($page == 'table') echo 'class="current"'; else echo 'href="/api-twitter-test?p=table"'; ?> >TABLA</a>
			    <a <?php if($page == 'cards') echo 'class="current"'; else echo 'href="/api-twitter-test?p=cards"'; ?> >TARJETAS</a>
			</div>
		</nav>

		<?php
			if (file_exists($body)) include $body;
		?>

		<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
		<script type="text/javascript">

			var v = new Vue({
				el: ".tweets",
				data: <?php echo $response ?>
			});

		</script>

	</body>

</html>