<?php 

    $invertedArrowColour = get_field( 'inverted_arrow_colour' );

    echo '<div class="c-arrow c-arrow--' . ( 
                !$invertedArrowColour ? 
                'white' : 
                $invertedArrowColour 
            ) . ' c-arrow--inverted">
             <div class="c-arrow__left"></div>
             <div class="c-arrow__right"></div>
          </div>';
          