<?php
$num = 0;
function showDataJobs(int $year, int $month, ?int $num)
{
  $date = DateTime::createFromFormat("Y-m-d", "$year-$month-01"); 
  echo $date->format('F') . PHP_EOL;
  echo "-------------------------------" . PHP_EOL;
  $col = $date->format('t');
  // print_r($col);
  
  do {
    $dayWeek = $date->format('w');
    if ($dayWeek == '0') {
      echo $date->format('d - D') . PHP_EOL;
    } elseif ($num == 0) {
      echo "+" . ($date->format('d - D')) . PHP_EOL;
      $num++;
    } else {
      echo $date->format('d - D') . PHP_EOL;
      $num++;
    }
    if ($num >= 3) {
      $num = 0;
    }
    $date->modify("+1 day");
    $col--;
  } while ($col > 0);
}
$year = 2025;
$month = 10;
$numMonth = 2;

for ($i=$month; $i < $numMonth + $month; $i++) { 
  showDataJobs($year, $i,$num);  
}

