<?php require_once('../Connections/conexao.php'); ?>
<?php mysql_query("SET NAMES 'utf8'; "); ?>
<?php
	$SQL = "SELECT * FROM tabprodutos ".
		   "ORDER BY descricao_pro";
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
      <table width="90%" border="1" align="center" cellspacing="2">
        <tr>
          <td width="48"><img name="" src="imagens/Icones/produtos.png" width="48" height="48" alt="" /></td>
          <td width="672"><em><strong>Produtos</strong></em></td>
          <td width="48"><a href="index.php"><img src="imagens/Icones/back.png" alt="" width="48" height="48" border="0" /></a></td>
          <td width="48"><a href="logout.php"><img src="imagens/Icones/Sair.png" alt="" width="40" height="40" border="0" /></a></td>
        </tr>
      </table>
    </div>
    <div id="divTitulo2">
      <table width="90%" border="1" align="center" cellpadding="0" cellspacing="2">
        <tr>
          <td width="51"><img name="" src="imagens/Icones/listagem.png" width="48" height="48" alt="" /></td>
          <td width="753"><em><strong>Listagem de Produtos</strong></em></td>
        </tr>
      </table>
    </div>
<p>
      <?php if($total_rsProdutos > 0) { ?></p>
    <table width="900" border="1">
      <tr>
        <td colspan="3">&nbsp;</td>
        <td width="801" align="center"><strong><em>Listagem de Produtos</em></strong></td>
        <?php do { //inicio do Repate Region ?>
      </tr>
     
      <tr>
        <td width="35"><a href="produtos_alt.php?codigo_pro=<?php echo $registro_rsProdutos['codigo_pro']; ?>"><img src="imagens/Icones/alterar.png" alt="" width="48" height="48" border="0" /></a></td>
        <td width="49"><a href="produtos_exc.php?codigo_pro=<?php echo $registro_rsProdutos['codigo_pro']; ?>"><img src="imagens/Icones/Delete.png" alt="" width="48" height="48" border="0" /></a></td>
        <td width="48"><a href="produtos_det.php?codigo_pro=<?php echo $registro_rsProdutos['codigo_pro']; ?>"><img src="imagens/Icones/detalhes.png" alt="" width="48" height="48" border="0" /></a></td>
        <td><?php echo $registro_rsProdutos ['descricao_pro']; ?></td>
      </tr>
       <?php } while ($registro_rsProdutos = mysql_fetch_assoc ($rsProdutos) ); ?>
    </table>
    <?php } ?>
    <?php if ($total_rsProdutos == 0) { ?>
    <table width="900" border="1">
      <tr>
        <td width="890" align="center"><em>Nenhum produto cadastrado !</em></td>
      </tr>
    </table>
   <?php } ?>
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