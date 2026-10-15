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
		<ul class='pt-8 flex justify-around'>
			<a class='font-bold' href='/'>Change</a>
			<a class='font-bold' href='/'>Remove</a>
			<a class='font-bold' href='/'>Return</a>
		</ul>
		<?php
			$id = $_GET['index'];
			
			$book_statement = $pdo->prepare('
				SELECT * FROM books
				WHERE id = ?
			;');
			$book_statement->execute([$id]);
			
			$book = $book_statement->fetch();
			
			$title    = $book['title'];
			$type     = $book['type'];
			$cover    = $book['cover_path'];
			
			$date     = $book['release_date'];
			$language = $book['language'];
			$price    = round($book['price'], 2);
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
									
				END; // so the resulting html would still look nice
			
			$relation_statement = $pdo->prepare('
				SELECT author_id FROM book_authors
				WHERE book_id = ?
			;');
			$relation_statement->execute([$id]);
			
			$authors = [];
			while ($relation = $relation_statement->fetch()) {
				$author_statement = $pdo->prepare('
					SELECT * FROM authors
					WHERE id = ?
				;');
				$author_statement->execute([$relation['author_id']]);
				$author = $author_statement->fetch();
				if ($author) {
					$authors[] = $author['first_name'] .
						' ' . $author['last_name'];
				}
			}
			echo "<li>Author(s): " . implode(', ', $authors) . "</li>\n";
			
			echo <<<END
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
