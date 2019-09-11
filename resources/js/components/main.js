(function ($) {
    'use strict';

    $(document).on('click', '.js-game-history', function () {
        var link = $(this).data('link');
        $.ajax({
            method: 'post',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/game/history',
            data: {
                page: link
            }
        }).done(function (response) {
            $('#ajax_response').html(response.view);
        });
    });

    $(document).on('click', '.js-game', function () {
        var link = $(this).data('link');
        $.ajax({
            method: 'post',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/game/make',
            data: {
                page: link,
            }
        }).done((response) => {
            $('#ajax_response').html(response.view);
        })
    });

    $(document).on('click', '.js-edit-link', function (e) {
        e.preventDefault();
        var link = $(this).data('link');
        var action = $(this).data('action');
        console.log(link);
        console.log(action);
        $.ajax({
            method: 'post',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/game/edit',
            data: {
                page: link,
                action: action
            }
        }).done((response) => {

            if(response.ok){
                window.location.href = response.link
            }
        })
    });


    $(document).on('click','.js-copy-url', function () {
        var tmp   = document.createElement('INPUT'),
            focus = document.activeElement;

        tmp.value = window.location.href;

        document.body.appendChild(tmp);
        tmp.select();
        document.execCommand('copy');
        document.body.removeChild(tmp);
        focus.focus();

        alert('link copied');
    });



})(jQuery);