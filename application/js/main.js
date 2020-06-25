function get_count_cart(){
    $.ajax({
        url:"/cart/count",
        type:"POST",
        success: function(data){
            $('#count_in_cart').html(data);
        }
    });
}
$(document).ready(function() {
    //$(window).resize()
    if (location.pathname=="/cart") $('#content').css('width','100%');

    if ($.cookie("user_name")){
        //проверяем количество товаров в корзине
        get_count_cart();
        $('#count_in_cart').css('display','flex');
    
    //проверяем, лежит ли данный товар в корзине или нет, для того чтоб сделать кнопку неактивной
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
// верхний слайдер
var swiper = new Swiper('.slider-top', {
    loop: true,
    speed: 1000,
    
    centeredSlides: false,
    effect: 'coverflow',
    autoplay: {
        delay: 5000,
        disableOnInteraction: false
    },
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
      renderBullet: function (index, className) {
        return '<span class="' + className + '">' + (index + 1) + '</span>';
      },
    },
  });
}); 
//нижний слайдер
/*var i=5;
$(window).resize(function(){
    
    if(window.matchMedia('(max-width: 1000px)').matches) swiper.params['slidesPerView']=5;
    if(window.matchMedia('(max-width: 835px)').matches) swiper.params['slidesPerView']=4;
    if(window.matchMedia('(max-width: 670px)').matches) swiper.params['slidesPerView']=3;
    if(window.matchMedia('(max-width: 500px)').matches) swiper.params['slidesPerView']=2;
    
})*/
var swiper = new Swiper('.slider-recommenation', {
    slidesPerView: 5,
    spaceBetween: 30,
    loop: true,
    speed: 1000,
    autoplay: {
        delay: 3000,
        disableOnInteraction: false
    },
    breakpoints: {
        320:{slidesPerView:2},
        835:{slidesPerView:5},
        670:{slidesPerView:4},
        500:{slidesPerView:3},
    },
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
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

//форма обратной связи
$('#feedback_form').submit(function(e){
    e.preventDefault();
    if ($(this).children('#feedback_name').val()=='') 
        $(this).children('#feedback_name').css('border','1px solid red');
    if ($(this).children('#feedback_phone').val()=='') 
        $(this).children('#feedback_phone').css('border','1px solid red');
    if (($(this).children('#feedback_name').val()!='') && ($(this).children('#feedback_phone').val()!='')){
        $.ajax({
            url: this.action,
            type: this.method,
            data: $(this).serialize(),
            success: function(data){
                if (data=='OK') alert("Мы Вам обязательно перезвоним в ближайшее время")
                else alert("Что-то пошло не так. Попробуйте позже.");
            }
        });
        $(this).parent().parent().removeClass("open");
    }
});

$('#feedback_name').keyup(function(){
    $('#feedback_name').css('border','1px solid #cecece');
})
$('#feedback_phone').keyup(function(){
    $('#feedback_phone').css('border','1px solid #cecece');
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

//удаляем товар из корзины
$('.button-del').click(function(){
    //alert ($(this).attr('id'));
    var id_product = $(this).attr('id');
    $.ajax({
        url:"/cart/delete/"+id_product,
        type: "POST",
        success: function(){
            get_count_cart();
        }
    });
    $(this).closest('.productincart').remove();
    var this_cost=$(this).parent().siblings('.cost').data('cost');
    var result_cost=$('.final_cost').data('cost');
    $('.final_cost').data('cost', result_cost-this_cost);
    $('.final_cost').text(result_cost-this_cost +' ₽');
    
})
//увеличиваем количество товара на 1
$('.count_more').click(function(){
    var count = parseInt($(this).siblings('.count_value').val())
    //alert(count+1)
    var price=$(this).parent().siblings('.price').data('price');
    var result_cost=$('.final_cost').data('cost');
    //alert($(this).parent().siblings('.price').data('price'));
    $(this).siblings('.count_value').val(count+1);
    $(this).parent().siblings('.cost').text(price*(count+1) +' ₽');
    $('.final_cost').data('cost', result_cost+price);
    $('.final_cost').text(result_cost+price +' ₽');
})
//уменьшаем количество товара на 1
$('.count_less').click(function(){
    var count = parseInt($(this).siblings('.count_value').val())
    var price=$(this).parent().siblings('.price').data('price')
    var result_cost=$('.final_cost').data('cost');
    //alert(count+1)
    if (count>1){
    $(this).siblings('.count_value').val(count-1);
    $(this).parent().siblings('.cost').text(price*(count-1) +' ₽');
    $('.final_cost').data('cost', result_cost-price);
    $('.final_cost').text(result_cost-price+' ₽');
    }
})
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

$('.button_catalog').click(function(){
    $('#sidebar').toggle(500);
})
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
//бургер меню
$('.header_burger').click(function(){
    $(this).toggleClass('active');
    $('.menu').toggleClass('active');
    $('body').toggleClass('lock')
})