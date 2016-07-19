<?php
/*
Template Name: My inspection list
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
$inspection_form_title = get_field('inspection_form_title');
$view_inspection_btn = get_field('view_inspection_btn');
$inspection_content_title = get_field('inspection_content_title');
$change_inspection_btn = get_field('change_inspection_btn');

// Everything is OK
$post = get_post( $obj_id );

setup_postdata( $post );
?>
<div class="c-page-content js-page-content" id="mainContent">
	<div class="c-site-header-placeholder">
	</div>
	<main role="main">

		<section class="o-section" id="inspection-form" style="display: block;">
			<?php
			$val = $GLOBALS['simplerap'];
			$error_style = 'style="color:red"';
			?>
			<form class="c-block-form" id="landlordinspectionform" method="post" enctype="multipart/form-data">
				<input type="hidden" name="inspectionform" value="true">
				<input type="hidden" name="property_id" value="<?php echo $post->ID; ?>">
				<?php
				$complete = 0;
				if(get_field('inspection_complete')){
					$complete = 1;
				}
				?>
				<input type="hidden" name="inspection_condition" value="<?php echo $complete; ?>">
				<input type="hidden" name="inspection[useremail]" value="<?php the_field('owner'); ?>">
				<input type="hidden" name="inspection[first_name]" value="<?php the_field('first_name'); ?>">
				<input type="hidden" name="inspection[surname]" value="<?php the_field('surname'); ?>">
				<input type="hidden" name="inspection[address]" value="<?php the_field('address'); ?>">
				<div class="o-site-wrap o-site-wrap--padding">
					<ul class="c-ui-list u-hard--ends [ u-clean--top u-clean--bottom ]">
						<li class="u-hard--sides">
							<div class="o-grid u-text-center">
								<div class="o-grid__item u-3/4@sm-up u-text-center">
									<h1><?php echo $inspection_form_title; ?></h1>
									<a class="c-btn c-btn--md c-btn--brand" id="btn-view-inspection">
										<?php echo $view_inspection_btn;?>
									</a>
								</div>
							</div>
						</li>
						<!--kitchen-->
						<li class="u-hard--sides">
							<div id="inspection-list-wrap">
								<div class="js-clone-inspection-group" id="inspection-kitchen-lists">
									<div class="o-grid">
										<div class="o-grid__item u-1/4@sm-up">
											<h2><?php echo icl_t('Theme-inventory_inspection', 'Kitchen'); ?></h2>
										</div>
										<div class="o-grid__item u-1/4@sm-up">
											<a href="#" id="btn-add-ins-kitchen">
												+ <?php echo icl_t('Theme-inventory_inspection', 'Add line'); ?>
											</a>
										</div>
									</div>
									<!--get current row-->
									<?php

									if( have_rows('inspection_list_kok') ):

										while( have_rows('inspection_list_kok') ) : the_row();

											?>

											<ul class="o-grid o-grid--matrix u-flush--bottom">
												<li class="o-grid__item u-3/4@sm-up js-clone-inspection-group__name">
													<ul class="o-bare-list o-bare-list--spaced-sixth">
														<li>
															<label>
																<?php echo icl_t('Theme-inventory_inspection', 'Notes'); ?>:
															</label>
														</li>
														<li>
															<div class="c-addon-group c-addon-group--inside c-addon-group--inside--right u-pointer">
																<input name="inspection[kitchen][]" type="text" placeholder=" " class="c-text-input c-text-input--lg c-addon-group--inside__input" value="<?php the_sub_field('notes'); ?>">
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
							<div id="inspection-list-wrap">
								<div class="js-clone-inspection-group" id="inspection-livingroom-lists">
									<div class="o-grid">
										<div class="o-grid__item u-1/4@sm-up">
											<h2><?php echo icl_t('Theme-inventory_inspection', 'Living room'); ?></h2>
										</div>
										<div class="o-grid__item u-1/4@sm-up">
											<a href="#" id="btn-add-ins-livingroom">
												+ <?php echo icl_t('Theme-inventory_inspection', 'Add line'); ?>
											</a>
										</div>
									</div>
									<!--get current row-->
									<?php

									if( have_rows('inspection_list_livingroom') ):

										while( have_rows('inspection_list_livingroom') ) : the_row();

											?>

											<ul class="o-grid o-grid--matrix u-flush--bottom">
												<li class="o-grid__item u-3/4@sm-up js-clone-inspection-group__name">
													<ul class="o-bare-list o-bare-list--spaced-sixth">
														<li>
															<label>
																<?php echo icl_t('Theme-inventory_inspection', 'Notes'); ?>:
															</label>
														</li>
														<li>
															<div class="c-addon-group c-addon-group--inside c-addon-group--inside--right u-pointer">
																<input name="inspection[livingroom][]" type="text" placeholder=" " class="c-text-input c-text-input--lg c-addon-group--inside__input" value="<?php the_sub_field('notes'); ?>">
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
							<div id="inspection-list-wrap">
								<div class="js-clone-inspection-group" id="inspection-bathroom-lists">
									<div class="o-grid">
										<div class="o-grid__item u-1/4@sm-up">
											<h2><?php echo icl_t('Theme-inventory_inspection', 'Bathroom'); ?></h2>
										</div>
										<div class="o-grid__item u-1/4@sm-up">
											<a href="#" id="btn-add-ins-bathroom">
												+ <?php echo icl_t('Theme-inventory_inspection', 'Add line'); ?>
											</a>
										</div>
									</div>
									<!--get current row-->
									<?php

									if( have_rows('inspection_list_bathroom') ):

										while( have_rows('inspection_list_bathroom') ) : the_row();

											?>

											<ul class="o-grid o-grid--matrix u-flush--bottom">
												<li class="o-grid__item u-3/4@sm-up js-clone-inspection-group__name">
													<ul class="o-bare-list o-bare-list--spaced-sixth">
														<li>
															<label>
																<?php echo icl_t('Theme-inventory_inspection', 'Notes'); ?>:
															</label>
														</li>
														<li>
															<div class="c-addon-group c-addon-group--inside c-addon-group--inside--right u-pointer">
																<input name="inspection[bathroom][]" type="text" placeholder=" " class="c-text-input c-text-input--lg c-addon-group--inside__input" value="<?php the_sub_field('notes'); ?>">
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
							<div id="inspection-list-wrap">
								<div class="js-clone-inspection-group" id="inspection-bedroom-lists">
									<div class="o-grid">
										<div class="o-grid__item u-1/4@sm-up">
											<h2><?php echo icl_t('Theme-inventory_inspection', 'Bedroom'); ?></h2>
										</div>
										<div class="o-grid__item u-1/4@sm-up">
											<a href="#" id="btn-add-ins-bedroom">
												+ <?php echo icl_t('Theme-inventory_inspection', 'Add line'); ?>
											</a>
										</div>
									</div>
									<!--get current row-->
									<?php

									if( have_rows('inspection_list_bedroom') ):

										while( have_rows('inspection_list_bedroom') ) : the_row();

											?>

											<ul class="o-grid o-grid--matrix u-flush--bottom">
												<li class="o-grid__item u-3/4@sm-up js-clone-inspection-group__name">
													<ul class="o-bare-list o-bare-list--spaced-sixth">
														<li>
															<label>
																<?php echo icl_t('Theme-inventory_inspection', 'Notes'); ?>:
															</label>
														</li>
														<li>
															<div class="c-addon-group c-addon-group--inside c-addon-group--inside--right u-pointer">
																<input name="inspection[bedroom][]" type="text" placeholder=" " class="c-text-input c-text-input--lg c-addon-group--inside__input" value="<?php the_sub_field('notes'); ?>">
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
							<div id="inspection-list-wrap">
								<div class="js-clone-inspection-group" id="inspection-toalett-lists">
									<div class="o-grid">
										<div class="o-grid__item u-1/4@sm-up">
											<h2><?php echo icl_t('Theme-inventory_inspection', 'Toalett'); ?></h2>
										</div>
										<div class="o-grid__item u-1/4@sm-up">
											<a href="#" id="btn-add-ins-toalett">
												+ <?php echo icl_t('Theme-inventory_inspection', 'Add line'); ?>
											</a>
										</div>
									</div>
									<!--get current row-->
									<?php

									if( have_rows('inspection_list_toalett') ):

										while( have_rows('inspection_list_toalett') ) : the_row();

											?>

											<ul class="o-grid o-grid--matrix u-flush--bottom">
												<li class="o-grid__item u-3/4@sm-up js-clone-inspection-group__name">
													<ul class="o-bare-list o-bare-list--spaced-sixth">
														<li>
															<label>
																<?php echo icl_t('Theme-inventory_inspection', 'Notes'); ?>:
															</label>
														</li>
														<li>
															<div class="c-addon-group c-addon-group--inside c-addon-group--inside--right u-pointer">
																<input name="inspection[toalett][]" type="text" placeholder=" " class="c-text-input c-text-input--lg c-addon-group--inside__input" value="<?php the_sub_field('notes'); ?>">
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
							<div id="inspection-list-wrap">
								<div class="js-clone-inspection-group" id="inspection-entrance-lists">
									<div class="o-grid">
										<div class="o-grid__item u-1/4@sm-up">
											<h2><?php echo icl_t('Theme-inventory_inspection', 'Entrance'); ?></h2>
										</div>
										<div class="o-grid__item u-1/4@sm-up">
											<a href="#" id="btn-add-ins-entrance">
												+ <?php echo icl_t('Theme-inventory_inspection', 'Add line'); ?>
											</a>
										</div>
									</div>
									<!--get current row-->
									<?php

									if( have_rows('inspection_list_entrance') ):

										while( have_rows('inspection_list_entrance') ) : the_row();

											?>

											<ul class="o-grid o-grid--matrix u-flush--bottom">
												<li class="o-grid__item u-3/4@sm-up js-clone-inspection-group__name">
													<ul class="o-bare-list o-bare-list--spaced-sixth">
														<li>
															<label>
																<?php echo icl_t('Theme-inventory_inspection', 'Notes'); ?>:
															</label>
														</li>
														<li>
															<div class="c-addon-group c-addon-group--inside c-addon-group--inside--right u-pointer">
																<input name="inspection[entrance][]" type="text" placeholder=" " class="c-text-input c-text-input--lg c-addon-group--inside__input" value="<?php the_sub_field('notes'); ?>">
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
							<div id="inspection-list-wrap">
								<div class="js-clone-inspection-group" id="inspection-others-lists">
									<div class="o-grid">
										<div class="o-grid__item u-1/4@sm-up">
											<h2><?php echo icl_t('Theme-inventory_inspection', 'Others'); ?></h2>
										</div>
										<div class="o-grid__item u-1/4@sm-up">
											<a href="#" id="btn-add-ins-others">
												+ <?php echo icl_t('Theme-inventory_inspection', 'Add line'); ?>
											</a>
										</div>
									</div>
									<!--get current row-->
									<?php

									if( have_rows('inspection_list_others') ):

										while( have_rows('inspection_list_others') ) : the_row();

											?>

											<ul class="o-grid o-grid--matrix u-flush--bottom">
												<li class="o-grid__item u-3/4@sm-up js-clone-inspection-group__name">
													<ul class="o-bare-list o-bare-list--spaced-sixth">
														<li>
															<label>
																<?php echo icl_t('Theme-inventory_inspection', 'Notes'); ?>:
															</label>
														</li>
														<li>
															<div class="c-addon-group c-addon-group--inside c-addon-group--inside--right u-pointer">
																<input name="inspection[others][]" type="text" placeholder=" " class="c-text-input c-text-input--lg c-addon-group--inside__input" value="<?php the_sub_field('notes'); ?>">
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
								<?php echo icl_t('Theme-form', 'Send object'); ?>
							</button>
						</li>
					</ul>
				</div>
			</form>
		</section>

		<section class="o-section" id="inspection-content" style="display: none;">
			<div class="o-site-wrap o-site-wrap--padding u-bg-eta" style="padding-left: 5rem; padding-right: 5rem;">
				<ul class="c-ui-list u-hard--ends [ u-clean--top u-clean--bottom ]">
					<li class="u-hard--sides">
						<div class="o-grid u-text-center">
							<div class="o-grid__item u-3/4@sm-up u-text-center">
								<h1><?php echo $inspection_content_title;?></h1>
								<a class="c-btn c-btn--md c-btn--brand" id="btn-change-inspection">
									<?php echo $change_inspection_btn;?>
								</a>
							</div>
						</div>
					</li>
					<!--kitchen-->
					<li class="u-hard--sides">
						<div id="inspection-list-wrap">
							<div class="js-clone-inspection-group">
								<h2><?php echo icl_t('Theme-inventory_inspection', 'Kitchen'); ?></h2>
								<!--get current row-->
								<ul class="o-grid o-bare-list o-bare-list--spaced-sixth">
								<?php
								if( have_rows('inspection_list_kok') ):
									while( have_rows('inspection_list_kok') ) : the_row();
										?>
										<li class="o-grid__item">
											<?php the_sub_field('notes'); ?>
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
						<div id="inspection-list-wrap">
							<div class="js-clone-inspection-group">
								<h2><?php echo icl_t('Theme-inventory_inspection', 'Living room'); ?></h2>
								<!--get current row-->
								<ul class="o-grid o-bare-list o-bare-list--spaced-sixth">
									<?php
									if( have_rows('inspection_list_livingroom') ):
										while( have_rows('inspection_list_livingroom') ) : the_row();
											?>
											<li class="o-grid__item">
												<?php the_sub_field('notes'); ?>
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
						<div id="inspection-list-wrap">
							<div class="js-clone-inspection-group">
								<h2><?php echo icl_t('Theme-inventory_inspection', 'Bathroom'); ?></h2>
								<!--get current row-->
								<ul class="o-grid o-bare-list o-bare-list--spaced-sixth">
									<?php
									if( have_rows('inspection_list_bathroom') ):
										while( have_rows('inspection_list_bathroom') ) : the_row();
											?>
											<li class="o-grid__item">
												<?php the_sub_field('notes'); ?>
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
						<div id="inspection-list-wrap">
							<div class="js-clone-inspection-group">
								<h2><?php echo icl_t('Theme-inventory_inspection', 'Toalett'); ?></h2>
								<!--get current row-->
								<ul class="o-grid o-bare-list o-bare-list--spaced-sixth">
									<?php
									if( have_rows('inspection_list_toalett') ):
										while( have_rows('inspection_list_toalett') ) : the_row();
											?>
											<li class="o-grid__item">
												<?php the_sub_field('notes'); ?>
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
						<div id="inspection-list-wrap">
							<div class="js-clone-inspection-group">
								<h2><?php echo icl_t('Theme-inventory_inspection', 'Bedroom'); ?></h2>
								<!--get current row-->
								<ul class="o-grid o-bare-list o-bare-list--spaced-sixth">
									<?php
									if( have_rows('inspection_list_bedroom') ):
										while( have_rows('inspection_list_bedroom') ) : the_row();
											?>
											<li class="o-grid__item">
												<?php the_sub_field('notes'); ?>
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
						<div id="inspection-list-wrap">
							<div class="js-clone-inspection-group">
								<h2><?php echo icl_t('Theme-inventory_inspection', 'Entrance'); ?></h2>
								<!--get current row-->
								<ul class="o-grid o-bare-list o-bare-list--spaced-sixth">
									<?php
									if( have_rows('inspection_list_entrance') ):
										while( have_rows('inspection_list_entrance') ) : the_row();
											?>
											<li class="o-grid__item">
												<?php the_sub_field('notes'); ?>
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
						<div id="inspection-list-wrap">
							<div class="js-clone-inspection-group">
								<h2><?php echo icl_t('Theme-inventory_inspection', 'Others'); ?></h2>
								<!--get current row-->
								<ul class="o-grid o-bare-list o-bare-list--spaced-sixth">
									<?php
									if( have_rows('inspection_list_others') ):
										while( have_rows('inspection_list_others') ) : the_row();
											?>
											<li class="o-grid__item">
												<?php the_sub_field('notes'); ?>
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