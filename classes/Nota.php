<?php

namespace classes;

class Nota
{
    private $pontuacao, $idEstudante, $idMateria;

    public function __construct($pontuacao, $idEstudante, $idMateria)
    {
        $this->pontuacao = $pontuacao;
        $this->idEstudante = $idEstudante;
        $this->idMateria = $idMateria;
    }

    public function guardar(): void
    {
        global $mysqli;
        // Nós o excluímos se ele existir
        $this->eliminar();
        // E sempre o inserimos. Não importa se é a primeira vez ou uma atualização
        $sentencia = $mysqli->prepare("INSERT INTO notas_estudantes_materias (id_estudante, id_materia, pontuacao) VALUES (?, ?, ?)");
        $sentencia->bind_param("ssd", $this->idEstudante, $this->idMateria, $this->pontuacao);
        $sentencia->execute();
    }

    public static function obterDeEstudante($idEstudante): array
    {
        global $mysqli;
        $sentencia = $mysqli->prepare("SELECT id, id_estudante, id_materia, pontuacao FROM notas_estudantes_materias WHERE id_estudante = ?");
        $sentencia->bind_param("i", $idEstudante);
        $sentencia->execute();
        return $sentencia->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public static function combinar($materias, $notas): array
    {
        foreach ($materias as $x => $xValue) {
            $materias[$x]["pontuacao"] = self::obtenerCalificacion($notas, $xValue["id"]);
        }
        return $materias;
    }

    private static function obtenerCalificacion($notas, $idMateria)
    {
        foreach ($notas as $nota) {
            if ((int)$nota["id_materia"] === (int)$idMateria) {
                return $nota["pontuacao"];
            }
        }
        return 0;
    }


    public function eliminar(): void
    {
        global $mysqli;
        $sentencia = $mysqli->prepare("DELETE FROM notas_estudantes_materias WHERE id_estudante = ? AND id_materia = ?");
        $sentencia->bind_param("ii", $this->idEstudante, $this->idMateria);
        $sentencia->execute();
    }
}
