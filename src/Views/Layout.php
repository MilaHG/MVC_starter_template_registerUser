<?php
include_once ('Header.php');
?>
    <main>
        <?php
        if(isset($content)) {
            echo $content;
        }
        ?>
    </main>

<?php
include_once ('Footer.php');
