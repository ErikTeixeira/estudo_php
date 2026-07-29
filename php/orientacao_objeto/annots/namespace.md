# Namespace no PHP (Composer)

---

# 📑 Sumário

1. O que é Namespace
2. Para que serve
3. Estrutura de pastas
4. Exemplo sem Namespace
5. Exemplo com Namespace
6. Como o Composer encontra as classes
7. composer.json
8. Autoload
9. Coisas importantes

---

# O que é Namespace

Namespace é uma forma de **organizar classes** e evitar conflitos entre nomes iguais.

Sem namespace:

```php
class Usuario {}
```

Com namespace:

```php
namespace App\Models;

class Usuario {}
```

Agora o nome completo da classe é:

```php
App\Models\Usuario
```

---

# Para que serve

- Organizar o projeto
- Evitar conflito entre classes
- Facilitar o autoload do Composer
- Separar módulos da aplicação

---

# Estrutura de pastas

```
projeto/
│
├── app/
│   ├── Models/
│   │   └── Usuario.php
│   │
│   └── Services/
│       └── EmailService.php
│
├── vendor/
├── composer.json
```

---

# Exemplo sem Namespace

```php
class Usuario
{
}
```

Se existir outra classe chamada `Usuario`, ocorrerá conflito.

---

# Exemplo com Namespace

Arquivo:

```php
app/Models/Usuario.php
```

```php
namespace App\Models;

class Usuario
{
}
```

Utilizando:

```php
use App\Models\Usuario;

$usuario = new Usuario();
```

---

# Como o Composer encontra as classes

O Composer utiliza o **PSR-4**.

Ele associa um namespace a uma pasta.

Exemplo:

```text
App\  →  app/
```

Então:

```php
App\Models\Usuario
```

vira:

```
app/Models/Usuario.php
```

Tudo automaticamente.

---

# composer.json

```json
{
    "autoload": {
        "psr-4": {
            "App\\": "app/"
        }
    }
}
```

Depois execute:

```bash
composer dump-autoload
```

Isso atualiza o carregamento automático das classes.

---

# Autoload

No início da aplicação:

```php
require 'vendor/autoload.php';
```

Agora basta usar:

```php
use App\Models\Usuario;

$usuario = new Usuario();
```

Sem fazer:

```php
require 'Usuario.php';
```

---

# Coisas importantes

✅ O namespace deve ficar no topo do arquivo.

```php
<?php

namespace App\Models;
```

✅ O caminho da pasta deve seguir o namespace.

```
App\Models\Produto
```

↓

```
app/Models/Produto.php
```

✅ Para usar outra classe utilize `use`.

```php
use App\Services\EmailService;
```

Ou o nome completo:

```php
$email = new \App\Services\EmailService();
```

---

# Exemplo completo

**app/Models/Usuario.php**

```php
<?php

namespace App\Models;

class Usuario
{
    public function nome()
    {
        return "Erik";
    }
}
```

**index.php**

```php
<?php

require 'vendor/autoload.php';

use App\Models\Usuario;

$usuario = new Usuario();

echo $usuario->nome();
```

---

# Resumo

- Namespace organiza classes.
- Evita conflitos de nomes.
- O Composer usa PSR-4 para localizar arquivos.
- `use` importa uma classe.
- `vendor/autoload.php` carrega tudo automaticamente.
- Sempre execute `composer dump-autoload` após alterar o autoload no `composer.json`.