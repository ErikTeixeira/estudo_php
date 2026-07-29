## Laravel

### Documentação - https://laravel.com/docs/13.x/installation

---

## Folders / files

- ``Composer.json`` - Mapa de configuração e gerenciamento de dependências do seu projeto
- ``.env`` (environment) - Cofre de configurações sensíveis do seu projeto Laravel
- ``database/``
    - ``factories`` - Classes usadas para gerar dados fictícios e realistas de maneira automática
    - ``migrations`` - Sistema de versionamento do banco de dados, registram todas as mudanças feitas na estrutura do banco
    - ``seeders`` - Classes usadas para popular o banco de dados com dados iniciais ou de teste de forma automática
        - rodar a seeder ``php artisan db:seed nomeSeeder`` ou roda todas ``php artisan db:seed``

- ``routes/``
    - ``web`` - Rota padrão - qualquer coisa digitada na url que não tem no sistema leva aqui

- ``resourses/``
    - ``views`` - Onde fica as telas do sistema