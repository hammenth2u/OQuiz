<?php $count = 0; ?>   

        <div class="container">
            <div class="intro has-text-centered has-text-white has-background-primary">
                <h2 class="title has-text-white"> <?= $quizIdUnique->title?>
                    <span> <?=count($listQuestion);?> questions</span>
                </h2>
            </div>


            <div class="has-text-centered has-text-primary">
                <h4 class="title is-5 "> 
                    <?= $quizIdUnique->description?>
                </h4>
            </div>

            <div class="has-text-centered has-text-grey-dark">
                <p>by <?=$quizIdUnique->appUser->firstname.' '.$quizIdUnique->appUser->lastname?></p>
            </div>

            <div>
                <p>
                    Sujet(s) : 
                <?php foreach ($quizIdUnique->tags as $currentTag) : ?>
                    <a href="<?= route('tagsQuiz', ['id' => $currentTag->id]); ?>"><?= $currentTag->name ?></a>
                <?php endforeach ?>
                </p>
            </div>

            <br><br>
            
            <div class="row has-text-centered has-text-grey-dark">
            
                <?php foreach($listQuestion->shuffle() as $question):?>
                
                <div>

                    <div class="question__question title is-4">
                        <?= $question->question.' ('.$question->levels->name.')'?>
                    </div>
                    <div>
                        <ul>
                        <?php foreach ($question->answers->shuffle() as $currentAnswer): ?>
                        <?php $count++; ?>
                                <li><?= $count.".".$currentAnswer->description; ?></li>
                        <?php endforeach; ?>
                        <?php $count=0; ?>
                        

                        </ul> 
                        <br><br><br>
                    </div>
                </div>
                
                <?php endforeach; ?>
                
            </div>
        </div>






