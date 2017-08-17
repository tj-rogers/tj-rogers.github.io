<?php wp_footer(); ?>

	<div class="content-bottom-wrap">
		<div class="content-bottom">
		<p>Content Bottom</p>
		</div>
	</div>

<div class="prefooter">  
	<p>Prefooter</p>
</div>
    
<div class="footer-wrap">
	<div class="footer">
		<div class="footer-about">
			<h2>Who is this guy?</h2>
			<p>I am a developer/designer who&rsquo;s based out of Orlando, FL. I get to build websites and design user experiences, as well as craft email campaigns and work on small print projects.</p>
			<p>When I&rsquo;m not working on client projects, you can find me on stage performing, playing basketball or doing other outdoorsy things (like walking around Disney World). I also find joy in doing side projects.</p>
			<p>My wonderful wife Kristi and I love traveling, trying new cuisine, venturing through the Walt Disney World parks, and being involved with the community at Summit Church.</p>
		</div>
		<div class="footer-nav">
			<?php 
				$defaults = array(
					'container' => false,
					'theme_location' => primary-menu,
					'menu_class' => '-footer-menu'
				);
				wp_nav_menu( $defaults );
			?>
		</div><!-- /footer-nav -->
	</div><!-- /footer -->
</div><!-- /footer-wrap -->

<div class="copyrightWrapOuter">
	<div class="copyrightWrap">
		<p class="copyright">&copy; <?php echo date('Y'); ?> Terrance J. Rogers. All rights reserved.</p><!-- copyright -->
		<p class="crQuote">"Imagination is more important than knowledge" -Albert&nbsp;Einstein</p>
	</div>
</div>

</body>
</html>