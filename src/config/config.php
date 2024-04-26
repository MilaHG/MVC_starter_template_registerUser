<?php
define("SRC", '../src/');
define("CONTROLLERS", '../src/controllers/');
define("MODELS", '../src/models/');
define("VIEWS", '../src/views/');

// HOST DATABASE USER PASSWORD sont des constantes définies dans le fichier de config
// qui permettent de définir l'adresse du serveur, le nom de la base de données et le login

/*** POUR WINDOWS ***/
//define('HOST', '127.0.0.1');
//define('DATABASE', 'todo');
//define('USER', 'root');
//define('PASSWORD', '');

/*** POUR MAC  ***/
define('HOST', 'localhost:8889');
define('DATABASE', 'todo');
define('USER', 'root');
define('PASSWORD', 'root');
