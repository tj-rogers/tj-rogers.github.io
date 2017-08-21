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
		<div class="footer-sect footer-about">
			<p class="logo-name"><a href="<?php bloginfo('url'); ?>" class="site-logo"><img alt="T.J. Rogers Design" title="T.J. Rogers Design" src="/wp-content/themes/tjrogersdesign/images/site-logo.png" /></a><span class="site-logo-company">TJ Rogers Design<span class="site-logo-company-tag">Web Deigner &amp; Developer</span></span></p>
			<p>I am a developer/designer who&rsquo;s based out of Orlando, FL. I get to build websites and design user experiences, as well as craft email campaigns and work on small print projects.</p>
		</div>
		<div class="footer-sect footer-nav">
			<?php 
				$defaults = array(
					'container' => false,
					'theme_location' => primary-menu,
					'menu_class' => 'footer-menu'
				);
				wp_nav_menu( $defaults );
			?>
		</div><!-- /footer-nav -->

		<div class="footer-sect footer-contact-info">

			<div class="footer-loc">
				<p class="footer-loc-icn"><img src="/wp-content/themes/tjrogersdesign/images/location-pin.svg"></p>
				<p class="footer-loc-text"><span>Based in </span>Orlando, FL</p>
			</div><!-- /hdr-loc -->

			<div class="footer-phone">
				<p class="footer-phone-icn"><img src="/wp-content/themes/tjrogersdesign/images/phone-icn.svg"></p>
				<p class="footer-phone-text"><span>You can reach me at</span>321-759-5494</p>
			</div><!-- /footer-phone -->	
		</div><!-- /footer-contact-info -->
	</div><!-- /footer -->
</div><!-- /footer-wrap -->

<div class="copyrightWrapOuter">
	<div class="copyrightWrap">
		<p class="copyright">&copy; <?php echo date('Y'); ?> TJ Rogers Design &bull; All rights reserved.</p><!-- copyright -->
		<p class="crQuote">"Imagination is more important than knowledge" -Albert&nbsp;Einstein</p>
	</div>
</div>

</body>
</html>