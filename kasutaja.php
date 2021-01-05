<?php 
   
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
                    The rabbit-hole went straight on like a tunnel for some way, and then dipped suddenly down, so suddenly that Alice had not a moment to think about stopping herself before she found herself falling down a very deep well.
                </p>
            </div>         
        </div>
    </div>
    <div id="scene">
      <div data-depth="0.3" >
        <img src="img/Taust.png" width="100%" height="auto">
      </div>
    </div>
    <div class="wrap">
        <nav>
            <!-- <a href="avaleht.html" id="close" class="closebtn"><i class="fas fa-times-circle"></i></a> -->
            <a href="#" id="h"><i class="fas fa-question-circle"></i></a>
        </nav>
      <h2>Mängu loomine</h2>
      <!-- <div>
          <h4>Küsimused:</h4>
      </div> -->

      <div class="questions">
        <p>
        The rabbit-hole went straight on like a tunnel for some way, and then dipped suddenly down, so suddenly that Alice had not a moment to think about stopping herself before she found herself falling down a very deep well.
      </p>
      <p>
        The rabbit-hole went straight on like a tunnel for some way, and then dipped suddenly down, so suddenly that Alice had not a moment to think about stopping herself before she found herself falling down a very deep well.
      </p>
      <p>
        The rabbit-hole went straight on like a tunnel for some way, and then dipped suddenly down, so suddenly that Alice had not a moment to think about stopping herself before she found herself falling down a very deep well.
      </p>
      </div>
	  
		<?php

			if(isset($_POST['lookood'])) { 

			$myfile = fopen("code.txt", "w") or die("Unable to open file!");
			$txt = $randomNum;
			fwrite($myfile, $txt);
			fclose($myfile);
			echo "<h2> " .$randomNum . "</h2>"; 

			} 
		?> 
	  
  <form action="" method="post"> 
        <input type="submit" name="lookood"
                value="Loo kood"/>    
        
	</form> 
  <a href="tulemused.php" target="_blank" id="resultbtn"><button>Tulemused</button></a> 
      </div>
    </div>
  </body>
</html>

</body>
</html>