<html>
    <head>
        <title>GigTime | Moj profil</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/myProfile.css'); ?>">
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
                    
                        <form method="post" action="<?php echo site_url('myProfileController/newPicture'); ?>" enctype="multipart/form-data">
                            <div class="custom-file" id="customFileProfilka">
                                <input type="file" class="custom-file-input" id="customFile" name="userfile">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                            <button class="btn btn-primary">Spremeni sliko</button>
                        </form>
                
                </div>
                <form method="post" action="<?php echo site_url('myProfileController/dodajLinke'); ?>">
                <h1><?php echo $user_item['user_name']; ?></h1>
                    <p>
                        Žanr: <select class="form-control" id="exampleSelect2" name="zanr1" placeholder="Dodaj žanr">
                                    <option selected="selected"><?php echo $user_item['zanr1']; ?></option>
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
                                    <option selected="selected"><?php echo $user_item['zanr2']; ?></option>
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
                        <br>
                        Facebook: <input value="<?php echo $user_item['fb']; ?>" placeholder="Dodaj povezavo" class="form-control" name="fb"><br>
                        YouTube: <input value="<?php echo $user_item['yt']; ?>" placeholder="Dodaj povezavo" class="form-control" name="yt"><br>
                        Instagram: <input value="<?php echo $user_item['insta']; ?>" placeholder="Dodaj povezavo" class="form-control" name="insta"><br>
                        Spletna stran: <input value="<?php echo $user_item['website']; ?>" placeholder="Dodaj povezavo" class="form-control" name="website"><br>
                        <button type="submit" class="btn btn-primary">Shrani spremembe</button>
                    </p>
                    <?php endforeach; ?>
                </form>
            </div>
            </div>
            <div class="feed">
                
                    <ul class="nav nav-tabs">
                      <li class="nav-item active">
                        <a class="nav-link active" data-toggle="tab" href="#zgodba">Naša zgodba</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#slike">Slike</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#kontakt">Kontakt</a>
                      </li>
                    </ul>

                    <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade in active show" id="zgodba">
                                <form role="form" method="post" action="<?php echo site_url('myProfileController/insert_story'); ?>">
                                    
                                    <?php foreach($user as $user_item): ?>
                                    <textarea id="zgodbaTekst" name="zgodbaVsebina" placeholder="Dodaj opis"><?php echo $user_item['description']; ?></textarea>
                                    <?php endforeach; ?>
                                    <button type="submit" class="btn btn-primary storyGumb">Shrani spremembe</button>
                                    
                                </form>
                            </div>
                            
                            
                        <div class="tab-pane fade show" id="slike">
                            <div class="responsive">
                                <div class="gallery">
                                    <h2>Dodaj novo sliko</h2>
                                    <form method="post" action="<?php echo site_url('myProfileController/addNewPicture'); ?>" enctype="multipart/form-data">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="customFile" name="userfile">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>

                                        <input type="text" name="opis" class="form-control" placeholder="Dodaj opis slike"/>
                                        <input type="date" class="form-control" name="datum"/><br>
                                        <button type="submit" class="btn btn-primary slikeGumb">Dodaj sliko</button>
                                    </form>
                                </div>
                            </div>
                            
                            
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
                                    <form method="post" action="<?php echo site_url('myProfileController/deleteImage') ?>">
                                        <input type="hidden" name="imageFile" value="<?php echo $image['picture_filename'] ?>">
                                        <input type="hidden" name="imageId" value="<?php echo $image['picture_id'] ?>">
                                        <button type="submit" class="btn btn-danger slikeGumb">Izbiši sliko</button>
                                    </form>
                                </div>
                            </div>
                             <?php endforeach; ?>
                        </div>

                        <div class="tab-pane fade show" id="kontakt">
                            <form role="form" method="post" action="<?php echo site_url('myProfileController/insert_contact'); ?>">
                                    
                                    <?php foreach($user as $user_item): ?>
                                    <textarea id="zgodbaTekst" name="kontaktVsebina" placeholder="Dodaj svoje kontakte"><?php echo $user_item['contact']; ?></textarea>
                                    <?php endforeach; ?>
                                    <button type="submit" class="btn btn-primary storyGumb">Shrani spremembe</button>
                                    
                            </form>
                        </div>
                    </div>
            </div> 
        </div>
        <script>
            // Add the following code if you want the name of the file appear on select
            $(".custom-file-input").on("change", function() {
              var fileName = $(this).val().split("\\").pop();
              $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
            });
        </script>
    </body>
</html>
    