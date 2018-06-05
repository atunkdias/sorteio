<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Script para cadastro</title>
</head>

<body>
<?
//Conexao com o banco de dados
$conexao = mysql_connect("200.17.173.43", "paulo", "SUASENHA") or die ("Não foi possivel conectar ao servidor MySQL");
mysql_select_db("arthur",$conexao) or die(mysql_error());


 //Função anti sql Injection que não permite que seja introduzido strings de consulta ao banco de dados
 function anti_injection($sql)
 {

 $sql = preg_replace(sql_regcase("/(from|select|insert|delete|where|drop table|show tables|#|\*|--|\\\\)/"),"",$sql);
 $sql = trim($sql);
 $sql = strip_tags($sql);
 $sql = addslashes($sql);
 return $sql;
 }
 function recebepost($post)
 {
 $post = anti_injection($_POST[$post]);
 return $post; 	 
 }
 
 
//Recebe os posts do formulario 
$nome = anti_injection($_POST['nome']);
$sobrenome = anti_injection($_POST['sobrenome']);
$dia = anti_injection($_POST['dia']);
$mes = anti_injection($_POST['mes']);
$ano = anti_injection($_POST['ano']);
$email = anti_injection($_POST['email']);
$cidade = anti_injection($_POST['cidade']);
$resposta = anti_injection($_POST['resposta']);

//cadastra os dados recebidos no banco de dados
$add = "INSERT INTO cadastro (nome, sobrenome, dia, mes, ano, email, cidade, resposta) VALUES('$nome', '$sobrenome', '$dia', '$mes', '$ano', '$email', '$cidade', '$resposta');";
$query = mysql_query($add);

//Exibe uma mensagem que foi cadastrado
echo "Seu cadastro foi relizado com sucesso.";


?>
</body>
</html>
