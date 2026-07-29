# Estudo PHP e Laravel

---

### Rodar o index.php
- Vá até a pasta onde está o arquivo
    - cd "C:\Users\erikt\Downloads\estudo_advpl_protheus\estudo_php\php\annots\html_php"
- Execute o servidor
    - ``php -S localhost:8000``

#### Projeto clientes
- cd "C:\Users\erikt\Downloads\estudo_advpl_protheus\estudo_php\php\data_base\conec_db_php"      

#### Projeto Laravel
- cd "C:\Users\erikt\Downloads\estudo_advpl_protheus\estudo_php\php\laravel\projeto-laravel\example-app"  

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

---

### Laravel

- Instalar o laravel
    - ``composer global require laravel/installer``

- Comandos para iniciar o projeto
    **Tem que rodar os dois ao mesmo tempo, em CMDs diferentes**
    - ``php artisan serve``
    - ``npm run dev``

- Comandos para 
    - ``php artisan config:clear`` – Limpa o cache das configurações para que alterações nos arquivos de configuração sejam aplicadas.
    - ``php artisan optimize`` – Gera caches (config, rotas, eventos e views) para melhorar o desempenho da aplicação.
    - ``php artisan migrate`` – Executa as migrações do banco de dados, criando ou atualizando tabelas conforme os arquivos de migration.

---
