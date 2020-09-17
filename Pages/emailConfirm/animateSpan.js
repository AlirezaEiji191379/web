$(document).ready(function () {
    $("input").focus(function () {
        $(this).attr("placeholder","");
        let className=$(this).attr("class");
        $("#"+className).fadeIn();
    });
    $("input").blur(function () {
        let className=$(this).attr("class");
        // $("#"+className).css("display","none");
        $("#"+className).fadeOut();
        if(className==="emailCode"){
            $(this).attr("placeholder","کد تایید");
        }
    });
});