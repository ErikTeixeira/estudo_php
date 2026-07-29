# Dependency Injection (Injeção de Dependência) no PHP


## Sumário

- [O que é Dependency Injection?](#o-que-é-dependency-injection)
- [Problema sem Dependency Injection](#problema-sem-dependency-injection)
- [Usando Dependency Injection](#usando-dependency-injection)
- [Vantagens](#vantagens)
- [Quando usar](#quando-usar)
- [Resumo](#resumo)

---

# O que é Dependency Injection?

**Dependency Injection (DI)** é uma técnica onde uma classe **recebe suas dependências de fora**, em vez de criá-las internamente.

Uma **dependência** é qualquer objeto que outra classe precisa para funcionar.

---

# Problema sem Dependency Injection

Neste exemplo, `Pedido` cria sozinho um objeto de `Email`.

```php
<?php

class Email
{
    public function enviar()
    {
        echo "E-mail enviado!";
    }
}

class Pedido
{
    private $email;

    public function __construct()
    {
        $this->email = new Email();
    }

    public function finalizar()
    {
        $this->email->enviar();
    }
}
```

### Problema

- `Pedido` fica diretamente dependente de `Email`.
- Se a implementação de `Email` mudar, `Pedido` também pode precisar mudar.
- O código fica mais difícil de testar e manter.

---

# Usando Dependency Injection

Agora a dependência é criada fora da classe e passada pelo construtor.

```php
<?php

class Email
{
    public function enviar()
    {
        echo "E-mail enviado!";
    }
}

class Pedido
{
    private $email;

    public function __construct(Email $email)
    {
        $this->email = $email;
    }

    public function finalizar()
    {
        $this->email->enviar();
    }
}

$email = new Email();
$pedido = new Pedido($email);

$pedido->finalizar();
```

### O que mudou?

- `Pedido` **não cria** mais o objeto `Email`.
- Quem cria o objeto é o código externo.
- A dependência é **injetada** pelo construtor.

---

# Vantagens

- Código menos acoplado.
- Mais fácil de testar.
- Mais fácil trocar implementações.
- Classes ficam mais reutilizáveis.
- Facilita a manutenção do projeto.

---

# Quando usar

Dependency Injection é muito utilizada em:

- Laravel
- Symfony
- CodeIgniter 4
- Outros frameworks modernos

Sempre que uma classe depender de outra, prefira **receber essa dependência** em vez de criá-la com `new`.

---

# Resumo

- Uma dependência é um objeto que outra classe precisa para funcionar.
- Dependency Injection consiste em **receber** a dependência, em vez de criá-la.
- A forma mais comum é a **injeção pelo construtor**.
- Essa técnica reduz o acoplamento e facilita testes e manutenção.
- Frameworks modernos utilizam Dependency Injection extensivamente.