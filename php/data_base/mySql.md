## MySQL

## Escolher o SCHEMA

- **No topo da consulta**
``USE nome_schema;``

---

### SELECT

```sql
USE teste;

SELECT * FROM clientes;


SELECT name FROM clientes where id = 2;
/*ou `name`*/
```

---

### INSERT

```sql
USE teste;

INSERT INTO clientes (`name`,`age`) values ('Cliente 1', 28);

INSERT INTO clientes (name,age) values ('Cliente 2', 32);
```

---

### UPDATE

```sql
USE teste;

UPDATE clientes SET name = 'João Batista' WHERE id = 3;
UPDATE clientes SET name = 'João Batista', age = 29 WHERE id = 3;
/*ou `name`*/
```

---
