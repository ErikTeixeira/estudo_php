# `spl_autoload_register()` no PHP


## Sumário

- [O que é `spl_autoload_register()`?](#o-que-é-spl_autoload_register)
- [Por que usar?](#por-que-usar)
- [Como funciona](#como-funciona)
- [Exemplo](#exemplo)
- [Estrutura de pastas](#estrutura-de-pastas)
- [Resumo](#resumo)

---

# O que é `spl_autoload_register()`?

`spl_autoload_register()` é uma função do PHP que **carrega automaticamente arquivos de classes quando elas são utilizadas**.

Sem ela, seria necessário incluir cada arquivo manualmente usando `require` ou `include`.

---

# Por que usar?

Sem autoload:

```php
require 'classes/Usuario.php';
require 'classes/Pedido.php';
require 'classes/Produto.php';

$usuario = new Usuario();
```

Se o projeto crescer, será necessário adicionar vários `require`.

Com `spl_autoload_register()`, o PHP procura e carrega a classe automaticamente.

---

# Como funciona

Primeiro registramos uma função de carregamento:

```php
spl_autoload_register(function ($classe) {
    require "classes/$classe.php";
});
```

Quando uma classe for utilizada:

```php
$usuario = new Usuario();
```

O PHP executa automaticamente:

```php
require "classes/Usuario.php";
```

Tudo isso acontece sem você chamar `require` manualmente.

---

# Exemplo

### Estrutura

```text
projeto/
│
├── index.php
└── classes/
    ├── Usuario.php
    └── Produto.php
```

### index.php

```php
<?php

spl_autoload_register(function ($classe) {
    require "classes/$classe.php";
});

$usuario = new Usuario();
```

### classes/Usuario.php

```php
<?php

class Usuario
{
    public function mostrar()
    {
        echo "Usuário carregado!";
    }
}
```

O arquivo `Usuario.php` será carregado automaticamente quando a classe for utilizada.

---

# O que acontece?

1. O PHP encontra `new Usuario()`.
2. Percebe que a classe ainda não foi carregada.
3. Executa a função registrada em `spl_autoload_register()`.
4. A função inclui o arquivo correspondente.
5. A criação do objeto continua normalmente.

---

# Vantagens

- Evita vários `require`.
- Código mais organizado.
- Facilita projetos grandes.
- Carrega apenas as classes realmente utilizadas.

---

# Observação

Hoje em dia, a maioria dos projetos utiliza o **Composer**, que gera automaticamente um autoload baseado em `spl_autoload_register()`.

Ou seja, mesmo sem escrever essa função manualmente, ela está sendo utilizada "por trás dos panos" em muitos projetos.

---

# Resumo

- `spl_autoload_register()` registra uma função para carregar classes automaticamente.
- Elimina a necessidade de vários `require` e `include`.
- A função é executada quando uma classe ainda não carregada é utilizada.
- É muito usada em conjunto com o Composer.
- Facilita a organização e manutenção de projetos PHP.