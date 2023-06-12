<?php
class ClienteModel extends Mysql{
    private  $intIdCliente;
    private $strIdentificacion;
    private $strApellidos;
    private $strNombre;
    private $strTelefono;
    private $strEmail;
    private $strDireccion;
    private $strNit;
    private $strNombreFiscalia;
    private $strDireccionFiscal;
    public function __construct()
    {
        parent::__construct();
    }

    public function setCliente(
        string $identificacion,
        string $nombres,
        string $apellidos,
        string $telefono,
        string $email,
        string $direccion,
        string $nit,
        string $nombreFiscal,
        string $dirFiscal

    ){
        $this->strIdentificacion=$identificacion;
        $this->strNombre=$nombres;
        $this->strApellidos=$apellidos;
        $this->strTelefono=$telefono;
        $this->strEmail=$email;
        $this->strDireccion=$direccion;
        $this->strNit=$nit;
        $this->strNombreFiscalia=$nombreFiscal;
        $this->strDireccionFiscal=$dirFiscal;

        debug(get_object_vars($this));
    }
}