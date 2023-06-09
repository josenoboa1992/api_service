<?php

class Home extends Controllers {
    public function __construct()
    {
        parent::__construct();

    }

    public function home($params){

        $data=[
            "page_tage"=>"home",
            "page_title"=>"pagina principal Jose noboa",
            "page_name"=>"home"
        ];
        $mensaje=$data['page_title'];
        $this->views->getView($this,"home",$mensaje);

    }


}
