<!DOCTYPE html>
<html>
<head>
    <title>Users</title>
</head>
<body>
    <h1>Users</h1>
    <ul>
        <?php foreach ($users as $user): ?>
            <li>
                <a href="#">
                    <?php echo $user['name']; ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
