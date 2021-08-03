<?php

declare(strict_types = 1);

namespace Superlogica;

use PDO;

/**
 * Class Helpers
 *
 * The functions presented in this class should NOT be static and should not be in a 'Helpers' class.
 * Each class from your Domain should have their own repo class
 */
class Helpers
{
    /**
     * Retorna se a consulta existe
     *
     * @param string $nome_da_tabela
     * @param array<string, string> $informacao
     *
     * @return bool
     */
    public static function select(string $nome_da_tabela, array $informacao): bool
    {
        $pdo = new PDO('mysql:dbname=superlogica;host=mysql', 'root', 'root', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        // We don't need to worry about SQL injections. PDO handles it when usinng statements.
        // On a side note tho, you can't set the table name using statements, as the statements would envelop it in '
        // so the way this method signature is makes it vulnerable to sql injection
        $statement = $pdo->prepare("SELECT * FROM {$nome_da_tabela} WHERE login = :login OR email = :email");
        // Sets the params for the query
        $statement->execute([
            'login' => $informacao['login'] ?? '',
            'email' => $informacao['email'] ?? '',
        ]);

        return $statement->rowCount() > 0;
    }

    /**
     * Retorna o id do registro
     *
     * This functions should not return only int. It assumes that the insertion will always work.
     *
     * @param string $nome_da_tabela
     * @param array $informacao
     *
     * @return int
     */
    public static function insert(string $nome_da_tabela, array $informacao): int
    {
        $pdo = new PDO('mysql:dbname=superlogica;host=mysql', 'root', 'root', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        $keys = array_keys($informacao);
        $columns = implode(',', array_keys($informacao));
        $valuesParameters = '';

        foreach ($keys as $index => $columnName) {
            if (0 === $index) {
                $valuesParameters .= ":{$columnName}";
                continue;
            }

            $valuesParameters .= ",:{$columnName}";
        }

        // We don't need to worry about SQL injections. PDO handles it when using statements.
        $statement = $pdo->prepare(<<<SQL
        INSERT INTO {$nome_da_tabela} ({$columns})
        VALUES ({$valuesParameters})
        SQL);
        $statement->execute($informacao);

        // Id is defined as an int auto increment. No worries about this conversion.
        return (int) $pdo->lastInsertId();
    }

    /**
     * Faz uma requisição curl para uma url e retorna a informação desejada
     *
     * What exactly is a curl request? The function singnature doesn't give me any clue as to what this function should do.
     * Theres no parameter for method.
     *
     * @param string $url
     * @param mixed $informacao
     *
     * @return mixed
     */
    public static function curl(string $url, mixed $informacao): mixed
    {

    }
}
