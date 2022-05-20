<?php


  /*  try

{

 $pdo = new PDO('mysql:host=localhost;dbname=adra7128_wp431;charset=utf8', 'adra7128_wp431', 'C5S!95pA]4');

}

catch(Exception $e)

{

     die('Erreur : '.$e->getMessage());

}
*/


 try

{

 $pdo = new PDO('mysql:host=localhost;dbname=xwegbe;charset=utf8', 'root', '');

}

catch(Exception $e)

{

     die('Erreur : '.$e->getMessage());

}


$error = array('error' => false);

$action = '';

if(isset($_GET['action'])){
    $action = $_GET['action'];
}





if($action == 'getAllAppartments'){
        $sql = $pdo->prepare("SELECT * FROM  wpbr_appartments");
        $sql->execute();
        $appartments = array();
        while ($row = $sql->fetch()){
                array_push($appartments, $row);
        }

       
        echo json_encode($appartments);
}

//$results['appartments'] = $appartments;
// echo json_encode($appartments);

