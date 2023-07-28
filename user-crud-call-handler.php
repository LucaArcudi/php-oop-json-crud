<?php
    require_once __DIR__ . '/Classes/Users.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["add"])) {
            $users = new Users();
            $users->addUser($_POST["name"], $_POST["email"]);
        } elseif (isset($_POST["delete"])) {
            $users = new Users();
            $users->deleteUser($_POST["user_id"]);
        }
        // Redirect to avoid form resubmission on page reload
        header("Location: index.php");
    }

    $users = new Users();
    $userList = $users->getAllUsers();
    