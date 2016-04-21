/*------------------------------------*\
    #NAVBAR 
\*------------------------------------*/


// WW.navbar = function($) {
//     'use strict';
//     let toggleNav,
//         touchFriendlySubNav,
//         closeNavMobile,
//         setNavMaxHeight;
//     toggleNav = navbar => {
//         navbar.on('click', '.js-toggle-nav', function(e) {
//             e.preventDefault();
//             const el = $(this);
//             el.closest('.js-nav-parent')
//             .toggleClass('is-open');
//             if (el.closest('.js-site-header').length && 
//                 !el.closest('.js-submenu-parent').length) {
//                 setNavMaxHeight(navbar);
//                 $('.js-page-content, body').toggleClass('js-site-nav-is-open site-nav-is-open');
//                 if ($('body').hasClass('js-site-nav-is-open')) {
//                     $('body').css({
//                         'padding-right' : WW.scrollbarWidth,
//                         overflow : 'hidden'
//                     });
//                     if ($('.js-navbar').hasClass('fixed')) {
//                         $('.js-navbar').css('right', WW.scrollbarWidth + 'px');
//                     }
//                 } else {
//                     $('body').css({
//                         'padding-right': 0,
//                         overflow : 'auto'
//                     }); 
//                     $('.js-navbar').css('right', 0);
//                 }
//             }
//         });
//     };

//     touchFriendlySubNav = navbar => {
//         let delay = 1200,
//             id,
//             timer;
//         navbar.find('.js-navbar__nav a').each(function(i) {
//             $(this).attr('data-nav-id', i);
//         });
//         if (WW.isTouch) {
//             navbar.on('click', '.js-nav-parent >a', function(e) {
//                 let tempId;
//                 if (!navbar.closest('.navbar--collapsed').length) {
//                     tempId = $(this).data('nav-id');
//                     if (tempId !== id) {
//                         e.preventDefault();
//                         id = tempId;
//                         timer = setTimeout(() => {
//                             id = null;
//                         }, delay);
//                     } else {
//                         clearTimeout(timer);
//                         id = null;
//                     }                    
//                 }
//             });
//         }
//     };

//     closeNavMobile = navbar => {
//         // closes the mobile nav when user clicks on a link.
//         navbar.on('click', 'a', e => {
//             if (!$(e.target).closest('.js-toggle-nav').length) {
//                 $('body').removeClass('js-site-nav-is-open site-nav-is-open')
//                     .css('padding-right', 0);
//                 $('.page-content').removeClass('js-site-nav-is-open site-nav-is-open');
//                 $('.js-navbar').removeClass('is-open');
//             }
//         });
//     };

//     setNavMaxHeight = navbar => {
//         let siteHeaderTop = $('.js-site-header__top'),
//             siteHeaderTopHeight = 0,
//             siteNavParent = $('.js-site-header').find('.js-nav-parent'),
//             siteNavParentHeight = 0;
//         if (siteHeaderTop.length && navbar.css('position') !== 'fixed') {
//             siteHeaderTopHeight = siteHeaderTop.outerHeight();
//         }
//         if (siteNavParent.length) {
//             siteNavParentHeight = siteNavParent.outerHeight();
//         }
//         const winHeight = document.documentElement.clientHeight - (siteHeaderTopHeight + siteNavParentHeight);
//         $('.js-navbar__nav').css({
//             'max-height' : winHeight + 'px'
//         });
//     };


//     $('.js-navbar').each(function() {
//         const el = $(this);
//         toggleNav(el);
//         setNavMaxHeight(el);
//         touchFriendlySubNav(el);
//         setTimeout(() =>{
//             closeNavMobile(el);
//         },200);
//     });

//     return this;
// };