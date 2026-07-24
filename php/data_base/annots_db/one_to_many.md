# One To Many (1:N)

Um relacionamento **One To Many (1:N)** acontece quando **um registro** de uma tabela pode estar ligado a **vários registros** de outra tabela.

```text
roles (1) -------- (N) users
```

---

## Como Funciona

A tabela que recebe a **Foreign Key** **não possui `UNIQUE`**, permitindo que vários registros apontem para o mesmo registro da outra tabela.

---

## Exemplo

```sql
CREATE TABLE roles (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    role_name VARCHAR(50)
);

CREATE TABLE users (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),

    role_id INT UNSIGNED,

    CONSTRAINT fk_role
        FOREIGN KEY (role_id)
        REFERENCES roles(id)
);
```

> Como `role_id` **não é `UNIQUE`**, vários usuários podem ter o mesmo cargo.

---

## Inserindo Dados

```sql
INSERT INTO roles (role_name)
VALUES ('Administrador');

INSERT INTO users (name, role_id)
VALUES
('João', 1),
('Maria', 1),
('Pedro', 1);
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
- **Não** utilize `UNIQUE` na Foreign Key.
- Um registro da tabela `roles` pode estar relacionado com vários registros da tabela `users`.
- Use `JOIN` para consultar dados das duas tabelas.


---


## Como Funciona o JOIN em Many To Many (N:N)

Em um relacionamento **Many To Many**, o `JOIN` precisa passar pela **tabela intermediária**, pois é ela que conecta as duas tabelas principais.

Exemplo:

```text
students ← student_course → courses
```

Consulta:

```sql
SELECT s.name, c.course_name
FROM students s
JOIN student_course sc
    ON s.id = sc.student_id
JOIN courses c
    ON sc.course_id = c.id;
```

### Passo a passo

1. Começa pela tabela `students`.
2. Faz um `JOIN` com `student_course` usando `students.id = student_course.student_id`.
3. Em seguida, faz outro `JOIN` com `courses` usando `student_course.course_id = courses.id`.
4. O resultado une o aluno ao curso correspondente.

> Em relacionamentos **Many To Many**, normalmente são necessários **dois JOINs**, pois a ligação entre as tabelas acontece através da tabela intermediária.

