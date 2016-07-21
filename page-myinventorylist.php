<?php
/*
Template Name: My inventory list
*/
?>
<?php
// Is user logged in?
if( ! is_user_logged_in() ) {
	wp_safe_redirect( icl_t('Theme-login', 'Login page link') );
	exit;
}

// Do this user own this property?
$user = wp_get_current_user();
$obj_id = intval( $_GET['id'] );
$owner = get_field( 'owner', $obj_id );
if( ! ( intval( $user->ID ) === intval( $owner['ID'] ) ) ) {
	wp_safe_redirect( site_url() );
	exit;
};
?>
<?php get_header(); ?>

<?php

// Save some page variables
$inventory_form_title = get_field('inventory_form_title');
$view_inventory_btn = get_field('view_inventory_btn');
$explanation_inventory_list = get_field('explanation_inventory_list');
$inventory_content_title = get_field('inventory_content_title');
$change_inventory_btn = get_field('change_inventory_btn');

// Everything is OK
$post = get_post( $obj_id );

setup_postdata( $post );
?>
<div class="c-page-content js-page-content" id="mainContent">
	<div class="c-site-header-placeholder">
	</div>
	<main role="main">

		<section class="o-section" id="inventory-form" style="display: block;">
			<?php
			$val = $GLOBALS['simplerap'];
			$error_style = 'style="color:red"';
			?>
			<form class="c-block-form" id="landlordinventoryform" method="post" enctype="multipart/form-data">
				<input type="hidden" name="inventoryform" value="true">
				<input type="hidden" name="property_id" value="<?php echo $post->ID; ?>">
				<?php
				$complete = 0;
				if(get_field('inventory_complete')){
					$complete = 1;
				}
				?>
				<input type="hidden" name="inventory_condition" value="<?php echo $complete; ?>">
				<input type="hidden" name="inventory[useremail]" value="<?php the_field('owner'); ?>">
				<input type="hidden" name="inventory[first_name]" value="<?php the_field('first_name'); ?>">
				<input type="hidden" name="inventory[surname]" value="<?php the_field('surname'); ?>">
				<input type="hidden" name="inventory[address]" value="<?php the_field('address'); ?>">
				<div class="o-site-wrap o-site-wrap--padding">
					<ul class="c-ui-list u-hard--ends [ u-clean--top u-clean--bottom ]">
						<li class="u-hard--sides">
							<div class="o-grid u-text-center">
								<div class="o-grid__item u-3/4@sm-up u-text-center">
									<h1><?php echo $inventory_form_title; ?></h1>
									<a class="c-btn c-btn--md c-btn--brand" id="btn-view-inventory">
										<?php echo $view_inventory_btn; ?>
									</a>
									<p></p>
									<p><?php echo $explanation_inventory_list; ?></p>
								</div>
							</div>
						</li>
						<!--kitchen-->
						<li class="u-hard--sides">
							<div id="inventory-list-wrap">
								<div class="js-clone-inventory-group" id="inventory-kitchen-lists">
									<div class="o-grid">
										<div class="o-grid__item u-1/4@sm-up">
											<h2><?php echo icl_t('Theme-inventory_inspection', 'Kitchen'); ?></h2>
										</div>
										<div class="o-grid__item u-1/4@sm-up">
											<a href="#" id="btn-add-kitchen">
												+ <?php echo icl_t('Theme-inventory_inspection', 'Add line'); ?>
											</a>
										</div>
									</div>

									<ul class="o-grid o-grid--matrix u-flush--bottom">
										<li class="o-grid__item u-1/2@sm-up js-clone-inventory-group__name">
											<ul class="o-bare-list o-bare-list--spaced-sixth">
												<li>
													<label>
														<?php echo icl_t('Theme-inventory_inspection', 'Name'); ?>:
													</label>
												</li>
											</ul>
										</li>
										<li class="o-grid__item u-1/2@sm-up js-clone-inventory-group__name">
											<ul class="o-bare-list o-bare-list--spaced-sixth">
												<li>
													<label>
														<?php echo icl_t('Theme-inventory_inspection', 'Count'); ?>:
													</label>
												</li>
											</ul>
										</li>
									</ul>
									<!--get current row-->
									<?php

									if( have_rows('inventory_list_kitchen') ):

										while( have_rows('inventory_list_kitchen') ) : the_row();

											?>

											<ul class="o-grid o-grid--matrix u-flush--bottom">
												<li class="o-grid__item u-1/2@sm-up js-clone-inventory-group__name">
													<ul class="o-bare-list o-bare-list--spaced-sixth">
														<li>
															<div class="c-addon-group c-addon-group--inside c-addon-group--inside--right u-pointer">
																<input name="inventory[kitchen-name][]" type="text" placeholder=" " class="c-text-input c-text-input--lg c-addon-group--inside__input" value="<?php the_sub_field('inventory_list_kitchen_name'); ?>">
															</div>
														</li>
													</ul>
												</li>
												<li class="o-grid__item u-1/4@sm-up js-clone-inventory-group__description">
													<ul class="o-bare-list o-bare-list--spaced-sixth">
														<li>
															<div class="c-addon-group c-addon-group--inside c-addon-group--inside--right u-pointer">
																<input name="inventory[kitchen-count][]" type="text" placeholder=" " class="c-text-input c-text-input--lg c-addon-group--inside__input" value="<?php the_sub_field('inventory_list_kitchen_count'); ?>">
															</div>
														</li>
													</ul>
												</li>
												<li class="o-grid__item u-1/4@sm-up">
													<a href="#" class="c-svg-icon c-svg-icon--trash trash">
														<svg class="c-svg-icon__svg c-svg-icon--trash__svg">
															<use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-trash"></use>
														</svg>
													</a>
												</li>
											</ul>

											<?php

										endwhile;

									endif;

									?>
								</div>
							</div>
						</li>
						<!--living room-->
						<li class="u-hard--sides">
							<div id="inventory-list-wrap">
								<div class="js-clone-inventory-group" id="inventory-livingroom-lists">
									<div class="o-grid">
										<div class="o-grid__item u-1/4@sm-up">
											<h2><?php echo icl_t('Theme-inventory_inspection', 'Living room'); ?></h2>
										</div>
										<div class="o-grid__item u-1/4@sm-up">
											<a href="#" id="btn-add-livingroom">
												+ <?php echo icl_t('Theme-inventory_inspection', 'Add line'); ?>
											</a>
										</div>
									</div>
									<ul class="o-grid o-grid--matrix u-flush--bottom">
										<li class="o-grid__item u-1/2@sm-up js-clone-inventory-group__name">
											<ul class="o-bare-list o-bare-list--spaced-sixth">
												<li>
													<label>
														<?php echo icl_t('Theme-inventory_inspection', 'Name'); ?>:
													</label>
												</li>
											</ul>
										</li>
										<li class="o-grid__item u-1/2@sm-up js-clone-inventory-group__name">
											<ul class="o-bare-list o-bare-list--spaced-sixth">
												<li>
													<label>
														<?php echo icl_t('Theme-inventory_inspection', 'Count'); ?>:
													</label>
												</li>
											</ul>
										</li>
									</ul>
									<!--get current row-->
									<?php

									if( have_rows('inventory_list_livingroom') ):

										while( have_rows('inventory_list_livingroom') ) : the_row();

											?>

											<ul class="o-grid o-grid--matrix u-flush--bottom">
												<li class="o-grid__item u-1/2@sm-up js-clone-inventory-group__name">
													<ul class="o-bare-list o-bare-list--spaced-sixth">
														<li>
															<div class="c-addon-group c-addon-group--inside c-addon-group--inside--right u-pointer">
																<input name="inventory[livingroom-name][]" type="text" placeholder=" " class="c-text-input c-text-input--lg c-addon-group--inside__input" value="<?php the_sub_field('inventory_list_livingroom_name'); ?>">
															</div>
														</li>
													</ul>
												</li>
												<li class="o-grid__item u-1/4@sm-up js-clone-inventory-group__description">
													<ul class="o-bare-list o-bare-list--spaced-sixth">
														<li>
															<div class="c-addon-group c-addon-group--inside c-addon-group--inside--right u-pointer">
																<input name="inventory[livingroom-count][]" type="text" placeholder=" " class="c-text-input c-text-input--lg c-addon-group--inside__input" value="<?php the_sub_field('inventory_list_livingroom_count'); ?>">
															</div>
														</li>
													</ul>
												</li>
												<li class="o-grid__item u-1/4@sm-up">
													<a href="#" class="c-svg-icon c-svg-icon--trash trash">
														<svg class="c-svg-icon__svg c-svg-icon--trash__svg">
															<use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-trash"></use>
														</svg>
													</a>
												</li>
											</ul>

											<?php

										endwhile;

									endif;

									?>
								</div>
							</div>
						</li>
						<!--bathroom-->
						<li class="u-hard--sides">
							<div id="inventory-list-wrap">
								<div class="js-clone-inventory-group" id="inventory-bathroom-lists">
									<div class="o-grid">
										<div class="o-grid__item u-1/4@sm-up">
											<h2><?php echo icl_t('Theme-inventory_inspection', 'Bathroom'); ?></h2>
										</div>
										<div class="o-grid__item u-1/4@sm-up">
											<a href="#" id="btn-add-bathroom">
												+ <?php echo icl_t('Theme-inventory_inspection', 'Add line'); ?>
											</a>
										</div>
									</div>
									<ul class="o-grid o-grid--matrix u-flush--bottom">
										<li class="o-grid__item u-1/2@sm-up js-clone-inventory-group__name">
											<ul class="o-bare-list o-bare-list--spaced-sixth">
												<li>
													<label>
														<?php echo icl_t('Theme-inventory_inspection', 'Name'); ?>:
													</label>
												</li>
											</ul>
										</li>
										<li class="o-grid__item u-1/2@sm-up js-clone-inventory-group__name">
											<ul class="o-bare-list o-bare-list--spaced-sixth">
												<li>
													<label>
														<?php echo icl_t('Theme-inventory_inspection', 'Count'); ?>:
													</label>
												</li>
											</ul>
										</li>
									</ul>
									<!--get current row-->
									<?php

									if( have_rows('inventory_list_bathroom') ):

										while( have_rows('inventory_list_bathroom') ) : the_row();

											?>

											<ul class="o-grid o-grid--matrix u-flush--bottom">
												<li class="o-grid__item u-1/2@sm-up js-clone-inventory-group__name">
													<ul class="o-bare-list o-bare-list--spaced-sixth">
														<li>
															<div class="c-addon-group c-addon-group--inside c-addon-group--inside--right u-pointer">
																<input name="inventory[bathroom-name][]" type="text" placeholder=" " class="c-text-input c-text-input--lg c-addon-group--inside__input" value="<?php the_sub_field('inventory_list_bathroom_name'); ?>">
															</div>
														</li>
													</ul>
												</li>
												<li class="o-grid__item u-1/4@sm-up js-clone-inventory-group__description">
													<ul class="o-bare-list o-bare-list--spaced-sixth">
														<li>
															<div class="c-addon-group c-addon-group--inside c-addon-group--inside--right u-pointer">
																<input name="inventory[bathroom-count][]" type="text" placeholder=" " class="c-text-input c-text-input--lg c-addon-group--inside__input" value="<?php the_sub_field('inventory_list_bathroom_count'); ?>">
															</div>
														</li>
													</ul>
												</li>
												<li class="o-grid__item u-1/4@sm-up">
													<a href="#" class="c-svg-icon c-svg-icon--trash trash">
														<svg class="c-svg-icon__svg c-svg-icon--trash__svg">
															<use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-trash"></use>
														</svg>
													</a>
												</li>
											</ul>

											<?php

										endwhile;

									endif;

									?>
								</div>
							</div>
						</li>
						<!--bedroom-->
						<li class="u-hard--sides">
							<div id="inventory-list-wrap">
								<div class="js-clone-inventory-group" id="inventory-bedroom-lists">
									<div class="o-grid">
										<div class="o-grid__item u-1/4@sm-up">
											<h2><?php echo icl_t('Theme-inventory_inspection', 'Bedroom'); ?></h2>
										</div>
										<div class="o-grid__item u-1/4@sm-up">
											<a href="#" id="btn-add-bedroom">
												+ <?php echo icl_t('Theme-inventory_inspection', 'Add line'); ?>
											</a>
										</div>
									</div>
									<ul class="o-grid o-grid--matrix u-flush--bottom">
										<li class="o-grid__item u-1/2@sm-up js-clone-inventory-group__name">
											<ul class="o-bare-list o-bare-list--spaced-sixth">
												<li>
													<label>
														<?php echo icl_t('Theme-inventory_inspection', 'Name'); ?>:
													</label>
												</li>
											</ul>
										</li>
										<li class="o-grid__item u-1/2@sm-up js-clone-inventory-group__name">
											<ul class="o-bare-list o-bare-list--spaced-sixth">
												<li>
													<label>
														<?php echo icl_t('Theme-inventory_inspection', 'Count'); ?>:
													</label>
												</li>
											</ul>
										</li>
									</ul>
									<!--get current row-->
									<?php

									if( have_rows('inventory_list_bedroom') ):

										while( have_rows('inventory_list_bedroom') ) : the_row();

											?>

											<ul class="o-grid o-grid--matrix u-flush--bottom">
												<li class="o-grid__item u-1/2@sm-up js-clone-inventory-group__name">
													<ul class="o-bare-list o-bare-list--spaced-sixth">
														<li>
															<div class="c-addon-group c-addon-group--inside c-addon-group--inside--right u-pointer">
																<input name="inventory[bedroom-name][]" type="text" placeholder=" " class="c-text-input c-text-input--lg c-addon-group--inside__input" value="<?php the_sub_field('inventory_list_bedroom_name'); ?>">
															</div>
														</li>
													</ul>
												</li>
												<li class="o-grid__item u-1/4@sm-up js-clone-inventory-group__description">
													<ul class="o-bare-list o-bare-list--spaced-sixth">
														<li>
															<div class="c-addon-group c-addon-group--inside c-addon-group--inside--right u-pointer">
																<input name="inventory[bedroom-count][]" type="text" placeholder=" " class="c-text-input c-text-input--lg c-addon-group--inside__input" value="<?php the_sub_field('inventory_list_bedroom_count'); ?>">
															</div>
														</li>
													</ul>
												</li>
												<li class="o-grid__item u-1/4@sm-up">
													<a href="#" class="c-svg-icon c-svg-icon--trash trash">
														<svg class="c-svg-icon__svg c-svg-icon--trash__svg">
															<use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-trash"></use>
														</svg>
													</a>
												</li>
											</ul>

											<?php

										endwhile;

									endif;

									?>
								</div>
							</div>
						</li>
						<!--toalett-->
						<li class="u-hard--sides">
							<div id="inventory-list-wrap">
								<div class="js-clone-inventory-group" id="inventory-toalett-lists">
									<div class="o-grid">
										<div class="o-grid__item u-1/4@sm-up">
											<h2><?php echo icl_t('Theme-inventory_inspection', 'Toalett'); ?></h2>
										</div>
										<div class="o-grid__item u-1/4@sm-up">
											<a href="#" id="btn-add-toalett">
												+ <?php echo icl_t('Theme-inventory_inspection', 'Add line'); ?>
											</a>
										</div>
									</div>
									<ul class="o-grid o-grid--matrix u-flush--bottom">
										<li class="o-grid__item u-1/2@sm-up js-clone-inventory-group__name">
											<ul class="o-bare-list o-bare-list--spaced-sixth">
												<li>
													<label>
														<?php echo icl_t('Theme-inventory_inspection', 'Name'); ?>:
													</label>
												</li>
											</ul>
										</li>
										<li class="o-grid__item u-1/2@sm-up js-clone-inventory-group__name">
											<ul class="o-bare-list o-bare-list--spaced-sixth">
												<li>
													<label>
														<?php echo icl_t('Theme-inventory_inspection', 'Count'); ?>:
													</label>
												</li>
											</ul>
										</li>
									</ul>
									<!--get current row-->
									<?php

									if( have_rows('inventory_list_toalett') ):

										while( have_rows('inventory_list_toalett') ) : the_row();

											?>

											<ul class="o-grid o-grid--matrix u-flush--bottom">
												<li class="o-grid__item u-1/2@sm-up js-clone-inventory-group__name">
													<ul class="o-bare-list o-bare-list--spaced-sixth">
														<li>
															<div class="c-addon-group c-addon-group--inside c-addon-group--inside--right u-pointer">
																<input name="inventory[toalett-name][]" type="text" placeholder=" " class="c-text-input c-text-input--lg c-addon-group--inside__input" value="<?php the_sub_field('inventory_list_toalett_name'); ?>">
															</div>
														</li>
													</ul>
												</li>
												<li class="o-grid__item u-1/4@sm-up js-clone-inventory-group__description">
													<ul class="o-bare-list o-bare-list--spaced-sixth">
														<li>
															<div class="c-addon-group c-addon-group--inside c-addon-group--inside--right u-pointer">
																<input name="inventory[toalett-count][]" type="text" placeholder=" " class="c-text-input c-text-input--lg c-addon-group--inside__input" value="<?php the_sub_field('inventory_list_toalett_count'); ?>">
															</div>
														</li>
													</ul>
												</li>
												<li class="o-grid__item u-1/4@sm-up">
													<a href="#" class="c-svg-icon c-svg-icon--trash trash">
														<svg class="c-svg-icon__svg c-svg-icon--trash__svg">
															<use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-trash"></use>
														</svg>
													</a>
												</li>
											</ul>

											<?php

										endwhile;

									endif;

									?>
								</div>
							</div>
						</li>
						<!--entrance-->
						<li class="u-hard--sides">
							<div id="inventory-list-wrap">
								<div class="js-clone-inventory-group" id="inventory-entrance-lists">
									<div class="o-grid">
										<div class="o-grid__item u-1/4@sm-up">
											<h2><?php echo icl_t('Theme-inventory_inspection', 'Entrance'); ?></h2>
										</div>
										<div class="o-grid__item u-1/4@sm-up">
											<a href="#" id="btn-add-entrance">
												+ <?php echo icl_t('Theme-inventory_inspection', 'Add line'); ?>
											</a>
										</div>
									</div>
									<ul class="o-grid o-grid--matrix u-flush--bottom">
										<li class="o-grid__item u-1/2@sm-up js-clone-inventory-group__name">
											<ul class="o-bare-list o-bare-list--spaced-sixth">
												<li>
													<label>
														<?php echo icl_t('Theme-inventory_inspection', 'Name'); ?>:
													</label>
												</li>
											</ul>
										</li>
										<li class="o-grid__item u-1/2@sm-up js-clone-inventory-group__name">
											<ul class="o-bare-list o-bare-list--spaced-sixth">
												<li>
													<label>
														<?php echo icl_t('Theme-inventory_inspection', 'Count'); ?>:
													</label>
												</li>
											</ul>
										</li>
									</ul>
									<!--get current row-->
									<?php

									if( have_rows('inventory_list_entrance') ):

										while( have_rows('inventory_list_entrance') ) : the_row();

											?>

											<ul class="o-grid o-grid--matrix u-flush--bottom">
												<li class="o-grid__item u-1/2@sm-up js-clone-inventory-group__name">
													<ul class="o-bare-list o-bare-list--spaced-sixth">
														<li>
															<div class="c-addon-group c-addon-group--inside c-addon-group--inside--right u-pointer">
																<input name="inventory[entrance-name][]" type="text" placeholder=" " class="c-text-input c-text-input--lg c-addon-group--inside__input" value="<?php the_sub_field('inventory_list_entrance_name'); ?>">
															</div>
														</li>
													</ul>
												</li>
												<li class="o-grid__item u-1/4@sm-up js-clone-inventory-group__description">
													<ul class="o-bare-list o-bare-list--spaced-sixth">
														<li>
															<div class="c-addon-group c-addon-group--inside c-addon-group--inside--right u-pointer">
																<input name="inventory[entrance-count][]" type="text" placeholder=" " class="c-text-input c-text-input--lg c-addon-group--inside__input" value="<?php the_sub_field('inventory_list_entrance_count'); ?>">
															</div>
														</li>
													</ul>
												</li>
												<li class="o-grid__item u-1/4@sm-up">
													<a href="#" class="c-svg-icon c-svg-icon--trash trash">
														<svg class="c-svg-icon__svg c-svg-icon--trash__svg">
															<use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-trash"></use>
														</svg>
													</a>
												</li>
											</ul>

											<?php

										endwhile;

									endif;

									?>
								</div>
							</div>
						</li>
						<!--others-->
						<li class="u-hard--sides">
							<div id="inventory-list-wrap">
								<div class="js-clone-inventory-group" id="inventory-others-lists">
									<div class="o-grid">
										<div class="o-grid__item u-1/4@sm-up">
											<h2><?php echo icl_t('Theme-inventory_inspection', 'Others'); ?></h2>
										</div>
										<div class="o-grid__item u-1/4@sm-up">
											<a href="#" id="btn-add-others">
												+ <?php echo icl_t('Theme-inventory_inspection', 'Add line'); ?>
											</a>
										</div>
									</div>
									<ul class="o-grid o-grid--matrix u-flush--bottom">
										<li class="o-grid__item u-1/2@sm-up js-clone-inventory-group__name">
											<ul class="o-bare-list o-bare-list--spaced-sixth">
												<li>
													<label>
														<?php echo icl_t('Theme-inventory_inspection', 'Name'); ?>:
													</label>
												</li>
											</ul>
										</li>
										<li class="o-grid__item u-1/2@sm-up js-clone-inventory-group__name">
											<ul class="o-bare-list o-bare-list--spaced-sixth">
												<li>
													<label>
														<?php echo icl_t('Theme-inventory_inspection', 'Count'); ?>:
													</label>
												</li>
											</ul>
										</li>
									</ul>
									<!--get current row-->
									<?php

									if( have_rows('inventory_list_others') ):

										while( have_rows('inventory_list_others') ) : the_row();

											?>

											<ul class="o-grid o-grid--matrix u-flush--bottom">
												<li class="o-grid__item u-1/2@sm-up js-clone-inventory-group__name">
													<ul class="o-bare-list o-bare-list--spaced-sixth">
														<li>
															<div class="c-addon-group c-addon-group--inside c-addon-group--inside--right u-pointer">
																<input name="inventory[others-name][]" type="text" placeholder=" " class="c-text-input c-text-input--lg c-addon-group--inside__input" value="<?php the_sub_field('inventory_list_others_name'); ?>">
															</div>
														</li>
													</ul>
												</li>
												<li class="o-grid__item u-1/4@sm-up js-clone-inventory-group__description">
													<ul class="o-bare-list o-bare-list--spaced-sixth">
														<li>
															<div class="c-addon-group c-addon-group--inside c-addon-group--inside--right u-pointer">
																<input name="inventory[others-count][]" type="text" placeholder=" " class="c-text-input c-text-input--lg c-addon-group--inside__input" value="<?php the_sub_field('inventory_list_others_count'); ?>">
															</div>
														</li>
													</ul>
												</li>
												<li class="o-grid__item u-1/4@sm-up">
													<a href="#" class="c-svg-icon c-svg-icon--trash trash">
														<svg class="c-svg-icon__svg c-svg-icon--trash__svg">
															<use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-trash"></use>
														</svg>
													</a>
												</li>
											</ul>

											<?php

										endwhile;

									endif;

									?>
								</div>
							</div>
						</li>
						<!--submit button-->
						<li class="u-hard--sides" id="SubmitBtn">
							<button type="submit" class="c-btn c-btn--xl c-btn--alpha">
								<?php echo icl_t('Theme-form', 'Submit form'); ?>
							</button>
						</li>
					</ul>
				</div>
			</form>
		</section>

		<section class="o-section" id="inventory-content" style="display: none;">
			<div class="o-site-wrap o-site-wrap--padding u-bg-eta" style="padding-left: 5rem; padding-right: 5rem;">
				<ul class="c-ui-list u-hard--ends [ u-clean--top u-clean--bottom ]">
					<li class="u-hard--sides">
						<div class="o-grid u-text-center">
							<div class="o-grid__item u-3/4@sm-up u-text-center">
								<h1><?php echo $inventory_content_title; ?></h1>
								<a class="c-btn c-btn--md c-btn--brand" id="btn-change-inventory">
									<?php echo $change_inventory_btn; ?>
								</a>
							</div>
						</div>
					</li>
					<!--kitchen-->
					<li class="u-hard--sides">
						<div id="inventory-list-wrap">
							<div class="js-clone-inventory-group">
								<h2><?php echo icl_t('Theme-inventory_inspection', 'Kitchen'); ?></h2>
								<!--get current row-->
								<ul class="o-grid o-bare-list o-bare-list--spaced-sixth">
								<?php
								if( have_rows('inventory_list_kitchen') ):
									while( have_rows('inventory_list_kitchen') ) : the_row();
										?>
										<li class="o-grid__item u-1/2@sm-up">
											<?php the_sub_field('inventory_list_kitchen_name'); ?>
										</li>
										<li class="o-grid__item u-1/2@sm-up">
											<?php the_sub_field('inventory_list_kitchen_count'); ?>
										</li>
										<?php
									endwhile;
								endif;
								?>
								</ul>
							</div>
						</div>
					</li>
					<!--livingroom-->
					<li class="u-hard--sides">
						<div id="inventory-list-wrap">
							<div class="js-clone-inventory-group">
								<h2><?php echo icl_t('Theme-inventory_inspection', 'Living room'); ?></h2>
								<!--get current row-->
								<ul class="o-grid o-bare-list o-bare-list--spaced-sixth">
									<?php
									if( have_rows('inventory_list_livingroom') ):
										while( have_rows('inventory_list_livingroom') ) : the_row();
											?>
											<li class="o-grid__item u-1/2@sm-up">
												<?php the_sub_field('inventory_list_livingroom_name'); ?>
											</li>
											<li class="o-grid__item u-1/2@sm-up">
												<?php the_sub_field('inventory_list_livingroom_count'); ?>
											</li>
											<?php
										endwhile;
									endif;
									?>
								</ul>
							</div>
						</div>
					</li>
					<!--bathroom-->
					<li class="u-hard--sides">
						<div id="inventory-list-wrap">
							<div class="js-clone-inventory-group">
								<h2><?php echo icl_t('Theme-inventory_inspection', 'Bathroom'); ?></h2>
								<!--get current row-->
								<ul class="o-grid o-bare-list o-bare-list--spaced-sixth">
									<?php
									if( have_rows('inventory_list_bathroom') ):
										while( have_rows('inventory_list_bathroom') ) : the_row();
											?>
											<li class="o-grid__item u-1/2@sm-up">
												<?php the_sub_field('inventory_list_bathroom_name'); ?>
											</li>
											<li class="o-grid__item u-1/2@sm-up">
												<?php the_sub_field('inventory_list_bathroom_count'); ?>
											</li>
											<?php
										endwhile;
									endif;
									?>
								</ul>
							</div>
						</div>
					</li>
					<!--toalett-->
					<li class="u-hard--sides">
						<div id="inventory-list-wrap">
							<div class="js-clone-inventory-group">
								<h2><?php echo icl_t('Theme-inventory_inspection', 'Toalett'); ?></h2>
								<!--get current row-->
								<ul class="o-grid o-bare-list o-bare-list--spaced-sixth">
									<?php
									if( have_rows('inventory_list_toalett') ):
										while( have_rows('inventory_list_toalett') ) : the_row();
											?>
											<li class="o-grid__item u-1/2@sm-up">
												<?php the_sub_field('inventory_list_toalett_name'); ?>
											</li>
											<li class="o-grid__item u-1/2@sm-up">
												<?php the_sub_field('inventory_list_toalett_count'); ?>
											</li>
											<?php
										endwhile;
									endif;
									?>
								</ul>
							</div>
						</div>
					</li>
					<!--bedroom-->
					<li class="u-hard--sides">
						<div id="inventory-list-wrap">
							<div class="js-clone-inventory-group">
								<h2><?php echo icl_t('Theme-inventory_inspection', 'Bedroom'); ?></h2>
								<!--get current row-->
								<ul class="o-grid o-bare-list o-bare-list--spaced-sixth">
									<?php
									if( have_rows('inventory_list_bedroom') ):
										while( have_rows('inventory_list_bedroom') ) : the_row();
											?>
											<li class="o-grid__item u-1/2@sm-up">
												<?php the_sub_field('inventory_list_bedroom_name'); ?>
											</li>
											<li class="o-grid__item u-1/2@sm-up">
												<?php the_sub_field('inventory_list_bedroom_count'); ?>
											</li>
											<?php
										endwhile;
									endif;
									?>
								</ul>
							</div>
						</div>
					</li>
					<!--entrance-->
					<li class="u-hard--sides">
						<div id="inventory-list-wrap">
							<div class="js-clone-inventory-group">
								<h2><?php echo icl_t('Theme-inventory_inspection', 'Entrance'); ?></h2>
								<!--get current row-->
								<ul class="o-grid o-bare-list o-bare-list--spaced-sixth">
									<?php
									if( have_rows('inventory_list_entrance') ):
										while( have_rows('inventory_list_entrance') ) : the_row();
											?>
											<li class="o-grid__item u-1/2@sm-up">
												<?php the_sub_field('inventory_list_entrance_name'); ?>
											</li>
											<li class="o-grid__item u-1/2@sm-up">
												<?php the_sub_field('inventory_list_entrance_count'); ?>
											</li>
											<?php
										endwhile;
									endif;
									?>
								</ul>
							</div>
						</div>
					</li>
					<!--others-->
					<li class="u-hard--sides">
						<div id="inventory-list-wrap">
							<div class="js-clone-inventory-group">
								<h2><?php echo icl_t('Theme-inventory_inspection', 'Others'); ?></h2>
								<!--get current row-->
								<ul class="o-grid o-bare-list o-bare-list--spaced-sixth">
									<?php
									if( have_rows('inventory_list_others') ):
										while( have_rows('inventory_list_others') ) : the_row();
											?>
											<li class="o-grid__item u-1/2@sm-up">
												<?php the_sub_field('inventory_list_others_name'); ?>
											</li>
											<li class="o-grid__item u-1/2@sm-up">
												<?php the_sub_field('inventory_list_others_count'); ?>
											</li>
											<?php
										endwhile;
									endif;
									?>
								</ul>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</section>

	</main>
</div>

<?php get_footer(); ?>