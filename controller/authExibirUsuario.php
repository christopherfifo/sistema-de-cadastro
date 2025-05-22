<?php
require_once '../model/exibirUsuario.php';

class AuthExibirUsuario {

    private $usuarioModel;

    private function isAuthenticated() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        return isset($_SESSION['user']['email']) && isset($_SESSION['token']);
    }

    public function __construct() {
        if (!$this->isAuthenticated()) {
            echo "Acesso negado! Usuário não autenticado.";
            return false;
        }
        $this->usuarioModel = new ExibirUsuario();
    }

    public function buscarUsuarioPorId($id) {
        if (!$this->isAuthenticated()) {
            echo "Acesso negado! Usuário não autenticado.";
            return false;
        }
        if (!is_numeric($id)) {
            echo "ID inválido.";
            return null;
        }
        return $this->usuarioModel->buscarUsuarioPorId($id);
    }
}

?>