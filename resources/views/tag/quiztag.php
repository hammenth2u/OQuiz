<?= view('layout.header').view('partials.nav')?>

<div class="container">

        <div class="intro has-text-centered has-text-white has-background-primary">
        <h1 class="title has-text-white"> Les quiz du sujet: <?=$tagUnique->name?></h1>
    </div>

    <div class="row">

    <div class="intro has-text-centered subtitle is-uppercase">
        <?php foreach($tagUnique->quizList as $currentQuiz):?>
            <a href="<?= route('quiz', ['id' => $currentQuiz->id]); ?>"><p class="subject"><?= $currentQuiz->title ?></p></a>
        <?php endforeach;?>
    </div>


    </div>

</div>

<?= view('layout.footer')?>
