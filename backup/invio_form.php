

<?php

  $name = $_REQUEST['nome'] ;
  $surname = $_REQUEST['cognome'] ;
  $email = $_REQUEST['indirizzo_email'] ;
  $phone = $_REQUEST['numero_telefono'] ;
  $message = $_REQUEST['testo_messaggio'] ;



  mail( "info@inforeg.ch", "Messaggio inviato da $name $surname da sito Inforeg ",$message, "From: $email" );


  echo "Mail Spedita correttamente.";


?>

<p>  Ritorna alla <a href="index.html">Home</a> del sito. </p>