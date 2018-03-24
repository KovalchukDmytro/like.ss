$("form#js-pay").on('submit',function(e){
     e.preventDefault();

    $.ajax({
        type: 'POST',
        url: '/form/pay',
        data: $( this ).serialize(),
        success: function (response) {
            if (response=='success')
            {
                $('#js-pay').trigger("reset");
                $('.js-text').text('Успешно');
            }
            else {
                $('.js-text').text(response);
            }


        },
        error: function (data) {
        }
    });
});
$("form#js-discribe").on('submit',function(e){
    e.preventDefault();

    $.ajax({
        type: 'POST',
        url: '/form/discribe',
        data: $( this ).serialize(),
        success: function (response) {
            if (response=='success')
            {
                $('#js-discribe').trigger("reset");
                $('.js-text-discribe').text('Успешно');
            } else {
                $('.js-text-discribe').text(response);
            }


        },
        error: function (data) {
        }
    });
});