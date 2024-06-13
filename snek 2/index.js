var scren = document.querySelector('.contenaire');
var snack = document.querySelector('.snack');
var eat = document.querySelector('.eat');
var derection = "down"
var arryS = [];
var arrTop = [];
var arrLeft = [];
eatPosition()
var interval = setInterval(() => {
    var scren = document.querySelector('.contenaire');
    var eatL = parseInt(window.getComputedStyle(eat).left)
    var eatT = parseInt(window.getComputedStyle(eat).top)
    var curentP = parseInt(window.getComputedStyle(snack).top)
    let curentPL = parseInt(window.getComputedStyle(snack).left)
    switch (derection) {
        case 'up':
            snack.style.top = curentP - 10 + 'px'
            break;
        case 'down':
            snack.style.top = curentP + 10 + 'px'
            break;
        case 'right':
            snack.style.left = curentPL + 10 + 'px'
            break;
        case 'left':
            snack.style.left = curentPL - 10 + 'px'
            break;
    }
    arrTop.unshift(curentP);
    arrLeft.unshift(curentPL)
    // if(arrTop.length > 100 ){

    //     arrTop.pop()
    //     arrLeft.pop()
    // }

    for (let i = 0; i < arryS.length; i++) {
        arryS[i].style.top = arrTop[i] + 'px';
        arryS[i].style.left = arrLeft[i] + 'px';
        arryS[i].style.display = 'block';
    }


    arrTop.pop()
    arrLeft.pop()



    if (curentP >= 490 || curentP < 0) {
        //   alert('you are lose')
        var div = document.createElement("div")
        var button = document.createElement("button")        
        document.body.appendChild(div)
        div.appendChild(button)
        button.innerHTML = "X"
        //add atribiout
        div.setAttribute("class", "newdive")
        button.setAttribute("class", "newbutton")
        // relowd
        button.addEventListener("click", function(){
    window.location.reload()
        })
        // gemover
        var audio = new Audio("gemover.mp3")
        audio.play()
            clearInterval(interval)

    }

    if (curentPL >= 500 || curentPL <= 0) {
        // alert('lose')
        var div = document.createElement("div")
        var button = document.createElement("button")
        document.body.appendChild(div)
        div.appendChild(button)
        button.innerHTML = "X"
        //add atribiout
        div.setAttribute("class", "newdive")
        button.setAttribute("class", "newbutton")
        // relowd
        button.addEventListener("click", function(){
    window.location.reload()
        })
        // geme over
        var audio = new Audio("gemover.mp3")
        audio.play()
        clearInterval(interval)
    }
    if (curentP > eatT - 9 && curentP < eatT + 9 && curentPL > eatL - 9 && curentPL < eatL + 9) {
        var newsegment = document.createElement('div');
        newsegment.classList.add('SnackNew');
        scren.appendChild(newsegment);
        arrLeft.unshift(curentPL);
        arrTop.unshift(curentP);
        arryS.push(newsegment)
        //sounds
        var audio = new Audio("score.ogg")
        audio.play()
        eatPosition()

    }

    for (let j = 1; j < arryS.length; j++) {
        var curentET = parseInt(arryS[j].style.top)
        var curentEL = parseInt(arryS[j].style.left)
        if (curentP == curentET && curentP == curentET && curentPL == curentEL && curentPL == curentEL) {
            alert(curentET)
        }
        console.log(curentET, curentEL)

    }
    console.log(curentP + "this is head", curentPL)
}, 100)

document.addEventListener('keydown', (event) => {
    switch (event.key) {
        case 'ArrowUp':
            if (derection !== "down") {
                derection = "up"
                snack.style.backgroundImage = "url('up.png')"
            
            }
            break;
        case 'ArrowDown':
            if (derection !== 'up') {
                derection = "down"
                snack.style.backgroundImage = "url('down.png')"
            }
            break;
        case 'ArrowRight':
            if (derection !== 'left') {
                derection = "right"
                snack.style.backgroundImage = "url('left.png')"
            }
            break;
        case 'ArrowLeft':
            if (derection !== 'right') {
                derection = 'left'
                snack.style.backgroundImage = "url('right.png')"
            }
            break;
    }

})
function eatPosition() {
    randomPT = Math.floor(Math.random() * 470) + 10;
    randonPL = Math.floor(Math.random() * 470) + 10;
    eat.style.top = randomPT + 'px';
    eat.style.left = randonPL + 'px';

}