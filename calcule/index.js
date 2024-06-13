if(localStorage.length>0){
    let data = localStorage.getItem("poid");
    document.getElementById("resultat").innerHTML = data;
    
}

function myFunction() {
    var taille =  parseFloat(document.getElementById("taille").value);
    var age =  parseFloat(document.getElementById("age").value);
    var checker =  document.querySelector('input[name="checker"]:checked').value;
    var number;
    if (checker ===  "mince") {
         number =  0.9 *  0.9;
    }
    else
    if (checker ===  "moyen") {
         number =  0.9;
    }
    else {
         number =  0.9 *  1.1;
    }
    var rusult =  (taille -  100 +  age /  10) *  number;
    localStorage.setItem("poid" ,rusult);
    
    document.getElementById("resultat").textContent = rusult.toFixed(2) +  " kg.";

}
