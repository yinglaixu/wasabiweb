<?php
/*
Template Name: contact thanks
*/
?>

<?php get_header(); ?>

<div class="c-page-content js-page-content" id="mainContent">
	<div class="c-site-header-placeholder">
	</div>
	<main role="main">
		<?php get_template_part('partials/subpage-banner'); ?>
		<article class="o-section o-site-wrap o-site-wrap--padding">
			<div class="o-grid">
				<div class="o-grid__item u-1/2@md-up">
					<h1>
						<?php the_title(); ?>
					</h1>
					<?php the_content(); ?>
					<a href="<?= $_SERVER['HTTP_REFERER']; ?>">&laquo;<?php echo icl_t('Theme', 'Go back'); ?></a>
				</div>
			</div>
		</article>
		
	</main>

</div>
<?php get_footer(); ?>