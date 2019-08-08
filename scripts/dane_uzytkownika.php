<h3>Twoje dane osobowe</h3>
<br />
<table width="450" align="center" border="0" cellpadding="0" cellspacing="2" >
<tr>
 <td class="tab_nazwa_kolumny">Imiê</td>
 <td class="tab_dane_kolumny"> <?php echo ($_SESSION['imie']); ?> </td>
</tr>
<tr>
 <td class="tab_nazwa_kolumny">Nazwisko</td>
 <td class="tab_dane_kolumny"> <?php echo ($_SESSION['nazwisko']); ?> </td>
</tr>
<tr>
 <td class="tab_nazwa_kolumny">Rola</td>
 <td class="tab_dane_kolumny"> <?php echo ($_SESSION['rola']); ?> </td>
</tr>
<tr>
 <td class="tab_nazwa_kolumny">eMail</td>
 <td class="tab_dane_kolumny"> <?php echo ($_SESSION['email']); ?> </td>
</tr>
<tr>
 <td class="tab_nazwa_kolumny">Nazwa firmy</td>
 <td class="tab_dane_kolumny"> <?php echo ($_SESSION['firma']); ?> </td>
</tr>
<tr>
 <td class="tab_nazwa_kolumny">Data Rejestracji</td>
 <td class="tab_dane_kolumny"> <?php echo ($_SESSION['data_rej']); ?> </td>
</tr>
<tr>
 <td class="tab_nazwa_kolumny">Godzina rejestracji</td>
 <td class="tab_dane_kolumny"> <?php echo ($_SESSION['godz_rej']); ?> </td>
</tr>
</table>
