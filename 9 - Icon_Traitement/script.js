window.addEventListener("DOMContentLoaded", function() {
    var loader = document.getElementById("loader");
    var content = document.getElementById("content");
  
    // Afficher le loader pendant la requête AJAX
    function showLoader() {
      loader.style.display = "block";
      content.style.opacity = "0.5";
    }
  
    // Cacher le loader après la réponse de la requête AJAX
    function hideLoader() {
      loader.style.display = "none";
      content.style.opacity = "1";
    }
  
    // Effectuer la requête AJAX
    function makeRequest() {
      var xhr = new XMLHttpRequest();
      xhr.open("GET", "./votre_script.php", true);
  
      xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) {
          if (xhr.status === 200) {
            // Traitement de la réponse de la requête
            document.getElementById("content").innerHTML = xhr.responseText;
            // ...
          }
          hideLoader(); // Cacher le loader après la réponse
        }
      };
  
      showLoader(); // Afficher le loader avant la requête
      xhr.send();
    }
  
    makeRequest(); // Appeler la fonction pour effectuer la requête
  });
  