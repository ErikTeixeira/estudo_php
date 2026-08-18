# Validação de formulário no Laravel — básico

> **O básico para decorar:** `route()` define para onde o formulário vai → `@csrf` protege o envio → `validate()` verifica os dados → `@error` mostra os erros → `old()` recupera os valores digitados.

## Sumário

1. [Rota](#1-rota)
2. [Formulário](#2-formulário)
3. [CSRF](#3-csrf)
4. [Validação](#4-validação)
5. [Exibindo erros](#5-exibindo-erros)
6. [Fluxo completo](#6-fluxo-completo)

---

## 1. Rota

No `routes/web.php`, criamos uma rota para exibir o formulário e outra para receber os dados:

```php
use App\Http\Controllers\UserController;

Route::get('/usuarios/create', [UserController::class, 'create'])
    ->name('usuarios.create');

Route::post('/usuarios', [UserController::class, 'store'])
    ->name('usuarios.store');
```

O `name()` dá um nome para a rota.

Assim, podemos usar:

```blade
{{ route('usuarios.store') }}
```

---

## 2. Formulário

No Blade:

```blade
<form action="{{ route('usuarios.store') }}" method="POST">

    @csrf

    <input type="text" name="nome">

    <input type="email" name="email">

    <button type="submit">Cadastrar</button>

</form>
```

### O que acontece?

```blade
action="{{ route('usuarios.store') }}"
```

Envia o formulário para a rota chamada `usuarios.store`.

```html
method="POST"
```

Indica que estamos enviando dados.

---

## 3. CSRF

O Laravel utiliza proteção **CSRF** para evitar requisições maliciosas.

Dentro de todo formulário `POST`, normalmente usamos:

```blade
@csrf
```

O Laravel gera um token automaticamente.

Exemplo:

```blade
<form action="{{ route('usuarios.store') }}" method="POST">
    @csrf

    ...
</form>
```

**Regra básica:** formulário `POST`, `PUT`, `PATCH` ou `DELETE` → utilize `@csrf`.

---

## 4. Validação

No controller:

```php
public function store(Request $request)
{
    $request->validate([
        'nome' => 'required|min:3',
        'email' => 'required|email',
    ]);

    // Se chegou aqui, os dados são válidos.
}
```

Também precisamos importar o `Request`:

```php
use Illuminate\Http\Request;
```

### Principais regras

| Regra                | Função                                           |
| -------------------- | ------------------------------------------------ |
| `required`           | Campo obrigatório                                |
| `min:3`              | Mínimo de 3 caracteres                           |
| `max:255`            | Máximo de 255 caracteres                         |
| `email`              | Deve ser um e-mail válido                        |
| `numeric`            | Deve ser número                                  |
| `unique:users,email` | Não pode existir no banco                        |
| `confirmed`          | Precisa ter campo `_confirmation` correspondente |

Exemplo:

```php
$request->validate([
    'nome' => 'required|min:3|max:100',
    'email' => 'required|email',
    'idade' => 'required|numeric',
]);
```

---

## 5. Exibindo erros

No Blade:

```blade
@if ($errors->any())
    @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach
@endif
```

Também podemos mostrar o erro de um campo específico:

```blade
@error('nome')
    <p>{{ $message }}</p>
@enderror
```

E manter o valor digitado:

```blade
<input type="text" name="nome" value="{{ old('nome') }}">
```

---

## 6. Fluxo completo

### Rota

```php
Route::post('/usuarios', [UserController::class, 'store'])
    ->name('usuarios.store');
```

### Formulário

```blade
<form action="{{ route('usuarios.store') }}" method="POST">

    @csrf

    <input
        type="text"
        name="nome"
        value="{{ old('nome') }}"
    >

    @error('nome')
        <p>{{ $message }}</p>
    @enderror

    <input
        type="email"
        name="email"
        value="{{ old('email') }}"
    >

    @error('email')
        <p>{{ $message }}</p>
    @enderror

    <button type="submit">Cadastrar</button>

</form>
```

### Controller

```php
use Illuminate\Http\Request;

public function store(Request $request)
{
    $request->validate([
        'nome' => 'required|min:3',
        'email' => 'required|email',
    ]);

    // Salvar no banco...
}
```

### Resumindo o funcionamento

```text
Formulário
    ↓
{{ route('usuarios.store') }}
    ↓
POST
    ↓
@csrf
    ↓
Controller
    ↓
$request->validate()
    ↓
Dados válidos → continua
Dados inválidos → volta para o formulário com erros
```

