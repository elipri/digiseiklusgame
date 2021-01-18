<?php
	require("functions_main.php");
	
	  $notice = "";
	  $email = "";
	  $emailError = "";
	  $paroolError = "";
	  
	  if(isset($_POST["login"])){
			if (isset($_POST["email"]) and !empty($_POST["email"])){
			  $email = test_input($_POST["email"]);
			} else {
			  $emailError = "Palun sisesta kasutajatunnusena e-posti aadress!";
			}
		  
			if (!isset($_POST["password"]) or strlen($_POST["password"]) < 8){
			  $paroolError = "Palun sisesta parool, vähemalt 8 märki!";
			}
		  
		  if(empty($emailError) and empty($paroolError)){
			 $notice = signin($email, $_POST["password"]);
			 } else {
			  $notice = "Ei saa sisse logida!";
		  }
	  }
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
            <h2>Õpetajale</h2>
                <form method="POST" name="login" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <label for="email">E-posti aadress:</label><br />
                    <input type="text" id="email" name="email" value="<?php echo $email; ?>"><span><?php echo $emailError; ?></span><br />
                    <label for="password">Salasõna:</label><br />
                    <input type="password" id="password" name="password" type="password"><span><?php echo $paroolError; ?></span> <br />
                    <a href="rega.php">Loo kasutaja</a>
                    <!-- <input type="submit" formaction="" id="create" value="Parool ununes?" class="create" /> -->
                    <input type="submit" id="login" name="login" value="Sisene" />
					
                 
                </form>

				  
        </div> 
        
      </div>
    </div>
  </body>
</html>
