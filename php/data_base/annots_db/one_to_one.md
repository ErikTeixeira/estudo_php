# One To One (1:1)

Um relacionamento **One To One (1:1)** acontece quando um registro de uma tabela pode estar ligado a **apenas um** registro da outra tabela, e vice-versa.

```text
users (1) -------- (1) user_profiles
```

---

## Como Funciona

A tabela que recebe a **Foreign Key** também deve possuir um **UNIQUE**, impedindo que dois registros apontem para o mesmo registro da outra tabela.

Se além do `UNIQUE` a coluna também for `NOT NULL`, garantimos que a relação é **obrigatória** dos dois lados (todo `user` tem um `user_profile`, e todo `user_profile` pertence a um `user`).

---

## Como Criar

```sql
CREATE TABLE users (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(150)
);

CREATE TABLE user_profiles (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    bio TEXT,
    avatar_url VARCHAR(255),

    user_id INT UNSIGNED UNIQUE NOT NULL,

    CONSTRAINT fk_user
        FOREIGN KEY (user_id)
        REFERENCES users(id)
);
```

> O campo `user_id` é `UNIQUE`, por isso dois perfis não podem apontar para o mesmo usuário.

> A Foreign Key e a Primary Key devem possuir o mesmo tipo (`INT UNSIGNED`).

---

## Inserindo Dados

```sql
INSERT INTO users (name, email)
VALUES ('João', 'joao@email.com');

INSERT INTO user_profiles (bio, avatar_url, user_id)
VALUES ('Desenvolvedor backend apaixonado por SQL', 'joao.png', 1);
```

> Se tentarmos inserir outro `user_profile` com `user_id = 1`, o banco rejeita a operação por causa do `UNIQUE`.

---

## Como Consultar (JOIN)

```sql
SELECT u.name, up.bio, up.avatar_url
FROM users u
JOIN user_profiles up
ON u.id = up.user_id;
```

---

## Resumo

- `FOREIGN KEY` cria o relacionamento.
- `UNIQUE` garante que seja **1:1**.
- `NOT NULL` garante que a relação seja **obrigatória**.
- Os dois campos (FK e PK) precisam ter o mesmo tipo.
- Use `JOIN` para buscar dados das duas tabelas.

---

## Outros Exemplos Clássicos de 1:1

- `pessoas` ↔ `passaportes`
- `funcionarios` ↔ `carteiras_de_trabalho`
- `paises` ↔ `capitais`
- `users` ↔ `user_settings`