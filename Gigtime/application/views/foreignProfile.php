<html>
    <head>
        <?php foreach($user as $user_item): ?>
        <title>GigTime | <?php echo $user_item['user_name']; ?></title>
        <?php endforeach; ?>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/foreignProfile.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/dropdown.css'); ?>">

        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <div class="container">
            <?php include 'header.php'; ?>
            
            <div>
            <div class="levo">
                <?php foreach($user as $user_item): ?> 
                <div class="slika">
                   
                        <img src="<?php echo base_url("uploads/".$user_item['user_picture']); ?>" class="profilka"/>
                
                </div>
                <h1><?php echo $user_item['user_name']; ?></h1>
                <p>
                    Žanr: <?php echo $user_item['zanr1']; if($user_item['zanr2'] != ''){ echo ', '.$user_item['zanr2'];} ?><br>
                    Facebook: <a href="<?php echo $user_item['fb']; ?>"><?php echo $user_item['fb']; ?></a><br>
                    YouTube: <a href="<?php echo $user_item['yt']; ?>"><?php echo $user_item['yt']; ?></a><br>
                    Instagram: <a href="<?php echo $user_item['insta']; ?>"><?php echo $user_item['insta']; ?></a><br>
                    Spletna stran: <a href="<?php echo $user_item['website']; ?>"><?php echo $user_item['website']; ?></a><br>
                </p>
                <?php endforeach; ?>
            </div>
            </div>
            <div class="feed">
                
                
                <ul class="nav nav-tabs">
                  <li class="nav-item active">
                    <a class="nav-link active" data-toggle="tab" href="#koncerti">Koncerti</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#zgodba">Naša zgodba</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#slike">Slike</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#preteklikoncerti">Pretekli konceti</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#kontakt">Kontakt</a>
                  </li>
                </ul>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade in active show" id="koncerti">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">
                                        Dogodek
                                    </th>
                                    <th scope="col">
                                        Organizator
                                    </th>
                                    <th scope="col">
                                        Datum
                                    </th>
                                    <th scope="col">
                                        Mesto, Država
                                    </th>
                                    <th scope="col">
                                        Čas Začetka
                                    </th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($concerts as $concert_item): ?>
                                <tr>
                                    <div>
                                        <td class="imeBenda">
                                            <!--
                                            <?php $ime = str_replace(' ', '.', $concert_item['user_name']); ?>
                                            <a href="<?php echo site_url('user/bandProfile/'.$ime);?>"><?php echo $concert_item['user_name']; ?></a>
                                            -->

                                            <?php echo $concert_item['name']; ?>
                                        </td>
                                    </div>
                                    <td>
                                        <?php echo $concert_item['user_name']; ?>
                                    </td>
                                    <td>
                                        <?php echo $concert_item['date']; ?>
                                    </td>
                                    <td>
                                        <?php echo $concert_item['city'].", ".$concert_item['country']; ?>
                                    </td>
                                    <td>
                                        <?php echo $concert_item['time']; ?>
                                    </td>
                                    <td>
                                        <form method="post" action="<?php echo site_url('user/seeLocationOnMap'); ?>">
                                            <input type="hidden" name="concertId" value="<?php echo $concert_item['concert_id']; ?>" />
                                            <input class="onMap btn btn-info" type="submit" value="Lokacija na zemljevidu">
                                        </form>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    
                    <?php foreach($user as $user_item): ?>
                    <div class="tab-pane fade show" id="zgodba">
                        <textarea readonly id="zgodbaTekst"><?php echo $user_item['description']; ?></textarea>
                    </div>
                    <?php endforeach; ?>
                    
                    <div class="tab-pane fade show" id="slike">
                        <?php foreach($images as $image): ?>
                        <div class="responsive">
                            <div class="gallery">
                                <a target="_blank" href="<?php echo base_url('uploads/pictures/'.$image['picture_filename']); ?>">
                                    <img src="<?php echo base_url('uploads/pictures/'.$image['picture_filename']); ?>">
                                </a>
                                <div class="desc"><?php echo $image['imgDesc']; ?></div>
                                
                                <?php if($image['imgDate']!= '0000-00-00'){ ?>
                                <div class="imgDate"><?php echo $image['imgDate']; ?></div>
                                <?php }else{ ?>
                                <div></div><?php }; ?>
                            </div>
                        </div>
                         <?php endforeach; ?>
                    </div>
                    
                    <div class="tab-pane fade show" id="preteklikoncerti">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">
                                        Dogodek
                                    </th>
                                    <th scope="col">
                                        Organizator
                                    </th>
                                    <th scope="col">
                                        Datum
                                    </th>
                                    <th scope="col">
                                        Mesto, Država
                                    </th>
                                    <th scope="col">
                                        Čas Začetka
                                    </th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($pastConcerts as $pastConcert_item): ?>
                                <tr>
                                    <div>
                                        <td class="imeBenda">
                                            <!--
                                            <?php $ime = str_replace(' ', '.', $pastConcert_item['user_name']); ?>
                                            <a href="<?php echo site_url('user/bandProfile/'.$ime);?>"><?php echo $pastConcert_item['user_name']; ?></a>
                                            -->

                                            <?php echo $pastConcert_item['name']; ?>
                                        </td>
                                    </div>
                                    <td>
                                        <?php echo $pastConcert_item['user_name']; ?>
                                    </td>
                                    <td>
                                        <?php echo $pastConcert_item['date']; ?>
                                    </td>
                                    <td>
                                        <?php echo $pastConcert_item['city'].", ".$pastConcert_item['country']; ?>
                                    </td>
                                    <td>
                                        <?php echo $pastConcert_item['time']; ?>
                                    </td>
                                    <td>
                                        <form method="post" action="<?php echo site_url('user/seeLocationOnMap'); ?>">
                                            <input type="hidden" name="concertId" value="<?php echo $pastConcert_item['concert_id']; ?>" />
                                            <input class="onMap btn btn-info" type="submit" value="Lokacija na zemljevidu">
                                        </form>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="tab-pane fade show" id="kontakt">
                        <?php foreach ($user as $user_item): ?>
                        <textarea readonly id="zgodbaTekst"><?php echo $user_item['contact'] ?></textarea>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div> 
        </div>
    </body>
</html>
    