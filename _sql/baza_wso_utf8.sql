-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Czas wygenerowania: 06 Wrz 2018, 18:38
-- Wersja serwera: 5.1.37
-- Wersja PHP: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `wso`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `auto_drzwi_tbl`
--

CREATE TABLE IF NOT EXISTS `auto_drzwi_tbl` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `liczbaDrzwi` varchar(5) NOT NULL,
  PRIMARY KEY (`ID`)
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

CREATE TABLE IF NOT EXISTS `auto_kategoria_tbl` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nazwaKategorii` varchar(25) NOT NULL,
  `opisKategorii` text NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `nazwaKategorii` (`nazwaKategorii`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin2 AUTO_INCREMENT=11 ;

--
-- Zrzut danych tabeli `auto_kategoria_tbl`
--

INSERT INTO `auto_kategoria_tbl` (`ID`, `nazwaKategorii`, `opisKategorii`) VALUES
(1, 'Klasa A', 'Najmniejsze samochody klasy A, najczęściej określane jako miejskie, to dobre rozwiązanie dla osób poszukujących ekonomicznego środka transportu dla maksymalnie 4 osób z drobnym bagażem. \r\nDane techniczne: nadwozie hatchback 3 drzwi (niektóre 5 drzwi), ilość miejsc 4, pojemność bagażnika 0.20 - 1.0 m3, silnik 1.0 - 1.2 benzyna. \r\nWyposażenie: wspomaganie kierownicy, 1 - 2 poduszek powietrznych, radio CD, centralny zamek, klimatyzacja, ABS, manualna skrzynia biegów, opony zimowe (listopad - marzec).'),
(2, 'Klasa B', ' Do klasy B zaliczamy samochody małe, sprawujące się dobrze zarówno w warunkach miejskich jak i na krótkich i średnich trasach. Są one najczęściej wybieranym środkiem transportu dla przedstawicieli handlowych wielu przedsiębiorstw. Dzięki małym gabarytom, łatwemu prowadzeniu i parkowaniu ceni je również wiele kobiet. Dane techniczne: nadwozie hatchback 3 drzwi (niektóre 5 drzwi lub kombi), ilość miejsc 5, pojemność bagażnika 0.25 - 1.20 m3, silnik 1.0 - 1.4 benzyna lub diesel. Wyposażenie: wspomaganie kierownicy, 1 - 4 poduszek powietrznych, radiomagnetofon lub radio CD, centralny zamek, klimatyzacja, ABS, manualna skrzynia biegów, opony zimowe (listopad - marzec).'),
(3, 'Klasa C', ' Lubiane przez większość kierowców, popularne kompakty, pozwalają wygodnie podróżować na dalekie odległości czterem, a nawet pięciu osobom z dość dużym bagażem. Szczególnie w wersji kombi, samochody te są uniwersalnym środkiem transportu zarówno dla rodziny jak i do prowadzenia działalności gospodarczej. Dane techniczne: nadwozie hatchback 5 drzwi (niektóre kombi), ilość miejsc 5, pojemność bagażnika 0.35 - 1.5 m3, silnik 1.4 - 1.6 benzyna lub diesel. Wyposażenie: wspomaganie kierownicy, 2 - 6 poduszek powietrznych, radio CD, centralny zamek, klimatyzacja, ABS, manualna skrzynia biegów, opony zimowe (listopad - marzec).'),
(4, 'Klasa C A/T (automatic)', 'Samochody tej klasy spełnią najwyższe wymagania zarówno lokalnej klienteli jak i przyzwyczajonych do automatycznych skrzyń biegów przybyszów zza oceanów. Obszerne nadwozie oraz bogate wyposażenie sprawą, że nawet długa podróż stanie się czystą przyjemnością. Dane techniczne: nadwozie liftback 5 drzwi (niektóre kombi), ilość miejsc 5, pojemność bagażnika 0.5 - 1.5 m3, silnik 1.6 benzyna. Wyposażenie: wspomaganie kierownicy, 4 - 6 poduszek powietrznych, radio CD, centralny zamek, klimatyzacja, ABS, automatyczna skrzynia biegów, opony zimowe (listopad - marzec).'),
(5, 'Klasa Cabrio', 'Gdy wymagasz ekstremalnych doznań z jazdy, chcesz komuś zaimponować lub pragniesz w szczególny sposób ubogacić swoją uroczystość albo imprezę, wynajmij samochód cabrio coupe! Nasza firma jako pierwsza w Polsce umożliwia Ci ta niesamowitą frajdę. Składany elektrycznie i sztywny dach umożliwia dostosowanie się do warunków atmosferycznych. Wyjątkowy charakter tej klasy samochodów podkreśli indywidualizm i umożliwi realizację Twoich marzeń. W podróż będziesz mógł zabrać 4, a nawet 5 osób z podręcznym bagażem. Dane techniczne: nadwozie cabrio coupe (sedan) 2 drzwi, ilość miejsc 5, pojemność bagażnika do 0.5 m3, silnik 1.6 benzyna. Wyposażenie: wspomaganie kierownicy, 4 poduszki powietrzne, radio CD, centralny zamek, klimatyzacja, ABS, manualna skrzynia biegów, opony zimowe (listopad - marzec).'),
(6, 'Minivan', 'Jeśli potrzebujesz przewieźć do 7 osób na stosunkowo niedługi dystans z drobnym bagażem lub potrzebujesz wiekszej wygody tylko dla 5 osób, klasa MINIVAN spełni Twoje wszystkie oczekiwania. Dane techniczne: nadwozie kombi lub van 5 drzwi, ilość miejsc 7, pojemność bagażnika 0.25 - 3.0 m3, silnik 1.3 - 1.9 benzyna lub diesel. Wyposażenie: wspomaganie kierownicy, 2 - 6 poduszek powietrznych, radio lub radio CD, centralny zamek, klimatyzacja, ABS, manualna skrzynia biegów, opony zimowe (listopad - marzec).'),
(7, 'Van', 'Vany oferują wyjątkowo przestronne wnętrze i najwyższy komfort podróżowania. Dzięki temu, samochód tej klasy to dobry sposób na spędzenie \\"wakacji na kółkach\\" lub na grupowe wyjazdy służbowe dla 7, a nawet dla 9 osób. Dane techniczne: nadwozie van 5 drzwi, ilość miejsc 7 lub 9, pojemność bagażnika 0.25 - 3.0 m3, silnik 1.8 - 1.9 benzyna lub diesel. Wyposażenie: wspomaganie kierownicy, 2 - 6 poduszek powietrznych, radio CD, centralny zamek, klimatyzacja, ABS, manualna skrzynia biegów, opony zimowe (listopad - marzec).'),
(8, '4x4', 'Gdy Twoje marzenia lub praca wymagają poruszania się w nietypowym terenie, klasa samochodów z napędem na cztery koła będzie najlepszym wyborem. Klasa ta oferuje przestronne wnętrze dla 5 osób z bagażem, najwyższy komfort podróży i poziom bezpieczeństwa oraz możliwość zakosztowania prawdziwej jazdy off road. Dane techniczne: nadwozie suv (kombi) 5 drzwi, ilość miejsc 5, pojemność bagażnika 0.6 - 3.0 m3, silnik 1.9 - 2.2 benzyna lub diesel 4 x 4. Wyposażenie: wspomaganie kierownicy, 4 - 6 poduszek powietrznych, radio CD, centralny zamek, klimatyzacja, ABS, manualna skrzynia biegów, opony zimowe (listopad - marzec).'),
(9, 'Bus', 'Samochody tej klasy to idealne rozwiązanie dla dużej rodziny oraz grupowych wyjazdów służbowych lub rekreacyjnych, bez oglądania się na ilość bagażu (w szczególności w wersji przedłużonej L2). Znacznie większa ilość miejsca niż w klasie VAN umożliwia komfortową podróż 9 osobom. Dane techniczne: nadwozie furgon 4 drzwi (przednie lewe i prawe, boczne przesuwane i tylnie dwuskrzydłowe), ilość miejsc 9, pojemność bagażnika 1.0 - 3.0 m3, ładowność 1.0 t, silnik 1.9 diesel. Wyposażenie: wspomaganie kierownicy, 1 - 2 poduszek powietrznych, radiomagnetofon lub radio CD, centralny zamek, klimatyzacja, ABS, manualna skrzynia biegów, opony zimowe (listopad - marzec).'),
(10, 'Limuzyna', 'Luksusowe auta rezerwowane na specjlane okazje, głównie wesela, bakiety, wieczory kawalerskie i panieńskie, koncerty, i inne uroczystości. ');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `auto_kolor_tbl`
--

CREATE TABLE IF NOT EXISTS `auto_kolor_tbl` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kolor` varchar(25) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin2 AUTO_INCREMENT=19 ;

