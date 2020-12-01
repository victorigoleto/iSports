<?php require_once('../Connections/conexao.php'); ?>
<?php mysql_query("SET NAMES 'utf8'; "); ?>
<?php

//Leitura
$codigo = $_GET["codigo_pro"];


	$SQL = "SELECT c.nome_cat, m.nome_mar, 
			FROM tabcategorias c, tabmarcas m, tabprodutos p ".
		   "WHERE codigo_pro = " . $codigo ;
	mysql_select_db($database_conexao, $conexao);
	$rsProdutos = mysql_query($SQL, $conexao) or die (mysql_error () );
	$registro_rsProdutos = mysql_fetch_assoc ($rsProdutos);
	$total_rsProdutos = mysql_num_rows($rsProdutos);
	
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
          <td width="48"><img name="" src="imagens/Icones/produtos.png" width="48" height="48" alt="" /></td>
          <td width="672">Produtos</td>
          <td width="48"><a href="produtos_list.php"><img src="imagens/Icones/back.png" alt="" width="48" height="48" border="0" /></a></td>
          <td width="48"><a href="logout.php"><img src="imagens/Icones/Sair.png" alt="" width="40" height="40" border="0" /></a></td>
        </tr>
      </table>
    </div>
    <div id="divTitulo2">
      <table width="90%" border="0" align="center" cellpadding="0" cellspacing="2">
        <tr>
          <td width="51"><img name="" src="imagens/Icones/detalhes.png" width="48" height="48" alt="" /></td>
          <td width="753">Detalhes de Produtos</td>
        </tr>
      </table>
    </div>
    <p>&nbsp;</p>
    <table width="100%" border="1" cellpadding="5">
      <tr>
        <td width="20%"><em><strong>Produto Ativo:</strong></em></td>
        <td><?php echo $registro_rsProdutos['ativo_pro']; ?></td>
      </tr>
      <tr>
        <td><strong><em>Descrição de Produtos:</em></strong></td>
        <td><?php echo $registro_rsProdutos['descricao_pro']; ?></td>
      </tr>
      <tr>
        <td><em><strong>Marcas:</strong></em></td>
        <td><?php echo $registro_rsMarcas['nome_mar']; ?></td>
      </tr>
      <tr>
        <td><em><strong>Categorias:</strong></em></td>
        <td><?php echo $registro_rsCategorias['nome_cat']; ?></td>
      </tr>
      <tr>
        <td><strong><em>Imagem do Produto:</em></strong></td>
        <td><img src="admin/imagens/<?php echo $registro_rsProdutos['imagem_pro']; ?>" width="150" height="150" alt="" value=<?php echo $registro_rsProdutos['imagem_pro']; ?> /></td>
      </tr>
      <tr>
        <td><strong><em>Preço Unitario:</em></strong></td>
        <td><?php echo $registro_rsProdutos['preco_unitario_pro']; ?></td>
      </tr>
      <tr>
        <td><em><strong>Produto na Página Principal:</strong></em></td>
        <td><?php echo $registro_rsProdutos['principal_pro']; ?></td>
      </tr>
      <tr>
        <td><strong><em>Quantidade de Produtos:</em></strong></td>
        <td><?php echo $registro_rsProdutos['qtde_estoque_pro']; ?></td>
      </tr>
      <tr>
        <td><strong><em>Resumo de Produtos:</em></strong></td>
        <td><?php echo $registro_rsProdutos['resumo_pro']; ?></td>
      </tr>
      <tr>
        <td colspan="2">&nbsp;</td>
      </tr>
    </table>
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

<?php
	mysql_free_result($rsProdutos);
?>
