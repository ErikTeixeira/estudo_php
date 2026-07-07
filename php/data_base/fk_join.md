### Dica

Atualmente é recomendado utilizar a sintaxe com `ON` em vez de colocar as condições no `WHERE`.

✅ Mais legível:

```sql
SELECT
    c.name,
    p.title
FROM clientes AS c
JOIN produtos_clientes_pivot AS pivot
    ON c.id = pivot.cliente_id
JOIN produtos AS p
    ON p.id = pivot.product_id;
```

⚠️ Evite:

```sql
SELECT
    c.name,
    p.title
FROM clientes AS c
JOIN produtos AS p
JOIN produtos_clientes_pivot AS pivot
WHERE c.id = pivot.cliente_id
AND p.id = pivot.product_id;
```

As duas consultas produzem o mesmo resultado (neste caso), porém utilizar `ON` é o padrão moderno e deixa claro qual condição pertence a cada `JOIN`.

---


```sql
SELECT c.name, p.title, p.price FROM clientes as c JOIN produtos AS p JOIN produtos_clientes_pivot AS pivot
WHERE c.id = pivot.cliente_id AND p.id = pivot.product_id
```
---

## JOIN

- [O que é JOIN?](#o-que-é-join)
- [INNER JOIN](#inner-join)
- [LEFT JOIN](#left-join)
- [RIGHT JOIN](#right-join)

---

## O que é JOIN

O `JOIN` é utilizado para **combinar dados de duas ou mais tabelas** através de uma coluna em comum, normalmente uma **chave primária (PRIMARY KEY)** e uma **chave estrangeira (FOREIGN KEY)**.

Imagine as tabelas:

**clientes**

| id | name |
|---:|-------|
|1|João|
|2|Maria|
|3|Pedro|

**produtos**

| id | title |
|---:|---------|
|1|Notebook|
|2|Mouse|
|3|Teclado|

**produtos_clientes_pivot**

| cliente_id | product_id |
|------------:|-----------:|
|1|1|
|1|2|
|2|3|

A tabela **pivot** é quem faz a ligação entre clientes e produtos, permitindo um relacionamento **muitos-para-muitos**.

---

## INNER JOIN

O `JOIN` (ou `INNER JOIN`) retorna **apenas os registros que possuem correspondência em todas as tabelas**.

```sql
SELECT *
FROM clientes AS c
JOIN produtos_clientes_pivot AS pivot
    ON c.id = pivot.cliente_id
JOIN produtos AS p
    ON p.id = pivot.product_id;
```

Também podemos selecionar apenas algumas colunas:

```sql
SELECT
    c.name,
    p.title,
    p.price
FROM clientes AS c
JOIN produtos_clientes_pivot AS pivot
    ON c.id = pivot.cliente_id
JOIN produtos AS p
    ON p.id = pivot.product_id;
```

### Explicação

- **SELECT** → Escolhe quais colunas serão retornadas.
- **FROM clientes** → Define a tabela principal.
- **AS c** → Cria um apelido para a tabela.
- **JOIN produtos_clientes_pivot** → Junta a tabela intermediária.
- **ON c.id = pivot.cliente_id** → Diz como as tabelas serão relacionadas.
- **JOIN produtos** → Junta a tabela de produtos.
- **ON p.id = pivot.product_id** → Relaciona cada produto ao registro da tabela pivot.

Resultado exemplo:

| Cliente | Produto |
|---------|----------|
|João|Notebook|
|João|Mouse|
|Maria|Teclado|

Observe que **Pedro não aparece**, pois ele não possui produtos relacionados.

---

## LEFT JOIN

O `LEFT JOIN` retorna **todos os registros da tabela da esquerda**, mesmo que não exista correspondência na tabela da direita.

```sql
SELECT
    c.name,
    p.title
FROM clientes AS c
LEFT JOIN produtos_clientes_pivot AS pivot
    ON c.id = pivot.cliente_id
LEFT JOIN produtos AS p
    ON p.id = pivot.product_id;
```

Resultado exemplo:

| Cliente | Produto |
|---------|----------|
|João|Notebook|
|João|Mouse|
|Maria|Teclado|
|Pedro|NULL|

Perceba que **Pedro aparece**, porém como ele não possui produtos, o campo do produto fica `NULL`.

---

## RIGHT JOIN

O `RIGHT JOIN` faz o contrário do `LEFT JOIN`: ele retorna **todos os registros da tabela da direita**, mesmo que não exista correspondência na tabela da esquerda.

```sql
SELECT
    c.name,
    p.title
FROM clientes AS c
RIGHT JOIN produtos_clientes_pivot AS pivot
    ON c.id = pivot.cliente_id
RIGHT JOIN produtos AS p
    ON p.id = pivot.product_id;
```

Imagine que exista um produto sem cliente associado.

Resultado:

| Cliente | Produto |
|---------|----------|
|João|Notebook|
|João|Mouse|
|Maria|Teclado|
|NULL|Monitor|

O produto **Monitor** aparece mesmo sem cliente relacionado.

> **Resumo**
>
> - **INNER JOIN** → Apenas registros que existem nas duas tabelas.
> - **LEFT JOIN** → Todos da tabela da esquerda + os correspondentes da direita.
> - **RIGHT JOIN** → Todos da tabela da direita + os correspondentes da esquerda.

---

