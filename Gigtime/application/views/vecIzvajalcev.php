<html>
    <head>
        <title>GigTime | Main</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/vecIzvajalcev.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/dropdown.css'); ?>">
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <?php include 'header.php'; ?>
        
        <div class="container">
            <div class="tabela">
                <h2>Vsi koncerti</h2>
                <div class="filtri">
                    <label for="filters">Filtriraj Koncerte</label>
                    <form method="post" action="<?php echo site_url('user/filter'); ?>" id="filters">
                        <div class="autocomplete">
                            <?php if($bandName == ""){ ?>
                                <input type="text" placeholder="Išči po izvajalcih" id="myInput" class="bandSearch form-control" name="bandFilter" autocomplete="off"/>
                            <?php }else{ ?>
                                <input type="text" placeholder="Search by band" id="myInput" class="bandSearch form-control" value="<?php echo $bandName ?>" name="bandFilter" autocomplete="off"/>
                            <?php } ?>
                        </div>
                        <div class="organizerSearch autocomplete">
                            <input class="form-control" id="myInput2" autocomplete="off" type="text" placeholder="Išči po organizatorju dogodka" name="organizerName">
                        </div>
                        <div class="concertSearch autocomplete">
                            <input class="form-control" id="myInput3" autocomplete="off" type="text" placeholder="Išči po imenu dogodka" name="concertName">
                        </div>
                        <div class="filterButton">
                            <input type="submit" class="btn btn-secondary" value="Filtriraj">
                        </div>
                    </form>
                </div>
                <br>
                <br>
                
                
                
                
                <div class="kartice">
                    <?php foreach ($bands as $band_item): ?>
                    
                        <div class="karticaa">
                        <div class="card mb-3 kartica">
                            <h3 class="card-header">
                                <?php $ime = str_replace(' ', '.', $band_item['user_name']); ?>
                                <a href="<?php echo site_url('user/bandProfile/'.$ime);?>"><?php echo $band_item['user_name']; ?></a>
                            </h3>
                            <div class="card-body">
                                <h5 class="card-title">Special title treatment</h5>
                                <h6 class="card-subtitle text-muted">Support card subtitle</h6>
                            </div>
                            <img style="height: auto; width: 100%; display: block;" src="<?php echo base_url("uploads/".$band_item['user_picture']); ?>" alt="Card image">
                            <div class="card-body">
                                <p class="card-text"><?php echo $band_item['description']; ?></p>
                            </div>
                            <!---
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Naslednji koncerti</li>
                                <li class="list-group-item"><?php echo $band_item['name']; ?></li>
                                <li class="list-group-item"><?php echo $band_item['name']; ?></li>
                            </ul>
                            <div class="card-body">
                                <a href="<?php echo $band_item['fb']; ?>" class="card-link">Facebook</a>
                                <a href="<?php echo $band_item['yt']; ?>" class="card-link">YouTube</a>
                                <a href="<?php echo $band_item['insta']; ?>" class="card-link">Instagram</a>
                                <a href="<?php echo $band_item['website']; ?>" class="card-link">Spletna stran</a>
                            </div>
                            --->
                            <div class="card-footer text-muted">
                                2 days ago
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            
        
        
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
                var bandsArr = <?php echo json_encode($bands); ?>;

                var bands = [];
                for(var i=0; i<bandsArr.length; i++){
                    bands.push(bandsArr[i].user_name);
                }
            
                var organizersArr = <?php echo json_encode($organizers); ?>;
                    
                var organizers = [];
                for(var i=0; i<organizersArr.length; i++){
                    organizers.push(organizersArr[i].user_name);
                }
            
                var concertsArr = <?php echo json_encode($concerts); ?>
                    
                var concerts = [];
                for(var i=0; i<concertsArr.length; i++){
                    concerts.push(concertsArr[i].name);
                }

                /*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
                autocomplete(document.getElementById("myInput"), bands);
                autocomplete(document.getElementById("myInput2"), organizers);
                autocomplete(document.getElementById("myInput3"), concerts);
        </script>
        
        
        
        </div>    
    </body>
</html>
    