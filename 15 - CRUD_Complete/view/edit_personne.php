<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier personne</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
    <div class="container p-2">
        <form id="addPersonForm">
            <div class="form-group">
                <label for="photo">Photo:</label>
                <input type="file" class="form-control-file" id="photo" accept="image/*" onchange="previewImage(this, 'img_update')">
                <img src width="100px" id="img_update" />
            </div>
            <div class="form-group">
                <label for="name">Nom:</label>
                <input type="text" class="form-control" id="name" required>
            </div>
            <div class="form-group">
                <label for="matricule">Matricule:</label>
                <input type="text" class="form-control" id="matricule" required>
            </div>
            <div class="form-group">
                <label for="genre">Genre:</label>
                <select class="form-control" id="genre" required>
                    <option value="Homme">Homme</option>
                    <option value="Femme">Femme</option>
                </select>
            </div>
            <div class="form-group">
                <label for="dob">Date de naissance:</label>
                <input type="date" class="form-control" id="dob" required>
            </div>
            <button type="submit" class="btn btn-primary" onclick="">Sauvegarder</button>
        </form>
    </div>

    <script>
        function previewImage(input, imgElementId) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById(imgElementId).src = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
        }

        function fetchPersonne() {
            const urlParams = new URLSearchParams(window.location.search);
            const id = urlParams.get('id');
            var formData = new FormData();
            formData.append('idupdate', id);
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '../controller/personne.php', true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    let personne = JSON.parse(xhr.responseText);
                    // alert(personne);
                    document.getElementById("img_update").src = "../img/"+personne[1]
                    document.getElementById("name").value = personne[2]
                    document.getElementById("matricule").value = personne[4]
                    document.getElementById("genre").value = personne[3]
                    document.getElementById("dob").value = personne[5]

                }
            };
            xhr.send(formData);
        }
        fetchPersonne();
    </script>
</body>

</html>