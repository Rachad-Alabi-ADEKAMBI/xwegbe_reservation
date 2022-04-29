<?php
/**
 * Plugin Name: Nouvelle recherche
 */

 add_shortcode('recherche', 'nouvelle_recherche');
    function nouvelle_recherche(){
      if(!empty($_POST)){
        $errors = array();
        
        if(!empty($_POST["action"])){
            $errors["action"] = "Veuillez entrer le type de recherche ";
        }

        if(!empty($_POST["nature"])){
            $errors["nature"] = "Veuillez renseigner la nature du bien";
        }

       
        if(!empty($_POST["reference"])){
            $errors["reference"] = "Veuillez renseigner la reference";
        }
        
        if(!empty($_POST["location"])){
            $errors["location"] = "Veuillez renseigner la localisation";
        }

        if(!empty($_POST["min_price"])){
            $errors["min_price"] = "Veuillez renseigner le prix minimum";
        }

        if(!empty($_POST["max_price"])){
            $errors["max_price"] = "Veuillez renseigner le prix maximum";
        }

        if(!empty($_POST["min_area"])){
            $errors["min_area"] = "Veuillez renseigner la surface minimum";
        }

        if(!empty($_POST["max_area"])){
            $errors["max_area"] = "Veuillez renseigner la surface maximum";
        }

        if(!empty($_POST["min_rooms"])){
            $errors["min_rooms"] = "Veuillez renseigner le nombre de pieces minimum";
        }

        if(!empty($_POST["max_rooms"])){
            $errors["max_rooms"] = "Veuillez renseigner le nombre de pièces maximum";
        }
        
        if (empty($errors)):?>

            <div class="alert" width=400>
                    <ul>
                        <?php foreach ($errors as $error): ?>   
                        <li style="color: red;"><?= $error; ?></li>
                        <?php endforeach;?>
                    </ul>
            </div>
            <?php endif; 
            
        if(!empty($errors)){
            //on se connecte a la bdd
                            try
                {
                    $pdo = new PDO('mysql:host=localhost;dbname=site2r;charset=utf8', 'root', '');
                }
                catch(Exception $e)
                {
                        die('Erreur : '.$e->getMessage());
                }
            
                //controle des input
                //controle des input
                function verifyInput($inputContent){
                    $inputContent = htmlspecialchars(
                        $inputContent
                    );

                    $inputContent = trim($inputContent);

                    return $inputContent;
                }



            //on fait la recherche
            $nature = verifyInput($_POST['nature']);
            $location = verifyInput($_POST['location']);
            $action = verifyInput($_POST['action']);
            $min_price = verifyInput($_POST['min_price']);
            $max_price = verifyInput($_POST['max_price']);
            $min_area = verifyInput($_POST['min_area']);
            $max_area = verifyInput($_POST['max_area']);
            $min_rooms = verifyInput($_POST['min_rooms']);
            $max_rooms = verifyInput($_POST['max_rooms']);


            $sql = $pdo->prepare("SELECT * FORM articles WHERE 
            nature = ?");
            $sql->execute(array($nature));
            $nbr= $sql->rowCount();

           // echo $nature;
            
            echo "Nombre de " .$nature. " correspondant = " .$nbr;

        }
    }


        echo('
        <form action="" class="form" method="POST">
        <div class="form__box">
            <div class="form__box__items">
                <label for="">
                   <select name="action" id="" required>
                       <option value="vente">Vente</option>
                       
                   </select>
                </label>
  
                <label for="">
                    <input type="text" name="reference" placeholder="Référence">
                </label>
            </div> 
  
            <div class="form__box__items">
               
  
                <label for="">
                    <select name="nature" id="">
                        <option value="">Type de bien</option>
                        <option value="Appartement">Appartement</option>
                        <option value="Maison">Maison</option>
                        <option value="Studio">Studio</option>
                        <option value="Immeuble">Immeuble</option>
                    </select>
                </label>
  
                <label for="">
                    <select name="location" id="" required>
                        <option value="vendre">Localisation</option>
                        <option value="77600-Bussy-SaintGeorges">77600-Bussy-Saint-Georges</option>
                        <option value="77400-Carnetin">77400-Carnetin</option>
                        <option value="77600-Chanteloup-en-Brie">77600-Chanteloup-en-Brie</option>
                    </select> 
                </label>
            </div> 
  
            <div class="form__box__items">
               
  
               <label for="">
                  <input type="number"   onkeyup="if(this.value<0){this.value= this.value * -1}"
                   placeholder="Prix min"  name="min_price" required>
               </label>
                  <label>
                               <input type="number"   onkeyup="if(this.value<0){this.value= this.value * -1}"
                   placeholder="Prix max" required name="max_price">
               </label>
           </div> 
  
           <div class="form__box__items">
              
           <label for="">
                  <input type="number"   onkeyup="if(this.value<0){this.value= this.value * -1}"
                   placeholder="surface min.m2" required name="min_area">
               </label>
                  <label>
                               <input type="number"   onkeyup="if(this.value<0){this.value= this.value * -1}"
                   placeholder="Surface max m2" required name="max_area">
               </label>
           </div> 
  
           <div class="form__box__items">
              
              <label for="">
                     <input type="number"   onkeyup="if(this.value<0){this.value= this.value * -1}"
                      placeholder="Nb pièces min" required name="min_rooms">
                  </label>
                     <label>
                                  <input type="number"   onkeyup="if(this.value<0){this.value= this.value * -1}"
                      placeholder="Nb pièces max" required name="max_rooms">
                  </label>
              </div> 
  
           <div class="form__box__items">
              
  
               <button type="submit">
                   Rechercher
               </button>
           </div> 
        </div>
      </form>

        <style>

        .form {
            text-align: center;
            margin: 50px auto;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
                -ms-flex-direction: row;
                    flex-direction: row;
            -ms-flex-wrap: wrap;
                flex-wrap: wrap;
            text-align: center;
          }
          
          .form__box {
            text-align: center;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
                -ms-flex-direction: row;
                    flex-direction: row;
            -ms-flex-wrap: wrap;
                flex-wrap: wrap;
            margin: auto;
          }
          
          .form__box__items {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
                -ms-flex-direction: row;
                    flex-direction: row;
            -ms-flex-wrap: wrap;
                flex-wrap: wrap;
            -ms-flex-direction: column;
                flex-direction: column;
          }
          
          .form__box__items button {
            height: 84px;
            margin: auto;
            width: 110px;
            background-color: #8CC63F;
            color: white;
            font-weight: bold;
            cursor: pointer;
            border: 1px solid #8CC63F;
          }
          
          .form__box__items label input {
            margin: 10px;
            width: 90px;
            border: 1px solid #8CC63F;
            color: grey;
            width: 100px;
            height: 32px;
          }
          
          .form__box__items label select {
            margin: 10px;
            width: 90px;
            border: 1px solid #8CC63F;
            color: grey;
            height: 36px;
            width: 106px;
          }
          
          /*responsive for 1280px*/
          /*# sourceMappingURL=style.css.map */
        </style>
        
        
        ');
    }
 ?>