<?php require_once('../Connections/conexao.php'); ?>
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
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['txtNome'])) {
  $loginUsername=$_POST['txtNome'];
  $password=$_POST['txtSenha'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "index.php";
  $MM_redirectLoginFailed = "acessonegado.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_conexao, $conexao);
  
  $LoginRS__query=sprintf("SELECT nome_usu, senha_usu FROM tabusuarios WHERE nome_usu=%s AND senha_usu=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $conexao) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}

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
          <td width="51"><img name="" src="imagens/Icones/PainelControl.png" width="48" height="48" alt="" /></td>
          <td width="753">Acesso ao Sistema Interno de Gerenciamento</td>
        </tr>
      </table>
    </div>
    <p>&nbsp;</p>
    <form id="frmLogin" name="frmLogin" method="POST" action="<?php echo $loginFormAction; ?>">
      <table width="400" border="1" align="center">
        <tr>
          <td width="184">Usuario:</td>
          <td width="200"><label for="txtNome"></label>
          <input name="txtNome" type="text" id="txtNome" size="40" /></td>
        </tr>
        <tr>
          <td>Senha:</td>
          <td><label for="txtSenha"></label>
          <input type="text" name="txtSenha" id="txtSenha" /></td>
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