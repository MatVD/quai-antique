// Fetch du nombre de tables libres

window.onload = ((e) => {
    e.preventDefault();

    let p = document.querySelector('#nbTablesFreeP')

    // Fetch des datas à l'arriver sur la page
    fetch('/freeTableCount')
        .then((response) => response.json())
        .then((data) => {
                p.innerHTML = `Il reste ${data.TablesFree} tables de libres (2 à 6 couverts par table) !`
            }
        )
        .catch((error) => console.error(error))

    // Fetch des datas à interval de 5 minutes
    setInterval(() => {
        fetch('/freeTableCount')
            .then((response) => response.json())
            .then((data) => {
                    p.innerHTML = `Il reste ${data.TablesFree} tables de libres (2 à 6 couverts par table) !`
                }
            )
            .catch((error) => console.error(error))
        }, 300000)

    })