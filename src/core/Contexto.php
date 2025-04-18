<?php

namespace App\core;
use PDO;
use PDOException;

class Contexto
{
    private static $conexao;

    protected static function getConexao()
    {
        if (self::$conexao === null) {

            $dotenv = parse_ini_file('../src/.env');
            $host = $dotenv['DB_HOST'];
            $db = $dotenv['DB_NAME'];
            $user = $dotenv['DB_USER'];
            $pass = $dotenv['DB_PASS'];

            $inf = "mysql:host={$host};dbname=$db";
            try {
                self::$conexao = new PDO($inf, "{$user}", "{$pass}", [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"]);
                self::$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Erro ao conectar ao banco: " . $e->getMessage());
            }
        }
        return self::$conexao;
    }
    public function iniciarTransacao()
    {
        self::getConexao()->beginTransaction();
    }

    public function confirmarTransacao()
    {
        self::getConexao()->commit();
    }

    public function reverterTransacao()
    {
        self::getConexao()->rollBack();
    }

    protected static function closeConexao()
    {
        self::$conexao = null;
    }

    protected function executarConsulta($sql, $params = [])
    {
        try {
            $stmt = self::getConexao()->prepare($sql);

            foreach ($params as $key => $value) {
                $stmt->bindValue($key + 1, $value);
            }

            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            die("Erro na execução da consulta: " . $e->getMessage());
        }
    }

    protected function listar($tabela, $condicao = "", $params = [])
    {
        $sql = "SELECT * FROM {$tabela} {$condicao} ORDER BY ID DESC";
        $stmt = $this->executarConsulta($sql, $params);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // metodo responsavel por listar o ultimo registro no banco
    protected function listarUltimoRegistro($tabela, $campo,  $condicao = "", $parametro = [])
    {
        $sql = "SELECT MAX($campo) AS ULTIMOVALOR FROM {$tabela} {$condicao} ORDER BY ID DESC ";
        $stmt = $this->executarConsulta($sql, $parametro);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    protected function inserir($tabela, $atributos, $valores)
    {
        $sql = "INSERT INTO {$tabela} (" . implode(",", $atributos) . ") VALUES (" . implode(",", array_fill(0, count($valores), "?")) . ")";
        $stmt = $this->executarConsulta($sql, $valores);
        return self::getConexao()->lastInsertId();
    }

    protected function atualizar($tabela, $atributos, $valores, $id)
    {
        $set = implode(",", array_map(fn($attr) => "$attr = ?", $atributos));
        $sql = "UPDATE {$tabela} SET {$set} WHERE id = ?";
        $stmt = $this->executarConsulta($sql, array_merge($valores, [$id]));
        return $stmt->rowCount();
    }

    protected function deletar($tabela, $id)
    {
        $sql = "DELETE FROM {$tabela} WHERE id = ? LIMIT 1";
        $stmt = $this->executarConsulta($sql, [$id]);
        return $stmt->rowCount();
    }
}
