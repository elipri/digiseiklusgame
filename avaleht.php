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
                Tere tulemast Digiseikluse mängurakenduse avalehele! 
                </p>
                <p>Kui oled õpetaja, vajuta nupule “Õpetaja” ning Sind suunatakse edasi õpetaja lehele sisselogimise lehele. 
                Õpetaja leht võimaldab genereerida mängu alustamiseks vajaliku koodi.</p>
                <p>
                Kui oled õpilane, vajuta nupule “Õpilane” ning Sind suunatakse edasi õpilase lehele, kus on võimalik sisestada õpetaja genereeritud kood, millega mängu alustada. 
                Mängurakendus töötab Chrome ja Firefox veebilehitsejatega. Digiseiklus mängurakendus ei toimi mobiilil.

                </p>
            </div>         
        </div>
    </div>
    <div id="scene">
      <div data-depth="0.3" > 
        <img src="img/Taust.png" width="100%" height="auto">
      </div>
      <div data-depth="0.3">
        <span class="dot dot1"></span>
      </div>
      <div data-depth="0.3">
        <span class="dot dot2"></span>
      </div>
      <div data-depth="0.3">
        <span class="dot dot3"></span>
      </div>
      <div data-depth="0.3">
        <span class="dot dot4"></span>
      </div>
    </div>
    <div class="wrap">
        <nav>
            <!-- <a href="#" id="color"><i class="fas fa-palette"></i></a>
            <a href="#" id="u"><i class="fas fa-user-circle"></i></a> -->
            <a href="#" id="h"><i class="fas fa-question-circle"></i></a>
        </nav>
      <h1>Digiseiklus</h1>
        <div>
          <a href="login.php"><button>Õpetaja</button></a>
          <span class="chippy"></span>
          <a href="/ver1/mäng"><button class="student" id="student">Õpilane</button></a>
        </div>
        
      </div>
    </div>
  </body>
</html>
