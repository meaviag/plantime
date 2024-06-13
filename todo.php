<?php
include 'components/conn.php';

session_start(); ?>
<title>Планирование времени</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="components/dataTable/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="components/dataTable/dataTables.bootstrap4.min.css">
</head>
<style>
	a {
		text-decoration: none;
	}

	.well {
		padding: 35px;
		border-radius: 40px;
	}

	/* Стили для настольных компьютеров и высоких разрешений */
	@media (min-width: 1025px) {
		#todo {
			width: 100%;
		}

		/* Дополнительные стили для настольной версии */
	}

	@media (min-width: 993px) and (max-width: 1024px) {
		#todo {
			width: 50%;
		}

		/* Дополнительные стили для планшетной версии */
	}

	@media screen and (max-width: 992px) {
		#todo {
			width: 100%;
			font-size: 1.5em;
		}

		#block {
			width: 90%;
		}

		#profile {
			font-size: 2em;
		}

		#img-profile {
			width: 50px;
			height: 50px;
		}

		#todo_paginate {
			font-size: 1.5em;
		}

		#todo_info {
			font-size: 1.5em;
		}

		#todo_filter {
			font-size: 2em;
		}

		input:valid {
			font-size: 2em;
		}

		input[type="search"] {
			font-size: 20px;
		}

		input[type="search"]::placeholder {
			font-size: 1.5em;
		}

		input[type="text"]::placeholder {
			font-size: 2em;
		}

		#todo_length {
			font-size: 2em;
		}

		#basic-addon2 {
			font-size: 30px;
		}

		#one,
		#two {
			width: 40px;
			height: 40px;
			font-size: 1em;
		}

		.dropdown-menu {
			font-size: 1em;
		}

		.custom-select {
			font-size: 1em;
		}
	}
</style>

<body>
	<div class="col-md-8 mt-5 row m-auto well shadow-lg" id="block">
		<!-- <h3 class="ext-center"><a href="index.php">Планирование времени</a></h3> -->
		<div class="dropdown" id="profile">
			<a href="#" class="d-flex align-items-center link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
				<img src="https://thunderbird-mozilla.ru/images/big-images/kak-dobavit-uchetnuyu-zapis-v-mozilla-thunderbird/kak-dobavit-uchetnuyu-zapis-v-mozilla-thunderbird.jpg" alt="" width="32" height="32" id="img-profile" class="rounded-circle me-2">
				<?php
				$userId = $_SESSION['users']['id'];
				$userName = $link->query("SELECT `id`, `username` FROM `users` WHERE `id` = $userId");
				foreach ($userName as $value) { ?>
					<strong>
						<input type="hidden" name="username" value="<?php echo htmlspecialchars($value['id']); ?>">
						<?php echo htmlspecialchars($value['username']); ?>
					</strong>
				<?php } ?>
			</a>
			<ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
				<li><a class="dropdown-item" href="index.php">Главная страница</a></li>
				<li><a class="dropdown-item" href="components/users/logout.php">Выйти</a></li>
			</ul>
		</div>
		<hr style="border-top:1px dotted #ccc;" />

		<div class="col-md-8 m-auto">
			<center>
				<form method="POST" action="components/task/add_query.php">
					<div class="input-group" id="task">
						<input type="text" class="form-control" name="task" placeholder="Напишите задачу..." autocomplete="off" required />
						<button class="input-group-text bg-dark text-light" name="add" id="basic-addon2">Добавить</button>
					</div>
				</form>
			</center>
		</div>

		<table class="table table-striped table-hover" id="todo">
			<thead>
				<tr>
					<th>#</th>
					<th>Редактор</th>
					<th>Задача</th>
					<th>Дата</th>
					<th>Статус</th>
					<th>Действие</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$userId = $_SESSION['users']['id'];
				$query = $link->query("SELECT `task`.* FROM `task` WHERE `task`.`id_user` = '$userId' ORDER BY `task`.`id` DESC");
				$count = 1;
				while ($fetch = $query->fetch_array()) {
				?>
					<!--Модальное окно-->
					<div class="modal mt-5" tabindex="-1" role="dialog" id="editModal">
						<div class="modal-dialog" role="document">
							<div class="modal-content rounded-5 shadow">
								<div class="modal-header p-5 pb-4 border-bottom-0">
									<h5 class="modal-title">Редактор задачи</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body p-5 pt-0">
									<form action="components/task/edit_task.php?id=<?php echo $fetch['id'] ?>" method="post">
										<div class="form-floating mb-3">
											<input type="text" class="form-control rounded-4" name="task" id="floatingInput" placeholder="Измените задачу">
											<label for="floatingInput">Изменить задачу</label>
										</div>
										<button class="btn btn-lg rounded-4 btn-primary" name="edit" type="submit">Изменить</button>
									</form>
								</div>
							</div>
							<tr id="txt">
								<td><?php echo $count++ ?></td>
								<td>
									<div style="text-align: center;">
										<a data-bs-toggle="modal" data-bs-target="#editModal" class="btn btn-outline-secondary fa fa-pencil"></a>
								</td>
								<td><a href="components/task/comment.php?id=<?php echo $fetch['id'] ?>"><?php echo $fetch['task'] ?></a></td>
								<td>
									<<?php echo date('M-d-Y h:i A', strtotime($fetch['created_at'])) ?>< /td>
								<td><?php echo $fetch['status'] ?></td>
								<td colspan="2" id="icon">

									<div style="text-align: center;">
										<?php
										if ($fetch['status'] != "Выполнено") {
											echo
											'<a href="components/task/update_task.php?id=' . $fetch['id'] . '"class="btn btn-success btn-sm" id="one"><span class="fa fa-check"></span></a> |';
										}
										?>
										<a href="components/task/delete_query.php?id=<?php echo $fetch['id'] ?>" class="btn btn-danger btn-sm" id="two"><span class="fa fa-remove"></span></a>
									</div>
								</td>

						</div>
					<?php
				}
					?>
			</tbody>
		</table>
		<h4 class="pb-2 border-bottom mt-3">Комментарии</h4>
		<div class="container px-4 py-5" id="hanging-icons">
		<?php
		$user_id = $_SESSION['users']['id'];
		$com = $link->query("SELECT `comments`.*, `task`.*, `users`.*
			FROM `comments` 
				LEFT JOIN `task` ON `comments`.`task_id` = `task`.`id` 
				LEFT JOIN `users` ON `comments`.`user_id` = `users`.`id` WHERE `user_id` = '$user_id'");
		foreach ($com as $key => $value) { ?>
				<div class="row">
					<div class="col d-flex align-items-start">
						<div>
							<h5 class="text-body-emphasis"><?php echo $value['task'] ?></h5>
							<p><?php echo $value['comment'] ?></p>
						</div>
					</div>
				</div>
				</tr>
			<?php } ?>
			<script src="components/dataTable/jquery-3.4.1.min.js"></script>
			<script src="components/dataTable/jquery.dataTables.min.js"></script>
			<script src="components/dataTable/dataTables.bootstrap4.min.js"></script>
			<script src="assets/js/bootstrap.js"></script>
			<script src="assets/js/bootstrap.min.js"></script>

			<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
			<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
			<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
			<script>
				$('#editModal').on('show.bs.modal', function(event) {
					var button = $(event.relatedTarget);
					var taskId = button.data('id');
					var form = $(this).find('form');
					form.attr('action', 'components/task/edit_task.php?id=' + taskId);
				});
				$('#todo').DataTable({
					language: {
						url: 'https://cdn.datatables.net/plug-ins/2.0.8/i18n/ru.json'
					}
				});
			</script>