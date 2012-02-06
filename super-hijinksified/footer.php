		<footer></footer>
		
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="<?php bloginfo('template_url');?>/js/libs/jquery-1.7.1.min.js"><\/script>')</script>
		<script defer src="<?php bloginfo('template_url');?>/js/plugins.js"></script>
		<script defer src="<?php bloginfo('template_url');?>/js/script.js"></script>
		<script> // Change UA-XXXXX-X to be your site's ID
		window._gaq = [['_setAccount','UAXXXXXXXX1'],['_trackPageview'],['_trackPageLoadTime']];
		Modernizr.load({
		  load: ('https:' == location.protocol ? '//ssl' : '//www') + '.google-analytics.com/ga.js'
		});
		</script>
		
		<!--[if lt IE 7 ]>
		  <script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
		  <script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
		<![endif]-->
		
		<?php wp_footer(); ?>
	
	</body>
</html>
