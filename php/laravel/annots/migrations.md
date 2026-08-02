# Migrations no Laravel


---

# Sumário

- [O que é uma Migration](#o-que-é-uma-migration)
- [Criando uma Migration](#criando-uma-migration)
- [Estrutura Básica](#estrutura-básica)
- [Métodos up() e down()](#métodos-up-e-down)
- [Executando as Migrations](#executando-as-migrations)
- [Rollback](#rollback)
- [Tipos de Colunas](#tipos-de-colunas)
- [Resumo](#resumo)

---

# O que é uma Migration

Uma **Migration** controla a estrutura do banco de dados.

Ela permite criar, alterar e remover tabelas de forma organizada.

Ficam em:

```
database/migrations
```

---

# Criando uma Migration

Criar uma migration:

```bash
php artisan make:migration create_produtos_table
```

Para alterar uma tabela existente:

```bash
php artisan make:migration add_preco_to_produtos_table --table=produtos
```

---

# Estrutura Básica

```php
return new class extends Migration
{
    public function up(): void
    {
        //
    }

    public function down(): void
    {
        //
    }
};
```

- `up()` aplica as alterações.
- `down()` desfaz as alterações.

---

# Métodos up() e down()

Criando uma tabela:

```php
public function up(): void
{
    Schema::create('produtos', function (Blueprint $table) {
        $table->id();
        $table->string('nome');
        $table->decimal('preco', 10, 2);
        $table->timestamps();
    });
}
```

Removendo a tabela:

```php
public function down(): void
{
    Schema::dropIfExists('produtos');
}
```

---

# Executando as Migrations

Aplicar todas:

```bash
php artisan migrate
```

Ver status:

```bash
php artisan migrate:status
```

---

# Rollback

Desfazer a última migration:

```bash
php artisan migrate:rollback
```

Desfazer todas:

```bash
php artisan migrate:reset
```

Recriar tudo:

```bash
php artisan migrate:fresh
```

---

# Tipos de Colunas

```php
$table->id();
$table->string('nome');
$table->text('descricao');
$table->integer('estoque');
$table->decimal('preco', 10, 2);
$table->boolean('ativo');
$table->date('nascimento');
$table->timestamps();
```

---

# Resumo

✔ Controlam a estrutura do banco.

✔ Funcionam como versionamento do banco de dados.

✔ O método `up()` aplica alterações.

✔ O método `down()` desfaz alterações.

✔ Ficam em:

```
database/migrations
```

---

# Não esqueça

Fluxo básico:

```
Criar Migration
        ↓
Editar up() e down()
        ↓
php artisan migrate
        ↓
Tabela criada no banco
```

Exemplo completo:

```bash
php artisan make:migration create_produtos_table
php artisan migrate
```

Resultado:

```
Tabela "produtos" criada no banco de dados.
```