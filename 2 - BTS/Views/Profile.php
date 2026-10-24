<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../Style/menu.css">

    <title>Profile</title>
    <style>
        .tite {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
            position: relative;
            color: blueviolet;
            margin-top: 20px;
        }


        input {
            margin-left: 10px;
            margin-bottom: 10px;
            height: 30px;
            width: 99%;
            border: 1px solid gray;
            border-radius: 5px;
            outline: none;
            padding-left: 10px;
        }

        /* .profile {
			display: flex;
			margin-top: 20px;
		}

		.information {
			width: 40%;
		}

		.cahngepassword {
			font-size: 12px;
			width: 60%;
		} */

        button {
            background-color: cornflowerblue;
            padding: 10px;
            border: none;
            color: white;
            font-weight: 400;
            border-radius: 5px;
        }

        @media screen and (max-width: 900px) {
            /* .profile {
				font-size: 10px;
				display: inline;
				margin-top: 50px;
			}

			.information {
				width: 100%;
			}

			.cahngepassword {
				font-size: 12px;
				width: 100%;
			} */

        }

        .message_change {
            font-size: 16px;
            text-align: center;
            margin-top: 20px;
        }

        .change_password {
            margin-bottom: 20px;
            text-align: end;
        }

        .retour {
            margin-bottom: 50px;
        }

        .retour button {
            background-color: darkgoldenrod;
            width: 100px;
        }

        #popup {
            display: none;
        }
    </style>
    <script>
        function ChangePassword() {
            const actualpassword = document.getElementById("ps1").value;
            const password1 = document.getElementById("ps2").value;
            const password2 = document.getElementById("ps3").value;
            var request = new XMLHttpRequest();
            request.open('POST', '../Controllers/Profile.php', true);
            request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            request.onload = function() {
                if (this.status == 200 && this.readyState == 4) {
                    document.getElementById("erreur").innerHTML = this.responseText;
                }
            };
            request.send(`actualpassword=${actualpassword}&password1=${password1}&password2=${password2}`);
        }




        function Open() {
            document.getElementById("popup").style.display = "block";
            document.getElementById("info").style.display = "none";
        }

        function Close() {
            document.getElementById("popup").style.display = "none";
            document.getElementById("info").style.display = "block";
        }
    </script>
</head>

<body>
    <?php require("menu.php")    ?>
    <div class="profile">
        <div class="information" id="info">
            <div class="change_password"><button onclick="Open()">Change Mot de passe</button></div>

            <table width="100%">
                <tr>
                    <td><label>Matricule : </label></td>
                    <td width="85%"><input type="text" value="<?= $_SESSION["User"][0] ?>" disabled /></td>
                </tr>
                <tr>
                    <td><label>Date d'embauche : </label></td>
                    <td width="85%"><input type="text" value="<?= $_SESSION["User"][3] ?>" disabled /></td>
                </tr>
                <tr>
                    <td><label>Spécialité : </label></td>
                    <td width="85%"><input type="text" value="<?= $_SESSION["User"][6] ?>" disabled /></td>
                </tr>
                <tr>
                    <td><label>Nombre Heure : </label></td>
                    <td width="85%"><input type="text" value="<?= $_SESSION["User"][7] ?>" disabled /></td>
                </tr>
                <tr>
                    <td><label>Echelle : </label></td>
                    <td width="85%"><input type="text" value="<?= $_SESSION["User"][8] ?>" disabled /></td>
                </tr>
                <tr>
                    <td><label>Nom : </label></td>
                    <td width="85%"><input type="text" name="Nom" value="<?= $_SESSION["User"][1] ?>" disabled /></td>
                </tr>
                <tr>
                    <td><label>Prénom : </label></td>
                    <td><input type="text" name="Prenom" value="<?= $_SESSION["User"][2] ?>" disabled /></td>
                </tr>

                <tr>
                    <td><label>Email : </label></td>
                    <td><input type="text" name="Email" value="<?= $_SESSION["User"][5] ?>" disabled /></td>
                </tr>
                <tr>
                    <td><label>Téléphone : </label></td>
                    <td><input type="text" name="Telephone" value="<?= $_SESSION["User"][4] ?>" disabled /></td>
                </tr>

            </table>
        </div>
        <div class="cahngepassword" id='popup'>
            <div class="retour"><button onclick="Close()">⇦ &nbsp;&nbsp; Retour</button></div>

            <table width="100%">
                <tr>
                    <td><label>Mot de passe actual : </label></td>
                    <td width="70%"><input type="password" id="ps1" /></td>
                </tr>
                <tr>
                    <td><label>Nouveau mot de passe : </label></td>
                    <td><input type="password" id="ps2" /></td>
                </tr>
                <tr>
                    <td><label>Confirmer nouveau mot de passe : </label></td>
                    <td><input type="password" id="ps3" /></td>
                </tr>
                <tr>
                    <th style="display:flex;">
                        <div id="erreur" style="color:red;width:100%;margin-top:15px;"> </div>
                    </th>
                    <td>
                        <div style="padding: 10px; text-align:end">
                            <button id="change" onclick="ChangePassword()">Sauvgarder</button>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    </main>
    </section>
    <script src="../JS/script_menu.js"></script>
</body>

</html>