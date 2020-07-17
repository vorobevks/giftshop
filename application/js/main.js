//бургер меню
$('.header_burger').click(function(){
    $(this).toggleClass('active');
    $('.menu').toggleClass('active');
    $('body').toggleClass('lock')
})
//скрываем все сложенные менюшки
//$('.hidden-ul').hide();
$('.fa-chevron-up').hide();

$('.button_catalog').click(function(){
    $('#sidebar').toggle(500);
})
//получить количество товаров в корзине
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
    //валидация формы обратной связи
    $("#feedback_form").validate({
        errorClass: "invalid",
        rules: {
          name: "required",
          phone: {
              required: true,
              minlength: 17,
              maxlength: 17
          }
        },
        messages: {
            name: null,
            phone: null
        },
        submitHandler: function(form) {
            $.ajax({
                url: form.action,
                type: form.method,
                data: $(form).serialize(),
                success: function(data){
                    if (data=='OK') alert("Мы Вам обязательно перезвоним в ближайшее время")
                    else alert("Что-то пошло не так. Попробуйте позже.");
                }
            });
            $(form).parents('.modal').removeClass("open");
        }
      });
    //валидация формы регистрации
    $("#reg_form").validate({
        errorClass: "invalid",
        errorElement: "div",
        rules:{
            login: {
                required: true,
                minlength: 5                
            },
            email: {
                email:true
            },
            password: {
                required: true,
                minlength: 8
            },
            repassword: {
                required: true,
                minlength: 8,
                equalTo: "#password"
                             
            }
        },
        messages:{
            login:{
                required: "Обязательное поле",
                minlength: "Имя должно быть не менее {0} символов"
            },
            email:{
                email: "Введите корректный e-mail"
            },
            password:{
                required: "Обязательное поле",
                minlength: "Пароль должен содержать минимум {0} символов"
            },
            repassword:{
                required: "Обязательное поле",
                minlength: "Пароль должен содержать минимум {0} символов",
                equalTo: "Пароли должны совпадать",
            }
        },
        submitHandler: function(form) {
            $.ajax({
                        url: form.action,
                        type: form.method,
                        data: $(form).serialize(),
                        success: function(data) {
                            if (data=='false') alert('Такой пользователь уже существует');
                            else location.reload();
                        }
                    });
            }
    });
    //валидация формы заказа
    $('.buy_form').validate({
        errorClass: "invalid",
        rules:{
            buy_fio: "required",
            buy_address: "required",
            buy_phone: {
                required: true,
                minlength: 17,
                maxlength: 17
            }
        },
        messages:{
            buy_fio: null,
            buy_address: null,
            buy_phone: null
        },
        submitHandler: function(form) {
            $.ajax({
                url: form.action,
                type: form.method,
                data: $(form).serialize(),
                success: function(data){
                    if (data=='OK') {
                        alert("Спасибо за Ваш заказ. Мы с Вами обязательно свяжемся и уточним все детали заказа.")
                        location.reload();
                    }
                    else alert("Что-то пошло не так. Попробуйте позже.");
                }
            });
            $(form).parents('.modal').removeClass("open");
        }
    })

    $(".phone_mask").mask("+7(000) 000-00-00", { placeholder: "+7(___) ___-__-__"});
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
                //else $('#btn_incart').removeClass("disabled");
            }
        })
    }
    //добавление товара в корзину
    $('#btn_incart').click(function(e){
        e.preventDefault();
        
        if ($.cookie("user_name")) {
        $('#btn_incart').addClass("disabled");
        var id_product = $('#id_product').val();
        $.ajax({
            url:"/cart/add/"+id_product,
            type:"post",
            success: function(data) {
            $('#count_in_cart').html(data);
            $('#btn_incart').html("Товар в корзине");
            
            }
        });
        }
        else alert ("Для добавления товаров в корзину Вам необходимо авторизоваться. \n\nТак же Вы можете воспользоваться покупкой в 1 клик.");
    });
    //$(window).resize()
    if (location.pathname=="/cart") $('#content').css('width','100%');

    
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
        },
    });
    
}); 
    //удаляем товар из корзины
    $('.main').on("click", ".button-del", function(){
        //alert ($(this).attr('id'));
        var id_product = $(this).attr('id');
        $.ajax({
            url:"/cart/delete/"+id_product,
            cache: false,
            type: "POST",
            success: function(html){
                $('#content').html(html);
                get_count_cart();
            }
        });    
    })

//нижний слайдер
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


//модальные окна
$('body').on("click", ".button-modal", function(){
    $(this).next().toggleClass("open");
}); 
$('body').on("click", ".button-close", function(){
    $(this).parent().parent().toggleClass("open");
});


//увеличиваем количество товара на 1
$('.main').on("click", ".count_more", function(){
    var count = parseInt($(this).siblings('.count_value').val())
    //alert(count+1)
    var price=$(this).parent().siblings('.price').data('price');
    var result_cost=$('.final_cost').data('cost');
    //alert($(this).parent().siblings('.price').data('price'));
    $(this).siblings('.count_value').val(count+1);
    $(this).parent().siblings('.cost').text(price*(count+1) +' ₽');
    $('.final_cost').data('cost', result_cost+price);
    $('.final_cost').text(result_cost+price +' ₽');
    $.ajax({
        url: "/cart/update/"+$(this).data('id')+"/"+(count+1),
        type: "post",
    })
})
//уменьшаем количество товара на 1
$('.main').on("click", ".count_less", function(){
    var count = parseInt($(this).siblings('.count_value').val())
    var price=$(this).parent().siblings('.price').data('price')
    var result_cost=$('.final_cost').data('cost');
    //alert(count+1)
    if (count>1){
    $(this).siblings('.count_value').val(count-1);
    $(this).parent().siblings('.cost').text(price*(count-1) +' ₽');
    $('.final_cost').data('cost', result_cost-price);
    $('.final_cost').text(result_cost-price+' ₽');
    $.ajax({
        url: "/cart/update/"+$(this).data('id')+"/"+(count-1),
        type: "post",
    })
    }
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