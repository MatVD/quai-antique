// Fetch du nombre de tables libres

let p = document.querySelector('#nbTablesFreeP')

async function freeTablesCount() {
    await fetch('/freeTableCount')
        .then((response) => response.json())
        .then((data) => {
                p.innerHTML = `Il reste ${data.TablesFree} tables de libres (2 à 6 couverts par table) !`
            }
        )
        .catch((error) => console.error(error))
}


window.onload = ((e) => {
    // Fetch des datas à l'arriver sur la page
    freeTablesCount()

    // Fetch des datas à interval de 5 minutes
    setInterval(() => {
        freeTablesCount()
        }, 300000)

    })