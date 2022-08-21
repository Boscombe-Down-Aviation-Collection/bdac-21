<?php

    $question   = get_field( 'qna_questions');
    $answer     = get_field( 'qna_answers');

    echo '
        <section class="bdac-qna">
            <div class="container">
                <div class="row">
                    <h4 class="question"><strong>Q:</strong>' . $question . '</h4>
                    <p class="answer"><strong>A:</strong>' . $answer . '</p>
                </div>
            </div>
        </section>
    ';
    