<?php

class Evento_Admin_Mapper extends DefaultMapper {

    public function get($options = array()) {
        $defaults = array(
            'onlyAtivos' => TRUE,
            'debug' => FALSE
        );
        $options = (object) array_merge($defaults, $options);

        $columns = array('nome', 'descricao', 'local', 'horario', 'date', 'ingresso', 'id');
        $condition = array(
            'ativo' => ($options->onlyAtivos) ? 1 : 0,
            'deletado' => 0
        );
        $optionsForParent = array(
            'condition' => $condition,
            'columns' => $columns,
            'debug' => $options->debug
        );
        return parent::get($optionsForParent);
    }

}
