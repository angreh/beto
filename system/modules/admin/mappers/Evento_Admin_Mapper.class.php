<?php

class Evento_Admin_Mapper extends DefaultMapper {

    public function get($options = array()) {
        $defaults = array(
            'onlyAtivos' => TRUE
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
        );
        $optionsForParent = array_merge($optionsForParent, (array) $options);
        return parent::get($optionsForParent);
    }

}
