<?php
require_once('dbconnect.php');

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);

//Päring kasutajale
$query = mysqli_query($mysqli, "SELECT * FROM `muusika_igapaevaelus`");

$pop = 0;
$hiphop= 0;
$rock = 0;
$elektrooniline = 0;
$metal = 0;
$klassikaline = 0;
$muu = 0;

while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
    if($row['lemmik_zanr'] == "Pop") {
        $pop += 1;
    }else if($row['lemmik_zanr'] == "Hip-Hop" || $row['lemmik_zanr'] == "Räpp" || $row['lemmik_zanr'] == "Rap") {
        $hiphop += 1;
    }else if($row['lemmik_zanr'] == "Rock") {
        $rock += 1;
    }else if($row['lemmik_zanr'] == "Elektrooniline") {
        $elektrooniline += 1;
    }else if($row['lemmik_zanr'] == "Metal") {
        $metal += 1;
    }else if($row['lemmik_zanr'] == "Klassikaline") {
        $klassikaline += 1;
    }else{
        $muu += 1;
    }
}

echo '{
    "cols": [
        {"id":"","label":"vastus","pattern":"","type":"string"},
        {"id":"","label":"vastus","pattern":"","type":"string"},
        {"id":"","label":"vastus","pattern":"","type":"string"},
        {"id":"","label":"vastus","pattern":"","type":"string"},
        {"id":"","label":"vastus","pattern":"","type":"string"},
        {"id":"","label":"vastus","pattern":"","type":"string"},
        {"id":"","label":"vastus","pattern":"","type":"string"}
      ],
    "rows": [
        {"c":[{"v":"Pop","f":null},{"v":' . $pop . ',"f":null}]},
        {"c":[{"v":"Hip-hop","f":null},{"v":' . $hiphop . ',"f":null}]},
        {"c":[{"v":"Rock","f":null},{"v":' . $rock . ',"f":null}]},
        {"c":[{"v":"Elektrooniline","f":null},{"v":' . $elektrooniline . ',"f":null}]},
        {"c":[{"v":"Metal","f":null},{"v":' . $metal . ',"f":null}]},
        {"c":[{"v":"Klassikaline","f":null},{"v":' . $klassikaline . ',"f":null}]},
        {"c":[{"v":"Muud žanrid","f":null},{"v":' . $muu . ',"f":null}]}
      ]
}';