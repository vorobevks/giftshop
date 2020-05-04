const cardButton = document.querySelector("#card-button");
const modal = document.querySelector(".modal");
const close = document.querySelector(".close");

cardButton.addEventListener('click', function (event) {
    modal.classList.add("is-open");
});

close.addEventListener("click", function (event) {
    modal.classList.remove("is-open");
});
//скрываем все сложенные менюшки
$('.hidden-ul').hide();
$('.fa-chevron-up').hide();
//функция для отображения скрытых менюшек
$('.button-hidden-ul').click(function(){
    var id_button = $(this).attr('data-id');
   // alert(id_button);
    $('.hidden-ul[data-id="'+id_button+'"]').toggle(200);
    $('.fa-chevron-up[data-id="'+id_button+'"]').toggle();
    $('.fa-chevron-down[data-id="'+id_button+'"]').toggle();
});
/*$('.left-sidebar-link').hover(
    function(){
        $(this).siblings('.button-hidden-ul').addClass('bgc-for-button');
        },
    function(){
        $(this).siblings('.button-hidden-ul').removeClass('bgc-for-button');
        }
);

$('.button-hidden-ul').hover(
    function(){
        $(this).siblings('.left-sidebar-link').addClass('bgc-for-button');
        },
    function(){
        $(this).siblings('.left-sidebar-link').removeClass('bgc-for-button');
        }
);*/