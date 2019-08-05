<?php $currentIdTab = 0; 
        $temp=0;
        $count = 0;
?>       
        <div class="container">
            <div class="intro has-text-centered has-text-white has-background-primary">
                <h2 class="title"> <?= $quizIdUnique->title?>
                    <span> <?=count($listQuestion);?> questions</span>
                </h2>
            </div>

            <div class="has-text-centered has-text-primary">
                <h4 class="title is-4 has-text-primary"> 
                    <?= $quizIdUnique->description?>
                </h4>
            </div>

            <div class="has-text-centered has-text-grey-dark">
                <p>by <?=$quizIdUnique->appUser->firstname.' '.$quizIdUnique->appUser->lastname?></p>
            </div>

            <br><br>
            
            <div class="row has-text-centered has-text-grey-dark">
            
                <?php foreach($listQuestion as $question):?>
                
                <div>

                    <div class="question__question title is-6">
                        <?= $question->question.' ('.$question->levels->name.')'?>
                    </div>
                    <div>
                        <ul>
                        <?php foreach ($answers[$currentIdTab] as $key => $value): ?>
                        <?php $count++; ?>

                                <li><?php echo $count.".".$value->description; ?></li>

                        <?php endforeach; ?>
                        <?php $count=0; ?>
                        <?php $currentIdTab++ ?>

                        </ul> 
                        <br><br><br>
                    </div>
                </div>
                
                <?php endforeach; ?>
                
            </div>
        </div>



        foreach($listQuestion as $question)
        {
            $getAnswers = Question::find($question->id);
            $answers[] = $getAnswers->answers;
    
        }



