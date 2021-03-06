<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

	<meta charset="utf-8">



	<!-- Dns Prefetch -->
	<link href="//www.google-analytics.com" rel="dns-prefetch">
	<link href="http://fonts.googleapis.com" rel="dns-prefetch">
	<link href="http://ajax.googleapis.com" rel="dns-prefetch">


	<!-- Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.5, user-scalable=yes">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<!--[if lt IE 9]>
	<script src="<?php bloginfo('template_directory'); ?>/build/js/polyfills/html5shiv.min.js"></script>
	<![endif]-->

	<!-- Icons -->
	<link rel="icon" type="image/png" href="<?php bloginfo( 'template_directory' ); ?>/favicon.png?v=2">

	<!-- Css + JavaScript -->
	<?php wp_head(); ?>

	<!-- Meta Title -->
	<title>
		<?php wp_title(); ?>
	</title>

	<script src="https://use.typekit.net/ldq0csm.js"></script>
	<script>try {
			Typekit.load({async: true});
		} catch (e) {
		}</script>

	<!-- Hotjar Tracking Code for http://www.renthia.com/ -->
	<script>
		(function (h, o, t, j, a, r) {
			h.hj = h.hj || function () {
					(h.hj.q = h.hj.q || []).push(arguments)
				};
			h._hjSettings = {hjid: 140395, hjsv: 5};
			a = o.getElementsByTagName('head')[0];
			r = o.createElement('script');
			r.async = 1;
			r.src = t + h._hjSettings.hjid + j + h._hjSettings.hjsv;
			a.appendChild(r);
		})(window, document, '//static.hotjar.com/c/hotjar-', '.js?sv=');
	</script>

</head>

<!--[if lte IE 9]>
<body class="oldie">
<![endif]-->
<!--[if !IE]><!-->
<body>
<!--<![endif]-->

