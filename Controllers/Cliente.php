<?php

class Cliente extends Controllers{

    public function __construct()
    {
        parent::__construct();
    }

    public function cliente($id_cliente){
        echo 'Extraer informacion del cliente '.$id_cliente;
    }

    public function registro(){
        echo 'Controlador desde el cliente';
    }

    public function clientes(){
        echo 'Controlador desde el cliente';
    }
    public function actualizar($id_cliente){
        echo 'Actualizar cliente numero'. $id_cliente;
    }
}
