<?php
/**
 * Created by PhpStorm.
 * User: angelo
 * Date: 09/03/2019
 * Time: 20:42
 */

class Ruta
{
    private $id;
    private $guia_id;
    private $nombre;
    private $descripcion;
    private $imagen;
    private $recorrido;
    private $db;

    /**
     * @return mixed
     */
    public function getRecorrido()
    {
        return $this->recorrido;
    }

    /**
     * @param mixed $recorrido
     */
    public function setRecorrido($recorrido)
    {
        $this->recorrido = $recorrido;
    }

    public function __construct()
    {
        $this->db = Database::connect();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getGuiaId()
    {
        return $this->guia_id;
    }

    /**
     * @param mixed $guia_id
     */
    public function setGuiaId($guia_id)
    {
        $this->guia_id = $guia_id;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    /**
     * @return mixed
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param mixed $descripcion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * @param mixed $imagen
     */
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;
    }

    public function getAll(){
        $productos = $this->db->query("SELECT * FROM rutas ORDER BY id DESC");
        return $productos;
    }

    public function getAllCategory(){
        $productos = $this->db->query("SELECT * FROM rutas WHERE guia_id={$this->getGuiaId()} ORDER BY id DESC");
        return $productos;
    }

    public function getOne(){
        $producto = $this->db->query("SELECT * FROM rutas WHERE id ={$this->getId()}");
        return $producto->fetch_object();
    }

    public function download(){
        $producto = $this->db->query("SELECT * FROM rutas WHERE id ={$this->getId()}");
        $producto = $producto->fetch_object();
        $recurso = fopen($producto->nombre.'.txt','r+');
        file_put_contents($producto->nombre.'.txt',$producto->recorrido);
        if($recurso){
            $_SESSION['download'] = 'complete';
        }else{
            $_SESSION['download'] = 'failed';
        }
        fclose($recurso);
        //return $producto->fetch_object();
    }

    public function getRandom($limit){
        $productos = $this->db->query("SELECT * FROM rutas ORDER BY RAND() LIMIT $limit");
        return $productos;
    }

    public function save(){
        $sql = "INSERT INTO rutas VALUES (NULL,'{$this->getGuiaId()}','{$this->getNombre()}','{$this->getDescripcion()}','{$this->getRecorrido()}','{$this->getImagen()}')";
        $save = $this->db->query($sql);

        //$this->db->error;
        //die();

        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }

    public function edit(){
        $sql = "UPDATE rutas SET nombre='{$this->getNombre()}', descripcion='{$this->getDescripcion()}', guia_id={$this->guia_id}, recorrido='{$this->getRecorrido()}' ";

        if($this->getImagen() != NULL) {
            $sql .= ",imagen='{$this->getImagen()}'";
        }

        $sql .= " WHERE id={$this->getId()};";
        $save = $this->db->query($sql);

        //$this->db->error;
        //die();

        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }

    public function delete(){
        $sql = "DELETE FROM rutas WHERE id ={$this->id}";
        $delete = $this->db->query($sql);

        $result = false;
        if($delete){
            $result = true;
        }
        return $result;
    }
}

?>