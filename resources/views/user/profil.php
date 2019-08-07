<?=view('layout.header').view('partials.nav')?>

<div class="container">

    <h3 class="has-text-centered title is-3">Bonjour <?= $connectedUser->firstname.' '.$connectedUser->lastname ?></h3>
    <p>Email: <?=$connectedUser->email?></p>
    <p>Rôle: <?=$connectedUser->role?></p>

</div>





<?=view('layout.footer')?>