﻿<?php
session_start();
error_reporting();

Include 'connect.php';
$archiwum = mysqli_query($polacz,"INSERT INTO archiwum SELECT * FROM ogloszenie WHERE data_dod < DATE_SUB(NOW(), INTERVAL 30 DAY)");
$off = mysqli_query($polacz,"SET foreign_key_checks = 0");
$usun= mysqli_query($polacz,"DELETE FROM ogloszenie WHERE data_dod < DATE_SUB(NOW(), INTERVAL 30 DAY)");
$on =  mysqli_query($polacz, "foreign_key_checks = 1");

?>
<html>
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<link rel="Stylesheet" type="text/css" href="widok.css" />
<title>Strona główna</title>
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" >Serwis ogłoszeniowy "U Jerzowej Bułki"</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="Basic.php">Strona Główna <span class="sr-only">(current)</span></a></li>
        <li><a href="abb_ogl.php">Dodaj ogłoszenie</a></li>       
      </ul>		
	  <ul class="nav navbar-nav navbar-right"> 		
        <li class="dropdown">
          <a href="wylogowanie.php">Wyloguj</a>
          </li>
      </ul>
	    <ul class="nav navbar-nav navbar-right"> 		
        <li class="dropdown">
          <a><?php  echo 'Witaj '.$_SESSION['login']; ?></a>
          </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>



<form class="ramka" >
<div class="a" align="center"><?php
Include 'connect.php';

$query = mysqli_query($polacz,"SELECT * FROM ogloszenie ORDER BY id_oglo DESC");
if (!$query) {
    printf("Error: %s\n", mysqli_error($polacz));
exit();}
while($row = mysqli_fetch_array($query,MYSQL_BOTH))
{
echo '<div class="a"><div><h3>'.$row['nazwa_prod'].'</h3></div></br><div><p>'.$row['opis_prod'].'</p></div></br><div>'.$row['telefon'].'</div></br><div>'.$row['data_dod'].'</div></div>';}
?></div></br>
</form>
</body>
</html>