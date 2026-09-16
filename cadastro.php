<?php


$nome             = $_POST['nome'];
$valordecusto     = $_POST['valordecusto'];
$valordevendas    = $_POST['valordevendas'];
$estoque          = $_POST['estoque'];
$idmarca          = $_POST['idmarca'];


$servidor = 'localhost';
$usuario  = 'root';
$senha    = 'Home@spSENAI2025!';
$banco    = 'bloomi';


$conexao = new mysqli($servidor, $usuario, $senha, $banco);


if ($conexao->connect_error) {
    die('Falha na conexão: ' . $conexao->connect_error);
}


// Utilização de Prepared Statement para segurança e inserção da FK idmarca
$stmt = $conexao->prepare("INSERT INTO PRODUTOS (nome, valordecusto, valordevendas, estoque, idmarca) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sddii", $nome, $valordecusto, $valordevendas, $estoque, $idmarca);


if ($stmt->execute()) {
    echo "<h2>Cliente cadastrado com sucesso!</h2>";
    echo "<p>Dados registrados:</p>";
    echo "Nome: " . htmlspecialchars($nome) . "<br>";
    echo "Valor de Custo: " . htmlspecialchars($valordecusto) . " <br>";
    echo "Valor de Vendas: " . htmlspecialchars($valordevendas) . "<br>";
    echo "Estoque: " . htmlspecialchars($estoque) . "<br>";
    echo "ID marca: " . htmlspecialchars($idmarca) . "<br>";
} else {
    echo "Erro ao cadastrar: " . $stmt->error;
}


$stmt->close();
$conexao->close();
?>
