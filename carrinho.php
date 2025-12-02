<?php
session_start();

$produtos_simulados = [
    1 => ['nome' => 'Nike SB charge preto', 'preco' => 249.99],
    2 => ['nome' => 'QIX chorão park', 'preco' => 249.99],
    3 => ['nome' => 'Hocks Puff preto', 'preco' => 249.99],
    4 => ['nome' => 'DC shoes court graffik', 'preco' => 249.99],
    5 => ['nome' => 'Adidas campus 00s', 'preco' => 249.99],
    6 => ['nome' => 'Vans knu school', 'preco' => 249.99],
];


if (isset($_GET['acao'])) {
    
    $acao = $_GET['acao'];
    $id_produto = isset($_GET['id']) ? (int)$_GET['id'] : 0;
    
    if ($acao == 'add' && $id_produto > 0 && isset($produtos_simulados[$id_produto])) {
        
        $produto = $produtos_simulados[$id_produto];
        
        if (!isset($_SESSION['carrinho'])) {
            $_SESSION['carrinho'] = [];
        }
        if (isset($_SESSION['carrinho'][$id_produto])) {
            $_SESSION['carrinho'][$id_produto]['quantidade']++;
        } else {
            $_SESSION['carrinho'][$id_produto] = [
                'nome' => $produto['nome'],
                'preco' => $produto['preco'],
                'quantidade' => 1
            ];
        }
        header("Location: home.html");
        exit;
        
    }
    if ($acao == 'ver') {
        header("Location: carrinho_visual.php");
        exit;
    }
}
header("Location: home.html");
exit;
?>