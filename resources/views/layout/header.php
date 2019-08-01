<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">

        <!-- Reset CSS -->
        <link href="../resources/assets/css/reset.css"  rel="stylesheet">

        <link href="../resources/assets/css/style.css"  rel="stylesheet">

        <!-- Bulma -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css">

    </head>
    <body>
        <main> 
  <nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="<?=route('home')?>">
      <h1>O'Quiz</h1>
    </a>
    <a class="navbar-item" href="<?=route('home')?>">
        Accueil
      </a>
  <a class="navbar-item" href="<?=route('account')?>">
        Mon compte
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
          <a class="button is-light" href="<?=route('signin')?>">
            Se connecter
          </a>
        </div>
      </div>
      </div>
    </div>
  </div>
</nav>