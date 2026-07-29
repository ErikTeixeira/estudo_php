## Classe, Atributo e Método


```php
<?php

class Carro {
        // atributo
    public $cor = "vermelho";
    public $marcas = ["Volkswagen","Toyota", "Chevrolet"];

        // método
    public function acelerar() {
        echo "O carro está acelerando";
    };

        // acessar um atributo ou método dentro da classe usa  - this
    public function getFrutas() {
        $frustas = $this->frutas;

        foreach($frutas as $fruta) {
            echo $fruta . "</br>";
        }
    }
}

// objeto
$carro = new Carro();

// acessar atributo | método
var_dump($carro->cor);
$carro->acelerar();
$carro->getFrutas();

?>
```

### Método é uma função da classe

