## Herança

A **herança** permite que uma classe reutilize atributos e métodos de outra classe.

Uma classe filha herda tudo o que for **public** e **protected** da classe pai.

> **Importante:** métodos e propriedades `private` **não podem ser acessados diretamente** pela classe filha, pois o escopo não permite.

---

### Sintaxe

Uma classe herda outra utilizando a palavra-chave `extends`.

```php
class Cachorro extends Animal
{
}
```

---

### Exemplo

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
    public function latir()
    {
        echo "Au Au!";
    }
}

$cachorro = new Cachorro();

$cachorro->fazerSom(); // Herdado da classe Animal
echo "<br>";
$cachorro->latir();    // Método da classe Cachorro
```

### O que aconteceu?

- `Animal` é a **classe pai**.
- `Cachorro` é a **classe filha**, pois utiliza `extends Animal`.
- `Cachorro` herda o método `fazerSom()`.
- Além dos métodos herdados, `Cachorro` pode criar seus próprios métodos, como `latir()`.
- Assim, um objeto de `Cachorro` pode usar tanto os métodos herdados quanto os próprios.

---

### O que é herdado?

| Visibilidade | A classe filha herda? |
|--------------|-----------------------|
| `public` | ✅ Sim |
| `protected` | ✅ Sim |
| `private` | ❌ Não (acesso direto não é permitido) |

---

### Resumo

- Use `extends` para criar uma herança.
- A classe filha reutiliza código da classe pai.
- Métodos e propriedades `public` e `protected` são herdados.
- Membros `private` pertencem apenas à classe onde foram declarados.
- A classe filha pode adicionar novos métodos e atributos.