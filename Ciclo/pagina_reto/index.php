<?php 

	$conexion=mysqli_connect('localhost','root','','prueba');

 ?>


<!DOCTYPE html>
<html>
<head>
	<title>mostrar datos</title>
	<link rel="stylesheet" type="text/css" href="estilos.css">
	<script src="funciones.js"></script>
</head>

<body>
	<header>
		<div class="logo">
			<img src="kueskilogo.png" alt="Logo de la empresa">
		</div>
		<div class="title">
			<h1>Welcome Back, Marci</h1>
		</div>
	</header>
	<main>
		<div class="sidebar">
			<ul>
				<li><a href="#">Clients</a></li>
				<li><a href="#">Checkout</a></li>
				<li><a href="#">Settings</a></li>
			</ul>
		</div>
			<table>
				<tr>
				<th>User Id</th>
				<th>email</th>
				<th>Name</th>
				<th>First Last Name</th>
				<th>Second Last Name</th>
				<th>CURP</th>
				<th>RFC</th>
				<th>Actions</th>
				</tr>

				<?php 
				$sql="SELECT * from tabla_usuarios";
				$result=mysqli_query($conexion,$sql);

				while($mostrar=mysqli_fetch_array($result)){
				?>

				<tr>
					<td><?php echo $mostrar['user_id'] ?></td>
					<td><?php echo $mostrar['email'] ?></td>
					<td><?php echo $mostrar['name'] ?></td>
					<td><?php echo $mostrar['first_last_name'] ?></td>
					<td><?php echo $mostrar['second_last_name'] ?></td>
					<td><?php echo $mostrar['CURP'] ?></td>
					<td><?php echo $mostrar['RFC'] ?></td>
					<td><button class="action-btn" onclick="showOptions()">...</button></td>

				</tr>
			<?php 
			}
			?>
			</table>
			<!-- Agrega el código HTML/PHP para los botones en la tabla -->
			<td>
				<div id="options-popup" class="popup">
					<div class="popup-content">
						<button onclick="showRectificationPopup()">Rectificación</button>
						<button onclick="showCancellationPopup()">aaaaa</button>
						<button onclick="showOppositionPopup()">Oposición</button>
						<button class="popup-close" onclick="hideOptions()">&times;</button>
					</div>
				</div>
				<!-- Popup para rectificación -->
				<div id="rectification-popup" class="modal" style="display: none;">
					<div class="modal-content">
						<h2>Formulario de rectificación</h2>
						<form>
							<label for="name">Nombre:</label>
							<input type="text" id="name" name="name" required>
							<label for="comment">Comentario:</label>
							<textarea id="comment" name="comment" required></textarea>
							<button type="submit">Enviar</button>
						</form>
						<button onclick="hideRectificationPopup()">Cerrar</button>
					</div>
				</div>
				<!-- Popup para cancelación -->
				<div id="cancellation-popup" class="modal" style="display: none;">
					<div class="modal-content">
						<h2>Formulario de cancelación</h2>
						<form>
							<label for="name">Nombre:</label>
							<input type="text" id="name" name="name" required>
							<label for="comment">Comentario:</label>
							<textarea id="comment" name="comment" required></textarea>
							<button type="submit">Enviar</button>
						</form>
						<button onclick="hideCancellationPopup()">Cerrar</button>
					</div>
				</div>
				<!-- Popup para oposición -->
				<div id="opposition-popup" class="modal" style="display: none;">
					<div class="modal-content">
						<h2>Formulario de oposición</h2>
						<form>
							<label for="name">Nombre:</label>
							<input type="text" id="name" name="name" required>
							<label for="comment">Comentario:</label>
							<textarea id="comment" name="comment" required></textarea>
							<button type="submit">Enviar</button>
						</form>
						<button onclick="hideOppositionPopup()">Cerrar</button>
					</div>
				</div>
			</td>
		</div>

	</main>
</body>
</html>
