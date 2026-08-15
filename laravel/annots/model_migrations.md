## Model | Migrations

### Comando Model

```
php artisan make:model Post

    // criando com a migration junto
php artisan make:model Post --migration
```

---

### Comando Migration

```
php artisan make:migration create_posts_table 
```

#### Rodar a migration

```
php artisan migrate
```

#### Desfazer - não fazer isso com tabela com dados em produção

```
php artisan migrate:rollback
```

#### Alter Migration

- Pode colocar qualquer coisa - Alter, Add_field, sendo que tem que ter o nome da tabela

```
php artisan make:migration add_field_posts

php artisan make:migration alter_posts
```

---

### Model

```php
class Produto extends Model
{
    // Define o nome da tabela no banco (opcional se o nome for o plural da classe)
    protected $table = 'produtos';

    // Define quais campos podem ser salvos de uma vez no banco
    protected $fillable = [
        'nome',
        'preco',
        'descricao'
    ];
}
```

---

### Migration

- Da para colocar no cmapo para ele ser cria no banco depois de um em específico - **->after('nome_coluna')**

```php
return new class extends Migration
{
    /**
     * Executa as mudanças no banco de dados.
     */
    public function up(): void
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id(); // Chave primária auto-incremento
            $table->string('nome'); // Nome do produto
            $table->text('descricao')->nullable(); // Texto longo opcional
            $table->decimal('preco', 8, 2); // Preço com 2 casas decimais
            $table->integer('estoque')->default(0); // Quantidade com valor padrão 0
            $table->timestamps(); // Cria as colunas created_at e updated_at
        });
    }

    /**
     * Reverte as mudanças no banco de dados.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};
```