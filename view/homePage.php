<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="../javascript/homePage/home.js" defer></script>
  <title>Sistema de Chamados</title>
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
</head>

<body class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-white min-h-screen flex items-center justify-center px-4">

  <div class="max-w-4xl w-full bg-white dark:bg-gray-800 rounded-2xl shadow-xl overflow-hidden">
    <div class="grid grid-cols-1 md:grid-cols-2">

      <!-- Lado esquerdo: apresentação -->
      <div class="flex flex-col justify-center p-8 bg-primary text-white">
        <h2 class="text-3xl font-bold mb-4">Bem-vindo ao Sistema de Cadastro de Usuário</h2>
        <p class="mb-6">Cadastre-se facilmente e gerencie seu acesso de forma segura e prática.</p>
        <ul class="space-y-2 text-sm">
          <li><i class="fas fa-check mr-2"></i>Cadastro rápido e simples</li>
          <li><i class="fas fa-check mr-2"></i>Gerencie suas informações pessoais</li>
          <li><i class="fas fa-check mr-2"></i>Segurança e privacidade garantidas</li>
        </ul>
      </div>

      <!-- Lado direito: ações -->
      <div class="flex flex-col justify-center items-center p-10 space-y-6 bg-white dark:bg-gray-900">
        <h3 class="text-2xl font-semibold">Vamos lá!</h3>

        <!-- Botões de ação -->
        <div class="w-full space-y-4">
          <a href="./loginPage.php" class="block text-center bg-primary text-white py-3 rounded-xl font-bold hover:bg-[#3ba7a7] transition duration-300">Sou Usuário - Cadastrar/Logar</a>
        </div>

        <!-- Alternância de tema -->
        <button id="trocaTema" class="mt-6 text-sm underline hover:text-primary transition">Alternar tema</button>
      </div>

    </div>
  </div>

</body>

</html>