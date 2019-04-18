<?php

//load.php

$connect = new PDO('mysql:host=localhost;dbname=guesthouse', 'root', '');
$data = array();

$query = "SELECT * FROM calendar ORDER BY id";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
 $data[] = array(
  'id'   => $row["id"],
  'title'   => $row["available_rooms"],
  'start'   => $row["start_time"],
  'end'   => $row["end_time"]
 );
}

echo json_encode($data);

?>
