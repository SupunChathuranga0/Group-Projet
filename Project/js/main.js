//modal
$(document).ready(function(){
    $(".card-link").click(function(){
    $(".rounded").attr("src",$(this).siblings("img").attr("src"));
    $(".product_name").text($(this).siblings("h2").text());
    $(".product_desc").text($(this).siblings("div").find("p:nth(0)").text()+"  "+$(this).siblings("div").find("p:nth(1)").text());
    $(".product_category").text($(this).parent().siblings("div").find("p:nth(0)").text());

    });
    $(window).resize(function (){
        if($(window).width() < 600){
        $(".modal-content").css("transform" , "scaleX(1)");
        }
        else{
         $(".modal-content").css("transform" , "scaleX(1.4)");
        }

    });
});