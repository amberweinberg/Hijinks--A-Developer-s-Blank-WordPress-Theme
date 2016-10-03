		<!--Footer-->
		
		<footer>
			<div class="container">
				<?php wp_nav_menu( array('menu' => 'Footer', 'container' => false, )); ?>
			</div>
		</footer>
		
		<!--Scripts-->
		
		<script src="<?php bloginfo('template_url');?>/js/jquery.meanmenu.min.js"></script>
		<script src="<?php bloginfo('template_url');?>/js/script.js"></script>
		
		<!--Warn Old Browsers To Quit Being Old-->
		
		<script>var $buoop = {c:2};function $buo_f(){var e = document.createElement("script");e.src = "//browser-update.org/update.min.js";document.body.appendChild(e);};try {document.addEventListener("DOMContentLoaded", $buo_f,false)}catch(e){window.attachEvent("onload", $buo_f)}</script> 
		
		<?php wp_footer(); ?>
	
	</body>
</html>
