<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Shot_2_Frame
 */

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

		<!-- Bootstrap -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

		<!-- Lightbox -->
		<link href="<?php bloginfo('template_directory'); ?>/assets/css/lightbox.min.css" rel="stylesheet">

		<!-- Font Awesome Icons -->
		<link href="https://use.fontawesome.com/ba534531f6.css" rel="stylesheet">

		<!-- Google Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Oswald:300" rel="stylesheet">

		<?php wp_head(); ?>

		<?php 

		    // declare $post global if used outside of the loop
		    global $post;

		    // check to see if the theme supports Featured Images, and one is set
		    if (current_theme_supports( 'post-thumbnails' ) && has_post_thumbnail( $post->ID )) {
		            
		        // specify desired image size in place of 'full'
		        $page_bg_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
		        $page_bg_image_url = $page_bg_image[0]; // this returns just the URL of the image

		    } else {
		        // the fallback – our current active theme's default bg image
		        $page_bg_image_url = get_background_image();
		    }

		    // And below, spit out the <style> tag... ?>
		    <style type="text/css" id="custom-background-css-override">
		        body.custom-background { background-image: url('<?php echo $page_bg_image_url; ?>'); }
		    </style>

		<!-- HTML5 shiv and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>

	<body <?php body_class(); 
		$custom_logo_id = get_theme_mod( 'custom_logo' );
		$image = wp_get_attachment_image_src( $custom_logo_id , 'full' ); ?>>

		<div id="page" class="site">
			<a class="skip-link screen-reader-text" href="#main">
				<?php esc_html_e( 'Skip to content', 'shot2frame' ); ?>
			</a>

			<!-- NAV
		    ================================================== -->
			<nav class="navbar navbar-default navbar-fixed-top">
				<div class="container-fluid">
				    <div class="navbar-header">
				        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				            <span class="sr-only">Toggle navigation</span>
				            <span class="icon-bar"></span>
				            <span class="icon-bar"></span>
				            <span class="icon-bar"></span>
				        </button>
			   
		                <div class="logo">
		                	<?php echo the_custom_logo( $blog_id = 0 ); ?>
		                </div>
			    	</div>

				    <!-- Collect the nav links, forms, and other content for toggling -->
				    <div class="collapse navbar-collapse navbar-ex1-collapse">
				        <?php
				        wp_nav_menu( array(
				            'theme_location' => 'primary',
				            'depth' => 2,
				            'container' => false,
				            'menu_class' => 'nav navbar-nav navbar-right',
				            'fallback_cb' => 'wp_page_menu',
				            //Process nav menu using our custom nav walker
				            'walker' => new wp_bootstrap_navwalker())
				        );
				        ?>
				    </div><!-- /.navbar-collapse --> 
				</div>
			</nav>

