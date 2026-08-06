# Estudo PHP e Laravel

---

### Rodar o index.php
- Vá até a pasta onde está o arquivo
    - cd "C:\Users\erikt\Downloads\estudo_advpl_protheus\estudo_php\php\annots\html_php"
- Execute o servidor
    - ``php -S localhost:8000``

#### Projeto clientes PHP
- cd "C:\Users\erikt\Downloads\estudo_advpl_protheus\estudo_php\php\data_base\conec_db_php"      

#### Projeto PHP + Laravel
- cd "C:\Users\erikt\Downloads\estudo_advpl_protheus\estudo_php\php\laravel\projeto-laravel\example-app"  

#### Projeto laravel 
- cd D:\estudo_focado\estudo_php\laravel\projetos\laravel_estudo

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

- Criar um projeto
    - ``composer create-project laravel/laravel laravel_estudo``

- Comandos para iniciar o projeto
    **Tem que rodar os dois ao mesmo tempo, em CMDs diferentes**
    - ``php artisan serve``
    - ``npm run dev``

- Comandos para 
    - ``php artisan config:clear`` – Limpa o cache das configurações para que alterações nos arquivos de configuração sejam aplicadas.
    - ``php artisan optimize`` – Gera caches (config, rotas, eventos e views) para melhorar o desempenho da aplicação.
    - ``php artisan migrate`` – Executa as migrações do banco de dados, criando ou atualizando tabelas conforme os arquivos de migration.

- Utilizar o login do laravel
    - ``composer require laravel/ui``
    - ``php artisan ui:auth``

- Todos os formularios tem que ter isso
    - #### @csrf
        -  cria um campo de formulário oculto com um token de segurança contra ataques do tipo Cross-Site

- Colocar as rotas dentro de um **middleware** para que não sejam acessadas sem login
    - ``Route::middleware('auth')->group(function () {``

---
