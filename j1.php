<html>
<body>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<form action="/gangshow/update.php" method="POST" style="margin:1em">
<input name="judge" value="1" hidden>
<?php
$db = new SQLite3('score.db');
$query = $db->query("SELECT id, name, creativity1, entertainment1, aesthetic1, teamwork1 FROM score ORDER BY id ASC");
$firstRow = true;
echo '<div class="table-responsive"><table class="table" border="1">';
while ($row = $query->fetchArray(SQLITE3_ASSOC)) {
    if ($firstRow) {
        echo '<thead><tr>';
        echo '<th>ID</th>';
        echo '<th>Name</th>';
        echo '<th>Originality/Creativity (1 to 10)</th>';
        echo '<th>Entertainment Value (1 to 10)</th>';
        echo '<th>Aesthetic Appeal (1 to 10)</th>';
        echo '<th>Teamwork (1 to 10)</th>';
        echo '</tr></thead>';
        echo '<tbody>';
        $firstRow = false;
    }

    echo '<tr>';
    $i = 0;
    foreach ($row as $value) {
        $j = $i - 1;
        if ($i == 0) {
            $index = $value;
        }
        if ($value != null){
            if ($i < 2) {
                echo '<td>'.$value.'</td>';
            }else{
                echo '<td>'.$value.'&nbsp;&nbsp;&nbsp;<input type="number" name="'. $index .'_'. $j .'" min="1" max="10"></td>';
            }
        }else{
            echo '<td><input type="number" name="'. $index .'_'. $j .'" min="1" max="10"></td>';
        }
        $i++;
    }
    echo '</tr>';
}
echo '</tbody>';
echo '</table></div>';
?>
<br />
<input type="submit" value="Save">
</form>
</body>
</html>
