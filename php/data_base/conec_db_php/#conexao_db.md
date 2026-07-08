# PHP + Banco de Dados (PDO)

## 1. include

```php
include "function.php";
```

Importa outro arquivo para poder usar as funções dele.

Exemplo:

```php
include "function.php";

$clientes = selectClients();
```

---

## 2. function

```php
function selectClients()
{

}
```

Agrupa um código para reutilizar sempre que precisar.

Exemplo:

```php
selectClients();
```

---

## 3. new PDO()

```php
$pdo = new PDO(
    "mysql:host=localhost;port=3316;dbname=teste",
    "root",
    "Senha@2025"
);
```

Cria uma conexão entre o PHP e o banco de dados.

Se conectar com sucesso, `$pdo` será usado para executar consultas.

---

## 4. O que significa cada parte?

```php
mysql:
```

Tipo do banco de dados.

---

```php
host=localhost
```

Endereço do servidor do banco.

---

```php
port=3316
```

Porta onde o MySQL está rodando.

---

```php
dbname=teste
```

Nome do banco de dados.

---

```php
"root"
```

Usuário do banco.

---

```php
"Senha@2025"
```

Senha do banco.

---

## 5. return

```php
return $pdo;
```

Envia a conexão para quem chamou a função.

Exemplo:

```php
$db = connect();
```

Agora `$db` possui a conexão.

---

## 6. Recebendo a conexão

```php
$db = connect();
```

Guarda a conexão criada pela função `connect()`.

Agora podemos fazer consultas usando `$db`.

---

## 7. prepare()

```php
$query = $db->prepare("SELECT * FROM clientes");
```

Prepara o comando SQL para ser executado.

Ainda não busca os dados.

---

## 8. execute()

```php
$query->execute();
```

Executa o comando preparado.

Sem ele, o SQL não roda.

---

## 9. fetchAll()

```php
$result = $query->fetchAll(PDO::FETCH_ASSOC);
```

Busca todos os registros encontrados.

O resultado será um array.

---

## 10. PDO::FETCH_ASSOC

```php
$query->fetchAll(PDO::FETCH_ASSOC);
```

Retorna as colunas pelo nome.

Exemplo:

```php
[
    [
        "id" => 1,
        "name" => "João"
    ]
]
```

Assim podemos fazer:

```php
$cliente["name"];
```

---

## 11. return dos dados

```php
return $result;
```

Retorna os registros encontrados para o `index.php`.

Exemplo:

```php
$clientes = selectClients();
```

---

## 12. foreach

```php
foreach ($clientes as $cliente)
```

Percorre cada item do array.

Se houver 3 clientes, o código será executado 3 vezes.

---

## 13. Acessando uma coluna

```php
$cliente["name"]
```

Pega o valor da coluna `name`.

Exemplo:

```php
echo $cliente["name"];
```

Resultado:

```
João
```

---

## 14. echo

```php
echo $cliente["name"];
```

Mostra um valor na tela.

Tudo que aparece para o usuário passa pelo `echo`.

---

## 15. Exemplo completo

### function.php

```php
function selectClients()
{
    $db = connect();

    $query = $db->prepare("SELECT * FROM clientes");

    $query->execute();

    return $query->fetchAll(PDO::FETCH_ASSOC);
}
```

Essa função conecta ao banco, executa o SELECT e devolve todos os clientes.

---

### index.php

```php
$clientes = selectClients();
```

Recebe os clientes retornados pela função.

---

```php
foreach ($clientes as $cliente)
{
    echo $cliente["name"];
}
```

Mostra o nome de cada cliente na tela.

---

# Fluxo básico

```php
$db = connect();                  // Conecta ao banco

$query = $db->prepare(...);       // Prepara o SQL

$query->execute();                // Executa o SQL

$result = $query->fetchAll(...);  // Busca os dados

return $result;                   // Envia os dados para o index

$clientes = selectClients();      // Recebe os dados

foreach (...)                     // Percorre os dados

echo ...                          // Mostra na tela
```

---

# O que não esquecer

- `new PDO()` → cria a conexão com o banco.
- `prepare()` → prepara o SQL.
- `execute()` → executa o SQL.
- `fetchAll()` → busca todos os registros.
- `return` → devolve os dados para outra função ou arquivo.
- `include` → permite usar funções de outro arquivo.
- `foreach` → percorre todos os registros retornados.
- `echo` → mostra o resultado no HTML.