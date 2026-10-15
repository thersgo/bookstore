<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width"/>
	<link href="./style.css" rel="stylesheet">
	<title>Bookstore</title>
	
	<?php include 'database.php' ?>
</head>

<body class='bg-black m-0'>
	<main class='
		min-h-screen mt-0 max-w-256 mx-auto
		bg-slate-800 text-slate-300
	'>
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
			$price    = $book['price'];
			$pages    = $book['pages'];
			
			$summary  = $book['summary'];
			
			echo <<<END
			<div class='flex p-8 flex-col sm:flex-row'>
				<img src="$cover" class='
					object-contain h-full
					sm:w-auto sm:h-full
				'>
				<div class='sm:ml-8'>
					<ul class='
						flex flex-col mt-8 sm:mt-0 mb-8
						justify-between gap-2
					'>
						<li class='text-3xl'>$title ($type)</li>
						<li>Release date: $date</li>
						<li>Language: $language</li>
						<li>Price: $price</li>
						<li>Page count: $pages</li>
					</ul>
					<p>
						$summary
					</p>
				</div>
			</div>
			END;
		?>
	</main>
</body>
</html>
