## Laravel

### Documentação - https://laravel.com/docs/13.x/installation

---

## Folders / files

- ``Composer.json`` - Mapa de configuração e gerenciamento de dependências do seu projeto
- ``.env`` (environment) - Cofre de configurações sensíveis do seu projeto Laravel
- ``database/``
    - ``factories`` - Classes usadas para gerar dados fictícios e realistas de maneira automática
    - ``migrations`` - Sistema de versionamento do banco de dados, registram todas as mudanças feitas na estrutura do banco
    - ``seeders`` - Classes usadas para popular o banco de dados com dados iniciais ou de teste de forma automática
        - rodar a seeder ``php artisan db:seed nomeSeeder`` ou roda todas ``php artisan db:seed``

- ``routes/``
    - ``web`` - Rota padrão - qualquer coisa digitada na url que não tem no sistema leva aqui

- ``resourses/``
    - ``views`` - Onde fica as telas do sistema

---

### Rotas

Arquivo: [`Rotas`](annots/rotas.md)

**Principais pontos:**

- As rotas definem as URLs da aplicação.
- Ligam uma URL a uma função ou a um Controller.
- São criadas principalmente no arquivo `routes/web.php`.
- Podem responder a métodos HTTP como `GET`, `POST`, `PUT`, `PATCH` e `DELETE`.
- Também permitem definir parâmetros, middleware e nomes para as rotas.

```php
Route::get('/teste', [TesteController::class, 'index']);
Route::post('/teste', [TesteController::class, 'store']);
```

---

### Controller

Arquivo: [`Controllers`](annots/controllers.md)

**Principais pontos:**

- Os Controllers concentram a lógica da aplicação.
- Recebem as requisições enviadas pelas rotas.
- Processam os dados e retornam uma resposta (View, JSON, Redirect etc.).
- Organizam o código, evitando colocar muita lógica nas rotas.
- Ficam localizados, por padrão, em `app/Http/Controllers`.

Cria um controller:

```bash
php artisan make:controller ProdutoController
```

Cria um controller com os métodos do crud:
```bash
php artisan make:controller ProdutoController --resource
```
---

### Migrations

Arquivo: [`Migrations`](annots/migrations.md)

**Principais pontos:**

- As Migrations são responsáveis por criar e modificar a estrutura do banco de dados.
- Funcionam como um controle de versão do banco.
- Permitem criar, alterar e remover tabelas e colunas.
- Cada Migration possui os métodos `up()` (aplica) e `down()` (desfaz).
- Ficam localizadas, por padrão, em `database/migrations`.

Cria uma Migration:

```bash
php artisan make:migration create_produtos_table
```

---

### Model

Arquivo: [`Model`](annots/model.md)

**Principais pontos:**

- As Models representam as tabelas do banco de dados.
- São responsáveis por interagir com os registros utilizando o Eloquent ORM.
- Permitem realizar operações de CRUD (Create, Read, Update e Delete).
- Também definem relacionamentos entre tabelas e regras como atributos preenchíveis.
- Ficam localizadas, por padrão, em `app/Models`.

##### Cria uma Model:

```bash
php artisan make:model Produto
```

##### Tem que ter na model o 
- Declara o nome da tablea = ``protected $table = 'teste';``
- ``protected $fillable = [];``


##### Métodos mais utilizados do Eloquent:

| Método | Descrição |
|---------|-----------|
| `::create()` | Cria um novo registro. |
| `::all()` | Retorna todos os registros. |
| `::find($id)` | Busca um registro pelo ID. |
| `::first()` | Retorna o primeiro registro. |
| `::where()` | Filtra registros. |
| `::orderBy()` | Ordena os resultados. |
| `::latest()` | Ordena pelos mais recentes. |
| `::paginate()` | Retorna resultados paginados. |
| `save()` | Salva alterações em um objeto. |
| `update()` | Atualiza um ou mais registros. |
| `delete()` | Remove um registro. |
| `destroy($id)` | Remove um registro pelo ID. |

---