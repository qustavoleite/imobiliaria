<?php
require 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $titulo = $_POST['titulo'];
  $descricao = $_POST['descricao'];
  $preco = $_POST['preco'];
  $endereco = $_POST['endereco'];
  $tipo = $_POST['tipo'];

  // Validação do título (não pode conter números)
  if (preg_match('/[0-9]/', $titulo)) {
    die("O título não pode conter números");
  }

  // Validação do preço (não pode ser negativo)
  if ($preco < 0) {
    die("O preço não pode ser negativo");
  }

  $stmt = $pdo->prepare("INSERT INTO imoveis (titulo, descricao, preco, endereco, tipo) 
                           VALUES (?, ?, ?, ?, ?)");
  $stmt->execute([$titulo, $descricao, $preco, $endereco, $tipo]);

  header("Location: index.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <title>Cadastrar Imóvel</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
</head>

<body class="bg-gray-100 text-gray-900 font-[Inter]">
  <div class="max-w-2xl mx-auto mt-10 bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-6 text-center">Cadastrar Novo Imóvel</h1>

    <form method="POST" class="space-y-4">
      <div>
        <label class="block mb-1 font-medium">Título</label>
        <input type="text"
          name="titulo"
          required
          pattern="^[^0-9]*$"
          title="O título não pode conter números"
          class="w-full border rounded px-3 py-2">
      </div>

      <div>
        <label class="block mb-1 font-medium">Descrição</label>
        <textarea name="descricao" rows="3" class="w-full border rounded px-3 py-2"></textarea>
      </div>

      <div>
        <label class="block mb-1 font-medium">Preço</label>
        <input type="number"
          step="0.01"
          name="preco"
          required
          min="0"
          class="w-full border rounded px-3 py-2">
      </div>

      <div>
        <label class="block mb-1 font-medium">Endereço</label>
        <input type="text" name="endereco" class="w-full border rounded px-3 py-2">
      </div>

      <div>
        <label class="block mb-1 font-medium">Tipo</label>
        <select name="tipo" required class="w-full border rounded px-3 py-2">
          <option value="Casa">Casa</option>
          <option value="Apartamento">Apartamento</option>
          <option value="Terreno">Terreno</option>
        </select>
      </div>

      <div class="flex justify-between items-center mt-6">
        <a href="index.php" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">← Voltar</a>
        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
          Cadastrar
        </button>
      </div>
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</body>

</html>