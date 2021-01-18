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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.debug.js"></script>
    <script src="js/sidenav.js"></script>
    <title>Tulemused</title>
  </head>
  <body>                        
    <div id="sidenav" class="sidenav">
        <div class="sidewrap">
            <a href="javascript:void(0)" id="close" class="closebtn"><i class="fas fa-times-circle"></i></a>
            <div id="help">
                <h2>Info</h2>
                <p>
                Tere tulemast Digiseikluse mängurakenduse tulemuste lehele!</p><p> Siin lehel on järjestatud paremusjärjestusena mängutulemused. Samuti on võimalik tulemusi PDF formaadis alla laadida või tulemuste lehte printida.
                </p>
            </div>         
        </div>
    </div>
    <div id="scene">
      <div data-depth="0.3" >
        <img src="img/Taust.png">
      </div>
      <!-- <div data-depth="0.3">
        <span class="dot dot1"></span>
      </div>
      <div data-depth="0.3">
        <span class="dot dot2"></span>
      </div> -->
    </div>
    <div class="wrap">
        <nav>
            <!-- <a href="#" id="color"><i class="fas fa-palette"></i></a> -->
            <a href="avaleht.php"><i class="fas fa-home"></i></a>
            <a href="#" id="p"><i class="fas fa-print"></i></a>
            <a href="#" id="d"><i class="fa fa-arrow-circle-down" aria-hidden="true"></i></a>
            <a href="#" id="h"><i class="fas fa-question-circle"></i></a>
        </nav>
        <h2>Tulemused</h2>
        <div class="squares">
          <div class="square s1"><span id="second">*</span></div>
          <div class="square s2"><i class="fa fa-star" aria-hidden="true"></i>
            <div class="firstplace">
              <span id="first">*</span>
            </div>
          </div>
          <div class="square s3"><span id="third">*</span></div>
        </div>
        <div class="resultlist">
         
        <ol class="numlist" id="responsecontainer">
          
        </ol>
         
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
      $(document).ready(function(){
        setInterval(() => {
          $('#responsecontainer').load("https://digiseiklus.digikapp.ee/ver1/tulemused3.php");
        }, 1000);
      });   
    </script>
  </body>
</html>

</body>
</html>