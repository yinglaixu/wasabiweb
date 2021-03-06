<?php
/*
Template Name: My pages
*/
?>
<?php
// Only visable to logged in users
if( ! is_user_logged_in() ) {

	wp_safe_redirect( icl_t('Theme-login', 'Login page link') );
	exit;
}

// Get current user
$user = wp_get_current_user();
?>
<?php get_header(); ?>
<div class="c-page-content js-page-content" id="mainContent">
	<div class="c-site-header-placeholder">
	</div>
	<?php
	// Get the users properties
	$args = [
		'post_type' => 'property',
		'posts_per_page' => -1,
		'meta_key' => 'price',
		'orderby' => 'meta_value_num',
		'order' => 'asc',
		'post_status' => 'any',
		'meta_query' => [
			[
				'key' => 'owner',
				'value' => $user->ID,
				'compare' => '=',
			],
		],
	];
	$query = new WP_Query( $args );
	?>
	<main role="main" class="u-bg-eta">
		<div class="o-site-wrap o-site-wrap--padding">
			<div class="u-soft-half--sides">
				<ul class="[ c-ui-list c-ui-list--dark ] u-hard--bottom [ u-clean--top u-clean--bottom ]">
					<li class="u-hard--sides">
						<h1 class="u-push-half--bottom"><?php the_title(); ?></h1>
						<div class="o-flag">
							<div class="o-flag__body u-block@sm-down u-txt-md">
								<?php the_content(); ?>
							</div>
							<div class="o-flag__component u-block@sm-down u-soft-half--top@sm-down">
								<ul class="o-inline-list o-inline-list--spaced u-txt-zeta">
									<li>
										<a href="<?php echo wp_lostpassword_url( site_url() ); ?>"><?php the_field('my_pages-change_password'); ?></a>
									</li>
									<li>
										<a href="<?php echo wp_logout_url( site_url() ); ?>"><?php the_field('my_pages-log_out'); ?></a>
									</li>
								</ul>
								<a href="" id="toogleUserDetails"><?php echo icl_t('Theme-mypages', 'Update contact information'); ?></a>
							</div>
						</div>
					</li>
				</ul>
			</div>
			<div class="u-soft-half--sides" id="userDetails" <?php if( ! \User_Handling\User::needUpdate() ) echo 'style="display: none"'; ?>>
				<h3>
					<?php echo icl_t('Theme-mypages', 'Username'); ?>: <?php echo $user->user_login; ?>
				</h3>
				<?php //var_dump($user); ?>
				<form class="c-block-form" id="updateuserform" method="post">
					<?php wp_nonce_field( 'update_user', 'update_user_nonce' ); ?>
					<ul class="o-grid o-grid--matrix">
						<li class="o-grid__item u-1/2@sm-up">
							<ul class="o-bare-list o-bare-list--spaced-sixth">
								<li>
									<label for="rooms">
										<strong><?php echo icl_t('Theme-form', 'Forename'); ?>:</strong>
									</label>
								</li>
								<li>
									<div class="c-addon-group c-addon-group--inside c-addon-group--inside--right">
										<input name="update[firstname]" id="rooms" type="text" class="c-text-input c-text-input--lg c-addon-group--inside__input" value="<?php echo $user->first_name; ?>">

									</div>
								</li>
							</ul>
						</li>
						<li class="o-grid__item u-1/2@sm-up">
							<ul class="o-bare-list o-bare-list--spaced-sixth">
								<li>
									<label for="volume">
										<strong><?php echo icl_t('Theme-form', 'Surname'); ?>:</strong>
									</label>
								</li>
								<li>
									<div class="c-addon-group c-addon-group--inside c-addon-group--inside--right">
										<input name="update[surname]" id="volume" type="text" class="c-text-input c-text-input--lg c-addon-group--inside__input" value="<?php echo $user->last_name; ?>">
									</div>
								</li>
							</ul>
						</li>
						<li class="o-grid__item u-1/2@sm-up">
							<ul class="o-bare-list o-bare-list--spaced-sixth">
								<li>
									<label for="address">
										<strong><?php echo icl_t('Theme-form', 'Telephonenumber'); ?>:</strong>
									</label>
								</li>
								<li>
									<input type="number" name="update[phone]" id="address" class="c-text-input c-text-input--lg" value="<?php echo $user->description; ?>">
								</li>
							</ul>
						</li>
						<li class="o-grid__item u-1/2@sm-up">
							<ul class="o-bare-list o-bare-list--spaced-sixth">
								<li>
									<label for="email">
										<strong><?php echo icl_t('Theme-form', 'E-mail'); ?>:</strong>
									</label>
								</li>
								<li>
									<input required type="text" name="update[email]" id="email" class="c-text-input c-text-input--lg" value="<?php echo $user->user_email; ?>">
								</li>
							</ul>
						</li>
						<li class="o-grid__item">
							<button type="submit" class="c-btn c-btn--xl c-btn--alpha">
								<?php echo icl_t('Theme-mypages', 'Update'); ?>
							</button>
						</li>
					</ul>
				</form>

			</div>
			<div class="c-results js-results">
				<div class="o-grid o-grid--no-gutter">
					<div class="o-grid__item u-5/8@sm-up">
						<div class="c-results__listing">
							<h2>
								<?php the_field('my_pages-your_objects'); ?>
							</h2>
							<ul class="c-ui-list u-hard--ends [ u-clean--top u-clean--bottom ]">
								<?php
								$GLOBALS['pending'] = get_field('my_pages-pending');
								if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post();
									$GLOBALS['my-property'] = true;
									?>
									<li class="u-hard--sides">
										<?php get_template_part('partials/property-overview'); ?>
									</li>
								<?php endwhile; endif; wp_reset_postdata(); ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
</div>

<?php get_footer(); ?>
