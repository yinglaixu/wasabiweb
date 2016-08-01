<?php
/*
Template Name: Page search
*/
?>

<?php get_header(); ?>
<div class="c-page-content js-page-content" id="mainContent">
    <div class="c-site-header-placeholder">
    </div>
    <?php

    // set the "paged" parameter (use 'page' if the query is on a static front page)
    $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;

    // Preparing the taxonomies/terms
    $countries = get_terms('property-countries');
    $countries = array_values($countries);
    $cities = get_terms('property-cities');
    $cities = array_values($cities);

    // Get the objects
    $country = sanitize_text_field( $_GET['country'] ) ?: $countries[1]->slug;
    $city = sanitize_text_field( $_GET['city'] ) ?: $cities[3]->slug;
    $meta_key = null;



    /////////////////////////
    // temporary setting !!//
    /////////////////////////   
    if( isset( $_GET['city'] ) ){
        if ($city !== 'stockholm'){
            $paged = set_query_var('$paged', 1);
            $arr_params = array( 'country', 'city', 'sort');
            remove_query_arg( $arr_params );
        }
    }

    if( isset( $_GET['sort'] ) ){

        preg_match( '/^(\w*)-(\w*)/', $_GET['sort'], $matches );
        $order = $matches[2];

        if( $matches[1] === 'price' ) {
            // Order by price
            $meta_key = 'price';
            $orderby = 'meta_value_num';
        } else {
            // Order by date
            $orderby = 'date';
        }

    } else {
        // Standard values
        $meta_key = 'price';
        $orderby = 'meta_value_num';
        $order = 'asc';
    }


    $args = [
        'post_type' => 'property',
        'post_status' => 'publish',
        'posts_per_page' => 10,
        'orderby' => $orderby,
        'order' => $order,
        'tax_query' => [
            'relation' => 'AND',
            [
                'taxonomy'  => 'property-countries',
                'field'     => 'slug',
                'terms'     => [ $country ],
            ],
            [
                'taxonomy'  => 'property-cities',
                'field'     => 'slug',
                'terms'     => [ $city ],
            ],
        ],
        'paged' => $paged
    ];

    if( $meta_key ){
        $args['meta_key'] = $meta_key;
    }

    if( ! isset( $_GET['include-rentedout'] ) ) {

        $args['meta_query'] = [
            [
                'key' => 'rented_out',
                'value' => 1,
                'compare' => '!=',
            ]
        ];
    }

    $query = new WP_Query( $args );

    ?>
	<main role="main">
        <div class="u-soft-half--sides">
            <ul class="[ c-ui-list c-ui-list--dark ] u-hard--bottom [ u-clean--top u-clean--bottom ]">
                <li class="u-hard--sides">
                    <h1 class="u-push-half--bottom"><?php the_title(); ?></h1>
                    <div class="o-flag">
                        <div class="o-flag__body u-block@sm-down u-txt-md">
                            <?php the_content(); ?>
                        </div>
                        <div class="o-flag__component u-block@sm-down u-soft-half--top@sm-down">
                            <ul class="o-inline-list o-breadcrumbs u-txt-zeta">
                                <li>
                                    <?php echo $query->found_posts; ?> <?php echo icl_t('Theme-properties', 'Results'); ?>
                                </li>
                                <li data-breadcrumb="|">
                                    <?php
                                    foreach( $cities as $value ) {
                                        if( $value->slug == $city ) {
                                            echo $value->name;
                                            break;
                                        }
                                    }
                                    ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="u-hard">
                    <form method="get" action="">
                        <div class="c-filter-bar-parent">
                            <ul class="c-filter-bar o-bare-list js-sticky">
                                <li class="c-filter-bar__item">
                                    <ul class="o-bare-list o-flag">
                                        <li class="o-flag__component u-soft-half--right">
                                            <div class="c-filter-bar__label">
                                                <strong><?php echo icl_t('Theme-properties', 'Choose country'); ?>:</strong>
                                            </div>
                                        </li>
                                        <li class="o-flag__body">
                                            <div class="c-styled-select js-select">
                                                <label class="c-styled-select__label c-styled-select__label--sm">
                                                    <span class="js-styled-select-text">
                                                        <?php
                                                        foreach( $countries as $value ) {
                                                            if( $value->slug == $country ) {
                                                                echo $value->name;
                                                                break;
                                                            }
                                                        }
                                                        ?>
                                                    </span>
                                                    <svg class="c-styled-select__chevron">
                                                        <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-chevron"></use>
                                                    </svg>
                                                </label>
                                                <select class="c-styled-select__select" name="country" onchange="this.form.submit()">
                                                    <?php $i = 0; foreach( $countries as $term ) : ?>
                                                        <option value="<?php echo $term->slug; ?>" <?php if( $country == $term->slug ) echo 'selected'; ?>><?php echo $term->name; ?></option>
                                                    <?php $i = 1; endforeach; ?>
                                                </select>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li class="c-filter-bar__item">
                                    <ul class="o-bare-list o-flag">
                                        <li class="o-flag__component u-soft-half--right">
                                            <div class="c-filter-bar__label">
                                                <strong><?php echo icl_t('Theme-properties', 'Choose city'); ?>:</strong>
                                            </div>
                                        </li>
                                        <li class="o-flag__body">
                                            <div class="c-styled-select js-select">
                                                <label class="c-styled-select__label c-styled-select__label--sm">
                                                    <span class="js-styled-select-text">
                                                        <?php
                                                        foreach( $cities as $value ) {
                                                            if( $value->slug == $city ) {
                                                                $city_name = $value->name;
                                                                echo $city_name;
                                                                break;
                                                            }
                                                        }
                                                        ?>
                                                    </span>
                                                    <svg class="c-styled-select__chevron">
                                                        <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-chevron"></use>
                                                    </svg>
                                                </label>
                                                <select class="c-styled-select__select" name="city" onchange="this.form.submit()">
                                                    <?php $i = 0; foreach( $cities as $term ) : ?>
                                                        <option value="<?php echo $term->slug; ?>" <?php if( $city == $term->slug ) echo 'selected'; ?>><?php echo $term->name; ?></option>
                                                    <?php $i = 1; endforeach; ?>
                                                </select>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li class="c-filter-bar__item">
                                    <ul class="o-bare-list o-flag">
                                        <li class="o-flag__component u-soft-half--right">
                                            <div class="c-filter-bar__label">
                                                <strong><?php echo icl_t('Theme-properties', 'Sort by'); ?>:</strong>
                                            </div>
                                        </li>
                                        <li class="o-flag__body">
                                            <div class="c-styled-select js-select">
                                                <?php
                                                $sorts = [
                                                    'price-asc' => icl_t('Theme-properties', 'Sort asc'),
                                                    'price-desc' => icl_t('Theme-properties', 'Sort desc'),
                                                    'date-asc' => icl_t('Theme-properties', 'Sort date asc'),
                                                    'date-desc' => icl_t('Theme-properties', 'Sort date desc'),
                                                ];

                                                $get_sort = sanitize_text_field( $_GET['sort'] ) ?: 'price-asc';
                                                ?>
                                                <label class="c-styled-select__label c-styled-select__label--sm">
                                                    <span class="js-styled-select-text">
                                                        <?php echo $sorts[$get_sort]; ?>
                                                    </span>
                                                    <svg class="c-styled-select__chevron">
                                                        <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-chevron"></use>
                                                    </svg>
                                                </label>
                                                <select class="c-styled-select__select" name="sort" onchange="this.form.submit()">
                                                    <option value="price-asc" <?php if($get_sort == 'price-asc')  echo 'selected' ?>><?php echo icl_t('Theme-properties', 'Sort asc'); ?></option>
                                                    <option value="price-desc" <?php if($get_sort == 'price-desc') echo 'selected' ?>><?php echo icl_t('Theme-properties', 'Sort desc'); ?></option>
                                                    <option value="date-desc" <?php if($get_sort == 'date-desc') echo 'selected' ?>><?php echo icl_t('Theme-properties', 'Sort date desc'); ?></option>
                                                    <option value="date-asc" <?php if($get_sort == 'date-asc') echo 'selected' ?>><?php echo icl_t('Theme-properties', 'Sort date asc'); ?></option>
                                                </select>
                                            </div>
                                        </li>
                                    </ul>
                                </li>

                                <li class="c-filter-bar__item">
