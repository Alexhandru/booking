$(function(){
    $('#fetch').submit(function(e){
        var route = $('#fetch').data('route');
        var fetch = $(this);
        $.ajax({
            type: 'POST',
            url: route,
            data: fetch.serialize(),
            success: function(result){
                $('#fetchResults').html('');
                $.each(result, function(key, value){
                    console.log(value.City);
                    $('#fetchResults').append(value.Name + ' ' + value.Adress + ' ' + value.City + '<br>')
                });
                
                //$('#fetchResults').html('<p>'+data+'</p>');
            }
        });
        e.preventDefault();

    });
});