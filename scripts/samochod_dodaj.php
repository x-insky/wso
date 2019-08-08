<h3>Dodawanie nowego pojazdu</h3>
<br />

<form name = "dodaj_auto" enctype="multipart/form-data" action = "./index.php" method = "post" onsubmit="return sprawdz_formularz_dodaj_auto(this)" >

 <table width="440" border="0" align="center" cellpadding="0" cellspacing="2" >
 <tr>
  <td class="tab_nazwa_kolumny2">Marka</td>
  <td>
  <select name="marka" class="formularz_dodaj4" > 
  <option style="color: red; "value="0"> Wybierz markê pojazdu...</option>
<?php  
  $kwerenda = "SELECT marka, id FROM auto_marka_tbl ORDER BY id";
  $rezultat = mysql_query( $kwerenda );
   while ( $wynik = mysql_fetch_row( $rezultat ) )
   {
   $zmienna = $wynik[0]; //nazwa marki
   $zmienna2 = $wynik[1]; //id_kategorii
   //echo("$temp<br />");
   echo("<option value=\"$zmienna2\"> $zmienna </option>");  
   }
?>
  </select></td>
 </tr>
 <tr>
  <td class="tab_nazwa_kolumny2">Model</td>
  <td><input type="text" name ="model" size="25" maxlength="25" class="formularz_dodaj3" /></td>
 </tr>
 <tr>
  <td class="tab_nazwa_kolumny2">Rok produkcji</td>
  <td><input type="text" name ="rok_produkcji" size="4" maxlength="4" class="formularz_dodaj3" /></td>
 </tr>
 <tr>
  <td class="tab_nazwa_kolumny2">Numer rejestracyjny</td>
  <td><input type="text" name = "nr_rejestracyjny" size="10" maxlength="10" class="formularz_dodaj3" /></td>
 </tr>
 <tr>
  <td class="tab_nazwa_kolumny2">Status pojazdu (opcja)</td>
  <td><select name="status_pojazdu" class="formularz_dodaj4" />
    <!--    <option style="color: red;" value="0"> Wybierz kategoriê pojazdu... </option>  -->
     <option value="1"> Aktywny </option>
  </td>
 </tr>
 <tr>
  <td class="tab_nazwa_kolumny2">Kategoria pojazdu</td>
  <td><select name="kategoria" class="formularz_dodaj4" >
    <!--    <optgroup label="Wybierz kategoriê pojazdu">  -->
     <option style="color: red;" value="0"> Wybierz kategoriê pojazdu... </option>
<?php  
  $kwerenda = "SELECT nazwaKategorii, ID FROM auto_kategoria_tbl ORDER BY ID";
  $rezultat = mysql_query( $kwerenda );
   while ( $wynik = mysql_fetch_row( $rezultat ) )
   {
   $temp = $wynik[0]; //nazwa kategorii
   $temp2 = $wynik[1]; //nazwa kategorii
   
   //echo("$temp<br />");
   echo("<option value=\"$temp2\"> $temp </option>");  
   }
?>
   <!-- </optgroup> -->
  </select></td>
 </tr>
 <tr>
  <td class="tab_nazwa_kolumny2">Pojemno¶æ [cm^3]</td>
  <td><input type="text" name = "pojemnosc" size="5" maxlength="5" class="formularz_dodaj3" /></td>
 </tr>
 <tr>
  <td class="tab_nazwa_kolumny2">Moc [KM]</td>
  <td><input type="text" name = "moc" size="3" maxlength="3" class="formularz_dodaj3" /></td>
 </tr>
 <tr>
  <td class="tab_nazwa_kolumny2">Skrzynia biegów</td>
  <td>
    <select name="skrzynia" class="formularz_dodaj4" > 
     <option style="color: red; "value="0"> Wybierz rodzaj skrzyni biegów...</option>
<?php  
      $kwerenda = "SELECT typSkrzyni, id FROM auto_skrzynia_tbl ORDER BY id";
      $rezultat = mysql_query( $kwerenda );
       while ( $wynik = mysql_fetch_row( $rezultat ) )
       {
       $zmienna = $wynik[0]; //nazwa paliwa
       $zmienna2 = $wynik[1]; //id_kategorii
       //echo("$temp<br />");
       echo("<option value=\"$zmienna2\"> $zmienna </option>");  
       }
