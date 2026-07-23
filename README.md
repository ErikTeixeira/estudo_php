# Estudo PHP e Laravel

---

### Rodar o index.php
- Vá até a pasta onde está o arquivo
    - cd "C:\Users\erikt\Downloads\estudo_advpl_protheus\estudo_php\php\annots\html_php"
- Execute o servidor
    - ``php -S localhost:8000``

#### Projeto clientes
- cd "C:\Users\erikt\Downloads\estudo_advpl_protheus\estudo_php\php\data_base\conec_db_php"      


---

### Form | Input

- **Precisa ter o 'name' em cada input para o form passar os dados corretamente**

---

### var_dump

- **Importante para debugar**, como o tipo de requisição e para testar as querys
```php
var_dump($_GET);
var_dump($_POST);

var_dump($query);  // e da para pegar a query que foi gerada e testar no banco de dados
```