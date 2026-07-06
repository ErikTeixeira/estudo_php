## 01 - colocar no html

```php
<?php

$hello = "Olá mundo";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemplo HTML + PHP</title>
</head>
<body>

    <p>
        <?php echo $hello; ?>
    </p>

</body>
</html>

```

---

## 02 - for

```php
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
    // ou
    <form action="">
        <select name="" id="">
            <?php for ($i = 1; $i < 10; $i++) { ?>
                
                <option value="<?=$i?>"><?=$i?></option>

            <?php }?>
        </select>
    </form>

</body>
```

---

## 03 - for + if

```php
    <form action="">
        <select name="" id="">
            <?php for ($i = 1; $i < 10; $i++) { ?>
                <?php if ( $i == 1 ) { ?>
                    <option value="<?=$i?>"><?php echo $i . " ano"  ?></option>
                <?php } else { ?>
                    <option value="<?=$i?>"><?php echo $i . " anos"  ?></option>
                <?php } ?>
            <?php }?>
        </select>

        // com operador ternario

        <select name="" id="">
            <?php for ($i = 1; $i < 10; $i++) { ?>

                <option value="<?=$i?>"><?php echo ($i == 1) ? $i . " ano" : $i . " anos"  ?></option>

            <?php }?>
        </select>
    </form>
```

---

## 04 - função no html

- **Usar aspas duplas para dizer que é uma explressão html, e dentro dela usar aspas simples para quando ser algo do php**

```php
<?php 
Function frutas() {
    $arrFrut = ["banana", "laranja", "maca"];

    foreach ( $arrFrut as $key => $value) {
        echo "<option value='$key'>$value</option>";
    }
}
?>

<body>

    <form action="">
        <select name="" id="">
            <?php frutas(); ?>
        </select>
    </form>

</body>
```

---

