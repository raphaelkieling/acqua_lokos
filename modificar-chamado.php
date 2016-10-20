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
		<?php 
		include("estilo.php");
	?>

	</head>

	<body>
		<?php 
		$id_modificar   = $_GET['id_modificar']; 
		$select = mostrarModificar($conexao,$id_modificar);
		while($modificar = mysqli_fetch_assoc($select)){
			
			$id             = $modificar['id'];
			$problema       = $modificar['problema']; 
			$problema_opcao = $modificar['problema_opcao']; 
			$nome           = $modificar['nome']; 
			$criador        = $modificar['criador']; 
			$n0             = $modificar['n0']; 
			$n1             = $modificar['n1']; 
			$n2             = $modificar['n2']; 
			$prazo          = $modificar['prazo']; 
			$data           = $modificar['data']; 
			$datainicial    = $modificar['datainicial']; 
			$hora           = $modificar['hora']; 
			$situacao       = $modificar['situacao']; 
			$status         = $modificar['status']; 
			$descricao      = $modificar['descricao']; 
			
		}
		
	?>
			<form action="sistema/modificar-chamado.php" method="post">
				<!--  Barra de administração onde fica o nome de bem vindo-->
				<center>
					<?php include("header.php");?>
				</center>
				<?php include("menu.php") ?>

					<!-- Aparecer a barra de sucesso quando a pessoa se cadastrar com sucesso -->
					<div class="container section-home">

						<!--		INCLUI A BARRA DE SUCESSO-->
						<?php include("barra-sucesso.php");?>

							<!-- Criar chamados  -->
							<h2>Modificar Chamados</h2>

							<table>
								<tr>
									<th>Criador</th>
									<td>
										<?php 
							echo "<input type='text' readonly name='usuario_c' value=".$nome.">";
					?>
									</td>
									<th>Funcionario</th>
									<td>
										<!-- Select ja determina quem esta logando com a variavel $id_u e comparar com cada select feito se bater com quem
					está logado ele deixa selecionado com a propriedade "selected='selected'" -->
										<select name="funcionario_c" id="">
											<?php 
												$id_modificar = $_GET['id_modificar'];
												$select = mostrarFuncionario($conexao);
												while($funcionario = mysqli_fetch_assoc($select)){ ?>
												<option value="<?php echo $funcionario[ 'nome']; if($funcionario[ 'nome']==$criador) { echo " selected='selected'"; } ?>">
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
						echo "<input type='text' name='data_c' value=".$datainicial.">";
					?>
									</td>
									<th>Hora</th>
									<td>
										<?php  
						echo "<input type='text' name='hora_c' value=".$hora.">";
					?>
									</td>
								</tr>
								<tr>
									<th>N0</th>
									<td>
										<select name="n0_c" id="">
											<option value="<?= $n0?>">
												<?= $n0?>
											</option>
											<option value="TI">TI</option>
											<option value="Reservas / Agendamento">Reservas / Agendamento</option>
										</select>
									</td>
									<th>N1</th>
									<td>
										<select name="n1_c" id="">
											<option value="<?= $n1?>">
												<?= $n1?>
											</option>
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
											<option value="<?= $n2?>">
												<?= $n2?>
											</option>
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
										<?php 
						if($problema_opcao == "Defeito"){
							$defeito = true;
						}else{
							$defeito = false;
						}
					?>
											<input name="tipoProblema" value="Problema" type="radio" <?php if($defeito==true){echo "checked";}?>>

									</td>
									<td>
										Dúvida:
										<input name="tipoProblema" value="Dúvida" type="radio" <?php if($defeito==false){echo "checked";}?>>
									</td>

								</tr>
								<tr>
									<td>Status:</td>
									<td>
										<select name="status" id="">
											<?php 
							echo "<option value='$status' selected>$status</option>";
						?>
												<option value="Verificando">Verificando</option>
												<option value="Concluido">Concluido</option>
												<option value="Andamento">Andamento</option>

										</select>
									</td>
									<td>ID Chamado</td>
									<td>
										<?php
											echo "<input type='text' readonly name='id_mod' value=".$id.">";
										?>
									</td>

								</tr>
								<tr>
									<th>Problema(Curto)</th>
									<td colspan="3">
										<input type="text" placeholder="Ex: Lentidão no Computador" name="problema_c" value="<?= $problema ?>" required>
									</td>
								</tr>
								<tr>
									<th>Descrição</th>
									<td colspan="3">
										<textarea name="descricao_c" id="" cols="5" rows="5" required>
											<?= $descricao ?>
										</textarea>
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