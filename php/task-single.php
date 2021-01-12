<?php
include('database.php');
$id=$_POST['id'];
$query="SELECT * FROM task WHERE id='$id'";
$result=mysqli_query($connection,$query);
if(!$result){
    die('Query Falied');
}
$json=array();
while($row=mysqli_fetch_array($result)){
    $json[]=array(
        'name'=>$row['name'],
            'Task_start'=>$row['task_start'],
            'Task_end'=>$row['task_end'],
            'start_time'=>$row['star_time'],
            'end_time'=>$row['end_time'],
            'description'=>$row['description'],
            'id'=>$row['id']
    );
}
$jsonstring=json_encode($json[0]);
echo $jsonstring;
?>