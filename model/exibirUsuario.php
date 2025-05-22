<?php
require_once '../factory/conexao.php';

class ExibirUsuario{

    private $db;

    public function __construct()
    {
        $dbInstance = new Caminho();
        $this->db = $dbInstance->getConn();
    }

    public function buscarUsuarioPorId($id)
    {
        try {
            $query = "SELECT * FROM Users WHERE id = ?";
            $stmt = $this->db->prepare($query);
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Erro ao buscar usuário: " . $e->getMessage());
            return null;
        }
    }
}
?>