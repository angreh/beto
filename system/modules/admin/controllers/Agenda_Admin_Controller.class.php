<?php

class Agenda_Admin_Controller extends DefaultController {

    /**
     *
     * @var Evento_Admin_Mapper 
     */
    private $mapper;

    public function init() {
        $this->mapper = new Evento_Admin_Mapper();
        $this->disableLayout();
    }

    public function indexAction() {
        $this->viewInit();


        $eventos = $this->mapper->get(array('onlyAtivos' => FALSE));
        foreach ($eventos as $evento) {
            $this->tpl->ID = $evento->id;
            $this->tpl->NOME = $evento->nome;
            $this->tpl->DESCRICAO = $evento->descricao;
            $this->tpl->LOCAL = $evento->local;
            $this->tpl->HORARIO = $evento->horario;
            $this->tpl->DATA = $evento->date;
            $this->tpl->INGRESSO = $evento->ingresso;
            $this->tpl->block('EVENTOS_BLOCK');
        }
    }

    public function addEventoAction() {
        if (isset($_POST) && !empty($_POST)) {

            $_POST['horario'] = $this->helper->StringFormat()->timePreDB(array('time' => $_POST['horario']));
            $_POST['date'] = $this->helper->StringFormat()->datePreDB(array('date' => $_POST['date']));
            $_POST['ingresso'] = $this->helper->StringFormat()->numberFormat(array('number' => $_POST['ingresso']));

            $this->mapper->insert(array(
                'set' => $_POST,
                'debug' => false
            ));
            exit(var_dump($_POST));
        } else {
            $this->viewInit();
        }
    }

}
