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
		<?php get_template_part('partials/subpage-banner'); ?>

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
							</div>
						</div>
					</li>
				</ul>
			</div>
			<div class="u-soft-half--sides">
				<h2><a id="toogleUserDetails"><?php echo icl_t('Theme-mypages', 'Update contact information'); ?></a></h2>
			</div>
			<div class="u-soft-half--sides" id="userDetails" <?php if( ! \User_Handling\User::needUpdate() ) echo 'style="display: none"'; ?>>
				<p>
					<?php echo icl_t('Theme-mypages', 'Username'); ?>: <?php echo $user->user_login; ?>
				</p>
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
			
			<section class="o-section">
				<div class="u-soft-half--sides">
					<h2>1.<?php echo icl_t('Theme-mypages', 'My property'); ?></h2>
				</div>
				<div class="c-results js-results">
					<div class="o-grid o-grid--no-gutter">
						<div class="o-grid__item u-5/8@sm-up">
							<div class="c-results__listing">
								<!--							<h2>-->
								<!--								--><?php //the_field('my_pages-your_objects'); ?>
								<!--							</h2>-->
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
			</section>

			<section class="o-section">
				<div class="u-soft-half--sides">
					<h2>2. <?php echo icl_t('Theme-mypages', 'My documents'); ?></h2>
				</div>
				<!--					the list of the documents-->
				<div class="u-soft-half--sides">
					<?php
					$GLOBALS['pending'] = get_field('my_pages-pending');
					if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post();
					$GLOBALS['my-property'] = true;
					$contractStatus = icl_t('Theme-mypages', 'Incomplete');
					$inventoryStatus = icl_t('Theme-mypages', 'Incomplete');
					$inspectionStatus = icl_t('Theme-mypages', 'Incomplete');
					if(get_field('contract_complete')){
						$contractStatus = icl_t('Theme-mypages', 'Complete');
					}
					if(get_field('inventory_complete')){
						$inventoryStatus = icl_t('Theme-mypages', 'Complete');
					}
					if(get_field('inspection_complete')){
						$inspectionStatus = icl_t('Theme-mypages', 'Complete');
					}

					?>

					<ul class="o-grid o-bare-list" style="padding-top: 8rem;">
						<li class="o-grid__item u-1/4@sm-up">
							<?php

							// Different links based on where the visitor is on the site
							$permalinkContract = $GLOBALS['my-property'] === true ? icl_t('Theme-mypages', 'My contract link') . '/?id=' . $post->ID : get_the_permalink();
							?>
							<h3 class="u-flush--bottom">
								<a class="my-document-link " href="<?php echo $permalinkContract; ?>">
									<span class="c-svg-icon c-svg-icon--mydocument">
										<svg class="c-svg-icon__svg c-svg-icon--mydocument__svg" id="icon-contract">
											<use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-contract"></use>
										</svg>
										<svg class="c-svg-icon__svg c-svg-icon--mydocument__svg" id="icon-contract-alive" style="display: none;">
											<use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-contract-alive"></use>
										</svg>
									</span>
									<?php echo icl_t('Theme-mypages', 'Contract'); ?>
								</a>
							</h3>
							<p id="contractStatus"><?php echo $contractStatus; ?></p>
						</li>
						<li class="o-grid__item u-1/4@sm-up">
							<?php

							// Different links based on where the visitor is on the site
							$permalinkInventory = $GLOBALS['my-property'] === true ? icl_t('Theme-mypages', 'My inventory list link') . '/?id=' . $post->ID : get_the_permalink();
							?>
							<h3 class="u-flush--bottom">
								<a class="my-document-link" href="<?php echo $permalinkInventory; ?>">
									<span class="c-svg-icon c-svg-icon--mydocument">
										<svg class="c-svg-icon__svg c-svg-icon--mydocument__svg" id="icon-inventory">
											<use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-inventory"></use>
										</svg>
										<svg class="c-svg-icon__svg c-svg-icon--mydocument__svg" id="icon-inventory-alive" style="display: none;">
											<use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-inventory-alive"></use>
										</svg>
									</span>
									<?php echo icl_t('Theme-mypages', 'Inventory list'); ?>
								</a>
							</h3>
							<p id="inventoryStatus"><?php echo $inventoryStatus; ?></p>
						</li>
						<li class="o-grid__item u-1/4@sm-up">
							<?php

							// Different links based on where the visitor is on the site
							$permalinkInspection = $GLOBALS['my-property'] === true ? icl_t('Theme-mypages', 'My inspection list link') . '/?id=' . $post->ID : get_the_permalink();
							?>
							<h3 class="u-flush--bottom">
								<a class="my-document-link" href="<?php echo $permalinkInspection; ?>">
									<span class="c-svg-icon c-svg-icon--mydocument">
										<svg class="c-svg-icon__svg c-svg-icon--mydocument__svg" id="icon-inspection">
											<use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-set"></use>
										</svg>
										<svg class="c-svg-icon__svg c-svg-icon--mydocument__svg" id="icon-inspection-alive" style="display: none">
											<use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-set-alive"></use>
										</svg>
									</span>
									<?php echo icl_t('Theme-mypages', 'Inspection list'); ?>
								</a>
							</h3>
							<p id="inspectionStatus"><?php echo $inspectionStatus; ?></p>
						</li>
					</ul>
				<?php endwhile; endif; wp_reset_postdata(); ?>

				</div>
			</section>
		</div>
	</main>
</div>

<?php get_footer(); ?>


































