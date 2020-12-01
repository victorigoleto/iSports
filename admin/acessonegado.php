<?php require_once('../Connections/conexao.php'); ?>
<?php
	$SQL = "SELECT * FROM tabprodutos ".
		   "ORDER BY descricao_pro";
			
	mysql_select_db($database_conexao, $conexao);
	$rsProdutos = mysql_query($SQL, $conexao) or die (mysql_error());
	$registro_rsProdutos = mysql_fetch_assoc ($rsProdutos);
	$total_rsProdutos = mysql_num_rows($rsProdutos);
	
   	$SQL = "SELECT * FROM tabcategorias ".
	        "ORDER BY nome_cat";
	$rsCategorias = mysql_query($SQL, $conexao) or die (mysql_error());
	$registro_rsCategorias = mysql_fetch_assoc ($rsCategorias);
	$total_rsCategorias = mysql_num_rows($rsCategorias);
	
	$SQL = "SELECT * FROM tabmarcas ".
	        "ORDER BY nome_mar";
	$rsMarcas = mysql_query($SQL, $conexao) or die (mysql_error());
	$registro_rsMarcas = mysql_fetch_assoc ($rsMarcas);
	$total_rsMarcas= mysql_num_rows($rsMarcas);
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
</head>

<body>
<div id="divFundo">
  <div id="divFundoTopo">
    <div id="divPesquisa"></div>
    <div id="divMenuzinho">
      <ul id="MenuBar1" class="MenuBarHorizontal">
        <li><a href="#">Modalidades</a></li>
        <li><a href="#" class="MenuBarItemSubmenu">Genero</a>
          <ul>
            <li><a href="#">Teste</a></li>
          </ul>
        </li>
        <li><a href="#" class="MenuBarItemSubmenu">Lançamentos</a>
          <ul>
            <li><a href="#">Untitled Item</a></li>
          </ul>
        </li>
        <li><a href="#">Ofertas</a></li>
      </ul>
    </div>
  </div>
  <div id="divBanner">
    <div id="divTitulo1">
      <table width="90%" border="0" align="center" cellspacing="2">
        <tr>
          <td width="48"><img name="" src="imagens/Icones/login.png" width="48" height="48" alt="" /></td>
          <td width="672">Login</td>
          <td width="48">&nbsp;</td>
          <td width="48"><a href="../index.php"><img src="imagens/Icones/back.png" alt="" width="48" height="48" border="0" /></a></td>
        </tr>
      </table>
    </div>
    <div id="divTitulo2">
      <table width="90%" border="0" align="center" cellpadding="0" cellspacing="2">
        <tr>
          <td width="51"><img name="" src="imagens/Icones/Sair.png" width="48" height="48" alt="" /></td>
          <td width="753">Acesso Restrito</td>
        </tr>
      </table>
    </div>
    <p>&nbsp;</p>
    <form id="frmLogin" name="frmLogin" method="post" action="">
      <table width="700" border="0" align="center">
        <tr>
          <td>Seu acesso ao nosso Banco de Dados foi negado, por favor <a href="../index.php">clique aqui</a> para voltar a página principal</td>
        </tr>
      </table>
    </form>
    <p>&nbsp;</p>
  </div>
  <div id="divRodape"></div>
</div>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>
<?php
mysql_free_result($rsMarcas);
?>

<?php
mysql_free_result($rsCategorias);
?>

<?php
mysql_free_result($rsProdutos);
?>