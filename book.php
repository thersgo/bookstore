<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width"/>
	<title>Bookstore</title>
	
	<?php include 'database.php' ?>
</head>

<body style="background-color: #000; margin: 0;">
	<main style="
		width: 50%; margin-left: auto; margin-right: auto;
		background-color: #222; color: #ddd;
		min-height: 100vh; margin-top: 0;
	">
		<?php
			$statement = $pdo->prepare('
				SELECT * FROM books
				WHERE id = ?
			;');
			$statement->execute([
				$_GET['index']
			]);
			
			$book = $statement->fetch();
			
			$title    = $book['title'];
			$type     = $book['type'];
			$cover    = $book['cover_path'];
			
			$date     = $book['release_date'];
			$language = $book['language'];
			$pages    = $book['pages'];
			
			$summary  = $book['summary'];
			
			echo <<<END
			<div style="display: flex; padding: 10px">
				<img src="$cover">
				<div style="margin-left: 5px; margin-top: 0;"
					<h1 style="margin-top: 0;">
						$title ($type)
					</h1>
					<ul>
						<li>Release date: $date</li>
						<li>Language: $language</li>
						<li>Price: $price</li>
						<li>Page count: $pages</li>
					</ul>
				</div>
			</div>
			<p style="padding-left: 2rem; padding-right: 2rem;">
				$summary
			</p>
			END;
		?>
	</main>
</body>
</html>
