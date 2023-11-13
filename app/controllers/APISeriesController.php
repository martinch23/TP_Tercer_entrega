<?php

require_once "./app/models/series.model.php";
require_once "./app/controllers/ApiController.php";


class APISeriesController extends ApiController
{
    private $model;
    public function __construct()
    {
        parent::__construct();
        $this->model = new SeriesModel();
    }

    function getAll()
    {
        $sort = null;
        $order = null;
        if (isset($_GET['sort'])) {
            $sort = $_GET['sort'];
        }
        if (isset($_GET['order'])) {
            $order = $_GET['order'];
        }
        $series = $this->model->getSeries($sort, $order);
        $this->view->response($series, 200);
    }

    function getSerie($params = [])
    {
        if (empty($params)) {
            $series = $this->model->getSeries();
            $this->view->response($series, 200);
        } else {
            $serie = $this->model->getSerie($params[':ID']);
            if (!empty($serie)) {
                $this->view->response($serie, 200);
            } else {
                $this->view->response(['msg' => 'La serie con el id=' . $params[':ID'] . 'no existe.'], 404);
            }
        }
    }

    function create()
    {
        $body = $this->getData(); //desarma el json y nos genera un objeto

        $titulo = $body->titulo;
        $genero = $body->genero;
        $director = $body->director;

        $id = $this->model->insertSerie($titulo, $genero, $director);
        return $this->view->response('La tarea fue insertada con el id = ' . $id, 201);
    }

    function update($params = [])
    {
        $id = $params[':ID'];
        $serie = $this->model->getSerie($id);

        if ($serie) {
            $body = $this->getData();
            $titulo = $body->titulo;
            $genero = $body->genero;
            $director = $body->director;
            $this->model->updateSeries($id, $titulo, $genero, $director);
            $this->view->response('La tarea con el id = ' . $id . ' ha sido modificada', 200);
        } else {
            $this->view->response('La tarea con el id = ' . $id . ' no existe', 404);
        }
    }
}
