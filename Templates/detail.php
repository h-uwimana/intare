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
			global $fiets;
			
			$index = 1;
			try{
				echo $fiets["merk"];
	
	echo "artikkelnummer: " .$fiets["id"]."<br>";
	echo "merk: ". $fiets["merk"]."<br>";
	echo "type: ". $fiets["type"]."<br>";
	echo "prijs: ". $fiets["prijs"]."<br>";
	echo "voorraad: ". $fiets["voorraad"]."<br>";
    echo "<a href='/fietsen'> terug </a>";
			
			} catch (\PDOException $e) {
				throw new \PDOException($e->getMessage(), (int)$e->getCode());
			}
			echo "</table>";
		?>
	
	</div>
	
	<hr>
	<?php
		include_once('defaults/footer.php');
	
	?>
</div>

</body>
</html>