<?php
 if ( $_SESSION['rola'] == "klient" )
 {
 echo('<a href="./index.php?menu=booking">Moje rezerwacje</a> <br />');
 //echo('<a href="./index.php?menu=booking_h">Z³o¿one rezerwacje (historia)</a> <br />');
 echo('<a href="./index.php?menu=borrow">Moje wypo¿yczenia</a> <br />');
 //echo('<a href="./index.php?menu=borrow_h">Z³o¿one wypo¿yczenia (historia)</a> <br />');
 echo('<br />');
 echo('<a href="./index.php?menu=about">Mój Profil</a> <br />');
 echo('<br />');
 echo('<a href="./index.php?menu=allnews">Aktualno¶ci z witryny</a><br />');
 echo('<br />');
 }
 if ( $_SESSION['rola'] == "administrator")
 {
 echo('<a href="./index.php?menu=about">Mój Profil</a> <br />');
 //pasek panelu administratora
 echo('<p class="login_admin">menu administratora</p>'); 

 echo('<a href="./index.php?menu=dodaj_tresc">Dodaj komunikat</a><br />');
 echo('<a href="./index.php?menu=allnews">Modyfikuj wiadomo¶ci</a><br />');
echo('<a href="./index.php?menu=alldiscounts">Modyfikuj promocje</a><br />');
 echo('<br />');
 echo('<a href="./index.php?menu=dodaj_auto">Dodaj pojazd</a><br />');
 echo('<a href="./index.php?menu=adm_kategor">Administruj kategoriami pojazdów</a><br />');
 echo('<a href="./index.php?menu=users_show">Wy¶wietl u¿ytkowników serwisu</a><br />');
// echo('<a href="./index.php?menu=user_add"># Dodaj u¿ytkownika</a><br />');
// echo('<a href="./index.php?menu=change">Zmieñ swoje dane osobowe</a> <br />');
 //echo('<a href="./index.php?menu=users_admin">Administruj u¿ytkownikami</a><br />');
 }
?>
<br />
<form name = "wylogowanie" method = "post">
 <input type = "hidden" name = "wylogowany" value = "wy_log" />
 <input type = "submit" value = "Wyloguj" class="przycisk1" />
</form>