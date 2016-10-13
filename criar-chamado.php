<?php 
	//nome chamado
	//data chamado
	//cat  chamado
	//prazo determinado
	//hora chamado
	//status chamado
	//descricao chamado
	//nome criado
	//ip criador
	include('sistema/logar.php');
	session_start();
	if(isset($_SESSION['id'])){
		$id_u = $_SESSION['id'];?>
		<!-- Caso exista um usuario ele faz tudo se nao, ele sai -->
<head>
	<!-- Estilo da pagina -->
	<?php include("estilo.php") ?>

</head>
<body>
		<form action="sistema/criar-chamado.php" method="post">
		<!--  Barra de administração onde fica o nome de bem vindo-->
		<center> <?php include("header.php");?> </center>
		<?php include("menu.php") ?>
		
		<!-- Aparecer a barra de sucesso quando a pessoa se cadastrar com sucesso -->
		<div class="container section-home">
				<?php 
				if(isset($_GET['sucesso'])=="1"){
					echo "<div class='yes'>Sucesso</div>";
				}else if(isset($_GET['cadastrado'])=="2"){
					echo "<div class='no'>Ocorreu um erro</div>";
				}
			 ?>
			<!-- Criar chamados  -->
			<h2>Criar Chamados</h2>

			<table>
				<tr>
					<th>Criador</th>
					<td>
						
						<?php 
							$select = mostrarUsuarioE($conexao,$id_u);
							while($usuario = mysqli_fetch_assoc($select)){
								echo "<input type='text' readonly name='usuario_c' value=".$usuario['nome'].">";
							}
						?>
					</td>
					<th>Funcionario</th>
					<td>
						<!-- Select ja determina quem esta logando com a variavel $id_u e comparar com cada select feito se bater com quem
						está logado ele deixa selecionado com a propriedade "selected='selected'" -->
						<select name="funcionario_c" id="">
						<?php 
						$select = mostrarFuncionario($conexao);
						while($funcionario = mysqli_fetch_assoc($select)){ ?>
							<option value= <?php  echo $funcionario['nome']; 
							if($funcionario['id']==$id_u)
								{
									echo " selected='selected'";
								} ?>> 
							<?php echo $funcionario['nome']?>
							</option>;

						<?php } ?>
						</select>
					</td>
				</tr>
				<tr>
					<th>Data</th>
					<td>
						<?php 
							$data = date('d/m/y');
							echo "<input type='text' name='data_c' readonly value=".$data.">";
						?>
					</td>
					<th>Hora</th>
					<td>
						<?php  
							date_default_timezone_set('America/Sao_Paulo');
							$hora = date('H:i');
							echo "<input type='text' name='hora_c' readonly value=".$hora.">";
						?>
					</td>
				</tr>
				<tr>
					<th>N0</th>
					<td>
						<select name="n0_c" id="">
							<option value="TI">TI</option>
							<option value="Reservas / Agendamento">Reservas / Agendamento</option>
						</select>
					</td>
					<th>N1</th>
					<td>
					<select name="n1_c" id="">
						<option value="">----TI----</option>
						<option value="Hardware">Hardware</option>
						<option value="Sistemas">Sistemas</option>
						<option value="Windows e aplicativos">Windows e aplicativos</option>
						<option value="Rede / Internet">Rede / Internet</option>
						<option value="Telefonia">Telefonia</option>
						<option value="">----RESERVAS----</option>
						<option value="Boleto">Boleto</option>
						<option value="Cartão">Cartão</option>
						<option value="Reservas">Reservas</option>
						<option value="Devoluções">Devoluções</option>
						<option value="Comissões">Comissões</option>
					</select>
					</td>
				</tr>
				<tr>
					<th>N2</th>
					<td>
						<select name="n2_c" id="">
							<option value="">----Hardware---</option>
							<option value="Microcomputadores">Microcomputadores</option>
							<option value="Impressoras">Impressoras</option>
							<option value="Impressoras de ingressos">Impressoras de ingressos</option>
							<option value="Catracas">Catracas</option>
							<option value="Servidor">Servidor</option>
							<option value="Celular / Smartphone">Celular / Smartphone</option>
							<option value="Outros equipamentos">Outros equipamentos</option>

							<option value="">----Sitemas----</option>
							<option value="Automatise Sis">Automatise Sis</option>
							<option value="Venda Fácil">Venda Fácil</option>
							<option value="Queóps Cosmos">Queóps Cosmos</option>
							<option value="Queóps Eventos">Queóps Eventos</option>
							<option value="Queóps Touchpark">Queóps Touchpark</option>
							<option value="Outros sistemas">Outros sistemas</option>
							<option value="Logins e Senhas">Logins e Senhas</option>
							<option value="Bug">Bug</option>

							<option value="">----Windows e aplicativos----</option>
							<option value="Windows">Windows</option>
							<option value="Office">Office</option>
							<option value="Outlook / Email">Outlook / Email</option>
							<option value="Navegadores (Chrome, Firefox, Internet Explorer)">Navegadores (Chrome, Firefox, Internet Explorer)</option>
							<option value="Outros aplicativos do Windows">Outros aplicativos do Windows</option>

							<option value="">----Rede / Internet----</option>
							<option value="Internet via cabo">Internet via cabo</option>
							<option value="Wi-Fi">Wi-Fi</option>
							<option value="Outros chamados de rede">Outros chamados de rede</option>

							<option value="">----Telefonia---</option>
							<option value="Telefonia fixa">Telefonia fixa</option>
							<option value="Telefonia móvel">Telefonia móvel</option>
							<option value="Outros chamados de telefonia">Outros chamados de telefonia</option>

							<option value=""></option>
							<option value=""></option>
							<option value=""></option>

							<option value="">----Boleto----</option>
							<option value="Emissão de boletos">Emissão de boletos</option>
							<option value="Postergação de boletos">Postergação de boletos</option>
							<option value="Cancelamento de boletos">Cancelamento de boletos</option>
							<option value="Verificação de pagamentos">Verificação de pagamentos</option>
							<option value="Outras questões referente a boletos">Outras questões referente a boletos</option>

							<option value="">----Cartão----</option>
							<option value="Cobranças com cartão de crédito">Cobranças com cartão de crédito</option>
							<option value="Envio de comprovantes">Envio de comprovantes</option>
							<option value="Outros chamados de cartão de crédito">Outros chamados de cartão de crédito</option>

							<option value="">----Reservas----</option>
							<option value="Criação de reservas">Criação de reservas</option>
							<option value="Modificação de reservas">Modificação de reservas</option>
							<option value="Cancelamento de reservas">Cancelamento de reservas</option>
							<option value="Outros assuntos referente a reservas">Outros assuntos referente a reservas</option>

							<option value="">----Devoluções----</option>
							<option value="Devoluções">Devoluções</option>
							<option value="Outros assuntos referente a devoluções">Outros assuntos referente a devoluções</option>

							<option value="">----Comissões----</option>
							<option value="Solicitar ajuste de comissão ao comitê">Solicitar ajuste de comissão ao comitê</option>
							<option value="Outros assuntos de comissões">Outros assuntos de comissões</option>
				
						</select>
					</td>
					<td>
						Defeito:
						<input name="tipoProblema" value="Defeito" type="radio" required>
					</td>
					<td>
						Dúvida:
						<input name="tipoProblema" value="Dúvida" type="radio" required>
					</td>
				</tr>
				<tr>
					<th>Problema(Curto)</th>
					<td colspan="3"><input type="text" placeholder="Ex: Lentidão no Computador" name="problema_c" required></td>
				</tr>
				<tr>
					<th>Descrição</th>
					<td colspan="3">
						<textarea name="descricao_c" id="" cols="30" rows="10" required></textarea>
					</td>
				</tr>
				<tr>
					<td></td>
					<td colspan="3">
						<input type="submit">
					</td>
				</tr>
			</table>

		</div>
		</form>
</body>

<?php 
	}else{
		unset($_SESSION['id']);
		header("location:index.php");
	}
?>

