<html>
    <head>
        <?php foreach($venue as $venue_item): ?>
        <title>GigTime | <?php echo $venue_item['user_name']; ?></title>
        <?php endforeach; ?>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/venueProfile.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/dropdown.css'); ?>">

        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <div class="container">
            <?php include 'header.php'; ?> 
            
            <div id="map"></div>
            
            <div class="ozadje">
                <div class="levo">
                    <?php foreach($venue as $venue_item): ?>
                    <h1><?php echo $venue_item['user_name']; ?></h1>

                    <h2>Naslov: <?php echo $venue_item['location']; ?></h2>

                    <h3>Kapaciteta: <?php echo $venue_item['size']; ?></h3>

                    <h3>Na prostem/prostor: <?php if($venue_item['indoor']=='0'){ echo "Na prostem"; } else if($venue_item['indoor']=='1'){ echo "V prostoru";}else{ echo "Oboje";} ?></h3>

                    <div class="opis">
                        <label for="desc">Opis prizorišča</label>
                        <textarea class="form-control" id="desc" name="desc" readonly><?php echo $venue_item['description']; ?></textarea>
                    </div>

                    <label for="contact">Kontaktne informacije</label>
                        <textarea id="contact" class="form-control" name="contact" placeholder="Vnesi kontaktne informacije" readonly><?php echo $venue_item['contactVenue']; ?></textarea>
                    <?php endforeach; ?>
                </div>
                
                <div class="desno">
                    <center>
                        
                        
                        
                        <?php foreach($venue as $venue_item):
                        if($venue_item['user_picture']) { ?>
                            <img src="<?php echo base_url('uploads/'.$venue_item['user_picture']); ?>" class="profilka"/>
                        <?php 
                            }
                            else { 
                        ?>
                            <img src="<?php echo base_url('images/defaultProfile.jpg'); ?>" class="defaultprofilka" />
                        <?php
                            }
                        endforeach; ?>
                    </center>
                </div>
                
                <h2>Slike prizorišča</h2>
                    <div class="slike">
                    <?php foreach($images as $image): ?>
                        <div class="responsive">
                            <div class="gallery">
                                <a target="_blank" href="<?php echo base_url('uploads/pictures/'.$image['picture_filename']); ?>">
                                    <center><img src="<?php echo base_url('uploads/pictures/'.$image['picture_filename']); ?>"></center>
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
            </div>
        </div>
        
        
        
        
        
        
        
        
        
        
        
        
        
        <script>
                function initMap() {
                    
                    var arr = <?php echo json_encode($venue); ?>;
                    
                    var myLatLng = {lat: parseFloat(arr[0].lat), lng: parseFloat(arr[0].lng)};

                    var map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 15,
                        center: myLatLng
                    });


                    var marker = new google.maps.Marker({position: myLatLng, map: map});   
                        
                    google.maps.event.addListener(marker, 'click', getInfoCallback(map, contentString));
                        
                    
                    
                    
                    //odpre se infowindow
                    function getInfoCallback(map, content) {
                        var infowindow = new google.maps.InfoWindow({content: content});
                        return function() {
                            infowindow.close();
                            infowindow.setContent(content); 
                            infowindow.open(map, this);
                        };
                    }
                    
                }
            </script>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC5kE3PjFpshQzI1eH_isjZq3tPGF-4Vq0&libraries=places&callback=initMap"></script>
    </body>
</html>
    