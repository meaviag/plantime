<?php include 'components/include/header.php';
session_start(); ?>
<title>Главная страница</title>
<div class="row p-4 pb-0 pe-md-0 pt-md-5 align-items-center rounded-3 border shadow-lg mt-5">
    <div class="col-md-7 p-3 p-md-5 pt-md-3">
        <h1 class="display-4 fw-bold lh-1 text-body-emphasis">Планировщик времени</h1>
        <p class="lead">Эффективно управляйте своим временем вместе с нами! Наш сервис поможет вам составить идеальное расписание на день. Никаких больше опозданий и срывов дедлайнов – только продуктивные дни и приятные вечера.</p>
        <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-4 mb-lg-3">
            <?php if (!isset($_SESSION['users'])) { ?>
                <a class="btn btn-primary btn-lg px-4 me-md-2 fw-bold" href="registration.php" role="button">Зарегистрироваться</a>
                <a class="btn btn-outline-secondary btn-lg" href="authorization.php" role="button">Авторизоваться</a>
            <?php } else { ?>
                <a class="btn btn-primary btn-lg px-4 me-md-2 fw-bold" href="todo.php" role="button">Начать</a>
                <a class="btn btn-outline-secondary btn-lg" href="components/users/logout.php" role="button">Выйти</a>
            <?php } ?>
        </div>
    </div>
    <div class="col-lg-4 offset-lg-1 p-0 overflow-hidden shadow-lg">
        <img class="rounded-lg-3" src="https://sun9-31.userapi.com/impg/3YnhLa7dxv7Qo9flQPqUeF2uT4Up95HcCCLx3A/MDkqWpnHGDM.jpg?size=1280x614&quality=96&sign=121ae1ca0aa1e2682f00fb18e0cb7f73&type=album" alt="" width="720">
    </div>
</div>

<div class="container px-4 py-5" id="hanging-icons">
    <h2 class="pb-2 border-bottom">Как пользоваться? Легко и просто!</h2>
    <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
        <div class="col d-flex align-items-start">
            <div>
                <h3 class="fs-2 text-body-emphasis">Зарегистрируйтесь или авторизируйтесь</h3>
                <p>Для того, чтобы пользоваться нашим сайтом нужно просто <a href="registration.php">зарегистрироваться</a>, если вы зарегистрированы, то <a href="authorization.php">авторизуйтесь</a>.</p>
            </div>
        </div>
        <div class="col d-flex align-items-start">
            <div>
                <h3 class="fs-2 text-body-emphasis">Доступ ограничен?</h3>
                <p>У вас не работает "Планировщик времени"? Значит вы не выполнили предыдущий пункт. Выполните первый пункт, чтобы наш сайт для вас заработал!</p>
            </div>
        </div>
        <div class="col d-flex align-items-start">
            <div>
                <h3 class="fs-2 text-body-emphasis">Теперь планируете свои планы</h3>
                <p>С нашим сайтом, после регистрации, вы сможете планировать своё время наперёд. Удачи вам в использовании сайта!</p>
            </div>
        </div>
    </div>
</div>
<?php include 'components/include/footer.php'; ?>
</body>

</html>