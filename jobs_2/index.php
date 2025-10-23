<?php
$nonWorkingDays = 0;
function showDataJobs(int $year, int $month, int &$nonWorkingDays)
{
  $date = DateTime::createFromFormat("Y-m-d", "$year-$month-01");
  echo $date->format('F') . PHP_EOL;
  echo "-------------------------------" . PHP_EOL;
  $col = $date->format('t');
  //  print_r($col);

  do {
    $dayWeek = $date->format('w');
    $nonWork = ($dayWeek == '0' || $dayWeek == '6'); 

    if ($nonWork || $nonWorkingDays <= 2 && $nonWorkingDays > 0) {
       echo $date->format('d - D') . PHP_EOL;
       
    }
    else {
      echo "+" . ($date->format('d - D')) . PHP_EOL;
      $nonWorkingDays = 0;
    }
    $nonWorkingDays++;
    
    
    $date->modify("+1 day");
    $col--;
  } while ($col > 0);
}
$year = 2025;
$month = 1;
$numMonth = 2;

for ($i = $month; $i < ($numMonth + $month); $i++) {
  showDataJobs($year, $i, $nonWorkingDays);
}
