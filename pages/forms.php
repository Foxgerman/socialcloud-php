<m:title>Test Form</m:title>
<m:h1>Test Form</m:h1>
<p>
	You can create forms using plain old HTML. You can also use <a href="http://unity.moxi9.com/docs/apps/m-markup" target="_blank" class="no_ajax">m:markup</a>, check out what you prefer below.
</p>
<article>
	<h1>HTML Form (No M:Markup)</h1>
	<?php
		if (!empty($json->post->foo)) {
			echo 'POSTED:';
			echo '<pre>';
			print_r((object) array_map('htmlspecialchars', (array) $json->post));
			echo '</pre>';
		}
	?>
	<form method="post" action="./forms">
		<div>
			<input type="text" name="foo" value="" placeholder="Enter a value..." /> <input type="submit" value="Submit" />
		</div>
	</form>
</article>

<article>
	<h1>HTML Form (With M:Markup)</h1>
	<p>
		By using m:markup to create your forms it will be faster to build forms and will always use the default theme.
	</p>
	<?php
		if (!empty($json->post->val)) {
			echo 'POSTED:';
			echo '<pre>';
			print_r((object) array_map('htmlspecialchars', (array) $json->post->val));
			echo '</pre>';
		}
	?>
	<form method="post" action="./forms">
		<m:form name="post1" type="text" title="Field 1" />
		<m:form name="post2" type="text" title="Field 2" />
		<m:form name="submit" type="submit" title="Submit" />
	</form>
</article>