<html>
  <head>
    <meta charset='UTF-8'/>
    <title> tableau distance</title>
  </head>
  <body>
    <h1>Distance</h1>
    <table>
    <thead>
      <tr>
        <th></th>
      <?php 
           include('parametres.php.inc');
       $pdo = new PDO("mysql:host=".$host.";dbname=".$bdd,$user,$password);
        $res = $pdo->query("select dsitinct nom from capitale");
        foreach($res as $resultat){
          echo "<th>".$resultat['nom']."</th>";
        }
        ?>
      </tr>
    </thead>
    <tbody>
      