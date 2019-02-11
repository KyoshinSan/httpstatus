<?php include(PWD_TEMPLATES . '/incs/head.php'); ?>

<div class="w3-top">
  <div class="w3-bar w3-flat-midnight-blue w3-wide w3-padding w3-card">
    <a class="w3-bar-item"><b>HTTP</b> Status - Site de Monitoring Web</a>
    <!-- Float links to the right. Hide them on small screens -->
    <div class="w3-right">
        <?php if (!empty($_SESSION['user'])) { ?>
          <a href="javascript:void(0)" class="w3-bar-item w3-button w3-hover-red" onclick="document.getElementById('connexion').style.display='block'">Ajouter un site</a>
          <a href="<?= Router::url('httpstatus', 'logout'); ?>" class="w3-bar-item w3-button">Déconnexion</a>
        <?php } ?>
        <?php if (empty($_SESSION['user'])) { ?>
          <form method="POST" action="<?= Router::url('httpstatus', 'login'); ?>" >
              <div class="w3-row-padding">
                <div class="w3-third">
                  <input class="w3-input w3-border" type="email" name="email" placeholder="Email" />
                </div>
                <div class="w3-third">
                  <input class="w3-input w3-border" type="password" name="password" placeholder="Password">
                </div>
                <div class="w3-third">
                  <input class="w3-button w3-border" type="submit" value="Connexion">
                </div>
              </div>
          </form>
        <?php } ?>
          
    </div>
  </div>
</div>

<!-- Header -->
<header class="w3-display-container w3-content w3-wide" style="max-width:1500px;" id="home">
  <img class="w3-image" src="http://cloud-docker.com/wp-content/uploads/2012/11/cropped-wallpaper-1425819.jpg" alt="Architecture" width="1500" height="800">
  <div class="w3-display-middle w3-margin-top w3-center">
    <h1 class="w3-xxlarge w3-text-white"><span class="w3-padding w3-red w3-opacity-min"><b>HTTP</b></span> <span class="w3-hide-small w3-text-light-grey">Status</span></h1>
  </div>
</header>

<!-- Page content -->
<div class="w3-content w3-padding" style="max-width:1564px">

<!-- Contact Section -->
  <div class="w3-container w3-padding-32" id="websites">
    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">Liste des sitewebs :</h3>
    <p>Voici la liste des serveurs que nous surveillons.</p>
    <table class="w3-table w3-bordered">
        <tr>
          <th>État du site</th>
          <th>URL</th>
        <?php if (!empty($_SESSION['user'])) { ?>
          <th colspan="2">Actions</th>
        <?php } ?>
        </tr>

        <?php foreach ($urls as $url) { ?>
        <tr>
          <td>
            <?php if ($url['status'] == 1) { ?>
            <span class="w3-padding w3-green w3-round-xxlarge">Site UP</span>
            <?php } else {?>
            <span class="w3-padding w3-red w3-round-xxlarge">Site DOWN</span>
            <?php } ?>
          </td>
          <td><?= $url['url']; ?></td>
          <?php if (!empty($_SESSION['user'])) { ?>
          <td><a href="#">Modifier</a></td>
          <td><a href="<?= Router::url('httpstatus', 'delete_url'); ?>">Supprimer</a></td>
          <?php } ?>
        </tr>
        <?php } ?>
      </table>
  </div>

<!-- End page content -->
</div>

<!-- Connexion Fenêtre -->
<div id="connexion" class="w3-modal">
    <div class="w3-modal-content w3-animate-zoom" style="padding:32px">
            <div class="w3-container w3-white w3-center">
            <i onclick="document.getElementById('connexion').style.display='none'" class="fa fa-remove w3-right w3-button w3-transparent w3-xxlarge"></i>
            <h2 class="w3-wide">Ajouter un site</h2>
            <p>Entrez les différentes informations</p>
            <form action="<?= Router::url('httpstatus', 'add_url'); ?>" method="POST" >
                <p><input class="w3-input w3-border" type="text" placeholder="URL" name="url" required></p>
                <button type="submit" class="w3-button w3-padding-large w3-red w3-margin-bottom">Ajouter le site</button>
            </form>
        </div>
    </div>
</div>

<?php include(PWD_TEMPLATES . '/incs/footer.php'); ?>