<script>
	(function (i, s, o, g, r, a, m) {
		i['GoogleAnalyticsObject'] = r;
		i[r] = i[r] || function () {
				(i[r].q = i[r].q || []).push(arguments)
			}, i[r].l = 1 * new Date();
		a = s.createElement(o),
			m = s.getElementsByTagName(o)[0];
		a.async = 1;
		a.src = g;
		m.parentNode.insertBefore(a, m)
	})(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

	ga('create', 'UA-61877751-1', 'auto');
	ga('send', 'pageview');

</script>


<?php // Decl global WW object and fade-in the site. ?>
<script>
	var WW = {}, ROOT = document.documentElement;
	ROOT.className += " fade-out";
	setTimeout(function () {
		ROOT.className = ROOT.className.replace(/(\s|^)fade\-out(\s|$)/g, '$1$2');
		setTimeout(function () {
			ROOT.className += ' has-faded-in';
		}, 200)
	}, 30);
</script>


<header class="c-site-header js-site-header" role="banner">
	<div class="o-site-wrap o-site-wrap--padding u-fill-height">
		<div class="c-site-header__inner o-flag">
			<div class="o-flag__component">
				<a href="<?php echo icl_get_home_url(); ?>" class="c-site-header__logo c-site-logo">
					<img class="c-site-logo__img u-svg"
					     src="<?php bloginfo( 'template_directory' ); ?>/build/img/site-logo.svg"
					     alt="<?php bloginfo( 'name' ); ?>">
				</a>
			</div>
			<div class="o-flag__body">
				<ul class="o-bare-list">
					<li class="c-site-header__client-menu u-push-half--bottom@sm-up">
						<ul class="o-inline-list o-inline-list--spaced">
							<li>
								<a href="<?php echo icl_t( 'Theme-header', 'Support link' ); ?>"
								   class="c-site-header__client-link u-txt-xxs">
									<?php echo icl_t( 'Theme-header', 'Support' ); ?>
								</a>
							</li>

							<?php if ( is_user_logged_in() ) : ?>
								<li>
									<a href="<?php echo icl_t( 'Theme-mypages', 'My pages link' ); ?>"
									   class="c-site-header__client-link u-txt-xxs">
										<?php echo icl_t( 'Theme-header', 'My pages' ); ?>
									</a>
								</li>
							<?php else : ?>
								<li>
									<a href="#" class="c-site-header__client-link u-txt-xxs"
									   data-toggle="modal"
									   data-target="<?php bloginfo( 'template_directory' ); ?>/partials/modals/login.php?language=<?php echo ICL_LANGUAGE_CODE; ?>">
										<?php echo icl_t( 'Theme-header', 'Log in' ) ?>
									</a>
								</li>
							<?php endif; ?>
							<li>
								<div class="c-language-select [ o-flyout o-flyout--click ] js-ui-popup">
									<?php $languages = apply_filters( 'wpml_active_languages', null, 'skip_missing=N&orderby=KEY&order=DIR&link_empty_to=str' ); ?>
									<div class="c-language-select__toggle js-ui-popup__toggle">
										<?php // current lang ?>
										<div class="c-svg-icon c-svg-icon--language-select-chevron">
											<img class="c-language-select__flag u-flush" width="26" height="16"
											     src="<?php echo $languages[ ICL_LANGUAGE_CODE ]['country_flag_url']; ?>"
											     alt="">
											<svg class="c-svg-icon__svg c-svg-icon--language-select-chevron__svg">
												<use
													xlink:href="<?php bloginfo( 'template_directory' ); ?>/build/img/sprite.svg#icon-chevron"></use>
											</svg>
										</div>
									</div>
									<ul class="c-language-select__items o-bare-list [ o-flyout__body o-flyout__body--bottom-right o-flyout--click__body ] js-ui-popup__body">
										<?php

										if ( isset( $_GET['country'] ) || isset( $_GET['city'] ) || isset( $_GET['sort'] ) || isset( $_GET['include-rentedout'] ) ) {
											$params = "";
											if ( isset( $_GET['country'] ) ) {
												$country = $_GET['country'];
												$params .= "?country=" . $country;
											}
											if ( isset( $_GET['city'] ) ) {
												$city = $_GET['city'];
												$params .= "&city=" . $city;
											}
											if ( isset( $_GET['sort'] ) ) {
												$sort = $_GET['sort'];
												$params .= "&sort=" . $sort;
											}
											if ( isset( $_GET['include-rentedout'] ) ) {
												$include_rentedout = $_GET['include-rentedout'];
                                                $params .= "&include-rentedout=" . $include_rentedout;
                                            }

										}

										?>
										<?php foreach ( $languages as $language ) : ?>
											<li>
												<a href="<?php echo $language['url'];
												if ( $params ) {
													echo $params;
												} ?>" class="c-language-select__item o-flag u-txt-xxs">
													<div class="o-flag__component">
														<img class="c-language-select__flag" width="26" height="16"
														     src="<?php echo $language['country_flag_url']; ?>" alt="">
													</div>
													<div class="o-flag_body">
														<?php echo strtoupper( $language['language_code'] ); ?>
													</div>
												</a>
											</li>
										<?php endforeach; ?>
									</ul>
								</div>
							</li>
						</ul>
					</li>
					<li>
						<ul class="o-inline-list o-inline-list--spaced">
							<li class="u-block@sm-down u-flush@sm-down">
								<a href="<?php echo icl_t( 'Theme-header', "Searching link" ); ?>"
								   class="[ c-btn c-btn--sm c-btn--delta ] u-txt-normal-weight">
									<?php echo icl_t( 'Theme-header', "Searching" ); ?>
								</a>
							</li>
							<li class="u-block@xs-down u-push-half--top@sm-down">
								<a href="<?php echo icl_t( 'Theme-header', "Rent out link" ); ?>"
								   class="[ c-btn c-btn--sm c-btn--gamma ] u-txt-normal-weight">
									<?php echo icl_t( 'Theme-header', "Rent out" ); ?>
								</a>
							</li>
							
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>
</header>
