<?php 

require_once('../../../conexao.php');
$tabela = 'calculos_civeis';


$id=$_POST['id'];
$processo=$_POST['processo'];
$vara=$_POST['vara'];
$exequente=$_POST['exequente'];
$executado=$_POST['executado'];
$datafinalcorrecao=$_POST['datafinalcorrecao'];
$datainicialjuros=$_POST['datainicialjuros'];
$datafinaljuros=$_POST['datafinaljuros'];
$dataevento=$_POST['dataevento'];
$historico=$_POST['historico'];
$valor=$_POST['valor'];
$indicecorrecao=$_POST['indicecorrecao'];
$juros=$_POST['juros'];
$total=$_POST['total'];



$query = $pdo->prepare("INSERT INTO $tabela SET processo = :processo, vara = :vara, exequente = :exequente, executado = :executado, datafinalcorrecao = :datafinalcorrecao, datainicialjuros = :datainicialjuros, datafinaljuros = :datafinaljuros, dataevento = :dataevento, historico = :historico, valor = :valor, indicecorrecao = :indicecorrecao, juros = :juros, total = :total");

$query->bindValue(":processo","$processo");
$query->bindValue(":vara","$vara");
$query->bindValue(":exequente","$exequente");
$query->bindValue(":executado","$executado");
$query->bindValue(":datafinalcorrecao","$datafinalcorrecao");
$query->bindValue(":datainicialjuros","$datainicialjuros");
$query->bindValue(":datafinaljuros","$datafinaljuros");
$query->bindValue(":dataevento","$dataevento");
$query->bindValue(":historico","$historico");
$query->bindValue(":valor","$valor");
$query->bindValue(":indicecorrecao","$indicecorrecao");
$query->bindValue(":juros","$juros");
$query->bindValue(":total","$total");
$query->execute();

echo 'Salvo com Sucesso';

 ?>
