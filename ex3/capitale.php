<html>
  <head>
    <meta charset='UTF-8'/>
    <title> capitale</title>
  </head>
  <body>
    <h1>Capitales Européennes</h1>
    <form method='GET' action='capitale.php'>
      Choisissez une ville :
      <select name="idCapitale">
      <?php
        include('parametres.php.inc');
       $pdo = new PDO("mysql:host=".$host.";dbname=".$bdd,$user,$password);
        $res = $pdo->query("select id, nom from capitale");
        foreach($res as $resultat){
          echo "<option value=".$resultat['id'].">".$resultat['nom']."</option>";
        }
        echo'<input type="submit" value="Envoyer"></select>';
        
        
         if(isset($_GET['idCapitale'])){
          extract($_GET);
          $stmt= $pdo->prepare("select nom, image from capitale where id = :id");
           $stmt -> bindParam(':id',$idCapitale);
           $stmt -> execute();
           while($res = $stmt->fetch()){
		         echo "<h1>".$res['nom']."</h1><br>";
             echo'<a href="'.$res['image'].'"></a><br>';
           }
           $stmt = $pdo->prepare("select id2, distance from distance where id1 = :id and id2 != :id order by distance asc limit 1");
           $stmt -> bindParam(':id',$idCapitale);
           $stmt -> execute();
           while($res = $stmt-> fetch()){
             extract($res);
           }
           $stmt = $pdo->prepare("select nom from capitale where id = :id2");
           $stmt ->bindParam(':id2',$id2);
           $stmt -> execute();
           while($res = $stmt -> fetch()){
             echo'<ul>'; 
             echo'<li>Capitale la plus proche : <br>'.$res['nom'].' : '.$distance.'</li>';
           }
           $stmt = $pdo->prepare("select id2, distance from distance where id1 = :id and id2 != :id order by distance desc limit 1");
           $stmt -> bindParam(':id',$idCapitale);
           $stmt -> execute();
           while($res = $stmt-> fetch()){
             extract($res);
           }
           $stmt = $pdo->prepare("select nom from capitale where id = :id3");
           $stmt ->bindParam(':id3',$id2);
           $stmt -> execute();
           while($res = $stmt -> fetch()){
             echo'<li>Capitale la plus eloignée : <br>'.$res['nom'].' : '.$distance.'</li>';
             echo'</ul>';
           }
         }