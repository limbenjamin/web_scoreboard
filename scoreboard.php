<html>
<body>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<form style="margin:1em">
<?php

$db = new SQLite3('score.db');
$query = $db->query("SELECT * FROM score ORDER BY id ASC");
$firstRow = true;
echo '<div class="table-responsive"><table id="dt" class="table" border="1">';
while ($row = $query->fetchArray(SQLITE3_ASSOC)) {
    if ($firstRow) {
        echo '<thead><tr>';
        foreach ($row as $key => $value) {
            echo '<th>'.$key.'</th>';
        }
        echo '</tr></thead>';
        echo '<tbody>';
        $firstRow = false;
    }

    echo '<tr>';
    foreach ($row as $value) {
        echo '<td>'.$value.'</td>';
    }
    echo '</tr>';
}
echo '</tbody>';
echo '</table></div>';

?>
</form>
<script>
$(document).ready(function () {
$('#dt').DataTable({
	"pageLength": 50
});
$('.dataTables_length').addClass('bs-select');
});
</script>
<style>
table.dataTable thead .sorting:after,
table.dataTable thead .sorting:before,
table.dataTable thead .sorting_asc:after,
table.dataTable thead .sorting_asc:before,
table.dataTable thead .sorting_asc_disabled:after,
table.dataTable thead .sorting_asc_disabled:before,
table.dataTable thead .sorting_desc:after,
table.dataTable thead .sorting_desc:before,
table.dataTable thead .sorting_desc_disabled:after,
table.dataTable thead .sorting_desc_disabled:before {
bottom: .5em;
}
</style>
</body>
</html>