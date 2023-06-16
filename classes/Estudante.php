<?php

namespace classes;

class Estudante
{
    private $nome, $grupo, $id;

    public function __construct($nome, $grupo, $id = null)
    {
        $this->nome = $nome;
        $this->grupo = $grupo;
        if ($id) {
            $this->id = $id;
        }
    }

    public function guardar(): void
    {
        global $mysqli;
        $sentencia = $mysqli->prepare("INSERT INTO estudantes (nome, grupo) VALUES (?, ?)");
        $sentencia->bind_param("ss", $this->nome, $this->grupo);
        $sentencia->execute();
    }

    public static function obter(): array
    {
        global $mysqli;
        return $mysqli->query("SELECT id, nome, grupo FROM estudantes")->fetch_all(MYSQLI_ASSOC);
    }

    public static function obterUm($id)
    {
        global $mysqli;
        $sentencia = $mysqli->prepare("SELECT id, nome, grupo FROM estudantes WHERE id = ?");
        $sentencia->bind_param("i", $id);
        $sentencia->execute();
        return $sentencia->get_result()->fetch_object();
    }

    public function actualizar(): void
    {
        global $mysqli;
        $sentencia = $mysqli->prepare("update estudantes set nome = ?, grupo = ? where id = ?");
        $sentencia->bind_param("ssi", $this->nome, $this->grupo, $this->id);
        $sentencia->execute();
    }

    public static function eliminar($id): void
    {
        global $mysqli;
        $sentencia = $mysqli->prepare("DELETE FROM estudantes WHERE id = ?");
        $sentencia->bind_param("i", $id);
        $sentencia->execute();
    }
}
