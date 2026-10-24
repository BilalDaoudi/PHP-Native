<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="../Style/menu.css">
	<link rel="stylesheet" href="../Style/emploi.css">
	<title>Emploi du temps</title>
	
</head>

<body>
	<?php require "menu.php" ?>
	<div class="emploi">
		<table width="100%">
			<tr>
				<th height='55px'>Jours / Heures</th>
				<th class="heure">8:30 h&nbsp; -> &nbsp;10:30 h</th>
				<th class="heure">10:30 h&nbsp; -> &nbsp;12:30 h</th>
				<th class="heure">14:30 h&nbsp; -> &nbsp;16:30 h</th>
				<th class="heure">16:30 h&nbsp; -> &nbsp;18:30 h</th>
			</tr>
			<?php for ($i = 0; $i < 6; $i++) : ?>
				<tr>
					<th class="jour"><?= $T_Jour[$i] ?></th>
					<?php for ($j = 0; $j < 4; $j++) : ?>
						<td style="background-color: <?= $T_Jours[$i][$j][0] == "" ? "" : "white" ?>" ><?= $T_Jours[$i][$j][0] . "<br>" . $T_Jours[$i][$j][1]  ?></td>
					<?php endfor; ?>
				</tr>
			<?php endfor; ?>
		</table>
	</div>
	</main>
	</section>
	<script src="../JS/script_menu.js"></script>
</body>

</html>