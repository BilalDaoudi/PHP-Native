function SupprimerAbsence(btn) {
    T = btn.value;
    T_value = T.split("/");
    var request = new XMLHttpRequest();
    request.open('POST', '../Controllers/Absences.php', true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.onload = function() {
        if (this.status == 200 && this.readyState == 4) {
            document.getElementById("info").innerHTML = this.responseText;
        }
    };
    request.send(`delete=delete&ni=${T_value[0]}&date=${T_value[1]}&seance=${T_value[2]}`);
}
function VoirAbsences(ni) {
    var request = new XMLHttpRequest();
    request.open('POST', '../Controllers/Absences.php', true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.onload = function() {
        if (this.status == 200 && this.readyState == 4) {
            // alert(this.responseText);
            document.getElementById("detail").innerHTML = this.responseText;
        }
    };
    request.send(`find=find&ni=${ni}`);
    document.getElementById("absence").style.display = "block";
}

function Fermer() {
    document.getElementById("absence").style.display = "none"
}