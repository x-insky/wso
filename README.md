# 'WSO' (or actually 'CRC') as an abbreviation for a Car Rental Company

A web application for managing cars for rental.

This my very old ...
> More of English contenst goes here


### Me vs. MarkDown: First Encounter 
Trying to add right shape of this synopsis. Styling and decorations in progress...


---

# PO POLSKU: "WSO" jako skrót od Wypożyczalni Samochodów Osobowych
Aplikacja webowa napisana w PHP, mająca ułatwić zarządzanie flotą pojazdów fikcyjnej firmy. 
Umożliwia operowanie obiektami pojazdów (i użytkowników) na trzech poziomach uprawnień, tj. ról: klienta, pracownika oraz administratora serwisu.
### Ostrzeżenie! Stary kod PHP oraz niewłaściwe użycie stylów CSS (+bla blabla) 
Proszę wziąć pod uwagę, że projekt powstawał od grudnia 2007 roku do końca stycznia kolejnego roku. W aplikacji wiele razy wynajdywano na nowo koło, albo zmieniano jego kwadraturę na bardziej wyrównaną, ale jak się później szczęśliwie okazało, że część "nowych" rozwiązań jest wykorzystywanych w rzeczywistych i działających aplikacjach w profesjonalnych serwisach www. Zadziwiające, biorąc pod uwagę że nie znałem wielu zagadnień webowych, jak również złożonej architektury i specyfiki klient-serwer.\
**Podsumowaując**: jakość kodu nie zawsze jest świetna, ale aplikacja nie generuje błędów. Raczej nie uda się spowodować utraty danych, a przy tym dość trudno wykonać niewłaściwy ruch - zapewniono dość wysoką odporność na zamierzone bądź niezamierzone działania użytkowników. 

### Funkcjonalności
Zróżnicowana ilość dostępnych działań, zależnie od roli w serwisie, warunkującej poziom uprawnień. 

Rola | Możliwe operacje (działające zaznaczone pogrubieniem)
------------ | -------------
Klient | rejestracja konta, **logowanie/wylogowanie się**, **rezerwowanie terminów**, wypożyczanie aut, ...
Pracownik | zatwierdzanie/odrzucanie rezerwacji, wypożyczanie aut, rozliczanie wypożyczeń, finanse, konserwacja pojazdów (badania okresowe, techniczne, naprawy), ...
Administrator | **wprowadzanie i edycja aut**, **tworzenie/modyfikacja promocji**, **tworzenie/modyfikacja powiadomień serwisu**, **zarządzanie użytkownikami**, ...

## Wersja testowa 
Funkcjonalność dostępna do przetestowania po zalogowaniu z najniższym poziomem uprawnień jako konto **Klienta** pod adresem [WSO](http://wso.tohm.cba.pl).\
Użytkownik: **klient**\
Hasło: **klient!1**\
**UWAGA! Projekt funkcjonuje w protokole HTTP. Brak szyfrowania tych jawnie podanych poświadczeń.** 

#### Zatrzeżenia
Aplikacja wykonana na zaliczenie przedmiotu. Teraz struktura HTMLa, style CSS oraz kod PHP do wglądu i wyśmiania.\
Autor/Architekt/"Programista"/Grafik/Tester/Reżyser: **T. M.**\
Projekt powstał też dzięki wsparciu mentalnemu i konsultacjom z  **P. T.** oraz **R. S**.
###### Testy:
- [x] @mentions, #refs, , **formatting**, and <del>tags</del> supported
- [x] list syntax required (any unordered or ordered list supported)
- [x] this is a complete item
- [ ] this is an incomplete item
