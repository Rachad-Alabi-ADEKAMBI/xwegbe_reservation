<?php




//controle des input
function verifyInput($inputContent){
        $inputContent = htmlspecialchars(
            $inputContent
        );
    
        $inputContent = trim($inputContent);
    
        return $inputContent;
    }



$error = array('error' => false);

$action = '';

if(isset($_GET['action'])){
    $action = $_GET['action'];
}



if($action == 'getAllAppartments'){
        $sql = $pdo->prepare("SELECT * FROM appartments");
        $sql->execute();
        $appartments = array();
        while ($row = $sql->fetch()){
                array_push($appartments, $row);
        }

       
        echo json_encode($appartments);
}

if($action == 'addAppartment'){
        $name = verifyInput($_POST['name']);
        $price = verifyInput($_POST['price']);
        $rooms = verifyInput($_POST['rooms']);
        $location = verifyInput($_POST['location']);
        $short_description = verifyInput($_POST['short_description']);
        $long_description = verifyInput($_POST['long_description']);
        $picture_1 = verifyInput($_POST['picture_1']);
        $picture_2 = verifyInput($_POST['picture_2']);
        $picture_3 = verifyInput($_POST['picture_3']);
        $picture_4 = verifyInput($_POST['picture_4']); 
        $picture_5 = verifyInput($_POST['picture_5']);
        $wi_fi = verifyInput($_POST['wi_fi']);
        $air_conditionner = verifyInput($_POST['air_conditionner']);
        $free_parking = verifyInput($_POST['free_parking']);
        $dryer = verifyInput($_POST['dryer']);
        $oven = verifyInput($_POST['oven']);
        $fridge = verifyInput($_POST['fridge']);
        $private_entrance = verifyInput($_POST['privaete_entrance']);
        $tv = verifyInput($_POST['tv']);
        $dishes = verifyInput($_POST['dishes']);
        $stars = 3;
        $status = 'Libre';
      

    $sql = $pdo->prepare("INSERT INTO appartments SET name = ?, price = ?,
    rooms = ?, location = ?, short_description = ?, long_description = ?,
    picture_1 = ?, picture_2 = ?, picture_3 = ?, picture_4 = ?,
    picture_5 = ?, wi_fi = ?, air_conditionner = ?, stars = ?, status = ?,
    free_parking = ?, dryer =?, oven = ?, fridge = ? , private_entrance = ?,
    tv = ?, dishes = ?");

       $sql->execute(array($name, $price, $rooms, $location, $short_description, $long_description,
        $picture_1, $picture_2, $picture_3, $picture_4, $picture_5, $wi_fi, $air_conditionner,
        $stars, $status, $free_parking, $dryer, $oven, $fridge, $private_entrance, $tv, 
        $dishes  ));

     ?>
                <script>
                        alert("L'ajout est effectif");
                        window.location.replace("gestion-appartements.php");
                        exit();
                </script>
     <?php
  
       
}

//$results['appartments'] = $appartments;
// echo json_encode($appartments);

