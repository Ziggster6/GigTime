<html>
    <head>
        <title>GigTime | Main</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/mojiKoncerti.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/dropdown.css'); ?>">
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <?php include 'header.php'; ?>
        
        <div class="container">
            <div class="tabela">
                    <h2>Moji koncerti</h2>
                    <div class="filtri">
                        <label for="filters">Filtriraj Koncerte</label>
                        <form method="post" action="<?php echo site_url('user/myConcertsFilter'); ?>" id="filters">
                            <div class="select">
                                <select class="custom-select dateInput" name="datumFilter" id="selekt">
                                    <option selected=""></option>
                                    <option>Vsi koncerti</option>
                                    <option>Samo pretekli</option>
                                    <option>Naslednji teden</option>
                                    <option>Naslednji mesec</option>
                                    <option>Naslednje leto</option>
                                </select>
                            </div>
                            <div class="concertSearch autocomplete">
                                <input class="form-control concertName" id="myInput3" autocomplete="off" type="text" placeholder="Išči po imenu dogodka" name="concertName">
                            </div>
                            <div class="countrySearch autocomplete">
                                <input class="form-control countryName" id="myInput4" autocomplete="off" type="text" placeholder="Sortiraj po državi" alt="simple" name="drzavaName">
                            </div>
                            <div class="filterButton">
                                <input type="submit" class="btn btn-secondary" value="Filtriraj" name="submit">
                            </div>
                        </form>
                    </div>
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
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($concerts as $concert_item): ?>
                            
                            <?php 
                                if($danDatum > $concert_item['date']){
                                    $barva = '#f5c6cb';
                                }
                                else{
                                    $barva = '';
                                }
                            ?>
                            
                            <tr style="background-color: <?php echo $barva; ?>">
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
                                    <a href="<?php echo site_url('user/izbrisiKoncert/'.$concert_item['concert_id']); ?>" class="ibtnDel btn btn-md btn-danger" >Delete</a>
                                </td>
                                
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
        </div>
        <script>
            $(".dateInput").on('input', function(){
                $("#filters :input:not(:focus, [name=submit])").prop("disabled", this.value.length);
            });
            
            $(".concertName").on('input', function(){
                $("#filters :input:not(:focus, [name=submit], [name=datumFilter])").prop("disabled", this.value.length);
                $("#selekt").attr('disabled', 'disabled');
            });
            
            $(".countryName").on('input', function(){
                $("#filters :input:not(:focus, [name=submit], [name=datumFilter])").prop("disabled", this.value.length);
                $("#selekt").attr('disabled', 'disabled');
            });
        </script>
        <script>
            function autocomplete(inp, arr) {
                  /*the autocomplete function takes two arguments,
                  the text field element and an array of possible autocompleted values:*/
                  var currentFocus;
                  /*execute a function when someone writes in the text field:*/
                  inp.addEventListener("input", function(e) {
                      var a, b, i, val = this.value;
                      /*close any already open lists of autocompleted values*/
                      closeAllLists();
                      if (!val) { return false;}
                      currentFocus = -1;
                      /*create a DIV element that will contain the items (values):*/
                      a = document.createElement("DIV");
                      a.setAttribute("id", this.id + "autocomplete-list");
                      a.setAttribute("class", "autocomplete-items");
                      /*append the DIV element as a child of the autocomplete container:*/
                      this.parentNode.appendChild(a);
                      /*for each item in the array...*/
                      for (i = 0; i < arr.length; i++) {
                        /*check if the item starts with the same letters as the text field value:*/
                        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                          /*create a DIV element for each matching element:*/
                          b = document.createElement("DIV");
                          /*make the matching letters bold:*/
                          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                          b.innerHTML += arr[i].substr(val.length);
                          /*insert a input field that will hold the current array item's value:*/
                          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";

                          /*execute a function when someone clicks on the item value (DIV element):*/
                          b.addEventListener("click", function(e) {
                              /*insert the value for the autocomplete text field:*/
                              inp.value = this.getElementsByTagName("input")[0].value;
                              /*close the list of autocompleted values,
                              (or any other open lists of autocompleted values:*/
                              closeAllLists();
                          });
                          a.appendChild(b);
                        }
                      }
                  });
                  /*execute a function presses a key on the keyboard:*/
                  inp.addEventListener("keydown", function(e) {
                      var x = document.getElementById(this.id + "autocomplete-list");
                      if (x) x = x.getElementsByTagName("div");
                      if (e.keyCode == 40) {
                        /*If the arrow DOWN key is pressed,
                        increase the currentFocus variable:*/
                        currentFocus++;
                        /*and and make the current item more visible:*/
                        addActive(x);
                      } else if (e.keyCode == 38) { //up
                        /*If the arrow UP key is pressed,
                        decrease the currentFocus variable:*/
                        currentFocus--;
                        /*and and make the current item more visible:*/
                        addActive(x);
                      } else if (e.keyCode == 13) {
                        /*If the ENTER key is pressed, prevent the form from being submitted,*/
                        e.preventDefault();
                        if (currentFocus > -1) {
                          /*and simulate a click on the "active" item:*/
                          if (x) x[currentFocus].click();
                        }
                      }
                  });
                  function addActive(x) {
                    /*a function to classify an item as "active":*/
                    if (!x) return false;
                    /*start by removing the "active" class on all items:*/
                    removeActive(x);
                    if (currentFocus >= x.length) currentFocus = 0;
                    if (currentFocus < 0) currentFocus = (x.length - 1);
                    /*add class "autocomplete-active":*/
                    x[currentFocus].classList.add("autocomplete-active");
                  }
                  function removeActive(x) {
                    /*a function to remove the "active" class from all autocomplete items:*/
                    for (var i = 0; i < x.length; i++) {
                      x[i].classList.remove("autocomplete-active");
                    }
                  }
                  function closeAllLists(elmnt) {
                    /*close all autocomplete lists in the document,
                    except the one passed as an argument:*/
                    var x = document.getElementsByClassName("autocomplete-items");
                    for (var i = 0; i < x.length; i++) {
                      if (elmnt != x[i] && elmnt != inp) {
                        x[i].parentNode.removeChild(x[i]);
                      }
                    }
                  }
                  /*execute a function when someone clicks in the document:*/
                  document.addEventListener("click", function (e) {
                      closeAllLists(e.target);
                  });
                }

                /*An array containing all the country names in the world:*/
                var concertsArr = <?php echo json_encode($concertsForFilter); ?>
                    
                var concerts = [];
                for(var i=0; i<concertsArr.length; i++){
                    concerts.push(concertsArr[i].name);
                }
            
            
                var countries = ["Afghanistan","Albania","Algeria","Andorra","Angola","Anguilla","Antigua & Barbuda","Argentina","Armenia","Aruba","Australia","Austria","Azerbaijan","Bahamas","Bahrain","Bangladesh","Barbados","Belarus","Belgium","Belize","Benin","Bermuda","Bhutan","Bolivia","Bosnia & Herzegovina","Botswana","Brazil","British Virgin Islands","Brunei","Bulgaria","Burkina Faso","Burundi","Cambodia","Cameroon","Canada","Cape Verde","Cayman Islands","Central Arfrican Republic","Chad","Chile","China","Colombia","Congo","Cook Islands","Costa Rica","Cote D Ivoire","Croatia","Cuba","Curacao","Cyprus","Czech Republic","Denmark","Djibouti","Dominica","Dominican Republic","Ecuador","Egypt","El Salvador","Equatorial Guinea","Eritrea","Estonia","Ethiopia","Falkland Islands","Faroe Islands","Fiji","Finland","France","French Polynesia","French West Indies","Gabon","Gambia","Georgia","Germany","Ghana","Gibraltar","Greece","Greenland","Grenada","Guam","Guatemala","Guernsey","Guinea","Guinea Bissau","Guyana","Haiti","Honduras","Hong Kong","Hungary","Iceland","India","Indonesia","Iran","Iraq","Ireland","Isle of Man","Israel","Italy","Jamaica","Japan","Jersey","Jordan","Kazakhstan","Kenya","Kiribati","Kosovo","Kuwait","Kyrgyzstan","Laos","Latvia","Lebanon","Lesotho","Liberia","Libya","Liechtenstein","Lithuania","Luxembourg","Macau","Macedonia","Madagascar","Malawi","Malaysia","Maldives","Mali","Malta","Marshall Islands","Mauritania","Mauritius","Mexico","Micronesia","Moldova","Monaco","Mongolia","Montenegro","Montserrat","Morocco","Mozambique","Myanmar","Namibia","Nauro","Nepal","Netherlands","Netherlands Antilles","New Caledonia","New Zealand","Nicaragua","Niger","Nigeria","North Korea","Norway","Oman","Pakistan","Palau","Palestine","Panama","Papua New Guinea","Paraguay","Peru","Philippines","Poland","Portugal","Puerto Rico","Qatar","Reunion","Romania","Russia","Rwanda","Saint Pierre & Miquelon","Samoa","San Marino","Sao Tome and Principe","Saudi Arabia","Senegal","Serbia","Seychelles","Sierra Leone","Singapore","Slovakia","Slovenia","Solomon Islands","Somalia","South Africa","South Korea","South Sudan","Spain","Sri Lanka","St Kitts & Nevis","St Lucia","St Vincent","Sudan","Suriname","Swaziland","Sweden","Switzerland","Syria","Taiwan","Tajikistan","Tanzania","Thailand","Timor L'Este","Togo","Tonga","Trinidad & Tobago","Tunisia","Turkey","Turkmenistan","Turks & Caicos","Tuvalu","Uganda","Ukraine","United Arab Emirates","United Kingdom","United States of America","Uruguay","Uzbekistan","Vanuatu","Vatican City","Venezuela","Vietnam","Virgin Islands (US)","Yemen","Zambia","Zimbabwe"];

                /*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
                autocomplete(document.getElementById("myInput3"), concerts);
                autocomplete(document.getElementById("myInput4"), countries);
        </script>
    </body>
</html>
    