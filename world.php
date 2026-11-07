<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

$country=$_GET['country'];
$isCityLookp= isset($_GET['lookup'])&& $_GET['lookup']=='cities';

if ($isCityLookp){
    $stmt= $conn -> query("SELECT cities.name, cities.district, cities.population 
                            FROM cities
                            JOIN countries ON cities.country_code=countries.code
                            WHERE countries.name LIKE '%$country%'");

}else{
  $stmt= $conn -> query("SELECT * FROM countries WHERE name LIKE '%$country%'");
}

$results=$stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<?php if ($isCityLookp):?>
  <table>
  <thead>
    <tr>
      <th> Name</th>
      <th> District</th>
      <th> Population</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($results as $row):?>
      <tr>
        <td><?=$row['name']; ?></td>
        <td><?=$row['district']; ?></td>
        <td><?=$row['population']; ?></td>
      </tr>
      <?php endforeach; ?>
  </tbody>
</table>
<?php else: ?>
<table>
  <thead>
    <tr>
      <th> Name</th>
      <th> Continent</th>
      <th> Independence</th>
      <th> Head of state</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($results as $row):?>
      <tr>
        <td><?=$row['name']; ?></td>
        <td><?=$row['continent']; ?></td>
        <td><?=$row['independence_year']; ?></td>
        <td><?=$row['head_of_state']; ?></td>
      </tr>
      <?php endforeach; ?>
  </tbody>
</table>
<?php endif; ?>
