<?php
/*
Template Name: Login
*/
?>
<?php
// Disables the login page for logged in users
if( is_user_logged_in() ) {
	wp_safe_redirect( icl_t('Theme-mypages', 'My pages link') );
	exit;
}
?>
<?php get_header(); ?>
<div class="c-page-content js-page-content" id="mainContent">
	<div class="c-site-header-placeholder">
	</div>
	<main role="main">
		<?php get_template_part('partials/subpage-banner'); ?>
		<section>
			<div class="o-section o-site-wrap o-site-wrap--padding">
				<div class="o-grid u-text-center">
					<div class="o-grid__item u-2/4@sm-up ">
						<div class="o-section u-hard--bottom">
							<?php get_template_part( 'partials/part-signup' ); ?>
						</div>
					</div>
				</div>
			</div>
		</section>
	</main>
</div>

<?php get_footer(); ?>
