		</main>
		
		<!--Footer-->
		
		<footer>
			<div class="container">
				<?php wp_nav_menu( array('menu' => 'Footer', 'container' => false, )); ?>
				
				<ul class="social">
					<li><a href="<?php the_field('facebook_url','option');?>" target="_blank"><i class="fab fa-facebook" aria-hidden="true"></i><span class="accessibility">Facebook</span></a></li>
					<li><a href="<?php the_field('twitter_url','option');?>" target="_blank"><i class="fab fa-twitter" aria-hidden="true"></i><span class="accessibility">Twitter</span></a></li>
					<li><a href="<?php the_field('instagram_url','option');?>" target="_blank"><i class="fab fa-instagram" aria-hidden="true"></i><span class="accessibility">Instagram</span></a></li>
					<li><a href="<?php the_field('youtube_url','option');?>" target="_blank"><i class="fab fa-youtube" aria-hidden="true"></i><span class="accessibility">Youtube</span></a></li>
				</ul>
			</div>
		</footer>
		
		<!--Scripts-->
		
		<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
		<script src="<?php bloginfo('template_url');?>/js/script.js"></script>

		<!--Warn Old Browsers To Quit Being Old-->
		
		<script>var $buoop = {c:2};function $buo_f(){var e = document.createElement("script");e.src = "//browser-update.org/update.min.js";document.body.appendChild(e);};try {document.addEventListener("DOMContentLoaded", $buo_f,false)}catch(e){window.attachEvent("onload", $buo_f)}</script> 
		
		<?php wp_footer(); ?>
	
	</body>
</html>
