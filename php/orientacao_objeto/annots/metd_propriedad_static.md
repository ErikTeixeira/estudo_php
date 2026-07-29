# Métodos e Propriedades Estáticas no PHP


## Sumário

- [O que é `static`?](#o-que-é-static)
- [Propriedade Estática](#propriedade-estática)
- [Método Estático](#método-estático)
- [Diferença entre Estático e Normal](#diferença-entre-estático-e-normal)
- [Quando usar](#quando-usar)
- [Boas práticas](#boas-práticas)
- [Exemplo Completo](#exemplo-completo)
- [Resumo](#resumo)

---

# O que é `static`

`static` permite acessar uma propriedade ou método **sem criar um objeto** da classe.

Em vez de usar um objeto (`new`), acessamos diretamente pela classe usando:

```php
Classe::membro
```

---

# Propriedade Estática

Uma propriedade estática pertence **à classe**, e não aos objetos.

## Sintaxe

```php
class Usuario
{
    public static $total = 0;
}
```

## Acessando

```php
echo Usuario::$total;
```

Observe que é usado:

- `::` (operador de resolução de escopo)
- `$` antes do nome da propriedade

---

# Método Estático

Um método estático também pertence à classe.

## Sintaxe

```php
class Calculadora
{
    public static function somar($a, $b)
    {
        return $a + $b;
    }
}
```

## Chamando

```php
echo Calculadora::somar(10, 5);
```

Não é necessário fazer:

```php
new Calculadora();
```

---

# Diferença entre Estático e Normal

| Normal | Estático |
|---------|----------|
| Precisa de `new` | Não precisa de `new` |
| Usa `$this` | Não pode usar `$this` |
| Cada objeto possui seus próprios dados | O valor é compartilhado por toda a classe |

---

# Quando usar

Use membros estáticos quando:

- Contadores
- Configurações globais
- Métodos utilitários
- Funções auxiliares
- Valores compartilhados entre todos os objetos

Exemplo:

```php
class Config
{
    public static $versao = "1.0";
}
```

---

# Boas práticas

✅ Use `static` quando o método **não depende do estado do objeto**.

❌ Não utilize `static` apenas para evitar criar objetos.

❌ Métodos estáticos não possuem acesso ao `$this`.

Exemplo inválido:

```php
public static function teste()
{
    echo $this->nome;
}
```

---

# Exemplo Completo

```php
class Usuario
{
    public static $totalUsuarios = 0;

    public function __construct()
    {
        self::$totalUsuarios++;
    }

    public static function mostrarTotal()
    {
        echo self::$totalUsuarios;
    }
}

new Usuario();
new Usuario();
new Usuario();

Usuario::mostrarTotal();
```

Saída:

```text
3
```

### O que aconteceu?

Cada vez que um objeto foi criado:

```php
new Usuario();
```

o construtor executou:

```php
self::$totalUsuarios++;
```

Como a propriedade é estática, ela é compartilhada entre todas as instâncias.

---

# `self::`

Dentro da própria classe, use `self::` para acessar membros estáticos.

```php
self::$contador;
```

```php
self::mostrarTotal();
```

Fora da classe:

```php
Usuario::$contador;
Usuario::mostrarTotal();
```

---

# Resumo

- `static` pertence à **classe**, não ao objeto.
- Não precisa criar instâncias (`new`) para acessar.
- Propriedades estáticas usam `Classe::$propriedade`.
- Métodos estáticos usam `Classe::metodo()`.
- Dentro da classe, utilize `self::`.
- Métodos estáticos não podem acessar `$this`.
- Ideal para utilitários, configurações e dados compartilhados.


