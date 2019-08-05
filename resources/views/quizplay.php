<?php $count = 1; ?>  
            <div>
                <h2> <?= $quizIdUnique->title?> 
                    <span><?=count($listQuestion);?> questions</span>
                </h2>
            </div>

            <div>
                <h4> 
                <?= $quizIdUnique->description?>
                </h4>
            </div>

            <div>
                <p>by <?=$quizIdUnique->appUser->firstname.' '.$quizIdUnique->appUser->lastname?></p>
            </div>
            
            <form action="" method="">

                <div class="row">

                    <?php foreach($listQuestion as $question):?>
                    <div class="col question">

                        <span class="level level--beginner"><?=$question->levels->name ?></span>

                        <div class="question__question">
                            <?= $question->question?>
                            <a href="#">Wikipedia</a>
                        </div>

                        <div class="question__choices">

                            
                        <?php foreach ($question->answers->shuffle() as $currentAnswer): ?>
                            <div>
                                <input type="radio" name="exampleRadios" id="<?=$currentAnswer->id?>" value="option<?=$count?>">
                                <label for="exampleRadios<?=$count?>">
                                        <?=$currentAnswer->description;?> 
                                </label> 
                            </div>
                            <?php $count++;?>
                        <?php endforeach; ?>
                        <?php $count=0?>

            
                        </div>
                    </div>
                    <?php endforeach; ?>
                    
                </div>


                <div>
                    <input class="btn" type="submit" value="OK"/>
                </div>
            </form>
