
### Tabela Produtos criada - com FK direto na tabela de produtos

```sql
USE teste;

CREATE TABLE produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title varchar(100) NOT NULL,
    price DECIMAL(10, 2),
    cliente_id INT,
    CONSTRAINT fk_produtos_clientes FOREIGN KEY (cliente_id)
        REFERENCES clientes(id)
)
```

- ``DECIMAL(10, 2)`` → Tipo de dado para números com casas decimais, ideal para valores monetários.
    - 10 em DECIMAL(10,2) → Quantidade máxima de dígitos que o número pode ter (antes e depois da vírgula).
    - 2 em DECIMAL(10,2) → Quantidade de casas decimais (ex.: 199.99).
- ``FOREIGN KEY (FK)`` → Chave estrangeira que cria um relacionamento entre duas tabelas.
- ``cliente_id`` → Coluna que guarda o ID do cliente relacionado ao produto.
- ``REFERENCES clientes(id)`` → Diz que cliente_id deve existir na coluna id da tabela clientes.
- ``CONSTRAINT`` → Dá um nome para uma regra de restrição da tabela, para facilitar manutenção e identificação de erros
- ``fk_produtos_clientes`` → Nome da constraint da chave estrangeira (pode ser qualquer nome significativo).

---


### Tabela Produtos criada - com tabela PIVOT (que é a intermediária entre clientes e produtos)
- Cria a tabela ``produtos_clientes_pivot``

```sql
USE teste;

CREATE TABLE produtos_clientes_pivot (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT,
    cliente_id INT,
    CONSTRAINT fk_produtos_produtos FOREIGN KEY (product_id)
        REFERENCES produtos(id),
    CONSTRAINT fk_produtos_clientes FOREIGN KEY (cliente_id)
        REFERENCES clientes(id)
)
```

---

### Relaciona os clientes e produtos na produtos_clientes_pivot

**Atualmente é recomendado utilizar a sintaxe com `ON` em vez de colocar as condições no `WHERE`**

```sql
SELECT * FROM clientes as c JOIN produtos AS p JOIN produtos_clientes_pivot AS pivot
WHERE c.id = pivot.cliente_id AND p.id = pivot.product_id
```

Retorna os clientes junto com os produtos relacionados a eles, usando uma tabela intermediária (pivot) que representa um relacionamento **muitos-para-muitos**
- **SELECT * →** Seleciona todas as colunas das tabelas envolvidas.
- ``FROM clientes →`` **Define clientes como a tabela principal da consulta**.
- **AS c →** Cria um apelido (c) para a tabela clientes, facilitando a escrita.
- **JOIN produtos →** Inclui a tabela produtos na consulta para combinar seus dados.
- **AS p →** Cria um apelido (p) para a tabela produtos.
- **JOIN produtos_clientes_pivot →** Inclui a tabela pivot, responsável por ligar clientes e produtos.
- **AS pivot →** Cria um apelido (pivot) para a tabela intermediária.
- **WHERE →** Define as condições que as tabelas devem satisfazer para serem relacionadas.
- **c.id = pivot.cliente_id →** Relaciona cada cliente ao seu registro correspondente na tabela pivot.
- **p.id = pivot.product_id →** Relaciona cada produto ao seu registro correspondente na tabela pivot.


---
