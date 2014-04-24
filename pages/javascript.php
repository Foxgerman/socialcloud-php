<?php

if (isset($json->get->is_ajax)) {
	echo "Thanks for clicking!\n-----------\n\n";
	print_r($json->get);
	exit;
}

?>
<m:title>Javascript</m:title>
<m:h1>Javascript</m:h1>
<p>
	You can use plain ol' vanilla Javascript or <a href="http://jquery.com/" target="_blank" class="no_ajax">jQuery</a>.
</p>
<p>
	Here we provide a simply example of a jQuery AJAX call.
</p>
<p>
	<a href="#" class="button example_ajax no_ajax">Click Me</a>
</p>
<pre style="display:none;" class="example_ajax_pre"></pre>
<script type="text/javascript">
	Core.action.example = function() {
		$('.example_ajax').click(function() {

			$.ajax({
				url: document.URL,
				data: 'is_ajax=true&foo=bar',
				complete: function(e) {
					$('.example_ajax_pre').html(e.responseText).slideDown();
				}
			});

			return false;
		});
	}
</script>