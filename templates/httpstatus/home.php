<?php include(PWD_TEMPLATES . '/incs/head.php'); ?>

<div class="w3-top">
  <div class="w3-bar w3-flat-midnight-blue w3-wide w3-padding w3-card">
    <a class="w3-bar-item"><b>HTTP</b> Status - Site de Monitoring Web</a>
    <!-- Float links to the right. Hide them on small screens -->
    <div class="w3-right">
        <?php if (!empty($_SESSION['user'])) { ?>
          <a href="#" class="w3-bar-item w3-button w3-hover-red">Ajouter un site</a>
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

<?php include(PWD_TEMPLATES . '/incs/footer.php'); ?>