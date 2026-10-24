function Quantite_Article(qt){
    let val = qt.value;
    let T_qt = document.getElementsByClassName("qt");
    for(let q of T_qt){
        q.value = "";
    }
    qt.value = val;

}