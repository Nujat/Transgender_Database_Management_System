<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Home</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="icon" href="tab.png">

        <!-- Styles -->
        <style>

            * { cursor: url(glows.cur),default; }
            html, body {
                background-color: #fff;
                
                background-image: url("d.jpg");

                color: #ffffff;
                font-family: '', cursive;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #ffffff;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .fade-in{
                animation: fadeIn 4s;
            }

            @keyframes fadeIn
            {
                from
                {
                    opacity: 0;
                }
                to
                {
                    opacity: 1;
                }
            }



.bt4 {border-radius: 12px;}

.dropbtn {
  background-color: #3498DB;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
  margin-right: 20px;
}

.dropbtn:hover, .dropbtn:focus {
  background-color: #2980B9;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  overflow: auto;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown a:hover {background-color: #ddd;}

.show {display: block;}





.buttong {
  background-color: #004A7F;
  -webkit-border-radius: 10px;
  border-radius: 10px;
  border: none;
  color: #FFFFFF;
  cursor: pointer;
  display: inline-block;
  font-family: Arial;
  font-size: 20px;
  padding: 5px 10px;
  text-align: center;
  text-decoration: none;
  -webkit-animation: glowing 1500ms infinite;
  -moz-animation: glowing 1500ms infinite;
  -o-animation: glowing 1500ms infinite;
  animation: glowing 1500ms infinite;
}
@-webkit-keyframes glowing {
  0% { background-color: #B20000; -webkit-box-shadow: 0 0 3px #B20000; }
  50% { background-color: #FF0000; -webkit-box-shadow: 0 0 40px #FF0000; }
  100% { background-color: #B20000; -webkit-box-shadow: 0 0 3px #B20000; }
}

@-moz-keyframes glowing {
  0% { background-color: #B20000; -moz-box-shadow: 0 0 3px #B20000; }
  50% { background-color: #FF0000; -moz-box-shadow: 0 0 40px #FF0000; }
  100% { background-color: #B20000; -moz-box-shadow: 0 0 3px #B20000; }
}

@-o-keyframes glowing {
  0% { background-color: #B20000; box-shadow: 0 0 3px #B20000; }
  50% { background-color: #FF0000; box-shadow: 0 0 40px #FF0000; }
  100% { background-color: #B20000; box-shadow: 0 0 3px #B20000; }
}

@keyframes glowing {
  0% { background-color: #B20000; box-shadow: 0 0 3px #B20000; }
  50% { background-color: #FF0000; box-shadow: 0 0 40px #FF0000; }
  100% { background-color: #B20000; box-shadow: 0 0 3px #B20000; }
}





/* scrolling text */


.example1 {
 height: 60px;  
 overflow: hidden;
 position: relative;
}
.example1 h4 {
 font-size: 3em;
 color: yellow;
 position: absolute;
 width: 80%;
 height: 80%;
 margin: 0;
 line-height: 50px;
 text-align: center;
 /* Starting position */
 -moz-transform:translateX(100%);
 -webkit-transform:translateX(100%);    
 transform:translateX(100%);
 /* Apply animation to this element */  
 -moz-animation: example1 15s linear infinite;
 -webkit-animation: example1 15s linear infinite;
 animation: example1 15s linear infinite;
}
/* Move it (define the animation) */
@-moz-keyframes example1 {
 0%   { -moz-transform: translateX(100%); }
 100% { -moz-transform: translateX(-100%); }
}
@-webkit-keyframes example1 {
 0%   { -webkit-transform: translateX(100%); }
 100% { -webkit-transform: translateX(-100%); }
}
@keyframes example1 {
 0%   { 
 -moz-transform: translateX(100%); /* Firefox bug fix */
 -webkit-transform: translateX(100%); /* Firefox bug fix */
 transform: translateX(100%);       
 }
 100% { 
 -moz-transform: translateX(-100%); /* Firefox bug fix */
 -webkit-transform: translateX(-100%); /* Firefox bug fix */
 transform: translateX(-100%); 
 }
}




        </style>
    </head>
    <body>
      <br>
        <h3 align="right"> @Developed by Epty,Nujat,Ajmir,Jhumu,Humaira </h3>
        <div class="flex-center position-ref full-height fade-in">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
            	
                <div class="title m-b-md">
                    Transgender Database Management System
                </div>

                <div class="links">
                  
                    
                    <a href="com.php">Law & Actions</a>
                   
                    <a href="viewStory.php">view Stories</a>
                    <a href="event.php"><button class="buttong">Events(new)</button></a>
                

 <div class="dropdown">
                    
<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunctiodf() {
  document.getElementById("myDropdof").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
 </div>







                   <div class="dropdown">
                    <button onclick="myFunctiod()" class="dropbtn bt4">Education</button>
                    <div id="myDropdo" class="dropdown-content">
                    <a href="diploma.php">Diploma Degree</a>
                    <a href="edu.php">MSC. Student</a>
                    
                    </div>
<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunctiod() {
  document.getElementById("myDropdo").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
 </div>





                   <div class="dropdown">
                    <button onclick="myFunctio()" class="dropbtn bt4">Community</button>
                    <div id="myDropdow" class="dropdown-content">
                    <a href="adlogin.html">Login</a>
                    <a href="scriptDemo.php">See Employees</a>
                    </div>
<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunctio() {
  document.getElementById("myDropdow").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
 </div>


                    
                    <div class="dropdown">
                    <button onclick="myFunction()" class="dropbtn bt4">Login</button>
                    <div id="myDropdown" class="dropdown-content">
                    <a href="loginar.html">Login</a>
                    <a href="register.html">Create Account</a>
                    </div>
<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>







                </div>

                </div>  

                        <div class="example1">
<a href="ongoing.php"><h4>New project is starting soon.... </h4></a>
</div>
            </div>
        </div>

         <div class="section">

        <h1>Change for the Equalities</h1>

        <div class="video-container">
            <div class="color-overlay"></div>
            <video autoplay loop muted>

                <source src="video3.mp4" type="video/mp4" >
            </video>
        </div>
    </body>
</html>
