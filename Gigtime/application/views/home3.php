<html>
    <head>
        <title>GigTime | Main</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/home3.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/dropdown.css'); ?>">
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <?php include 'header.php'; ?>
        <div class="container">
            <div class="levo">
                <ul class="nav nav-tabs">
                    <li class="nav-item active">
                        <a class="nav-link active" data-toggle="tab" href="#koncerti">Koncerti</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#izvajalci">Izvajalci</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#prizorisca">Prizorišča</a>
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
                                    <td class="imeBenda">
                                        <?php echo $concert_item['name']; ?>
                                    </td>
                                    <td>
                                        <?php //$ime = str_replace(' ', '.', $concert_item['user_name']); ?>
                                        <!--<a href="<?php //echo site_url('myProfileController/bandProfile/'.$ime);?>"><?php //echo $concert_item['user_name']; ?></a>-->
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
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <div class="gumb">
                            <center><a href="<?php echo site_url('user/vecKoncertov_view'); ?>" class="btn btn-primary">Več koncertov</a></center>
                        </div>
                    </div>
                    <div class="tab-pane fade show" id="izvajalci">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">
                                        Ime Benda
                                    </th>
                                    <th scope="col">
                                        Žanr
                                    </th>
                                    <th scope="col">
                                        Žanr
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($bands as $band_item): ?>
                                <tr>
                                    <td scope="row">
                                        <?php $ime = str_replace(' ', '.', $band_item['user_name']); ?>
                                        <a href="<?php echo site_url('myProfileController/bandProfile/'.$ime);?>"><?php echo $band_item['user_name']; ?></a>
                                    </td>
                                    <td>
                                        <?php echo $band_item['zanr1']; ?>
                                    </td>
                                    <td>
                                        <?php echo $band_item['zanr2']; ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <div class="gumb">
                            <center><a href="<?php echo site_url('user/vecIzvajalcev_view'); ?>" class="btn btn-primary">Več izvajalcev</a></center>
                        </div>
                    </div>
                    <div class="tab-pane fade show" id="prizorisca">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">
                                        Ime prizorišča
                                    </th>
                                    <th scope="col">
                                        Naslov
                                    </th>
                                    <th scope="col">
                                        Žanr
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($venues as $venue_item): ?>
                                <tr>
                                    <td scope="row">
                                        <a href="<?php echo site_url('user/venueProfile/'.$venue_item['venue_id'].'/'.$venue_item['id']);?>"><?php echo $venue_item['user_name']; ?></a>
                                    </td>
                                    <td>
                                        <?php echo $venue_item['location']; ?>
                                    </td>
                                    <td>
                                        <?php echo $venue_item['genre']; ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <div class="gumb">
                            <center><a href="<?php echo site_url('user/vecPrizorisc_view'); ?>" class="btn btn-primary">Več prizorišč</a></center>
                        </div>
                    </div>
                </div>
            </div>
            <div class="desno sticky-top">
                <center><div id="map"></div></center>
            </div>
        </div>
        
        
        
        
        
        
        
        
        
        
            
            <!-- php koda za event sliko v js -->
            <?php #echo base_url('.uploads/eventImages/'.'${picture}')?>
            <!--
            '<div style="width:500px; height:200px;">'+
            `<img src="" style="width:auto; height:200px;">`+
            '</div>'+
            -->
            
            
            <script>
                function initMap() {
                    
                    var arr = <?php echo json_encode($concerts); ?>;

                    for(var i = 0; i<arr.length; i++){
                        var bounds = arr[i].lat + "," + arr[i].lng;   
                    }
                    
                    var myLatLng = {lat: 30, lng: 0};

                    var map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 3,
                        center: myLatLng
                    });
                    
                    
                    for(var i = 0; i<arr.length; i++){
                        if(arr[i].visibility==1){
                            var lat = parseFloat(arr[i].lat);
                            var lng = parseFloat(arr[i].lng);
                            var lokacija = {lat: lat, lng: lng};

                            var picture = arr[i].image;
                            var name = arr[i].name;
                            var bandName = arr[i].user_name
                            var correctBandName = bandName.replace(" ", ".");
                            var city = arr[i].city;
                            var country = arr[i].country;
                            var time = arr[i].time;
                            var date = arr[i].date;
                            var image = arr[i].image;
                            var performers = arr[i].performers;
                            var contentString = '<div style="width:500px; height:400px;">'+
                                                `<h1>${name}</h1>`+
                                                `<h2 style="margin-right:10;">Izvajalci:</h2>`+
                                                `<p style="font-size:20; padding:10;">${performers}</p>`+
                                                `<h3>Podatki o dogodku:</h3>`+
                                                `<ul style="font-size:20;">`+
                                                `<li>Kraj: ${city}</li>`+
                                                `<li>Država: ${country}</li>`+
                                                `<li>Datum: ${date}</li>`+
                                                `<li>Vrata: ${time}</li>`+
                                                `</ul>`+
                                                '</div>'


                            var marker = new google.maps.Marker({position: lokacija, map: map});   
                        
                        google.maps.event.addListener(marker, 'click', getInfoCallback(map, contentString));
                        }
                    }
                    
                    //odpre se infowindow
                    function getInfoCallback(map, content) {
                        var infowindow = new google.maps.InfoWindow({content: content});
                        return function() {
                            infowindow.close();
                            infowindow.setContent(content); 
                            infowindow.open(map, this);
                        };
                    }
                    
                    //search bar predlaga lokacije in prestavi mapo na želeno lokacijo
                    var input = document.getElementById('autocomplete');
                    var searchBox = new google.maps.places.SearchBox(input);

                    map.addListener('bounds_changed', function() {
                        searchBox.setBounds(map.getBounds());
                    });

                    searchBox.addListener('places_changed', function() {
                        var places = searchBox.getPlaces();

                        if (places.length == 0) {
                            return;
                        }

                        // For each place, get the icon, name and location.
                        var bounds = new google.maps.LatLngBounds();
                        places.forEach(function(place) {
                            if (!place.geometry) {
                                console.log("Returned place contains no geometry");
                                return;
                            }

                            if (place.geometry.viewport) {
                              // Only geocodes have viewport.
                              bounds.union(place.geometry.viewport);
                            } else {
                              bounds.extend(place.geometry.location);
                            }
                        });

                      map.fitBounds(bounds);
                    });
                }
            </script>
            <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC5kE3PjFpshQzI1eH_isjZq3tPGF-4Vq0&libraries=places&callback=initMap"></script>
        </div>
    </body>
</html>
    