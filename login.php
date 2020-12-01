<?php require_once('Connections/conexao.php'); ?>
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
<link href="css/estilo_div.css" rel="stylesheet" type="text/css" />
<link href="css/estilo_format.css" rel="stylesheet" type="text/css" />
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
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
    <p>&nbsp;</p>
    <form id="form1" name="form1" method="post" action="index.php">
      <table width="400" border="1" align="center">
        <tr>
          <td width="184">Usuario:</td>
          <td width="200"><label for="textfield"></label>
          <input name="textfield" type="text" id="textfield" size="40" /></td>
        </tr>
        <tr>
          <td>Senha:</td>
          <td><label for="textfield2"></label>
          <input type="text" name="textfield2" id="textfield2" /></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
          <td align="center"><input type="submit" name="btnLogar" id="btnLogar" value="Logar" /></td>
          <td align="center"><input type="reset" name="btnCancelar" id="btnCancelar" value="Cancelar" /></td>
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