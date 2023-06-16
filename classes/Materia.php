<?php

namespace classes;

class Materia
{
    private $nome, $id;

    public function __construct($nome, $id = null)
    {
        $this->nome = $nome;
        if ($id) {
            $this->id = $id;
        }
    }

    public function guardar(): void
    {
        global $mysqli;
        $query = $mysqli->prepare("INSERT INTO materias (nome) VALUES (?)");
        $query->bind_param("s", $this->nome);
        $query->execute();
    }

    public static function obter(): array
    {
        global $mysqli;
        return $mysqli->query("SELECT id, nome FROM materias")->fetch_all(MYSQLI_ASSOC);
    }

    public static function obtenerUna($id)
    {
        global $mysqli;
        $query = $mysqli->prepare("SELECT id, nome FROM materias WHERE id = ?");
        $query->bind_param("i", $id);
        $query->execute();
        return $query->get_result()->fetch_object();
    }

    public function actualizar(): void
    {
        global $mysqli;
        $query = $mysqli->prepare("update materias set nome = ? where id = ?");
        $query->bind_param("si", $this->nome, $this->id);
        $query->execute();
    }

    public static function eliminar($id): void
    {
        global $mysqli;
        $query = $mysqli->prepare("DELETE FROM materias WHERE id = ?");
        $query->bind_param("i", $id);
        $query->execute();
    }
}
