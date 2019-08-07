<?php

 if ( isSet( $_GET['link'] ) )
 {
  switch ( $_GET['link'] )
  {
  case "oferta":     //samochody
    include("./scripts/samochody.php");
   break; 

  case "promocje":   //promocje
    include("./scripts/promocje.php");
   break;

  case "regulamin":  //regulamin
    include("./scripts/regulamin.php");
   break; 

  case "o_firmie":  //o firmie
    include("./scripts/o_firmie.php");
   break; 

  case "kontakt":	//kontakt
    include("./scripts/kontakt.php");
   break;
 
  default:
 	echo("link: <b>");
	echo( $_GET['link'] );
	echo("</b><br />");
	echo("login: <b>");
	echo( $_SESSION['zalogowany'] );
	echo("</b><br />formularz - user: <b>");
	echo( $_POST['uzytkownik'] );
	echo("</b><br />formularz - has³o: <b>");
	echo( $_POST['haslo'] );
	echo("</b><br />formularz - tajne: <b>");
	echo( $_POST['wylogowany'] );
	echo("</b>");
	echo("<h3>testowanie: $wartosc</h3>");
	echo("sesja: <b>");
	echo( session_id() );
	echo("</b>");
	echo("<h2>dzia³ <b>");
	echo( $_GET['link'] );
	echo("</h2>");
	break;
  } // switch-end
 }
 

?>
