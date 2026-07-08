# Sumário dos arquivos de estudo PHP


---

## 📁 annots/0_basics/

- [array.md](annots/0_basics/array.md)  
  Exemplos de sintaxe de arrays em PHP: criação, acesso a índices (numéricos e associativos) e uso de `print_r` para exibir o array completo.

- [estr_repet.md](annots/0_basics/estr_repet.md)  
  Estruturas de repetição: `for`, `foreach` (com e sem índice) e `while`. Exemplos de iteração sobre arrays.

- [funcao.md](annots/0_basics/funcao.md)  
  Definição de funções em PHP, com destaque para a prática de não realizar cálculos diretamente no `return` (armazenar em variável para melhor performance).

- [if_ternario.md](annots/0_basics/if_ternario.md)  
  Operador ternário (`? :`) como alternativa compacta ao `if/else`.

---

## 📁 annots/html_php/

- [arq_externo_php_para_html/functions.php](annots/html_php/arq_externo_php_para_html/functions.php)  
  Função `frutas()` que gera `<option>` para um select, utilizando um array de frutas.

- [arq_externo_php_para_html/index.php](annots/html_php/arq_externo_php_para_html/index.php)  
  Exemplo de como incluir arquivos PHP externos (`include`, `require`, `require_once`) e usar a função `frutas()` dentro de um formulário HTML.

- [html_php.md](annots/html_php/html_php.md)  
  Guia completo sobre a integração de PHP com HTML: interpolação de variáveis, loops `for` com geração de elementos, uso de `if` e operador ternário dentro do HTML, e criação de funções para reutilização de código.

- [index.php](annots/html_php/index.php)  
  Exemplo prático de um formulário com um select populado dinamicamente pela função `frutas()`, demonstrando a mistura de PHP e HTML.

---

## 📁 annots/main.md

- [main.md](annots/main.md)  
  Resumo geral de PHP, contendo tópicos sobre funções matemáticas, strings, arrays (associativos e indexados), estruturas condicionais e de repetição. Inclui também dicas sobre servidor local e comandos básicos.

---

## 📁 data_base/

- [fk_join.md](data_base/fk_join.md)  
  Explicação sobre `JOIN` em SQL: `INNER JOIN`, `LEFT JOIN` e `RIGHT JOIN`. Demonstração com exemplos práticos de relacionamento muitos-para-muitos utilizando tabela pivot.

- [mySql_crud.md](data_base/mySql_crud.md)  
  Operações básicas de CRUD no MySQL: `CREATE TABLE`, `SELECT`, `INSERT`, `UPDATE` e `DELETE`. Inclui uso de `AUTO_INCREMENT`, `PRIMARY KEY` e `NOT NULL`.

- [relaciona_fk_pivot.md](data_base/relaciona_fk_pivot.md)  
  Criação de tabelas com chaves estrangeiras (FK) e tabela pivot para relacionamentos muitos-para-muitos. Exemplo de consulta com `JOIN` utilizando a sintaxe moderna com `ON`.

---

## 📁 data_base/conec_db_php/

- [conexao_db.md](data_base/conec_db_php/conexao_db.md)  
  Guia passo a passo sobre conexão com banco de dados usando PDO. Explica `new PDO()`, `prepare()`, `execute()`, `fetchAll()`, `PDO::FETCH_ASSOC`, e o fluxo completo de uma consulta.

- [function.php](data_base/conec_db_php/function.php)  
  Funções reutilizáveis: `connect()` para estabelecer a conexão PDO, `selectClientts()` para buscar todos os clientes e `selectProducts()` para buscar todos os produtos.

- [index.php](data_base/conec_db_php/index.php)  
  Página HTML que inclui `function.php` e exibe a lista de clientes e produtos, utilizando as funções de consulta e formatação de valores monetários com `number_format()`.

---


*Última atualização: 2026-07-07*