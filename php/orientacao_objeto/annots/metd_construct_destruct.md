# Métodos Mágicos: `__construct()` e `__destruct()`

---

## Sumário

- [O que é `__construct()`?](#o-que-é-__construct)
- [Exemplo do construtor](#exemplo-do-construtor)
- [O que é `__destruct()`?](#o-que-é-__destruct)
- [Exemplo do destrutor](#exemplo-do-destrutor)
- [Diferença entre eles](#diferença-entre-eles)
- [Resumo](#resumo)

---

## O que é `__construct()`

O **construtor** é um método especial executado **automaticamente** quando um objeto é criado com `new`.

Ele normalmente é utilizado para:

- Inicializar atributos.
- Receber informações necessárias para criar o objeto.

### Sintaxe

```php
public function __construct(...)
{
}
```

---

## Exemplo do construtor

```php
class Pessoa
{
    public string $nome;
    public int $idade;

    public function __construct($nome, $idade)
    {
        $this->nome = $nome;
        $this->idade = $idade;
    }
}

$pessoa = new Pessoa("Erik", 20);

echo $pessoa->nome;
```

Saída:

```text
Erik
```

### O que aconteceu?

1. O objeto foi criado.

```php
new Pessoa("Erik", 20);
```

2. O PHP executou automaticamente:

```php
__construct("Erik", 20);
```

3. Os parâmetros foram armazenados nos atributos.

```php
$this->nome = $nome;
$this->idade = $idade;
```

---

## O que é `__destruct()`

O **destrutor** é um método especial executado automaticamente quando o objeto deixa de existir.

Isso acontece, por exemplo:

- Quando o script termina.
- Quando usamos `unset()`.

Ele é usado para finalizar tarefas, como:

- Fechar arquivos.
- Fechar conexões.
- Liberar recursos.

### Sintaxe

```php
public function __destruct()
{
}
```

> **O destrutor não recebe parâmetros.**

---

## Exemplo do destrutor

```php
class Pessoa
{
    public string $nome;

    public function __construct($nome)
    {
        $this->nome = $nome;

        echo "Objeto {$this->nome} criado.<br>";
    }

    public function __destruct()
    {
        echo "Objeto {$this->nome} destruído.";
    }
}

$pessoa = new Pessoa("Erik");

unset($pessoa);
```

Saída:

```text
Objeto Erik criado.
Objeto Erik destruído.
```

### O que aconteceu?

1. O construtor recebeu o parâmetro.

```php
new Pessoa("Erik");
```

2. O atributo foi preenchido.

```php
$this->nome = $nome;
```

3. O objeto foi removido.

```php
unset($pessoa);
```

4. O PHP executou automaticamente:

```php
__destruct();
```

---

## Diferença entre eles

| Método | Quando executa | Recebe parâmetros? |
|---------|----------------|--------------------|
| `__construct()` | Ao criar o objeto | ✅ Sim |
| `__destruct()` | Ao destruir o objeto | ❌ Não |

---

## Resumo

- `__construct()` é chamado automaticamente quando um objeto é criado.
- O construtor pode receber parâmetros para inicializar o objeto.
- `__destruct()` é chamado automaticamente quando o objeto é destruído.
- O destrutor não recebe parâmetros.
- Você não precisa chamar nenhum dos dois manualmente; o PHP faz isso automaticamente.