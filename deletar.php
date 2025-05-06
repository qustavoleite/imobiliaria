<?php
require 'conexao.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("DELETE FROM imoveis WHERE id = ?");
$stmt->execute([$id]);

header("Location: index.php");
exit;
