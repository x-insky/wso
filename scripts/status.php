<?php

$db_link = @mysql_connect( $mysql_host, $mysql_login, $mysql_pass ); 
	if ( ! $db_link )
	{
	echo('<p class="ramka_status">');
	echo('Problem z połączeniem z bazą danych. Spróbuj ponownie lub skontaktuj się z administratorem. <br />');
	echo('</p>');
	//exit(1);
	}
	else
	{
	//echo("Komunikacja z bazą <b>OK</b>"); 
	//$kwerenda = "SET NAMES 'latin2'"; 
	$kwerenda = "SET NAMES 'utf8'"; 	// !!! +++ treści tekstowe jako UTF8 +++ !!!
	
		if ( $rezultat = mysql_query( $kwerenda, $db_link ) ) ;   // ";" == NIC :)
        // powyższa kwerenda ratuje tyłek przed konwersją całej bazy (a raczej poszczególnych tabel) na postać UTF8 z LATIN2 (oby nie kiedykolwkie, zwłaszcza ręcznie... :/) !!!
        // cała przyszła komunikacja z BD odbywa się w zestawie znaków UTF-8 !!!
        // bez notyfikacji o nowej stronie kodowej dla BD na WWW
            //echo ("Kodowanie zmieniono na <b>UTF8</b> (a nie z LATIN2 na LATIN1 jak w oddanym projekcie).<br />");
        else 
		{ 
		echo('<p class="ramka_status">');
		echo("Kodowanie pozostało <b>nie zmienione</b>, nadal LATIN1 (albo i LATIN2 hehe)!");
		echo('</p>');
		}
	}

	if ( ! @mysql_select_db( $mysql_db_name, $db_link ) )
	{
	echo('<p class="ramka_status">');
	echo("Błąd wyboru bazy!");
	echo('</p>');
	}
	else 
	{
	;  // też bez notyfikacji o sukcesie
		//echo(" Wybór bazy <b>OK</b><br />");
	}
// !!! nie wyświetlamy w trybie "PRODUKCYJNYM" !!!
// echo("Kodowanie klienta to: <b>". mysql_client_encoding() ."</b>");
 
?>

 