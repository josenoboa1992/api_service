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
        try {
            $method=$_SERVER['REQUEST_METHOD'];
            $response=[];
            if ($method=="POST"){
               $_POST=json_decode(file_get_contents('php://input'),true);

               ////////////////////Validaciones////////////////////
                $fields = array(
                    'identificacion' => 'La identificación es requerida',
                    'apellidos' => 'Error en los apellidos',
                    'nombre' => 'El nombre es requerido',
                    'telefono' => 'El teléfono es requerido',
                    'email' => 'El email es requerido',
                    'direccion' => 'La dirección es requerida',
                    'nit' => 'El NIT es requerido',
                    'nombre fiscalia' => 'El nombre de la fiscalía es requerido',
                    'direccionfiscal' => 'La dirección fiscal es requerida'
                );

                foreach ($fields as $field => $errorMsg) {
                    if (empty($_POST[$field])) {
                        $response = array('status' => false, 'msg' => $errorMsg);
                        jsonResponse($response, 200);
                        die();
                    }

                    if ($field === 'telefono' && !preg_match('/^\+1\s?809|829|849|809\d{7}$/', $_POST[$field])) {
                        $response = array('status' => false, 'msg' => 'El teléfono no es válido');
                        jsonResponse($response, 200);
                        die();
                    }

                    if ($field === 'email' && !filter_var($_POST[$field], FILTER_VALIDATE_EMAIL)) {
                        $response = array('status' => false, 'msg' => 'El email no es válido');
                        jsonResponse($response, 200);
                        die();
                    }

                }
                $strIdentificacion = $_POST['identificacion'];
                $strApellidos =ucwords(strtolower($_POST['apellidos'])) ;
                $strNombre = ucwords(strtolower($_POST['nombre'])) ;
                $strTelefono = $_POST['telefono'];
                $strEmail = strtolower( $_POST['email']);
                $strDireccion = $_POST['direccion'];
                $strNit = $_POST['nit'];
                $strNombreFiscalia = $_POST['nombre fiscalia'];
                $strDireccionFiscal = $_POST['direccionfiscal'];
                    $request=$this->model->setCliente(
                      $strIdentificacion,
                      $strApellidos,
                      $strNombre,
                      $strTelefono,
                      $strEmail,
                      $strDireccion,
                      $strNit,
                      $strNombreFiscalia,
                      $strDireccionFiscal

                    );
            }else{
                $response=array('status'=>false,'msg'=>"Error en la solicitud ".$method);
                $code=400;
            }

            jsonResponse($response,$code);
            die();

        }catch (Exception $e){
            echo 'Error en el proceso: '.$e->getMessage();
        }
        die();
    }

    public function clientes(){
        echo 'Controlador desde el cliente';
    }
    public function actualizar($id_cliente){
        echo 'Actualizar cliente numero'. $id_cliente;
    }
    public function eliminar($cliente){
        echo "Eminar cliente ".$cliente;
    }
}
