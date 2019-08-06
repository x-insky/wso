# 'WSO' (or actually 'CRC') as an abbreviation for a Car Rental Company

A web application written mainly in PHP, intended to facilitate the management of a fleet of vehicles from a fictitious company.
It allows you to operate vehicle (and user) objects on three levels of authority, i.e. roles: customer, employee and site administrator.

### Functionalities
Diversified number of available activities, depending on the role on the site, which determines the level of entitlements. Roles set from above and assigned to a specific user. Extended functionality available after login. Browse the website, offers (ie lists and groups of vehicles) and search for cars carried out identically for the user not logged in. Any role supports login and logout.

Role | Possible operations (working actions in bold)
------------ | -------------
Customer | account registration, **booking a car**, **review of own reservations and bookings**, **modification/cancellation of reservations**, car rental, ...
Employee | approval/rejection of reservations, car rental, loan settlement, finances, vehicle maintenance (periodic, technical tests, repairs), ...
Administrator | **adding and editing of cars**, **creation/modification of promotions**, **creation/modification of service notifications**, **management of users**, ...

### A working trial version
The functionality is available for testing after logging in with the lowest authorization level as an example **customer account** at this link [WSO](http://wso.tohm.cba.pl).
> User: **klient**\
> Password: **klient!1**

**ATTENTION! Explicit data transmission for logging into the server. The project operates in the HTTP protocol. No encryption for explicitly provided credentials.**

### Installation
Download the latest version from this repository to any web server with PHP support. Every version of PHP, starting from 5.0 should be suitable (designed using PHP v5.2.X).

#### Import of the reference database to the MySQL server from the repository from the file:
`_sql\baza.sql`

#### Creating a user and giving him minimum rights to communicate with the database (*sample names here*):
```SQL
CREATE USER 'wso_user'@'localhost' IDENTIFIED BY 'Sup3rP@$$';
GRANT USER SELECT, INSERT, UPDATE, DELETE ON wso_database.* TO 'wso_user'@'localhost';
```
### Information and disclaimers

#### Warning! Old PHP code and misuse of CSS styles (and much more blah blah...)
Please consider that this project was created from December 2007 to the end of January of the following year. In the application, the wheel was reinvented many times, its cover was changed, or its quadrature was modified to be more even. Luckily, as it later turned out, some "new" solutions are used _in a similar way_ in a real and working applications on professional websites. Amazing, considering that the author (I mean myself :)) did not know many web issues at that time, as well as the complex architecture and client-server specificity.\
**To sum up**: the code quality is not always great, but the application does not generate errors. Rather, it will not be possible to cause data loss, and at the same time it is quite difficult to make incorrect move - a fairly high resistance to intentional or inefficient actions of users was provided.

#### This is a student project
This is my first big PHP application. Of course it is an old project. The application was made to complete the course *Network electronic business systems*. **Working functionality** was evaluated, not the entire functioning the whole project or its construction details. Now the HTML structure, the use of CSS styles and some PHP code is suitable for thorough corrections and/or ridicule.\
The project was created at a time when the table layout began to be criticized, and the responsiveness of the sites could only be encountered through JavaScript (often incompatible between browsers). I didn't know *jQuery Project* either.

> Don't blame me, "we learn from our mistakes" && "we learn all your life" && "learning by doing" ;-)

#### Project status
It's **abandoned** rather than **completed**, but you never know.\
The project requires a bit of effort to bring layout and styles to current standards. But the advantage is to do without the ubiquitous templates and processing the DOM structure in browsers - there are no slowdowns by JavaScript.\
Several holes were also patched to be able to continue testing reservations in years younger than 2009. The whole PHP was also converted to UTF-8.

Author / Architect / "Programmer" / Graphic Designer / Tester / Director: ** T. M **. \
The project was also created thanks to mental support and exchange of knowledge with ** P. T ** and ** R S **.

#### Me vs. MarkDown: First Encounter 
Trying to add right shape of this synopsis. Styling and decorations in progress... more of English contenst goes here.

#### License
MIT

---

# PO POLSKU: "WSO" jako skrót od Wypożyczalni Samochodów Osobowych
Aplikacja webowa napisana głównie w PHP, mająca ułatwić zarządzanie flotą pojazdów fikcyjnej firmy. 
Umożliwia operowanie obiektami pojazdów (i użytkowników) na trzech poziomach uprawnień, tj. ról: klienta, pracownika oraz administratora serwisu.

### Funkcjonalności
Zróżnicowana ilość dostępnych działań, zależnie od roli w serwisie, warunkującej poziom uprawnień. Role ustalone odgórnie i przypisane do konkretnego użytkownika. Rozszerzona funkcjonalność dostępna po wcześniejszym zalogowaniu. Przeglądanie serwisu, oferty (czyli listy i grup pojazdów) oraz wyszukiwanie samochodów realizowana identycznie dla niezalogowanego użytkownika. Dowolna rola obsługuje operację logowania i wylogowania się.  

