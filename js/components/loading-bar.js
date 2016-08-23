

WW.loadingBar = function($) {
    'use strict';

    $('#rentoutFormSubmitBtn').children().click(function(){
        emulateProcesses();
    });

    // Emulate running processes
    function emulateProcesses() {
        $('.loading-bar').css('left', '-100%');
        var completed = 0;
        var processes = 16;
        setInterval(function(){
            if(completed <= processes) {
                loadBar(completed, processes, 'Processing...', 'Wait for submitting...', 4000);
                completed++;
            }
        }, rand(0,500));
    }

    // Feed completed processes and total processes
    function loadBar(completed, total, processingMessage, completeMessage, hideDelay) {
        var progress = (completed / total) * 100;
        $('.loading-bar-container').show();
        $('.loading-bar').html('');
        $('.loading-bar-outer-text').html(processingMessage);

        $('.loading-bar').stop().animate({
            left: '-' + (100 - progress) + '%'
        }, 600, function () {
            if (progress === 100) {
                $('.loading-bar').html(completeMessage);
                $('.loading-bar-outer-text').html('');

                if (hideDelay) {
                    $('.loading-bar-container').delay(hideDelay).fadeOut(300);
                    setTimeout(function () { $('.loading-bar').css({ left: '-100%' }); }, hideDelay + 300);
                }
            }
        });
    }

    // Helper func
    function rand(min, max) {
        return Math.floor(Math.random() * (max - min + 1)) + min;
    }

    return this;
};

