<?php
 if ( $_SESSION['rola'] == "klient" )
 {
 echo('<a href="./index.php?menu=booking">Moje rezerwacje</a> <br />');
 //echo('<a href="./index.php?menu=booking_h">Złożone rezerwacje (historia)</a> <br />');
 echo('<a href="./index.php?menu=borrow">Moje wypożyczenia</a> <br />');
 //echo('<a href="./index.php?menu=borrow_h">Złożone wypożyczenia (historia)</a> <br />');
 echo('<br />');
 echo('<a href="./index.php?menu=about">Mój Profil</a> <br />');
 echo('<br />');
 echo('<a href="./index.php?menu=allnews">Aktualności z witryny</a><br />');
 echo('<br />');
 }
 if ( $_SESSION['rola'] == "administrator")
 {
 echo('<a href="./index.php?menu=about">Mój Profil</a> <br />');
 //pasek panelu administratora
 echo('<p class="login_admin">menu administratora</p>'); 

 echo('<a href="./index.php?menu=dodaj_tresc">Dodaj komunikat</a><br />');
 echo('<a href="./index.php?menu=allnews">Modyfikuj wiadomości</a><br />');
echo('<a href="./index.php?menu=alldiscounts">Modyfikuj promocje</a><br />');
 echo('<br />');
 echo('<a href="./index.php?menu=dodaj_auto">Dodaj pojazd</a><br />');
 echo('<a href="./index.php?menu=adm_kategor">Administruj kategoriami pojazdów</a><br />');
 echo('<a href="./index.php?menu=users_show">Wyświetl użytkowników serwisu</a><br />');
// echo('<a href="./index.php?menu=user_add"># Dodaj użytkownika</a><br />');
// echo('<a href="./index.php?menu=change">Zmień swoje dane osobowe</a> <br />');
 //echo('<a href="./index.php?menu=users_admin">Administruj użytkownikami</a><br />');
 }
?>
<br />
<form name = "wylogowanie" method = "post">
 <input type = "hidden" name = "wylogowany" value = "wy_log" />
 <input type = "submit" value = "Wyloguj" class="przycisk1" />
</form>