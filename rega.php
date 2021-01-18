<?php
  require("functions_main.php");
    
  $notice = "";
  $eesnimi = "";
  $perenimi = "";
  $email = "";

  //muutujad võimalike veateadetega
  $eesnimiError = "";
  $perenimiError = "";
  $emailError = "";
  $paroolError = "";
  $confirmpasswordError = "";
  
  //kui on uue kasutaja loomise nuppu vajutatud
  if(isset($_POST["submitUserData"])){
  
  if (isset($_POST["eesnimi"]) and !empty($_POST["eesnimi"])){
	$eesnimi = test_input($_POST["eesnimi"]);
  } else {
	  $eesnimiError = "Palun sisesta eesnimi!";
  }
  
  if (isset($_POST["perenimi"]) and !empty($_POST["perenimi"])){
	$perenimi = test_input($_POST["perenimi"]);
  } else {
	  $perenimiError = "Palun sisesta perekonnanimi!";
  }

  if (isset($_POST["email"]) and !empty($_POST["email"])){
	//$name = $_POST["firstName"];
	$email = test_input($_POST["email"]);
  } else {
	  $emailError = "Palun sisesta e-postiaadress!";
  }
  
  if (!isset($_POST["parool"]) or empty($_POST["parool"])){
	$paroolError = "Palun sisesta salasõna!";
  } else {
	  if(strlen($_POST["parool"]) < 8){
		  $paroolError = "Liiga lühike salasõna (sisestasite ainult " .strlen($_POST["parool"]) ." märki).";
	  }
  }
  
  if (!isset($_POST["confirmpassword"]) or empty($_POST["confirmpassword"])){
	$confirmpasswordError = "Palun sisestage salasõna kaks korda!";  
  } else {
	  if($_POST["confirmpassword"] != $_POST["parool"]){
		  $confirmpasswordError = "Sisestatud salasõnad ei olnud ühesugused!";
	  }
  }
  
  if(empty($eesnimiError) and empty($perenimiError) and empty($emailError) and empty($paroolError) and empty($confirmpasswordError)){
	  $notice = signup($eesnimi, $perenimi, $email, $_POST["parool"] );
  }

    //header("Location: login.php"); and header('Location: login.php')
    //exit;
  }//kui on nuppu vajutatud - lõppeb

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
    <title>Digiseiklus</title>
  </head>
  <body>                     
    <div id="sidenav" class="sidenav">
        <div class="sidewrap">
            <a href="#" id="close" class="closebtn"><i class="fas fa-times-circle"></i></a>
            <div id="help">
                <h2>Info</h2>
                <p>
                Oled jõudnud õpetaja sisselogimise lehele. Siin saad oma e-posti aadressi ja parooli abiga õpetajate lehele sisse logida. Kui sul ei ole veel kasutajat, siis loo kasutaja vajutades nupule “Loo kasutaja”.
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
            <!-- <a href="#" id="color"><i class="fas fa-palette"></i></a>
            <a href="#" id="u"><i class="fas fa-user-circle"></i></a> -->
            <a href="avaleht.php"><i class="fas fa-home"></i></a>
            <a href="#" id="h"><i class="fas fa-question-circle"></i></a>
        </nav>
      <!-- <h1>Digiseiklus</h1>
        <div>
          <button class="teach">Õpetaja</button>
          <button>Õpilane</button>
        </div> -->
        <div id="user">
            <h2>Kasutaja loomine</h2>
            <form name="submitform" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <label for="fname">Eesnimi:</label><br />
                <input required name="eesnimi" type="text" value="<?php echo $eesnimi; ?>"><span><?php echo $eesnimiError; ?></span><br>
                <label for="lname">Perekonnanimi:</label><br />
                <input name="perenimi" type="text" value="<?php echo $perenimi; ?>"><span><?php echo $perenimiError; ?></span><br>
                <label for="email">E-post (kasutajatunnus):</label><br />
                <input type="text" name="email" required value="<?php echo $email; ?>"><span><?php echo $emailError; ?></span><br>
                <label for="code">Salasõna (min 8 tähemärki):</label><br />
                <input name="parool" type="password"><span><?php echo $paroolError; ?></span><br>
                <label for="code">Korrake salasõna:</label><br />
                <input name="confirmpassword" type="password"><span><?php echo $confirmpasswordError; ?></span><br>
                <input name="submitUserData" type="submit" value="Loo kasutaja"><span><?php echo $notice; ?></span>
              </form> 
        </div> 
        
      </div>
    </div>
  </body>
</html>
