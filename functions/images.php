<?php

/**
* Change how much Wordpress Compress JPEG Images
*/
add_filter('jpeg_quality', function($arg) {
	return 100;
});

/**
 * Add automatic image sizes
 *
 * add_image_size('NAME_OF_THE_SIZE', WIDTH, HEIGHT, TRUE/FALSE or CROP POSITIONING);
 * 
 * True will scale and then crop from center center,
 * False will scale to the smallest of the sizes then crop so it becomes square
 *
 * Crop positioning is written in this way: array('x_crop_position', 'y_crop_position');
 *
 * x_crop_position accepts 'left' 'center', or 'right'.
 * y_crop_position accepts 'top', 'center', or 'bottom'.
 *
 * To set an unlimited height or width use the value 9999
 *
 */
if (function_exists('add_image_size')) {
    /* Employee image, used for employees and partners */
    // add_image_size('employee-image', 172, 200, true);
    // add_image_size('employee-image', 172, 200, array('left', 'top'));

    // Flag
    add_image_size('26x16', 26, 16);

    // site banner-lg
    add_image_size('2000x850', 2000, 850, array('center', 'center'));
    // site banner-sm
    add_image_size('500x350', 500, 350, array('center', 'center'));

    // region block
    add_image_size('800x421', 800, 421, array('center', 'center'));

    // testimonial
    add_image_size('170x170', 170, 170, array('center', 'top'));

    // partner logo sm
    add_image_size('250x100', 250, 100);
    // partner logo lg
    add_image_size('380x140', 380, 140);


    // results image
    add_image_size('370x222', 370, 222, array('center', 'center'));

    // subpage banner-lg
    add_image_size('2000x270', 2000, 270, array('center', 'center'));
    // subpage banner-sm
    add_image_size('500x150', 500, 150, array('center', 'center'));

    // partners article
    add_image_size('430x9999', 430, 9999);

    // hero image (page about)
    add_image_size('1170x9999', 1170, 9999);

    // Single property slider-lg
    add_image_size('1170x700', 1170, 700, array('center', 'center'));
    // Single property slider-sm
    add_image_size('500x299', 500, 299, array('center', 'center'));
    // Single property overview
    add_image_size('175x175', 175, 175, array('center', 'center'));

    add_image_size('2500x9999', 2500, 9999, array('center', 'center'));

    add_image_size( '580x325', 580, 325, array('center', 'center') );
}
