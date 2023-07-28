<?php
require_once __DIR__ . '/User.php';

class Users
{
    private $dataFile = 'JSON/users.json';
    private $users = [];

    public function __construct()
    {
        $this->loadData();
    }

    public function getAllUsers()
    {
        return $this->users;
    }

    public function addUser($name, $email)
    {
        $newUserId = uniqid();
        $user = new User($newUserId, $name, $email);
        $this->users[] = $user;
        $this->saveData();
    }

    public function deleteUser($userId)
    {
        $this->users = array_filter($this->users, function ($user) use ($userId) {
            return $user->getId() !== $userId;
        });
        $this->saveData();
    }

    private function loadData()
    {
        if (file_exists($this->dataFile)) {
            $data = file_get_contents($this->dataFile);
            $userData = json_decode($data, true);
            foreach ($userData as $user) {
                $this->users[] = new User($user['id'], $user['name'], $user['email']);
            }
        }
    }

    private function saveData()
    {
        $userData = [];
        foreach ($this->users as $user) {
            $userData[] = [
                'id' => $user->getId(),
                'name' => $user->getName(),
                'email' => $user->getEmail()
            ];
        }
        file_put_contents($this->dataFile, json_encode($userData, JSON_PRETTY_PRINT));
    }
}