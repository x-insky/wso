<?php
			//funkcja testująca
function SprawdzHaslo( $user, $pass)
{
 if ( !$plikowa = fopen( "./config/hasla.txt", "r" ) ) return 1;
$rezultat = 2;
 while ( !feof( $plikowa ) )
 {
 $linia = trim( fgets( $plikowa ));
 $tabl = explode( ":", $linia );
  if ( count( $tabl ) != 2 ) continue;
  if ( $tabl[0] != $user ) continue;
  if ( $tabl[1] == $pass ) $rezultat = 0;
 break;
 }
fclose( $plikowa );
return $rezultat;
}


session_start();
 if ( !isSet( $_SESSION['zalogowany'] ) )  
 {
  if ( !isSet( $_SESSION['komunikat'] ) )
  $_SESSION['komunikat'] = "Nie jesteś zalogowany";
 }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2" />
<title>WSO v0.3</title>
<link rel="shortcut icon" href="img/fav.png">
<link href="css/styl.css" rel="stylesheet" type="text/css" />
</head>
<body>

<table width="910" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#162C8C">
<tr>
 <td>
<?php
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
