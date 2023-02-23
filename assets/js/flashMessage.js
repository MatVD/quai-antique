// ajout de fonctionnalités dynamiques sur flash-messages


let btnClose = document.querySelector("#btn-close-flash")

// dans un if afin d'éviter un message d'erreur (TypeError: Cannot set properties of null (setting 'onclick'))
if (btnClose) {
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
}


