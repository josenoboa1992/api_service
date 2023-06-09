<?php

class Mysql extends Conexion{
    private $conexion;
    private $strquery;
    private $arrValues;

    public function __construct()
    {
        $this->conexion=new Conexion();
        $this->conexion=$this->conexion->connect();
    }

    public function insert(string $query,array $arrValues){
        try {
            $this->strquery=$query;
            $this->arrValues=$arrValues;
            $insert=$this->conexion->prepare($this->strquery);
            $resInsert=$insert->execute($this->arrValues);
            $idInsert=$this->conexion->lastInsertId();
            $insert->closeCursor();
            return $idInsert;
        }catch (PDOException $e){
            $response="Error: ". $e->getMessage();
            return $response;
        }

    }

    public function select_all(string $query){
        try {
            $this->strquery=$query;
           $execute=$this->conexion->query($query);
           $request=$execute->fetchAll(PDO::FETCH_ASSOC);
           $execute->closeCursor();
           return $request;
        }catch (PDOException $e){
            $respose= "Error: ". $e->getMessage();
            return $respose;

        }
    }


    public function select(string $query,array $arrValues){
        try {
            $this->strquery=$query;
            $this->arrValues=$arrValues;
            $query=$this->conexion->prepare($this->strquery);
            $query->execute($this->arrValues);
            $request=$query->fetchAll(PDO::FETCH_ASSOC);
            $query->closeCursor();
            return $request;
        }catch (PDOException $e){
            $response="Error: ".$e->getMessage();
            return $response;
        }

    }

    public function update(string $query,array $arrValues){
        try {
            $this->strquery=$query;
            $this->arrValues=$arrValues;
            $update=$this->conexion->prepare($query);
           $resUdpate= $update->execute($arrValues);
           $update->closeCursor();
           return $resUdpate;

        }catch (PDOException $e){
            $respose= "Error: ". $e->getMessage();
            return $respose;
        }

    }

    public function delete(string $query, array$arrValues){
        try {
            $this->strquery=$query;
            $this->arrValues=$arrValues;
            $delete=$this->conexion->prepare($this->strquery);
            $del=$delete->execute($this->arrValues);
            return $del;
        }catch (PDOException $e){
            $respose= "Error: ". $e->getMessage();
            return $respose;
        }
    }
}
