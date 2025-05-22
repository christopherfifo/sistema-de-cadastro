<?php
require_once '../model/userModel.php';

session_start();

class AuthControllerClient
{
public function register()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];
        $cpf = $_POST['cpf'];
        $email = $_POST['email'];
        $telephone = $_POST['telephone'];
        $password = $_POST['password'];

        $userModel = new UserModel();

        // Verifica se o email já existe
        if ($userModel->confereEmail($email)) {
            echo json_encode(['error' => 'Email já cadastrado!']);
            return;
        }

        // Verifica se o CPF já existe
        if ($userModel->confereCpf($cpf)) {
            echo json_encode(['error' => 'CPF já cadastrado!']);
            return;
        }

        if ($userModel->register($name, $cpf, $email, $telephone, $password)) {
    $user = $userModel->login($email, $password);
    if ($user) {
        $_SESSION['user'] = $user;
        $token = bin2hex(random_bytes(32));
        $_SESSION['token'] = $token;
        // Retorna a URL de redirecionamento com o id do usuário
        echo json_encode([
            'success' => 'Cadastro realizado com sucesso!',
            'redirect' => '../view/usuarioPage.php?id=' . $user['id']
        ]);
        return;
    } else {
        echo json_encode(['error' => 'Credenciais inválidas!']);
        return;
    }
} else {
    echo json_encode(['error' => 'Erro ao registrar usuário.']);
    return;
}
    } else {
        echo json_encode(['error' => 'Método não permitido.']);
    }
}



    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['usuario'];
            $password = $_POST['password'];

            $userModel = new UserModel();
            $user = $userModel->login($email, $password);
            if ($user) {
                $_SESSION['user'] = $user;
                $token = bin2hex(random_bytes(32));
                $_SESSION['token'] = $token;
                header('Location: ../view/usuarioPage.php?id=' . $user['id']);
            } else {
                echo "Credenciais inválidas!";
            }
        }
    }

}
// Roteamento básico usando POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $authController = new AuthControllerClient();
    $action = $_POST['action'];

    if ($action != "register") {
    }

    if (method_exists($authController, $action)) {
        $authController->$action();
    } else {
        echo "Ação inválida!";
    }
} else {
    echo "Nenhuma ação especificada ou método inválido!";
}
