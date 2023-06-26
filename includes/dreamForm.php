<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <?php $question = 'Racontez votre rêve à Onirix !'; ?>
    <textarea name="dream" placeholder='<?php echo $question; ?>'></textarea>
    <input type="submit">
</form>

<?php
if (isset($_POST['dream'])) {
    echo "<p>Contenu du rêve : " . $_POST['dream'] . "</p>";
}
include './functions/request.php'
?>