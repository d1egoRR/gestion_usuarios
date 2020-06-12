<?php

require_once 'Persona.php';
require_once 'MySQL.php';


class Cliente extends Persona {

	private $_idCliente;
	private $_cbu;

    /**
     * @return mixed
     */
    public function getIdCliente()
    {
        return $this->_idCliente;
    }


    /**
     * @return mixed
     */
    public function getCbu()
    {
        return $this->_cbu;
    }

    /**
     * @param mixed $_cbu
     *
     * @return self
     */
    public function setCbu($_cbu)
    {
        $this->_cbu = $_cbu;

        return $this;
    }

   public static function obtenerPorId($id) {
        $sql = "SELECT persona.id_persona, persona.nombre, persona.apellido, "
             . "persona.id_tipo_documento, persona.numero_documento, "
             . "persona.fecha_nacimiento, persona.id_estado, cliente.id_cliente, "
             . "cliente.cbu FROM cliente "
             . "INNER JOIN persona on persona.id_persona = cliente.id_persona "
             . "WHERE cliente.id_cliente = " . $id;

        $mysql = new MySQL();
        $result = $mysql->consultar($sql);
        $mysql->desconectar();

        $data = $result->fetch_assoc();
        $cliente = self::_generarCliente($data);
        return $cliente;
    }

    public static function obtenerTodos() {
    	$sql = "SELECT persona.id_persona, persona.nombre, persona.apellido, cliente.id_cliente, cliente.cbu "
		     . "FROM persona "
			 . "INNER JOIN cliente ON cliente.id_persona = persona.id_persona";

    	$mysql = new MySQL();
    	$datos = $mysql->consultar($sql);
    	$mysql->desconectar();

    	$listado = self::_generarListadoCliente($datos);

    	return $listado;
    }

    public function guardar() {
        parent::guardar();

        $sql = "INSERT INTO Cliente (id_cliente, id_persona, cbu) "
             . "VALUES (NULL, $this->_idPersona, '$this->_cbu')";

        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idCliente = $idInsertado;
    }

    public function actualizar() {
        parent::actualizar();

        $sql = "UPDATE Cliente SET cbu = '$this->_cbu' WHERE id_cliente = $this->_idCliente";
        $mysql = new MySQL();
        $mysql->actualizar($sql);

    }

    private function _generarCliente($data) {
        $cliente = new Cliente($data['nombre'], $data['apellido']);
        $cliente->_idCliente = $data['id_cliente'];
        $cliente->_cbu = $data['cbu'];
        $cliente->_idPersona = $data['id_persona'];
        $cliente->_fechaNacimiento = $data['fecha_nacimiento'];
        $cliente->_tipoDocumento = $data['id_tipo_documento'];
        $cliente->_numeroDocumento = $data['numero_documento'];
        $cliente->_estado = $data['id_estado'];
        $cliente->setDomicilio();
        return $cliente;
    }

    private function _generarListadoCliente($datos) {
    	$listado = array();
		while ($registro = $datos->fetch_assoc()) {
			$cliente = new Cliente($registro['nombre'], $registro['apellido']);
			$cliente->_idCliente = $registro['id_cliente'];
			$cliente->_idPersona = $registro['id_persona'];
			$cliente->_cbu = $registro['cbu'];
			$listado[] = $cliente;
		}
		return $listado;
    }

}


?>