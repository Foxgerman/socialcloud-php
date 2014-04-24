<m:title>API Commands</m:title>
<m:h1>API Commands</m:h1>
<p>
	There are tons of ways to interact with a Moxi9 community. Here we show some examples on how to retrieve data.
</p>
<p>
	To learn more about Commands, check out our <a href="http://unity.moxi9.com/docs/command" target="_blank" class="no_ajax">docs</a>.
</p>
<article>
	<h1>Get Users Info</h1>
	<?php
	$user = api_call('user/get', array('user_id' => $json->user->user_id));

	echo '<pre>';
	print_r($user);
	echo '</pre>';
	?>
</article>

<article>
	<h1>Get Users Friends</h1>
	<?php
	$user = api_call('connect/get', array('user_id' => $json->user->user_id));

	echo '<pre>';
	print_r($user);
	echo '</pre>';
	?>
</article>