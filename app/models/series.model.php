<?php
require_once 'model.php';

class SeriesModel extends Model
{

    function getSeries($sort = null, $order = null)
    {
        $sql = 'SELECT * FROM series';
        if (isset($order)) {
            $sql .= ' ORDER BY ' . $order;

            if (isset($sort)) {
                $sql .= ' ' . $sort;
            }
        }

        $query = $this->db->prepare($sql);
        $query->execute();
        $series = $query->fetchAll(PDO::FETCH_OBJ);

        return $series;
    }

    function insertSerie($titulo, $genero, $director)
    {
        $query = $this->db->prepare('INSERT INTO series (titulo, genero, director) VALUES(?,?,?)');
        return $query->execute([$titulo, $genero, $director]);
    }

    function getSerieCapitulos($idSerie)
    {
        $query = $this->db->prepare('SELECT c.*, titulo FROM capitulos c join series s on (c.id_serie = s.id_serie) where c.id_serie = ?');
        $query->execute([$idSerie]);
        $capitulos = $query->fetchAll(PDO::FETCH_OBJ);

        return $capitulos;
    }

    function deleteSerie($id_serie)
    {
        $query = $this->db->prepare('DELETE FROM series WHERE id_serie = ?');
        $query->execute([$id_serie]);
    }
    function updateSeries($id, $titulo, $genero, $director)
    {
        $query = $this->db->prepare('update series set titulo = ?, genero = ?, director = ? where id_serie = ?');
        $query->execute([$titulo, $genero, $director, $id]);
    }

    function getSerie($id)
    {
        $query = $this->db->prepare('SELECT * FROM series where id_serie = ?');
        $query->execute([$id]);
        $serie = $query->fetch(PDO::FETCH_OBJ);

        return $serie;
    }
}
