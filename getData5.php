<?php
require_once('dbconnect.php');

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);

//Päring kasutajale
$query = mysqli_query($mysqli, "SELECT * FROM `muusika_igapaevaelus`");

$kolarid = 0;
$klapid = 0;
$muu = 0;

while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
    if($row['kuidas_kuulate'] == "Kolaritega") {
        $kolarid += 1;
    }else if($row['kuidas_kuulate'] == "Korvaklappidega") {
        $klapid += 1;
    }else{
        $muu += 1;
    }
}

echo '{
    "cols": [
        {"id":"","label":"vastus","pattern":"","type":"string"},
        {"id":"","label":"vastus","pattern":"","type":"string"},
        {"id":"","label":"vastus","pattern":"","type":"string"}
      ],
    "rows": [
        {"c":[{"v":"Kõlaritega","f":null},{"v":' . $kolarid . ',"f":null}]},
        {"c":[{"v":"Kõrvaklappidega","f":null},{"v":' . $klapid . ',"f":null}]},
        {"c":[{"v":"Ei kuula muusikat","f":null},{"v":' . $muu . ',"f":null}]}
      ]
}';