<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <?php $question = 'Racontez votre rêve à Onirix !'; ?>
    <textarea name="dream" placeholder='<?php echo $question; ?>'></textarea>
    <input type="submit">
</form>

<?php
if (isset($_POST['dream'])) {
    include './functions/request.php';
    $answer = getDreamMeaning($_POST(['dream']));
    echo "<p>Voici la signification de votre rêve : " . $answer . "</p>";
}

?>