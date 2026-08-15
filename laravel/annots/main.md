## Laravel

---

### Caminho do Projeto
- cd D:\estudo_focado\estudo_php\laravel\projetos\laravel_estudo

- Comandos para iniciar o projeto
    **Tem que rodar os dois ao mesmo tempo, em CMDs diferentes**
    - ``php artisan serve``
    - ``npm run dev``

    - ``php artisan config:clear``
    - ``php artisan optimize``
    - ``php artisan migrate``

---

### Comandos

- Ver os comandos ``php artisan``
- Ver mais detalhes do comando ``php artisan help make:controller``

---

## Diretivas 

- ``@foreachㅤㅤ@endForeach``
- ``@ifㅤㅤ@elseifㅤㅤ@elseㅤㅤ@endif``
- ``@yield('content')``
    - Cria uma seção para injetar conteúdo, coloca o nome que quiser nela
    - Coloca no arquivo que quer utilizar - ``@extends('layouts.app')``
    - Junto com a seção - ``@section('content')ㅤㅤ@endsection`` - colocando o conteúdo dentro dela

- ``@yield('title', Estudo Laravel)`` 
    - Da para definir um valor padrão, e mudar no arquivo se quiser passando outro valor no segundo parâmetro
    - ``@section('title', 'Mostrar usuário')``  **ou** ``@section('title') Lista de usuários @endsection``

---

## Vite - [`Vite`](vite.md)

#### Na documentação do laravel - Asset Bundling - Processing Static Assets with vite
    - Fala para colocar isso no javascript ou css, para referenciar as imagens e fontes que tem que empacotar 
    ```javascript
    import.meta.glob([
        '../images/**',
        '../fonts/**',
    ]);
    ```

**Principais pontos:**

* O **Vite** é a ferramenta responsável pelo desenvolvimento e **build dos arquivos Front-end** do Laravel.
* Trabalha principalmente com **JavaScript, CSS, Tailwind CSS e outros assets**.
* Durante o desenvolvimento, `npm run dev` inicia o Vite e permite atualização rápida dos arquivos.
* Para produção, `npm run build` executa `vite build`, processando e **otimizando/minificando os assets**.
* Os arquivos processados para produção ficam normalmente em `public/build/`.
* O Laravel se integra ao Vite através do pacote `laravel-vite-plugin` e da diretiva `@vite()`.
* As configurações e comandos principais ficam no `package.json` e no `vite.config.js`.

Comandos principais:

```bash
# Desenvolvimento
npm run dev

# Build para produção
npm run build
```

Exemplo no Blade:

```php
@vite(['resources/css/app.css', 'resources/js/app.js'])
```

> Utilizando o **vite** assim, precisa sempre que alterar o js, css, imagens **fazer o build de novo** para pegar o atualizado ou o **npm run dev** já pega automaticamente 

---
