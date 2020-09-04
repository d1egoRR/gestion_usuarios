<?php


class PerfilModulo {

    /**
     * @param mixed $_idModulo
     *
     * @return self
     */
    public function setIdModulo($_idModulo)
    {
        $this->_idModulo = $_idModulo;

        return $this;
    }

    public function guardar() {
        $sql = "INSERT INTO perfil_modulo (id_perfil_modulo, id_perfil, id_modulo) "
             . "VALUES (NULL, $this->_idPerfil, $this->_idModulo)";

        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idPerfilModulo = $idInsertado;
    }

}


?>