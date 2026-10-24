<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Personnes</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="../style/style.css">
</head>

<body>
  <div class="container mt-4">
    <div class="form-group row">
      <div class="col-md-3">
        <select id="searchType" class="form-control">
          <option value="choisir">Choisir Type</option>
          <option value="name">Nom</option>
          <option value="matricule">Matricule</option>
          <option value="genre">Genre</option>
          <option value="dob">Date de naissance</option>
          <option value="creationDate">Date de création</option>
        </select>
      </div>
      <div class="col-md-6" id="searchInputContainer">
        <div id="normale">
          <input type="text" class="form-control" id="searchInput" placeholder="Recherche..." onkeyup="Find()">
        </div>
        <div id="date" style="display: none;">
          <div class="d-flex">
            <input type="date" class="form-control" onchange="Find()" id="date1">
            <input type="date" class="form-control" onchange="Find()" id="date2">
          </div>
        </div>

        <div id="genre" style="display: none;">

          <div class="type d-flex">
            <div class="form-check">
              <input type="radio" class="input-radio w-25" name="genre" id="homme" value="homme" onchange="Find()">
              <label class="label-radio" for="homme">Homme</label>
            </div>
            <div class="form-check">
              <input type="radio" class="input-radio w-50" name="genre" id="femme" value="femme" onchange="Find()">
              <label class="label-radio" for="femme">Femme</label>
            </div>
          </div>

        </div>
      </div>
      <div class="col-md-2">
        <a href="../view/add_personne.php" class="btn btn-primary"><i class="bi bi-plus"></i>
          Ajouter</a>

      </div>
    </div>

    <div class="form-group row">
      <div class="col-md-2">
        <select id="perPageSelect" class="form-control">
          <option value="5">5 lignes</option>
          <option value="10">10 lignes</option>
          <option value="25">25 lignes</option>
          <option value="50">50 lignes</option>
          <option value="100">100 lignes</option>
        </select>
      </div>
    </div>
    <div id="trierpar" class="mb-3">
      Trié par : <span id="triInfo"></span>
    </div>
  </div>

  <div class="container">
    <table class="table table-striped table-bordered" id="tableau">
      <thead class="thead-dark">
        <tr>
          <th scope="col" class="sortable" data-column="0">ID
            <span class="sort-icon"></span>
          </th>
          <th scope="col" class="sortable" data-column="1">Photo
            <span class="sort-icon"></span>
          </th>
          <th scope="col" class="sortable" data-column="2">Nom
            <span class="sort-icon"></span>
          </th>
          <th scope="col" class="sortable" data-column="3">Matricule <span class="sort-icon"></span></th>
          <th scope="col" class="sortable" data-column="4">Genre
            <span class="sort-icon"></span>
          </th>
          <th scope="col" class="sortable" data-column="5">Date de
            naissance <span class="sort-icon"></span></th>
          <th scope="col" class="sortable" data-column="6">Date de
            création <span class="sort-icon"></span></th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <!-- Les lignes de données iront ici -->
      </tbody>
    </table>

    <div id="pagination" class="container">
      <ul class="pagination justify-content-center">
        <!-- Les liens de pagination iront ici -->
      </ul>
    </div>
  </div>





  <!-- Delete Modal -->
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteModalLabel">Supprimer
            Personne</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <input type="text" class="form-control" id="deleteId" required>
          <p>Êtes-vous sûr de vouloir supprimer cette
            personne?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
          <button id="deleteBtnConfirm" type="button" class="btn btn-danger" onclick="removePersonById()">Supprimer</button>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- <script src="../js/script.js"></script> -->
  <script>
    var page_actual = 1;
    var oldpersonnes =[];
    var personnes = [];
    var perPage = 5;
    var tbody = document.querySelector("#tableau tbody");
    var paginationUl = document.querySelector("#pagination ul");
    function displaySearchInput() {
      var searchType = document.getElementById("searchType").value;
      var normaleInput = document.getElementById("normale");
      var dateInput = document.getElementById("date");
      var genreInput = document.getElementById("genre");
      normaleInput.style.display = "block";
      dateInput.style.display = "none";
      genreInput.style.display = "none";
      document.getElementById("searchInput").disabled = true;
      document.getElementById("searchInput").value = "";
      document.getElementById("date1").value = "";
      document.getElementById("date2").value = "";
      document.getElementById("homme").checked = false;
      document.getElementById("femme").checked = false;
      personnes = oldpersonnes;
      var numPages =
        personnes.length != 0 ? Math.ceil(personnes.length / perPage) : 1;
      // var numPages = Math.ceil(personnes.length / perPage);
      displayData(numPages < page_actual ? numPages : page_actual);
      displayPagination(numPages < page_actual ? numPages : page_actual);
      switch (searchType) {
        case "name":
        case "matricule":
          document.getElementById("searchInput").disabled = false;
          break;
        case "dob":
        case "creationDate":
          normaleInput.style.display = "none";
          dateInput.style.display = "block";
          break;
        case "genre":
          normaleInput.style.display = "none";
          genreInput.style.display = "block";
          break;
        default:
          break;
      }
    }

    document.getElementById("searchType").addEventListener("change", function() {
      displaySearchInput();
    });

    displaySearchInput();

    function customIdSort(a, b) {
      return parseInt(a[0]) - parseInt(b[0]);
    }

    function sortData(column, order) {
      if (column === 0) {
        // Si la colonne est l'ID
        personnes.sort(customIdSort);
        if (order === "desc") personnes.reverse();
      } else {
        personnes.sort((a, b) => {
          if (order === "asc") {
            return a[column] > b[column] ? 1 : -1;
          } else {
            return a[column] < b[column] ? 1 : -1;
          }
        });
      }
    }

    function resetSortState() {
      var sortableHeaders = document.querySelectorAll(".sortable");
      sortableHeaders.forEach((header) => {
        header.dataset.order = "";
        toggleSortIcon(header, "");
      });
    }

    function toggleSortIcon(element, order) {
      var sortIcons = document.querySelectorAll(".sort-icon");
      sortIcons.forEach((icon) => {
        icon.textContent = "";
      });
      element.querySelector(".sort-icon").textContent = order === "asc" ? "↑" : "↓";
    }

    function handleColumnHeaderClick(event) {
      const column = parseInt(event.target.dataset.column);
      const order = event.target.dataset.order === "asc" ? "desc" : "asc";
      resetSortState();
      event.target.dataset.order = order;
      toggleSortIcon(event.target, order);
      sortData(column, order);
      displayData(1);
      displayPagination(1);
      updateSortInfo(column, order);
    }

    const sortableHeaders = document.querySelectorAll(".sortable");
    sortableHeaders.forEach((header) => {
      header.addEventListener("click", handleColumnHeaderClick);
    });

    function displayData(page) {
      page_actual = page;
      tbody.innerHTML = "";
      var startIndex = (page - 1) * perPage;

      var endIndex = personnes.length != 0 ? Math.min(startIndex + perPage, personnes.length) : 0;
      if (personnes.length != 0) {
        for (var i = startIndex; i < endIndex; i++) {
          var tr = document.createElement("tr");
          let per = personnes[i];
          var td1 = document.createElement("td");
          td1.textContent = per[0];
          tr.appendChild(td1);
          var td2 = document.createElement("td");
          var img = document.createElement("img");
          img.setAttribute("width", "50px");
          img.src = "../img/"+per[1];
          img.alt = "Photo de profil";
          td2.appendChild(img);
          tr.appendChild(td2);
          var td7 = document.createElement("td");
          td7.textContent = per[2];
          tr.appendChild(td7);
          var td3 = document.createElement("td");
          td3.textContent = per[3];
          tr.appendChild(td3);
          var td4 = document.createElement("td");
          td4.textContent = per[4];
          tr.appendChild(td4);
          var td5 = document.createElement("td");
          td5.textContent = per[5];
          tr.appendChild(td5);
          var td6 = document.createElement("td");
          td6.textContent = per[6];
          tr.appendChild(td6);
          var actionTd = document.createElement("td");
          var editlink = document.createElement("a");
          editlink.setAttribute("class", "btn btn-warning");
          editlink.href = "../view/edit_personne.php?id="+per[0];
          editlink.innerHTML = '<i class="bi bi-pencil"></i>';
          actionTd.appendChild(editlink);

          // var editBtn = document.createElement("button");
          // editBtn.setAttribute("class", "btn btn-warning");
          // editBtn.innerHTML = '<i class="bi bi-pencil"></i>';
          // editBtn.addEventListener("click", function() {
          //   loadEditModal(per);
          //   $("#editModal").modal("show");
          // });
          // actionTd.appendChild(editBtn);
          var deleteBtn = document.createElement("button");
          deleteBtn.setAttribute("class", "btn btn-danger ml-1");
          deleteBtn.innerHTML = '<i class="bi bi-trash"></i>';
          deleteBtn.addEventListener("click", function() {
            loadDeleteModal(per[0]);
            $("#deleteModal").modal("show");
          });
          actionTd.appendChild(deleteBtn);
          tr.appendChild(actionTd);
          tbody.appendChild(tr);
        }
      }
    }

    function displayPrevNextButtons(currentPage, numPages) {
      var prevLi = document.createElement("li");
      prevLi.className = "page-item";
      var prevLink = document.createElement("a");
      prevLink.className = "page-link";
      prevLink.href = "#";
      prevLink.textContent = "Précédent";
      prevLink.addEventListener("click", function() {
        if (currentPage > 1) {
          displayData(currentPage - 1);
          displayPagination(currentPage - 1);
        }
      });
      prevLi.appendChild(prevLink);
      var firstChild = paginationUl.firstChild;
      paginationUl.insertBefore(prevLi, firstChild);
      var nextLi = document.createElement("li");
      nextLi.className = "page-item";
      var nextLink = document.createElement("a");
      nextLink.className = "page-link";
      nextLink.href = "#";
      nextLink.textContent = "Suivant";
      nextLink.addEventListener("click", function() {
        if (currentPage < numPages) {
          displayData(currentPage + 1);
          displayPagination(currentPage + 1);
        }
      });
      nextLi.appendChild(nextLink);
      paginationUl.appendChild(nextLi);
    }

    function displayPagination(currentPage) {
      page_actual = currentPage;
      paginationUl.innerHTML = "";
      var numPages = Math.ceil(personnes.length / perPage);
      var totalPagesToShow = 3;
      var startPage = Math.max(1, currentPage - Math.floor(totalPagesToShow / 2));
      var endPage = Math.min(startPage + totalPagesToShow - 1, numPages);
      startPage = Math.max(1, endPage - totalPagesToShow + 1);
      if (personnes.length != 0) {
        for (var i = startPage; i <= endPage; i++) {
          var li = document.createElement("li");
          li.className = "page-item";
          var a = document.createElement("a");
          a.className = "page-link";
          a.href = "#";
          a.textContent = i;
          if (i === currentPage) li.classList.add("active");
          a.addEventListener("click", function() {
            displayData(parseInt(this.textContent));
            displayPagination(parseInt(this.textContent));
          });
          li.appendChild(a);
          paginationUl.appendChild(li);
        }
      }

      displayPrevNextButtons(currentPage, numPages);
    }

    displayData(1);
    displayPagination(1);

    document
      .getElementById("perPageSelect")
      .addEventListener("change", function() {
        perPage = parseInt(this.value);
        displayData(1);
        displayPagination(1);
      });

    document.addEventListener("DOMContentLoaded", function() {
      var nomHeader = document.querySelector('.sortable[data-column="0"]');
      nomHeader.click();
    });

    function updateSortInfo(column, order) {
      var columnName;
      switch (column) {
        case 0:
          columnName = "ID";
          break;
        case 1:
          columnName = "Photo";
          break;
        case 2:
          columnName = "Nom";
          break;
        case 3:
          columnName = "Matricule";
          break;
        case 4:
          columnName = "Genre";
          break;
        case 5:
          columnName = "Date de naissance";
          break;
        case 6:
          columnName = "Date de création";
          break;
        default:
          columnName = "";
      }
      var sortOrder = order === "asc" ? "croissant" : "décroissant";
      document.getElementById("triInfo").textContent =
        columnName + " (" + sortOrder + ")";
    }

    // function loadEditModal(personne) {
    //   document.getElementById("editId").value = personne[0];
    //   document.getElementById("editName").value = personne[2];
    //   document.getElementById("editMatricule").value = personne[3];
    //   document.getElementById("editDob").value = personne[5];
    //   document.getElementById("img_edit").src = personne[1];
    //   var hommeRadio = document.getElementById("editHomme");
    //   var femmeRadio = document.getElementById("editFemme");
    //   if (personne[4] === "Homme") {
    //     hommeRadio.checked = true;
    //   } else if (personne[4] === "Femme") {
    //     femmeRadio.checked = true;
    //   }
    // }

    function loadDeleteModal(id) {
      document.getElementById("deleteId").value = id;
    }

    // function previewImage(inp, id) {
    //   var preview = document.getElementById(id);
    //   var file = inp.files[0];
    //   var reader = new FileReader();
    //   reader.onloadend = function() {
    //     preview.src = reader.result;
    //   };
    //   if (file) {
    //     reader.readAsDataURL(file);
    //   } else {
    //     preview.src = "";
    //   }
    // }

    function removePersonById() {
      oldpersonnes = oldpersonnes.filter(function(person) {
        return person[0] != document.getElementById("deleteId").value;
      });
      personnes =  personnes.filter(function(person) {
        return person[0] != document.getElementById("deleteId").value;
      });
      $("#deleteModal").modal("hide");
      console.log(personnes);
      var numPages =
        personnes.length != 0 ? Math.ceil(personnes.length / perPage) : 1;
      displayData(numPages < page_actual ? numPages : page_actual);
      displayPagination(numPages < page_actual ? numPages : page_actual);
    }

    function rechercherPersonnes(colonne, valeur) {
      const colonnes = {
        id: 0,
        image: 1,
        name: 2,
        matricule: 3,
        genre: 4,
      };
      if (!colonnes.hasOwnProperty(colonne)) return oldpersonnes;
      if (valeur == "") return oldpersonnes;
      const colonneIndex = colonnes[colonne];
      return oldpersonnes.filter((personne) =>
        personne[colonneIndex].toLowerCase().includes(valeur.toLowerCase())
      );
    }

    function rechercherPersonnesParDate(colonne, dateDebut, dateFin) {
      // alert(dateDebut)
      if (colonne !== "dob" && colonne !== "creationDate") return oldpersonnes;
      if (dateDebut == "" || dateFin == "") return oldpersonnes;

      const colonnes = {
        dob: 5,
        creationDate: 6,
      };
      const colonneIndex = colonnes[colonne];

      const startDate = new Date(dateDebut);
      const endDate = new Date(dateFin);

      return oldpersonnes.filter((personne) => {
        const personDate = new Date(personne[colonneIndex]);
        return personDate >= startDate && personDate <= endDate;
      });
    }

    function Find() {
      var col = document.getElementById("searchType").value;
      if (col != "choisir") {
        if (col === "creationDate" || col === "dob") {
          var date1 = document.getElementById("date1").value;
          var date2 = document.getElementById("date2").value;
          personnes = rechercherPersonnesParDate(col, date1, date2);
        } else if (col == "genre") {
          var genre =
            document.getElementById("homme").checked == true ? "homme" : "femme";
          // alert(col)
          personnes = rechercherPersonnes(col, genre);
        } else {
          var text = document.getElementById("searchInput").value;
          personnes = rechercherPersonnes(col, text);
        }
        var numPages =
          personnes.length != 0 ? Math.ceil(personnes.length / perPage) : 1;
        displayData(numPages < page_actual ? numPages : page_actual);
        displayPagination(numPages < page_actual ? numPages : page_actual);
      }
    }

    // function updatePerson() {
    //   const id = document.getElementById("editId").value;
    //   const nom = document.getElementById("editName").value;
    //   const matricule = document.getElementById("editMatricule").value;
    //   const datenaissance = document.getElementById("editDob").value;
    //   const index = oldpersonnes.findIndex((personne) => personne[0] == id);

    //   //   alert(id)
    //   if (index !== -1) {
    //     // oldpersonnes[index][1] = image;
    //     oldpersonnes[index][2] = nom;
    //     oldpersonnes[index][3] = matricule;
    //     oldpersonnes[index][5] = datenaissance;
    //     $("#editModal").modal("hide");
    //     personnes = oldpersonnes;
    //     var numPages =
    //       personnes.length != 0 ? Math.ceil(personnes.length / perPage) : 1;
    //     displayData(numPages < page_actual ? numPages : page_actual);
    //     displayPagination(numPages < page_actual ? numPages : page_actual);
    //     return true;
    //   } else {
    //     return false;
    //   }
    // }


    // function previewImage(input, imgElementId) {
    //   var reader = new FileReader();
    //   reader.onload = function(e) {
    //     document.getElementById(imgElementId).src = e.target.result;
    //   };
    //   reader.readAsDataURL(input.files[0]);
    // }


    function fetchPersonnes() {
      var formData = new FormData();
      formData.append('all', true);
      var xhr = new XMLHttpRequest();
      xhr.open('POST', '../controller/personne.php', true);
      xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
          personnes = oldpersonnes= JSON.parse(xhr.responseText);
          // alert(oldpersonnes);
          var numPages =
            personnes.length != 0 ? Math.ceil(personnes.length / perPage) : 1;
          displayData(numPages < page_actual ? numPages : page_actual);
          displayPagination(numPages < page_actual ? numPages : page_actual);
        }
      };
      xhr.send(formData);
    }

    fetchPersonnes();
  </script>
</body>

</html>