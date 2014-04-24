<m:title>M:Markup</m:title>
<m:h1>M:Markup</m:h1>
<m:panel>
	<div class="widget">
		<div class="title">Sample Widget</div>
		<div class="widget_content">
			Hello, I am a widget
		</div>
	</div>
</m:panel>
<p>
	We provide <a href="http://unity.moxi9.com/docs/apps/m-markup" target="_blank" class="no_ajax">M:Markup</a> to make things
	a little easier when creating Apps. It also allows the creation of dynamic content that you can interact with Javascript.
</p>
<p>
	This allows for Apps to be fully written in just HTML. Below, we provide a few examples on how M:Markup works.
</p>
<article>
	<h1>Users Profile Image</h1>
	<m:image />
</article>

<article>
	<h1>List Users Friends</h1>
	<p>
		Below we have listed all the friends of the current user that is logged in. Which in this case should be you.
	</p>
	<p>
		We included a custom jQuery onclick event that we can use to perform an action on a specific user.
	</p>
	<div class="friend_content" style="overflow:auto; max-height:400px; border:1px #dfdfdf solid;">
		<m:friends />
	</div>
	<div class="friend_message">
		Clicked on a friend! Friends details...
		<pre></pre>
	</div>
	<style type="text/css">
		.friend {
			cursor:pointer;
		}

		.friend_message {
			display:none;
			color:#fff;
			background:#71B33D;
			padding:10px;
		}

		.friend_message pre {
			border:0px;
			border-top:1px #fff dashed;
			padding-top:5px;
			margin-top:5px;
			background:#71B33D;
			color:#fff;
			border-radius:0px;
		}
	</style>
	<script type="text/javascript">
		Core.action.example_friends = function() {
			$('.friend').click(function() {
				$('.friend_content').hide();
				$('.friend_message').show();
				$('.friend_message pre').html("User ID: " + $(this).data('id') + "\nName: " + $(this).data('name'));
			});
		}
	</script>
</article>