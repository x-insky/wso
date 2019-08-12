<?php
// ---------------------------------------------------------------------------------  funkcje ----|

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

function SprawdzHasloDB( $user, $pass)
{
$kwerenda = "SELECT login, haslo, blokada FROM user_tbl WHERE login='$user' AND haslo='$pass'";
$rezultat = @mysql_query( $kwerenda );
 if ( ! $rezultat ) return 1;			//błędy z połączeniem z bazą
 if ( mysql_num_rows( $rezultat ) == 1 )	//że znaleziono jeden pasujący
 {
 $wynik = mysql_fetch_row( $rezultat );   
 $zmienna = $wynik[2];
  if ( $zmienna != 0 ) return 3;	//konto jest zablokowane
 return 0;		// login i hasło ok
 }
return 2;		//zły login/hasło
}

function SprawdzDate( $dzien, $miesiac, $rok )
{
return checkdate( $miesiac, $dzien, $rok );
} 


function SprawdzUprawnieniaAdmina()
{
$rola_osoby = $_SESSION['rola'];
$id_osoby = $_SESSION['id'];
 
$kwerenda2 = "SELECT `rolaID` FROM `user_tbl` WHERE `ID`=$id_osoby";
$rezultat2 = mysql_query( $kwerenda2 );
 if ( ! $rezultat2 )
 { 
 $blad = mysql_error( $rezultat2 );
 echo("$blad");
 }
 else
 {
 $wynik2 = mysql_fetch_row( $rezultat2 );  // wydobycie nru ROLI OSOBY dla bieżącego użytkownika  
 $rola_id = $wynik2[0];
 }
 
$kwerenda3 = "SELECT `rolanazwa` FROM `userrole_tbl` WHERE `ID`=$rola_id";
$rezultat3 = mysql_query( $kwerenda3 );
 if ( ! $rezultat3 )
 { 
 //$blad = mysql_error( $rezultat3 );
 //echo("$blad");
 echo("<br /><b>BŁĄD!</b>");
 }
 else
 {
 $wynik3 = mysql_fetch_row( $rezultat3 );  // wydobycie nazwy ROLI bieżącego użytkownika  
 $nazwa_roli = $wynik3[0];
 }
 
    // gdy BIEŻˇCY UŻYTKOWNIK ma prawo wykonać tę modyfikację to zezwól dalej na:
 if ( $nazwa_roli == $_SESSION['rola'] ) return true;
 else return false;
}

