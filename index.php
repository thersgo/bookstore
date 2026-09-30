<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width"/>
	<title>Bookstore</title>
	
	<?php include 'database.php' ?>
</head>
<body>
	<ul>
		<?php
			$statement = $pdo->prepare('
				SELECT * FROM books
				ORDER BY ?
			;');
			$statement->execute([
				'title'
			]);
			
			while ($book = $statement->fetch()) {
				$title = $book['title'];
				$date = $book['release_date'];
				echo "<li>$title ($date)</li>\n";
			}
		?>
	</ul>
</body>
</html>

