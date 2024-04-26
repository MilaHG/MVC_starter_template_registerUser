<?php

namespace App\Models;

// id, username, password
class User
{
    // initialisation des attributs de la classe
    private $id;
    public $username;
    private $password;

    // constructeur
    public function __construct()
    {

    }

    // initialisation des méthodes de la classe
    public function setAll($id, $username, $password)
    {
        // Set $Id if it is not null
        $id === null ?: $this->setId($id);
        //$this->setId($id);

        // Set $username unconditionally
        $this->setUsername($username);

        // Set $password unconditionally
        $this->setPassword($password);
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

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getPassword()
    {
        return $this->password;
    }

}
