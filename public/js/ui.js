// Se selecciona cuando esta en el lick
$(".navbar .nav-link").on("click", function(){
    $(".nav").find(".active").removeClass("active");
    $(this).addClass("active");
});