<?php
include("scripts/funkcje.php");

// -----------------------------------------------------------------------  początek skryptów ----|

session_start();
 if ( !isSet( $_SESSION['zalogowany'] ) )  
 {
  if ( !isSet( $_SESSION['komunikat'] ) )
  $_SESSION['komunikat'] = "Nie jesteś zalogowany";
 }

// -----------------------------------------------------------------------  początek HTMLa ----|
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8" />
    <title>Wypożyczalnia samochodów osobowych</title>
    <link rel="shortcut icon" href="img/fav.png">
    <link href="css/styl.css" rel="stylesheet" type="text/css" />
    <script src="scripts/javascript.js"></script>
</head>
<body>
    
<table width="910" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#162C8C">
<tr>
 <td>
<?php
//KONFIGURACJA
include("./config/konfiguracja.php");

//STATUS
include("./scripts/status.php");
// NAGŁÓWEK
include('./scripts/naglowek.php');
?>
 <table width="100%" border="0" cellspacing="0" cellpadding="0">
 <tr>
  <td width="200" height="395" bgcolor="#82B8FB" align="center" class="tab_zawartosc">

<?php
// menu LEWE - nawigacja
include('./scripts/lewe.php');
?>
  </td>
  <td width="500" bgcolor="#ffffff"  class="tab_zawartosc">

<?php
// menu ŚRODEK - zawartosc
include('./scripts/glowne.php');
?>
  </td>
  <td width="200" bgcolor="#82B8FB" class="tab_zawartosc">
      
<?php
// menu PRAWE - szukaj + bajerki
include('./scripts/prawe.php');
?>
  </td> 
 </tr>
 </table>
  
<?php
// STOPKA
include('./scripts/stopka.php');
?>
  
  </td>
</tr>
</table>

</body>
</html>