# Controllers no Laravel

---

# Sumário

- [O que é um Controller](#o-que-é-um-controller)
- [Criando um Controller](#criando-um-controller)
- [Estrutura Básica](#estrutura-básica)
- [Métodos do Controller](#métodos-do-controller)
- [Chamando um Controller pela Rota](#chamando-um-controller-pela-rota)
- [Recebendo Parâmetros](#recebendo-parâmetros)
- [Retornando uma View](#retornando-uma-view)
- [Retornando JSON](#retornando-json)
- [Controller Resource](#controller-resource)
- [Resumo](#resumo)

---

# O que é um Controller

Um **Controller** é uma classe responsável por processar uma requisição.

Ele recebe os dados da rota, executa a lógica necessária e retorna uma resposta.

**Fluxo:**

```
Usuário → Rota → Controller → Resposta
```

---

# Criando um Controller

Criar um controller:

```bash
php artisan make:controller ProdutoController
```

Arquivo criado:

```
app/
└── Http/
    └── Controllers/
        └── ProdutoController.php
```

---

# Estrutura Básica

```php
<?php

namespace App\Http\Controllers;

class ProdutoController extends Controller
{
    public function index()
    {
        return "Lista de produtos";
    }
}
```

Todo controller normalmente estende:

```php
Controller
```

---

# Métodos do Controller

Cada método representa uma ação.

Exemplo:

```php
class ProdutoController extends Controller
{
    public function index() {}

    public function create() {}

    public function store() {}

    public function show() {}

    public function edit() {}

    public function update() {}

    public function destroy() {}
}
```

---

# Chamando um Controller pela Rota

```php
use App\Http\Controllers\ProdutoController;

Route::get('/produtos', [ProdutoController::class, 'index']);
```

Sintaxe:

```php
[Controller::class, 'metodo']
```

---

# Recebendo Parâmetros

Rota:

```php
Route::get('/produto/{id}', [ProdutoController::class, 'show']);
```

Controller:

```php
public function show($id)
{
    return "Produto: " . $id;
}
```

Se acessar:

```
/produto/10
```

Resultado:

```
Produto: 10
```

---

# Retornando uma View

```php
public function index()
{
    return view('produtos.index');
}
```

A View será procurada em:

```
resources/views/produtos/index.blade.php
```

---

# Retornando JSON

Muito usado em APIs.

```php
public function index()
{
    return response()->json([
        'nome' => 'Notebook',
        'preco' => 3500
    ]);
}
```

---

# Controller Resource

Criar um Resource Controller:

```bash
php artisan make:controller ProdutoController --resource
```

O Laravel cria automaticamente os métodos padrão do CRUD.

---

# Resumo

✔ Controllers organizam a lógica da aplicação.

✔ Recebem requisições das rotas.

✔ Cada método executa uma ação.

✔ Podem retornar:

- View
- JSON
- Redirect
- Texto

✔ Ficam em:

```
app/Http/Controllers
```

---

# Não esqueça

Fluxo básico do Laravel:

```
URL
 ↓
Rota
 ↓
Controller
 ↓
Model (opcional)
 ↓
View ou JSON
```

Exemplo completo:

```php
// routes/web.php

use App\Http\Controllers\ProdutoController;

Route::get('/produtos', [ProdutoController::class, 'index']);
```

```php
// ProdutoController.php

public function index()
{
    return "Lista de produtos";
}
```

Acessando:

```
http://localhost/produtos
```

Resultado:

```
Lista de produtos
```