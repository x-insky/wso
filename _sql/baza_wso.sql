-- phpMyAdmin SQL Dump
-- version 2.10.1
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Czas wygenerowania: 20 Sty 2008, 06:00
-- Wersja serwera: 5.0.45
-- Wersja PHP: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Baza danych: `wso`
-- 

-- --------------------------------------------------------

-- 
-- Struktura tabeli dla  `auto_drzwi_tbl`
-- 

CREATE TABLE `auto_drzwi_tbl` (
  `ID` int(10) unsigned NOT NULL auto_increment,
  `liczbaDrzwi` varchar(5) NOT NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin2 AUTO_INCREMENT=4 ;

-- 
-- Zrzut danych tabeli `auto_drzwi_tbl`
-- 

INSERT INTO `auto_drzwi_tbl` (`ID`, `liczbaDrzwi`) VALUES 
(1, '2/3'),
(2, '4/5'),
(3, 'inna');

-- --------------------------------------------------------

-- 
-- Struktura tabeli dla  `auto_kategoria_tbl`
-- 

CREATE TABLE `auto_kategoria_tbl` (
  `ID` int(10) unsigned NOT NULL auto_increment,
  `nazwaKategorii` varchar(25) NOT NULL,
  `opisKategorii` text NOT NULL,
  PRIMARY KEY  (`ID`),
  UNIQUE KEY `nazwaKategorii` (`nazwaKategorii`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin2 AUTO_INCREMENT=11 ;

-- 
-- Zrzut danych tabeli `auto_kategoria_tbl`
-- 

INSERT INTO `auto_kategoria_tbl` (`ID`, `nazwaKategorii`, `opisKategorii`) VALUES 
(1, 'Klasa A', 'Najmniejsze samochody klasy A, najczê¶ciej okre¶lane jako miejskie, to dobre rozwi±zanie dla osób poszukuj±cych ekonomicznego ¶rodka transportu dla maksymalnie 4 osób z drobnym baga¿em. \r\nDane techniczne: nadwozie hatchback 3 drzwi (niektóre 5 drzwi), ilo¶æ miejsc 4, pojemno¶æ baga¿nika 0.20 - 1.0 m3, silnik 1.0 - 1.2 benzyna. \r\nWyposa¿enie: wspomaganie kierownicy, 1 - 2 poduszek powietrznych, radio CD, centralny zamek, klimatyzacja, ABS, manualna skrzynia biegów, opony zimowe (listopad - marzec).'),
(2, 'Klasa B', ' Do klasy B zaliczamy samochody ma³e, sprawuj±ce siê dobrze zarówno w warunkach miejskich jak i na krótkich i ¶rednich trasach. S± one najczê¶ciej wybieranym ¶rodkiem transportu dla przedstawicieli handlowych wielu przedsiêbiorstw. Dziêki ma³ym gabarytom, ³atwemu prowadzeniu i parkowaniu ceni je równie¿ wiele kobiet. Dane techniczne: nadwozie hatchback 3 drzwi (niektóre 5 drzwi lub kombi), ilo¶æ miejsc 5, pojemno¶æ baga¿nika 0.25 - 1.20 m3, silnik 1.0 - 1.4 benzyna lub diesel. Wyposa¿enie: wspomaganie kierownicy, 1 - 4 poduszek powietrznych, radiomagnetofon lub radio CD, centralny zamek, klimatyzacja, ABS, manualna skrzynia biegów, opony zimowe (listopad - marzec).'),
(3, 'Klasa C', ' Lubiane przez wiêkszo¶æ kierowców, popularne kompakty, pozwalaj± wygodnie podró¿owaæ na dalekie odleg³o¶ci czterem, a nawet piêciu osobom z do¶æ du¿ym baga¿em. Szczególnie w wersji kombi, samochody te s± uniwersalnym ¶rodkiem transportu zarówno dla rodziny jak i do prowadzenia dzia³alno¶ci gospodarczej. Dane techniczne: nadwozie hatchback 5 drzwi (niektóre kombi), ilo¶æ miejsc 5, pojemno¶æ baga¿nika 0.35 - 1.5 m3, silnik 1.4 - 1.6 benzyna lub diesel. Wyposa¿enie: wspomaganie kierownicy, 2 - 6 poduszek powietrznych, radio CD, centralny zamek, klimatyzacja, ABS, manualna skrzynia biegów, opony zimowe (listopad - marzec).'),
(4, 'Klasa C A/T (automatic)', 'Samochody tej klasy spe³ni± najwy¿sze wymagania zarówno lokalnej klienteli jak i przyzwyczajonych do automatycznych skrzyñ biegów przybyszów zza oceanów. Obszerne nadwozie oraz bogate wyposa¿enie spraw±, ¿e nawet d³uga podró¿ stanie siê czyst± przyjemno¶ci±. Dane techniczne: nadwozie liftback 5 drzwi (niektóre kombi), ilo¶æ miejsc 5, pojemno¶æ baga¿nika 0.5 - 1.5 m3, silnik 1.6 benzyna. Wyposa¿enie: wspomaganie kierownicy, 4 - 6 poduszek powietrznych, radio CD, centralny zamek, klimatyzacja, ABS, automatyczna skrzynia biegów, opony zimowe (listopad - marzec).'),
(5, 'Klasa Cabrio', 'Gdy wymagasz ekstremalnych doznañ z jazdy, chcesz komu¶ zaimponowaæ lub pragniesz w szczególny sposób ubogaciæ swoj± uroczysto¶æ albo imprezê, wynajmij samochód cabrio coupe! Nasza firma jako pierwsza w Polsce umo¿liwia Ci ta niesamowit± frajdê. Sk³adany elektrycznie i sztywny dach umo¿liwia dostosowanie siê do warunków atmosferycznych. Wyj±tkowy charakter tej klasy samochodów podkre¶li indywidualizm i umo¿liwi realizacjê Twoich marzeñ. W podró¿ bêdziesz móg³ zabraæ 4, a nawet 5 osób z podrêcznym baga¿em. Dane techniczne: nadwozie cabrio coupe (sedan) 2 drzwi, ilo¶æ miejsc 5, pojemno¶æ baga¿nika do 0.5 m3, silnik 1.6 benzyna. Wyposa¿enie: wspomaganie kierownicy, 4 poduszki powietrzne, radio CD, centralny zamek, klimatyzacja, ABS, manualna skrzynia biegów, opony zimowe (listopad - marzec).'),
(6, 'Minivan', 'Je¶li potrzebujesz przewie¼æ do 7 osób na stosunkowo nied³ugi dystans z drobnym baga¿em lub potrzebujesz wiekszej wygody tylko dla 5 osób, klasa MINIVAN spe³ni Twoje wszystkie oczekiwania. Dane techniczne: nadwozie kombi lub van 5 drzwi, ilo¶æ miejsc 7, pojemno¶æ baga¿nika 0.25 - 3.0 m3, silnik 1.3 - 1.9 benzyna lub diesel. Wyposa¿enie: wspomaganie kierownicy, 2 - 6 poduszek powietrznych, radio lub radio CD, centralny zamek, klimatyzacja, ABS, manualna skrzynia biegów, opony zimowe (listopad - marzec).'),
(7, 'Van', 'Vany oferuj± wyj±tkowo przestronne wnêtrze i najwy¿szy komfort podró¿owania. Dziêki temu, samochód tej klasy to dobry sposób na spêdzenie \\"wakacji na kó³kach\\" lub na grupowe wyjazdy s³u¿bowe dla 7, a nawet dla 9 osób. Dane techniczne: nadwozie van 5 drzwi, ilo¶æ miejsc 7 lub 9, pojemno¶æ baga¿nika 0.25 - 3.0 m3, silnik 1.8 - 1.9 benzyna lub diesel. Wyposa¿enie: wspomaganie kierownicy, 2 - 6 poduszek powietrznych, radio CD, centralny zamek, klimatyzacja, ABS, manualna skrzynia biegów, opony zimowe (listopad - marzec).'),
(8, '4x4', 'Gdy Twoje marzenia lub praca wymagaj± poruszania siê w nietypowym terenie, klasa samochodów z napêdem na cztery ko³a bêdzie najlepszym wyborem. Klasa ta oferuje przestronne wnêtrze dla 5 osób z baga¿em, najwy¿szy komfort podró¿y i poziom bezpieczeñstwa oraz mo¿liwo¶æ zakosztowania prawdziwej jazdy off road. Dane techniczne: nadwozie suv (kombi) 5 drzwi, ilo¶æ miejsc 5, pojemno¶æ baga¿nika 0.6 - 3.0 m3, silnik 1.9 - 2.2 benzyna lub diesel 4 x 4. Wyposa¿enie: wspomaganie kierownicy, 4 - 6 poduszek powietrznych, radio CD, centralny zamek, klimatyzacja, ABS, manualna skrzynia biegów, opony zimowe (listopad - marzec).'),
(9, 'Bus', 'Samochody tej klasy to idealne rozwi±zanie dla du¿ej rodziny oraz grupowych wyjazdów s³u¿bowych lub rekreacyjnych, bez ogl±dania siê na ilo¶æ baga¿u (w szczególno¶ci w wersji przed³u¿onej L2). Znacznie wiêksza ilo¶æ miejsca ni¿ w klasie VAN umo¿liwia komfortow± podró¿ 9 osobom. Dane techniczne: nadwozie furgon 4 drzwi (przednie lewe i prawe, boczne przesuwane i tylnie dwuskrzyd³owe), ilo¶æ miejsc 9, pojemno¶æ baga¿nika 1.0 - 3.0 m3, ³adowno¶æ 1.0 t, silnik 1.9 diesel. Wyposa¿enie: wspomaganie kierownicy, 1 - 2 poduszek powietrznych, radiomagnetofon lub radio CD, centralny zamek, klimatyzacja, ABS, manualna skrzynia biegów, opony zimowe (listopad - marzec).'),
(10, 'Limuzyna', 'Luksusowe auta rezerwowane na specjlane okazje, g³ównie wesela, bakiety, wieczory kawalerskie i panieñskie, koncerty, i inne uroczysto¶ci. ');

-- --------------------------------------------------------

-- 
-- Struktura tabeli dla  `auto_kolor_tbl`
-- 

CREATE TABLE `auto_kolor_tbl` (
  `ID` int(10) unsigned NOT NULL auto_increment,
  `kolor` varchar(25) NOT NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin2 AUTO_INCREMENT=19 ;

-- 
-- Zrzut danych tabeli `auto_kolor_tbl`
-- 

INSERT INTO `auto_kolor_tbl` (`ID`, `kolor`) VALUES 
(1, 'bia³y'),
(2, 'zó³ty'),
(3, 'pomarañczowy'),
(4, 'czerwony'),
(5, 'fioletowy'),
(6, 'b³ekitny'),
(7, 'niebieski'),
(8, 'granatowy'),
(9, 'morski'),
(10, 'zielony'),
(11, 'jasny groszek'),
(12, 'br±zowy'),
(13, 'czarny'),
(14, 'srebrny'),
(15, 'z³oty'),
(16, 'szary'),
(17, 'ró¿owy'),
(18, 'inny');

-- --------------------------------------------------------

-- 
-- Struktura tabeli dla  `auto_marka_tbl`
-- 

CREATE TABLE `auto_marka_tbl` (
  `ID` int(10) unsigned NOT NULL auto_increment,
  `marka` varchar(25) NOT NULL,
  PRIMARY KEY  (`ID`),
  UNIQUE KEY `producent` (`marka`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin2 AUTO_INCREMENT=58 ;

-- 
-- Zrzut danych tabeli `auto_marka_tbl`
-- 

INSERT INTO `auto_marka_tbl` (`ID`, `marka`) VALUES 
(1, 'Alfa Romeo'),
(2, 'Aston Martin'),
(3, 'Audi'),
(4, 'BMW'),
(5, 'Buick'),
(6, 'Cadillac'),
(7, 'Chevrolet'),
(8, 'Chrysler'),
(9, 'Citroen'),
(10, 'Dacia'),
(11, 'Daewoo'),
(12, 'Daihatsu'),
(13, 'Dodge'),
(14, 'Ferrari'),
(15, 'Fiat'),
(16, 'Ford'),
(17, 'Honda'),
(18, 'Hummer'),
(19, 'Hyundai'),
(20, 'Infiniti'),
(57, 'Inny'),
(21, 'Isuzu'),
(22, 'Jaguar'),
(23, 'Jeep'),
(24, 'Kia'),
(25, 'Lancia'),
(26, 'Land Rover'),
(27, 'Lexus'),
(28, 'Lincoln'),
(29, '£ada'),
(30, 'Maserati'),
(31, 'Mazda'),
(32, 'Mercedes'),
(33, 'Mini'),
(34, 'Mitsubishi'),
(35, 'Nissan'),
(36, 'Oldsmobile'),
(37, 'Opel'),
(38, 'Peugeot'),
(39, 'Plymouth'),
(40, 'Polonez'),
(41, 'Pontiac'),
(42, 'Porsche'),
(43, 'Renault'),
(44, 'Rover'),
(45, 'Saab'),
(46, 'Seat'),
(47, 'Skoda'),
(48, 'Smart'),
(49, 'Ssang Yong'),
(50, 'Subaru'),
(51, 'Suzuki'),
(52, 'Tavria'),
(53, 'Toyota'),
(54, 'UAZ'),
(55, 'Volkswagen'),
(56, 'Volvo');

-- --------------------------------------------------------

-- 
-- Struktura tabeli dla  `auto_nadwozie_tbl`
-- 

CREATE TABLE `auto_nadwozie_tbl` (
  `ID` int(10) unsigned NOT NULL auto_increment,
  `typNadwozia` varchar(20) NOT NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin2 AUTO_INCREMENT=17 ;

-- 
-- Zrzut danych tabeli `auto_nadwozie_tbl`
-- 

INSERT INTO `auto_nadwozie_tbl` (`ID`, `typNadwozia`) VALUES 
(1, 'coupe'),
(2, 'dual cowl'),
(3, 'fastback'),
(4, 'hatch-back'),
(5, 'kabriolet'),
(6, 'kombi'),
(7, 'lift-back'),
(8, 'limuzyna'),
(9, 'mikrovan'),
(10, 'minivan'),
(11, 'pick-up'),
(12, 'roadster'),
(13, 'sedan'),
(14, 'targa'),
(15, 'van'),
(16, 'inny');

-- --------------------------------------------------------

-- 
-- Struktura tabeli dla  `auto_paliwo_tbl`
-- 

CREATE TABLE `auto_paliwo_tbl` (
  `ID` int(10) unsigned NOT NULL auto_increment,
  `paliwo` varchar(25) NOT NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin2 AUTO_INCREMENT=4 ;

-- 
-- Zrzut danych tabeli `auto_paliwo_tbl`
-- 

INSERT INTO `auto_paliwo_tbl` (`ID`, `paliwo`) VALUES 
(1, 'benzyna'),
(2, 'benzyna i gaz'),
(3, 'olej napêdowy');

-- --------------------------------------------------------

-- 
-- Struktura tabeli dla  `auto_skrzynia_tbl`
-- 

CREATE TABLE `auto_skrzynia_tbl` (
  `ID` int(10) unsigned NOT NULL auto_increment,
  `typSkrzyni` varchar(25) NOT NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin2 AUTO_INCREMENT=6 ;

-- 
-- Zrzut danych tabeli `auto_skrzynia_tbl`
-- 

INSERT INTO `auto_skrzynia_tbl` (`ID`, `typSkrzyni`) VALUES 
(1, 'automatyczna'),
(2, 'manualna, 4 biegi'),
(3, 'manualna, 5 biegów'),
(4, 'manualna, 6 biegów'),
(5, 'inna');

-- --------------------------------------------------------

-- 
-- Struktura tabeli dla  `auto_tbl`
-- 

CREATE TABLE `auto_tbl` (
  `ID` int(10) unsigned NOT NULL auto_increment,
  `markaID` int(10) unsigned NOT NULL,
  `model` varchar(25) NOT NULL,
  `rokProdukcji` year(4) NOT NULL,
  `nrRejestracyjny` varchar(10) default NULL,
  `statusPojazdu` int(11) unsigned default NULL,
  `kategoriaID` int(10) unsigned NOT NULL,
  `pojemnosc` int(10) unsigned default NULL,
  `moc` int(10) unsigned default NULL,
  `skrzyniaID` int(10) unsigned default NULL,
  `paliwoID` int(10) unsigned default NULL,
  `nadwozieID` int(10) unsigned default NULL,
  `drzwiID` int(10) unsigned default NULL,
  `kolorID` int(10) unsigned NOT NULL,
  `metalik` smallint(5) unsigned default NULL,
  `wyposazenieID` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin2 AUTO_INCREMENT=8 ;

-- 
-- Zrzut danych tabeli `auto_tbl`
-- 

INSERT INTO `auto_tbl` (`ID`, `markaID`, `model`, `rokProdukcji`, `nrRejestracyjny`, `statusPojazdu`, `kategoriaID`, `pojemnosc`, `moc`, `skrzyniaID`, `paliwoID`, `nadwozieID`, `drzwiID`, `kolorID`, `metalik`, `wyposazenieID`) VALUES 
(1, 53, 'Aygo', 2006, NULL, 1, 1, 1000, 68, 3, 1, 4, 2, 14, 1, 1),
(2, 53, 'Aygo', 2006, 'DWR 0401', 1, 1, 1000, 68, 3, 1, 4, 1, 16, 1, 1),
(5, 42, '911 Carrera', 2007, 'DL40911', 1, 5, 3600, 325, 4, 1, 5, 1, 14, 1, 2),
(6, 4, '740i', 2007, 'DLE 77WX', 1, 4, 4000, 308, 1, 1, 8, 2, 13, 1, 1),
(7, 55, 'Golf V', 2006, 'DLE S391', 1, 2, 1600, 115, 4, 1, 4, 2, 15, 1, 2);

-- --------------------------------------------------------

-- 
-- Struktura tabeli dla  `auto_wyposazenia_tbl`
-- 

CREATE TABLE `auto_wyposazenia_tbl` (
  `ID_auto_wyposazenia` int(10) unsigned NOT NULL auto_increment,
  `fk_wyposazenieID` int(10) unsigned NOT NULL,
  `fk_autoID` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`ID_auto_wyposazenia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin2 AUTO_INCREMENT=1 ;

-- 
-- Zrzut danych tabeli `auto_wyposazenia_tbl`
-- 


-- --------------------------------------------------------

-- 
-- Struktura tabeli dla  `auto_zdjecia_tbl`
-- 

CREATE TABLE `auto_zdjecia_tbl` (
  `ID` int(10) unsigned NOT NULL auto_increment,
  `autoID` int(10) unsigned NOT NULL,
  `zdjecieID` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin2 AUTO_INCREMENT=22 ;

-- 
-- Zrzut danych tabeli `auto_zdjecia_tbl`
-- 

INSERT INTO `auto_zdjecia_tbl` (`ID`, `autoID`, `zdjecieID`) VALUES 
(5, 7, 9),
(6, 7, 10),
(7, 7, 11),
(8, 7, 12),
(9, 1, 13),
(10, 2, 14),
(11, 2, 15),
(12, 2, 16),
(13, 2, 17),
(14, 6, 18),
(15, 6, 19),
(16, 6, 20),
(17, 6, 21),
(18, 5, 22),
(19, 5, 23),
(20, 5, 24),
(21, 5, 25);

-- --------------------------------------------------------

-- 
-- Struktura tabeli dla  `firma_tbl`
-- 

CREATE TABLE `firma_tbl` (
  `ID` int(10) unsigned NOT NULL auto_increment,
  `nazwaFirmy` varchar(55) default NULL,
  `REGON` varchar(9) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin2 AUTO_INCREMENT=3 ;

-- 
-- Zrzut danych tabeli `firma_tbl`
-- 

INSERT INTO `firma_tbl` (`ID`, `nazwaFirmy`, `REGON`) VALUES 
(1, 'WSO - Wypo¿yczalnia Samochodów Osobowych', '123456785'),
(2, NULL, NULL);

-- --------------------------------------------------------

-- 
-- Struktura tabeli dla  `flagawypos_tbl`
-- 

CREATE TABLE `flagawypos_tbl` (
  `ID_flagaWypos` int(10) unsigned NOT NULL auto_increment,
  `typ` varchar(4) NOT NULL,
  PRIMARY KEY  (`ID_flagaWypos`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin2 AUTO_INCREMENT=4 ;

-- 
-- Zrzut danych tabeli `flagawypos_tbl`
-- 

INSERT INTO `flagawypos_tbl` (`ID_flagaWypos`, `typ`) VALUES 
(1, 'rez'),
(2, 'wyp'),
(3, 'auto');

-- --------------------------------------------------------

-- 
-- Struktura tabeli dla  `miejscowosci_tbl`
-- 

CREATE TABLE `miejscowosci_tbl` (
  `ID_miejscowosci` int(10) unsigned NOT NULL auto_increment,
  `nazwaMiejsc` varchar(30) NOT NULL,
  PRIMARY KEY  (`ID_miejscowosci`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin2 AUTO_INCREMENT=7 ;

-- 
-- Zrzut danych tabeli `miejscowosci_tbl`
-- 

INSERT INTO `miejscowosci_tbl` (`ID_miejscowosci`, `nazwaMiejsc`) VALUES 
(1, 'Legnica'),
(2, 'Wroc³aw'),
(3, 'Chojnów'),
(4, 'Jawor'),
(5, 'Z³otoryja'),
(6, 'Lubin');

-- --------------------------------------------------------

-- 
-- Struktura tabeli dla  `platnosci_tbl`
-- 

CREATE TABLE `platnosci_tbl` (
  `ID_platnosci` int(10) unsigned NOT NULL auto_increment,
  `fk_userID` int(10) unsigned NOT NULL,
  `tytul` varchar(25) NOT NULL,
  `kwota` float NOT NULL,
  `data` date NOT NULL,
  PRIMARY KEY  (`ID_platnosci`)
) ENGINE=InnoDB DEFAULT CHARSET=latin2 AUTO_INCREMENT=1 ;

-- 
-- Zrzut danych tabeli `platnosci_tbl`
-- 


-- --------------------------------------------------------

-- 
-- Struktura tabeli dla  `rezerwacje_tbl`
-- 

CREATE TABLE `rezerwacje_tbl` (
  `ID_rezerwacji` int(10) unsigned NOT NULL auto_increment,
  `fk_userID` int(10) unsigned NOT NULL,
  `fk_autoID` int(10) unsigned NOT NULL,
  `dataRez` date NOT NULL,
  `dataPocz` date NOT NULL,
  `dataKonc` date NOT NULL,
  `miejscePodstID` int(10) unsigned NOT NULL,
  `miejsceZwrID` int(10) unsigned NOT NULL,
  `uwagi` text,
  PRIMARY KEY  (`ID_rezerwacji`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin2 AUTO_INCREMENT=10 ;

-- 
-- Zrzut danych tabeli `rezerwacje_tbl`
-- 

INSERT INTO `rezerwacje_tbl` (`ID_rezerwacji`, `fk_userID`, `fk_autoID`, `dataRez`, `dataPocz`, `dataKonc`, `miejscePodstID`, `miejsceZwrID`, `uwagi`) VALUES 
(1, 7, 2, '2007-12-12', '2007-12-13', '2007-12-15', 1, 1, NULL),
(2, 7, 7, '2007-12-13', '2007-12-17', '2007-12-17', 2, 2, NULL),
(3, 8, 1, '2007-12-15', '2007-12-20', '2007-12-27', 2, 2, NULL),
(4, 7, 2, '2008-01-10', '2008-01-15', '2008-01-21', 2, 2, NULL),
(5, 7, 2, '2008-01-01', '2008-01-02', '2008-01-05', 2, 2, NULL),
(6, 7, 6, '2007-12-14', '2007-12-23', '2007-12-27', 2, 2, NULL),
(7, 7, 2, '2008-01-19', '2008-01-28', '2008-01-30', 2, 2, NULL),
(8, 7, 2, '2008-01-20', '2008-01-23', '2008-01-26', 2, 2, NULL);

-- --------------------------------------------------------

-- 
-- Struktura tabeli dla  `rez_wyposazenia_tbl`
-- 

CREATE TABLE `rez_wyposazenia_tbl` (
  `ID_rez_wyposazenia` int(10) unsigned NOT NULL auto_increment,
  `fk_wyposazenieID` int(10) unsigned NOT NULL,
  `fk_rezerwacjaID` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`ID_rez_wyposazenia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin2 AUTO_INCREMENT=1 ;

-- 
-- Zrzut danych tabeli `rez_wyposazenia_tbl`
-- 


-- --------------------------------------------------------

-- 
-- Struktura tabeli dla  `rodzajetresci_tbl`
-- 

CREATE TABLE `rodzajetresci_tbl` (
  `ID` int(10) unsigned NOT NULL auto_increment,
  `rodzajNazwa` varchar(20) NOT NULL,
  PRIMARY KEY  (`ID`),
  UNIQUE KEY `rodzajTresci` (`rodzajNazwa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin2 AUTO_INCREMENT=3 ;

-- 
-- Zrzut danych tabeli `rodzajetresci_tbl`
-- 

INSERT INTO `rodzajetresci_tbl` (`ID`, `rodzajNazwa`) VALUES 
(1, 'Og³oszenie'),
(2, 'Promocje');

-- --------------------------------------------------------

-- 
-- Struktura tabeli dla  `tresc_tbl`
-- 

CREATE TABLE `tresc_tbl` (
  `ID` int(10) unsigned NOT NULL auto_increment,
  `trescRodzaj` int(10) unsigned NOT NULL,
  `tytul` varchar(100) default NULL,
  `tresc` text NOT NULL,
  `zdjecia` int(10) unsigned default NULL,
  `autorID` int(10) unsigned NOT NULL,
  `dataTresci` date NOT NULL,
  `czasTresci` time NOT NULL,
  `aktywne` int(11) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin2 AUTO_INCREMENT=14 ;

-- 
-- Zrzut danych tabeli `tresc_tbl`
-- 

INSERT INTO `tresc_tbl` (`ID`, `trescRodzaj`, `tytul`, `tresc`, `zdjecia`, `autorID`, `dataTresci`, `czasTresci`, `aktywne`) VALUES 
(1, 1, 'Pierwszy', 'Testowy nr 1', 1, 4, '2008-01-04', '14:55:01', NULL),
(2, 1, 'Ju¿ wkrótce otwarcie!', 'Zapraszamy do korzystania z us³ug naszej firmy. Ju¿ nied³ugo otwieramy. \r\nOdwied¼ nasza siedzibê, namiary w odno¶niku <b>kontakt<b>.', 1, 1, '2008-01-04', '16:07:45', NULL),
(3, 1, 'Pierwsza limuzyna!', 'Infomujemy, ¿e od dnia dzisiejszego posiadamy w ofercie luksusow± limuzynê.\r\n\r\nPojazd u¶wietni wszelkiego rodzaju imprezy, zw³aszcza ¶luby, promocje, czy trasy koncertowe. Nadaje siê tak¿e do organizacji spotkañ biznesowych, imprez okoliczno¶ciowych, studniówek, a tak¿e wieczorów kawalerskich i panieñskich.  zjazdów i innych zamówieñ wg klienta. Jednym s³owem wszêdzie tam gdzie potrzebny jest luksusowy samochód. \r\n\r\nW zale¿no¶ci od Pañstwa potrzeb, marzeñ i pomys³ów jeste¶my gotowi przedstawiæ ofertê indywidualn± i zrealizowaæ Pañstwa indywidualne zamówienia.\r\n\r\nZapraszamy do korzystania z naszych us³ug.', 1, 1, '2008-01-09', '21:20:56', NULL),
(4, 1, 'Terenówka w planach', 'Ju¿ za  tydzieñ mo¿ecie Pañstwo szukaæ wra¿eñ na bezdro¿ach i nierówno¶ciach kraju, dziêki naszemu nowemu nabytkowi. \r\n\r\nProsimy o sprawdzenie kategorii <b>4x4</b>.', 1, 1, '2008-01-10', '19:51:34', NULL),
(9, 1, 'Pierwsze auto w bazie!', 'Mamy pierwsze auto w bazie: Toyota Aygo!\r\n\r\nSzczegó³y pojazdu mo¿na zobaczyæ po wybraniu kategorii danego auta, spisu wszystkich aut lub wykorzystaniu wyszukiwarki. \r\n\r\nZapraszamy.', 1, 1, '2008-01-14', '01:22:59', NULL),
(10, 1, 'Porsche 911', 'Jeden z w³a¶cicieli Wypo¿yczalni ju¿ siê nacieszy³ swoim Porszaczkiem i mo¿na go wypo¿yczyæ. Enjoy! :)', 1, 3, '2008-01-14', '20:00:03', NULL),
(11, 2, 'Rabat', 'Dla naszych nowych klientów przygotowali¶my rabat w wysoko¶ci 10% za wynajêcie drugiego samochodu w ci±gu miesi±ca od ostatniego zwrotu pojazdu.\r\nOkres obowi±zywania tylko do koñca stycznia.', 1, 1, '2008-01-15', '17:26:50', 1),
(12, 2, 'Rabat dla ka¿dego', 'Wypo¿ycz dowolne auto w ci±gu najbli¿szego tygodania, a otrzymasz zni¿kê 20% z ca³o¶ci op³at!', 1, 1, '2008-01-15', '17:32:18', 1),
(13, 2, 'Auto dla firm', 'Przepraszamy, szczegó³y tylko na telefon.', 1, 1, '2008-01-15', '17:33:54', 0);

-- --------------------------------------------------------

-- 
-- Struktura tabeli dla  `userrole_tbl`
-- 

CREATE TABLE `userrole_tbl` (
  `ID` int(10) unsigned NOT NULL auto_increment,
  `rolaNazwa` varchar(20) NOT NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin2 AUTO_INCREMENT=4 ;

-- 
-- Zrzut danych tabeli `userrole_tbl`
-- 

INSERT INTO `userrole_tbl` (`ID`, `rolaNazwa`) VALUES 
(1, 'administrator'),
(2, 'pracownik'),
(3, 'klient');

-- --------------------------------------------------------

-- 
-- Struktura tabeli dla  `user_tbl`
-- 

CREATE TABLE `user_tbl` (
  `ID` int(10) unsigned NOT NULL auto_increment,
  `login` varchar(15) NOT NULL,
  `haslo` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `blokada` tinyint(3) unsigned NOT NULL default '0',
  `rolaID` int(11) NOT NULL,
  `imie` varchar(15) NOT NULL,
  `nazwisko` varchar(25) NOT NULL,
  `miejscowosc` varchar(20) NOT NULL,
  `kod_poczt` varchar(6) NOT NULL,
  `ulica` varchar(50) NOT NULL,
  `nr_tel` varchar(15) default NULL,
  `NIP` varchar(13) default NULL,
  `nazwaFirmyID` int(11) default NULL,
  `dataRejestracji` date NOT NULL,
  `godzinaRejestracji` time NOT NULL,
  PRIMARY KEY  (`ID`),
  UNIQUE KEY `login` (`login`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin2 AUTO_INCREMENT=11 ;

-- 
-- Zrzut danych tabeli `user_tbl`
-- 

INSERT INTO `user_tbl` (`ID`, `login`, `haslo`, `email`, `blokada`, `rolaID`, `imie`, `nazwisko`, `miejscowosc`, `kod_poczt`, `ulica`, `nr_tel`, `NIP`, `nazwaFirmyID`, `dataRejestracji`, `godzinaRejestracji`) VALUES 
(1, 'admin_tomek', '$vp3rt4jn3<H45l0>&', 'tomek@wso.kom.pl', 0, 1, 'Tomek', 'M.', 'Chojnów', '59-225', 'Szeroka 13', '0768877666', '699-098-09-09', 1, '2007-12-01', '20:00:02'),
(3, 'admin_pawel', 'Z9@dujD4L3J$', 'paul@wso.kom.pl', 0, 1, 'Pawe³', 'T.', 'Legnica', '59-213', 'Daleka 14', '0761234567', '699-098-09-09', 1, '2007-12-02', '12:12:12'),
(4, 'admin_robert', '!mI3p$4|k0t4', 'roberto500@wso.kom.pl', 0, 1, 'Robert', 'S.', 'Jawor', '59-400', 'Krótka 16', '0695987654', '699-098-09-09', 1, '2007-12-02', '22:22:22'),
(5, 'zenek.k', 'zenek!kowal', 'zenek@moja.domena.pl', 0, 2, 'Zenon', 'Kowalczyk', 'Kowalewo', '59-999', 'B³otna 13/3', NULL, '699-098-09-09', 1, '2007-12-05', '14:03:23'),
(6, 'aniap', 'kotek11', 'ania.pe@wp.pl', 0, 2, 'Anna', 'Piotrowska', 'W±chock', '29-125', 'Brukowa 1', '1233456778', '699-098-09-09', 1, '2007-12-05', '14:08:17'),
(7, 'klient1', 'klient!1', 'jeste@klijente.pl', 0, 3, 'Wac³aw', '¦cis³y', 'Szczecin', '70-225', 'Morska 22a', '1234567890', NULL, NULL, '2007-12-12', '14:06:52'),
(8, 'klient2', 'klient!2', 'nicnie@kupuje.pl', 1, 3, 'Konrad', 'Opas³y', 'Gliwice', '41-015', 'Kopalniana 3b', '048231234567', '691-211-34-56', NULL, '2007-12-13', '15:37:08'),
(9, 'klient', 'testowy', 'testuje@taki-email.pl', 0, 3, 'Kazimierz', 'Szczêsny', 'Zgierz', '56-620', 'Krêta 9', '608321321', '698-11-23-34', 2, '2007-12-15', '13:34:21'),
(10, 'auto', 'auto@wso', 'auto@wso.kom.pl', 0, 3, 'Czes³aw', 'Ryba', 'Boles³awiec', '59-330', 'Stroma 2a', '075432188', '690-33-66-77', 2, '2007-12-18', '13:13:13');

-- --------------------------------------------------------

-- 
-- Struktura tabeli dla  `wyposazenia_tbl`
-- 

CREATE TABLE `wyposazenia_tbl` (
  `ID_wyposazenia` int(10) unsigned NOT NULL auto_increment,
  `typ` varchar(25) NOT NULL,
  `nazwa` varchar(25) NOT NULL,
  `fk_flagaWyposID` varchar(4) default NULL,
  PRIMARY KEY  (`ID_wyposazenia`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin2 AUTO_INCREMENT=8 ;

-- 
-- Zrzut danych tabeli `wyposazenia_tbl`
-- 

INSERT INTO `wyposazenia_tbl` (`ID_wyposazenia`, `typ`, `nazwa`, `fk_flagaWyposID`) VALUES 
(1, 'telefon', 'Nokia 1500', NULL),
(2, 'fotelik', '¿ó³ty', NULL),
(3, 'fotelik', 'ró¿owy', NULL),
(4, 'telefon', 'Siemens c50', NULL),
(5, 'telefon', 'Siemens c60', NULL),
(6, 'GPS', 'Navigator', NULL),
(7, 'CB radio', 'ABC', NULL);

-- --------------------------------------------------------

-- 
-- Struktura tabeli dla  `wypozyczenia_tbl`
-- 

CREATE TABLE `wypozyczenia_tbl` (
  `ID_wypozyczenia` int(10) unsigned NOT NULL auto_increment,
  `fk_userID` int(10) unsigned NOT NULL,
  `fk_autoID` int(10) unsigned NOT NULL,
  `dataWyp` date NOT NULL,
  `dataZwrOczek` date NOT NULL,
  `dataZwrRzecz` date default NULL,
  `miejscePodstID` int(10) unsigned NOT NULL,
  `miejsceZwrID` int(10) unsigned NOT NULL,
  `fk_rezerwacjaID` int(10) unsigned default NULL,
  PRIMARY KEY  (`ID_wypozyczenia`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin2 AUTO_INCREMENT=8 ;

-- 
-- Zrzut danych tabeli `wypozyczenia_tbl`
-- 

INSERT INTO `wypozyczenia_tbl` (`ID_wypozyczenia`, `fk_userID`, `fk_autoID`, `dataWyp`, `dataZwrOczek`, `dataZwrRzecz`, `miejscePodstID`, `miejsceZwrID`, `fk_rezerwacjaID`) VALUES 
(1, 7, 2, '2007-12-13', '2007-12-15', '2007-12-15', 1, 1, 1),
(2, 7, 6, '2007-12-23', '2007-12-27', '2007-12-28', 2, 2, 6),
(3, 7, 7, '2007-12-16', '2007-12-17', '2007-12-17', 2, 2, 2),
(4, 8, 1, '2007-12-20', '2007-12-27', '2007-12-30', 2, 2, 3),
(5, 7, 2, '2008-01-15', '2008-01-21', NULL, 2, 2, 4),
(6, 7, 2, '2008-01-02', '2008-01-05', '2008-01-05', 2, 2, 5);

-- --------------------------------------------------------

-- 
-- Struktura tabeli dla  `wypoz_wyposazenia_tbl`
-- 

CREATE TABLE `wypoz_wyposazenia_tbl` (
  `ID_wypoz_wyposazenia` int(10) unsigned NOT NULL auto_increment,
  `fk_wyposazenieID` int(10) unsigned NOT NULL,
  `fk_wypozyczenieID` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`ID_wypoz_wyposazenia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin2 AUTO_INCREMENT=1 ;

-- 
-- Zrzut danych tabeli `wypoz_wyposazenia_tbl`
-- 


-- --------------------------------------------------------

-- 
-- Struktura tabeli dla  `zdjecia_tbl`
-- 

CREATE TABLE `zdjecia_tbl` (
  `ID` int(10) unsigned NOT NULL auto_increment,
  `url` varchar(50) NOT NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin2 AUTO_INCREMENT=26 ;

-- 
-- Zrzut danych tabeli `zdjecia_tbl`
-- 

INSERT INTO `zdjecia_tbl` (`ID`, `url`) VALUES 
(9, '200801160482230.jpg'),
(10, '200801160482240.jpg'),
(11, '200801160482273.jpg'),
(12, '200801160482219.jpg'),
(13, 'Toyota_Aygo_1.jpg'),
(14, 'toyota_aygo2.jpg'),
(15, 'toyota_aygo2_teren.jpg'),
(16, 'toyota_aygo2_teren2.jpg'),
(17, 'toyota_aygo2_trasera.jpg'),
(18, 'BMW_1.jpg'),
(19, 'BMW_2.jpg'),
(20, 'BMW_3.jpg'),
(21, 'BMW_4.jpg'),
(22, 'porsche_911_carrera_1.jpg'),
(23, 'porsche_911_carrera_2.jpg'),
(24, 'porsche_911_carrera_3.jpg'),
(25, 'porsche_911_carrera_4.jpg');
