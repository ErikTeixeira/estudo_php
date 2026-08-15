# Vite no Laravel

## O que é o Vite?

O **Vite** é uma ferramenta utilizada pelo Laravel para gerenciar os arquivos do **Front-end**, principalmente:

* JavaScript
* CSS
* Tailwind CSS
* Imagens e outros assets

Ele faz a ponte entre os arquivos que desenvolvemos em `resources/` e os arquivos que serão utilizados pelo navegador.

```text
resources/
   ↓
  Vite
   ↓
processamento/otimização
   ↓
public/build/
   ↓
Navegador
```

---

## `package.json`

O `package.json` gerencia as **dependências e scripts do NPM** do projeto.

Exemplo:

```json
{
    "scripts": {
        "build": "vite build",
        "dev": "vite"
    }
}
```

### Scripts

#### `npm run dev`

```bash
npm run dev
```

Executa:

```bash
vite
```

É utilizado durante o **desenvolvimento**.

Permite:

* Servir os arquivos do Front-end.
* Detectar alterações.
* Atualizar a aplicação rapidamente.
* Trabalhar com CSS, JavaScript e Tailwind.

---

#### `npm run build`

```bash
npm run build
```

Executa:

```bash
vite build
```

É utilizado para **produção**.

O Vite:

* Processa os arquivos.
* Otimiza o código.
* Minifica JavaScript e CSS.
* Gera os assets finais.
* Cria arquivos com hashes para controle de cache.

O resultado normalmente fica em:

```text
public/build/
```

---

## `devDependencies`

Define as ferramentas utilizadas no desenvolvimento do projeto.

### Vite

```json
"vite": "^7.0.7"
```

Ferramenta responsável pelo desenvolvimento e build dos assets.

### Laravel Vite Plugin

```json
"laravel-vite-plugin": "^2.0.0"
```

Integra o Vite ao Laravel.

Permite utilizar, por exemplo:

```php
@vite(['resources/css/app.css', 'resources/js/app.js'])
```

### Tailwind CSS

```json
"tailwindcss": "^4.0.0"
```

Framework CSS utilizado para estilizar a aplicação.

### Axios

```json
"axios": "^1.11.0"
```

Biblioteca JavaScript utilizada para fazer requisições HTTP.

Exemplo:

```javascript
axios.get('/api/clientes')
```

### Concurrently

```json
"concurrently": "^9.0.1"
```

Permite executar vários comandos simultaneamente.

---

## `dev` vs `build`

| Comando         | Função                           | Uso                       |
| --------------- | -------------------------------- | ------------------------- |
| `npm run dev`   | Inicia o Vite em desenvolvimento | Durante o desenvolvimento |
| `npm run build` | Gera os assets otimizados        | Produção/deploy           |

---

## Resumo

```text
npm run dev
    ↓
vite
    ↓
Ambiente de desenvolvimento
```

```text
npm run build
    ↓
vite build
    ↓
Processamento + otimização
    ↓
public/build/
    ↓
Produção
```

### Em uma frase

> **O Vite é o motor de desenvolvimento e build do Front-end no Laravel, responsável por processar, otimizar e disponibilizar arquivos como JavaScript e CSS.**
