<article id="vhod">
<?if ($_COOKIE['login']) {?>
	<h4>
	<label>
	<?echo "<br>Вы вошли как {$_COOKIE['login']}!<br><br>Можете зайти в личный кабинет, а если необходимо зайти под другим аккаунтом нажмите выход на значке с Вашим ником справа вверху сайта.";?>
	<br></label>
	</h4>
<?}else {?>
<br>
<h4>
	<label>Ваш логин:<br></label>
	<input name="login" placeholder="Ваш логин" name="login" id="login" type="text" size="15" maxlength="15">
	<br><br>
    <label>Ваш пароль:<br></label>
    <input name="password" placeholder="Ваш пароль" name="password" id="password" type="password" size="15" maxlength="15">
	<br><br>
	<label id="warning"><br></label>
    <input type="submit" class="button" name="submit" id="submit" value="Войти">
	<br><br>	

	<a href="/registraciya/index.php">Зарегистрироваться</a> 
	
</h4>
<?}?>

</article>
