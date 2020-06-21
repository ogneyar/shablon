<?php
include_once '../a_conect.php';
include_once '../myBotApi/Bot.php';
$bot = new Bot($token);
$id_bota = strstr($token, ':', true);	
include '../myBotApi/Variables.php';
/*
$mysqli = new mysqli($host, $username, $password, $dbname);
// проверка подключения 
if (mysqli_connect_errno()) {
	throw new Exception('Чёт не выходит подключиться к MySQL');	
	exit('ok');
}
// Обработчик исключений
set_exception_handler('exception_handler');

$запрос = "SELECT login, email, token FROM `site_users`"; 
$результат = $mysqli->query($запрос);
if ($результат)	{
	$количество = $результат->num_rows;	
	if($количество > 0) {
		$результМассив = $результат->fetch_all(MYSQLI_ASSOC);			
	}else {
		$результМассив = null;
	}
	$json = json_encode($результМассив);
	
}else throw new Exception('Не смог проверить таблицу `site_users`.. (работа сайта)');	

$json_login = json_encode(null);

$подтверждение = false;

if (($_GET['token'])&&($результМассив)) {	
	foreach ($результМассив as $строка) {
		if (($строка['login'] == $_GET['login'])&&($строка['token'] == $_GET['token'])) {
			$подтверждение = true;
			$логин = $строка['login'];
			
			$json_login = json_encode($логин);
		}
	}	
}

include_once '../ip_client.php';
if ($_GET['st'] == 'zero') $bot->sendMessage($admin_group, "Кто-то желает зарегаться на сайте!\nего IP: {$ip}");


// закрываем подключение 
$mysqli->close();

// при возникновении исключения вызывается эта функция
function exception_handler($exception) {
	global $mysqli, $bot, $admin_group;
	$bot->sendMessage($admin_group, "Ошибка! ".$exception->getCode()." ".$exception->getMessage());	  
	$mysqli->close();		
	exit('ok');  	
}

*/
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8" />	
	<title>Регистрация на PRIZMarket!</title>
	<?include_once '../site_files/head.php';?>
	<style type="text/css"></style>
	
	<script>
		$(document).ready (function (){
			$("#done").click (function (){				
				$('#warning').html (' ' + "<br>");
				$('#warning').show ();
				var login = $("#login").val ();
				var password = $("#password").val ();
				var password2 = $("#password2").val ();
				var email = $("#email").val ();
				var fail = "";
				var stroka = <?=$json; ?>;				
				
				if (login.length < 4) fail = "Логин не менее 4х символов";
				else if (login.split ('@').length - 1 != 0 ) fail = "Логин не должен содержать символ '@'";
				else if (password.length < 4) fail = "Пароль не менее 4х символов";
				else if (password != password2) fail = "Не верен повторно введённый пароль";
				else if (email.split ('@').length - 1 == 0 || email.split ('.').length - 1 == 0)
 					fail = "Вы ввели некорректный email";	
				
				for (var key in stroka) {
					var str = stroka[key];
					for (var k in str) {
						if (login == str[k]) fail = "Такой логин уже существует";
						else if (email == str[k]) fail = "Такой email уже используется";
					}
				}
				
				if (fail != "") {
					$('#warning').html (fail  + "<br>");
					$('#warning').show ();
					return false;
				}else {
					
					$('#registr').html ("<br><h4>Ожидайте..</h4>");
					$('#registr').show ();		
				}				
				
				$.ajax ({
					url: '/site_pzm/registraciya/index-save_user.php',
					type: 'POST',
					cache: false,
					data: {'login': login, 'password': password, 'email': email},
					dataType: 'html',
					success: function (data) {
						$('#registr').html ("<br><h4>" + data + "</h4>");
						$('#registr').show ();						
					}
				});
			});			
			
		});		
	</script>
	
</head>
<body>
	<header>
		<?include_once '../site_files/header.php';?>
	</header>
	<div id="lk_menu">
		<?include_once '../lk/index-lk_menu.php';?>		
	</div>
	<nav>
		<?include_once '../site_files/nav.php';?>
	</nav>
	<div id="slideMenu">Моё детище, а не просто сайт!</div>
	<div id="wrapper">
		<div id="TopCol">		
			<?include_once '../site_files/wrapper-topCol.php';?>
		</div>
		<div id="leftCol">		
			<?include_once 'index-leftCol.php';?>
		</div>
		<div id="rightCol">
			<?include_once '../site_files/wrapper-rightCol.php';?>
		</div>
	</div>
	<footer>
		<?include_once '../site_files/footer.php';?>
	</footer>
</body>
</html>
