<?php include 'add_comment.php' ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="components/dataTable/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="components/dataTable/dataTables.bootstrap4.min.css">
<div class="container mt-5">
<?php 
    $userId = $_SESSION['users']['id'];
    $query = $link->query("SELECT `task`.* FROM `task` WHERE `task`.`id_user` = '$userId' LIMIT 1");
    while ($fetch = $query->fetch_array()) { ?>
        <h2>Добавить комментарий</h2>
        <form method="post" action="add_comment.php">
            <div class="form-group">
                <input type="hidden" name="task_id" value="<?php echo $fetch['id']?>">
                <label for="comment">Ваш комментарий:</label>
                <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
            </div>
            <button type="submit" name="add_comment" class="btn btn-primary">Добавить комментарий</button>
        </form>
    <?php } ?>
</div>
<script src="components/dataTable/jquery-3.4.1.min.js"></script>
<script src="components/dataTable/jquery.dataTables.min.js"></script>
<script src="components/dataTable/dataTables.bootstrap4.min.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>