<?php 
    
    $arrowColour = get_field( 'arrow_colour' );

    echo '<div class="c-arrow c-arrow--' . ( 
                !$arrowColour ? 
                'white' : 
                $arrowColour 
            ) . '" style="margin-top: -2vw; margin-bottom: -4vw;">
             <div class="c-arrow__left"></div>
             <div class="c-arrow__right"></div>
          </div>';