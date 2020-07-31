$(function(){
    $('#fetch').submit(function(e){
        var route = $('#fetch').data('route');
        var fetch = $(this);
        var personss = $("#persons");
        $.ajax({
            type: 'POST',
            url: route,
            data: fetch.serialize(),
            success: function(result){
                var checkIn = new Date($("#checkIn").val());
                dayCI = checkIn.getDate();
                monthCI = checkIn.getMonth() + 1;
                yearCI = checkIn.getFullYear();

                var checkOut = new Date($("#checkOut").val());
                dayCO = checkOut.getDate();
                monthCO = checkOut.getMonth() + 1;
                yearCO = checkOut.getFullYear();

                console.log([dayCI, monthCI, yearCI].join('/'));
                $('#fetchResults').html('');
                var resultCount = result.length;
                $('#textResults').html('');
                $('#textResults').append('We found ' + resultCount + ' results matching your criteria <br><br>');
                $.each(result, function(key, value){
                    //console.log(value.City);
                    //$('#fetchResults').append(value.Name + ' ' + value.Adress + ' ' + value.City + '<br>')
                    $('#fetchResults').append(
                      '<div class="card" style="width: 18rem;">' +
                          '<img class="card-img-top" src=' + value.URL + ' alt="Card image cap">' +
                          '<div class="card-body">' +
                            '<h5 class="card-title">' + value.Name + '</h5>' +
                            '<p class="card-text">' + "" + '</p>' +
                          '</div>' +
                          '<ul class="list-group list-group-flush">' +
                            '<li class="list-group-item">' + value.City +'</li>' +
                            '<li class="list-group-item">' + value.Adress + '</li>' +
                            '<li class="list-group-item">' + value.Category +'</li>' +
                          '</ul>' +
                          '<div class="card-body">' +
                            '<a href="/rooms/' + value.ID + '/' + personss.val()  + '/' + [yearCI, monthCI, dayCI].join('-').toString() + '/' + [yearCO, monthCO, dayCO].join('-').toString() + '" class="card-link">Go to rooms</a>' +
                          '</div>' +
                      '</div>' +
                    '<br>')
                });
            }
            
        });
        
        e.preventDefault();

    });
});