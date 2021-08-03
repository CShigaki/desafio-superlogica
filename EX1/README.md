## Primeiro Exercício

Como o exercício define as validações, consulta e inserção como objetivo optei por não usar nenhum framework.
As validações podem ser encontradas em

```
app/SignUpValidator
app/validations/ValidEmail
app/validations/ValidPassword
app/validations/ValidZip
```

O enunciado deixa explícito que conexões com banco não devem ser criadas mas para tornar esse repo funcional optei como criá-las mesmo assim.

### Requirements

- Make (opcional)
- Docker
- Docker-compose
- Composer

### Como Rodar

Depois que o Docker, o docker-compose e o composer estiverem instalados rode o comando `composer install`.
Após o término do install se certifique que vc não tem nenhuma outra aplicação rodando na porta 80 e rode o comando `make start` ou `docker-compose up --build --force-recreate` no seu terminal.

Quando os containers terminarem de inicializar vc pode acessar a página acessando seu localhost.

### Como rodar os testes

Para rodar os testes não é necessário que os containers estejam de pé. Basta rodar o comando `make test` ou `vendor/bin/phpunit`.

### Enunciado

```
O intuito deste exercício é analisar sua capacidade de mapear todas as validações e
gravação das informações.
Seu código PHP irá receber o seguinte formulário:

<form method="post">
    <div>
        <label for="userName">Nome completo:</label>
        <input type="text" id="name" name="name">
    </div>
    <div>
        <label for="userName">Nome de login:</label>
        <input type="text" id="userName" name="userName">
    </div>
    <div>
        <label for="zipCode">CEP</label>
        <input type="text" id="zipCode" name="zipCode">
    </div>
    <div>
        <label for="email">Email:</label>
        <input type="text" id="email" name="email">
    </div>
    <div>
        <label for="password">Senha (8 caracteres mínimo, contendo pelo menos 1 letra
        e 1 número):</label>
        <input type="password" id="password" name="password">
    </div>
    <input type="submit" value="Cadastrar">
</form>

Crie um código para fazer todas as validações que achar necessárias, consulta e inserção
no banco de dados. Para simular a consulta e a gravação no banco, utilize os métodos
previamente criados onde $informacao é um array com os mesmos nomes dos elementos
do form.

Crie utilizando OO, podendo usar qualquer framework se desejar.
Métodos

class Helpers
{
    public static function select(string $nome_da_tabela, array $informacao): boolean
    {
    // retorna se a consulta existe
    }
    public static function insert(string $nome_da_tabela, array $informacao): int
    {
    // retorna o id do registro
    }
    public static function curl(string $url, mixed $informacao): mixed
    {
    // faz uma requisição curl para uma url e retorna a informação desejada
    }
}

ATENÇÃO: Você não deve reescrever os métodos e criar conexões com banco de
dados, somente usá-los como caixa preta, onde o retorno será o especificado. Todo
registro tem um campo obrigatório chamado “Id” que é um auto incremento no
formato inteiro.
```
