<?php

$db_link = mysql_connect( $mysql_host, $mysql_login, $mysql_pass ); 
 if ( ! $db_link )
 {
 echo('<p class="ramka_status">');
 echo('Problem z po³aczeniem z baz± danych. Spróbuj ponownie lub skontaktuj siê z administratorem. <br />');
 echo('</p>');
 //exit(1);
 }
 else
 {
 //echo("Komunikacja z baz± <b>OK</b>"); 
 $kwerenda = "SET NAMES 'latin2'"; 
  if ( $rezultat = mysql_query( $kwerenda, $db_link ) ) ; //echo (" Kodowanie zmieniono na <b>latin2</b>");
  else echo (" Kodowanie pozosta³o <b>nie zmienione</b>");
 }
 
 if ( ! mysql_select_db( $mysql_db_name, $db_link ) )
 {
 echo('<p class="ramka_status">');
 echo("B³±d wyboru bazy!");
 echo('</p>');
 }
 else 
 {
 ;
 //echo(" Wybór bazy <b>OK</b><br />");
 }
//echo("Kodowanie to: <b>". mysql_client_encoding() ."</b>");
 
?>

 