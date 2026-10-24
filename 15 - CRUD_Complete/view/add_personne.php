<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter personne</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
    <div class="container p-2">
        <form id="addPersonForm">
            <div class="form-group">
                <label for="photo">Photo:</label>
                <input type="file" class="form-control-file" id="photo" accept="image/*" onchange="previewImage(this, 'img_add')">
                <img src width="100px" id="img_add" />
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
                    <option value="homme">Homme</option>
                    <option value="femme">Femme</option>
                </select>
            </div>
            <div class="form-group">
                <label for="dob">Date de naissance:</label>
                <input type="date" class="form-control" id="dob" required>
            </div>
            <button type="submit" class="btn btn-primary" onclick="addPerson(event)">Ajouter</button>
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
    </script>
</body>

</html>