<div class="container">

    <div class="row">

    <div>
        <?php foreach($tagUnique->quizList as $currentQuiz):?>
            <p><a href="<?= route('quiz', ['id' => $currentQuiz->id]); ?>"><?= $currentQuiz->title ?></a></p>
        <?php endforeach;?>
    </div>


    </div>

</div>
