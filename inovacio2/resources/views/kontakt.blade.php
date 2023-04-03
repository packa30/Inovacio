<?php $nav_kontakt = 'w--current'; ?>
@extends('layouts.app',['title' => 'Kontakt - inovacio.sk - Projekty interiérov a dizajn nábytku.'])
@section('content')
    <div class="sekcia-obsah">
      <div class="obsah-strany w-container">
        <h2 class="nadpis-h2">Kontakt</h2>
        <p class="kontakty">kontakt Zvolen, Martin a Zlaté Moravce<br><br><strong>Ing. Miroslav Vaňo</strong><br><br>E-mail: <a href="mailto:project@inovacio.sk" class="link">projekt@inovacio.sk</a><br>Telefón: <span class="text-span-5">+421 948 470 710 (Prosíme volať po 10:00)</span></p>
        <div class="row-cennik w-row">
          <div class="column-2 w-col w-col-6"></div>
          <div class="column-3 w-col w-col-6"></div>
        </div>


        <h2 id="Formular" class="nadpis-h2">Kontaktný formulár</h2>
        <div class="w-form">
          <form id="email-form" name="email-form" data-name="Email Form" class="form" method="post" action="{{ route('formular') }}" enctype='multipart/form-data'>
            {{ csrf_field() }}
            <div class="row-cennik w-row">
              <div class="column-2 w-col w-col-6"><label for="priezvisko" class="field-label">Priezvisko:</label><input type="text" class="w-input" maxlength="256" name="priezvisko" data-name="priezvisko" placeholder="Priezvisko" id="priezvisko"><label for="meno" class="field-label">Meno:</label><input type="text" class="w-input" maxlength="256" name="meno" data-name="meno" placeholder="Meno" id="meno"></div>
              <div class="column-3 w-col w-col-6"><label for="email" class="field-label">* Váš e-mail:</label><input type="email" class="w-input" maxlength="256" name="email" data-name="email" placeholder="e-mail" id="email" required=""><label for="telefon" class="field-label">Telefón:</label><input type="text" class="w-input" maxlength="256" name="telefon" data-name="telefon" placeholder="+421" id="telefon"></div>
            </div>
            <p class="text">mám záujem o nacenenie projektu</p>
            <div class="row-3 w-row">
              <div class="w-col w-col-3">
                <div class="w-checkbox"><input type="checkbox" id="obyvacky" name="obyvacky" data-name="obyvacky" class="w-checkbox-input"><label for="obyvacky" class="field-label w-form-label">obývačka</label></div>
                <div class="checkbox-field w-checkbox"><input type="checkbox" id="kupelne" name="kupelne" data-name="kupelne" class="w-checkbox-input"><label for="kupelne" class="field-label w-form-label">kúpelne</label></div>
              </div>
              <div class="w-col w-col-3">
                <div class="w-checkbox"><input type="checkbox" id="izby" name="izby" data-name="izby" class="w-checkbox-input"><label for="izby" class="field-label w-form-label">detskej izby</label></div>
                <div class="w-checkbox"><input type="checkbox" id="pracovne" name="pracovne" data-name="pracovne" class="w-checkbox-input"><label for="pracovne" class="field-label w-form-label">pracovne</label></div>
              </div>
              <div class="w-col w-col-3">
                <div class="w-checkbox"><input type="checkbox" id="predsiene" name="predsiene" data-name="predsiene" class="w-checkbox-input"><label for="predsiene" class="field-label w-form-label">predsiene</label></div>
                <div class="w-checkbox"><input type="checkbox" id="spalne" name="spalne" data-name="spalne" class="w-checkbox-input"><label for="spalne" class="field-label w-form-label">spálne</label></div>
              </div>
              <div class="w-col w-col-3">
                <div class="w-checkbox"><input type="checkbox" id="kuchyne" name="kuchyne" data-name="kuchyne" class="w-checkbox-input"><label for="kuchyne" class="field-label w-form-label">kuchyne</label></div>
                <div class="w-checkbox"><input type="checkbox" id="wc" name="wc" data-name="wc" class="w-checkbox-input"><label for="wc" class="field-label w-form-label">wc</label></div>
              </div>
            </div>
            <input name="files[]" type="file" multiple="multiple" value="Priložiť súbor" data-wait="Nahrávam..." class="submit-button w-button"><textarea id="sprava" name="sprava" placeholder="Napíšte správu..." maxlength="5000" data-name="sprava" class="textarea w-input"></textarea>
            <p class="text">* Povinné položky</p>
            <!--<p class="text">Spracovanie osobných údajov podľa <a href="https://dataprotection.gov.sk/uoou/sk/main-content/nariadenie-gdpr" target="_blank" class="link-2">Nariadenia GDPR Európskeho parlamentu a Rady (EÚ) 2016/679</a>:</p>
            <div class="w-checkbox"><input type="checkbox" id="suhlas" name="suhlas" data-name="suhlas" required="" class="w-checkbox-input"><label for="suhlas" class="field-label w-form-label">* SÚHLASÍM SO SPRACOVANÍM ZASLANÝCH ÚDAJOV - Zaškrtnutím políčka udeľujem súhlas so spracovaním osobných údajov podľa GDPR (ukladá sa Meno, Telefónne číslo, E-mailová adresa) za účelom spätného kontaktu a uložením v internej databáze kontaktov firmy. Osobné údaje nebudú poskytnuté tretím osobám.</label></div>
            <div class="checkbox-field-2 w-checkbox"><input type="checkbox" id="vymazat" name="vymazat" data-name="vymazat" class="w-checkbox-input"><label for="vymazat" class="field-label w-form-label">ŽIADAM VYMAZAŤ mnou zaslané údaje z databázy (vyplňte políčko E-mail rovnako ako pri zasielaní formulára, zaškrtnite prosím aj políčko SÚHLASU (je povinné), informácie budú vymazané v čo najkratšej dobe, vymazanie potvrdíme spätne formou e-mailu).</label></div>-->
            <input type="submit" value="Odoslať" data-wait="Odosielam..." class="submit-button w-button"></form>


          <div class="w-form-done">
            <div>Ďakujeme za zaslanie formulára.</div>
          </div>
          <div class="w-form-fail">
            <div>Formulár sa nepodarilo odoslať. Kontaktujte nás pomocou <a href="mailto:projekt@inovacio.sk" class="link">projekt@inovacio.sk</a></div>
          </div>
        </div>
        <h2 class="nadpis-h2">O nás</h2>
        <p class="text">Akú farbu zvoliť do interiéru? Aký typ nábytku, dverí a schodiska vybrať? Koľko dlažby a obkladu bude potrebných na kúpeľňu? Kam umiestniť svietidlá, vypínače a zásuvky? A ako zladiť všetky prvky interiéru v jeden príjemne pôsobiaci celok?</p>
        <p class="text">Pri pohľade na prázdne miestnosti novostavby alebo rekonštrukcie starších priestorov dokážu tieto otázky poriadne potrápiť, predsa len budúce spokojné bývanie je dlhodobá investícia do vlastného života. Naše služby ponúkame v riešení otázok dostupného bývania. Tvoríme interiéry prevažne v modernom minimalistickom štýle a príjemne na človeka pôsobiacich pastelových odtieňoch. Pri práci často využívame prírodné materiály, čím si navrhované priestory dlhodobo zachovávajú modernosť a nadčasovosť.</p>
        <p class="text">Členmi tímu Inovacio sú dizajnér Ing. Miroslav Vaňo a konštruktér Ing. Juraj Žiačik, absolventi Technickej univerzity vo Zvolene v odbore dizajn nábytku s viacročnou praxou a technik Ing. Dominik Vaňo, absolvent Žilinskej univerzity v Žiline. Našim spoločným prepojením jednotlivých profesií pri tvorbe interiéru vytvárame hodnotné prostredie pre život človeka a jeho blízkych.</p>
        <div class="row-4 w-row">
          <div class="column-5 w-col w-col-4"><a href="https://www.chooze.sk/" target="_blank" class="w-inline-block"><img src="../images/logoChooze.png"></a></div>
          <div class="w-clearfix w-col w-col-8">
            <p class="text-reklama">- tu si môžete zakúpiť niektoré z doplnkov používaných v našich projektoch</p>
          </div>
        </div>
        <div class="row-4 w-row">
          <div class="column-4 w-col w-col-4"><a href="http://www.dobrydom.sk/" target="_blank" class="w-inline-block"><img src="../images/logoDobryDom.png" width="113"></a></div>
          <div class="w-clearfix w-col w-col-8">
            <p class="text-reklama">- nízkoenergetické a pasívne drevostavby systémom two by four - bývanie s nízkymi nákladmi, časovo nenáročnou výstavbou a dostupnými cenami</p>
          </div>
        </div>
        <p class="text">Sídlo spoločnosti:  Inovacio s.r.o.  |  Veľké Vozokany 12  |  951 82<br><br>IČO: 46476237  |  DIČ: 2820010611<br><br>Spoločnosť zapísaná v Obchodnom registri Okresného súdu Nitra oddiel: Sro, vložka číslo: 30593/N</p>
      </div>
    </div>
@endsection
