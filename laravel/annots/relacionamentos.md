# Relacionamentos

**Laravel só carrega as relações se for pedido, se não não traz**

---

## 1 -> 1ㅤㅤhasOne

- Na ``migration`` colocar o campo de ``foreignId('user_id')`` -> junto coloca o ``constraied()`` para dar erro se tentar inserir um id que não existe e o ``cascadeOnDelete()`` para se deletar este usuário desse id, esse item da tabela vai ser excluido junto

```php
 public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constraied()
                ->cascadeOnDelete();
            $table->text('typeProf');
        });
    }
```

> Se for uma migration de ``alter``, no down 
    ``$table->dropForeign(['user_id']);``
    ``$table->dropCollumn(['user_id']);``


- Na ``model`` dizer para ela que tem relacionamento

```php
class User extends Model
{
    // Define o nome da tabela no banco (opcional se o nome for o plural da classe)
    protected $table = 'usuarios';

    // Define quais campos podem ser salvos de uma vez no banco
    protected $fillable = [
        'nome',
        'idade',
    ];

    public function profile() {
        return $this->hasOne(Profile::class);
    }
}
```

- Trazendo o relacionado - **retorna um Model**
```php
$user = User::with('profile')->find($id);
```

- Inserir um Profile - chama a função da model
```php
$user->profile()->create([
    'typeProf' => 'Teste Perfil'
]);
```

- Acessar os valores do profile
```php
$user->profile->typeProf;
```

---

## 1 -> NㅤㅤhasMany

- **Quando ele retorna é uma Collection**

- Uma model para várias models - Um usuário possui vários posts

- Tem que ter o campo de **foreignkey**, e o **->nullable()** para ele poder ser vazio

#### Na tabela posts
```php
    $table->foreignId('user_id')
        ->nullalbre()
        ->constraied()
        ->cascadeOnDelete();
```

#### Model - User - relacionar

```php
    public function posts() {
        return $this->hasMany(Post::class);
    }
```

---

## N -> N

- Vários models para vários models - é preciso de uma **tabela intermediária PIVOT**
- **Convenção do Laravel - Declarar o nome da tabela com os nomes das tabelas no singular ``role_user`` em ordem alfabética**

- Chave primária é a união das foreignId

```php
public function up(): void
    {
        Schema::create('role_user', function (Blueprint $table) {
            $table->foreignId('role_id')
                ->constraied()
                ->cascadeOnDelete(); 

            $table->foreignId('user_id')
                ->constraied()
                ->cascadeOnDelete(); 

            $table->primary(['role_id', 'user_id']);

            $table->timestamps();
        });
    }
```

#### Model - User - relacionar

- ``Role`` - o laravel identifica automaticamente que é da role
```php
    public function roles() {
        return $this->belongsToMany(Role::class);
    }
```

- **Anexar** os valores de usuário ao  role - ``attach()``

```php
$user->roles()->attach(1);
```

- **Desanexar** os valores de usuário ao  role - ``detach()``

```php
$user->roles()->detach(1);
```