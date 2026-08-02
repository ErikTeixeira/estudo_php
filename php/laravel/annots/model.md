# Models no Laravel

---

# Sumário

- [O que é um Model](#o-que-é-um-model)
- [Criando um Model](#criando-um-model)
- [Estrutura Básica](#estrutura-básica)
- [Consultando Dados](#consultando-dados)
- [Criando Registros](#criando-registros)
- [Atualizando Registros](#atualizando-registros)
- [Removendo Registros](#removendo-registros)
- [Mass Assignment](#mass-assignment)
- [Resumo](#resumo)

---

# O que é um Model

Um **Model** representa uma tabela do banco de dados.

Ele é responsável por acessar, criar, atualizar e remover registros utilizando o **Eloquent ORM**.

Fluxo:

```
Controller → Model → Banco de Dados
```

---

# Criando um Model

Criar um Model:

```bash
php artisan make:model Produto
```

Criar Model + Migration:

```bash
php artisan make:model Produto -m
```

Arquivo criado:

```
app/
└── Models/
    └── Produto.php
```

---

# Estrutura Básica

```php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    //
}
```

Por padrão, o Laravel associa:

```
Produto → produtos
```

---

# Consultando Dados

Todos os registros:

```php
Produto::all();
```

Buscar por ID:

```php
Produto::find(1);
```

Primeiro registro:

```php
Produto::first();
```

Filtrar:

```php
Produto::where('preco', '>', 100)->get();
```

---

# Criando Registros

```php
Produto::create([
    'nome' => 'Notebook',
    'preco' => 3500
]);
```

---

# Atualizando Registros

```php
$produto = Produto::find(1);

$produto->preco = 4000;

$produto->save();
```

Ou:

```php
Produto::where('id', 1)
    ->update(['preco' => 4000]);
```

---

# Removendo Registros

```php
Produto::destroy(1);
```

Ou:

```php
$produto->delete();
```

---

# Mass Assignment

Permite definir quais campos podem ser preenchidos.

```php
protected $fillable = [
    'nome',
    'preco'
];
```

Sem isso, o `create()` pode gerar erro.

---

# Resumo

✔ Um Model representa uma tabela.

✔ Utiliza o Eloquent ORM.

✔ Permite:

- Buscar
- Criar
- Atualizar
- Excluir registros

✔ Fica em:

```
app/Models
```

---

# Não esqueça

Fluxo básico:

```
Rota
 ↓
Controller
 ↓
Model
 ↓
Banco de Dados
```

Exemplo:

```php
public function index()
{
    return Produto::all();
}
```

Resultado:

```
Retorna todos os produtos da tabela.
```