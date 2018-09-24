<?php
/**
 * Created by PhpStorm.
 * User: DSPC0030
 * Date: 2018/9/23
 * Time: 下午 02:19
 */

$postword = '
  xxx
';

$keypoint = '察顏觀色系列 : 了解獨立又美麗女性(時尚又聰穎的女性不打漆彈)<br>';
/*
 *  廣度優先搜尋
 * */
echo $keypoint;



$visited = array();

$newArrTree = [];

//foreach ($data_adjList as $key => $valueRow){
//
//    if(!in_array($key,$visited)){
//        echo $key."<br>";
//        array_push($visited,$key);
//    }
//     foreach ($valueRow as $item){
//         if(!in_array($item,$visited)){
//            echo $item."<br>";
//             array_push($visited,$item);
//             $queue->enqueue($item);
//         }
//     }
//
//}

/**
 * =====================================
 *  以上錯誤
 *=====================================
 */
$queue = new SplQueue();
$start_loc =  'A';

$data_adjList = [
    'A'=>['B','D'],
    'B'=>['A','C','F'],
    'C'=>['B','F','E'],
    'D'=>['A','G','H'],
    'E'=>['C','F'],
    'F'=>['B','E'],
    'G'=>['H','D'],
    'H'=>['D','G']
];

//foreach ($data_adjList[$start_loc] as $item) {
//    //$newArrTree[0][$start_loc][$item] =& $data_adjList[$item];
//    $newArrTree[0][$start_loc][$item]='path';
//    echo $item;
//}

//var_dump($data_adjList);
function getDataByKey($start_loc){
    global  $data_adjList;
    $newArrTree[]=array();
    foreach ($data_adjList[$start_loc] as $item) {
         //echo $item;
        for ($i=0;$i<count($data_adjList[$item]);$i++){
            $temp_name = $data_adjList[$item][$i];
              //echo $temp_name;
            for($j=0;$j<count($data_adjList[$temp_name]);$j++){
                $temp_inner_name = $data_adjList[$temp_name][$j];
                //echo $temp_inner_name;
                $newArrTree[0][$start_loc][$item][$temp_name][$temp_inner_name]='end!';
            }

        }
    }
    return $newArrTree;
    //var_dump($data_adjList);
}

$result=getDataByKey($start_loc);



echo "<br>BFS廣度遍歷順序 : ";

echo "<pre>";
print_r( $result );
echo "</pre>";

function queueIn($item){
    global  $visited;
    global $queue;
    if(!in_array($item,$visited)){
             array_push($visited,$item);
        $queue->enqueue($item);
    }

}
foreach ($result[0] as $key => $item){
//    echo "key: ".$key;
//    echo ",val: ".$item;
//    echo "<hr>";
    //print_r(array_keys($item));
    echo "<br>";
     $data_1 = $item;
    queueIn($key);

     foreach ($data_1 as $key => $item){
//         echo "key: ".$key;
//         echo ",val: ".$item;
//         echo "<hr>";
         //print_r(array_keys($item));
         echo "<br>";
         $data_2 = $item;
          queueIn($key);

         foreach ($data_2 as $key => $item){
//             echo "key: ".$key;
//             echo ",val: ".$item;
//             echo "<hr>";
             //print_r(array_keys($item));
             echo "<br>";
             $data_3 = $item;
              queueIn($key);
             foreach ($data_3 as $key => $item){
//                 echo "key: ".$key;
//                 echo ",val: ".$item;
//                 echo "<hr>";
                 //print_r(array_keys($item));
                 $data_4 = $item;
                  queueIn($key);
             }
         }
     }
}
print_r($queue);