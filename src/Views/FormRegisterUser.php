<?php
include_once('Header.php');
?>

<main>
    <section>
        <h2>Register</h2>
        <form action="/user/register" method="POST">
            <div>
                <label for="username">Username</label>
                <input type="text" name="username" id="username" required>
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
            </div>
            <div>
                <label for="password_confirm">Confirm password</label>
                <input type="password" name="password_confirm" id="password_confirm" required>
            </div>
            <button type="submit">Register</button>
        </form>
    </section>
</main>
<?php
//si le formulaire est réaffiché avec des infos en session,
// on supprime la variable $_SESSION['POST']
if (isset($_SESSION['POST'])) { unset ($_SESSION['POST']);}
include_once('Footer.php');
