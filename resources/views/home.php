<?=view('layout.header').view('partials.nav')?>

<div class="container">
            <div class="intro has-text-centered has-text-white has-background-primary">
                <h1 class="title has-text-white"> Bienvenue sur O'Quiz </h1>
                <p>

                Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.

                </p><br>
            </div>
            </div>



            <div class="columns is-multiline is-centered has-text-primary">
                <?php foreach($quizList as $currentList):?>
                    <div class="column column-home is-one-fifth">
                        <h3 class="has-text-black"><?=$currentList->title?></h3>
                        <h5><?=$currentList->description?></h5>
                        <p><?=$currentList->appUser->firstname.' '.$currentList->appUser->lastname?></p>
                        <a href="<?= route('quiz', ['id' => $currentList->id]); ?>">Démarrez le quiz !</a>
                    </div>
                <?php endforeach;?>
            </div>

<?=view('layout.footer')?>



