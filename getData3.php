<?php
require_once('dbconnect.php');

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
 
//Päring kasutajale
$query = mysqli_query($mysqli, "SELECT * FROM `muusika_igapaevaelus`");

$jah = 0;
$ei = 0;

while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
    if($row['kas_kuulate'] == "Jah") {
        $jah += 1;
    }else if($row['kas_kuulate'] == "Ei") {
        $ei += 1;
    }
}
  
echo '{
    "cols": [
        {"id":"","label":"vastus","pattern":"","type":"string"},
        {"id":"","label":"vastus","pattern":"","type":"string"}
      ],
    "rows": [
        {"c":[{"v":"Jah","f":null},{"v":' . $jah . ',"f":null}]},
        {"c":[{"v":"Ei","f":null},{"v":' . $ei . ',"f":null}]}
      ]
}';