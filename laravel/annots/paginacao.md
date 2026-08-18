# Paginação no Laravel

## Sumário

1. [O que é paginação](#1-o-que-é-paginação)
2. [Paginate](#2-paginate)
3. [Exibindo os dados](#3-exibindo-os-dados)
4. [Links da paginação](#4-links-da-paginação)
5. [Controlando a quantidade](#5-controlando-a-quantidade)
6. [Resumo](#6-resumo)

---

## 1. O que é paginação

A **paginação** serve para dividir muitos registros em várias páginas.

Exemplo: temos **100 usuários**, mas queremos mostrar apenas **10 por página**.

```text
Página 1 → usuários 1 - 10
Página 2 → usuários 11 - 20
Página 3 → usuários 21 - 30
...
```

No Laravel, isso é feito facilmente com `paginate()`.

---

## 2. `paginate()`

No Controller:

```php
use App\Models\User;

public function index()
{
    $usuarios = User::paginate(10);

    return view('usuarios.index', compact('usuarios'));
}
```

O `10` significa:

> Mostrar 10 registros por página.

---

## 3. Exibindo os dados

No Blade:

```blade
@foreach ($usuarios as $usuario)
    <p>{{ $usuario->name }}</p>
    <p>{{ $usuario->email }}</p>
@endforeach
```

O `$usuarios` contém somente os registros da página atual.

---

## 4. Links da paginação

Para mostrar os botões **Anterior, Próximo e números das páginas**:

```blade
{{ $usuarios->links() }}
```

Exemplo visual:

```text
← Anterior   1   2   3   4   Próximo →
```

O Laravel identifica automaticamente qual página está sendo acessada através da URL:

```text
/usuarios?page=2
```

---

## 5. Controlando a quantidade

Podemos definir quantos registros serão exibidos:

```php
$usuarios = User::paginate(10);
```

10 por página.

```php
$usuarios = User::paginate(20);
```

20 por página.

Também funciona com consultas:

```php
$usuarios = User::where('status', 'ativo')
    ->paginate(10);
```

Ou com ordenação:

```php
$usuarios = User::orderBy('name')
    ->paginate(10);
```

---

## 6. Resumo

```text
Model
  ↓
paginate(10)
  ↓
Controller
  ↓
View
  ↓
@foreach
  ↓
$usuarios->links()
```

### O que decorar

| Código                   | Função                     |
| ------------------------ | -------------------------- |
| `paginate(10)`           | 10 registros por página    |
| `$usuarios`              | Registros da página atual  |
| `$usuarios->links()`     | Cria os links da paginação |
| `?page=2`                | Acessa a página 2          |
| `where()` + `paginate()` | Filtra e pagina            |

**Exemplo completo:**

```php
$usuarios = User::where('status', 'ativo')
    ->orderBy('name')
    ->paginate(10);

return view('usuarios.index', compact('usuarios'));
```

```blade
@foreach ($usuarios as $usuario)
    <p>{{ $usuario->name }}</p>
@endforeach

{{ $usuarios->links() }}
```
