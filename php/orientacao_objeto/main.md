# Orientação a Objetos (POO) em PHP

> Índice dos principais conceitos de POO estudados.

---

## 📚 Conteúdo

### 📦 Classe, Atributo e Método
Arquivo: [`classe_atrib_metod.md`](annots/classe_atrib_metod.md)

**Principais pontos:**

- O que é uma classe.
- O que é um objeto.
- O que são atributos.
- O que são métodos.
- Como acessar atributos e métodos usando `->`.
- Como utilizar `$this` dentro da própria classe.

---

### 🏗️ Métodos Mágicos (`__construct()` e `__destruct()`)
Arquivo: [`annots/metd_construct_destruct.md`](annots/metd_construct_destruct.md)

**Principais pontos:**

- O que é o `__construct()`.
- Executado automaticamente ao criar um objeto.
- Pode receber parâmetros para inicializar atributos.
- O que é o `__destruct()`.
- Executado automaticamente quando o objeto é destruído.
- Diferenças entre construtor e destrutor.

---

### 🔒 Encapsulamento
Arquivo: [`encapsulamento.md`](annots/encapsulamento.md)

**Principais pontos:**

- O que é encapsulamento.
- Modificadores de acesso (`public`, `private` e `protected`).
- Como proteger atributos da classe.
- Controle de acesso através de métodos.
- Vantagens do encapsulamento.
- Boas práticas para manipular atributos.

---

### Herança
Arquivo: [`Heranca.md`](annots/heranca.md)

**Principais pontos:**

- Use `extends` para criar uma herança.
- A classe filha reutiliza código da classe pai.
- Métodos e propriedades `public` e `protected` são herdados.
- Membros `private` pertencem apenas à classe onde foram declarados.
- A classe filha pode adicionar novos métodos e atributos.

---

### Métodos e Propriedades Estáticas
Arquivo: [`Métodos e Propriedades Estáticas no PHP`](annots/metd_propriedad_static.md)

**Principais pontos:**

- `static` pertence à **classe**, não ao objeto.
- Não precisa criar instâncias (`new`) para acessar.
- Propriedades estáticas usam `Classe::$propriedade`.
- Métodos estáticos usam `Classe::metodo()`.
- Dentro da classe, utilize `self::`.
- Métodos estáticos não podem acessar `$this`.
- Ideal para utilitários, configurações e dados compartilhados.


#### Por que algumas pessoas evitam static?

    - Você não passa as coisas para o objeto

    O uso exagerado pode causar problemas como:

    - Código mais difícil de testar (especialmente em testes unitários).
    - Maior acoplamento entre classes.
    - Dificuldade para usar herança e polimorfismo.
    - Dependências "escondidas", já que tudo é acessado diretamente pela classe.

    > Por isso, muitos frameworks (como o Laravel) preferem injeção de dependência e objetos em vez de muitos métodos estáticos.


---

### Polimorfismo

Arquivo: [`Polimorfismo`](annots/polimorfismo.md)

**Principais pontos:**

- Polimorfismo permite que classes diferentes respondam ao mesmo método.
- Cada classe pode implementar esse método de uma forma diferente.
- Geralmente acontece através da **herança** e da **sobrescrita de métodos**.
- O código fica mais organizado, reutilizável e fácil de expandir.

---

### Interfaces

Arquivo: [`Interfaces`](annots/interface.md)

>   Uma interface define um contrato que uma classe deve seguir.
    Ela informa quais métodos a classe deve possuir, mas não como eles serão implementados.
    Uma classe utiliza a palavra-chave implements para implementar uma interface.


**Principais pontos:**

- Interface define um **contrato**.
- Use `implements` para implementar uma interface.
- Toda classe que implementa uma interface deve criar todos os métodos declarados.
- Interfaces não reutilizam código; elas apenas definem o que deve ser implementado.
- Uma classe pode implementar várias interfaces ao mesmo tempo.

---

### Dependency Injection (Injeção de Dependência)

Arquivo: [`Dependency Injection`](annots/dependency_injection.md)

>   O Pedido não cria mais o objeto dentro dele próprio
        Ele apenas recebe um objeto pronto.
        É isso que significa Injection (injeção).
        Alguém "injeta" a dependência na classe.

    $email = new Email();
    $pedido = new Pedido($email);


**Principais pontos:**

- Uma dependência é um objeto que outra classe precisa para funcionar.
- Dependency Injection consiste em **receber** a dependência, em vez de criá-la.
- A forma mais comum é a **injeção pelo construtor**.
- Essa técnica reduz o acoplamento e facilita testes e manutenção.
- Frameworks modernos utilizam Dependency Injection extensivamente.

---

### spl_autoload_register

Arquivo: [`spl_autoload_register`](annots/spl_autoload_register.md)

>   Hoje em dia, a maioria dos projetos utiliza o **Composer**, que gera automaticamente um autoload baseado em `spl_autoload_register()`.
    Ou seja, mesmo sem escrever essa função manualmente, ela está sendo utilizada "por trás dos panos" em muitos projetos.


**Principais pontos:**

- `spl_autoload_register()` registra uma função para carregar classes automaticamente.
- Elimina a necessidade de vários `require` e `include`.
- A função é executada quando uma classe ainda não carregada é utilizada.
- É muito usada em conjunto com o Composer.
- Facilita a organização e manutenção de projetos PHP.

---

### Namespace  - Composer

Arquivo: [`Namespace `](annots/namespace.md)

**Principais pontos:**

- Namespace organiza classes.
- Evita conflitos de nomes.
- O Composer usa PSR-4 para localizar arquivos.
- `use` importa uma classe.
- `vendor/autoload.php` carrega tudo automaticamente.
- Sempre execute `composer dump-autoload` após alterar o autoload no `composer.json`.
---