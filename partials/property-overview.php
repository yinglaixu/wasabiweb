<article class="o-flag <?php if ( get_field('rented_out') ) echo "is-unavailable"; ?>">
	<div class="o-flag__component o-flag__component--top u-block@xs-down">
		<figure class="c-results__img">
			<?php
			// Different links based on where the visitor is on the site
			$permalink = $GLOBALS['my-property'] === true ? icl_t('Theme-mypages', 'My property link') . '/?id=' . $post->ID : get_the_permalink();
			?>
			<a <?php if( ! get_field('rented_out') ) : ?>href="<?php echo $permalink; ?>" <?php endif; ?> class="c-results__img-inner c-img-control-wrap js-img-control-wrap">
				<div class="c-img-control-wrap__inner js-img-control-wrap__inner">
					<?php // 370x222 ?>
					<?php // ensure data-attrs are populated with actual image dimensions. ?>
					<?php $image = get_field('images')[0]['image']; ?>
					<img src="<?php bloginfo( 'template_directory' ); ?>/build/img/blank.gif"
					     class="c-img-control-wrap__img js-img-control"
					     data-lg-src="<?php echo $image['sizes']['370x222']; ?>"
					     data-lg-width="370"
					     data-lg-height="222"
					     data-fluid="true"
					     alt="">
				</div>
			</a>
			<?php if ( get_field('rented_out') ) : ?>
				<div class="c-results__banner">
					<?php echo icl_t('Theme-properties', 'Rented out'); ?>
				</div>
			<?php endif; ?>
		</figure>
	</div>
	<div class="o-flag__body o-flag__body--top u-block@xs-down">
		<div class="c-results__details">
			<header class="u-push--bottom">
				<h1 class="u-txt-md u-flush">
					<?php the_field( 'area' ); ?>
				</h1>
				<?php the_field( 'address' ); ?>
			</header>
			<ul class="o-bare-list o-bare-list--spaced-half">
				<li>
					<ul class="o-inline-list o-breadcrumbs">
						<li>
							<?php the_field('overview_text'); ?>
						</li>
						<li data-breadcrumb="|">
							<?php the_field( 'rooms' ); ?> <?php echo icl_t('Theme-properties', 'Room', 'Rum'); ?>
						</li>
						<li data-breadcrumb="|">
							<?php the_field( 'volume' ); ?> kvm
						</li>
					</ul>
				</li>
				<li>
					<ul class="o-bare-list">
						<li>
							<strong><?php echo icl_t('Theme-properties', 'Available'); ?>: </strong>
						</li>
						<li>
							<?php
							$from = new DateTime( get_field( 'date_from' ) );
							if( get_field('date_to') ) {
								$to = new DateTime( get_field( 'date_to' ) );
								$to = date( 'd F Y', $to->getTimestamp() );
							} else {
								$to = icl_t('Theme-properties', 'Until further notice');
							}
							echo date( 'd F Y', $from->getTimestamp() ) . ' - ' . $to;
							?>
						</li>
					</ul>
				</li>
				<li class="u-txt-lg c-results__price">
					<?php echo intval( get_field('price') ); ?> <?php echo icl_t('Theme-form', 'Eur/month'); ?>
				</li>
				<?php
				if( $post->post_status === 'draft' ) :
				?>
					<span style="color: red"><?php echo $GLOBALS['pending']; ?></span>
				<?php endif; ?>
			</ul>
		</div>
	</div>
</article>
