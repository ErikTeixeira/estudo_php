## Estrutura de repetição


### FOR

```php
<?php

    $arr = [10, 20, 30];

    for ($i = 0; $i < count($arr); $i++) {
        echo $arr[$i];
    }


```

---

### FOREACH

```php
<?php

    $arr = [10, 20, 30];

    foreach ($arr as $value) {
        echo $value;
    }

    // $key é o indice
    foreach ($arr as $key => $value) {
        echo $key;
        echo $value;
    }
```

---

### While


```php
<?php

    $arr = [10, 20, 30];
    $i = 0;

    while ($i < count($arr)) {
        echo $arr[$i];

        $i++
    }


```