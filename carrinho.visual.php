<?php
session_start(); 

$carrinho_vazio = !isset($_SESSION['carrinho']) || empty($_SESSION['carrinho']);
$total_carrinho = 0;

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seu Carrinho | StreetZone</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="carrinho.css">
</head>
<body>
   <div class="navbar">
    <div class="header-inner-content">
        <h1 class="logo">STREET<span>ZONE</span></h1>
      <nav>
  <ul>
    <li><a href="login.html">Login</a></li>
  </ul>
</nav>
        <div class="nav-ícon-container">
            <a href="carrinho_visual.php"><img src="tenis.img/cart.png" alt="Carrinho" /></a>
            <img src="tenis.img/menu.png" class="menu-button" alt="Menu"/>
        </div>
    </div>
   </div>
   <div class="carrinho-container">
        <h2 class="titulo-carrinho">Seu Carrinho de Compras</h2>

        <?php if ($carrinho_vazio): ?>
            <div class="carrinho-vazio">
                <p>O seu carrinho está vazio. Adicione alguns tênis!</p>
                <a href="home.html" class="btn-continuar">← Continuar Comprando</a>
            </div>
        <?php else: ?>
            
            <table class="tabela-carrinho">
                <thead>
                    <tr>
                        <th>Produto</th>
                        <th>Preço Unitário</th>
                        <th>Quantidade</th>
                        <th>Subtotal</th>
                        <th>Ação</th> </tr>
                </thead>
                <tbody>
                    <?php foreach ($_SESSION['carrinho'] as $id => $item): 
                        $subtotal = $item['preco'] * $item['quantidade'];
                        $total_carrinho += $subtotal;
                    ?>
                    <tr>
                        <td>
                            <div class="info-produto">
                                <p><?php echo htmlspecialchars($item['nome']); ?></p>
                            </div>
                        </td>
                        <td>R$ <?php echo number_format($item['preco'], 2, ',', '.'); ?></td>
                        <td>
                            <?php echo $item['quantidade']; ?>
                        </td>
                        <td>R$ <?php echo number_format($subtotal, 2, ',', '.'); ?></td>
                        <td>
                            <a href="carrinho.php?acao=remover&id=<?php echo $id; ?>" class="btn-remover">Remover</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <div class="total-area">
                <div class="total-box">
                    <p>Total do Carrinho:</p>
                    <h3>R$ <?php echo number_format($total_carrinho, 2, ',', '.'); ?></h3>
                </div>
                <a href="#" class="btn-checkout">Finalizar Compra →</a>
            </div>

            <div class="botoes-compra">
                <a href="home.html" class="btn-continuar">← Continuar Comprando</a>
            </div>

        <?php endif; ?>
    </div>
    
    <footer class="rodape">
        <div class="rodape-container">
            <h3>Siga a nossa loja</h3>
            <div class="rodape-icones">
                <a href="https://www.instagram.com/SEU_USUARIO" target="_blank">
                    <img src="tenis.img/instagram.png" alt="Instagram">
                </a>
                <a href="https://wa.me/55NUMERODOTELEFONE" target="_blank">
                    <img src="tenis.img/whatsapp.png" alt="WhatsApp">
                </a>
            </div>
            <p class="copy">&copy; 2023 STREETZONE. Todos os direitos reservados.</p>
        </div>
    </footer>
</body>
</html>