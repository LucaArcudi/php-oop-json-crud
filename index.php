<!DOCTYPE html>
<html>
<head>
    <title>Simple CRUD App</title>
</head>
<body>
    <?php
        require_once __DIR__ . '/user-crud-handler.php';
    ?>

    <h2>Simple CRUD App</h2>

    <h3>Add User</h3>
    <form method="post">
        <label>Name:</label>
        <input type="text" name="name" required>
        <label>Email:</label>
        <input type="email" name="email" required>
        <input type="submit" name="add" value="Add">
    </form>

    <h3>Users List</h3>
    <ul>
        <?php foreach ($userList as $user): ?>
            <li>
                <?php echo $user->getName(); ?> (<?php echo $user->getEmail(); ?>)
                <form method="post" style="display: inline;">
                    <input type="hidden" name="user_id" value="<?php echo $user->getId(); ?>">
                    <input type="submit" name="delete" value="Delete" onclick="return confirm('Are you sure?')">
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>