--
-- Zrzut danych tabeli `auto_kolor_tbl`
--

INSERT INTO `auto_kolor_tbl` (`ID`, `kolor`) VALUES
(1, 'biały'),
(2, 'zółty'),
(3, 'pomarańczowy'),
(4, 'czerwony'),
(5, 'fioletowy'),
(6, 'błękitny'),
(7, 'niebieski'),
(8, 'granatowy'),
(9, 'morski'),
(10, 'zielony'),
(11, 'jasny groszek'),
(12, 'brązowy'),
(13, 'czarny'),
(14, 'srebrny'),
(15, 'złoty'),
(16, 'szary'),
(17, 'różowy'),
(18, 'inny');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `auto_marka_tbl`
--

CREATE TABLE IF NOT EXISTS `auto_marka_tbl` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `marka` varchar(25) NOT NULL,
  PRIMARY KEY (`ID`),
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
(29, 'Łada'),
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

CREATE TABLE IF NOT EXISTS `auto_nadwozie_tbl` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `typNadwozia` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`)
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

CREATE TABLE IF NOT EXISTS `auto_paliwo_tbl` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `paliwo` varchar(25) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin2 AUTO_INCREMENT=4 ;

--
-- Zrzut danych tabeli `auto_paliwo_tbl`
--

INSERT INTO `auto_paliwo_tbl` (`ID`, `paliwo`) VALUES
(1, 'benzyna'),
(2, 'benzyna i gaz'),
(3, 'olej napędowy');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `auto_skrzynia_tbl`
--

CREATE TABLE IF NOT EXISTS `auto_skrzynia_tbl` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `typSkrzyni` varchar(25) NOT NULL,
  PRIMARY KEY (`ID`)
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

CREATE TABLE IF NOT EXISTS `auto_tbl` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `markaID` int(10) unsigned NOT NULL,
  `model` varchar(25) NOT NULL,
  `rokProdukcji` year(4) NOT NULL,
  `nrRejestracyjny` varchar(10) DEFAULT NULL,
  `statusPojazdu` int(11) unsigned DEFAULT NULL,
  `kategoriaID` int(10) unsigned NOT NULL,
  `pojemnosc` int(10) unsigned DEFAULT NULL,
  `moc` int(10) unsigned DEFAULT NULL,
  `skrzyniaID` int(10) unsigned DEFAULT NULL,
  `paliwoID` int(10) unsigned DEFAULT NULL,
  `nadwozieID` int(10) unsigned DEFAULT NULL,
  `drzwiID` int(10) unsigned DEFAULT NULL,
  `kolorID` int(10) unsigned NOT NULL,
  `metalik` smallint(5) unsigned DEFAULT NULL,
  `wyposazenieID` int(10) unsigned NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin2 AUTO_INCREMENT=8 ;

--
-- Zrzut danych tabeli `auto_tbl`
--

INSERT INTO `auto_tbl` (`ID`, `markaID`, `model`, `rokProdukcji`, `nrRejestracyjny`, `statusPojazdu`, `kategoriaID`, `pojemnosc`, `moc`, `skrzyniaID`, `paliwoID`, `nadwozieID`, `drzwiID`, `kolorID`, `metalik`, `wyposazenieID`) VALUES
(1, 53, 'Aygo', 2006, NULL, 1, 1, 1000, 68, 3, 1, 4, 2, 14, 1, 1),
(2, 53, 'Aygo', 2006, 'DWR 0401', 1, 1, 1000, 68, 3, 1, 4, 1, 16, 1, 1),
(5, 42, '911 Carrera', 2007, 'DL40911', 1, 5, 3600, 325, 4, 1, 5, 1, 14, 1, 2),
(6, 4, '740i', 2007, 'DLE 77WX', 1, 4, 4000, 308, 1, 3, 8, 2, 13, 1, 1),
(7, 55, 'Golf V', 2006, 'DLE S391', 1, 2, 1600, 115, 4, 3, 4, 2, 15, 1, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `auto_wyposazenia_tbl`
--

CREATE TABLE IF NOT EXISTS `auto_wyposazenia_tbl` (
  `ID_auto_wyposazenia` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fk_wyposazenieID` int(10) unsigned NOT NULL,
  `fk_autoID` int(10) unsigned NOT NULL,
  PRIMARY KEY (`ID_auto_wyposazenia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin2 AUTO_INCREMENT=1 ;

--
-- Zrzut danych tabeli `auto_wyposazenia_tbl`
--


-- --------------------------------------------------------

--
-- Struktura tabeli dla  `auto_zdjecia_tbl`
--

CREATE TABLE IF NOT EXISTS `auto_zdjecia_tbl` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `autoID` int(10) unsigned NOT NULL,
  `zdjecieID` int(10) unsigned NOT NULL,
  PRIMARY KEY (`ID`)
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

CREATE TABLE IF NOT EXISTS `firma_tbl` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nazwaFirmy` varchar(55) DEFAULT NULL,
  `REGON` varchar(9) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin2 AUTO_INCREMENT=3 ;

--
-- Zrzut danych tabeli `firma_tbl`
--

INSERT INTO `firma_tbl` (`ID`, `nazwaFirmy`, `REGON`) VALUES
(1, 'WSO - Wypożyczalnia Samochodów Osobowych', '123456785'),
(2, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `flagawypos_tbl`
--

CREATE TABLE IF NOT EXISTS `flagawypos_tbl` (
  `ID_flagaWypos` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `typ` varchar(4) NOT NULL,
  PRIMARY KEY (`ID_flagaWypos`)
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

CREATE TABLE IF NOT EXISTS `miejscowosci_tbl` (
  `ID_miejscowosci` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nazwaMiejsc` varchar(30) NOT NULL,
  PRIMARY KEY (`ID_miejscowosci`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin2 AUTO_INCREMENT=7 ;

--
-- Zrzut danych tabeli `miejscowosci_tbl`
--

INSERT INTO `miejscowosci_tbl` (`ID_miejscowosci`, `nazwaMiejsc`) VALUES
(1, 'Legnica'),
(2, 'Wrocław'),
(3, 'Chojnów'),
(4, 'Jawor'),
(5, 'Złotoryja'),
(6, 'Lubin');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `platnosci_tbl`
--

CREATE TABLE IF NOT EXISTS `platnosci_tbl` (
  `ID_platnosci` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fk_userID` int(10) unsigned NOT NULL,
  `tytul` varchar(25) NOT NULL,
  `kwota` float NOT NULL,
  `data` date NOT NULL,
  PRIMARY KEY (`ID_platnosci`)
) ENGINE=InnoDB DEFAULT CHARSET=latin2 AUTO_INCREMENT=1 ;

--
-- Zrzut danych tabeli `platnosci_tbl`
--


-- --------------------------------------------------------

--
-- Struktura tabeli dla  `rezerwacje_tbl`
--

CREATE TABLE IF NOT EXISTS `rezerwacje_tbl` (
  `ID_rezerwacji` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fk_userID` int(10) unsigned NOT NULL,
  `fk_autoID` int(10) unsigned NOT NULL,
  `dataRez` date NOT NULL,
  `dataPocz` date NOT NULL,
  `dataKonc` date NOT NULL,
  `miejscePodstID` int(10) unsigned NOT NULL,
  `miejsceZwrID` int(10) unsigned NOT NULL,
  `uwagi` text,
  PRIMARY KEY (`ID_rezerwacji`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin2 AUTO_INCREMENT=14 ;

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
(8, 7, 2, '2008-01-20', '2008-01-23', '2008-01-26', 2, 2, NULL),
(11, 7, 5, '2015-04-18', '2015-04-19', '2015-04-21', 2, 2, NULL),
(12, 7, 6, '2015-12-07', '2015-12-09', '2015-12-13', 2, 2, NULL),
(13, 7, 7, '2015-12-07', '2015-12-13', '2015-12-16', 2, 2, NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `rez_wyposazenia_tbl`
--

CREATE TABLE IF NOT EXISTS `rez_wyposazenia_tbl` (
  `ID_rez_wyposazenia` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fk_wyposazenieID` int(10) unsigned NOT NULL,
  `fk_rezerwacjaID` int(10) unsigned NOT NULL,
  PRIMARY KEY (`ID_rez_wyposazenia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin2 AUTO_INCREMENT=1 ;

--
-- Zrzut danych tabeli `rez_wyposazenia_tbl`
--


-- --------------------------------------------------------

--
-- Struktura tabeli dla  `rodzajetresci_tbl`
--

CREATE TABLE IF NOT EXISTS `rodzajetresci_tbl` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rodzajNazwa` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `rodzajTresci` (`rodzajNazwa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin2 AUTO_INCREMENT=3 ;

--
-- Zrzut danych tabeli `rodzajetresci_tbl`
--

INSERT INTO `rodzajetresci_tbl` (`ID`, `rodzajNazwa`) VALUES
(1, 'Ogłoszenie'),
(2, 'Promocje');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `tresc_tbl`
--

CREATE TABLE IF NOT EXISTS `tresc_tbl` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `trescRodzaj` int(10) unsigned NOT NULL,
  `tytul` varchar(100) DEFAULT NULL,
  `tresc` text NOT NULL,
  `zdjecia` int(10) unsigned DEFAULT NULL,
  `autorID` int(10) unsigned NOT NULL,
  `dataTresci` date NOT NULL,
  `czasTresci` time NOT NULL,
  `aktywne` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin2 AUTO_INCREMENT=14 ;

--
-- Zrzut danych tabeli `tresc_tbl`
--

INSERT INTO `tresc_tbl` (`ID`, `trescRodzaj`, `tytul`, `tresc`, `zdjecia`, `autorID`, `dataTresci`, `czasTresci`, `aktywne`) VALUES
(1, 1, 'Pierwszy', 'Testowy nr 1', 1, 4, '2008-01-04', '14:55:01', NULL),
(2, 1, 'Już wkrótce otwarcie!', 'Zapraszamy do korzystania z usług naszej firmy. Już niedługo otwieramy. \r\nOdwiedź nasza siedzibę, namiary w odnośniku <b>kontakt<b>.', 1, 1, '2008-01-04', '16:07:45', NULL),
(3, 1, 'Pierwsza limuzyna!', 'Infomujemy, że od dnia dzisiejszego posiadamy w ofercie luksusową limuzynę.\r\n\r\nPojazd uświetni wszelkiego rodzaju imprezy, zwłaszcza śluby, promocje, czy trasy koncertowe. Nadaje się także do organizacji spotkań biznesowych, imprez okolicznościowych, studniówek, a także wieczorów kawalerskich i panieńskich,  zjazdów i innych zamówień wg klienta. Jednym słowem wszędzie tam gdzie potrzebny jest luksusowy samochód. \r\n\r\nW zależności od Państwa potrzeb, marzeń i pomysłów jesteśmy gotowi przedstawić ofertę indywidualną i zrealizować Państwa indywidualne zamówienia.\r\n\r\nZapraszamy do korzystania z naszych usług.', 1, 1, '2008-01-09', '21:20:56', NULL),
(4, 1, 'Terenówka w planach', 'Już za  tydzień możecie Państwo szukać wrażeń na bezdrożach i nierównościach kraju, dzięki naszemu nowemu nabytkowi. \r\n\r\nProsimy o sprawdzenie kategorii <b>4x4</b>.', 1, 1, '2008-01-10', '19:51:34', NULL),
(9, 1, 'Pierwsze auto w bazie!', 'Mamy pierwsze auto w bazie: Toyota Aygo!\r\n\r\nSzczegóły pojazdu można zobaczyć po wybraniu kategorii danego auta, spisu wszystkich aut lub wykorzystaniu wyszukiwarki. \r\n\r\nZapraszamy.', 1, 1, '2008-01-14', '01:22:59', NULL),
(10, 1, 'Porsche 911', 'Jeden z właścicieli Wypożyczalni już się nacieszył swoim Porszaczkiem i można go wypożyczyć. Enjoy! :)', 1, 3, '2008-01-14', '20:00:03', NULL),
(11, 2, 'Rabat', 'Dla naszych nowych klientów przygotowaliśmy rabat w wysokości 10% za wynajęcie drugiego samochodu w ciągu miesiąca od ostatniego zwrotu pojazdu.\r\nOkres obowiązywania tylko do końca stycznia.', 1, 1, '2008-01-15', '17:26:50', 1),
(12, 2, 'Rabat dla każdego', 'Wypożycz dowolne auto w ciągu najbliższego tygodania, a otrzymasz zniżkę 20% z całości opłat!', 1, 1, '2008-01-15', '17:32:18', 1),
(13, 2, 'Auto dla firm', 'Przepraszamy, szczegóły tylko na telefon.', 1, 1, '2008-01-15', '17:33:54', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `userrole_tbl`
--

CREATE TABLE IF NOT EXISTS `userrole_tbl` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rolaNazwa` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`)
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

CREATE TABLE IF NOT EXISTS `user_tbl` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(15) NOT NULL,
  `haslo` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `blokada` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `rolaID` int(11) NOT NULL,
  `imie` varchar(15) NOT NULL,
  `nazwisko` varchar(25) NOT NULL,
  `miejscowosc` varchar(20) NOT NULL,
  `kod_poczt` varchar(6) NOT NULL,
  `ulica` varchar(50) NOT NULL,
  `nr_tel` varchar(15) DEFAULT NULL,
  `NIP` varchar(13) DEFAULT NULL,
  `nazwaFirmyID` int(11) DEFAULT NULL,
  `dataRejestracji` date NOT NULL,
  `godzinaRejestracji` time NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `login` (`login`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin2 AUTO_INCREMENT=11 ;

--
-- Zrzut danych tabeli `user_tbl`
--

INSERT INTO `user_tbl` (`ID`, `login`, `haslo`, `email`, `blokada`, `rolaID`, `imie`, `nazwisko`, `miejscowosc`, `kod_poczt`, `ulica`, `nr_tel`, `NIP`, `nazwaFirmyID`, `dataRejestracji`, `godzinaRejestracji`) VALUES
(1, 'admin_tomek', '$vp3rt4jn3<H45l0>&', 'tomek@wso.kom.pl', 0, 1, 'Tomek', 'M.', 'Chojnów', '59-225', 'Szeroka 13', '0768877666', '699-098-09-09', 1, '2007-12-01', '20:00:02'),
(3, 'admin_pawel', 'Z9@dujD4L3J$', 'paul@wso.kom.pl', 0, 1, 'Paweł', 'T.', 'Legnica', '59-213', 'Daleka 14', '0761234567', '699-098-09-09', 1, '2007-12-02', '12:12:12'),
(4, 'admin_robert', '!mI3p$4|k0t4', 'roberto500@wso.kom.pl', 0, 1, 'Robert', 'S.', 'Jawor', '59-400', 'Krótka 6', '0695987654', '699-098-09-09', 1, '2007-12-02', '22:22:22'),
(5, 'zenek.k', 'zenek!kowal', 'zenek@moja.domena.pl', 0, 2, 'Zenon', 'Kowalczyk', 'Kowalewo', '59-999', 'Błotna 13/3', NULL, '699-098-09-09', 1, '2007-12-05', '14:03:23'),
(6, 'aniap', 'kotek11', 'ania.pe@wp.pl', 0, 2, 'Anna', 'Piotrowska', 'Wąchock', '29-125', 'Brukowa 3', '1233456778', '699-098-09-09', 1, '2007-12-05', '14:08:17'),
(7, 'klient1', 'klient!1', 'jeste@klijente.pl', 0, 3, 'Wacław', 'Ścisły', 'Szczecin', '70-225', 'Morska 22a', '1234567890', NULL, NULL, '2007-12-12', '14:06:52'),
(8, 'klient2', 'klient!2', 'nicnie@kupuje.pl', 1, 3, 'Konrad', 'Opasły', 'Gliwice', '41-015', 'Kopalniana 3b', '048231234567', '691-211-34-56', NULL, '2007-12-13', '15:37:08'),
(9, 'klient', 'testowy', 'testuje@taki-email.pl', 0, 3, 'Kazimierz', 'Szczęsny', 'Zgierz', '56-620', 'Kręta 9', '608321321', '698-11-23-34', 2, '2007-12-15', '13:34:21'),
(10, 'auto', 'auto@wso', 'auto@wso.kom.pl', 0, 3, 'Czesław', 'Ryba', 'Bolesławiec', '59-330', 'Stroma 2a', '075432188', '690-33-66-77', 2, '2007-12-18', '13:13:13');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `wyposazenia_tbl`
--

CREATE TABLE IF NOT EXISTS `wyposazenia_tbl` (
  `ID_wyposazenia` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `typ` varchar(25) NOT NULL,
  `nazwa` varchar(25) NOT NULL,
  `fk_flagaWyposID` varchar(4) DEFAULT NULL,
  PRIMARY KEY (`ID_wyposazenia`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin2 AUTO_INCREMENT=8 ;

--
-- Zrzut danych tabeli `wyposazenia_tbl`
--

INSERT INTO `wyposazenia_tbl` (`ID_wyposazenia`, `typ`, `nazwa`, `fk_flagaWyposID`) VALUES
(1, 'telefon', 'Nokia 1500', NULL),
(2, 'fotelik', 'żółty', NULL),
(3, 'fotelik', 'różowy', NULL),
(4, 'telefon', 'Siemens c50', NULL),
(5, 'telefon', 'Siemens c60', NULL),
(6, 'GPS', 'Navigator', NULL),
(7, 'CB radio', 'ABC', NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `wypozyczenia_tbl`
--

CREATE TABLE IF NOT EXISTS `wypozyczenia_tbl` (
  `ID_wypozyczenia` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fk_userID` int(10) unsigned NOT NULL,
  `fk_autoID` int(10) unsigned NOT NULL,
  `dataWyp` date NOT NULL,
  `dataZwrOczek` date NOT NULL,
  `dataZwrRzecz` date DEFAULT NULL,
  `miejscePodstID` int(10) unsigned NOT NULL,
  `miejsceZwrID` int(10) unsigned NOT NULL,
  `fk_rezerwacjaID` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`ID_wypozyczenia`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin2 AUTO_INCREMENT=7 ;

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

CREATE TABLE IF NOT EXISTS `wypoz_wyposazenia_tbl` (
  `ID_wypoz_wyposazenia` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fk_wyposazenieID` int(10) unsigned NOT NULL,
  `fk_wypozyczenieID` int(10) unsigned NOT NULL,
  PRIMARY KEY (`ID_wypoz_wyposazenia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin2 AUTO_INCREMENT=1 ;

--
-- Zrzut danych tabeli `wypoz_wyposazenia_tbl`
--


-- --------------------------------------------------------

--
-- Struktura tabeli dla  `zdjecia_tbl`
--

CREATE TABLE IF NOT EXISTS `zdjecia_tbl` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