?>
   </select>
   </td>
  </tr>
  <tr>
   <td class="tab_nazwa_kolumny2">Paliwo</td>
   <td>
    <select name="paliwo" class="formularz_dodaj4" > 
     <option style="color: red; "value="0"> Wybierz rodzaj paliwa...</option>
<?php  
      $kwerenda = "SELECT paliwo, id FROM auto_paliwo_tbl ORDER BY id";
      $rezultat = mysql_query( $kwerenda );
       while ( $wynik = mysql_fetch_row( $rezultat ) )
       {
       $zmienna = $wynik[0]; //nazwa paliwa
       $zmienna2 = $wynik[1]; //id_kategorii
       //echo("$temp<br />");
       echo("<option value=\"$zmienna2\"> $zmienna </option>");  
       }
?>
   </select>
  </td>
 </tr>
 <tr>
  <td class="tab_nazwa_kolumny2">Typ nadwozia</td>
  <td>
   <select name="nadwozie" class="formularz_dodaj4" > 
    <option style="color: red; "value="0"> Wybierz typ nadwozia...</option>
<?php  
      $kwerenda = "SELECT typNadwozia, id FROM auto_nadwozie_tbl ORDER BY id";
      $rezultat = mysql_query( $kwerenda );
       while ( $wynik = mysql_fetch_row( $rezultat ) )
       {
       $zmienna = $wynik[0]; //liczba drzwi
       $zmienna2 = $wynik[1]; //id_kategorii
       //echo("$temp<br />");
       echo("<option value=\"$zmienna2\"> $zmienna </option>");  
       }
?>
   </select>
  </td>
 </tr>
 <tr>
  <td class="tab_nazwa_kolumny2">Liczba drzwi</td>
  <td>
   <select name="liczba_drzwi" class="formularz_dodaj4" > 
    <option style="color: red; "value="0"> Wybierz ilo¶æ drzwi...</option>
<?php  
      $kwerenda = "SELECT liczbaDrzwi, id FROM auto_drzwi_tbl ORDER BY id";
      $rezultat = mysql_query( $kwerenda );
       while ( $wynik = mysql_fetch_row( $rezultat ) )
       {
       $zmienna = $wynik[0]; //liczba drzwi
       $zmienna2 = $wynik[1]; //id_kategorii
       //echo("$temp<br />");
       echo("<option value=\"$zmienna2\"> $zmienna </option>");  
       }
?>
   </select>
  </td>
 </tr>
 <tr>
  <td class="tab_nazwa_kolumny2">Wyposa¿enie</td>
  <td><input type="text" name = "wyposazenie" size="25" maxlength="50" class="formularz_dodaj3" /></td>
 </tr>
 <tr>
  <td class="tab_nazwa_kolumny2">Kolor</td>
  <td>  
   <select name="kolor" class="formularz_dodaj4" > 
    <option style="color: red; "value="0"> Wybierz kolor nadwozia...</option>
<?php  
      $kwerenda = "SELECT kolor, id FROM auto_kolor_tbl ORDER BY id";
      $rezultat = mysql_query( $kwerenda );
       while ( $wynik = mysql_fetch_row( $rezultat ) )
       {
       $zmienna = $wynik[0]; //nazwa koloru
       $zmienna2 = $wynik[1]; //id_koloru
       //echo("$temp<br />");
       echo("<option value=\"$zmienna2\"> $zmienna </option>");  
       }
?>
   </select>
  </td>
 </tr>
 <tr>
  <td class="tab_nazwa_kolumny2">Metalik</td>
  <td><label><input type="checkbox" name = "metalik" value="metalik" />&nbsp;metalik</label></td>
 </tr>
 <tr>
  <td class="tab_nazwa_kolumny2">Zdjêcia</td>
  <td><input type="file" name="zdjecie1" size="30" value="" class="formularz_dodaj4" /><br />
      <input type="file" name="zdjecie2" size="30" value="" class="formularz_dodaj4" /><br />
      <input type="file" name="zdjecie3" size="30" value="" class="formularz_dodaj4" /><br />
	  <input type="file" name="zdjecie4" size="30" value="" class="formularz_dodaj4" />
   </td>
 </tr>
 <tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
 </tr>
 <tr>
  <td><input type = "submit" value = "Dodaj auto" class="przycisk1" /></td>
  <td>&nbsp;</td>
 </tr>
 </table>

<br />
<p class="akapit_wezszy">Dodawanie zdjêæ do pojazdów <b>dzia³a</b>!</p>
</form>