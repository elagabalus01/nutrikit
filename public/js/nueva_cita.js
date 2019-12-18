$("#searchRfc").autocomplete({
    source: function(request, response){
        $.ajax({url: '/api/autocomplete',
            type:"post",
            data: {
                term : request.term,
            },
            dataType: "json",
            success: function(data){
                response(data);
            }
        });
    },
    minLength: 2,
});
function setMinDate(){
    var mydate = new Date();
    mydate.setDate(mydate.getDate() - 30);

    var day = mydate.getDate();
    console.log(day);
    // var month = ("0" + (mydate.getMonth() + 1)).slice(-2)
    // var year = mydate.getFullYear();

    // var fullDate = year + '-' + month + '-' + day;

    // var myDatePicker = document.getElementById('myDatePicker');
    // myDatePicker.setAttribute('min', fullDate);
}