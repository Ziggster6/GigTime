<html>
    <head>
        <link href="https://fonts.googleapis.com/css?family=Work+Sans" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/userRole.css'); ?>">
        
        <title>GigTime | Register</title>
    </head>
    <body>
        <div class="container">
            <div class="vprasanje">
                <h1>Registriraj se kot...?</h1>
            </div>
            <div class="izbiri">
                <a href="<?php echo site_url('user/bandRegistration_view'); ?>">
                    <div class="levo">
                        <div class="text">
                            <h1 class="izbira">Band</h1>
                        </div>
                    </div>
                </a>
                <a href="<?php echo site_url('user/registration_view'); ?>">
                    <div class="desno">
                        <div class="text">
                            <h1 class="izbira">Prireditelj koncertov</h1>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </body>
</html>