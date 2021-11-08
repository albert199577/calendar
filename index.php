<!-- <html>
  <title>萬年曆作業</title>
  <style>
    /*請在這裹撰寫你的CSS*/ 
    
  </style>
<body>
<h1>萬年曆</h1>
<?php
/*請在這裹撰寫你的萬年曆程式碼*/  
  
  
?>
  
</body> -->
<html>
<!DOCTYPE html>
<html lang="zh-hant">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Calender</title>
  <link rel="stylesheet" type="text/css" href="/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

<?php
  if (isset($_GET["month"])) {
    $month = $_GET["month"];
    $year = $_GET["year"];
  } else {
    $month= date("m");
    $year = date("Y");
  }

  //去年及上個月變數宣告
  $lm = $month - 1;
  $ly = $year;
  //明年及下個月變數宣告
  $nm = $month + 1;
  $ny = $year;

  if ($month == 1) {
    $lm = 12;
    $y = $year - 1;
  } else if ($month == 12) {
    $nm = 1;
    $ny = $year + 1;
  }

  ?>


<?php
  // 取出當前月份的第一天
  $firstDay = date("$year-$month-01");
  
  // 取出當前月份第一天是星期幾 (0 - 6) 代表Sunday - Saturday
  $whiteDay = date("w", strtotime($firstDay));
  
  // 取出當月份有幾天 28days - 31days
  $monthDay = date("t", strtotime($firstDay));
  // $lmDay = date("t", strtotime($lmDay));
  // echo $lmDay;
  
  // 取出一個月有幾個禮拜
  $week = ceil(($whiteDay + $monthDay) / 7);
  // 計算出總月份共需要幾格
  $all_lattice = $week * 7;

  //special Day
  $sD = [ "1 - 1" => "元旦",
          "2 - 28" => "和平紀念日",
          "3 - 8" => "婦女節",
          "3 - 29" => "青年節",
          "4 - 4" => "兒童節",
          "5 - 1" => "勞動節",
          "8 - 8" => "父親節",
          "9 - 3" => "軍人節",
          "9 - 28" => "教師節",
          "10 - 10" => "國慶日",
          "10 - 25" => "台灣光復節",
          "11 - 12" => "國父誕辰紀念日",
          "12 - 25" => "行憲紀念日"
        ];

  //Day of the days
  $weekDay = ["SUN", "MON", "TUE", "WES", "THR", "FRI", "SAT"];

  // 取出一個月天數之陣列
  $day_arr = [];
  for ($i = 1; $i <= $monthDay; $i++) {
    array_push($day_arr, $i);
  }
  // 陣列前加入月前空白
  for ($i = 0; $i < $whiteDay; $i++) {
    array_unshift($day_arr, "");
  }
  // for ($i = 1; $i <= $all_lattice - $monthDay; $i++) {
  //   array_push($day_arr, "");
  // }
  // print_r($day_arr);
  
?>


  
  
<main>
  <header>
    <h1><?=$year?></h1>
    <section>
      <a href="index.php?year=<?=$ly?>&month=<?=$lm?>">
        <i class="fas fa-chevron-left"></i>
      </a>
      <h2><?=$month?></h2>
      <a href="index.php?year=<?=$ny?>&month=<?=$nm?>">
        <i class="fas fa-chevron-right"></i>
      </a>
    </section>

  </header>
  <section class="left">
    
  </section>
  <section class="contain">

<?php
  //Calendar top
  for ($i = 0; $i < count($weekDay); $i++) {
    echo "<div>" . $weekDay[$i] . "</div>";
  }
  //Calendar content
  for ($i = 0; $i < $all_lattice; $i++) {
    $weekend = $i % 7;
    
    $date = date("$month - ") . $day_arr[$i];
    if ($weekend == 0 || $weekend == 6) {
      echo "<div class='out'><div class='days weekend'>";
    } else if ($i < $whiteDay || $i > count($day_arr) - 1) {
      echo "<div class='out'>";
    } else {
      echo "<div class='out'><div class='days'>";
    }
    echo $day_arr[$i];
    //加入特別日
    // if(array_key_exists($date,$sD)){
    //   echo  "<p>" . $sD[$date] . "</p>";

    // }
    echo "</div></div>";


  } 

?>
  </section>

</main>



</body>
<script scr="/app.js"></script>
</html>