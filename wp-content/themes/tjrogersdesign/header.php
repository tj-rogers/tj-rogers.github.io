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

<body class="tjr-main" <?php body_class(); ?>>

<div class="headerFixedOuter">
	<div class="headerFixed">
		<a href="/" class="siteLogo"><img alt="T.J. Rogers | Web Developer/Artist/Geek" title="T.J. Rogers | Web Developer/Artist/Geek" src="/sites/all/themes/tjr/global-images/site-logo.png" /></a>
		
		<div class="topNavFixed">
			<?php print render($page['topnavfixed']); ?>

			<p>I run it</p>
		</div><!-- /topNavFixed -->	
	</div><!-- /headerFixed -->
</div><!-- /headerFixedOuter -->

<div class="headerWrapOuter">
	<div class="headerWrap">
		<div class="featureArea">
			<?php print render($page['feature']); ?>
		</div><!-- /featureArea -->
	</div><!-- /headerWrap -->
	<br class="clearfloat" />
</div><!-- /headerWrapOuter -->