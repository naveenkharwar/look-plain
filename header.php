<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package plain_theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'look-plain' ); ?></a>

	<header id="masthead" class="site-header">
		<nav class="navbar navbar-expand-md navbar-light" role="navigation">
		<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
		</button>
		<?php $custom_logo_id = get_theme_mod( 'custom_logo' ); ?>
		<?php $logo = wp_get_attachment_image_src( $custom_logo_id, 'small' ); ?>
		<?php
		if ( has_custom_logo() ) {
			echo '<img src="' . esc_url( $logo[0] ) . '">';
		} else {
			?>
			<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
		<?php } ?>
		<?php
		wp_nav_menu(
			array(
				'theme_location'  => 'primary',
				'depth'           => 3,
				'container'       => 'div',
				'container_class' => 'collapse navbar-collapse',
				'container_id'    => 'bs-example-navbar-collapse-1',
				'menu_class'      => 'nav navbar-nav',
				'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
				'walker'          => new WP_Bootstrap_Navwalker(),
			)
		);
		?>
		</div>
		</nav><!-- #site-navigation -->
</header><!-- #masthead -->

<?php if ( is_single() ) { ?>
	<div class="sh-table sh-titlebar sh-titlebar-height-small">
		<div class="container">
			<div class="row breadcrumbs-center">
				<div class="title-level sh-table-cell breadcrumbs">
					<?php look_plain_get_breadcrumb(); ?>
				</div>
			</div>
		</div>
	</div>		
<?php } ?>

<div id="content" class="site-content">
	<div class="container">