<!--                                    <input class="c-styled-input-el u-hidden" onchange="this.form.submit()" type="checkbox" name="include-rentedout"  value="true" id="show-rentout" --><?php //if( isset( $_GET['include-rentedout'] ) ) echo 'checked'; ?><!-->
<!--                                    <label class="c-styled-input-option c-styled-input-option--radio" for="show-rentout">-->
<!--                                        <span class="c-styled-input-option__icon c-styled-input-option__icon--checkbox">-->
<!--                                            <svg class="c-styled-input-option__svg">-->
<!--                                                <use xlink:href="--><?php //bloginfo('template_directory'); ?><!--/build/img/sprite.svg#icon-tick-alt"></use>-->
<!--                                            </svg>-->
<!--                                        </span>-->
<!--                                        --><?php //echo icl_t('Theme-properties', 'Include'); ?>
<!--                                    </label>-->
                                </li>

                            </ul>
                        </div>
                    </form>
                </li>
            </ul>
        </div>
        <div class="c-results js-results">
            <div class="o-grid o-grid--no-gutter o-grid--reverse">


                <div class="o-grid__item u-3/8@sm-up">
                    <div class="js-results-map-placeholder">
                    </div>
                    <div class="c-section-collapse c-section-collapse@sm js-section-collapse">
                        <div class="c-section-collapse__title u-hidden@sm-up">
                            <div class="c-section-collapse__toggle c-section-collapse@sm__toggle js-section-collapse__toggle">
                                <svg class="c-section-collapse__chevron c-section-collapse@sm__chevron">
                                    <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-chevron"></use>
                                </svg>
                            </div>
                            <?php echo icl_t('Theme-login', 'Show map'); ?>
                        </div>
                        <div class="c-section-collapse__content c-section-collapse@sm__content js-section-collapse__content">
                            <div class="js-sticky is-fixed--sm-up" data-sticky-offset="80">
                                <div class="c-results__map js-results-map">
                                    <div class="c-googlemap c-googlemap--results">
                                        <div class="c-googlemap__inner">
                                            <div class="c-googlemap__map c-googlemap__map--results js-googlemap"
                                                 data-marker-url="<?php bloginfo('template_directory'); ?>/build/img/map-marker.png"
                                                 data-map-settings="<?php bloginfo('template_directory'); ?>/json-settings/googlemaps/results-map.json">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="o-grid__item u-5/8@sm-up">
                    <div class="c-results__listing">
                        <h2>
                            <?php echo $city_name; ?>
                        </h2>
                        <ul class="c-ui-list u-hard--ends [ u-clean--top u-clean--bottom ]">

                            <?php
                            if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post();
                            ?>
                                <li class="u-hard--sides">
                                    <?php get_template_part('partials/property-overview'); ?>
                                </li>
                            <?php endwhile; ?>

                            <!-- pagination here -->
                            <?php
                              if (function_exists(custom_pagination)) {
                                custom_pagination($query->max_num_pages,"",$paged);
                              }
                            ?>

                          <?php wp_reset_postdata(); ?>

                          <?php else:  ?>
                            <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
                          <?php endif; ?>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
	</main>
</div>

<script>var mapInformationForListing = <?php echo ww_get_map_information_listing( $query ); ?></script>

<?php get_footer(); ?>





<style>
/* ============================================================
  CUSTOM PAGINATION
============================================================ */
.custom-pagination span,
.custom-pagination a {
  display: inline-block;
  padding: 2px 10px;
}
.custom-pagination a {
  background-color: #ebebeb;
  color: #ee7844;
}
.custom-pagination a:hover {
  background-color: #ee7844;
  color: #fff;
}
.custom-pagination span.page-num {
  margin-right: 10px;
  padding: 0;
}
.custom-pagination span.dots {
  padding: 0;
  color: gainsboro;
}
.custom-pagination span.current {
  background-color: #ee7844;
  color: #fff;
}
</style>


