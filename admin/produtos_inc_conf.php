<?php require_once('../connections/conexao.php'); ?>
<?php mysql_query("SET NAMES 'utf8';"); ?>
<?php
	//Leitura de Dados
	$ativo = $_POST['rdbAtivo'];
	$descricao = $_POST['txtDescricao'];
	$marcas = $_POST['cmbMarcas'];
	$categorias = $_POST['cmbCategorias'];
	$imagem = $_POST['txtImagem'];
	$precou = $_POST['txtPrecoUnitario'];
	$principal = $_POST['rdbPrincipal'];
	$quantidade = $_POST['txtQuantidade'];
	$resumo = $_POST['txtResumo'];
	
	
	//Criação da Instrução SQL
	$sql = "INSERT INTO tabprodutos".
		"(ativo_pro, descricao_pro, codigo_mar, codigo_cat, imagem_pro, preco_unitario_pro, principal_pro, qtde_estoque_pro, resumo_pro)".
		"VALUES (".
		"'".$ativo."',".
		"'".$descricao."',".
		"".$marcas.",".
		"".$categorias.",".
		"'".$imagem."',".
		"".$precou.",".
		"'".$principal."',".
		"".$quantidade.",".
		"'".$resumo."'".
		")";
		
	
			//Execução da Instrução SQL	
	mysql_select_db($database_conexao, $conexao);
	$query_resultado = mysql_query($sql, $conexao) or die(mysql_error () );	
	
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="../css/estilo_div.css" rel="stylesheet" type="text/css" />
<link href="../css/estilo_format.css" rel="stylesheet" type="text/css" />
<script src="../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<style type="text/css">
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
}
</style>
</head>

<body>
<div id="divFundo">
  <div id="divFundoTopo">
    <div id="divPesquisa"></div>
    <div id="divMenuzinho">
      <ul id="MenuBar1" class="MenuBarHorizontal">
        <li><a href="index.php">Home</a></li>
        <li><a href="#" class="MenuBarItemSubmenu">Cadastro</a>
          <ul>
            <li><a href="categorias_inc.php">Categorias</a></li>
            <li><a href="produtos_inc.php">Produtos</a></li>
            <li><a href="marcas_inc.php">Marcas</a></li>
            <li><a href="clientes_inc.php">Clientes</a></li>
          </ul>
        </li>
        <li><a href="#" class="MenuBarItemSubmenu">Pesquisa</a>
          <ul>
            <li><a href="produtos_pesq.php">Produtos</a></li>
            <li><a href="marcas_pesq.php">Marcas</a></li>
            <li><a href="clientes_pesq.php">Clientes</a></li>
            <li><a href="categorias_pesq.php">Categorias</a></li>
          </ul>
        </li>
        <li><a href="logout.php">Sair</a></li>
      </ul>
    </div>
  </div>
  <div id="divBanner">
    <div id="divTitulo1">
      <table width="90%" border="0" align="center" cellspacing="2">
        <tr>
          <td width="48"><img name="" src="imagens/Icones/funcionarios.png" width="48" height="48" alt="" /></td>
          <td width="672"><strong><em>Produtos</em></strong></td>
          <td width="48"><a href="produtos_list.php"><img src="imagens/Icones/back.png" alt="" width="48" height="48" border="0" /></a></td>
          <td width="48"><a href="logout.php"><img src="imagens/Icones/Sair.png" width="40" height="40" alt="" /></a></td>
        </tr>
      </table>
    </div>
    <div id="divTitulo2">
      <table width="90%" border="0" align="center" cellpadding="0" cellspacing="2">
        <tr>
          <td width="51"><img name="" src="imagens/Icones/add.png" width="48" height="48" alt="" /></td>
          <td width="753"><strong><em>Confirmação de Inclusão de Produtos</em></strong></td>
        </tr>
      </table>
    </div>
    <p>&nbsp;</p>
    <table width="900" border="1">
      <tr>
        <td width="889" align="center"><em>Produto  incluído com sucesso !</em></td>
      </tr>
    </table>
    <p>&nbsp;</p>
  </div>
  <div id="divRodape">
    <strong>Patrocinadores:</strong>
    <p><img src="imagens/Patronicio2.png" width="100" height="100" />    <img src="imagens/Patronicio3.png" width="100" height="100" /></p>
  </div>
</div>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>
