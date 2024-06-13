let tBody = document.getElementById("tBody");

const xml = new XMLHttpRequest();

xml.onload = function(){
    let dataJson = JSON.parse(this.responseText)
    let txt = "";
    for(let i = 0; i<dataJson.produit.length; i++){
        txt +=`<tr>
                    <td id="src"><img src=${dataJson.produit[i].srcImg}></td>
                    <td id="nom">${dataJson.produit[i].name}</td>
                    <td id="prix">${dataJson.produit[i].prix}</td>
                </tr>`
    }
    tBody.innerHTML = txt;
}

xml.open("GET", "product.json");
xml.send();


let supp = document.querySelectorAll("#supprimer");
let edit = document.querySelectorAll("#editer");

supp.forEach(function(element, index){
    element.onclick = function(){
        
    }
})

//// set color of background
if(localStorage.length > 0){
    let colorBg = localStorage.getItem("color");
    document.body.style.background = colorBg;
}
    
function setColor(color){
    document.body.style.background = color;
    localStorage.setItem("color", color);
}
