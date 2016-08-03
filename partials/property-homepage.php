<article class="o-flag property-front-page<?php if ( get_field('rented_out') ) echo "is-unavailable"; ?>">
	<div class="u-block@xs-down">
		<figure class="c-results__img property-front-page_image">
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
				<div class="c-region-block__overlay">
					<div class="o-flag u-fill-height">
						<div class="o-flag__body property-front-page_price">
							<div class="c-region-block__title u-txt-md c-results-frontpage__price">
								<?php
								$currency = get_field('currency');
								if ($currency){
									echo $currency;
								}else{
									$currency = "SEK";
								}
								?>
								<?php echo intval( get_field('price') ); ?> <?php echo $currency; ?><?php echo icl_t('Theme-form', 'Month'); ?>
							</div>
						</div>
					</div>

					<div class="u-block@xs-down">
						<div class="c-results__details">
							<header>
								<h1 class="u-txt-lg u-flush property-front-page_title">
									<?php the_field( 'area' ); ?>
								</h1>
							</header>
							<ul class="o-bare-list">
								<li>
									<ul class="o-inline-list o-breadcrumbs">
										<li data-breadcrumb="|" class = "property-front-page_label">
											<?php the_field( 'rooms' ); ?> <?php echo icl_t('Theme-properties', 'Room', 'Rum'); ?>
										</li>
										<li data-breadcrumb="|" class = "property-front-page_label">
											<?php the_field( 'volume' ); ?> kvm
										</li>
									</ul>
								</li>
								<li>
									<ul class="o-bare-list">
										<li class="property-front-page_label">
											<strong><?php echo icl_t('Theme-properties', 'Available'); ?>: </strong>
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
								<?php
								if( $post->post_status === 'draft' ) :
									?>
									<span style="color: red"><?php echo $GLOBALS['pending']; ?></span>
								<?php endif; ?>
							</ul>
						</div>
					</div>
				</div>
			</a>
			<?php if ( get_field('rented_out') ) : ?>
				<div class="c-results__banner">
					<?php echo icl_t('Theme-properties', 'Rented out'); ?>
				</div>
			<?php endif; ?>
		</figure>
	</div>
	<div class="u-block@xs-down property-front-page_bottom">
		<div class="c-results__details">
			<header>
				<h1 class="u-txt-lg u-flush property-front-page_title">
					<?php the_field( 'area' ); ?>
				</h1>
			</header>
			<ul class="o-bare-list">
				<li>
					<ul class="o-inline-list o-breadcrumbs">
						<li data-breadcrumb="|" class = "property-front-page_label">
							<?php the_field( 'rooms' ); ?> <?php echo icl_t('Theme-properties', 'Room', 'Rum'); ?>
						</li>
						<li data-breadcrumb="|" class = "property-front-page_label">
							<?php the_field( 'volume' ); ?> kvm
						</li>
					</ul>
				</li>
				<li>
					<ul class="o-bare-list">
						<li class="property-front-page_label">
							<strong><?php echo icl_t('Theme-properties', 'Available'); ?>: </strong>
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
				<?php
				if( $post->post_status === 'draft' ) :
				?>
					<span style="color: red"><?php echo $GLOBALS['pending']; ?></span>
				<?php endif; ?>
			</ul>
		</div>
	</div>
</article>

<style>
	.property-front-page_title{
		padding-top: 10px;
	}
	.property-front-page{
		border: 1px solid #D0D0D0;
	}
	.property-front-page_price{
		vertical-align: bottom;
	}
	.c-results-frontpage__price{
		color: white;
	}
	.property-front-page_label{
		color: grey;
		font-size: 0.9rem;
	}
	.c-region-block__overlay{
		background: rgba(0,0,0,0);
	}
	.property-front-page_bottom{
		padding-bottom: 10px;
	}
	.property-front-page_image{
		width: 100%; !important;
	}
</style>