<?php
require 'conexao.php';

$stmt = $pdo->query("SELECT * FROM imoveis");
$imoveis = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">   
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
  <link
      rel="stylesheet"
      type="text/css"
      href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/fill/style.css"
    />
  <title>Imobiliária</title>
</head>
<body class="bg-gray-100 text-gray-900 font-[Inter]">
  <div class="max-w-4xl mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6 text-center">Imóveis cadastrados</h1>

    <div class="flex justify-end mb-4">
      <a href="cadastrar.php" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
        + Novo Imóvel
      </a>
    </div>

    <div class="bg-white shadow rounded-lg overflow-hidden">
      <table class="min-w-full text-left">
        <thead class="bg-gray-200">
          <tr>
            <th class="py-2 px-4">Título</th>
            <th class="py-2 px-4">Tipo</th>
            <th class="py-2 px-4">Preço</th>
            <th class="py-2 px-4">Ações</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($imoveis as $imovel): ?>
            <tr class="hover:bg-gray-50">
              <td class="py-2 px-4"><?= htmlspecialchars($imovel['titulo']) ?></td>
              <td class="py-2 px-4"><?= $imovel['tipo'] ?></td>
              <td class="py-2 px-4">R$ <?= number_format($imovel['preco'], 2, ',', '.') ?></td>
              <td class="py-2 px-4 space-x-2">
                <a href="editar.php?id=<?= $imovel['id'] ?>" class="text-gray-900 hover:underline"><i class="ph-fill ph-pen"></i></a>

                <a href="deletar.php?id=<?= $imovel['id'] ?>" class="text-red-700 hover:underline" onclick="return confirm('Tem certeza que deseja excluir este imóvel?')"><i class="ph-fill ph-trash"></i></a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</body>
</html>