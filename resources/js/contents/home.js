$(function () {
    'use strict';

    const players = Array.from(document.querySelectorAll("audio[id^=my-music-]")).map(p => new Plyr(p));

    var isRtl = $('html').attr('data-textdirection') === 'rtl',
        readOnlyRatings = $('.read-only-ratings'),
        eventRatings = $('.event-ratings'),
        ratingMethods = $('.methods-ratings'),
        initializeRatings = $('.btn-initialize'),
        destroyRatings = $('.btn-destroy'),
        getRatings = $('.btn-get-rating'),
        setRatings = $('.btn-set-rating');


    // Read Only Ratings
    // --------------------------------------------------------------------
    if (readOnlyRatings.length) {
        readOnlyRatings.rateYo({
            rating: 2,
            rtl: isRtl
        });
    }

    // Ratings Events
    // --------------------------------------------------------------------

    // onSet Event
    if (eventRatings.length) {
        eventRatings
            .rateYo({
                rtl: isRtl,
                multiColor: {
                    startColor: '#ea5455',
                    endColor: '#7367f0'
                }
            })
            .on('rateyo.change', function (e, data) {
                var rating = data.rating;
                $(this).parent().find('.counter').text(rating);
            })
            .on('rateyo.set', function (e, data) {
                event.preventDefault();

                let rating = data.rating;
                let musicId = $(this).parent().children().next().find('.counter').attr('id');
                let _token   = $('meta[name="csrf-token"]').attr('content');
                let _url = "/rating/" + musicId;

                $.ajax({
                    url: _url,
                    type:"POST",
                    data:{
                        rating:rating,
                        _token: _token
                    },
                    success:function(response){
                        alert("Cám ơn bạn đã đánh giá!");
                    },
                });
            });
    }

    // Ratings Methods
    // --------------------------------------------------------------------
    if (ratingMethods.length) {
        var $instance = ratingMethods.rateYo({
            rtl: isRtl
        });

        if (initializeRatings.length) {
            initializeRatings.on('click', function () {
                $instance.rateYo({
                    rtl: isRtl
                });
            });
        }

        if (destroyRatings.length) {
            destroyRatings.on('click', function () {
                if ($instance.hasClass('jq-ry-container')) {
                    $instance.rateYo('destroy');
                } else {
                    window.alert('Please Initialize Ratings First');
                }
            });
        }

        if (getRatings.length) {
            getRatings.on('click', function () {
                if ($instance.hasClass('jq-ry-container')) {
                    var rating = $instance.rateYo('rating');
                    window.alert('Current Ratings are ' + rating);
                } else {
                    window.alert('Please Initialize Ratings First');
                }
            });
        }

        if (setRatings.length) {
            setRatings.on('click', function () {
                if ($instance.hasClass('jq-ry-container')) {
                    $instance.rateYo('rating', 1);
                } else {
                    window.alert('Please Initialize Ratings First');
                }
            });
        }
    }
});