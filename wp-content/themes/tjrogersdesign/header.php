<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.0//EN"
  "http://www.w3.org/MarkUp/DTD/xhtml-rdfa-1.dtd">

<html <?php language_attributes(); ?>>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language; ?>" version="XHTML+RDFa 1.0" dir="<?php print $language->dir; ?>"<?php print $rdf_namespaces; ?>>

<meta name="p:domain_verify" content="bd2ffac01c605416040817b2b34b6058"/>
  
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<title><?php wp_title(''); ?></title>

	<script src="https://use.fontawesome.com/341fd61912.js"></script>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="tagline-social-wrap">
	<div class="tagline-social">
		<p class="tagline">Web Design &bull; Web Development &bull; Brand Enhancement</p>

		<div class="social">
			<a href="https://www.behance.net/tjrogers82" class="socialBehance"><i class="fa fa-behance">&nbsp;</i></a>
			<a href="https://vimeo.com/tjrogers" class="socialVimeo"><i class="fa fa-vimeo-square">&nbsp;</i></a>
			<a href="https://www.youtube.com/c/TerranceRogers" class="social-youtube"><i class="fa fa-youtube-play">&nbsp;</i></a>
			<a href="https://twitter.com/#!/tjrogers82" class="socialTwitter"><i class="fa fa-twitter">&nbsp;</i></a>
			<a href="http://www.linkedin.com/in/tjrogers82" class="socialLinkedin"><i class="fa fa-linkedin">&nbsp;</i></a>
			<a href="http://www.pinterest.com/tjrogers82/" class="socialPinterest"><i class="fa fa-pinterest">&nbsp;</i></a>
			<a href="http://instagram.com/tjrogers82" class="socialInstagram"><i class="fa fa-instagram">&nbsp;</i></a>
			<a href="http://dribbble.com/tjrogers82" class="socialDribble"><i class="fa fa-dribbble">&nbsp;</i></a>
			<a href="http://codepen.io/tjrogers82/" class="socialCodepen"><i class="fa fa-codepen">&nbsp;</i></a>
		</div><!-- social -->  
	</div><!-- /tagline-social -->
</div><!-- /tagline-social-wrap -->

<div class="hdr-logo-contact-wrap">
	<div class="hdr-logo-contact">
		<p class="logo-name"><a href="<?php bloginfo('url'); ?>" class="site-logo"><img alt="T.J. Rogers Design" title="T.J. Rogers Design" src="/wp-content/themes/tjrogersdesign/images/site-logo-blk.png" /></a><span class="site-logo-company">TJ Rogers Design<span class="site-logo-company-tag">Web Design &amp; Development</span></span></p>
		
		<div class="hdr-contact-info">
			<div class="hdr-loc">
				<p class="hdr-loc-icn"><img src="/wp-content/themes/tjrogersdesign/images/location-pin.svg"></p>
				<p class="hdr-loc-text"><span>Based in </span>Orlando, FL</p>
			</div><!-- /hdr-loc -->

			<div class="hdr-phone">
				<p class="hdr-phone-icn"><img src="/wp-content/themes/tjrogersdesign/images/phone-icn.svg"></p>
				<p class="hdr-phone-text"><span>You can reach me at</span>321-345-8120</p>
			</div><!-- /hdr-phone -->	
		</div><!-- /hdr-contact-info -->
	</div><!-- /hdr-logo-contact -->
</div><!-- /hdr-logo-contact-wrap -->

<div class="top-nav-wrap">		
		<div class="top-nav">
			<?php 
				$defaults = array(
					'container' => false,
					'theme_location' => primary-menu,
					'menu_class' => 'menu'
				);

				wp_nav_menu( $defaults );

			?>
		</div><!-- /top-nav -->	
</div><!-- /top-nav-wrap -->

<div class="header-wrap-outer">
	<div class="header-wrap">
		<div class="feature-area">
			<?php 
				if(is_home()){ ?>
					<h1><?php echo get_the_title( get_option('page_for_posts', true) ); ?></h1>
				<?php }
			 ?>
			<?php dynamic_sidebar( 'feature-area' ); ?>
		</div><!-- /feature-area -->
	</div><!-- /header-wrap -->
</div><!-- /header-wrap-outer -->

























