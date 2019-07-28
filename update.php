<?php
if (!empty($_POST)){

    $db = new SQLite3('score.db');

    if (isset($_POST["judge"])){
        $judge = $_POST["judge"];
    }
    foreach($_POST as $key=>$value){

        if (strstr($key, '_') && $value != null){
            $arr = explode("_", $key);
            if ($arr[1] == 1){
                $attrib = "creativity" . $judge;
            }
            if ($arr[1] == 2){
                $attrib = "entertainment" . $judge;
            }
            if ($arr[1] == 3){
                $attrib = "aesthetic" . $judge;
            }
            if ($arr[1] == 4){
                $attrib = "teamwork" . $judge;
            }
            $db->query("UPDATE score SET ". $attrib ."=". $value ." WHERE id=".$arr[0]);
            //echo "UPDATE score SET ". $attrib ."=". $value ." WHERE id=".$arr[0];

            //this section compute final score if all cols are filled
            $query = $db->query("SELECT * FROM score WHERE id=".$arr[0]);
            $null = false;
            while ($row = $query->fetchArray(SQLITE3_ASSOC)){
                if ($row["creativity1"] != null && $row["creativity2"] != null && $row["creativity3"] != null &&
                    $row["entertainment1"] != null && $row["entertainment2"] != null && $row["entertainment3"] != null &&
                    $row["aesthetic1"] != null && $row["aesthetic2"] != null && $row["aesthetic3"] != null &&
                    $row["teamwork1"] != null && $row["teamwork2"] != null && $row["teamwork3"] != null){
                    $final = ((($row["creativity1"] + $row["creativity2"] + $row["creativity3"]) * 0.3 ) + (($row["entertainment1"] + $row["entertainment2"] + $row["entertainment3"]) * 0.3)
                                + (($row["aesthetic1"] + $row["aesthetic2"] + $row["aesthetic3"]) * 0.2) + (($row["teamwork1"] + $row["teamwork2"] + $row["teamwork3"]) * 0.2));
                    $final = $final/30 * 100;
                    $db->query("UPDATE score SET final=". $final ." WHERE id=".$row["id"]);
                }
 
            }
        }
    }

    header('Location: ' . $_SERVER['HTTP_REFERER']);
    
}

?>
