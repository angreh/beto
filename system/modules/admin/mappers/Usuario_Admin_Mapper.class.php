<?php

class Usuario_Admin_Mapper extends DefaultMapper {

    public function checkUser($data) {

        $this->model->setFrom($data);
        $usuario = $this->get();

        if ($usuario !== false) {

            if (sizeof($usuario) == 1) {
                $usuario = $usuario[0];
                return $usuario->id;
            }
        }

        return false;
    }

}
