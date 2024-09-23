window.onload = function(){
    $("#warning-div").slideUp(1);
$(".botao-mais").click(function(){
    $(this).next(".div-mais").slideToggle();
});

$("#warning-button").click(function(){
    $("#warning-div").slideToggle();
});
}