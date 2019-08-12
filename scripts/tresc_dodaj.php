<h3>Dodawanie komunikatu</h3>
<br />
<form name = "dodaj_tresc" action = "./index.php" method = "post" >

 <table width="440" border="0" align="center" cellpadding="0" cellspacing="2" >
 <tr>
  <td class="tab_nazwa_kolumny">Tytuł</td>
  <td><input type = "text" name = "tytul_dodaj" size = "30" maxlength = "99" class="formularz_dodaj" /></td>
 </tr>
 <tr>
  <td class="tab_nazwa_kolumny">Treść</td>
  <td><textarea  name = "tresc_dodaj" rows="10" class="formularz_dodaj" /></textarea></td>
 </tr>
 <tr>
  <td class="tab_nazwa_kolumny">Kategoria</td>
  <td class="tab_dane_kolumny"><label><input type="radio" name="rodzaj_tresci_dodaj" value="aktualnosci" checked="checked" />Aktualności</label>&nbsp;&nbsp;
  <label><input type="radio" name="rodzaj_tresci_dodaj" value="promocje" />&nbsp;Promocje</label></td>
 </tr>
 <tr>
  <td class="tab_nazwa_kolumny">Aktywna promocja</td>  
  <td class="tab_dane_kolumny">
  <label><input type="checkbox" select name="aktywna_promocja" value="aktualna"/>&nbsp;Czy promocja
 ma obowiązywać od razu <br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(ma znaczenie tylko dla promocji)</label>
  <td>
 </tr>
 <tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
 </tr>
 <tr>
  <td><input type = "submit" value = "Dodaj komunikat" class="przycisk1" /></td>
  <td>&nbsp;</td>
 </tr>
 </table>

</form>