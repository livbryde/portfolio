<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package rixo
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'rixo' ); ?></a>
	
<div class="outerContainer">

	<header id="masthead" class="site-header">
		
		<div class="responsive-container">
		
			<div class="site-branding">
				
				<?php
				
					$custom_logo_id = get_theme_mod( 'custom_logo' );
					$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
					if ( has_custom_logo() ) {
							echo '<a href="' . esc_url( home_url( '/' ) ) . '"><img src="'. esc_url( $logo[0] ) .'"></a>';
					} else {
							echo '<h1>'. esc_html(get_bloginfo( 'name' )) .'</h1>';
							$rixo_description = get_bloginfo( 'description', 'display' );
							if ( $rixo_description || is_customize_preview() ){
								echo '<p class="site-description">' . esc_html($rixo_description) . '</p>';
							}
					}			
				
				?>
				
				<span class="menu-button"></span>

			</div><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation">
				
				<div class="menu-container">
				
					<?php
					wp_nav_menu( array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
						'depth' => 1,
						'container_class' => 'rixo-menu',
					) );
					?>
				
				</div><!-- .menu-container -->

			</nav><!-- #site-navigation -->
		
		</div>
		
	</header><!-- #masthead -->
	
	<?php 

		if( 'no' != get_theme_mod('rixo_show_slider') ){
				
			get_template_part( 'template-parts/header' );
			
		}

	?>
	
	<?php
	
		if( is_front_page() && 'page' == get_option( 'show_on_front') && 'no' != get_theme_mod('rixo_show_welcome') ) :
	
			$rixoWelcomePostTitle = '';
			$rixoWelcomePostExcerpt = '';
			$rixoWelcomePostContent = '';
			
			if( '' != get_theme_mod('rixo_welcome_post') && 'select' != get_theme_mod('rixo_welcome_post') ){
				
				$rixoWelcomePostId = get_theme_mod('rixo_welcome_post');
				
				if( ctype_alnum($rixoWelcomePostId) ){

					$rixoWelcomePost = get_post( $rixoWelcomePostId );
				
					$rixoWelcomePostTitle = $rixoWelcomePost->post_title;
					$rixoWelcomePostExcerpt = $rixoWelcomePost->post_excerpt;
					$rixoWelcomePostContent = $rixoWelcomePost->post_content;
				}
				
			}	
	
	?>
	<div class="frontWelcomeContainer">
		
		<h1><?php echo esc_html($rixoWelcomePostTitle); ?></h1>
		<div>
			<?php 
				
				if( '' != $rixoWelcomePostExcerpt ){
					
					echo esc_html($rixoWelcomePostExcerpt);
					
				}else{
					
					echo esc_html($rixoWelcomePostContent);
					
				}
			
			?>
		</div>		
		
	</div><!-- .frontWelcomeContainer -->
	<?php endif; ?>

	<div id="content" class="site-content">
