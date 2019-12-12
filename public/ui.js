console.log("WWorking");
$(".navbar .nav-link").on("click", function(){
    console.log("WWorking");
    console.log(this);
    $(".nav").find(".active").removeClass("active");
    $(this).addClass("active");
});