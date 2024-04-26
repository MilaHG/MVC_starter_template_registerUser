<?php

namespace App\Models;

// id, task, user_id
class TodoList
{
    // initialisation des attributs de la classe
    private $id;
    public $task;
    private $user_id;

    // constructeur
    public function __construct()
    {

    }

    // initialisation des méthodes de la classe
    public function setAll($id, $task, $user_id)
    {
        // Set $Id if it is not null
        $id === null ?: $this->setId($id);
        //$this->setId($id);

        // Set $task unconditionally
        $this->setTask($task);

        // Set $user_id unconditionally
        $this->setUserId($user_id);
    }

    /*** ACCESSEURS ***/
    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setTask($task)
    {
        $this->task = $task;
    }

    public function getTask()
    {
        return $this->task;
    }

    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    public function getUserId()
    {
        return $this->user_id;
    }
}
