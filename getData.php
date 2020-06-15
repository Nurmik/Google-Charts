<?php
require_once('dbconnect.php');

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
 
//Päring kasutajale
$query = mysqli_query($mysqli, "SELECT * FROM `muusika_igapaevaelus`");

$suguM = 0;
$suguN = 0;

  
while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
    if ($row['sugu'] == "Mees") {
        $suguM += 1;
    } else if ($row['sugu'] == "Naine") {
        $suguN += 1;
    }
}

  
echo '{
    "cols": [
        {"id":"","label":"vastus","pattern":"","type":"string"},
        {"id":"","label":"vastus","pattern":"","type":"string"}
      ],
    "rows": [
        {"c":[{"v":"Mees","f":null},{"v":' . $suguM . ',"f":null}]},
        {"c":[{"v":"Naine","f":null},{"v":' . $suguN . ',"f":null}]}
      ]
}';

