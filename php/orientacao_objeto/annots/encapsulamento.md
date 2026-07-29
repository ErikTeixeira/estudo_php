# Encapsulamento em PHP

---

# Sumário

- O que é encapsulamento
- Modificadores de acesso
- `public`
- `private`
- `protected`
- Exemplo simples
- Por que usar encapsulamento
- Fluxo de funcionamento
- Coisas importantes para lembrar

---

# O que é encapsulamento?

**Encapsulamento** é um dos pilares da Programação Orientada a Objetos (POO).

Seu objetivo é **proteger os dados de uma classe**, permitindo que eles sejam acessados apenas da forma correta.

Em vez de alterar um atributo diretamente, normalmente utilizamos **métodos** para controlar a leitura e a alteração desses dados.

---

# Modificadores de acesso

O encapsulamento é feito utilizando os modificadores de acesso:

| Modificador | Pode ser acessado por |
|-------------|-----------------------|
| `public` | Qualquer lugar |
| `private` | Apenas dentro da própria classe |
| `protected` | Na própria classe e nas classes filhas (herança) |

---

# Public

Um atributo ou método `public` pode ser acessado de qualquer lugar.

```php
class Pessoa
{
    public $nome = "Erik";
}

$pessoa = new Pessoa();

echo $pessoa->nome;
```

Saída:

```text
Erik
```

---

# Private

Um atributo `private` só pode ser acessado dentro da própria classe.

```php
class Pessoa
{
    private $nome = "Erik";
}

$pessoa = new Pessoa();

// Erro
echo $pessoa->nome;
```

O PHP exibirá um erro porque o atributo está protegido.

---

# Protected

Um atributo `protected` não pode ser acessado de fora da classe.

Ele só pode ser utilizado:

- Pela própria classe.
- Pelas classes que herdam dela.

```php
class Pessoa
{
    protected $nome = "Erik";
}
```

---

# Exemplo simples

```php
<?php

class ContaBancaria
{
    private float $saldo;

    public function __construct($saldo)
    {
        $this->saldo = $saldo;
    }

    public function depositar($valor)
    {
        $this->saldo += $valor;
    }

    public function consultarSaldo()
    {
        return $this->saldo;
    }
}

$conta = new ContaBancaria(100);

$conta->depositar(50);

echo $conta->consultarSaldo();
```

Saída:

```text
150
```

---

# O que acontece?

### 1. O saldo é criado

```php
private float $saldo;
```

Como é `private`, ninguém pode fazer:

```php
$conta->saldo = 1000000;
```

---

### 2. O construtor inicializa o saldo

```php
$this->saldo = $saldo;
```

---

### 3. O depósito é feito através do método

```php
$conta->depositar(50);
```

Internamente acontece:

```php
$this->saldo += 50;
```

---

### 4. O saldo é consultado

```php
$conta->consultarSaldo();
```

Como o atributo é privado, a classe decide como devolver essa informação.

---

# Fluxo de funcionamento

```text
Objeto
   │
   ▼
Método público
   │
   ▼
Validação
   │
   ▼
Atributo privado
```

O código externo nunca altera o atributo diretamente.

---

# Por que usar encapsulamento?

Sem encapsulamento:

```php
$conta->saldo = -500;
```

Nada impediria que um valor inválido fosse atribuído.

Com encapsulamento:

```php
$conta->depositar(100);
```

A própria classe controla como o saldo será alterado.

---

# Exemplo com validação

```php
class Conta
{
    private float $saldo = 0;

    public function depositar($valor)
    {
        if ($valor > 0) {
            $this->saldo += $valor;
        }
    }

    public function consultarSaldo()
    {
        return $this->saldo;
    }
}
```

Agora depósitos negativos não serão aceitos.

---

# Vantagens do encapsulamento

- Protege os atributos da classe.
- Evita alterações incorretas nos dados.
- Centraliza as regras de negócio.
- Facilita a manutenção do código.
- Torna a classe mais segura.

---

# Coisas importantes para lembrar

## `public`

Pode ser acessado de qualquer lugar.

```php
public $nome;
```

---

## `private`

Só pode ser acessado dentro da própria classe.

```php
private $saldo;
```

---

## `protected`

Pode ser acessado pela classe e pelas classes filhas.

```php
protected $idade;
```

---

## O ideal é proteger os atributos

Em vez de fazer:

```php
$conta->saldo = 500;
```

Faça:

```php
$conta->depositar(500);
```

Assim a classe controla as alterações.

---

# Resumo

- Encapsulamento protege os dados de uma classe.
- Os modificadores de acesso são `public`, `private` e `protected`.
- `private` impede acesso direto aos atributos.
- Métodos públicos permitem controlar como os dados são alterados.
- O encapsulamento aumenta a segurança, organização e manutenção do código.