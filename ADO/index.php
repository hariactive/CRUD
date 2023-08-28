<?php 
try{
$db = new PDO("mysql:host=localhost:3310;dbname=pdo","root","admin");
}catch(PDOException $e){
    echo "connection error: ".$e->getMessage();
}
$name = "sanjeev";
$address = "gola";

// $Query = $db-> query("INSERT INTO students (name, address) VALUES('$name','$address')");

$Query = $db-> prepare("INSERT INTO students (name, address) VALUES(?,?)");
$Query->execute([$name, $address]);

// $Fetch_Query = $db-> prepare ("SELECT * FROM students ");
// $Fetch_Query->execute();
// if($Fetch_Query){
//     // echo $Fetch_Query->rowCount();
//     $rows = $Fetch_Query ->fetchAll(PDO::FETCH_OBJ);
//     foreach($rows as $row):
//         echo $row -> name,"<br>";
//         echo $row -> address,"<hr>";
    
// endforeach;
// }else{
//     echo "failed";
// }

$id = 2;
$Fetch_Query = $db-> prepare ("SELECT * FROM students where id = ?");
$Fetch_Query->execute([$id]);

if($Fetch_Query){
    // echo $Fetch_Query->rowCount();
    $row = $Fetch_Query ->fetch(PDO::FETCH_OBJ);
    echo $row->name;
}else{
    echo "failed";
}

if($Query){
    echo "successfully inserted";
}else{
    echo "failed";
}
?>