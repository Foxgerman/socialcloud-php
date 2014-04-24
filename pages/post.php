<m:title>Post to Stream</m:title>
<m:h1>Post to Stream</m:h1>
<?php
	if (!empty($json->post->val)) {
		$stream_id = api_call('stream/add', array(
			'user_id' => $json->user->user_id,
			'type' => 'stream',
			'content' => $json->post->val->text
		), 'POST');

		$stream = api_call('stream/get', array(
			'user_id' => $json->user->user_id,
			'id' => $stream_id
		));

		echo json_encode(array('permalink' => $stream->permalink, 'object' => trim(print_r($stream, true))));
		exit;
	}
?>
<form method="post" action="" class="example_post_stream">
	<m:form name="text" title="What's New?" type="textarea" />
	<m:form name="submit" title="Post" type="submit" />
</form>
<script type="text/javascript">
	Core.action.post_stream = function() {
		$('.example_post_stream').submit(function() {
			Core.post(window.location.href, $(this), function(e) {
				var data = $.parseJSON(e.responseText);
				$('.example_post_stream').html('<div class="message">Stream successfully added! Check it out <a href="' + data.permalink + '">here</a>.</div>' +
					'This is what we got back:' +
					'<pre>' + data.object + '</pre>');
			});

			return false;
		});
	}
</script>