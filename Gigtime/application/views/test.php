<html>
    <head>
        <style>
            div.gallery {
  border: 1px solid #ccc;
}

div.gallery:hover {
  border: 1px solid #777;
}

div.gallery img {
  width: 100%;
  height: auto;
}

div.desc {
  padding: 15px;
  text-align: center;
}

* {
  box-sizing: border-box;
}

.responsive {
  padding: 0 6px;
  float: left;
  width: 24.99999%;
}

@media only screen and (max-width: 700px) {
  .responsive {
    width: 49.99999%;
    margin: 6px 0;
  }
}

@media only screen and (max-width: 500px) {
  .responsive {
    width: 100%;
  }
}
        </style>
    </head>
    <body>
        <?php foreach($images as $image): ?>
                    <div class="tab-pane fade show" id="slike">
                        <div class="responsive">
                          <div class="gallery">
                            <a target="_blank" href="<?php echo base_url('uploads/pictures/'.$image['picture_filename']); ?>">
                              <img src="<?php echo base_url('uploads/pictures/'.$image['picture_filename']); ?>">
                            </a>
                            <div class="desc">Add a description of the image here</div>
                          </div>
                        </div>
                    </div>
        <?php endforeach; ?>
        
    </body>
</html>