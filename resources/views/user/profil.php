<?=view('layout.header').view('partials.nav')?>

<div class="container">

    <h3 class="has-text-centered title is-3">Bonjour <?= $connectedUser->firstname.' '.$connectedUser->lastname ?></h3>

</div>





<?=view('layout.footer')?>