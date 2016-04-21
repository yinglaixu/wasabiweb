<?php
$image = get_field('banner_image');
if( $image ) :
?>
    <style scoped>
        /* 500x150 */
        .c-subpage-banner__img {
           background-image: url('<?php echo $image['sizes']['500x150']; ?>');
        }
        @media (min-width: 481px) {
            /* 2000x270 */
            .c-subpage-banner__img {
               background-image: url('<?php echo $image['sizes']['2000x270']; ?>');
            }
        }
    </style>
    <div class="c-subpage-banner">
        <div class="c-subpage-banner__img">
        </div>
        <div class="c-subpage-banner__overlay">
            <div class="o-flag u-fill-height">
                <div class="o-flag__body">
                    <div class="o-site-wrap o-site-wrap--padding">
                        <h1 class="u-flush--bottom">
                            <?php the_field('banner_text'); ?>
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>