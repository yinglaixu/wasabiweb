/*------------------------------------*\
    #SCROLL TO HASH LOCATIONS
\*------------------------------------*/

/*
this object gives smooth scrolling to a hash either from the current page or from a different page.

NOTE: the url in the hash link for a different page must be like this: <a href="page#_about">
Notice the underscore after the #.  This needs to be there, it stops the broswer default loading at the hash location.  The id for the actual location can remain as is.
The href in a current page scroll can be written in the normal fashion.





Example for scroll to same page with no offset

    <a href="#hash" class="js-scroll">Foo</a>

    ...
    ...

    <div id="hash">
        ...
    </div>





Example for scroll to same page with offset -- Number normally
    equal to height of sticky items that might otherwise be obscuring the
    target object after the animation.

<a href="#hash" class="js-scroll">Foo</a>

    ...
    ...

    <div id="hash" data-scroll-offset="45"> 
        ...
    </div>






Example for scroll when the link is located on another page

    Page 1:
        <a href="#_hash">Foo</a>


    Page 2:
        <div id="hash">
            ...
        </div>
*/



WW.scrollToHashLocations = function($) {
    'use strict';
    let fromThisPage,
        fromOtherPage,
        getOffset,
        initiateScroll;
    fromThisPage = () => {
        $('.js-scroll').on('click',function(e) {
            e.preventDefault();
            const el = $(this);
            setTimeout(() => {
                if(el.attr('href').indexOf('#') === 0) {
                    let currHash= el.attr('href');
                    getOffset(currHash);
                }
            },10);
            
        });
    };

    fromOtherPage = () => {
        setTimeout(() =>{
            let currHash = $(location).attr('hash');
            if (currHash) {
                currHash = '#' + currHash.slice(2,currHash.length);
                getOffset(currHash);
            }
        },500);
    };

    getOffset = hash => {
        const dataOffset = $(hash).data('scroll-offset') || 0;
        initiateScroll(hash, dataOffset);
    };

    initiateScroll = (hash, dataOffset) => {
        if (hash && $(hash).length) {
            const hashOffset = ($(hash).offset().top - dataOffset);
            $('.js-navbar').each(function() {
                $(this).removeClass('open');
            });
            $('html, body').animate({
                scrollTop: hashOffset
            }, 500, 'swing');
        }
    };

    fromThisPage();
    fromOtherPage();

    return this;
};

// put this code in main.js .scrollToHashLocations($)
