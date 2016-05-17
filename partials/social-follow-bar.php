<div class="u-hard--t">
    <p class = "social-icon-line"> </p>
    <h3 class="u-txt-md socal-follow-bar-title">
        <strong><?php echo icl_t('Theme', 'Follow us'); ?></strong>
    </h3>
    <ul class="o-inline-list o-inline-list--spaced-half social-icon-list">
        <li>
            <a href="<?php the_field('facebook', 'options'); ?>" class="c-svg-icon c-svg-icon--social" target="_blank">
                <object id="svg1" data="<?php bloginfo('template_directory'); ?>/build/img/facebook.svg" type="image/svg+xml"></object>
            </a>
        </li>
        <li>
            <a href="<?php the_field('twitter', 'options'); ?>" class="c-svg-icon c-svg-icon--social" target="_blank">
                <object id="svg1" data="<?php bloginfo('template_directory'); ?>/build/img/instagram.svg" type="image/svg+xml"></object>
            </a>
        </li>
        <li>
            <a href="<?php the_field('google', 'options'); ?>" class="c-svg-icon c-svg-icon--social" target="_blank">
                <object id="svg1" data="<?php bloginfo('template_directory'); ?>/build/img/linkedin.svg" type="image/svg+xml"></object>
            </a>
        </li>
        <li>
            <a href="<?php the_field('google', 'options'); ?>" class="c-svg-icon c-svg-icon--social" target="_blank">
                <object id="svg1" data="<?php bloginfo('template_directory'); ?>/build/img/youtube.svg" type="image/svg+xml"></object>
            </a>
        </li>
    </ul>                                            
</div>

<style>
    .social-icon-line{
        margin-left: auto;
        margin-right: auto;
        margin-top: 50px;
        width: 90%;
        border: 1px solid #dce0e0;
        opacity: 0.1;

    }
    a{
        display: inline-block;
    }
    .socal-follow-bar-title{
        text-align: center;
    }
    object{
        pointer-events: none;
    }
    .social-icon-list{
        text-align: center;
        margin-top: 10px;
        margin-bottom: 20px;
    }
    .social-icon-list li{
        padding-left: 10px;
        padding-right: 10px;
    }
    .social-icon-list a:hover{
        margin-top:-30px;
    }
</style>
