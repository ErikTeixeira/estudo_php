# Many To Many (N:N)

## O Problema

Imagine um sistema de escola com **alunos** e **cursos**.

- Um aluno pode se matricular em **vários cursos** (Matemática, História, Inglês...).
- Um curso pode ter **vários alunos** matriculados nele.

Ou seja: **um aluno → vários cursos** E **um curso → vários alunos**. Isso é justamente a definição de N:N (muitos para muitos).

```text
alunos (N) -------- (N) cursos
```

---

## Por Que Não Dá Pra Resolver Como 1:N?

Se você tentasse resolver isso colocando uma Foreign Key direto na tabela `alunos`:

```sql
CREATE TABLE alunos (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    curso_id INT UNSIGNED -- ❌ problema aqui
);
```

Você só conseguiria guardar **um curso por aluno**. Se o aluno se matricular em 3 cursos, não há espaço pra isso — a coluna `curso_id` só guarda um valor.

E se você tentasse fazer o contrário (colocar `aluno_id` na tabela `cursos`), o problema seria o mesmo, só que invertido: um curso só guardaria um aluno.

**Por isso**, quando os dois lados podem ter vários relacionados ao mesmo tempo, nenhuma das duas tabelas consegue guardar a FK sozinha. É necessária uma **terceira tabela** só para guardar essas combinações.

---

## A Solução: Tabela Intermediária

```text
alunos (1) ---- (N) matriculas (N) ---- (1) cursos
```

A tabela `matriculas` funciona como uma "ponte": cada linha dela representa **uma matrícula específica** — ou seja, a informação de que "este aluno está neste curso".

```sql
CREATE TABLE alunos (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100)
);

CREATE TABLE cursos (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nome_curso VARCHAR(100)
);

CREATE TABLE matriculas (
    aluno_id INT UNSIGNED,
    curso_id INT UNSIGNED,

    PRIMARY KEY (aluno_id, curso_id),

    CONSTRAINT fk_aluno
        FOREIGN KEY (aluno_id)
        REFERENCES alunos(id),

    CONSTRAINT fk_curso
        FOREIGN KEY (curso_id)
        REFERENCES cursos(id)
);
```

> A `PRIMARY KEY` composta (`aluno_id`, `curso_id`) impede que o mesmo aluno seja matriculado duas vezes no mesmo curso — a combinação dos dois valores tem que ser única.

---

## Inserindo Dados (Passo a Passo)

**1. Cadastra os alunos:**

```sql
INSERT INTO alunos (nome)
VALUES ('João'), ('Maria');
```
Resultado: `João` tem `id = 1`, `Maria` tem `id = 2`.

**2. Cadastra os cursos:**

```sql
INSERT INTO cursos (nome_curso)
VALUES ('Matemática'), ('História'), ('Inglês');
```
Resultado: `Matemática` tem `id = 1`, `História` tem `id = 2`, `Inglês` tem `id = 3`.

**3. Faz as matrículas (conecta quem está em qual curso):**

```sql
INSERT INTO matriculas (aluno_id, curso_id)
VALUES
(1, 1), -- João está em Matemática
(1, 2), -- João também está em História
(2, 2), -- Maria está em História
(2, 3); -- Maria também está em Inglês
```

Repare que **João aparece duas vezes** (em duas linhas diferentes) e **Matemática/História também aparecem em mais de uma linha**. É exatamente essa repetição controlada, através da tabela intermediária, que permite o relacionamento N:N.

---

## Como Consultar (JOIN)

**Quais cursos cada aluno está fazendo?**

```sql
SELECT a.nome, c.nome_curso
FROM alunos a
JOIN matriculas m ON a.id = m.aluno_id
JOIN cursos c ON m.curso_id = c.id;
```

Resultado:

| nome  | nome_curso  |
|-------|-------------|
| João  | Matemática  |
| João  | História    |
| Maria | História    |
| Maria | Inglês      |

**Quais alunos estão em cada curso?** (a mesma lógica, só muda o que você olha)

```sql
SELECT c.nome_curso, a.nome
FROM cursos c
JOIN matriculas m ON c.id = m.curso_id
JOIN alunos a ON m.aluno_id = a.id
ORDER BY c.nome_curso;
```

---

## Por Que Isso É Importante?

- **Evita duplicação de dados**: sem a tabela intermediária, você teria que repetir o nome do aluno várias vezes dentro da tabela de cursos (ou vice-versa), o que é uma péssima prática de modelagem.
- **Flexibilidade**: você pode adicionar ou remover uma matrícula sem mexer nos dados de `alunos` ou `cursos` — só insere ou apaga uma linha em `matriculas`.
- **Histórico e metadados**: a tabela intermediária pode guardar informações extras sobre a *relação em si*, por exemplo, a data da matrícula:

```sql
ALTER TABLE matriculas
ADD COLUMN data_matricula DATE;
```

Isso não seria possível se a informação estivesse "espremida" dentro de `alunos` ou `cursos`, porque a data pertence à **relação entre os dois**, não a um deles isoladamente.

---

## Resumo

- N:N acontece quando os dois lados podem ter vários relacionados simultaneamente.
- Não dá pra resolver com uma FK simples em nenhuma das tabelas.
- A solução é criar uma **tabela intermediária** com uma FK para cada lado.
- A `PRIMARY KEY` composta evita registros duplicados na relação.
- São necessários **dois `JOIN`s** para consultar os dados combinados.
- A tabela intermediária também é o lugar certo para guardar dados que pertencem à relação em si (como datas, status, etc).