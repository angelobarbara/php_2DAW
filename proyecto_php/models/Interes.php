<?php
/**
 * Created by PhpStorm.
 * User: angelo
 * Date: 25/02/2019
 * Time: 18:31
 */

class Interes{
    private $id;
    private $ruta_id;
    private $nombre;
    private $descripcion;
    private $imagen;

    /**
     * @return mixed
     */
    public function getRutaId()
    {
        return $this->ruta_id;
    }

    /**
     * @param mixed $ruta_id
     */
    public function setRutaId($ruta_id)
    {
        $this->ruta_id = $ruta_id;
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
        $sql = "SELECT * FROM interes ORDER BY id DESC";
        $interes = $this->db->query($sql);

        return $interes;
    }

    public function getOne(){
        $interes = $this->db->query("SELECT * FROM interes WHERE id={$this->getId()}");

        return $interes->fetch_object();
    }

    public function getRandom($limit){
        $interes = $this->db->query("SELECT * FROM interes ORDER BY RAND() LIMIT $limit");
        return $interes;
    }

    public function getAllCategory(){
        $interes = $this->db->query("SELECT * FROM interes WHERE ruta_id={$this->getRutaId()} ORDER BY id DESC");
        return $interes;
    }

    public function save(){
        $sql = "INSERT INTO interes VALUES (NULL,'{$this->getRutaId()}','{$this->getNombre()}','{$this->getDescripcion()}','{$this->getImagen()}')";
        $save = $this->db->query($sql);

        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }

    public function edit(){
        $sql = "UPDATE interes SET nombre='{$this->getNombre()}', descripcion='{$this->getDescripcion()}', ruta_id={$this->ruta_id} ";

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
        $sql = "DELETE FROM interes WHERE id ={$this->id}";
        $delete = $this->db->query($sql);

        $result = false;
        if($delete){
            $result = true;
        }
        return $result;
    }
}