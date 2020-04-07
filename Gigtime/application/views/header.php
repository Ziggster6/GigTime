<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
<a class="navbar-brand" href="#">GigTime</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarColor02">
<ul class="navbar-nav mr-auto">
  <li class="nav-item">
    <a class="nav-link" href="<?php echo site_url('user/home_view'); ?>">Doma</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo site_url('user/mojiKoncerti_view'); ?>">Moji Koncerti</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo site_url('user/vecKoncertov_view'); ?>">Vsi Koncerti</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo site_url('user/dodajKoncert_view'); ?>">Dodaj Nov Koncert</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo site_url('user/zemljevid'); ?>">Zemljevid koncertov</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">About</a>
  </li>
</ul>

<div class="dropdown">
    <button class="dropbtn"><?php echo $this->session->userdata('user_name'); ?></button>
    <div class="dropdown-content">
        <a href="<?php echo site_url('myProfileController/profile');?>">Moj profil</a>
        <a href="<?php echo site_url('user/user_logout');?>">Izpis</a>
    </div>
</div>

</div>
</nav>