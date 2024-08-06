<!DOCTYPE html>
<html>

<head>
    <title>Users</title>
</head>

<body>
    <h1>Users</h1>
    <a href="/users/create">Create User</a>
    <?php if (isset($_SESSION['message'])): ?>
        <p><?php echo $_SESSION['message'];
        unset($_SESSION['message']); ?></p>
    <?php endif; ?>
    <ul>
        <?php foreach ($users as $user): ?>
            <li>
                <a href="#">
                    <?php echo $user['name']; ?>
                </a>
                <a href="/users/edit?id=<?php echo $user['id']; ?>">
                    Edit
                </a>
                <a href="/users/delete?id=<?php echo $user['id']; ?>">
                    Delete
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>

</html>