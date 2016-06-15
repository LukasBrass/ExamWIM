<html>
  <head>
    <meta charset='UTF-8'/>
    <title> tableau distance</title>
  </head>
  <body>
    <h1>Distance</h1>
    <table border=1>
    <thead>
      <tr>
        <th></th>
      <?php 
           include('parametres.php.inc');
       $pdo = new PDO("mysql:host=".$host.";dbname=".$bdd,$user,$password);
        $capitale1 = $pdo->query("select distinct nom from capitale");
        foreach($capitale1 as $resultat){
          echo "<th>".$resultat['nom']."</th>";
        }
        ?>
      </tr>
    </thead>
    <tbody>
        <?php 
        $cap1 = $pdo->query("select distinct nom,id from capitale");
        foreach($cap1 as $capitale1){
          echo "<tr><td>".$capitale1['nom']."</td>";
          $cap2 = $pdo->query("select id from capitale");
          foreach($cap2 as $capitale2){
            $stmt = $pdo->prepare("select distance from distance where id1 = :id1 and id2 = :id2");
            $stmt ->bindParam(':id1',$capitale1['id']);
            $stmt ->bindParam(':id2',$capitale2['id']);
            $stmt -> execute();
            while($res = $stmt -> fetch()){
              echo'<td>'.$res['distance'].'</td>';
            }
          }
          echo'</tr>';
        }
      ?>
      </tbody>
    </table>
  </body>
</html>