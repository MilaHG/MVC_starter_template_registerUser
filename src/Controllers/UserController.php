<?php

namespace App\Controllers;

use App\Models\UserManager;
use App\Models\User;

// CETTE CLASSE REGROUPE TOUTES LES FONCTIONNALITES CONCERNANT UN OBJET DE TYPE User
class UserController
{
    // on déclare un attribut de type userManager
    private $userManager;

    // Méthode constructeur de la classe
    public function __construct()
    {
        // on instancie un objet de type userManager
        $this->userManager = new UserManager();
    }

    /** HomePage **/
    public function index(): void
    {
        $users = $this->userManager->findAllUsers();

        $nbRes = count($users);
        if ($nbRes >= 1) {
            $content = "<p>$nbRes magical user(s) found.</p>";
        } else {
            $content = "<p>No user found, sorry.</p>";
        }

        $content .= "<div class='container'>";


        foreach ($users as $username => $tasks) {

            $content .= "<article><div class='container'>";
            $content .= "<h3>{$username}</h3>"; // Accéder à la clé 'username' du tableau associatif

            $content .= "<ul>";
            foreach ($tasks as $task) {
                $content .= "<li>{$task}</li>"; // Accéder aux valeurs des tâches
            }

            $content .= "</ul>";

            $content .= "</article>";
        }
        $content .= "</div>";

        require VIEWS . 'Layout.php';
    }

    // Méthode permettant d'enregistrer un utilisateur
    // étape 1 - afficher le formulaire
    public function getFormRegisterUser(): void
    {
        require VIEWS . 'FormRegisterUser.php';
    }

    // étape 2 - enregistrer l'utilisateur
    public function registerUser(): void
    {
        // on stocke les données du formulaire en session
        $_SESSION['POST'] = $_POST;

        // on instancie un objet User
        $user = new User();
        // on hydrate l'objet User avec les valeurs postées dans le formulaire si le mot de passe et la confirmation sont identiques
        if ($_POST['password'] !== $_POST['password_confirm']) {
            $_SESSION['error'] = 'Les mots de passe ne correspondent pas';
            header('Location: /user/register');
            exit;
        } else {
            $user->setUsername(htmlspecialchars($_POST['username']));
            $user->setPassword(password_hash($_POST['password'], PASSWORD_DEFAULT));

            // on persiste l'objet User en BDD
            $this->userManager->persist($user);
        }
        // on redirige vers la page d'accueil en appelant la méthode index du controller
        header('Location: /');
    }
}

