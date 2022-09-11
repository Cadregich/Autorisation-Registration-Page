<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Search</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<body>
	<form method="post">
		<input type="text" name="search">
		<input type="submit" name="subsear" value="Найти">
	</form>
  
  </body>
</html>
	<?php 
$search = trim(mb_strtolower($_POST['search']));
$subsear = $_POST['subsear'];

$card_gsp ='
	<div class="cardforshop">
   <div class="card" style="width: 16rem; height: 21rem; margin-top: 70px;">
     <div class="card-image">
       <img src="/assets/images/Hybrid_Solar_Panel_y2uSWXI.png" height="100px" width="100px"></div>       
          <div class="card-body">
            <h5 class="card-title">Гибридная солнечная панель</h5>
            <p class="card-text">Advanced Solar Panels</p>
            <p class="card-tex-cost">99 руб.</p>
         <a href="https://developer.mozilla.org/ru/docs/Web/HTML/Element/p" class="buttonss dasdasds">Купить</a>
     </div>
   </div>
</div>';


if (isset($subsear)) {
  if ($search != 'гибридка' && $search != 'гибридная солнечная панель') {
     preg_match("/$search/", 'гибрдная солнечная панель', $match);
     if ($match[0] != '') {
  } else $card_gsp = null;
  }
}
echo $card_gsp;

$card_qsp ='
  <div class="cardforshop">
   <div class="card" style="width: 16rem; height: 21rem; margin-top: 70px;">
     <div class="card-image">
       <img src="/assets/images/Hybrid_Solar_Panel_y2uSWXI.png" height="100px" width="100px"></div>       
          <div class="card-body">
            <h5 class="card-title">Квантовая солнечная панель</h5>
            <p class="card-text">Advanced Solar Panels</p>
            <p class="card-tex-cost">99 руб.</p>
         <a href="https://developer.mozilla.org/ru/docs/Web/HTML/Element/p" class="buttonss dasdasds">Купить</a>
     </div>
   </div>
</div>';

if (isset($subsear)) {
  if ($search != 'квант' && $search != 'квант панель') {
  preg_match("/$search/", 'квантовая солнечная панель', $match);
  if ($match[0] != '') {
  } else $card_qsp = null;
  }
}
echo $card_qsp;

$card_qc ='
  <div class="cardforshop">
   <div class="card" style="width: 16rem; height: 21rem; margin-top: 70px;">
     <div class="card-image">
       <img src="/assets/images/Hybrid_Solar_Panel_y2uSWXI.png" height="100px" width="100px"></div>       
          <div class="card-body">
            <h5 class="card-title">Квантовый нагрудник</h5>
            <p class="card-text">Advanced Solar Panels</p>
            <p class="card-tex-cost">99 руб.</p>
         <a href="https://developer.mozilla.org/ru/docs/Web/HTML/Element/p" class="buttonss dasdasds">Купить</a>
     </div>
   </div>
</div>';
if (isset($subsear)) {
  if ($search != 'квант нагрудник' && $search != 'квант') {
    preg_match("/$search/", 'квантовый нагрудник', $match);
  if ($match[0] != '') {
  } else $card_qс = null;
  } 
}
echo $card_qc;
