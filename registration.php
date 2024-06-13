<?php include 'components/include/header.php';
session_start(); ?>
<title>Регистрация</title>
<style>
    @media (max-width: 768px) {
        #reg {
            width: 100%;
            /* Полная ширина на мобильных устройствах */
        }

        /* Дополнительные стили для мобильной версии */
    }

    /* Стили для планшетов */
    @media (min-width: 769px) and (max-width: 1024px) {
        #reg {
            width: 90%;
            /* Половина ширины на планшетах */
        }

        /* Дополнительные стили для планшетной версии */
    }

    /* Стили для настольных компьютеров и высоких разрешений */
    @media (min-width: 1025px) {
        #reg {
            width: 30%
                /* Около трети ширины на больших экранах */
        }

        /* Дополнительные стили для настольной версии */
    }
</style>
<form action="components/users/add_users.php" method="post">
    <div class="container p-4 pb-0 pe-lg-0 pt-lg-5" id="reg">
        <h3>Регистрация</h3>
        <div class="mb-3">
            <label for="name" class="form-label">Имя</label>
            <input type="txt" name="username" value="" placeholder="Введите имя" class="form-control" id="name" aria-describedby="name">
        </div>
        <?php if (isset($_SESSION['username_error'])) { ?>
            <p class="alert alert-danger"><?php echo $_SESSION['username_error'];
                                        } ?></p>
            <?php unset($_SESSION['username_error']); ?>
            <div class="mb-3">
                <label for="email" class="form-label">Электронная почта</label>
                <input type="email" name="email" value="" class="form-control" placeholder="Введите Email" id="email" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">Мы никогда не передадим вашу электронную почту кому-либо еще.</div>
            </div>
            <?php if (isset($_SESSION['email_error'])) { ?>
                <p class="alert alert-danger"><?php echo $_SESSION['email_error'];
                                            } ?></p>
                <?php unset($_SESSION['email_error']); ?>
                <div class="mb-3">
                    <label for="password" class="form-label">Пароль</label>
                    <input type="password" name="password" class="form-control" pattern=".{8,}" placeholder="Минимум 8 символов" id="password">
                </div>

                <?php if (isset($_SESSION['password_error'])) { ?>
                    <p class="alert alert-danger"><?php echo $_SESSION['password_error'];
                                                } ?></p>
                    <?php unset($_SESSION['password_error']); ?>
                    <div class="justify-content-between mt-3 align-items-center">
                        <button name="registration" class="btn btn-primary">Зарегистрироваться</button>
                        <a href="authorization.php">Уже зарегистрированы?</a>
                    </div>
    </div>
</form>
<?php include 'components/include/footer.php'; ?>