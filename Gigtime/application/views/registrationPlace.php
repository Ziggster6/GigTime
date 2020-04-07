<html>
    <head>
        <title> GigTime | Register </title>
        
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
                    <h1>Registriraj se</h1>
                    
                    
                    <?php
                        $error_msg=$this->session->flashdata('error_msg');
                        if($error_msg){
                            echo $error_msg;
                        }
                    ?>

                    
                    <form role="form" method="post" action="<?php echo site_url('user/register_user'); ?>" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="text" name="user_name" class="form-control" placeholder="Uporabniško ime *" value="" required/>
                        </div>
                        <div class="form-group">
                            <input type="text" name="user_email" class="form-control" placeholder="E-pošta *" value="" required/>
                        </div>
                        <div class="form-group">
                            <input type="password" name="user_password" class="form-control" placeholder="Geslo *" value="" required/>
                        </div>
                        <div class="form-group slika">
                            <label for="slika" id="label">Dodaj profilno sliko *</label>
                            <input type="file" class="form-control" name="userfile" size="20" id="userfile" required/>
                        </div>
                        <input type="hidden" value="2" name="user_role">
                        <div class="form-group">
                            <label for="button">Podatke o prizorišču si lahko po registraciji urediš na zavihku "Moj profil"</label>
                            <input type="submit" class="btnSubmit" value="Potrdi" />
                        </div>
                        <div class="form-group">
                            <a href="<?php echo site_url('user/login_view'); ?>" class="ForgetPwd">Si že registriran? Klikni za prijavo.</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>