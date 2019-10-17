<?php

/* Setta indirizzo destinatario */

$nuovaMail  = "info@inforeg.ch";

/* Setta Oggetto della mail  */

$subject = "Messaggio Inviato da sito Inforeg ";

/* Controllo e validazione campi con la funzione check_input  */

$nome = check_input($_POST['nome'], "Inserisci il tuo Nome");
$cognome = check_input($_POST['cognome'], "Cognome Mancante");
$indirizzo_email = check_input($_POST['indirizzo_email']);
$numero_telefono = check_input($_POST['numero_telefono']);
$testo_messaggio = check_input($_POST['testo_messaggio'], "Messaggio Mancante");

/* Controllo Indirizzo Mail */

if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $indirizzo_email))
{
    show_error("Indirizzo Mail non valido");
}

/* Controllo su Numero di Telefono */

if (preg_match("/\D/",$numero_telefono))
{
   show_error("Inserire solo numeri");
}


/* Riporto variabili nel corpo del messaggio mail */


$message = "Nuovo Messaggio ricevuto dal sito

Messaggio inviato da:

Nome: $nome
Cognome: $cognome
E-mail: $indirizzo_email
Telefono: $numero_telefono


Testo del Messaggio:
$testo_messaggio


";

/* invio del Messaggio con la funzione interna mail()  */

mail($nuovaMail, $subject, $message);


/* Se i controlli sui campi sono validi reindirizza utente su pagina di ringraziamento con link alla Home */

header('Location: inforeg-contatti-inviomessaggio.html');
exit();

/* Funzioni di validazione campi ed errori */

function check_input($data, $problem='')
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    if ($problem && strlen($data) == 0)
    {
        show_error($problem);
    }
    return $data;
}

function show_error($myError)
{
?>
    <html>
    <body>

    <b>Cortesemente verifichi i seguenti campi:</b><br />
    <?php echo $myError; ?>
	<p> Ritorna al <a href="inforeg-contatti.html"> Modulo Invio Messaggio </a> del sito. </p>

    </body>
    </html>
<?php
exit();
}
?>