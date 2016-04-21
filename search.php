<?php get_header(); ?>
<div class="c-page-content js-page-content" id="mainContent">
	<section class="[ o-site-wrap o-site--padding ] o-section">
		<h1>
			Sökresultat
		</h1>
		<div class="search-term">
			<?php
				global $wp_query;
				$search = get_query_var('s');
				$count = $wp_query->found_posts;
			?>
			<p>Resultat för <strong><?php echo $search; ?></strong> (<?php echo $count; ?> träffar)</p>
		</div>
		<?php for($i=0; $i<6; $i++) : ?>
			<article class="o-grid">
				<div class="o-grid__item u-1/2@sm-up">
					<a href="#" class="c-search-result o-ui-link">
						<h1 class="u-txt-md">
							Result 1
						</h1>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis velit lorem, porta eu ante sit amet, fermentum sagittis sem. Nullam id malesuada massa...</p>
					</a>
				</div>
			</article>
		<?php endfor; ?>
	</section>
</div>

<?php get_footer(); ?>