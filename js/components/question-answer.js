/*------------------------------------*\
    #SLIDER 
\*------------------------------------*/

/*!
 * Peppermint touch slider
 * v. 1.3.7 | https://github.com/wilddeer/Peppermint
 * Copyright Oleg Korsunsky | http://wd.dizaina.net/
 *
 * Depends on Event Burrito (included) | https://github.com/wilddeer/Event-Burrito
 * MIT License
 */


WW.questionAnswer = function($){
    'use strict';
    function init(){

        var aboutRenthia = $('#question-about-renthia');
        var myAccount = $('#question-my-account');
        var payment = $('#question-payment');
        var contract = $('#question-contract');
        var landlord = $('#question-landlord');
        var tenant = $('#question-tenant');
        var insurance = $('#question-insurance');

        hideMoreQuestions(aboutRenthia);
        hideMoreQuestions(myAccount);
        hideMoreQuestions(payment);
        hideMoreQuestions(contract);
        hideMoreQuestions(landlord);
        hideMoreQuestions(tenant);
        hideMoreQuestions(insurance);

        $('.toggle-more').on('click', function(e) {

            e.preventDefault();
            var questionList = $(this).prev();
            showMoreQuestions(questionList);
        });

        $('.toggle-less').on('click', function(e) {

            e.preventDefault();
            var questionList = $(this).prev().prev();
            hideMoreQuestions(questionList);
        });

        $('.toggle-slide').on('click', function(e) {

            e.preventDefault();
            $(this).parent().next().slideToggle();
        });

    }

    function hideMoreQuestions(questionList){
        var n = questionList.children().length;
        var lists = questionList.children();
        if(n >= 4){
            var parent = questionList.parent();
            parent.find('.toggle-more').show();
            parent.find('.toggle-less').hide();

            for(var i = n-1; i >= 4;i--){
                lists.eq(i).fadeOut();
            }
        }
    }

    function showMoreQuestions(questionList){
        var n = questionList.children().length;
        var lists = questionList.children();
        if(n >= 4){
            var parent = questionList.parent();
            parent.find('.toggle-more').hide();
            parent.find('.toggle-less').show();

            for(var i = n-1; i >= 4;i--){
                var j = i % 2;
                if(j === 0){
                    lists.eq(i).fadeIn();
                }
            }
        }
    }

    init();

    return this;
};
