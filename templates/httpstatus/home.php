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

<!-- Connexion Fenêtre -->
<div id="connexion" class="w3-modal">
    <div class="w3-modal-content w3-animate-zoom" style="padding:32px">
            <div class="w3-container w3-white w3-center">
            <i onclick="document.getElementById('connexion').style.display='none'" class="fa fa-remove w3-right w3-button w3-transparent w3-xxlarge"></i>
            <h2 class="w3-wide">Connexion</h2>
            <p>Entrez vos identifiants :</p>
            <form action="connexion_script.php" method="POST" >
               <p><input class="w3-input w3-border" type="text" placeholder="Pseudo" name="Pseudo" required></p>
                <p><input class="w3-input w3-border" type="text" placeholder="Mot de passe" name="Password" required></p>
                <button type="submit" class="w3-button w3-padding-large w3-red w3-margin-bottom">Se connecter</button>
            </form>
        </div>
    </div>
</div>

<?php include(PWD_TEMPLATES . '/incs/footer.php'); ?>