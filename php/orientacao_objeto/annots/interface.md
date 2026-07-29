# Interfaces no PHP


## Sumário

- [O que é uma Interface?](#o-que-é-uma-interface)
- [Como funciona](#como-funciona)
- [Exemplo](#exemplo)
- [Implementando várias interfaces](#implementando-várias-interfaces)
- [Diferença entre Interface e Herança](#diferença-entre-interface-e-herança)
- [Resumo](#resumo)

---

# O que é uma Interface?

Uma **interface** define um **contrato** que uma classe deve seguir.

Ela informa **quais métodos a classe deve possuir**, mas **não como eles serão implementados**.

Uma classe utiliza a palavra-chave `implements` para implementar uma interface.

---

# Como funciona

- Uma interface declara apenas a assinatura dos métodos.
- A classe que implementa a interface **é obrigada** a criar todos esses métodos.
- Caso algum método não seja implementado, o PHP gera um erro.

---

# Exemplo

```php
<?php

interface Animal
{
    public function fazerSom();
}

class Cachorro implements Animal
{
    public function fazerSom()
    {
        echo "Au Au!";
    }
}

class Gato implements Animal
{
    public function fazerSom()
    {
        echo "Miau!";
    }
}

$cachorro = new Cachorro();
$gato = new Gato();

$cachorro->fazerSom();
echo "<br>";
$gato->fazerSom();
```

### O que aconteceu?

- `Animal` é uma interface.
- Ela exige que exista o método `fazerSom()`.
- `Cachorro` implementa esse método.
- `Gato` também implementa esse método.
- Cada classe possui sua própria implementação.

---

# Implementando várias interfaces

Uma classe pode implementar mais de uma interface.

```php
interface Animal
{
    public function fazerSom();
}

interface Corredor
{
    public function correr();
}

class Cachorro implements Animal, Corredor
{
    public function fazerSom()
    {
        echo "Au Au!";
    }

    public function correr()
    {
        echo "Correndo...";
    }
}
```

---

# Diferença entre Interface e Herança

| Herança | Interface |
|---------|-----------|
| Usa `extends` | Usa `implements` |
| Reutiliza código da classe pai | Define um contrato |
| Pode possuir atributos e métodos implementados | Apenas declara métodos (e constantes) |
| Uma classe pode herdar apenas uma classe | Uma classe pode implementar várias interfaces |

---

# Quando usar

Interfaces são úteis quando várias classes devem possuir os mesmos métodos, mas cada uma terá sua própria implementação.

Exemplos:

- Diferentes meios de pagamento.
- Diferentes tipos de autenticação.
- Diferentes serviços de envio de e-mail.
- Diferentes tipos de armazenamento de arquivos.

---

# Resumo

- Interface define um **contrato**.
- Use `implements` para implementar uma interface.
- Toda classe que implementa uma interface deve criar todos os métodos declarados.
- Interfaces não reutilizam código; elas apenas definem o que deve ser implementado.
- Uma classe pode implementar várias interfaces ao mesmo tempo.