<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemplo HTML + PHP</title>
</head>
<body>

    <form action="">
        <select name="" id="">
            <?php
                for ($i = 1; $i < 10; $i++) {
                    echo "<option value=\"$i\">$i</option>";
                } 
            ?>
        </select>
    </form>

    <form action="">
        <select name="" id="">
            <?php for ($i = 1; $i < 10; $i++) { ?>

                <option value="<?=$i?>"><?php echo ($i == 1) ? $i . " ano" : $i . " anos"  ?></option>

            <?php }?>
        </select>
    </form>
</body>
</html>