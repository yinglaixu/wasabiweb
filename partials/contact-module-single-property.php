<?php

$city_term = wp_get_post_terms( $post->ID, 'property-cities' );
$employee = get_field( 'contact_person_from_renthia', $city_term[0] );

if ( $employee ) {
	$employee_name  = get_field('employee_name', $employee->ID);
	$employee_phone = get_field('employee_phone', $employee->ID);
	$employee_mail  = get_field('employee_mail', $employee->ID);
}
?>
<aside class="c-site-module">

	<div class="c-site-module__inner">
		<div class="c-site-module__highlight">
			<img class="c-site-module__highlight-img"
			     src="<?php bloginfo( 'template_directory' ); ?>/build/img/divider-angled-small.svg" alt="">
		</div>
		<div class="c-site-module__head c-site-module__head--brand">
			<div class="o-flag">
				<div class="o-flag__component">
					<div class="c-site-module__person-photo c-img-control-wrap js-img-control-wrap">
						<div class="c-img-control-wrap__inner u-circle js-img-control-wrap__inner">

							<?php // 170x170 ?>
							<?php // ensure data-attrs are populated with actual image dimensions. ?>
							<?php $image = $employee ? get_field('employee_image', $employee->ID) : get_field( 'contact_module_image', 'options' ); ?>

<?php
$ass_acc=get_field('associate_account');

 echo get_avatar( $ass_acc['user_email'] ); ?> 
						<?php /*?>	<img src="<?php bloginfo( 'template_directory' ); ?>/build/img/blank.gif"
							     class="c-img-control-wrap__img u-circle js-img-control"
							     data-lg-src="<?php echo $image['sizes']['170x170']; ?>"
							     data-lg-width="85"
							     data-lg-height="85"
							     data-fluid="false"
							     alt=""><?php */?>
						</div>
					</div>
				</div>
				<div class="o-flag__body u-soft-half--left">
					<ul class="o-bare-list">
						<li>
							<strong><?php echo icl_t( 'Theme-contact', 'Responsible Display Assistant' ); ?></strong>
						</li>
						<?php if ( $employee_name ) : ?>
							<li>
								<?php echo $employee_name ?>
							</li>
						<?php endif; ?>
						<?php if ( $employee_phone ) : ?>
							<li>
								<?php echo $employee_phone ?>
							</li>
						<?php endif; ?>
						<li>
							<?php if ( $ass_acc['user_email'] ) : ?>
								<a href="mailto:<?php echo $ass_acc['user_email']; ?>"
								   class="u-txt-xs"><?php echo $ass_acc['user_email']; ?></a>
							<?php else : ?>
								<a href="mailto:<?php the_field( 'email', 'options' ); ?>" class="u-txt-xs">
									<?php the_field( 'email', 'options' ); ?></a>
							<?php endif; ?>
						</li>
						<!--                        <li>-->
						<!--                            <a href="tel:-->
						<?php //the_field('telephone_link', 'options'); ?><!--" class="u-txt-xs">-->
						<?php //the_field('telephone', 'options'); ?><!--</a>-->
						<!--                        </li>-->
					</ul>
				</div>
			</div>
		</div>
		<div class="c-site-module__body o-paragraph-group">
			<div class="c-site-module__divider-arrow-down">
				<div class="c-site-module__divider-arrow-down-inner">
					<img src="<?php bloginfo( 'template_directory' ); ?>/build/img/divider-arrow-down.svg" alt="">
				</div>
			</div>
			<h2 class="u-push-half--bottom">
				<?php echo icl_t( 'Theme-properties', 'Apply' ); ?>
			</h2>
			<ul class="o-bare-list">
				<li><?php the_field( 'address' ); ?></li>
				<li class="u-txt-lg u-txt-brand">
					<?php
					$currency = get_field('currency');
					if ($currency){
						echo $currency;
					}else{
						$currency = "SEK";
					}
					?>
					<?php echo intval( get_field('price') ); ?> <?php echo $currency; ?><?php echo icl_t('Theme-form', 'Month'); ?>
				</li>
			</ul>
		</div>
		<div class="c-btn c-btn--lg c-btn--full">
			&nbsp; <?php // placeholder for asbsolutely pos btn ?>
		</div>
		<a href="#" class="c-site-module__btn [ c-btn c-btn--alpha c-btn--md c-btn--full ] u-sharp"
		   data-toggle="modal"
		   data-target="<?php bloginfo( 'template_directory' );
		   echo '/partials/modals/book-viewing.php?id=' . $post->ID . '&language=' . ICL_LANGUAGE_CODE; ?>">
			<?php echo icl_t( 'Theme-properties', 'Apply' ); ?>
		</a>
	</div>
</aside>