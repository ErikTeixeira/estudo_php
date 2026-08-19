## Configuração Inicial Projeto Laravel


- **Criar um projeto**
    - ``composer create-project laravel/laravel laravel_estudo``
    - ``npm install``
    - ``php artisan key:generate``
    - para o bootstrap - ``npm i --save bootstrap @popperjs/core`` - ``npm i --save-dev sass``
    - ``composer install``
    - Configurar o banco de dados
    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3316
    DB_DATABASE=db_dashboard
    DB_USERNAME=root
    DB_PASSWORD=Senha
    ```
    - ``php artisan migrate``


---

### Configuração Bootstrap + SCSS

- Mudar o nome da pasta e arquivo de css para scss - resources\scss\app.scss
    - Alterar no vite.config.js o caminho do css para scss
- No app.scss, deixar apenas ``@import "bootstrap";``
- No app.js, deixar apenas ``import 'bootstrap';``
- No welcome.blade.php - tirar o que veio de padrão (imports e textos)
    - Colocar no head ``@vite('resources/scss/app.scss')``
    - Colocar no body ``@vite('resources/js/app.js')``

---

### AdminLTE Bootstrap Admin Dashboard Template

https://adminlte.io

- Possui várias dependências

- ``npm install admin-lte``

- No aap.js -> coloca ``import 'admin-lte';``
- No app.scss -> coloca ``@import 'admin-lte';`` e remove ``@import "bootstrap";``

- As **views** dele ficam dentro do node modules - node_modules\admin-lte

