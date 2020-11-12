<?php 
  include('sources/php/session.php');
  include('sources/php/database.php');
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <?php include('sources/php/master.php') ?>
    <link rel="stylesheet" href="sources/css/pages/maintenance.css?<?= time() ?>" />
    <title>Pyro-Tech | Maintenance</title>
  </head>
  <body>
    <div class="container">
      <div class="top">
        <p class="title">Maintenance</p>
        <div class="advertissements">
          <div class="advertissements__section">
            <p class="advertissements__text">Nous travaillons actuellement sur le site Internet. Il vous est néanmoins possible d'intéragir avec nous.</p>
            <div class="advertissements__list">
              <p class="advertissements__list__item"><?php include('documents/icons/angle-right-solid.svg') ?> Souscrivez à notre <a href="#">NewsLetter</a></p>
              <p class="advertissements__list__item"><?php include('documents/icons/angle-right-solid.svg') ?> Contactez-nous par <a href="mailto:contact@pyro-tech.fr">E-Mail</a></p>
            </div>
          </div>
          <div class="advertissements__section">
            <p class="advertissements__text" style="margin-bottom: 10px">Il est possible que notre maintenance dûre quelques temps. Pour le moment, nous ne sommes pas en mesure de vous donner une date de réouverture.</p>
            <p class="advertissements__text">Nous restons ouvert à toute question éventuelle.</p>
          </div>
          <div class="advertissements__section">
            <p class="advertissements__text">Au programme de cette maintenance :</p>
            <div class="advertissements__list">
              <?php
              $f = file_get_contents('sources/json/maintenance.json');
              $j = json_decode($f, true);
              $a = $j['tasks'];

              $jsonIterator = new RecursiveIteratorIterator(
              new RecursiveArrayIterator($a),
              RecursiveIteratorIterator::SELF_FIRST);

              foreach ($jsonIterator as $key => $val) {
                ?>
                <p class="advertissements__list__item"><?php include('documents/icons/angle-right-solid.svg') ?> <?= $key ?></p>
                <?php
              }
              ?>
            </div>
          </div>
          <div class="advertissements__section">
            <p class="advertissements__text">Merci pour votre soutient.</p>
          </div>
        </div>
      </div>
      <div class="bottom">
        <?php
        $progress = 0;
        $percent_value = 1 / count($a);
    
        foreach ($jsonIterator as $key => $val) {
            if ($val == true) $progress += $percent_value;
        }

        $progress *= 100;
        ?>
        <div class="progress">
          <div class="bar" style="width: <?= $progress ?>%"></div>
        </div>
        <div class="percent">
          <div class="loader">
            <div class="loader__ball" style="--i: 4"></div>
            <div class="loader__ball" style="--i: 3"></div>
            <div class="loader__ball" style="--i: 2"></div>
            <div class="loader__ball" style="--i: 1"></div>
          </div>
          <p class="loader__value"><?= round($progress) ?>%</p>
          <div class="loader">
            <div class="loader__ball" style="--i: 1"></div>
            <div class="loader__ball" style="--i: 2"></div>
            <div class="loader__ball" style="--i: 3"></div>
            <div class="loader__ball" style="--i: 4"></div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>