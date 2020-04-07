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
                    <h1>Register</h1>
                    
                    <?php
                        $error_msg=$this->session->flashdata('error_msg');
                        if($error_msg){
                            echo $error_msg;
                        }
                    ?>
                    
                    <form role="form" method="post" action="<?php echo site_url('user/register_user'); ?>" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="text" name="user_name" class="form-control" placeholder="Ime benda *" value="" required/>
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
                        <div class="form-group zanr">
                            <label for="zanr" id="label">Izberi žanr(a) vaše skupine</label>
                            <select class="form-control" id="exampleSelect2" name="zanr1">
                                <option></option>
                                <option>Rock</option>
                                <option>Rock 'n Roll</option>
                                <option>Hard Rock</option>
                                <option>Punk</option>
                                <option>Punk Rock</option>
                                <option>Pop Punk</option>
                                <option>Metal</option>
                                <option>Death Metal</option>
                                <option>Black Metal</option>
                                <option>Grunge</option>
                                <option>Tribute Band</option>
                                <option>Cover Band</option>
                                <option>Pop</option>
                                <option>Rap</option>
                                <option>Other</option>
                            </select>
                            <select class="form-control" id="exampleSelect2" name="zanr2">
                                <option></option>
                                <option>Rock</option>
                                <option>Rock 'n Roll</option>
                                <option>Hard Rock</option>
                                <option>Punk</option>
                                <option>Punk Rock</option>
                                <option>Metal</option>
                                <option>Death Metal</option>
                                <option>Black Metal</option>
                                <option>Grunge</option>
                                <option>Tribute Band</option>
                                <option>Cover Band</option>
                                <option>Pop</option>
                                <option>Rap</option>
                                <option>Other</option>
                            </select>
                        </div>
                        <input type="hidden" value="1" name="user_role">
                        <div class="form-group">
                            <input type="submit" class="btnSubmit" value="Potrdi" />
                        </div>
                        <div class="form-group">
                            <a href="<?php echo site_url('user/login_view'); ?>" class="ForgetPwd">Ste že registrirani? Kliknite za prijavo.</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>