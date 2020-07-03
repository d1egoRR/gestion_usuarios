<?php

require_once 'MySQL.php';


class Contacto {

	private $_idPersonaContacto;
	private $_idPersona;
	private $_idTipoContacto;
	private $_valor;

	private $_descripcion;

    /**
     * @return mixed
     */
    public function getIdPersonaContacto()
    {
        return $this->_idPersonaContacto;
    }

    /**
     * @param mixed $_idPersonaContacto
     *
     * @return self
     */
    public function setIdPersonaContacto($_idPersonaContacto)
    {
        $this->_idPersonaContacto = $_idPersonaContacto;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdPersona()
    {
        return $this->_idPersona;
    }

    /**
     * @param mixed $_idPersona
     *
     * @return self
     */
    public function setIdPersona($_idPersona)
    {
        $this->_idPersona = $_idPersona;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdTipoContacto()
    {
        return $this->_idTipoContacto;
    }

    /**
     * @param mixed $_idTipoContacto
     *
     * @return self
     */
    public function setIdTipoContacto($_idTipoContacto)
    {
        $this->_idTipoContacto = $_idTipoContacto;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getValor()
    {
        return $this->_valor;
    }

    /**
     * @param mixed $_valor
     *
     * @return self
     */
    public function setValor($_valor)
    {
        $this->_valor = $_valor;

        return $this;
    }

    public static function obtenerPorIdPersona($idPersona) {
    	$sql = "SELECT persona_contacto.id_persona_contacto, persona_contacto.id_persona, "
    	     . "persona_contacto.id_tipo_contacto, persona_contacto.valor, "
    	     . "tipocontacto.descripcion "
    	     . "FROM persona_contacto "
    	     . "INNER JOIN tipocontacto on tipocontacto.id_tipo_contacto = persona_contacto.id_tipo_contacto "
    	     . "WHERE persona_contacto.id_persona = " .  $idPersona;

    	$mysql = new MySQL();
    	$datos = $mysql->consultar($sql);
    	$mysql->desconectar();

    	$listado = self::_generarListadoContactos($datos);
    	return $listado;    	
    }

    private function _generarListadoContactos($datos) {
    	$listado = array();
		while ($registro = $datos->fetch_assoc()) {
			$contacto = new Contacto();
			$contacto->_idPersonaContacto = $registro['id_persona_contacto'];
			$contacto->_idPersona = $registro['id_persona'];
			$contacto->_idTipoContacto = $registro['id_tipo_contacto'];
			$contacto->_valor = $registro['valor'];
			$contacto->_descripcion = $registro['descripcion'];
			$listado[] = $contacto;
		}
		return $listado;
    }

    public function __toString() {
    	return $this->_valor .  " - " .  $this->_descripcion;
    }
}


?>