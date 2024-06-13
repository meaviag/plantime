<?php include 'components/include/header.php';
session_start(); ?>
<style>
    @media (max-width: 768px) {
        #login {
            width: 100%;
            /* Полная ширина на мобильных устройствах */
        }

        /* Дополнительные стили для мобильной версии */
    }

    /* Стили для планшетов */
    @media (min-width: 769px) and (max-width: 1024px) {
        #login {
            width: 90%;
            /* Половина ширины на планшетах */
        }

        /* Дополнительные стили для планшетной версии */
    }

    /* Стили для настольных компьютеров и высоких разрешений */
    @media (min-width: 1025px) {
        #login {
            width: 30%
                /* Около трети ширины на больших экранах */
        }

        /* Дополнительные стили для настольной версии */
    }
</style>
<title>Авторизоваться</title>
<form action="components/users/login.php" method="post">
    <div class="container p-4 pb-0 pe-lg-0 pt-lg-5" id="login">
        <h3>Авторизоваться</h3>
        <div class="mb-3">
            <label for="email" class="form-label">Электронная почта</label>
            <input type="email" name="email" value="" class="form-control " placeholder="Введите Email" id="email" aria-describedby="emailHelp" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Пароль</label>
            <input type="password" name="password" class="form-control" placeholder="Минимум 8 символов" id="password" required>
        </div>
        <? if (isset($_SESSION['error'])) {
            echo '<p class="alert alert-danger mt-3">' . $_SESSION['error'] . '</p>';
            unset($_SESSION['error']);
        } ?>
        <div class="mt-3 d-flex justify-content-between align-items-center">
            <input type="submit" name="authorization" value="Авторизоваться" class="btn btn-primary">
            <span>У вас нет аккаунта? <a href="registration.php">Зарегистрируйтесь.</a></span>
        </div>
    </div>
</form>
<?php include 'components/include/footer.php'; ?>