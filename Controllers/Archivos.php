<?php
class Archivos extends Controller
{
    private $id_usuario, $correo;
    public function __construct()
    {
        parent::__construct();
        session_start();
        $this->id_usuario = $_SESSION['id'];
        $this->correo = $_SESSION['correo'];
        ## VALIDAR SESION
        if (empty($_SESSION['id'])) {
            header('Location: ' . BASE_URL);
            exit;
        }
    }
    public function pagina($page)
    {
        $data['title'] = 'Archivos';
        $data['active'] = 'todos';
        $data['script'] = 'files.js';
        ## PAGINACION
        $pagina = (empty($page)) ? 1 : $page;
        $porPagina = 9;
        $desde = ($pagina - 1) * $porPagina;
        $carpetas = $this->model->getCarpetas($desde, $porPagina, $this->id_usuario);

        for ($i = 0; $i < count($carpetas); $i++) {
            $carpetas[$i]['color'] = substr(md5($carpetas[$i]['id']), 0, 6);
            $carpetas[$i]['fecha'] = time_ago(strtotime($carpetas[$i]['fecha_create']));
        }
        ## TOTAL CARPETAS
        $totalDir = $this->model->getTotalCarpetas($this->id_usuario);
        $data['total'] = ceil($totalDir['total'] / $porPagina);
        $data['pagina'] = $pagina;

        $data['carpetas'] = $carpetas;
        $data['menu'] = 'admin';
        $data['shares'] = $this->model->verificarEstado($this->correo);
        $this->views->getView('archivos', 'index', $data);
    }

    public function getUsuarios()
    {
        $valor = $_GET['q'];
        $data = $this->model->getUsuarios($valor, $this->id_usuario);
        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['text'] = $data[$i]['correo'];
        }
        echo json_encode($data);
        die();
    }

    public function compartir()
    {
        $usuarios = $_POST['usuarios'];
        if (empty($_POST['archivos'])) {
            $res = array('tipo' => 'warning', 'mensaje' => 'Seleccione un archivo');
        } else {
            $arhivos = $_POST['archivos'];
            $res = 0;
            for ($i = 0; $i < count($arhivos); $i++) {                
                for ($j = 0; $j < count($usuarios); $j++) {
                    $dato = $this->model->getUsuario($usuarios[$j]);
                    $result = $this->model->getDetalle($dato['correo'], $arhivos[$i]);                    
                    if (empty($result)) {
                        $res = $this->model->registrarDetalle($dato['correo'], $arhivos[$i], $this->id_usuario);                        
                    } else {
                        $res = 1;
                    }
                }
            }
            if ($res > 0) {
                $res = array('tipo' => 'success', 'mensaje' => 'Archivos COMPARTIDOS');
            } else {
                $res = array('tipo' => 'error', 'mensaje' => 'ERROR AL COMPARTIR');
            }
        }


        echo json_encode($res);
        die();
    }
    public function verArchivos($id_carpeta)
    {
        $data = $this->model->getArchivosCarpeta($id_carpeta);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function buscarCarperta($id)
    {
        $data = $this->model->getCarpeta($id);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function eliminar($id)
    {
        $fecha = date('Y-m-d H:i:s');
        $nueva = date("Y-m-d H:i:s", strtotime($fecha . '+1 month'));        
        $data = $this->model->eliminar(0, $nueva, $id);
        if ($data == 1) {
            $res = array('tipo' => 'success', 'mensaje' => 'ARCHIVO DADO DE BAJA');
        } else {
            $res = array('tipo' => 'error', 'mensaje' => 'ERROR AL ELIMINAR');
        }        
        echo json_encode($res);
        die();
    }
    //ELIMINAR ARCHIVO COMPARTIDO
    public function eliminarCompartido($id)
    {
        $fecha = date('Y-m-d H:i:s');
        $nueva = date("Y-m-d H:i:s", strtotime($fecha . '+1 month'));        
        $data = $this->model->eliminarCompartido($nueva, $id);
        if ($data == 1) {
            $res = array('tipo' => 'success', 'mensaje' => 'ARCHIVO DADO DE BAJA');
        } else {
            $res = array('tipo' => 'error', 'mensaje' => 'ERROR AL ELIMINAR');
        }        
        echo json_encode($res);
        die();
    }

    public function busqueda($valor)
    {
        $data = $this->model->getBusqueda($valor, $this->id_usuario);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function recicle()
    {
        $data['title'] = 'Archivos eliminados';
        $data['active'] = 'deleted';
        $data['script'] = 'deleted.js';
        $data['menu'] = 'admin';
        $data['shares'] = $this->model->verificarEstado($this->correo);
        $this->views->getView('archivos', 'deleted', $data);
    }

    public function listarHistorial()
    {
        $data = $this->model->getArchivos(0, $this->id_usuario);
        for ($i=0; $i < count($data); $i++) { 
            $data[$i]['accion'] = '<a href="#" class="btn btn-danger btn-sm" onclick="restaurar(' . $data[$i]['id'] . ')">
            Restaurar
        </a>';
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function delete($id)
    {
        $data = $this->model->eliminar(1, null, $id);
        if ($data == 1) {
            $res = array('tipo' => 'success', 'mensaje' => 'ARCHIVO RESTAURADO');
        } else {
            $res = array('tipo' => 'error', 'mensaje' => 'ERROR AL RESTAURAR');
        } 
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
        die();
    }
}
