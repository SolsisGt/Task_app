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
        'course'=>$row['course'],
            'Task_end'=>$row['task_end'],
            'end_time'=>$row['end_time'],
            'description'=>$row['description'],
            'id'=>$row['id']
    );
}
$jsonstring=json_encode($json[0]);
echo $jsonstring;
?>