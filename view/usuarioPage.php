<?php
require_once '../controller/authExibirUsuario.php';

$id = $_GET['id'] ?? null;

$controller = new AuthExibirUsuario();
$usuario = $controller->buscarUsuarioPorId($id);

if (!$usuario) {
    die('Usuário não encontrado.');
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Dados do Usuário</title>
  <script>
    tailwind.config = {
      darkMode: 'class',
      theme: {
        extend: {
          colors: {
            primary: '#4bb6b7',
            darkblue: 'rgb(43, 43, 151)',
          },
        }
      }
    }
  </script>
  <script>
    (function () {
      const userPref = localStorage.getItem('theme');
      const systemPrefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
      if (userPref === 'dark' || (!userPref && systemPrefersDark)) {
        document.documentElement.classList.add('dark');
      } else {
        document.documentElement.classList.remove('dark');
      }
    })();
    const toggleTheme = () => {
      const html = document.documentElement;
      const theme = html.classList.contains('dark') ? 'light' : 'dark';
      html.classList.toggle('dark');
      localStorage.setItem('theme', theme);
    }
  </script>
</head>
<body class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-white min-h-screen flex items-center justify-center px-4">
  <div class="absolute top-6 right-6">
    <a href="../factory/logout.php" title="Sair" class="inline-flex items-center px-3 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg shadow transition">
      <i class="fas fa-sign-out-alt mr-2"></i> Sair
    </a>
  </div>
  <div class="max-w-xl w-full bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-8 space-y-6">
    <h2 class="text-3xl font-bold text-primary text-center">Informações do Usuário</h2>

    <div class="space-y-4">
      <div><strong>ID:</strong> <?= htmlspecialchars($usuario['id']) ?></div>
      <div><strong>Nome:</strong> <?= htmlspecialchars($usuario['name']) ?></div>
      <div><strong>CPF:</strong> <?= htmlspecialchars($usuario['cpf']) ?></div>
      <div><strong>Email:</strong> <?= htmlspecialchars($usuario['email']) ?></div>
      <div><strong>Telefone:</strong> <?= htmlspecialchars($usuario['telephone']) ?></div>
      <div><strong>Data de Cadastro:</strong> <?= htmlspecialchars($usuario['created_at']) ?></div>
    </div>

    <div class="text-center">
      <button onclick="toggleTheme()" class="mt-6 text-sm underline hover:text-primary transition">Alternar tema</button>
    </div>
  </div>
</body>
</html>
