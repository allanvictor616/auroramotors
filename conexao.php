<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db   = '';//colocar o nome do nosso banco aqui

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    
    // Configura para avisar se houver erros de SQL
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Se chegar aqui, funcionou! 
    echo "Conexão firme e forte!"; 

} catch (PDOException $e) {
    // Se falhar, mostra o erro na tela
    echo "Falha na conexão: " . $e->getMessage();
}
?>