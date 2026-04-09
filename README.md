# Sistema Web — CRUD PHP

Sistema de gerenciamento de professores desenvolvido com PHP e MySQL.

## Funcionalidades
- Cadastro de professores
- Consulta por nome, formação ou turma
- Atualização de registros
- Exclusão de registros

## Tecnologias
- PHP
- MySQL
- HTML/CSS

## Como rodar
1. Clone o repositório
2. Coloque na pasta `htdocs` do XAMPP
3. Crie o banco `curso` e rode o SQL:
```sql

CREATE TABLE professor (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    forma VARCHAR(100),
    turma VARCHAR(50)
);
```
4. Acesse `http://localhost/nome-da-pasta`
