<?php require_once('../Connections/conexao.php'); ?>
<?php mysql_query("SET NAMES 'utf8'; "); ?>
<?php

if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_conexao, $conexao);
$query_recordCategorias = "SELECT * FROM tabcategorias ORDER BY nome_cat ASC";
$recordCategorias = mysql_query($query_recordCategorias, $conexao) or die(mysql_error());
$row_recordCategorias = mysql_fetch_assoc($recordCategorias);
$totalRows_recordCategorias = mysql_num_rows($recordCategorias);

mysql_select_db($database_conexao, $conexao);
$query_recordMarcas = "SELECT * FROM tabmarcas ORDER BY nome_mar ASC";
$recordMarcas = mysql_query($query_recordMarcas, $conexao) or die(mysql_error());
$row_recordMarcas = mysql_fetch_assoc($recordMarcas);
$totalRows_recordMarcas = mysql_num_rows($recordMarcas);
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
          <td width="672"><strong><em>Produtos</em></strong></td>
          <td width="48"><a href="produtos_list.php"><img src="imagens/Icones/back.png" alt="" width="48" height="48" border="0" /></a></td>
          <td width="48"><a href="logout.php"><img src="imagens/Icones/Sair.png" alt="" width="40" height="40" border="0" /></a></td>
        </tr>
      </table>
    </div>
    <div id="divTitulo2">
      <table width="90%" border="0" align="center" cellpadding="0" cellspacing="2">
        <tr>
          <td width="51"><img name="" src="imagens/Icones/add.png" width="48" height="48" alt="" /></td>
          <td width="753"><strong><em>Inclusão de Produtos</em></strong></td>
        </tr>
      </table>
    </div>
    <p>&nbsp;</p>
    <form id="form1" name="form1" method="post" action="produtos_inc_conf.php">
      <table width="100%" border="0" cellpadding="5">
        <tr>
          <td width="20%"><em><strong>Produto Ativo:</strong></em></td>
          <td><p>
            <label>
              <input name="rdbAtivo" type="radio" id="rdbAtivo_0" value="S" checked="checked" />
              Sim</label>
            <br />
            <label>
              <input type="radio" name="rdbAtivo" value="N" id="rdbAtivo_1" />
              Não</label>
            <br />
          </p></td>
        </tr>
        <tr>
          <td><strong><em>Descrição de Produtos:</em></strong></td>
          <td><label for="txtDescricao"></label>
          <textarea name="txtDescricao" id="txtDescricao" cols="45" rows="5"></textarea></td>
        </tr>
        <tr>
          <td><em><strong>Marcas:</strong></em></td>
          <td><label for="cmbMarcas"></label>
            <select name="cmbMarcas" id="cmbMarcas">
              <?php
do {  
?>
              <option value="<?php echo $row_recordMarcas['codigo_mar']?>"><?php echo $row_recordMarcas['nome_mar']?></option>
              <?php
} while ($row_recordMarcas = mysql_fetch_assoc($recordMarcas));
  $rows = mysql_num_rows($recordMarcas);
  if($rows > 0) {
      mysql_data_seek($recordMarcas, 0);
	  $row_recordMarcas = mysql_fetch_assoc($recordMarcas);
  }
?>
          </select></td>
        </tr>
        <tr>
          <td><em><strong>Categorias:</strong></em></td>
          <td><label for="cmbCategorias"></label>
            <select name="cmbCategorias" id="cmbCategorias">
              <?php
do {  
?>
              <option value="<?php echo $row_recordCategorias['codigo_cat']?>"><?php echo $row_recordCategorias['nome_cat']?></option>
              <?php
} while ($row_recordCategorias = mysql_fetch_assoc($recordCategorias));
  $rows = mysql_num_rows($recordCategorias);
  if($rows > 0) {
      mysql_data_seek($recordCategorias, 0);
	  $row_recordCategorias = mysql_fetch_assoc($recordCategorias);
  }
?>
          </select></td>
        </tr>
        <tr>
          <td><strong><em>Imagem do Produto:</em></strong></td>
          <td><label for="txtImagem"></label>
          <input name="txtImagem" type="text" id="txtImagem" size="40" /></td>
        </tr>
        <tr>
          <td><strong><em>Preço Unitario:</em></strong></td>
          <td><input name="txtPrecoUnitario" type="text" id="txtPrecoUnitario" size="40"/></td>
        </tr>
        <tr>
          <td><em><strong>Produto na Página Principal:</strong></em></td>
          <td><p>
            <label>
              <input type="radio" name="rdbPrincipal" value="S" id="rdbPrincipal_0" />
              Sim</label>
            <br />
            <label>
              <input name="rdbPrincipal" type="radio" id="rdbPrincipal_1" value="N" checked="checked" />
              Não</label>
            <br />
          </p></td>
        </tr>
        <tr>
          <td><strong><em>Quantidade de Produtos:</em></strong></td>
          <td><input name="txtQuantidade" type="text" id="txtQuantidade" size="40"/></td>
        </tr>
        <tr>
          <td><strong><em>Resumo de Produtos:</em></strong></td>
          <td><textarea name="txtResumo" id="txtResumo" cols="45" rows="5"></textarea></td>
        </tr>
        <tr>
          <td align="center"><input type="submit" name="button" id="button" value="Incluir" /></td>
          <td width="50%" align="center"><input type="reset" name="button2" id="button2" value="Limpar" /></td>
        </tr>
      </table>
    </form>
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
<?php
mysql_free_result($recordCategorias);

mysql_free_result($recordMarcas);
?>
