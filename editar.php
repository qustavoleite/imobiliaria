<?php
require 'conexao.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM imoveis WHERE id = ?");
$stmt->execute([$id]);
$imovel = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $endereco = $_POST['endereco'];
    $tipo = $_POST['tipo'];

    $stmt = $pdo->prepare("UPDATE imoveis SET titulo=?, descricao=?, preco=?, endereco=?, tipo=? WHERE id=?");
    $stmt->execute([$titulo, $descricao, $preco, $endereco, $tipo, $id]);

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <title>Editar Imóvel</title>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center px-4 font-[Inter]">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-lg">
        <h1 class="text-2xl font-bold mb-6 text-gray-800">Editar Imóvel</h1>
        <form method="POST" class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Título</label>
                <input type="text" name="titulo" value="<?= $imovel['titulo'] ?>" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Descrição</label>
                <textarea name="descricao" rows="4" class="mt-1 block w-full border border-gray-300 rounded-md p-2"><?= $imovel['descricao'] ?></textarea>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Preço</label>
                <input type="number" step="0.01" name="preco" value="<?= $imovel['preco'] ?>" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Endereço</label>
                <input type="text" name="endereco" value="<?= $imovel['endereco'] ?>" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Tipo</label>
                <select name="tipo" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                    <option value="Casa" <?= $imovel['tipo'] == 'Casa' ? 'selected' : '' ?>>Casa</option>
                    <option value="Apartamento" <?= $imovel['tipo'] == 'Apartamento' ? 'selected' : '' ?>>Apartamento</option>
                    <option value="Terreno" <?= $imovel['tipo'] == 'Terreno' ? 'selected' : '' ?>>Terreno</option>
                </select>
            </div>
            <div class="flex justify-between">
                <a href="index.php" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">← Voltar para a lista</a>

                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
                    Atualizar
                </button>
            </div>
        </form>
    </div>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</body>
</html>
