<div class="u-hard--t">
    <p class = "social-icon-line"> </p>
    <h3 class="u-txt-md socal-follow-bar-title">
        <strong><?php echo icl_t('Theme', 'Follow us'); ?></strong>
    </h3>
    <ul class="o-inline-list o-inline-list--spaced-half social-icon-list">
        <li>
            <div id = 'facebook'>
                <a href="<?php the_field('facebook', 'options'); ?>" class="c-svg-icon c-svg-icon--social" target="_blank">
                </a>
            </div>
        </li>
        <li>
            <div id = 'instagram'>
                <a href="<?php the_field('instagram', 'options'); ?>" class="c-svg-icon c-svg-icon--social" target="_blank">
                </a>
            </div>
        </li>
        <li>
            <div id = "linkedin">
                <a href="<?php the_field('linkedin', 'options'); ?>" class="c-svg-icon c-svg-icon--social" target="_blank">
                </a>
            </div>
        </li>
        <li>
            <div id = "youtube">
                <a href="<?php the_field('youtube', 'options'); ?>" class="c-svg-icon c-svg-icon--social" target="_blank">
                </a>
            </div>
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
    /*.social-icon-list a:hover{*/
        /*margin-top:-30px;*/
    /*}*/

    #facebook {
        background: url("<?php bloginfo('template_directory'); ?>/build/img/facebook-black.svg");
        -webkit-transition: background-image 0.2s ease-in-out;
        transition: background-image 0.2s ease-in-out;
    }
    #facebook:hover {
        background: url("<?php bloginfo('template_directory'); ?>/build/img/facebook-color.svg");
    }

    #instagram {
        background: url("<?php bloginfo('template_directory'); ?>/build/img/insta-black.svg");
        -webkit-transition: background-image 0.2s ease-in-out;
        transition: background-image 0.2s ease-in-out;
    }
    #instagram:hover {
        background: url("<?php bloginfo('template_directory'); ?>/build/img/insta-color.svg");
    }

    #linkedin {
        background: url("<?php bloginfo('template_directory'); ?>/build/img/linkedin-black.svg");
        -webkit-transition: background-image 0.2s ease-in-out;
        transition: background-image 0.2s ease-in-out;
    }
    #linkedin:hover {
        background: url("<?php bloginfo('template_directory'); ?>/build/img/linkedin-color.svg");
    }

    #youtube {
        background: url("<?php bloginfo('template_directory'); ?>/build/img/youtube-black.svg");
        -webkit-transition: background-image 0.2s ease-in-out;
        transition: background-image 0.2s ease-in-out;
    }
    #youtube:hover {
        background: url("<?php bloginfo('template_directory'); ?>/build/img/youtube-color.svg");
    }

</style>
