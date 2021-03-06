<?php

class Home_Site_Controller extends DefaultController {

    public function indexAction() {
        $this->viewInit();

        $mapper = new Evento_Admin_Mapper();
        $eventos = $mapper->get(array('limit' => 2));

        foreach ($eventos as $evento) {
            $auxDate = explode('-', $evento->date);
            $this->tpl->DIA = $auxDate[2];
            $this->tpl->MES = $this->helper->StringFormat()->dateFormat(
                    array(
                        'type' => 'm',
                        'data' => $auxDate[1]
                    )
            );
            $this->tpl->NOME = $evento->nome;
            //$this->tpl->DESCRICAO = $evento->descricao;
            $this->tpl->HORARIO = substr($evento->horario, 0, -3);
            $this->tpl->LOCAL = $evento->local;
            //$this->tpl->INGRESSO = $evento->ingresso;

            $this->tpl->block('EVENTOS_BLOCK');
        }
    }

}
