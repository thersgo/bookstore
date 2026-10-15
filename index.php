<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width"/>
	<link href="./style.css" rel="stylesheet">
	<title>Bookstore</title>
	
	<?php include 'database.php' ?>
</head>

<body>
	<div class='grid grid-cols-[repeat(auto-fill,minmax(320px,1fr))] m-4'>
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
				$cover = $book['cover_path'];
				$type  = $book['type'];
				
				echo <<<END
		<a href='/book.php?index=$index' class='
					m-2 p-2 h-100 rounded-lg bg-black text-white
					flex flex-col justify-between items-center text-center
				'>
					<img
						class='object-contain h-full'
						loading='lazy' src='$cover'
					/>
					<div>
						$title <br/>
						($date; $type)
					</div>
				</a>
		END;
			}
		?>
	</ul>
</body>
</html>
