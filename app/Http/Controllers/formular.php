<?php

namespace App\Http\Controllers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'Exception.php';
require 'PHPMailer.php';

use Illuminate\Http\Request;

class formular extends Controller
{
  public function mailsend(Request $req)
  {
    $email = $req->input('email');
    $help = "e-mail : " . $email . "\n";

    $mail = new PHPMailer(true);
    $mail->CharSet = 'utf-8';



    $mail->setFrom('projekt@inovacio.sk', 'projekt@inovacio.sk');

    /*
    TU MAIL ADRESA KAM TO CHCÚ PRIJAŤ + NáZOV AKA FIRMA ASI
    */
    $mail->addAddress('projekt@inovacio.sk', 'inovacio');


    $mail->Subject = 'kontaktný formulár';

    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
    if(!preg_match($email_exp,$email)) {
        return redirect()->intended(route('kontakt'))->with('status2',"Zdá sa, že ste zadali nesprávny e-mail. Skúste to znova prosím.");
    }

    if (!is_null($req->input('meno'))) {
      $help .= "Meno : " . $req->input('meno') . "\n";
      $first_name = $req->input('meno');
    }
    if(!is_null($req->input('priezvisko'))) {
      $help .= "Priezvisko : " . $req->input('priezvisko') . "\n";
      $last_name = $req->input('priezvisko');
    }

    if (!is_null($req->input('priezvisko')) && !is_null($req->input('meno'))) {
      $name = $first_name . " " . $last_name;
      $mail->addReplyTo($email, $name);
    }
    elseif (is_null($req->input('priezvisko')) && is_null($req->input('meno'))) {
      $mail->addReplyTo($email, $email);
    }
    elseif (!is_null($req->input('priezvisko'))) {
      $mail->addReplyTo($email, $last_name);
    }
    else {
      $mail->addReplyTo($email, $first_name);
    }

    if (!is_null($req->input('telefon'))) {
      $telephone = $req->input('telefon');
      $help .="Tel. číslo : " . $telephone . "\n";
    }



    $help .= "Mám záujem o nacenenie : ";
    $index = 0;
    $index2 = 0;
    $checkbox = array();
    array_push($checkbox, 'obyvacky', 'kupelne', 'izby', 'pracovne', 'predsiene' , 'spalne' , 'kuchyne' , 'wc');
    $todo = array();
    foreach ($checkbox as $check) {
      if(!is_null($req->input($check))){
        array_push($todo, $check);
        $index++;
      }
    }
    foreach ($todo as $key) {
      if($index2 != 0){
        if ($index == $index2+1) {
          $help .= " a ";
        }
        else {
          $help .= ", ";
        }
      }
      switch ($key) {
        case 'obyvacky':
        $help .= "obývačky";
        break;
        case 'kupelne':
        $help .= "kúpelne";
        break;
        case 'izby':
        $help .= "detskej izby";
        break;
        case 'spalne':
        $help .= "spálne";
        break;
        default:
        $help .= $key;
        break;
      }
      $index2++;
    }

    $help .= "\n";

    if (!is_null($req->input('sprava'))) {
      $help .= "\n" . $req->input('sprava') . "\n";
    }

    $mail->Body = $help;
    if (!is_null($req->input('files[]'))) {
      foreach(array_keys($_FILES['files']['name']) as $key) {
        $source = $_FILES['files']['tmp_name'][$key];
        $filename = $_FILES['files']['name'][$key];
    }

      $mail->AddAttachment($source, $filename);
    }

    if(!$mail->send()){
      return redirect()->intended(route('kontakt'))->with('status',"Formulár sa nepodarilo odoslať. Kontaktujte nás pomocou projekt@inovacio.sk");
    }
    else {
      return redirect()->intended(route('kontakt'))->with('status',"Ďakujeme za zaslanie formulára.");
    }

  }
}



 ?>
