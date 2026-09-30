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
				ORDER BY title
			;');
			$statement->execute([
			]);
			
			while ($book = $statement->fetch()) {
				$title = $book['title'];
				$date  = $book['release_date'];
				$index = $book['id'];
				
				echo <<<END
		<li>
					<a href='/book.php?index=$index'>
						$title ($date)
					</a>
				</li> 
		END;
			}
		?>
	</ul>
</body>
</html>
