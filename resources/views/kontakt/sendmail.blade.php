@extends('kontakt/kontakt')

@section('kontakt')
@include('items/header')

    <?php
    if(isset($_POST['submit'])) {

    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "1994emas@gmail.com";
    $email_subject ="Content-type:text/html; charset=UTF-8";
    $email_subject = 'Wiadomosc ze strony wyjedź z nami z dnia '.date('d-m-Y');

    function died($error) {

        // your error code can go here
        echo "<center><div class='alert alert-danger'>
    <div class='alert-title'>Bardzo nam przykro, ale coś poszło nie tak</div></center><br /> ";
        echo "<center>Błędy znajdują się poniżej:</center><br /><br />";
        echo $error."<br /><br />";
        echo "<center>Proszę wrócić do formularza i to poprawić.<//center><br /><br />";

        echo "<a href='kontakt' class='text-center btn btn-outline-danger m-4'> Kliknij tutaj, aby wrócić </a> </br>";

        die();
    }


    // validation expected data exists
    if(!isset($_POST['imie']) ||
        !isset($_POST['nazwisko']) ||
        !isset($_POST['email']) ||
        !isset($_POST['numer']) ||
        !isset($_POST['wiadomosc'])) {
        died('<center>Przepraszamy, ale wystąpił bład z Państwa formularzem.</center>' );
    }



    $first_name = $_POST['imie']; // required
    $last_name = $_POST['nazwisko']; // required
    $email_from = $_POST['email']; // required
    $telephone = $_POST['numer']; // not required
    $comments = $_POST['wiadomosc']; // required

    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

    if(!preg_match($email_exp,$email_from)) {
        $error_message .= '<center>Podany został błędny adres email lub nie został podany</center>';
    }

    $string_exp = "/^[A-Za-ą, ć, ę, ł, ń, ó, ś, ź, ż.'-]+$/";

    if(!preg_match($string_exp,$first_name)) {
        $error_message .= '<center>Twoje imie zawiera nieprawidłowe znaki lub nie zostało podane</center>';
    }
    $number_exp = "/^[0,1,2,3,4,5,6,7,8,9]+$/";

    if(!preg_match($number_exp,$telephone)) {
        $error_message .= '<center>Twoje numer  zawiera nieprawidłowe znaki lub nie zostało podane</center>';
    }

    if(!preg_match($string_exp,$last_name)) {
        $error_message .= '<center>Twoje nazwisko zawiera nieprawidłowe znaki lub nie zostało podane</center>';
    }

    if(strlen($comments) < 2) {
        $error_message .= '<center>Twoja wiadomość jest za którka</center>';
    }

    if(strlen($error_message) > 0) {
        died($error_message);
    }

    $email_message = "Poniżej znajdują się szczegóły wiadomości.\n\n";


    function clean_string($string) {
        $bad = array("content-type","bcc:","to:","cc:","href");
        return str_replace($bad,"",$string);
    }



    $email_message .= "Imie: ".clean_string($first_name)."\n";
    $email_message .= "Nazwisko: ".clean_string($last_name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Numer telefonu: ".clean_string($telephone)."\n";
    $email_message .= "Wiadomosc: ".clean_string($comments)."\n";

    // create email headers

    $headers = 'From: '.$email_from."\r\n".
        'Reply-To: '.$email_from."\r\n" .
        'X-Mailer: PHP/' . phpversion();
    @mail($email_to, $email_subject, $email_message, $headers);
    ?>

    <!-- include your own success html here -->

    <script> alert('Dziękujemy za wiadomość, postaramy się odpowiedzieć w jak najkrótszym czasie')
        window.location.href = "kontakt";</script>


    <?php

    }

    ?>
    <?php

    ?>
@endsection('kontakt')
