<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Sorteio</title>
</head>

<body>
<?
//Conexao com o banco de dados
$conexao = mysql_connect("200.17.173.43", "paulo", "SUASENHA") or die ("Não foi possivel conectar ao servidor MySQL");
mysql_select_db("arthur",$conexao) or die(mysql_error());

//Aqui que acontece o "Sorteio" utilizando a função do mysql RAND() que escolhe aleatoriamente um registro
$sel="SELECT * FROM cadastro ORDER BY RAND() LIMIT 1,1";
$query = mysql_query($sel);
$busca = mysql_fetch_array($query);

//Faz a busca dos dados do sorteado
$id = $busca['id'];
$nome = $busca['nome'];
$sobrenome = $busca['sobrenome'];
$dia = $busca['dia'];
$mes = $busca['mes'];
$ano = $busca['ano'];
$email = $busca['email'];
$cidade = $busca['cidade'];
$resposta = $busca['resposta'];

//Exibe o sorteado
echo "Número sortiado: ".$id."<br>Nome: ".$nome." ".$sobrenome."<br>Data de Nascimento: ".$dia." ".$mes." ".$ano."<br>E-mail: ".$email."<br>Cidade: ".$cidade."<br>Quem é o atual Presidente da República: ".resposta."";
 
?>
</body>
</html>
