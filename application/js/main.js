$(document).ready(function() {
    if ($.cookie("user_name")){
    $.ajax({
        url:"/cart/count",
        type:"POST",
        success: function(data){
            $('#count_in_cart').html(data);
        }
    });
    var id_product = $('#id_product').val();
    $.ajax({
        url:"/cart/isincart/"+id_product,
        type:"post",
        success: function(data){
            if (data!='0') {
                $('#btn_incart').html("Товар в корзине"); 
                $('#btn_incart').addClass("disabled");
            }
        }
    })
}
}); 

//авторизация
$('#logon_form').submit(function(e){
    e.preventDefault();
    $.ajax({
        url: this.action,
        type: this.method,
        data: $(this).serialize(),
        success: function(data) {
            if (data=='false') alert('Неверный логин или пароль');
            else location.reload();
        }
    });
});
//проверка на существование пользователя в бд
$('#login').keyup(function(){
    $.ajax({
        url: "/application/isUser.php",
        type: "POST",
        data: {login:$(this).val()},
        success: function(data){
            if(data=="false" && $('#login').val().length>4) {
                $('#user_ok').removeClass("hidden");
                $('#user_wrong').addClass("hidden");

            }
            else{
                $('#user_ok').addClass("hidden");
                $('#user_wrong').removeClass("hidden");
            }
        }
    })
})

//регистрация
$('#reg_form').submit(function(e){
    
    e.preventDefault();
    if ($('#login').val().length>4 && $('#password').val().length>6 && $('#password').val()==$('#repassword').val()){
    $.ajax({
        url: this.action,
        type: this.method,
        data: $(this).serialize(),
        success: function(data) {
            if (data=='false') alert('Такой пользователь уже существует');
            else location.reload();
        }
    });
    }
});

//соответсвует ли пароль указанным требованиям
$('#password').keyup(function(){
    if ($(this).val().length>6) {
        $('#password_ok').removeClass("hidden");
        $('#password_wrong').addClass("hidden");
    }
    else{
        $('#password_ok').addClass("hidden");
        $('#password_wrong').removeClass("hidden");
    }
})
//совпадают ли пароли
$('#repassword').keyup(function(){
    if($(this).val()==($('#password').val())){
        $('#repassword_ok').removeClass("hidden");
        $('#repassword_wrong').addClass("hidden");
    }
    else{
        $('#repassword_ok').addClass("hidden");
        $('#repassword_wrong').removeClass("hidden");
    }
})


//модальные окна
$('.button-modal').click(function(){
    $(this).next().toggleClass("open");
}); 
$('.button-close').click(function(){
    $(this).parent().parent().toggleClass("open");
});


/*const cardButton = document.querySelector("#card-button");
const modal = document.querySelector(".modal");
const close = document.querySelector(".close");

cardButton.addEventListener('click', function (event) {
    modal.classList.add("is-open");
});

close.addEventListener("click", function (event) {
    modal.classList.remove("is-open");
});*/
//скрываем все сложенные менюшки
$('.hidden-ul').hide();
$('.fa-chevron-up').hide();
//функция для отображения скрытых менюшек
$('.button-hidden-ul').click(function(){
    var id_button = $(this).attr('data-id');
   // alert(id_button);
    $('.hidden-ul[data-id="'+id_button+'"]').toggle(500);
    $('.fa-chevron-up[data-id="'+id_button+'"]').toggle();
    $('.fa-chevron-down[data-id="'+id_button+'"]').toggle();
});

//переключение фоток в просмотре товара
$('.small-photo-item').click(function(){
    //alert($(this).children("img").attr("src"));
    $('#main-photo').attr("src", $(this).children("img").attr("src"));
});


//добавление товара в корзину
$('#btn_incart').click(function(e){
    e.preventDefault();
    if ($.cookie("user_name")) {
    var id_product = $('#id_product').val();
    $.ajax({
        url:"/cart/add/"+id_product,
        type:"post",
        success: function(data) {
           $('#count_in_cart').html(data);
           $('#btn_incart').html("Товар в корзине");
           $('#btn_incart').addClass("disabled");
        }
    });
    }
    else alert ("Для добавления товаров в корзину Вам необходимо авторизоваться. \n\nТак же Вы можете воспользоваться покупкой в 1 клик.");
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