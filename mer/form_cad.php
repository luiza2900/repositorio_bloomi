<?php
// Função para listar as marcas do banco de dados e montar o <select>
function listarMarcas() {
    $servidor = 'localhost';
    $usuario = 'root';
    $senha = 'Home@spSENAI2025!';
    $banco = 'bloomi';
    $conexao = new mysqli($servidor, $usuario, $senha, $banco);
    if ($conexao->connect_error) {
        return "<option value=''>Erro ao carregar funções</option>";
    }
    $sql = "SELECT idmarca, nome_marca FROM marcas";
    $resultado = $conexao->query($sql);
    $options = "";
    if ($resultado && $resultado->num_rows > 0) {
        while ($linha = $resultado->fetch_assoc()) {
            $options .= "<option value='" . $linha['idmarca'] . "'>" . $linha['nome_marca'] . "</option>";
        }
    } else {
        $options = "<option value=''>Nenhuma função cadastrada</option>";
    }
    $conexao->close();
    return $options;
}
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Cadastro de Produtos</title>
  <link rel="stylesheet" href="style-form.css">
</head>
<body>


  <h2 class='abacaxi'>Cadastro de Produtos-Bloomi</h2>


  <form action="cadastro.php" method="POST">


    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" required>
    <p>


    <label for="valordecusto">Valor de Custo:</label>
    <input type="number" id="valordecusto" name="valordecusto" required>
    <p>


    <label for="valordevendas">Valor de Vendas:</label>
    <input type="number" id="valordevendas" name="valordevendas" required>
    <p>
    <label for="estoque">Estoque:</label>
    <input type="number" id="estoque" name="estoque" required>
    <p>
    <label for="idmarca">ID Marca:</label>
    <select id="idmarca" name="idmarca" required>
      <option value="">Selecione uma Marca</option>
      <?php echo listarMarcas(); ?>
    </select>
    <p>
    <button type="submit">Cadastrar Produto</button>


  </form>
</body>
</html>
