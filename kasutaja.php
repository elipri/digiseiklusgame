<?php 
   require("functions_main.php");
	
   //kui pole sisseloginud
   if(!isset($_SESSION["userid"])){
     header("Location: avaleht.php");
     exit();
   }
   
   //väljalogimine
   if(isset($_GET["logout"])){
     session_destroy();
     header("Location: avaleht.php");
     exit();
   }
   
   //var_dump($_SESSION);

   $randomNum = substr(str_shuffle("123456789"), 0, 4);
  
?> 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/normalize.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link id='-gd-engine-icon' rel='icon' type='image/png' href='favicon.png' />
    <script src="https://kit.fontawesome.com/b8b3d71ce8.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parallax/3.1.0/parallax.min.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.min.js"></script>
    <script src="https://unpkg.com/tippy.js@6/dist/tippy-bundle.umd.js"></script>
    <script src="js/sidenav.js"></script>
    <title>Õpetajale</title>
  </head>
  <body>                        
    <div id="sidenav" class="sidenav">
        <div class="sidewrap">
            <a href="javascript:void(0)" id="close" class="closebtn"><i class="fas fa-times-circle"></i></a>
            <div id="help">
                <h2>Info</h2>
                <p>
                Tere tulemast Digiseikluse mängurakenduse õpetaja lehele!</p><p> Siin lehel kuvatakse Sulle mängus sees olevad küsimused, millele õpilased mängides vastama peavad. Mängu loomiseks genereeri kood vajutades nupule “Loo kood”. Iga kood on unikaalne. Tulemuste nägemiseks vajuta nupule “Tulemused”.
                </p>
            </div>         
        </div>
    </div>
    <div id="scene">
      <div data-depth="0.3" >
        <img src="img/Taust.png">
      </div>
    </div>
    <div class="wrap">
        <nav>
            <a href="?logout=1"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
            <!-- <a href="avaleht.html" id="close" class="closebtn"><i class="fas fa-times-circle"></i></a> -->
            <a href="#" id="h"><i class="fas fa-question-circle"></i></a>
        </nav>
      <h2>Mängu loomine</h2>
      <!-- <div>
          <h4>Küsimused:</h4>
      </div> -->

      <div class="questions">
        <p>
        <span>1. Mängid koos sõpradega arvutis ja avaneb aken: “Kliki siia ja võida miljon eurot!”. Mida teed?</span>
        <li>Klikin lingil, et täpsemalt uurida</li>
        <li>Küsin sõpradelt, mida teha</li>
        <li>Sulgen akna ja mängin sõpradega edasi (ÕIGE)</li>
        </p>

        <p>
        <span>2. Kas veebis avaldatud pilti on võimalik kustutada?</span>
        <li>Jah, alati.</li>
        <li>Ei ole. (ÕIGE)</li>
        <li>Pole teada.</li>
        </p>

        <p>
        <span>3. Kas internetist leitud pilte võib sotsiaalmeedias vabalt avaldada?</span>
        <li>Võib kui piltide omanik seda lubab (ÕIGE)</li>
        <li>Ei või mitte kunagi.</li>
        <li>Internetis võib kõike vabalt avaldada.</li>
        </p>

        <p>
        <span>4. Kuidas reageerid kui sõber kirjutab sulle Messengeris: “Olen lollakas ja hüppan aknast alla.”?</span>
        <li>Kirjutad vastuseks naeratavad emojid.</li>
        <li>Helistad sõbrale ja uurid, kas see oli ikka tema ise kes kirjutas. (ÕIGE)</li>
        <li>Ignoreerid teda.</li>
        </p>

        <p>
        <span>5. Sõber tahab sinult sinu Facebooki konto parooli saada. Kas annad?</span>
        <li>Kindlasti - ta ju hea sõber!</li>
        <li>Üritad leida viisaka võimaluse keelduda (ÕIGE)</li>
        <li>Annad sõbrale vale parooli.</li>
        </p>

        <p>
        <span>6. Mis funktsioon on arvutis tulemüüril?</span>
        <li>Ei lase võõraid internetist sinu arvutile ligi. (ÕIGE)</li>
        <li>Kaitseb arvutit viiruste eest.</li>
        <li>AJahutab arvutit.</li>
        </p>

        <p>
        <span>7. Milline neist on turvaline salasõna?</span>
        <li>MinuNimiOnKarl123</li>
        <li>Password</li>
        <li>5870wJK446 (ÕIGE)</li>
        </p>

        <p>
        <span>8. Internetis enim levinud suhtlusportaal?</span>
        <li>Instagram</li>
        <li>LinkedIn</li>
        <li>Facebook (ÕIGE)</li>
        </p>

        <p>
        <span>9. Portaal, kus inimesed saavad “säutsuda”?</span>
        <li>Twitter (ÕIGE)</li>
        <li>Facebook</li>
        <li>Snapchat</li>
        </p>

        <p>
        <span>10. Milline järgnevast on tark käitumine internetis?</span>
        <li>Võõrale inimesele enda isikuandmete ja aadressi avaldamine</li>
        <li>Isikuandmete mitteavaldamine (ÕIGE)</li>
        <li>Suvalistele inimestele endast piltide saatmine.</li>
        </p>

        <p>
        <span>11. Keda peaksid lisama sotsiaalvõrgustikes sõprade nimekirja?</span>
        <li>Suvalised inimesed, keda otsingust leiad</li>
        <li>Mingi tüübi, kellega mitu aastat tagasi ühel sünnipäeval korra rääkisid</li>
        <li>Inimesi, keda päriselt tunned (ÕIGE)</li>
        </p>

        <p>
        <span>12. Milliseid ekraanilukke on võimalik nutitelefonile peale panna?</span>
        <li>Kood, muster, sõrmejälg (ÕIGE)</li>
        <li>Sõrmejälg, lihtne avamine ühe nupu abil</li>
        <li>Kood, muster, lihtne avamine ühe nupu abil</li>
        </p>

        <p>
        <span>13. Milline neist on usaldusväärne pood rakenduste allalaadimiseks?</span>
        <li>Aliexpress.com</li>
        <li>Google Play (ÕIGE)</li>
        <li>Ebay</li>
        </p>

        <p>
        <span>14. Miks pole soovitatav kasutada paroolita WIFI võrke?</span>
        <li>Need on liiga turvalised</li>
        <li>Need tavaliselt ei tööta</li>
        <li>Need ei ole sama turvalised kui parooliga võrgud (ÕIGE)</li>
        </p>

        <p>
        <span>15. Milline neist tunnustest viitab küberkiusamisele?</span>
        <li>Ähvardavad, õelad e-kirjad ja tekstisõnumid (ÕIGE)</li>
        <li>Sõbralikult sotsiaalmeedias pildi kommenteerimine</li>
        <li>Luba küsimine enne sinu pildi jagamist</li>
        </p>
      
      </div>
	  <div id="codedisplay">
		<?php

			if(isset($_POST['lookood'])) { 

			$myfile = fopen("code.txt", "w") or die("Unable to open file!");
			$txt = $randomNum;
			fwrite($myfile, $txt);
			fclose($myfile);
			echo "<h2> " .$randomNum . "</h2>"; 

			} 
		?> 
    </div>
	<div id="userbuttons">  
    <form action="" method="post"> 
        <input id="gamecode" type="submit" name="lookood"
                value="Loo kood"/>    
        
	  </form> 
    <a href="tulemused.php" target="_blank"><button id="resultbtn">Tulemused</button></a> 
  </div>
      </div>
    </div>
  </body>
</html>

</body>
</html>