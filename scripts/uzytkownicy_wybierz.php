<h3>Wybierz użytkowników</h3>
<br />

<form name = "wyswietl_uzytkownikow" action = "./index.php" method = "post" >
<table width="440" align="center" cellpadding="0" cellspacing="2">
<tr>
 <td class="tab_nazwa_kolumny">Rola</td> 
 <td class="tab_dane_kolumny"><label><input type="radio" name="rodzaj_uzytkownikow" value="administratorzy" /> tylko administratorzy</label><br />
  <label><input type="radio" name="rodzaj_uzytkownikow" value="pracownicy" /> tylko pracownicy</label><br />
  <label><input type="radio" name="rodzaj_uzytkownikow" value="wszyscy_pracownicy" /> wszyscy pracownicy firmy</label><br />
  <label><input type="radio" name="rodzaj_uzytkownikow" value="klienci" /> tylko klienci</label><br />
<label><input type="radio" name="rodzaj_uzytkownikow" value="wszyscy" checked="checked" /> wszyscy</label>
</td>
 <td>&nbsp;</td>
</tr>
<tr>
 <td class="tab_nazwa_kolumny">Fragment imienia (nieobowiązkowe)</td> 
 <td class="tab_dane_kolumny"><input type = "text" name = "imie_szukaj" size = "20" maxlength = "99" class="formularz_dodaj3" /></td>
 <td>&nbsp;</td>
</tr>
<tr>
 <td class="tab_nazwa_kolumny">Fragment nazwiska (nieobowiązkowe)</td> 
 <td class="tab_dane_kolumny"><input type = "text" name = "nazwisko_szukaj" size = "20" maxlength = "99" class="formularz_dodaj3" /></td>
 <td>&nbsp;</td>
</tr>
<tr>
 <td class="tab_nazwa_kolumny">Zablokowani użytkownicy</td> 
 <td class="tab_dane_kolumny"><label><input type="checkbox" name="wyswietl_zablokow" value="tylko_zablokowani" /> wyświetl <b>tylko</b> zablokowanych użytkowników serwisu</label></td>
 <td>&nbsp;</td>
</tr>
<tr>
 <td class="tab_nazwa_kolumny">Sortuj wg</td> 
 <td class="tab_dane_kolumny"><label><input type="radio" name="rodzaj_sortowania" value="rola_nazwisko" checked="checked" /> rola użytkownika, nazwisko, imię</label><br />
<label><input type="radio" name="rodzaj_sortowania" value="data_rejestr" /> data rejestracji</label></td>
 <td>&nbsp;</td>
</tr>
<tr>
 <td>&nbsp;</td>
 <td></td>
 <td></td>
</tr>
<tr>
 <td><input type = "submit" value = "Wyświetl użytkowników" class="przycisk1" />&nbsp;</td>
 <td></td>
 <td>&nbsp;</td>
</tr>
</table>

</form>