<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }
    
        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
    
        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>
<?php
	include_once('defaults/head.php');
?>

<body>

<div class="container">
	<?php
		include_once('defaults/header.php');
		include_once('defaults/menu.php');
		include_once('defaults/pictures.php');
	?>
	
	
	<div class="row gy-3 ">
		
  
		<?php
           global $fietsen;
            
            $index = 1;
    try{
        echo "<table>";
        echo "<tr>";
        echo "<td><strong>nr</strong></td>";
        echo "<td><strong>Merk</strong></td>";
        echo "<td><strong>Type</strong></td>";
        echo "<td><strong>datails</strong></td>";
        echo "</tr>";
        foreach ($fietsen as $fiets) {
            echo "<tr>";
            echo "<td>" . $index . "</td>";
            echo "<td>" . $fiets["merk"] . " </td>";
            echo "<td>" . $fiets["type"] . "</td>";
            echo "<td>";
            echo "<a href='/detail/" . $fiets['id'] . "'>";
            echo "details";
            echo "</a><br>";
            echo "</td>";
            echo "<td>";
            echo "<a href='/update/" . $fiets['id'] . "'>";
            echo "update";
            echo "</a><br>";
            echo "</td>";
            echo "<td>";
            echo "<a href='/delete/" . $fiets['id'] . "'>";
            echo "delete";
            echo "</a><br>";
            echo "</td>";
            echo "</tr>";
            $index++;
    }
        } catch (\PDOException $e) {
                throw new \PDOException($e->getMessage(), (int)$e->getCode());
            }
    echo "</table>";
    
    echo "<a href='/insert/'>";
            echo "insert";
            echo "</a> "
		 ?>
	
	</div>
	
	<hr>
	<?php
		include_once('defaults/footer.php');
	
	?>
</div>

</body>
</html>