<?php
// Change the FALSE to TRUE to disable installer, and vise-versa.
$disabled = FALSE;

if($disabled == TRUE)
{
	echo "Instalador desativado. Por favor o edite /install/install_pt.php para reativar o instalador";
	die();
}

function output_message($type, $text)
{
    echo "<div class=\"".$type."\">$text</div>";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
	<title>MangosWeb SkyFire Instalador</title>
	<link rel="stylesheet" href="css/main.css" type="text/css"/>
</head>
<body>
	<div id="header">					
		<h1 id="title"><center><img src="images/logo.png" width="240" /></center></h1>
	</div>
	<div class="page">
		<div class="content">				
			<div class="content-header">
			<?php
				if(isset($_GET['step']))
				{
					$step = $_GET['step'];
				}
				else
				{
					$step = 1;
				}
				echo "<h4><center>Passo ".$step."</center></h4>";
				echo "</div> <!-- .content-header -->";
				if($step == 1)
				{
			?>		
					<!-- STEP 1 -->
					<form method="POST" action="install_pt.php?step=2" class="form label-inline">
					<div class="main-content">		
						<p>
							Bem-vindo ao Instalador MangosWeb SkyFire! Antes de nós começarmos o proccess de instalação, nós precisamos ter certeza seu
							servidor de teia é compatível com MangosWeb. Por favor clique em iniciar no fundo começar.
						</p>
						<div class="buttonrow-border">								
							<center><button><span>Start</span></button></center>			
						</div>
						<div class="clear"></div>
					</div> <!-- .main-content -->
					</form>
			<?php
				} 
				elseif($step == 2)
				{
					// Initialize the no good tracker
					$nogood = 0;
					if(phpversion() < 5.2)
					{
						$phpver = "<img src='images/x.png' height='18px' width='18px' />";
						$nogood++;
					}
					else
					{
						$phpver = "<img src='images/check.png' height='18px' width='18px' />";
					}
					if(is_writable('../config/config.php') == TRUE)
					{
						$config_writable = "<img src='images/check.png' height='18px' width='18px' />";
					}
					else
					{
						$config_writable = "<img src='images/x.png' height='18px' width='18px' />";
						$nogood++;
					}
					if(is_writable('../config/config-protected.php') == TRUE)
					{
						$config_protected_writable = "<img src='images/check.png' height='18px' width='18px' />";
					}
					else
					{
						$config_protected_writable = "<img src='images/x.png' height='18px' width='18px' />";
						$nogood++;
					}
					if(is_writable('../core/cache') == TRUE)
					{
						$core_writable = "<img src='images/check.png' height='18px' width='18px' />";
					}
					else
					{
						$core_writable = "<img src='images/x.png' height='18px' width='18px' />";
						$nogood++;
					}
					if(ini_get('allow_url_fopen') == '1')
					{
						$allow_url_fopen = "<img src='images/check.png' height='18px' width='18px' />";
					}
					else
					{
						$allow_url_fopen = "<img src='images/x.png' height='18px' width='18px' />";
						$nogood++;
					}
					if(function_exists("fsockopen")) 
					{
						$fsock = "<img src='images/check.png' height='18px' width='18px' />";
					}
					else
					{
						$fsock = "<img src='images/x.png' height='18px' width='18px' />";
						$nogood++;
					}
				?>
					<!-- STEP 2 -->
					<form method="POST" action="install_pt.php?step=3" class="form label-inline">
					<div class="main-content">		
						<p>
							If you see any red X's here, then your server will not run MangosWeb v3.<br /><br />
							PHP Version:  <?php echo phpversion()." ".$phpver; ?><br />
							Config.php Writable by Webserver  <?php echo $config_writable; ?><br />
							Config-protected.php Writable by Webserver  <?php echo $config_protected_writable; ?><br />
							Cache ("core/cache/") Writable by Webserver  <?php echo $config_protected_writable; ?><br />
							Allow URL Open (Fopen)  <?php echo $allow_url_fopen; ?><br />
							Fsockopen Enabled  <?php echo $fsock; ?><br />
						</p>
						<div class="buttonrow-border">
							<?php
								if($nogood == 0)
								{ 
									echo "<center><button><span>Continuar para o passo 3</span></button></center>";
								}
								else
								{
									echo "<center><font color='red'> Desculpe, Mas você não Pode ir para Passo 3. </font></center>";
								}
							?>
						</div>
						<div class="clear"></div>
					</div> <!-- .main-content -->
					</form>
			<?php
				}
				elseif($step == 3)
				{ ?>
					<!-- STEP 3 -->
					<form method="POST" action="install_pt.php?step=4" class="form label-inline">
					<div class="main-content">		
						
						<div class="field">
							<label for="db user">Servidor MySQL:</label>
							<input id="Site Title" name="db_host" size="20" type="text" class="medium" value="localhost" />
							<p class="field_help">Digite o nome do Servidor MySQL.</p>
						</div>
						
						<div class="field">
							<label for="db user">Porta do MySQL: </label>
							<input id="Site Title" name="db_port" size="20" type="text" class="medium" value="3306" />
							<p class="field_help">Digite a porta do Servidor MySQL.</p>
						</div>
						
						<div class="field">
							<label for="db user">Usúario do MySQL: </label>
							<input id="Site Title" name="db_username" size="20" type="text" class="medium" value="skyfire" />
							<p class="field_help">Digite o nome usúario do MySQL.</p>
						</div>
						
						<div class="field">
							<label for="db user">Senha do MySQL: </label>
							<input id="Site Title" name="db_password" size="20" type="password" class="medium" value="skyfire"/>
							<p class="field_help">Digite a senha de usúario do MySQL.</p>
						</div>
						
						<div class="field">
							<label for="db user">Banco de Dados Auth: </label>
							<input id="Site Title" name="db_name" size="20" type="text" class="medium" value="auth" />
							<p class="field_help">Digite o nome do Banco de Dados de Reino.</p>
						</div>
						
						<div class="buttonrow-border">								
							<center><button><span>Instalar Banco Dados </span></button></center><br />
							<center><button name="skip" class="btn-sec"><span>Pular instalação de Banco de Dados</span></button></center>							
						</div>
						<div class="clear"></div>
					</div> <!-- .main-content -->
					</form>				
			<?php
				}
				elseif($step == 4)
				{
					// Check if everything is given
					if (!$_POST['db_host'] | !$_POST['db_port'] | !$_POST['db_username'] | !$_POST['db_password'] | !$_POST['db_name']) 
					{
						echo '<div class="error">One or more fields are blank. Please <a href="javascript: history.go(-1)">Go Back</a> and correct it.</div>';
						die();
					}
					// Check if provided info is correct
					@mysql_connect($_POST['db_host'].":".$_POST['db_port'], $_POST['db_username'], $_POST['db_password']) 
						or die('<div class="error">Couldn\'t connect to MySQL Database. Please <a href="javascript: history.go(-1)">Go Back</a> and re-enter MySQL Database Information.<br /><br />MySql error log:<br />
							'.mysql_error().'</div');
					mysql_select_db($_POST['db_name']) 
						or die('<div class="error">Counld Not select Realm database! Please go back and re-submit realm DB information.</div>');
					
					output_message('success', 'Conectado com sucesso ao Banco de Dados de Reino.');
					
					// Check if "account" table exsists, so we make (almost) sure mangos is actually installed (which is necesarry for this whole thing to work)
					@mysql_query("SELECT * FROM `account` LIMIT 1") or die('<div class="error">Error!<br /><br />Account table not found! Cannot Continue with the installation without an Account
						table!<br /><br />MySql error log:<br />'.mysql_error().'</div>');
					
					// Everthing should be fine, so first insert info into protected config file
					$conffile = "../config/config-protected.php";
					$build = '';
					$build .= "<?php\n";
					$build .= "\$db = array(\n";
					$build .= "'db_host'         => '".$_POST['db_host']."',\n";
					$build .= "'db_port'         => '".$_POST['db_port']."',\n";
					$build .= "'db_username'     => '".$_POST['db_username']."',\n";
					$build .= "'db_password'     => '".$_POST['db_password']."',\n";
					$build .= "'db_name'         => '".$_POST['db_name']."',\n";
					$build .= "'db_encoding'     => 'utf8',\n";
					$build .= ");\n";
					$build .= "?>";
					
					if (is_writeable($conffile))
					{
						$openconf = fopen($conffile, 'wb');
						fwrite($openconf, $build);
						fclose($openconf);
					}
					else 
					{ 
						output_message('error', 'Couldn\'t open config-protected.php for editing, it must be writable by webserver! <br />Go back, and try again.');
						die();
					}
								
					// Preparing for sql injection... (prashing, etc...)
					$checker = @mysql_query("SELECT * FROM `account_extend` LIMIT 1");
					if(!isset($_POST['skip']))
					{
						// Dealing with the full install sql file
						$sqlopen = @fopen("sql/full_install.sql", "r");
						if ($sqlopen) 
						{
							while (!feof($sqlopen)) 
							{
								$queries[] = fgets($sqlopen);
							}
							fclose($sqlopen);
						}
						else 
						{
							output_message('error', 'Couldn\'t open file full_install.sql. Check if it\'s presented in wwwroot/sql/ and if it\'s readable by webserver!');
							$errmsg = error_get_last();
							echo "<br /><br />PHP error log:<br />".$errmsg['message'];
							exit();
						}
						foreach ($queries as $key => $aquery) 
						{
							if (trim($aquery) == "" || strpos ($aquery, "--") === 0 || strpos ($aquery, "#") === 0) 
							{
								unset($queries[$key]);
							}
						}
						unset($key, $aquery);

						foreach ($queries as $key => $aquery) 
						{
							$aquery = rtrim($aquery);
							$compare = rtrim($aquery, ";");
							if ($compare != $aquery) 
							{
								$queries[$key] = $compare . "|br3ak|";
							}
						}
						unset($key, $aquery);

						$queries = implode($queries);
						$queries = explode("|br3ak|", $queries);

						// Sql injection
						foreach ($queries as $query) 
						{
							mysql_query($query);
						}
					}
					$get_name = mysql_query("SELECT `name` FROM `realmlist` WHERE `id`=1 LIMIT 1") or die('<div class="error">'.mysql_error().'</div>');
					$DB_name = mysql_result($get_name,0);
				?>
				<!-- STEP 4 -->
					<form method="POST" action="install_pt.php?step=5" class="form label-inline">
						<input type="hidden" name="db_host" value="<?php echo $_POST['db_host']; ?>">
						<input type="hidden" name="db_port" value="<?php echo $_POST['db_port']; ?>">
						<input type="hidden" name="db_name" value="<?php echo $_POST['db_name']; ?>">
						<input type="hidden" name="db_username" value="<?php echo $_POST['db_username']; ?>">
						<input type="hidden" name="db_password" value="<?php echo $_POST['db_password']; ?>">					
					<div class="main-content">
						<div>
							Para que MangosWeb SkyFire funcione corretamente, nós precisamos de 1 reino pelo menos para ter sua informação armazenada corretamente no Banco de dados.
							Por favor preencha a informação para o reino "<u><b><?php echo $DB_name; ?></b></u>" corretamente
						</div>
						<table>
							<thead>
								<th><center>Informação de Banco de dados do Personagem (<?php echo $DB_name; ?>)</center></th>
							</thead>
						</table>
						<br />
						
						<!-- Character DB Info -->
						
						<div class="field">
							<label for="db user">Servidor MySQL: </label>
							<input id="Site Title" name="char_db_host" size="20" type="text" class="medium" value="localhost" />
							<p class="field_help">Digite o nome do Servidor MySQL.</p>
						</div>
						
						<div class="field">
							<label for="db user">Porta do MySQL: </label>
							<input id="Site Title" name="char_db_port" size="20" type="text" class="medium" value="3306" />
							<p class="field_help">Digite a porta do Servidor MySQL.</p>
						</div>
						
						<div class="field">
							<label for="db user">Usuário do MySQL: </label>
							<input id="Site Title" name="char_db_username" size="20" type="text" class="medium" value="skyfire" />
							<p class="field_help">Digite o nome usuário do MySQL.</p>
						</div>
						
						<div class="field">
							<label for="db user">Senha do MySQL: </label>
							<input id="Site Title" name="char_db_password" size="20" type="password" class="medium" value="skyfire"/>
							<p class="field_help">Digite a senha de usuário do MySQL.</p>
						</div>
						
						<div class="field">
							<label for="db user">Banco de Dados Character: </label>
							<input id="Site Title" name="char_db_name" size="20" type="text" class="medium" value="characters" />
							<p class="field_help">Digite o nome do Banco de Dados de Personagem.</p>
						</div>
						
						<table>
							<thead>
								<th><center>Informação de Banco de dados do Mundo (<?php echo $DB_name; ?>)</center></th>
							</thead>
						</table>
						<br />
						
						<!-- WORLD DB Info -->
						
						<div class="field">
							<label for="db user">Servidor MySQL: </label>
							<input id="Site Title" name="w_db_host" size="20" type="text" class="medium" value="localhost" />
							<p class="field_help">Digite o nome do Servidor MySQL.</p>
						</div>
						
						<div class="field">
							<label for="db user">Porta do MySQL: </label>
							<input id="Site Title" name="w_db_port" size="20" type="text" class="medium" value="3306" />
							<p class="field_help">Digite a porta do Servidor MySQL.</p>
						</div>
						
						<div class="field">
							<label for="db user">Usuário do MySQL: </label>
							<input id="Site Title" name="w_db_username" size="20" type="text" class="medium" value="skyfire" />
							<p class="field_help">Digite o nome usuário do MySQL.</p>
						</div>
						
						<div class="field">
							<label for="db user">Senha do MySQL: </label>
							<input id="Site Title" name="w_db_password" size="20" type="password" class="medium" value="skyfire"/>
							<p class="field_help">Digite a senha de usuário do MySQL.</p>
						</div>
						
						<div class="field">
							<label for="db user">Banco de Dados World: </label>
							<input id="Site Title" name="w_db_name" size="20" type="text" class="medium" value="world" />
							<p class="field_help">Digite o nome do Banco de Dados de Mundo.</p>
						</div>
						
						<div class="buttonrow-border">								
							<center><button><span>Configuar MangosWeb Skyfire</span></button></center><br />							
						</div>
						<div class="clear"></div>
						
					</div>
					</form>
				
				<!-- STEP 5 -->
				<?php
				}
				elseif($step == 5)
				{
					@mysql_connect($_POST['char_db_host'].":".$_POST['char_db_port'], $_POST['char_db_username'], $_POST['char_db_password']) 
						or die('<div class="error">Couldn\'t connect to the character MySQL Database. Please <a href="javascript: history.go(-1)">Go Back</a> and re-enter MySQL Database Information.</div>');
					@mysql_select_db($_POST['char_db_name']) or die('<div class="error">Couldn\'t select Characters db, most likely the given name is wrong. Please <a href="javascript: history.go(-1)">Go Back</a> and correct it.</div>');
					
					@mysql_connect($_POST['w_db_host'].":".$_POST['w_db_port'], $_POST['w_db_username'], $_POST['w_db_password']) 
						or die('<div class="error">Couldn\'t connect to the world MySQL Database. Please <a href="javascript: history.go(-1)">Go Back</a> and re-enter MySQL Database Information.</div>');
					@mysql_select_db($_POST['w_db_name']) or die('<div class="error">Couldn\'t select World db, most likely the given name is wrong. Please <a href="javascript: history.go(-1)">Go Back</a> and correct it.</div>');
					
					@mysql_connect($_POST['db_host'].":".$_POST['db_port'], $_POST['db_username'], $_POST['db_password']);
					@mysql_select_db($_POST['db_name']) or die('Unable to select Realm Database!');
					
					// Extra sql query with db settings
					$dbinfo = $_POST['char_db_host'].";".$_POST['char_db_port'].";".$_POST['char_db_username'].";".$_POST['char_db_password'].";".$_POST['char_db_name'].";".$_POST['w_db_host'].";".$_POST['w_db_port'].";".$_POST['w_db_username'].";".$_POST['w_db_password'].";".$_POST['w_db_name'].";";
					mysql_query("UPDATE `realmlist` SET `dbinfo` = '".$dbinfo."', `site_enabled`=1 WHERE `id` = 1 LIMIT 1") or die('<div class="error">'.mysql_error().'</div>');
					
					output_message('success', 'Conectado com sucesso aos Banco de Dados de Personagem e Mundo');
				?>
					<form method="POST" action="install_pt.php?step=6" class="form label-inline">
					<input type="hidden" name="db_host" value="<?php echo $_POST['db_host']; ?>">
					<input type="hidden" name="db_port" value="<?php echo $_POST['db_port']; ?>">
					<input type="hidden" name="db_name" value="<?php echo $_POST['db_name']; ?>">
					<input type="hidden" name="db_username" value="<?php echo $_POST['db_username']; ?>">
					<input type="hidden" name="db_password" value="<?php echo $_POST['db_password']; ?>">
					
					<div class="main-content">		
						<p>
							Por favor crie uma conta de administrador. Se você já tiver uma conta, então digite sua informação para efetuar o logon, para
                            que possa ser adicionado como administrador do site.
						</p>
						
						<div class="field">
							<label for="user">Usuário: </label>
							<input id="user" name="account" size="20" type="text" class="medium"/>
						</div>
						
						<div class="field">
							<label for="pass">Senha: </label>
							<input id="pass" name="pass" size="20" type="password" class="medium"/>
						</div>
						
						<div class="field">
							<label for="pass2">Reopetir Senha: </label>
							<input id="pass2" name="pass2" size="20" type="password" class="medium"/>
						</div>
						
						<div class="buttonrow-border">								
							<center><button><span>Submit</span></button></center>			
						</div>
						<div class="clear"></div>
					</div> <!-- .main-content -->
					</form>
			<?php 
				}
				elseif($step == 6)
				{
					if($_POST['pass'] != $_POST['pass2'])
					{
						die('<div class="error">Passwords dont match!. Please <a href="javascript: history.go(-1)">go back</a> and correct it.</div>');
					}
					if (!$_POST['account']) 
					{
						die('<div class="error">No account name was given. Please <a href="javascript: history.go(-1)">go back</a> and correct it.</div>');
					}
					//Password hash generator
					function sha_password($user, $pass)
					{
						$user = strtoupper($user);
						$pass = strtoupper($pass);
						return SHA1($user.':'.$pass);
					}
					mysql_connect($_POST['db_host'].":".$_POST['db_port'], $_POST['db_username'], $_POST['db_password']);
					mysql_select_db($_POST['db_name']);
					
					$accountid = mysql_query("SELECT `id` FROM `account` WHERE `username` LIKE '".$_POST['account']."'");
					$checkacc = mysql_num_rows($accountid);
					if ($checkacc == 1) 
					{
						// Account exsist
						$accountid = mysql_fetch_assoc($accountid);
						mysql_query("UPDATE `mw_account_extend` SET `account_level` = '4' WHERE `account_id` = ".$accountid['id']." LIMIT 1 ;");
						$return = 1;
						}
					else 
					{
						// No such account, creating one, in this case pwd is needed, so checking whether it's provided...
						$password = sha_password($_POST['account'], $_POST['pass']);
						mysql_query("INSERT INTO `account` (`username`, `sha_pass_hash`) VALUES ('".$_POST['account']."', '".$password."' );");
						$accountid = mysql_query("SELECT `id` FROM `account` WHERE `username` LIKE '".$_POST['account']."'");
						$acct = mysql_fetch_assoc($accountid);
						mysql_query("INSERT INTO `mw_account_extend` (`account_id`, `account_level`) VALUES ('".$acct['id']."', '4')");
						$return = 2;
					}
				?>
				<div class="main-content">		
					<p>
						<?php if($return > 0)
						{ ?>
							Parabéns! MangosWeb SkyFire está instalado e pronto para uso. Por favor, faça o login e visite o painel de administração para configurar melhor o MangosWeb SkyFire.
                            Além disso, lembre-se de <u><b>Editar o arquivo de instalação (install/install_pt.php)</b></u>. Defina o FALSE para TRUE na linha 3 para evitar que
                            usuários ou hackers invadam seu MangosWeb SkyFire.<br /><br /><a href="../index.php">Clique aqui</a> Para ir para a página inicial MangosWeb SkyFire.
						<?php
						} ?>
					</p>
				</div>
			<?php
				} ?>				
		</div> <!-- .content -->
		<div id="footer">
			<center>
			<p>
				Modelo originalmente projetado por Rod Creative, Modificado por Wilson212 para MangosWeb e atualizado para SkyFire por gldss creative.<br /> 
			</p>
			</center>
		</div>
	</div>
</body>
</html>