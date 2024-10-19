<?php
if (!empty($names)):
    foreach ($names as $name):
        echo $name->name;
    endforeach;
    endif;