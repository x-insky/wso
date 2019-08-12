function sprawdz_formularz_dodaj_auto(f)       // sprawdzenie poprawnosci wpisanych danych do formularzy
{
var dzis = new Date();
var rokBiezacy = dzis.getFullYear();    
    
 if ( (f.marka.value == '') || (f.model.value == '') || (f.rok_produkcji.value == '') || (f.kategoria.value == '0') )
 {
 alert('Proszę wypełnić obowiązkowe pola: Model, Markę, Rok produkcji oraz Kategorię pojazdu.');
 return false;    // ostrzezenie, gdy jeden lub oba pola adresowe sa puste
 }

 if ( f.rok_produkcji.value <= 0 )
 {
 alert('Podane adresy są identyczne! Proszę skorygować dane wejściowe.');
 return false;    // ostrzezenie, gdy wpisano to samo do jednego lub obu pol adresowych
 }

 if ( (f.rok_produkcji.value <= 1900) || (f.rok_produkcji.value > rokBiezacy) )
 {
 alert('Podano błędny rok produkcji pojazdu. Proszę skorygować wpis.');
 return false;  // ostrzeżenie, gdy przy dodawaniu auta do bazy wybrano zbyt stary/młody rocznik  
 }

return true;     // gdy OK, ale gdy nie wpisano poprawnych danych WE -> ostrzeżenie
}

function sprawdz_formularz_rezerwuj_auto(f)       // sprawdzenie poprawnosci wpisanych danych do formularzy
{
var dzis = new Date();
var DzienNow = dzis.getDate();
var MiesNow = dzis.getMonth() + 1;
var RokNow = dzis.getFullYear();
dzis.setHours( 0 ); // żeby zawze obecna w dacie godzina była wcześniejsza --> bo konstruktor ładuje datę aktualną + czas

var DzienPoczatek = f.dzien_pocz.options[f.dzien_pocz.options.selectedIndex].value;
var MiesiacPoczatek = f.miesiac_pocz.options[f.miesiac_pocz.options.selectedIndex].value - 1;
var RokPoczatek = f.rok_pocz.options[f.rok_pocz.options.selectedIndex].value;
var dataPocz = new Date( RokPoczatek, MiesiacPoczatek, DzienPoczatek, 11 );

var DzienKonc = f.dzien_kon.options[f.dzien_kon.options.selectedIndex].value;
var MiesiacKonc = f.miesiac_kon.options[f.miesiac_kon.options.selectedIndex].value - 1;
var RokKonc = f.rok_kon.options[f.rok_kon.options.selectedIndex].value;
var dataKonc = new Date( RokKonc, MiesiacKonc, DzienKonc, 11 );

/* alert("DzienNow: " + DzienNow + ", MiesNow: " + MiesNow + ", RokNow: " + RokNow + "\n\ndzien pocz: " + f.dzien_pocz.options[f.dzien_pocz.options.selectedIndex].value + "\n miesiac pocz: " + f.miesiac_pocz.options[f.miesiac_pocz.options.selectedIndex].value + "\n rok pocz: " + f.rok_pocz.options[f.rok_pocz.options.selectedIndex].value + "\n \n dzien koniec: " + f.dzien_kon.options[f.dzien_kon.options.selectedIndex].value + "\n miesiac koniec: " + f.miesiac_kon.options[f.miesiac_kon.options.selectedIndex].value + "\n rok koniec: " + f.rok_kon.options[f.rok_kon.options.selectedIndex].value + "\n dzis: " + dzis + "\n dataPocz: "+ dataPocz + "\ndataKonc: " + dataKonc ); */
 
 if ( dataPocz < dzis ) 
 {
 alert('Data początkowa rezerwacji jest WCZEŚNIEJSZA od obecnej daty! Proszę poprawić dane.');
 return false;    
 }

 if ( dataKonc < dzis )  
 {
 alert('Data końcowa rezerwacji jest WCZEŚNIEJSZA od obecnej daty! Proszę poprawić dane.');
 return false;    
 }

 if ( dataPocz > dataKonc ) 
 {
 alert('Data początkowa rezerwacji jest PÓŹNIEJSZA od daty końcowej! Proszę poprawić dane.');
 return false;    
 }

return true;     // gdy OK, wpisano poprawne dane WE - ostrzezenie
}


function pokaz()    // tylko dla ewentualnych testów rezerwacji, brak aktywnego wpływu na działający projekt 
{
alert('test');
return true;
}