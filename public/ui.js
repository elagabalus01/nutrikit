$(".navbar .nav-link").on("click", function(){
    $(".nav").find(".active").removeClass("active");
    $(this).addClass("active");
});
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