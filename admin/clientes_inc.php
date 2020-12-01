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
          <td width="672"><strong><em>Clientes</em></strong></td>
          <td width="48"><a href="clientes_list.php"><img src="imagens/Icones/back.png" alt="" width="48" height="48" border="0" /></a></td>
          <td width="48"><a href="logout.php"><img src="imagens/Icones/Sair.png" alt="" width="40" height="40" border="0" /></a></td>
        </tr>
      </table>
    </div>
    <div id="divTitulo2">
      <table width="90%" border="0" align="center" cellpadding="0" cellspacing="2">
        <tr>
          <td width="51"><img name="" src="imagens/Icones/add.png" width="48" height="48" alt="" /></td>
          <td width="753"><strong><em>Inclusão de Clientes</em></strong></td>
        </tr>
      </table>
    </div>
    <p>&nbsp;</p>
    <form id="form1" name="form1" method="post" action="clientes_inc_conf.php">
      <table width="100%" border="0" cellpadding="5">
        <tr>
          <td width="20%"><em><strong>Nome do Cliente:</strong></em></td>
          <td><label for="txtNomeClientes"></label>
            <input name="txtNomeClientes" type="text" id="txtNomeClientes" size="40"/></td>
        </tr>
        <tr>
          <td><strong><em>Celular do Cliente:</em></strong></td>
          <td><input name="txtCelularClientes" type="text" id="txtCelularClientes" size="40"/></td>
        </tr>
        <tr>
          <td><strong><em>Telefone do Cliente:</em></strong></td>
          <td><input name="txtTelefoneClientes" type="text" id="txtTelefoneClientes" size="40"/></td>
        </tr>
        <tr>
          <td><strong><em>Bairro do Cliente:</em></strong></td>
          <td><input name="txtBairroClientes" type="text" id="txtBairroClientes" size="40"/></td>
        </tr>
        <tr>
          <td><strong><em>Endereço do Cliente:</em></strong></td>
          <td><input name="txtEnderecoClientes" type="text" id="txtEnderecoClientes" size="40"/></td>
        </tr>
        <tr>
          <td><strong><em>Cidade do Cliente:</em></strong></td>
          <td><input name="txtCidadeClientes" type="text" id="txtCidadeClientes" size="40"/></td>
        </tr>
        <tr>
          <td><strong><em>Estado do Cliente:</em></strong></td>
          <td><input name="txtEstadoClientes" type="text" id="txtEstadoClientes" size="40"/></td>
        </tr>
        <tr>
          <td><em><strong>Cep do Cliente:</strong></em></td>
          <td><input name="txtCepClientes" type="text" id="txtCepClientes" size="40"/></td>
        </tr>
        <tr>
          <td><strong><em>Cpf do Cliente:</em></strong></td>
          <td><input name="txtCpfClientes" type="text" id="txtCpfClientes" size="40"/></td>
        </tr>
        <tr>
          <td><strong><em>Rg do Cliente:</em></strong></td>
          <td><input name="txtRgClientes" type="text" id="txtRgClientes" size="40"/></td>
        </tr>
        <tr>
          <td><strong><em>Email do Cliente:</em></strong></td>
          <td><input name="txtEmailClientes" type="text" id="txtEmailClientes" size="40"/></td>
        </tr>
        <tr>
          <td><strong><em>Observações do Cliente:</em></strong></td>
          <td><label for="txtObservacoesClientes"></label>
            <textarea name="txtObservacoesClientes" id="txtObservacoesClientes" cols="45" rows="5"></textarea></td>
        </tr>
        <tr>
          <td><strong><em>Ativo Cliente:</em></strong></td>
          <td><input name="txtAtivoClientes" type="text" id="txtAtivoClientes" size="40"/></td>
        </tr>
        <tr>
          <td><strong><em>Senha do Cliente:</em></strong></td>
          <td><input name="txtSenhaClientes" type="text" id="txtSenhaClientes" size="40"/></td>
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
