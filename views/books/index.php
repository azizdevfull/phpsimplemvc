<!DOCTYPE html>
<html>

<head>
    <title>Books</title>
</head>

<body>
    <h1>Books</h1>
    <ul>
        <?php foreach ($books as $book): ?>
            <li>
                <a href="/books/show?id=<?php echo $book['id']; ?>">
                    <?php echo $book['title']; ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>

</html>