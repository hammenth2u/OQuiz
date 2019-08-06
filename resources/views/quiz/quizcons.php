<?=view('layout.header').view('partials.nav')?>




        <?php if(!empty($connectedUser)):?>
            <?php $count = 1; ?>
            <?php $score = 0; ?> 
            <?php $response = '' ?> 

<div class=" has-text-centered">
            <?php if (isset($_POST)){

                foreach ($_POST as $questionId => $userResponseId) {
                    $question = $listQuestion->find($questionId);
             
                    //dump($question);
             
                    if ($question->answers_id == $userResponseId) {
                        echo $question->question . ' : Bonne réponse<br>';
                        $score++;
                    }
                    else {
                     echo $question->question . ' : Mauvaise réponse<br>';
                    }
                }
            }?>
</div>
 
            
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

            <div class="has-text-centered has-text-grey-dark">
                <p>Score: <?=$score.'/'.count($listQuestion)?></p>
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

            
            <form action="" method="POST">

                <div class="row has-text-centered has-text-grey-dark">

                    <?php foreach($listQuestion as $question):?>
                    <div class="col question">

                        <div class="question__question title is-5">
                            <?= $question->question.' ('.$question->levels->name.')'?>
                            
                            <a href="#">Wikipedia</a>
                        </div>

                        <div class="question__choices">
            
                            
                        <?php foreach ($question->answers->shuffle() as $currentAnswer): ?>
                            
                            <div>
                                <input type="radio" name="<?=$question->id?>" id="<?=$question->id ?>" value="<?=$currentAnswer->id?>">
                                
                                        <?php if (isset( $_POST)):?>
                                        <?php if (count( $_POST)>=1):?>
                                        
                                            <?php if($currentAnswer->description == $question->answer->description):?>
                                                <label class="has-text-primary" for="<?$question->id?>">
                                                    <?=$currentAnswer->description;?>
                                                </label> 
                                            <?php else:?>
                                            <label class="has-text-danger" for="<?$question->id?>">
                                                    <?=$currentAnswer->description;?>
                                                </label> 
                                            <?php endif;?>
                                            <?php else:?> 
                                                 <label for="<?$question->id?>">
                                                    <?=$currentAnswer->description;?>
                                                </label> 

                                            <?php endif;?> 
                                        <?php endif;?> 
                                
                            </div>
                            <?php $count++;?>
                        

                        <?php endforeach; ?>
                        <?php $count=0?>

                        

            
                        </div>
                        <br><br><br>
                    </div>
                    <?php endforeach; ?>
                    
                </div>


                <div>
                    <input class="btn" type="submit" value="OK"/>
                </div>
            </form>

         <?php endif; ?>








        <?php if(empty($connectedUser)):?>
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

                    <div class="question__question title is-5">
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
        <?php endif;?>


<?=view('layout.footer')?>






