<?php

$db_link = @mysql_connect( $mysql_host, $mysql_login, $mysql_pass ); 
 if ( ! $db_link )
 {
 echo('<p class="ramka_status">');
 echo('Problem z po��czeniem z baz� danych. Spr�buj ponownie lub skontaktuj si� z administratorem. <br />');
 echo('</p>');
 //exit(1);
 }
 else
 {
 //echo("Komunikacja z baz� <b>OK</b>"); 
 $kwerenda = "SET NAMES 'latin2'"; 
  if ( $rezultat = mysql_query( $kwerenda, $db_link ) ) ; //echo (" Kodowanie zmieniono na <b>latin2</b>");
  else 
  { 
  echo('<p class="ramka_status">');
  echo(" Kodowanie pozosta�o <b>nie zmienione</b>");
  echo('</p>');
  }
 }
 
 if ( ! @mysql_select_db( $mysql_db_name, $db_link ) )
 {
 echo('<p class="ramka_status">');
 echo("B��d wyboru bazy!");
 echo('</p>');
 }
 else 
 {
 ;
 //echo(" Wyb�r bazy <b>OK</b><br />");
 }
//echo("Kodowanie to: <b>". mysql_client_encoding() ."</b>");
 
?>

 