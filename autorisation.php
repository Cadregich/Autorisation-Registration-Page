<!--
	Account - Registration, Autorisation, Deautorisation, Delete 
	Autor: Cadregich
	Discord: Cadregich#5412
    File not completed
-->
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registration</title>
</head>
<body>

<?php if ($_COOKIE['aut'] != ''): 
 echo 'Привет! '.$_COOKIE['aut']?>
<?php endif;?>

<?php if ($_COOKIE['aut'] == ''): ?>
	<h1>Регистрация</h1>
<form method="post">
	<input type="text" name="username" placeholder="name">
	<input type="text" name="password" placeholder="password">
	<input type="text" name="email" placeholder="email">
	<input type="submit" name="cont">
</form>	
<?php endif; ?>
 <?php if ($_COOKIE['aut'] == ''): ?>
 		<h1 style="margin-top: 300px;">Авторизация</h1>
<form method="post">
	<input type="text" name="ausername" placeholder="name">
	<input type="password" name="apassword" placeholder="password">
	<input type="submit" name="acont">
</form>
  <?php endif;?>
  <?php if ($_COOKIE['aut'] != ''): ?>
<form method="post" style="margin-top: 300px;">
	<input type="submit" name="deaut" value="Деавторизоваться">
</form>
<?php endif; ?>
<?php if ($_COOKIE['aut'] != ''): ?>
<form method="post" style="margin-top: 50px;">
	<input type="submit" name="delete" value="Удалить аккаунт">
</form>
<?php endif; ?>
</body>
</html>
<?php 
$connect = mysqli_connect('localhost', 'root', '', 'atomiccraftr');
if (!$connect) {
	die('Ошибка подключения к базе данных');
}
$url_a = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
//Регистрация аккаунта
$username = filter_var(trim($_POST['username']), FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);
$newpassword = crypt($password,'oased312GHKASJ0');
$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);

$name = mysqli_query($connect, "SELECT `name` FROM `users`");
$name = mysqli_fetch_all($name);
foreach ($name as $key => $value) {
	foreach ($value as $k => $v) {
		$names .= $v." ";
	}
}
$names = strval($names);
$names = explode(" ", $names);

$mail = mysqli_query($connect, "SELECT `email` FROM `users`");
$mail = mysqli_fetch_all($mail);
foreach ($mail as $key => $value) {
	foreach ($value as $k => $v) {
		$emails .= $v." ";
	}
}
$emails = strval($emails);
$emails = explode(" ", $emails);

if (isset($_POST['cont'])) {
	if ($email == '' || $newpassword == '' || $username == '') {
		echo 'Заполните все поля';
	} else { if (in_array($username,$names) === true) {
		echo 'Такое имя уже занято';
	} else { if (in_array($email,$emails) === true) {
		 echo "Эта почта уже занята";
		} else {
         mysqli_query($connect, "INSERT INTO `users` (`email`, `password`, `name`) VALUES ('$email','$newpassword','$username')");
         mysqli_close($connect);
         exit();
      }
    }
  }
}
//Авторизация аккаунта
$pass = mysqli_query($connect, "SELECT `password` FROM `users`");
$pass = mysqli_fetch_all($pass);
foreach ($pass as $key => $value) {
	foreach ($value as $k => $v) {
		$passes .= $v." ";
	}
}

$passes = strval($passes);
$passes = explode(" ", $passes);

if (isset($_POST['acont'])) {
	$ausername = filter_var(trim($_POST['ausername']), FILTER_SANITIZE_STRING);
	$apassword = filter_var(trim($_POST['apassword']), FILTER_SANITIZE_STRING);

$check = mysqli_query($connect,"SELECT `password` FROM `users` WHERE `users`.`name` = '$ausername'");
$check = mysqli_fetch_all($check);

	if ($ausername == null || $apassword == null) {
		echo "Введите имя и пароль";
	} else {
      if (in_array($ausername, $names) == null) {
      echo "Такой пользователь не найден";
    } else {if (password_verify($apassword, $check[0][0]) === false) {
    	echo "Неверный пароль";
    } else  {$autarisated = $ausername;
             setcookie('aut',$autarisated,time()+180, "/");
             header('Location:'. $url_a);}
            }
        }
	}
//Деавторизация
if (isset($_POST['deaut'])) {
	setcookie('aut',$autarisated,time()-3600);
    header('Location:'. $url_a);
}
//Удаление аккаунта
if (isset($_POST['delete'])) {
mysqli_query($connect,"DELETE FROM `users` WHERE `users`.`name` = '$_COOKIE[aut]'");
setcookie('aut',$autarisated,time()-3600);
header('Location:'. $url_a);
}
 ?>
