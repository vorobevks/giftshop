<div class="header">
    <div class="top-header container">
        <div class="feedback">
            <!--button class="button" id="card-button">
                    <img src="img/shopping-cart.svg" alt="user" class="button-icon">
                    <span class="button-text">Корзина</span>
            </button-->
            <a href="#" class="top-header-link button-modal" id="button-feedback">Обратный звонок</a>
            <div class="modal">
                <div class="modal-dialog">
                    <div class="button-close"><i class="fas fa-times"></i></div>
                    <form id="feedback_form" action="/core/telegram.php" method="POST">
                        <h3 class="modal-title">Обратный звонок</h3>
                        <input type="text" name="name" id="feedback_name" placeholder='Ваше имя'><br>
                        <input type="phone" name="phone" id="feedback_phone" placeholder='Ваш номер телефона'><br>
                        <input type="hidden" name="name_form" value="feedback">
                        <input type="submit" class="submit_button" value="Перезвоните мне">
                    </form>
                </div>
            </div>
        </div>
        <div class="login-reg">
            <?
            //если пользователь уже авторизован, то выводим в шапке линый кабинет и выход, если нет, то войти или зарегистрироваться
            if (!isset($_COOKIE['user_name']))   
            {   
            ?>
            <a href="#" class="top-header-link button-modal" id="button-login">Вход </a>
            <div class="modal">
                <div class="modal-login modal-dialog">
                    <div class="button-close"><i class="fas fa-times"></i></div>
                    <!--button class="button-close"><i class="fas fa-times"></i></button-->
                    <form id="logon_form" action="/logon/login" method="POST">
                        <h3 class="modal-title">Авторизация</h3>
                        <input type="text" name="login" placeholder='Ваш логин'><br>
                        <input type="password" name="password" placeholder='Ваш пароль'><br>
                        <input type="submit" class="submit_button" value="Войти">
                    </form>

                </div>
            </div>
            |
            <a href="#" class="top-header-link button-modal" id="button-registration">Регистрация</a>
            <div class="modal">
                <div class="modal-registration modal-dialog">
                    <div class="button-close"><i class="fas fa-times"></i></div>
                    <form id="reg_form" action="/logon/reg" method="POST">
                        <h3 class="modal-title">Регистрация</h3>
                        <input type="text" id="login" name="login" placeholder='Ваш логин'><i id="user_ok"
                            class="hidden icon_green fas fa-check-circle"></i><i id="user_wrong"
                            class="hidden icon_red fas fa-times-circle"
                            title="Пользователь с таким именем уже существует"></i><br>
                        <input type="email" name="email" placeholder='Ваш e-mail (необязательно)'><br>
                        <input type="password" minlength="6" name="password" id="password" placeholder='Ваш пароль'><i
                            id="password_ok" class="hidden icon_green fas fa-check-circle"></i><i id="password_wrong"
                            class="hidden icon_red fas fa-times-circle"
                            title="Пароль должен содержать минимум 6 символов&#10итд."></i><br>
                        <input type="password" minlength="6" name="repassword" id="repassword"
                            placeholder='Подтверждение пароля'><i id="repassword_ok"
                            class="hidden icon_green fas fa-check-circle"></i><i id="repassword_wrong"
                            class="hidden icon_red fas fa-times-circle" title="Введенные пароли не совпадают"></i><br>
                        <input type="submit" class="submit_button" id="submit_reg" value="Зарегистироваться">
                    </form>
                </div>
            </div>
            <?}
            else{             
            ?>
            <a href="#" class="top-header-link" id="button-login"><?=$_COOKIE['user_name']?> |</a>

            <a href="/logon/logout" class="top-header-link" id="button-registration">Выход</a>
            <?}?>
        </div>
    </div>
    <div class="full-background">
        <div class="container bottom-header">
            <a href="/" class="logo"><img src="/images/logo.png" alt="Logo"></a>
            <div class="header_burger">
                <span></span>
            </div>
            <ul class="menu">
                <li class="menu-item">
                    <a href="/menu/delivery" class="menu-link">
                        <span class="icon delivery-icon"></span>ДОСТАВКА<span class="info">Способы доставки</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <span class="icon pay-icon"></span>ОПЛАТА<span class="info">Варианты оплаты</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <span class="icon contact-icon"></span>КОНТАКТЫ<span class="info">+7(999)2592581</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="/cart" class="menu-link">
                        <span class="icon cart-icon"></span>КОРЗИНА
                        <span class="info">Оформите заказ</span>
                    </a>
                    <div id="count_in_cart">
                    </div>
                </li>
            </ul>
            
        </div>
    </div>
</div>