Rola | Możliwe operacje (działające zaznaczone pogrubieniem)
------------ | -------------
Klient | rejestracja konta,  **rezerwowanie terminów**,  **przegląd własnych rezerwacji i wypożyczeń**, **modyfikacja/rezygnacja z rezerwacji**, wypożyczanie aut, ...
Pracownik | zatwierdzanie/odrzucanie rezerwacji, wypożyczanie aut, rozliczanie wypożyczeń, finanse, konserwacja pojazdów (badania okresowe, techniczne, naprawy), ...
Administrator | **wprowadzanie i edycja aut**, **tworzenie/modyfikacja promocji**, **tworzenie/modyfikacja powiadomień serwisu**, **zarządzanie użytkownikami**, ...

### Funkcjonująca wersja testowa 
Funkcjonalność dostępna do przetestowania po zalogowaniu z najniższym poziomem uprawnień jako przykładowe **konto Klienta** pod adresem [WSO](http://wso.tohm.cba.pl).
> Użytkownik: **klient**\
> Hasło: **klient!1**

**UWAGA! Projekt funkcjonuje w protokole HTTP. Brak szyfrowania tych jawnie podanych poświadczeń.** 

### Instalacja
Pobranie najnowszej wersji z tego repozytorium na dowolny serwer www z obsługą PHP. Każda wersja PHP, poczynając od 5.0 powinna się nadać (projektowano przy użyciu PHP v5.2.X).

#### Import wzorcowej bazy danych do serwera MySQL z repozytorium z pliku:
`_sql\baza.sql`

#### Utworzenie użytkownika i nadanie mu minimum praw do komunikacji z bazą danych (zawarto *przykładowe* nazwy):
```SQL
CREATE USER 'wso_user'@'localhost' IDENTIFIED BY 'Sup3rP@$$';
GRANT USER SELECT, INSERT, UPDATE, DELETE ON baza_wso.* TO 'wso_user'@'localhost';
```
### Informacje i zatrzeżenia

#### Ostrzeżenie! Stary kod PHP oraz niewłaściwe użycie stylów CSS (+bla blabla...) 
Proszę wziąć pod uwagę, że projekt powstawał od grudnia 2007 roku do końca stycznia kolejnego roku. W aplikacji wiele razy wynajdywano na nowo koło, zmieniano jego poszycie, albo modyfikowano jego kwadraturę na bardziej wyrównaną. Szczęśliwym trafem, co się później okazało, część "nowych" rozwiązań jest _w podobny sposób_ wykorzystywanych w rzeczywistych i działających aplikacjach w profesjonalnych serwisach www . Zadziwiające, biorąc pod uwagę że autor nie znał (znaczy się ja :) )  wielu zagadnień webowych, jak również złożonej architektury i specyfiki klient-serwer.\
**Podsumowując**: jakość kodu nie zawsze jest świetna, ale aplikacja nie generuje błędów. Raczej nie uda się spowodować utraty danych, a przy tym dość trudno wykonać niewłaściwy ruch - zapewniono dość wysoką odporność na zamierzone bądź nieudolne działania użytkowników. 

#### To jest projekt studencki
To moja pierwsza **duża** aplikacja PHP. Aplikację wykonano na zaliczenie przedmiotu *Sieciowe systemy biznesu elektronicznego*. Oceniana była **działająca funkcjonalność**, a nie cały funkcjonujący projekt lub jego szczegóły budowy. Teraz struktura HTMLa, użycie stylów CSS oraz część kod PHP nadaje się do gruntownych poprawqek lub/i wyśmiania.\
Projekt powstawał w czasach, gdy układ tabelkowy zaczynał być krytykowany, a z responsywnością witryn można było zetknąć tylko poprzez JavaScript (często niekompatybilny).

> Nie wińcie mnie, lecz pamiętajmy, że "uczymy się na własnych błędach" i "człowiek uczy się przez całe życie" zwłaszcza dzięki "nauce poprzez działanie" ;-) 

#### Status projektu
- [x] Raczej **zarzucony**...
- [ ] ...niż **ukończony**, ale nigdy nie wiadomo.\
Wymaga nieco wysiłku, aby doprowadzić układ i style do bieżących standardów. Zaletą jest obycie się bez wszechobecnych szablonów i przetwarzania struktury DOMu w przeglądarkach - brak tu spowalniaczy z JS.\
Załatano też kilka dziur, aby móc nadal testować rezerwacje w latach młodszych niż 2009. Skonwertowano też całość do postaci UTF-8.

Autor/Architekt/"Programista"/Grafik/Tester/Reżyser: **T. M.**\
Projekt powstał też dzięki wsparciu mentalnemu i wymianie wiedzy z  **P. T.** oraz **R. S**.

#### Licencja
MIT
