<?php $currentIdTab = 0; 
        $temp=0;
        $count = 0;
?>       
            <div>
                <h2 class="title is-2"> <?= $quizIdUnique->title?>
                    <span> xx questions</span>
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

            <br><br>
            
            <div class="row">
            
                <?php foreach($listQuestion as $question):?>
                
                <div class="col question">

                    <span class="level ">

                   <?php echo $levelUp[$currentIdTab]["name"]; ?>
                    
                
                    </span>

                    <div class="question__question title is-5">
                        <?= $question->question?>
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






