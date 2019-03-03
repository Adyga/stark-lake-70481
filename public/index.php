<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <title>Read CSV file</title>
</head>
<body>
<div class="container">
    <h1>My Contacts Listing</h1>
    <h3>Read in a CSV file into a HTML table</h3>
    <?php

    $row = 1;
    if (($handle = fopen("test.csv", "r")) !== FALSE) {

        echo '<table class="table table-bordered">';

        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $num = count($data);
            if ($row == 1) {
                echo '<thead><tr>';
            } else {
                echo '<tr>';
            }
            for ($c = 0; $c < $num; $c++) {
                //   echo $data[$c] . "<br />\n";
                if (empty($data[$c])) {
                    $value = "&nbsp;";
                } else {
                    $value = $data[$c];
                }
                if ($row == 1) {
                    echo '<th>' .$value. '</th>';
                } else {
                    echo '<td>' .$value. '</td>';
                }
            }
            if ($row == 1) {
                echo '</tr></thead><tbody>';
            } else {
                echo '</tr>';
            }
            $row++;
        }

        echo '</tbody></table>';
        fclose($handle);
    }
    ?>
</div>
</body>
<footer class="container">
    <hr>
    <p>&copy; 19 S - IS 601101-Web Systems Development -2019</p>
</footer>
</html>