function WyswietlDaneOsoby( $id_osoby )
{
 // dane bezpośrednio umieszczone w tabeli
$kwerenda = "SELECT imie, nazwisko, login, rolaID, email, nazwaFirmyID, dataRejestracji, godzinaRejestracji, blokada FROM user_tbl WHERE id=$id_osoby LIMIT 1";
$rezultat = mysql_query( $kwerenda );
$wynik = mysql_fetch_row( $rezultat );
$imie = $wynik[0];
$nazwisko = $wynik[1];
$login = $wynik[2];
$rola_id = $wynik[3];
$email = $wynik[4];
$nazwa_firmy_id = $wynik[5];
$data_rejestracji = $wynik[6];
$godzina_rejestracji = $wynik[7];
$blokada = $wynik[8];

 if ( $blokada == 0 ) $blokada = "nie";
 else $blokada = "tak";
 // nazwa ROLI w modelu
$kwerenda = "SELECT rolaNazwa FROM userRole_tbl WHERE id=$rola_id LIMIT 1";
$rezultat = mysql_query( $kwerenda );
$wynik = mysql_fetch_row( $rezultat );
$rola = $wynik[0];

 // nazwa FIRMY w modelu
$kwerenda = "SELECT nazwaFirmy FROM firma_tbl WHERE id=$nazwa_firmy_id LIMIT 1";
$rezultat = mysql_query( $kwerenda );
 if ( ! $rezultat )
 {
 $firma = "";
 }
 else
 {
 $wynik = mysql_fetch_row( $rezultat );
 $firma = $wynik[0];
 }
 // wyświetlenie kompletnych wyników
echo('<table width="450" align="center" border="0" cellpadding="0" cellspacing="2" >');
echo('<tr>');
 echo('<td class="tab_nazwa_kolumny">Imię</td>');
 echo('<td class="tab_dane_kolumny">');
 echo( $imie );
 echo('</td>');
echo('</tr>');
echo('<tr>');
 echo('<td class="tab_nazwa_kolumny">Nazwisko</td>');
 echo('<td class="tab_dane_kolumny">');
 echo( $nazwisko ); 
 echo('</td>');
echo('</tr>');
echo('<tr>');
 echo('<td class="tab_nazwa_kolumny">Login</td>');
 echo('<td class="tab_dane_kolumny">');
 echo( $login ); 
 echo('</td>');
echo('</tr>');  
echo('<tr>');
 echo('<td class="tab_nazwa_kolumny">Rola</td>');
 echo('<td class="tab_dane_kolumny">');
 echo( $rola );
 echo('</td>');
echo('</tr>');

echo('<tr>');
 echo('<td class="tab_nazwa_kolumny">Blokada</td>');
 echo('<td class="tab_dane_kolumny">');
  if ( $blokada == "nie" ) echo( $blokada );
  else
  {
  echo("<p style=\"color: red;\">$blokada</p>");
  }   
 echo('</td>');
echo('</tr>');  
  
echo('<tr>');
 echo('<td class="tab_nazwa_kolumny">eMail</td>');
 echo('<td class="tab_dane_kolumny">');
 echo( $email );
 echo('</td>');
echo('</tr>');  
echo('<tr>');
 echo('<td class="tab_nazwa_kolumny">Nazwa firmy</td>');
 echo('<td class="tab_dane_kolumny">');
 echo( $firma );
 echo('</td>');
echo('</tr>');  
echo('<tr>');
 echo('<td class="tab_nazwa_kolumny">Data Rejestracji</td>');
 echo('<td class="tab_dane_kolumny">');
 echo( $data_rejestracji );
 echo('</td>');
echo('</tr>');  
echo('<tr>');
 echo('<td class="tab_nazwa_kolumny">Godzina rejestracji</td>');
 echo('<td class="tab_dane_kolumny">');
 echo( $godzina_rejestracji );
 echo('</td>');
echo('</tr>');  
echo('</table>');

//echo "<br />";
//echo("przekazane id = ");
//echo( $id_osoby );
}

function WyswietlTekst( $tekst )
{
 while ( $wartosc = each( $tekst ))
 {
  if ( ( $wartosc == "\r" ) || ( $wartosc == "\n" ) ) echo("<br />");
  else echo("$wartosc");
 }
}

function ZmienNazwePlikuGraficznego( $stara_nazwa )
{
$stara_nazwa = strtolower( $stara_nazwa );

 if ( $stara_nazwa == "" )
 {
 echo "<h2>Brak pliku [1]</h2>";
 return false;
 }

$rozszerzenie = substr($stara_nazwa, -4);
//echo "Rozszerzenie <b>", $rozszerzenie, "</b>";      //test

 if ($rozszerzenie == "jpeg") $rozszerzenie = ".jpg";
 if ($rozszerzenie == "tiff") $rozszerzenie = ".tif";

 if ( ($rozszerzenie == ".jpg") || ($rozszerzenie == ".bmp") ||
           ($rozszerzenie == ".png") || ($rozszerzenie == ".gif") ||
           ($rozszerzenie == ".tif") )
 {        //gdy plik graficzny
 $data = date("Ymj");
 $czas = date("Gis");
 $losowany = rand(10, 100);

 $nazwa = $data.$czas.$losowany.$rozszerzenie;
 return $nazwa;
 }

return false;
}

// bez tagu zamykającego dla "<?php"