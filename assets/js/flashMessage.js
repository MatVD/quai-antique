// ajout de fonctionnalités dynamiques sur flash-messages

let btnClose = document.querySelector("#btn-close-flash")

// Le flash message se ferme au click de l'utilsateur
btnClose.onclick = ((e) => {
        e.preventDefault();

        let popupDiv = document.querySelector('#flash-popup');

        popupDiv.style.display = 'none';
});

// Le flash message se ferme au bouts de 10s
setInterval(() => {
       btnClose.click();
}, 15000)

