# Rotas no Laravel

---

# Sumário

- [O que são Rotas](#o-que-são-rotas)
- [Arquivo de Rotas](#arquivo-de-rotas)
- [Métodos HTTP](#métodos-http)
- [Criando uma Rota](#criando-uma-rota)
- [Parâmetros](#parâmetros)
- [Rotas para Controllers](#rotas-para-controllers)
- [Nomeando Rotas](#nomeando-rotas)
- [Grupo de Rotas](#grupo-de-rotas)
- [Comandos Úteis](#comandos-úteis)
- [Resumo](#resumo)

---

# O que são Rotas

As rotas são responsáveis por definir **qual código será executado quando uma URL for acessada**.

Fluxo básico:

```
URL → Rota → Controller → Resposta
```

Exemplo:

```
/produtos
```

A rota decide qual controller ou função responderá essa URL.

---

# Arquivo de Rotas

As rotas da aplicação web ficam em:

```
routes/web.php
```

Para APIs:

```
routes/api.php
```

---

# Métodos HTTP

| Método | Uso |
|---------|-----|
| GET | Buscar informações |
| POST | Criar dados |
| PUT | Atualizar tudo |
| PATCH | Atualizar parcialmente |
| DELETE | Excluir dados |

Exemplo:

```php
Route::get('/usuarios', function () {
    return 'Lista de usuários';
});
```

---

# Criando uma Rota

Rota simples:

```php
Route::get('/', function () {
    return 'Olá Mundo';
});
```

Outra rota:

```php
Route::get('/sobre', function () {
    return 'Página Sobre';
});
```

---

# Parâmetros

Parâmetro obrigatório:

```php
Route::get('/usuario/{id}', function ($id) {
    return $id;
});
```

Acessando:

```
/usuario/10
```

Resultado:

```
10
```

Parâmetro opcional:

```php
Route::get('/usuario/{nome?}', function ($nome = 'Visitante') {
    return $nome;
});
```

---

# Rotas para Controllers

Em vez de usar funções, normalmente chamamos um Controller.

```php
use App\Http\Controllers\UserController;

Route::get('/usuarios', [UserController::class, 'index']);
```

Sintaxe:

```php
[Controller::class, 'metodo']
```

---

# Nomeando Rotas

Dar um nome facilita gerar URLs.

```php
Route::get('/perfil', function () {
    //
})->name('perfil');
```

Usando:

```php
route('perfil');
```

---

# Grupo de Rotas

Compartilha configurações entre várias rotas.

```php
Route::prefix('admin')->group(function () {

    Route::get('/usuarios', function () {
        return 'Usuários';
    });

    Route::get('/produtos', function () {
        return 'Produtos';
    });

});
```

URLs criadas:

```
/admin/usuarios
/admin/produtos
```

---

# Comandos Úteis

Ver todas as rotas:

```bash
php artisan route:list
```

Limpar cache das rotas:

```bash
php artisan route:clear
```

Criar cache das rotas:

```bash
php artisan route:cache
```

---

# Resumo

✔ Rotas definem como a aplicação responde às URLs.

✔ Ficam em `routes/web.php` ou `routes/api.php`.

✔ Podem executar uma função ou chamar um Controller.

✔ Aceitam parâmetros.

✔ Podem possuir nome.

✔ Podem ser agrupadas para evitar repetição.

✔ Use `php artisan route:list` para visualizar todas as rotas.