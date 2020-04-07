<html>
    <head>
        <title> GigTime | Login </title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        
        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url('css/Footer-white.css'); ?>">
        
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/loginNov.css'); ?>">
    </head>
    <body>
        <div class="container login-container">
            <div class="row">
                <div class="col-md-12 login-form-1">
                    <h1>Prijavi se</h1>
                    
                    <div class="napaka"><?php echo $error; ?></div>
                    
                    <form method="post" action="<?php echo site_url('user/login'); ?>">
                        <div class="form-group">
                            <input type="text" name="email" class="form-control" placeholder="Your Email *" value="" required/>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Your Password *" value="" required/>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btnSubmit" value="Login" name="login" />
                        </div>
                        <div class="form-group">
                            <a href="<?php echo site_url('user/userRole_view'); ?>" class="ForgetPwd">Še nimaš računa? Registriraj se tukaj.</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>