<?php

if (!file_exists('./config.php')) {
	exit('Rename the file config.php.new to config.php');
}
require('./config.php');

error_reporting(E_ALL);

$json = json_decode($_REQUEST['json']);

define('MOXI9_CLIENT_ID', $json->client_api_id);

$parts = explode('/', $json->url);

$home_url = $parts[0];

unset($parts[0]);
$url = implode('/', $parts);

// Check what page to load
$page = './pages/index.php';
if (file_exists('./pages/' . $url . '.php')) {
	$page = './pages/' . $url . '.php';
}

// Routine to view the sorce code of the page
if (isset($json->get->view_page_source)) {
	highlight_file('./index.php');
	highlight_file($page);
	exit;
}

// Check if a user is logged it or not
if (empty($json->user->user_id)) {
	// Try are not, lets send them to the login page
	exit('redirect:user/login');
}

// Require the page we want to load
require($page);


// Function used to make API calls to Moxi9
function api_call($call, $params = array(), $method = 'GET') {
	$url = MOXI9_API_URL . $call;

	$params = http_build_query($params);

	$curl = curl_init();
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_HEADER, false);
	curl_setopt($curl, CURLOPT_USERPWD, MOXI9_PUBLIC_KEY . ':' . MOXI9_PRIVATE_KEY);
	curl_setopt($curl, CURLOPT_HTTPHEADER, array('MOXI9-CLIENT: ' . MOXI9_CLIENT_ID));
	curl_setopt($curl, CURLOPT_URL, (($method == 'GET' && !empty($params)) ? $url . '?' . ltrim($params, '&') : $url));

	if ($method == 'POST') {
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $params);
	}

	$data = curl_exec($curl);

	$return = json_decode($data);
	if ($return === null) {
		echo $data;
	}

	return $return;
}
?>
<!-- Create side panel menu -->
<m:menu name="Home" url="<?php echo $home_url; ?>" />
<m:menu name="Forms" url="<?php echo $home_url; ?>/forms" />
<m:menu name="API Commands" url="<?php echo $home_url; ?>/commands" />
<m:menu name="Javascript" url="<?php echo $home_url; ?>/javascript" />
<m:menu name="M:Markup" url="<?php echo $home_url; ?>/markup" />
<m:menu name="Post to Stream" url="<?php echo $home_url; ?>/post" />

<!-- Add a "View App Source" link to the side panel -->
<m:panel>
	<a href="#" class="example_view_source">View App Source</a>
</m:panel>

<!-- Add some custom Javascript -->
<script type="text/javascript">
	Core.action.view_source = function() {
		$('.example_view_source').click(function() {
			$.ajax({
				url: location.href,
				data: 'is_ajax=1&view_page_source=1',
				complete: function(e) {
					Core.popup({
						title: 'View Source',
						html: '<pre style="max-height:300px; overflow:auto;">' + e.responseText + '</pre>'
					})
				}
			});

			return false;
		});
	}
</script>