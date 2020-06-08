<?php


class Modulo {

	private $_idModulo;
	private $_descripcion;
	private $_directorio;

	public function __construct($descripcion, $directorio) {
		$this->_descripcion = $descripcion;
		$this->_directorio = $directorio;
	}

    /**
     * @return mixed
     */
    public function getIdModulo()
    {
        return $this->_idModulo;
    }

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

    /**
     * @return mixed
     */
    public function getDescripcion()
    {
        return $this->_descripcion;
    }

    /**
     * @param mixed $_descripcion
     *
     * @return self
     */
    public function setDescripcion($_descripcion)
    {
        $this->_descripcion = $_descripcion;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDirectorio()
    {
        return $this->_directorio;
    }

    /**
     * @param mixed $_directorio
     *
     * @return self
     */
    public function setDirectorio($_directorio)
    {
        $this->_directorio = $_directorio;

        return $this;
    }

    public static function obtenerModuloPorIdPerfil($idPerfil) {
    	$sql = "SELECT modulo.id_modulo, modulo.descripcion, modulo.directorio "
    	     . "FROM modulo "
    	     . "INNER JOIN perfil_modulo on perfil_modulo.id_modulo = modulo.id_modulo "
    	     . "INNER JOIN perfil on perfil.id_perfil = perfil_modulo.id_perfil "
    	     . "WHERE perfil.id_perfil = " . $idPerfil;

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $listado = self::_generarListadoModulos($datos);
        return $listado;
    }

    private function _generarListadoModulos($datos) {
    	$listado = array();
		while ($registro = $datos->fetch_assoc()) {
			$modulo = new Modulo($registro['descripcion'], $registro['directorio']);
			$modulo->setIdModulo = $registro['id_modulo'];
			$listado[] = $modulo;
		}
		return $listado;
    }

    public function __toString() {
    	return $this->_descripcion;
    }
}


?>