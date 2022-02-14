<?php
// 1.
$dir = '/Users/artemshevelev/Desktop/test';
$rdir = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir), true);


foreach($rdir as $file)
{
    print str_repeat("---", $rdir->getDepth()).$file.PHP_EOL;
}


// 2. Определить сложность следующих алгоритмов

// поиск элемента массива с известным индексом:
// у нас один цикл, проходит поиск по обычному массиву, тогда получим сложность O(n)

// дублирование массива через foreach:
// У нас так же один цикл и одно действие внутри цикла. Получим O(1n), по правилам O(1n) = O(n)

// рекурсивная функция нахождения факториала числа:
// Сложность зависит также от количества итераций рекурсии. Например при факториале 6, получим сложность O(6N), что также равно О(n).

// 3. Определить сложность следующих алгоритмов. Сколько произойдет итераций?

// 1
// $n = 100;
// $array[]= [];
// for ($i = 0; $i < $n; $i++)
// {
//     for ($j = 1; $j < $n; $j *= 2)
//     {
//         $array[$i][$j]= true;
//     }
// }
// Так как цикл в цикле, то сложность будет O(n^2). Во внутреннем цикле пройдет семь итераций, тогда всего будет 700.


// 2
// $n = 100;
// $array[] = [];
// $k=0;
// $kk=0;
// for ($i = 0; $i < $n; $i += 2)
// {
//     $k++;
//     for ($j = $i; $j < $n; $j++)
//     {
//         $kk++;
//         $array[$i][$j]= true;
//     }
// }
// print $k+$kk;
// Так как цикл в цикле, то сложность будет O(n^2). я попытался посичтать вручную, понял, что там много и ввел два счетчика. Получилось 2600 итераций)

