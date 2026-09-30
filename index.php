<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width"/>
	<title>Bookstore</title>
	
	<?php
		$host    = 'localhost'; $db   = 'Books';
		include_once 'secrets.php';
		$charset = 'utf8mb4';
		
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
		$stmt = $pdo->query('
			SELECT * FROM books
			ORDER BY title
		;');
		while ($book = $stmt->fetch()) {
			$title = $book['title'];
			$date = $book['release_date'];
			echo "<li>$title ($date)</li>\n";
		}
		?>
	</ul>
</body>
</html>

