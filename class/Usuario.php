<?php

require_once 'Perfil.php';
require_once 'Persona.php';
require_once 'MySQL.php';

class Usuario extends Persona {

	private $_idUsuario;
	private $_username;
	private $_password;
	private $_fechaUltimoLogin;
	private $_idPerfil;
	private $_estaLogueado;

    public $perfil;

    /**
     * @return mixed
     */
    public function getIdUsuario()
    {
        return $this->_idUsuario;
    }

    /**
     * @param mixed $_idUsuario
     *
     * @return self
     */
    public function setIdUsuario($_idUsuario)
    {
        $this->_idUsuario = $_idUsuario;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->_username;
    }

    /**
     * @param mixed $_username
     *
     * @return self
     */
    public function setUsername($_username)
    {
        $this->_username = $_username;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->_password;
    }

    /**
     * @param mixed $_password
     *
     * @return self
     */
    public function setPassword($_password)
    {
        $this->_password = $_password;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFechaUltimoLogin()
    {
        return $this->_fechaUltimoLogin;
    }

    /**
     * @param mixed $_fechaUltimoLogin
     *
     * @return self
     */
    public function setFechaUltimoLogin($_fechaUltimoLogin)
    {
        $this->_fechaUltimoLogin = $_fechaUltimoLogin;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdPerfil()
    {
        return $this->_idPerfil;
    }

    /**
     * @param mixed $_idPerfil
     *
     * @return self
     */
    public function setIdPerfil($_idPerfil)
    {
        $this->_idPerfil = $_idPerfil;

        return $this;
    }

    public static function login($username, $password) {
    	$sql = "SELECT * FROM usuario "
             . "INNER JOIN persona on persona.id_persona = usuario.id_persona "
             . "WHERE username = '$username' "
    	     . "AND password = '$password' "
             . "AND persona.id_estado = 1";

        $mysql = new MySQL();
        $result = $mysql->consultar($sql);
        $mysql->desconectar();

    	if ($result->num_rows > 0) {
            $registro = $result->fetch_assoc();
            $usuario = new Usuario($registro['nombre'], $registro['apellido']);
            $usuario->_idUsuario = $registro['id_usuario'];
            $usuario->_idPersona = $registro['id_persona'];
            $usuario->_username = $registro['username'];
            $usuario->_idPerfil = $registro['id_perfil'];
            $usuario->_fechaUltimoLogin = $registro['fecha_ultimo_login'];
            $usuario->_estaLogueado = true;

            $usuario->perfil = Perfil::obtenerPorId($usuario->_idPerfil);
            //$usuario->setDomicilio();
    	} else {
            $usuario = new Usuario('', '');
            $usuario->_estaLogueado = false;
    	}

        return $usuario;
    }

    public function estaLogueado() {
    	return $this->_estaLogueado;
    }

    public function __toString() {
        return $this->_username;
    }
}

?>