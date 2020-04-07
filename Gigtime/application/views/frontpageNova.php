<html>
    <head>
        <title> GigTime </title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        
        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url('css/Footer-white.css'); ?>">
        
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/frontpageNova.css'); ?>">
    </head>
    <body>
        <div class="container">
            <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
                <span class="navbar-brand">GigTime</span>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url('user/login_view'); ?>">Sing In<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url('user/userRole_view'); ?>">Register</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        
        <center>
        <div class="parallax">
            <div class="row h-100">
                <div class="col-sm-12 my-auto">
                    <div class="banner w-20 mx-auto">Welcome To GigTime</div>
                </div>
            </div>
        </div>
        
        <div class="container ozadje col-12">
            <div>
                <h3 class="scroll">Scroll down</h3>
            </div>
            <div class="row">
                <div class="tekst col-6">
                    <h1>Concert map</h1>
                    <p>Discover new concerts that are happening all around the globe.</p>
                </div>
                <div class="col-6">
                    <img src="<?php echo base_url('images/zemljevid.png'); ?>" class="slika"/>
                </div>
            </div>
            <div class="row">
                <div class="tekst col-6">
                    <h1>Show keeper</h1>
                    <p>Keep track of when and where your concerts are happening.</p>
                </div>
                <div class="col-6">
                    <img src="<?php echo base_url('images/seznam.png'); ?>" class="slika"/>
                </div>
            </div>
            <div class="row">
                <div class="tekst col-6">
                    <h1>Discover new artists</h1>
                    <p>Find new music from artists you've never heard of.</p>
                </div>
                <div class="col-6">
                    <img src="<?php echo base_url('images/kitaraBarvasta.png'); ?>" class="slika"/>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <h3>Sign up today!</h3>
                    <img src="<?php echo base_url('images/puscica.png'); ?>" class="slika"/>
                    <br>
                    <a href="<?php echo site_url('user/registration_view'); ?>" class="knof">Sign up here</a>
                </div>
            </div>
        </div>
        </center>
        
        
        <footer id="myFooter">
            <div class="footer-social">
                <div class="container">
                    <ul>

                        <li><a href="#">Company Information</a></li>
                        <li><a href="#">Contact us</a></li>
                        <li><a href="#">Reviews</a></li>
                        <li><a href="#">Terms of service</a></li>

                    </ul>
                    <p class="footer-copyright">© 2019 GigTime</p>
                </div>
                
                <a href="#" class="social-icons"><i class="fa fa-facebook"></i></a>
                <a href="#" class="social-icons"><i class="fa fa-instagram"></i></a>
                <a href="#" class="social-icons"><i class="fa fa-twitter"></i></a>
            </div>
        </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     
        
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    </body>
</html>


<!--footer 1 : https://bootsnipp.com/snippets/84kpo-->