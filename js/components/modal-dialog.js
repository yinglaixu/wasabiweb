/*------------------------------------*\
    #MODAL DIALOG
\*------------------------------------*/
/*
      
    This module allows modal dialogs to be toggled.


    
<a href="#" class="btn btn--brand btn--md"  
        data-toggle="modal" 
        data-target="<?php bloginfo('template_directory'); ?>/partials/modals/example.php">
        CTA
    </a>

    Video modal
    <a href="#" class="btn btn--brand btn--md"  
        data-toggle="modal" 
        data-target="<?php bloginfo('template_directory'); ?>/partials/modals/video.php"
        data-video-code='<iframe src="https://www.youtube.com/embed/C_fHScmyWTA" width="420" height="315" src="" frameborder="0" allowfullscreen></iframe>'>
        CTA
    </a>

*/


WW.modalDialog = function($) {
    'use strict';
    const modalDialog = $('#modal-dialog'),
        body = $('body');

    const openModal = function openModal(e) {
        const button = $(this),
            target = button.data('target'),
            videoSrc = button.data('video-code') || null,
            delay = 300;
        e.preventDefault();
        body.addClass('is-loading');
        $.ajax(target, { dataType: 'text'})
            .then(contents => {
                modalDialog.html(contents);
                if (videoSrc) {
                    modalDialog.find('#video').html(videoSrc);                    
                }
                setTimeout(() => {
                    body.removeClass('is-loading');
                    modalDialog.children().addClass('is-open');
                    if (body.height() > $(window).height()) {
                        body.css({
                            'overflow' : 'hidden',
                            'padding-right' : WW.scrollbarWidth
                        }).addClass('modal-open');
                        $('.js-navbar').css({
                            'margin-right' : WW.scrollbarWidth
                        });
                    }
                }, delay);
            })
            .fail(() => {
                body.removeClass('is-loading');
                throw 'Unable to load modal: ' + target;
            });
    };

    const closeModal = function closeModal() {
        const delay = 800;
        $(this).closest('.js-modal').removeClass('is-open');
        body.css({
            'overflow' : 'auto',
            'padding-right' : 0
        }).removeClass('modal-open');
        $('.js-navbar').css({
            'margin-right' : 0
        });
        setTimeout(() => {
            modalDialog.html('');
        }, delay);

    };

    const changeModal = function changeModal() {
        const delay = 0;
        const button = $(this), target = button.data('target');

        $(this).closest('.js-modal').removeClass('is-open');
        body.css({
            'overflow' : 'auto',
            'padding-right' : 0
        }).removeClass('modal-open');
        $('.js-navbar').css({
            'margin-right' : 0
        });

        body.addClass('is-loading');
        $.ajax(target, { dataType: 'text'})
            .then(contents => {
                modalDialog.html(contents);
                setTimeout(() => {
                    body.removeClass('is-loading');
                    modalDialog.children().addClass('is-open');
                    if (body.height() > $(window).height()) {
                        body.css({
                            'overflow' : 'hidden',
                            'padding-right' : WW.scrollbarWidth
                        }).addClass('modal-open');
                        $('.js-navbar').css({
                            'margin-right' : WW.scrollbarWidth
                        });
                    }
                }, delay);
            })
            .fail(() => {
                body.removeClass('is-loading');
                throw 'Unable to load modal: ' + target;
            });
    };

    body.on('click', '*[data-toggle="modal"]', openModal);
    modalDialog.on('click', '*[data-dismiss="modal"]', closeModal);
    // if (body.hasClass('modal-open')){
    //     console.log('has modal open');
    //     modalDialog.on('click', '*[data-change = "modal"]', changeModal);
    // }
    // else{
    //     console.log('dont has modal open');
    //     body.on('click', '*[data-change = "modal"]', changeModal);
    // }
    modalDialog.on('click', '*[data-change = "modal"]', changeModal);
    modalDialog.on('click', '.js-modal-dialog', e => {
        e.stopPropagation();
    });

    return this;
};

// add the following to main.js .modalDialog($)




































