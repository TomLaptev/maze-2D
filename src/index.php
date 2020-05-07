<!DOCTYPE html>
<html lang="ru">

<head>

  <meta charset="utf-8">

  <title>Example</title>
  <meta name="description" content="">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <meta property="og:image" content="path/to/image.jpg">


  <!-- Chrome, Firefox OS and Opera -->
  <meta name="theme-color" content="#000">
  <!-- Windows Phone -->
  <meta name="msapplication-navbutton-color" content="#000">
  <!-- iOS Safari -->
  <meta name="apple-mobile-web-app-status-bar-style" content="#000">

</head>

<body>
  <br><br>

  <div class="container">

    <?php

    function field($height, $width, $walls)

    {
      $sum_walls_total = 0;
      $sum_walls_h = 0;  //sum horizontal
      $sum_l = 1;
      for ($i = 1; $i <= $height; $i++) {
        for ($j = 1; $j <= $width; $j++) {

          $arr[0][1] = 0;

          if ($i == $height) {
            for ($k = 1; $k < $height; $k++) {
              $sum_walls_v[$j] += $arr[$k][$j];  // Sum i1:i6
            }
          }



          //------------------------------------------------------------------------------
          if ($walls == 1) {
            $chance_1 = 97;
            $chance_2 = 93;
            $chance_3 = 80;
          } elseif ($walls == 2) {
            $chance_1 = 95;
            $chance_2 = 87;
            $chance_3 = 40;
          } elseif ($walls > 2 && $walls <= 3) {
            $chance_1 = 92;
            $chance_2 = 80;
            $chance_3 = 30;
          } elseif ($walls >= 4 && $walls <= 6) {
            $chance_1 = 82;
            $chance_2 = 75;
            $chance_3 = 30;
          } elseif ($walls > 6 && $walls <= 10) {
            $chance_1 = 75;
            $chance_2 = 70;
            $chance_3 = 25;
          } elseif ($walls > 10 && $walls <= 14) {
            $chance_1 = 40;
            $chance_2 = 50;
            $chance_3 = 0;
          } elseif ($walls > 14) {
            $chance_1 = 30;
            $chance_2 = 40;
            $chance_3 = 0;
          }
          //-------------------------------------------------
          if (
            $i == 1
            && mt_rand(0, 100) > $chance_1
            && $sum_walls_total < $walls
            && $sum_walls_h < $width - 1
          ) {
    ?>
            <div class="_<?php echo $i . $j ?> color">
              <?php echo $arr[$i][$j] = 1;
              $sum_walls_total++ ?>
            </div>
          <?php  } elseif (
            mt_rand(0, 100) > $chance_2
            && $i != 1
            && $i != $height
            && $sum_walls_total < $walls
            && $sum_walls_h < $width - 1

            && ($arr[$i - 1][$j - 1] //t-l 
              &&  $arr[$i - 1][$j] // top
              //----------------------------------------
              || $arr[$i][$j - 1]  //left =1
              && $arr[$i - 1][$j + 1] === 0 // t-r === 0
              //---------------------------------------
              || ($arr[$i - 1][$j] // t = 1 
                && !($arr[$i - 1][$j - 1] //t-l = 0
                  || $arr[$i][$j - 1])) // left = 0
              //------------------------------------------------
              || !($arr[$i - 1][$j - 1] //t-l = 0
                || $arr[$i - 1][$j] //t =0
                || $arr[$i - 1][$j + 1] //t-r =0
                || $arr[$i][$j - 2])) //-1left =0
          ) {
          ?>
            <div class="_<?php echo $i . $j ?> color">
              <?php echo $arr[$i][$j] = 1;
              $sum_walls_total++ ?>
            </div>

          <?php  } elseif (
            mt_rand(0, 100) > $chance_3
            && $i == $height
            && $j != $width
            && $sum_walls_total < $walls
            && $sum_walls_h < $width - 1
            &&  $sum_walls_v[$j] < $height - 1
            && (!($arr[$i - 1][$j - 1] //t-l =0
              || $arr[$i - 1][$j] //top =0
              || $arr[$i - 1][$j + 1]) // t-r =0
              //------------------------------
              || !($arr[$i - 1][$j - 1] //t-l =0
                || $arr[$i - 2][$j] //-1top =0
                || $arr[$i - 1][$j + 1])) // t-r =0      

          ) { ?>

            <div class="_<?php echo $i . $j ?> color">
              <?php echo $arr[$i][$j] = 1;
              $sum_walls_total++ ?>
            </div>
          <?php

          } elseif (
            $i == $height
            && $j == $width
            && $sum_walls_total < $walls
            && $sum_walls_h < $width - 1
            &&  $sum_walls_v[$j] < $height - 1
            && (!$arr[$i - 1][$j - 1] //t-l =0
              || $arr[$i - 1][$j - 1] //t-l =1
              && $arr[$i - 1][$j] //t =1
              || $arr[$i - 1][$j - 1] //t-l =1
              && $arr[$i][$j-1]) //l =1

          ) { ?>

            <div class="_<?php echo $i . $j ?> color">
              <?php echo $arr[$i][$j] = 1;
              $sum_walls_total++ ?>
            </div>
          <?php

          } else { ?>
            <div class="_<?php echo $i . $j ?> ">
              <?php echo $arr[$i][$j] = 0; ?>
            </div>
    <?php

          }

          ($j == $width) ? $sum_walls_h = 0 : $sum_walls_h += $arr[$i][$j];
          //------------------------------------------------------------------------

        }
      }
      /**/

      echo $sum_walls_total;

      //print_r($arr[1][1] == 0);
    }
    field(7, 5, 10);



    ?>
  </div>

  <link rel="stylesheet" href="css/main.min.css">
  <script src="js/scripts.min.js"></script>
</body>

</html>