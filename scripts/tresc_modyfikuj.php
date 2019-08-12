<?php
//zapytanie paramerty wiadomości o numerze ID
$kwerenda = "SELECT tytul, tresc, trescRodzaj, aktywne FROM tresc_tbl WHERE id=$id_wiadomosci";
$rezultat = mysql_query( $kwerenda );
$ile_wierszy = mysql_num_rows( $rezultat ); 
$wynik = mysql_fetch_row( $rezultat );
$tytul = $wynik[0];
$tresc = $wynik[1];
$kategoria_tresci = $wynik[2];
$aktywne = $wynik[3];
/*echo("<b>DEBUG:</b><br />");
echo("ile: $ile_wierszy<br />");
echo("tytul: $tytul<br />");
echo("tresc: $tresc<br />");
echo("kategoria nr: $kategoria_tresci<br />");
echo("id: $id_wiadomosci<br />");
echo("aktywne: $aktywne<br />"); */
?>
<h3>Modyfikacja komunikatu</h3>
<br />
<form name = "modyfikuj_tresc" action = "./index.php" method = "post" >

 <table width="450" border = "0" align="center" cellpadding="0" cellspacing="2" >
 <tr>
  <td class="tab_nazwa_kolumny">Tytuł</td>
  <td>
<?php   //dodanie zawartości do pola formularza
echo('<input type = "text" name = "tytul_modyf" size = "30" maxlength = "99"'); 
echo ("value=\"$tytul\" class=\"formularz_dodaj\" />");
echo("<input type=\"hidden\" name=\"id_wiadomosci\" value=\"$id_wiadomosci\" />");  // ukryty: id_wiadomosci
echo("</td>");
?>  
 </tr>
 <tr>
  <td class="tab_nazwa_kolumny">Treść</td>
  <td><textarea  name = "tresc_modyf" rows="10" class="formularz_dodaj" />
<?php
echo("$tresc");
?>
  </textarea></td>
 </tr>
 <tr>
  <td class="tab_nazwa_kolumny">Kategoria</td>
  <td class="tab_dane_kolumny"><label><input type="radio" name="rodzaj_tresci_modyf" value="aktualnosci" 
<?php
 if ( $kategoria_tresci == 1 ) //ogłoszenie
 {  
 echo('checked="checked"');
 }
echo(' />');
echo('Aktualności</label>&nbsp;&nbsp;');
echo('  <label><input type="radio" name="rodzaj_tresci_modyf" value="promocje"');
 if ( $kategoria_tresci == 2 ) //ogłoszenie
 {  
 echo('checked="checked"');
 }
echo(' />&nbsp;Promocje</label></td>');
?>
 </tr>
 <tr>
  <tr  ><td class="tab_nazwa_kolumny">Aktywne</td>  
  <td class="tab_dane_kolumny">
  <label><input type="checkbox" select name="aktywna_promocja_modyf" value="aktualna"
<?php
 if ( $aktywne == 1 ) echo('checked="checked"');

echo (" />&nbsp;Aktywna promocja (znaczenie tylko dla promocji)</label>");
?>
  <td>
 </tr>
 <tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
 </tr>
 <tr>
  <td><p style="color: red;">Co chcesz zrobić?</p></td>
  <td><p style="color: red;"><label><input type="radio" name="rodzaj_modyfikacji" value="edycja" checked="checked" />Zmodyfikować treść</label>&nbsp;&nbsp;
  <label><input type="radio" name="rodzaj_modyfikacji" value="usuniecie" />&nbsp;Usunąć</label>&nbsp; </td>
 </tr>
 <tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
 </tr>
 <tr>
  <td><input type = "submit" value = "ZatwierdĽ" class="przycisk1" /></td>
  <td>&nbsp;</td>
 </tr>
 </table>

</form>