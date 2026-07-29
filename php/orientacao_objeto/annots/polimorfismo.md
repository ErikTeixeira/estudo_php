# Polimorfismo no PHP


## Sumário

- [O que é Polimorfismo?](#o-que-é-polimorfismo)
- [Como funciona](#como-funciona)
- [Exemplo](#exemplo)
- [Quando usar](#quando-usar)
- [Resumo](#resumo)

---

# O que é Polimorfismo?

Polimorfismo significa que **classes diferentes podem responder ao mesmo método de maneiras diferentes**.

Ou seja, várias classes possuem um método com o mesmo nome, mas cada uma executa sua própria implementação.

---

# Como funciona

Normalmente, uma classe filha herda um método da classe pai e **sobrescreve** esse método para alterar seu comportamento.

Assim, ao chamar o mesmo método, cada objeto executa uma ação diferente.

---

# Exemplo

```php
<?php

class Animal
{
    public function fazerSom()
    {
        echo "Algum som";
    }
}

class Cachorro extends Animal
{
    public function fazerSom()
    {
        echo "Au Au!";
    }
}

class Gato extends Animal
{
    public function fazerSom()
    {
        echo "Miau!";
    }
}

$animais = [
    new Cachorro(),
    new Gato()
];

foreach ($animais as $animal) {
    $animal->fazerSom();
    echo "<br>";
}
```

### Saída

```text
Au Au!
Miau!
```

---

# O que aconteceu?

- `Animal` possui o método `fazerSom()`.
- `Cachorro` sobrescreveu esse método.
- `Gato` também sobrescreveu esse método.
- O `foreach` chama o **mesmo método** (`fazerSom()`), mas cada objeto executa sua própria implementação.

Esse comportamento é chamado de **polimorfismo**.

---

# Quando usar

O polimorfismo é útil quando várias classes possuem o **mesmo comportamento**, mas cada uma precisa executá-lo de forma diferente.

Exemplos:

- Diferentes animais fazendo sons.
- Diferentes formas calculando área.
- Diferentes meios de pagamento processando um pagamento.
- Diferentes tipos de relatório gerando o conteúdo.

---

# Resumo

- Polimorfismo permite que classes diferentes respondam ao mesmo método.
- Cada classe pode implementar esse método de uma forma diferente.
- Geralmente acontece através da **herança** e da **sobrescrita de métodos**.
- O código fica mais organizado, reutilizável e fácil de expandir.