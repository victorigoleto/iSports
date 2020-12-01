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
  <div id="divBanner"> <div id="divFundinho">
    <div id="divMenu">
      <table width="200" height="352" border="0">
        <tr>
          <td height="70" bgcolor="#D8E7FA"><p><img src="imagens/Categorias.png" width="198" height="25" border="0" /></p>
            <table width="200" border="0">
              <?php do {?>
              <tr>
                <td>&nbsp;<?php echo $registro_rsCategorias['nome_cat']; ?></td>
              </tr>
              <?php } while($registro_rsCategorias = mysql_fetch_assoc($rsCategorias))?>
              <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td height="70" bgcolor="#D8E7FA"><img src="imagens/Marcas.png" width="198" height="25" />
            <form id="form2" name="form2" method="post" action="">
              <label for="cmbMarcas"></label>
              <select name="cmbMarcas" id="cmbMarcas">
              <?php do {?>
                <option value="<?php echo $registro_rsMarcas['codigo_mar'];?>"><?php echo $registro_rsMarcas['nome_mar'];?></option>
                <?php } while($registro_rsMarcas = mysql_fetch_assoc($rsMarcas))?>
              </select>
          </form></td>
        </tr>
        <tr>
          <td height="128" bgcolor="#D8E7FA"><p><img src="imagens/Cliente.png" width="198" height="25" />
            Meus Dados
            </p>
            <p>Meus Pedidos</p>
            <p> Meu Carrinho</p></td>
        </tr>
      </table>
    </div>
    <div id="divMiolo">
    <?php do {?>
    <div id="divProduto1">
        <table width="230" border="0">
          <tr>
            <td width="147" align="center" bgcolor="#6EA7ED"><?php echo $registro_rsProdutos['descricao_pro']; ?> 
          </tr>
          <tr>
            <td align="center"><img src="admin/imagens/<?php echo $registro_rsProdutos['imagem_pro']; ?> " alt="" width="180" height="230" /></td>
          </tr>
          <tr>
            <td></td>
          </tr>
          <tr>
            <td align="center"><?php echo $registro_rsProdutos['preco_unitario_pro']; ?></td>
          </tr>
          <tr>
            <td align="center"><a href="produtos_det.php?codigo_pro=<?php echo $registro_rsProdutos['codigo_pro']; ?>"><img src="admin/imagens/text_mais_detalhes.gif" width="106" height="20" border="0" /></a></td>
          </tr>
          <tr>
            <td align="center"><img src="itensdotcc/site/Kit Promocional com 1 Raquete de Tênis e 6 Bolinhas_files/bt_comprar_2.jpg" alt="" width="140" height="30" /></td>
          </tr>
          <tr>
            <td align="center">&nbsp;</td>
          </tr>
        </table>
      </div>
      <?php } while($registro_rsProdutos = mysql_fetch_assoc($rsProdutos))?>
 </div>
 <div style="clear:both"></div>
  <p></p>
    </div>
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