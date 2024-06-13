
let tabl = document.getElementById("tabl");
const xml = new XMLHttpRequest();
xml.onload = function () {
    let data = JSON.parse(this.responseText)
    let txt = "";
    for (let i = 0; i < data.produit.length; i++) {
        txt += `<tr>
         <td id ="src"><img src = ${data.produit[i].srcImg}></td>
         <td id ="nom">${data.produit[i].name}</td>
         <td id ="mission">${data.produit[i].mission}</td>
            </tr>`
    }
  tabl.innerHTML = txt
}
xml.open("GET", "json.json");
xml.send();
