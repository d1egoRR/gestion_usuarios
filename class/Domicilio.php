<?php

require_once 'MySQL.php';


class Domicilio {

	private $_idDomicilio;
	private $_calle;
	private $_altura;
	private $_piso;
	private $_manzana;
	private $_idPersona;

    /**
     * @return mixed
     */
    public function getIdDomicilio()
    {
        return $this->_idDomicilio;
    }

    /**
     * @param mixed $_idDomicilio
     *
     * @return self
     */
    public function setIdDomicilio($_idDomicilio)
    {
        $this->_idDomicilio = $_idDomicilio;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCalle()
    {
        return $this->_calle;
    }

    /**
     * @param mixed $_calle
     *
     * @return self
     */
    public function setCalle($_calle)
    {
        $this->_calle = $_calle;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAltura()
    {
        return $this->_altura;
    }

    /**
     * @param mixed $_altura
     *
     * @return self
     */
    public function setAltura($_altura)
    {
        $this->_altura = $_altura;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPiso()
    {
        return $this->_piso;
    }

    /**
     * @param mixed $_piso
     *
     * @return self
     */
    public function setPiso($_piso)
    {
        $this->_piso = $_piso;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getManzana()
    {
        return $this->_manzana;
    }

    /**
     * @param mixed $_manzana
     *
     * @return self
     */
    public function setManzana($_manzana)
    {
        $this->_manzana = $_manzana;

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

    public static function obtenerPorIdPersona($idPersona) {
    	$sql = "SELECT * FROM domicilio WHERE id_persona = " . $idPersona;

    	$mysql = new MySQL();
    	$datos = $mysql->consultar($sql);
    	$mysql->desconectar();

    	$data = $datos->fetch_assoc();
    	$domicilio = new Domicilio();

    	if ($datos->num_rows > 0) {

	    	$domicilio->_idDomicilio = $data['id_domicilio'];
	    	$domicilio->_calle = $data['calle'];
	    	$domicilio->_altura = $data['altura'];
	    	$domicilio->_piso = $data['piso'];
	    	$domicilio->_manzana = $data['manzana'];
	    	$domicilio->_idPersona = $data['id_persona'];
	    }

    	return $domicilio;
    }

    public function __toString() {
    	return $this->_calle . " " . $this->_altura;
    }
}


?>