<?php
$array  = range(0,1000);
shuffle($array);
function bubbleSort($array){
    $start_time = microtime(true);
    for($i=0; $i<count($array); $i++)
    {
        $count = count($array);
        for($j=$i+1; $j<$count; $j++)
        {
           if($array[$i]>$array[$j]){
               $temp = $array[$j];
               $array[$j] = $array[$i];
               $array[$i] = $temp;
           }
        }
        print 'i: '.$i.PHP_EOL;
   }
   $end_time = microtime(true);
   print_r($array);
   print $end_time-$start_time.PHP_EOL;
}

function shakerSort ($array)
{
    $start_time = microtime(true);
    $n = count($array);
    $left = 0;
    $right = $n - 1;
    do
    {
        for ($i = $left; $i < $right; $i++)
        {
            if ($array[$i] > $array[$i + 1])
            {
                list($array[$i], $array[$i + 1]) = array($array[$i + 1], $array[$i]);
            }
        }
        $right -= 1;
        for ($i = $right; $i > $left; $i--)
        {
            if ($array[$i] < $array[$i - 1])
            {
                list($array[$i], $array[$i - 1]) = array($array[$i - 1], $array[$i]);
            }
        }
        $left += 1;
        print 'i: '.$i.PHP_EOL;
    } while ($left <= $right);
    $end_time = microtime(true);
    print_r($array);
    print $end_time-$start_time.PHP_EOL;
}

function quickSort(&$arr, $low, $high)
{
    $start_time = microtime(true);
    $i = $low;
    $j = $high;
    $middle = $arr[ ( $low + $high ) / 2 ];
    do
    {
        while($arr[$i] < $middle) ++$i;
        while($arr[$j] > $middle) --$j;
        if($i <= $j)
        {
            $temp = $arr[$i];
            $arr[$i] = $arr[$j];
            $arr[$j] = $temp;
            $i++; $j--;
        }
    }
    while($i < $j);

    if($low < $j)
    {
      quickSort($arr, $low, $j);
    }

    if($i < $high)
    {
      quickSort($arr, $i, $high);
    }
    $end_time = microtime(true);
    print 'i: '.$i.PHP_EOL;
    print_r($arr);
    print $end_time-$start_time.PHP_EOL;
}

// Процедура для преобразования в двоичную кучу поддерева с корневым узлом $i, что является индексом в $arr[]. $countArr — размер кучи
function printArray(&$arr)
{
$countArr = count($arr);
for ($i = 0; $i < $countArr; ++$i)
 echo ($arr[$i]." ") ;

}
function heapify(&$arr, $countArr, $i)
{
    $largest = $i; // Инициализируем наибольший элемент как корень
    $left = 2*$i + 1; // левый = 2*i + 1
    $right = 2*$i + 2; // правый = 2*i + 2

    if ($left < $countArr && $arr[$left] > $arr[$largest])
    {
        $largest = $left;
    }

    if ($right < $countArr && $arr[$right] > $arr[$largest])
    {
        $largest = $right;
    }

    if ($largest != $i)
    {
        $swap = $arr[$i];
        $arr[$i] = $arr[$largest];
        $arr[$largest] = $swap;
        heapify($arr, $countArr, $largest);
    }
}

//Основная функция, выполняющая пирамидальную сортировку
function heapSort(&$arr)
{
$start_time = microtime(true);
$countArr = count($arr);
// Построение кучи (перегруппируем массив)
for ($i = $countArr / 2 - 1; $i >= 0; $i--)
 heapify($arr, $countArr, $i);

//Один за другим извлекаем элементы из кучи
for ($i = $countArr-1; $i >= 0; $i--)
{
 // Перемещаем текущий корень в конец
 $temp = $arr[0];
 $arr[0] = $arr[$i];
 $arr[$i] = $temp;

 // вызываем процедуру heapify на уменьшенной куче
 heapify($arr, $i, 0);
 print 'i: '.$i.PHP_EOL;
}
$end_time = microtime(true);
// print_r($arr);
print $end_time-$start_time.PHP_EOL;
printArray($arr);
}

// -----------------------
bubbleSort($array);
// среднее время выполнения 0.017567157745361
// i: 1000
shakerSort($array);
// // среднее время выполнения 0.031331062316895
// i: 499
quickSort($array,0,1000);
// // среднее время выполнения 5.4449610710144
// i: 740
heapSort($array);
// среднее время выполнения 0.0015280246734619
// i: 986
