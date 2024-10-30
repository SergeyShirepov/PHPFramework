<?php

use wfm\App;
//var_dump(App::$app->getProperty('language'));

?>
<div class="dropdown d-inline-block">
    <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
        <img src="<?= PATH ?>/assets/img/lang/<?= App::$app->getProperty('language')['code'] ?>.png" alt="">
    </a>
    <ul class="dropdown-menu" id="languages">
        <?php foreach ($this->languages as $k => $v): ?>
            <?php if (App::$app->getProperty('language')['code'] == $k) continue; ?>
            <li>
                <button class="dropdown-item" data-langcode="<?= $k ?>">
                    <img src="<?= PATH ?>/assets/img/lang/<?= $k ?>.png" alt="">
                    <?= $v['tittle'] ?>
                </button>
            </li>
        <?php endforeach; ?>
    </ul>
</div>