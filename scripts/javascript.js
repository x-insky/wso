function sprawdz_formularz_dodaj_auto(f)       <!-- sprawdzenie poprawnosci wpisanych danych do formularzy -->
{
 if ( (f.marka.value == '') || (f.model.value == '') || (f.rok_produkcji.value == '') || (f.kategoria.value == '0') )
 {
 alert('Prosz� wype�ni� obowi�zkowe pola: Model, Mark�, Rok produkcji oraz Kategori� pojazdu.');
 return false;    <!-- gdy jeden lub oba pola adresowe sa puste - ostrzezenie -->
 }

 if ( f.rok_produkcji.value <= 0 )
 {
 alert('Podane adresy s� identyczne! Prosz� skorygowa� dane wej�ciowe.');
 return false;    <!-- gdy wpisano to samo do jednego lub obu pol adresowych - ostrzezenie -->
 }

 if ( (f.rok_produkcji.value <= 1900) || (f.rok_produkcji.value >= 2009) )
 {
 alert('Podano b��dny rok produkcji pojazdu. Prosz� skorygowa� wpis.');
 return false;    <!-- gdy czas oczekiwanie nie jest w przedziale od 1 do 20 sekund - ostrzezenie -->
 }

return true;     <!-- gdy OK, wpisano poprawne dane WE - ostrzezenie -->
}

function sprawdz_formularz_rezerwuj_auto(f)       <!-- sprawdzenie poprawnosci wpisanych danych do formularzy -->
{
var dzis = new Date();
var DzienNow = dzis.getDate();
var MiesNow = dzis.getMonth() + 1;
var RokNow = dzis.getFullYear();
dzis.setHours( 0 ); //�eby zawze obecna godzin w dacie by�a wcze�neijsza --> bo konstruktor �aduje dat� aktualn� + czas

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
 alert('Data pocz�tkowa rezerwacji jest WCZE�NIEJSZA od obecnej daty! Prosz� poprawi� dane.');
 return false;    
 }

 if ( dataKonc < dzis )  
 {
 alert('Data ko�cowa rezerwacji jest WCZE�NIEJSZA od obecnej daty! Prosz� poprawi� dane.');
 return false;    
 }

 if ( dataPocz > dataKonc ) 
 {
 alert('Data pocz�tkowa rezerwacji jest PӬNIEJSZA od daty ko�cowej! Prosz� poprawi� dane.');
 return false;    
 }

return true;     <!-- gdy OK, wpisano poprawne dane WE - ostrzezenie -->
}


function pokaz()
{
alert('test')
return true
}