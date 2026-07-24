# One To One (1:1)

Um relacionamento **One To One (1:1)** acontece quando um registro de uma tabela pode estar ligado a **apenas um** registro da outra tabela.

```
users (1) -------- (1) roles
```

---

## Como Funciona

A tabela que recebe a **Foreign Key** também deve possuir um **UNIQUE**, impedindo que dois registros apontem para o mesmo registro da outra tabela.

---

## Como Criar

```sql
CREATE TABLE roles (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    role_name VARCHAR(50)
);

CREATE TABLE users (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),

    role_id INT UNSIGNED UNIQUE,

    CONSTRAINT fk_role
        FOREIGN KEY (role_id)
        REFERENCES roles(id)
);
```

> O campo `role_id` é `UNIQUE`, por isso dois usuários não podem usar o mesmo cargo.

> A Foreign Key e a Primary Key devem possuir o mesmo tipo (`INT UNSIGNED`).

---

## Inserindo Dados

```sql
INSERT INTO roles (role_name)
VALUES ('Administrador');

INSERT INTO users (name, role_id)
VALUES ('João', 1);
```

---

## Como Consultar (JOIN)

```sql
SELECT u.name, r.role_name
FROM users u
JOIN roles r
ON u.role_id = r.id;
```

---

## Resumo

- `FOREIGN KEY` cria o relacionamento.
- `UNIQUE` garante que seja **1:1**.
- Os dois campos precisam ter o mesmo tipo.
- Use `JOIN` para buscar dados das duas tabelas.