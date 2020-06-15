<?php
require_once('dbconnect.php');

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);

//Päring kasutajale
$query = mysqli_query($mysqli, "SELECT * FROM `muusika_igapaevaelus`");

$vanus1 = 0;
$vanus2 = 0;
$vanus3 = 0;
$vanus4 = 0;


while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
    if($row['vanus'] == "1-10") {
        $vanus1 += 1;
    }else if($row['vanus'] == "11-20") {
        $vanus2 += 1;
    }else if($row['vanus'] == "21-30") {
        $vanus3 += 1;
    }else if($row['vanus'] == "31+") {
        $vanus4 += 1;
    }else{

    }
}

echo '{

    "cols": [
        {"id":"","label":"vastus","pattern":"","type":"string"},
        {"id":"","label":"vastus","pattern":"","type":"string"},
        {"id":"","label":"vastus","pattern":"","type":"string"},
        {"id":"","label":"vastus","pattern":"","type":"string"}
      ],
    "rows": [
        {"c":[{"v":"1-10","f":null},{"v":' . $vanus1 . ',"f":null}]},
        {"c":[{"v":"11-20","f":null},{"v":' . $vanus2 . ',"f":null}]},
        {"c":[{"v":"21-30","f":null},{"v":' . $vanus3 . ',"f":null}]},
        {"c":[{"v":"31+","f":null},{"v":' . $vanus4 . ',"f":null}]}
      ]
}';