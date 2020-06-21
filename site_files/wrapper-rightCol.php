<article>
	<a href='' title=''>
		<img src="/img/art/PRIZM.png" />
	</a>
	<center>
	<h3><span>Здесь может быть Ваша реклама!</span></h3>
	</center>
	<br>
</article>

<article>
<center>

	<br>
	<h3><span>Поддержать проект:</span></h3><br>

	<article class="tooltip">	
		<!--<h4>-->
		<h5><span>Кошелёк</span></h5>
		<input type="text" value="PRIZM-UFSC-9S49-ESJX-79N7S" id="myInput" onclick="myFunction('myInput')" onmouseout="outFunc()" readonly>
		
		<br><br>
		
		<h5><span>Публичный ключ</span></h5>
		<input type="text" value="11dcf528f8f2ff9dc3c5005cd6fdc3240ea09ceaf96f2dd261255696ccb2842c" id="myInput2" onclick="myFunction('myInput2')" onmouseout="outFunc()" readonly>
		<!--</h4>-->
		
		<br><br>
		
		<span class="tooltiptext" id="myTooltip">Нажмите чтобы копировать текст в буфер</span>
	</article>
	
</center>
</article>

<script>
function myFunction(myIn) {
  var copyText = document.getElementById(myIn);
  copyText.select();
  document.execCommand("copy");
  
  var tooltip = document.getElementById("myTooltip");
  tooltip.innerHTML = "Скопировал: " + copyText.value;
}

function outFunc() {
  var tooltip = document.getElementById("myTooltip");
  tooltip.innerHTML = "Нажмите чтобы копировать текст в буфер";
}
</script>

