<nav class="navbar has-background-grey-lighter" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="<?=route('home')?>">
      <h1 class="title">O'Quiz</h1>
    </a>
    <a class="navbar-item is-uppercase" href="<?=route('home')?>">
        Accueil
      </a>
<?php if(!empty($connectedUser)):?>
  <a class="navbar-item is-uppercase" href="<?=route('account')?>">
        Mon compte
      </a>
<?php endif;?>
<?php if(empty($connectedUser)):?>
  <a class="navbar-item is-uppercase" href="<?=route('signup')?>">
        Mon compte
      </a>
<?php endif;?>


      <a class="navbar-item is-uppercase" href="<?=route('tags')?>">
        Sujets
      </a>

    <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navMenu">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>
  <div id="navMenu" class="navbar-menu">
    <div class="navbar-end">
      <div class="navbar-item">
        <div class="buttons">




          <a class="button is-primary" href="<?=route('signup')?>">
            <strong>S'enregistrer</strong>
          </a>

          <?php if(empty($connectedUser)):?>
          <a class="button is-light" href="<?=route('signin')?>">
            Se connecter
          </a>
          <?php endif ?>

          <?php if (!empty($connectedUser)) : ?>
          <a class="button is-light" href="<?=route('logout')?>">
            Déconnexion
          </a>
          <?php endif ?>


        </div>
      </div>
      </div>
    </div>
  </div>
</nav>