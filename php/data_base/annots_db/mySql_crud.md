## MySQL

- [Escolher o SCHEMA](#escolher-o-schema)
- [SELECT](#select)
- [INSERT](#insert)
- [UPDATE](#update)
- [DELETE](#delete)

---

## Escolher o SCHEMA

- **No topo da consulta**
``USE nome_schema;``

---

### CREATE

```sql
USE teste;

CREATE TABLE fornecedores(
    codigo int(6) AUTO_INCREMENT,
    nome varchar(100) NOT NULL,
    email varchar(100),
    PRIMARY KEY (codigo)
);

/*ou*/

CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100),
    email VARCHAR(255)
)
```

- ``AUTO_INCREMENT`` pode ser utilizado para automatizar um código que sirva de chave primária de uma tabela.
- ``PRIMARY KEY`` define a chave primária da tabela, isto é, o campo que serve como chave da tabela e que não pode ser repetido.
- ``NOT NULL`` define que um determinado campo seja de preenchimento obrigatório.

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

### DELETE

```sql
USE teste;

DELETE FROM clientes where id = 2;
```


