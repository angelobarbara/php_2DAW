<?php
/**
 * Created by PhpStorm.
 * User: angelo
 * Date: 25/02/2019
 * Time: 18:31
 */

class Guia{
    private $id;
    private $nombre;
    private $descripcion;
    private $imagen;

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

    /**
     * @return mixed
     */
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
    private $db;

    public function __construct(){
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
     * @return mysqli
     */
    public function getDb()
    {
        return $this->db;
    }

    /**
     * @param mysqli $db
     */
    public function setDb($db)
    {
        $this->db = $db;
    }

    public function getAll(){
        $sql = "SELECT * FROM guias ORDER BY id DESC";
        $categorias = $this->db->query($sql);

        return $categorias;
    }

    public function getOne(){
        $categoria = $this->db->query("SELECT * FROM guias WHERE id={$this->getId()}");

        return $categoria->fetch_object();
    }

    public function getRandom($limit){
        $categorias = $this->db->query("SELECT * FROM guias ORDER BY RAND() LIMIT $limit");
        return $categorias;
    }

    public function save(){
        $sql = "INSERT INTO guias VALUES (NULL,'{$this->getNombre()}','{$this->getDescripcion()}','{$this->getImagen()}')";
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
        $sql = "UPDATE guias SET nombre='{$this->getNombre()}', descripcion='{$this->getDescripcion()}' ";

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
        $sql = "DELETE FROM guias WHERE id ={$this->id}";
        $delete = $this->db->query($sql);

        $result = false;
        if($delete){
            $result = true;
        }
        return $result;
    }
}