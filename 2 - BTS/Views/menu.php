<section id="sidebar">
	<a href="" class="brand">
		<!-- <i class='bx bxs-smile'></i> -->
		<img src="../Images/logo.jpg" alt="logo" width="40px" height="32px" style="border-radius: 60px ;margin-right: 20px;margin-left: 5px;" />
		<span class="text">BTS</span>
	</a>
	<ul class="side-menu top">
		<li class="<?= $_SESSION['Page_Actual'] == 'Emploi de temps' ? 'active' : '' ?> ">
			<a href="../Controllers/Emploi.php">
				<i class='bx bx-calendar'></i>
				<span class="text">Emploi de temps</span>
			</a>
		</li>
		<li class="<?= $_SESSION['Page_Actual'] == 'Absences Etudiants' ? 'active' : '' ?> ">
			<a href="../Controllers/Absences.php">
				<i class='bx bx-folder'></i>
				<span class="text">Absences Etudiants</span>
			</a>
		</li>
	
		
	
	
		<li class="<?= $_SESSION['Page_Actual'] == 'Profile' ? 'active' : '' ?> ">
			<a href="../Controllers/Profile.php">
				<i class='bx bx-user'></i>
				<span class="text">Profile</span>
			</a>
		</li>
	</ul>
	<ul class="side-menu">
		

		<li>
			<a href="../Controllers/Deconnexion.php" class="logout">
				<i class='bx bxs-log-out-circle'></i>
				<span class="text">Déconnexion</span>
			</a>
		</li>
	</ul>
</section>
<section id="content" >
	<nav>
		<i class='bx bx-menu'></i>
		<div class="tite" style="width: 60%;text-align: right">
			<span style='text-align:center;'><?= $_SESSION['Page_Actual']?></span>
		</div>
		<a href="../Controllers/Profile.php" style="width: 40%;text-align: right;">
			<span><b><?php echo $_SESSION["User"][1] . " " . $_SESSION["User"][2] ?> <i class='bx bx-user' style="border:1px solid black;border-radius: 50px; margin-left:10px"></i></b></span>
		</a>
	</nav>
	<main>