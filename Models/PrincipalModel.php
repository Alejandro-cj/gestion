<?php
class PrincipalModel extends Query{
    public function __construct()
    {
        parent::__construct();
    }

    public function getUsuario($correo)
    {
        return $this->select("SELECT * FROM usuarios WHERE correo = '$correo' AND estado = 1");
    }

    public function updateToken($token, $correo)
    {
        $sql = "UPDATE usuarios SET token = ? WHERE correo = ?";
        return $this->save($sql, [$token, $correo]);
    }

    public function getToken($token)
    {
        return $this->select("SELECT * FROM usuarios WHERE token = '$token' AND estado = 1");
    }

    public function cambiarPass($clave, $token)
    {
        $sql = "UPDATE usuarios SET clave=?, token = ? WHERE token = ?";
        return $this->save($sql, [$clave, null, $token]);
    }
}

?>