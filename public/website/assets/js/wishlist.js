function setCookie(key, value) {
    $.cookie(key,value,{expires: 20*365,path:'/'});
}

addLoadEvent(function () {
$(document).ready(function () {
    wishlist();
});
});


function wishlist() {
    var fav_trips = $.cookie('fav_trips');
    fav_trips = fav_trips ? JSON.parse(fav_trips) : [];
    $.each(fav_trips, function (k, v) {
        $('.favourite[data-trip="' + v.id + '"]').attr('fill','red').addClass('added');
    });

    $('#cart-count').html(fav_trips.length);
    $(document).on('click','.favourite', function (e) {
        e.preventDefault();
        var trip_id = $(this).attr('data-trip');
        var url = $(this).attr('data-url');
        var action = $(this).hasClass('added') ? 'remove' : 'add';
        var curIndex = fav_trips.findIndex(x => x.id == trip_id);
        if (action == 'remove') {
            fav_trips.splice(curIndex, 1);
            $(this).removeClass('added');
            if($(this).hasClass('btn-custom'))
            {
                $('#wishText').text('Add to wishlist');
                $(this).find('svg').attr('fill','none');
            }else
            {
                $(this).attr('fill','none');
            }
            $('#toastMessage').text("Trip successfully removed from favourite!")
            $('#toastStatus').text("success")
            $('.toaster-wrapper').show();
        } else {
            if (curIndex >= 0) {
                $('#toastMessage').text("Already added to favourite!")
                $('#toastStatus').text("success")
                $('.toaster-wrapper').show();
                return false;
            }
            $(this).addClass('added');
            if($(this).hasClass('btn-custom'))
            {
                $('#wishText').text('Added to wishlist');
                $(this).find('svg').attr('fill','#F95B5B');
            }else
            {
                $(this).attr('fill','#F95B5B');
            }
            fav_trips.push({'id': trip_id, 'trip_title': $(this).attr('data-name')});

        }
        setCookie('fav_trips', JSON.stringify(fav_trips));
        $('#cart-count').html(fav_trips.length);

        if (customer_id) {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
            
            $.ajax({
                url: url,
                type: 'post',
                dataType: 'json',
                contentType: 'application/json',
                data: JSON.stringify(fav_trips),
                success: function (data) {
                    // console.log(data);
                }
            })


        }
        $(document).trigger(jQuery.Event( "wishlist-updated" ));
        $('#toastMessage').text("Trip favourite updated!")
        $('#toastStatus').text("success")
        $('.toaster-wrapper').show();
    });
}











