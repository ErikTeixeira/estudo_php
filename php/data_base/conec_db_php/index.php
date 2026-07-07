<?php
    include "function.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conectando com o banco</title>
</head>
<body>

    <?php foreach (selectClientts() as $clients ) : ?>
        <p id="<?php echo $clients["id"] ?>" > <?php echo $clients["name"] . " - " . $clients["age"] . " anos" ?> </p>
        </br>
    <?php endforeach; ?>

</body>
</html>
