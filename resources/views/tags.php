<div class="container">

    <div class="row">

    <div>
        <?php foreach($tagList as $currentTag):?>
            <p><a href="<?= route('tagsQuiz', ['id' => $currentTag->id]); ?>"><?= $currentTag->name ?></a></p>
        <?php endforeach;?>
    </div>


    </div>

</div>
