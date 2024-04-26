<?php

namespace App\Models;

use PDO;

// id, username, password
class UserManager
{
    /** Connection PDO **/
    private PDO $connexion;

    public function __construct()
    {
        $this->connexion = ConnexionPDO::getPdo();
    }

    /**
     * Find All users
     */
    public function findAllUsers(): array
    {
        $query = 'SELECT u.username, t.task 
                  FROM user u 
                  INNER JOIN todolist t ON u.id = t.user_id 
                  ORDER BY u.username';

        $stmt = $this->connexion->prepare($query);
        $stmt->execute();

        $tasksByUser = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $username = $row['username'];
            $task = $row['task'];

            // Stocker les tâches dans un tableau associatif avec l'utilisateur comme clé
            if (!isset($tasksByUser[$username])) {
                $tasksByUser[$username] = [];
            }
            $tasksByUser[$username][] = $task;
        }

        return $tasksByUser;
    }

    /**
     * Persist one user
     */
    public function persist(User $user)
    {
        $query = 'INSERT INTO user (username, password) VALUES (:username, :password)';

        $stmt = $this->connexion->prepare($query);
        $stmt->bindValue('username', $user->getUsername());
        $stmt->bindValue('password', $user->getPassword());

        $stmt->execute();
        $user->setId((int)$this->connexion->lastInsertId());

        return $this->connexion->lastInsertId();
    }
}
