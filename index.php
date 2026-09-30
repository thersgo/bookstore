<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width"/>
	<title>Bookstore</title>
	
	<?php
		include_once 'config.php';
		
		$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
		$options = [
			PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
			PDO::ATTR_EMULATE_PREPARES   => false,
		];
		$pdo = new PDO($dsn, $user, $pass, $options);
		
		
	?>
	
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

