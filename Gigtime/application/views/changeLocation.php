<html>
    <head>
        <title>GigTime | Change location ?></title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/changeLocation.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/dropdown.css'); ?>">

        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <?php include 'header.php'; ?>
        
        <div class="container">
            <div id="map"></div>
            <form method="post" action="<?php echo site_url('myProfileController/changeLocation'); ?>" class="form-group form-inline">
                <input type="hidden" name="hiddenLat" id="hiddenLat">
                <input type="hidden" name="hiddenLng" id="hiddenLng">
                <label for="autocomplete">Da nastaviš lokacijo, lahko poiščeš naslov z spodnjim vhodom nato pa klikneš na zemljevid na želeno lokacijo.</label>
                <input type="text" id="autocomplete" class="form-control"> 
                <input type="submit" class="btn btn-primary" value="Shrani lokacijo">
            </form>
        </div>
        
        <script>
            function initMap() {
            var myLatLng = {lat: 46.1512, lng: 14.9955};
            var geocoder = new google.maps.Geocoder;

            var map = new google.maps.Map(
                document.getElementById('map'), 
                {
                    zoom: 9, 
                    center: myLatLng, 
                    disableDefaultUI: true
                });

            google.maps.event.addListener(map, 'click', function(event) {
                var lokacija = event.latLng;
                placeMarker(lokacija);

                document.getElementById('hiddenLat').value = lokacija.lat();
                document.getElementById('hiddenLng').value = lokacija.lng();
                
                
                
                geocodeLatLng(geocoder);
                
      						
                
                
            });
                
            function placeMarker(location) {
                var marker = new google.maps.Marker({
                    position: location, 
                    map: map
                }); 
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
    </body>
</html>