<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mezabi - Edit category</title>
    <link rel="stylesheet" href="/mezabi-1/static/css/mezabi.css">
</head>
<body>

<?php
spl_autoload_extensions(".php");
spl_autoload_register();

use yasmf\HttpHelper;

?>

<h1>Mezabi</h1>

<a href="/mezabi-1">Catégories</a> > Edition catégorie

<h2>Catégorie <?php echo $code ?></h2>

<?php if ($message != null)  { ?>
<p style="color: darkgreen"><?php echo $message ?></p>
<?php } ?>
<?php if ($error != null)  { ?>
    <p style="color: crimson"><?php echo $error ?></p>
<?php } ?>

<form action="index.php" method="post">
    <input type="hidden" name="action" value="saveCategorie">
    <input type="hidden" name="edition" value="true">
    <input type="hidden" name="code_categorie" value="<?php echo $code ?>">
    <input name="categorie" type="text" placeholder="Désignation" value="<?php echo $designation ?>">
    <input type="submit" value="OK">
</form>

</body>
</html>
