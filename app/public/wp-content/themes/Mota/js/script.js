// Gestion de la modale de contact 
document.addEventListener("DOMContentLoaded", function () {
    const boutonContact = document.querySelector(".menu-item-24 a"); 
    const modale = document.querySelector(".modale");
    const boutonFermeture = document.querySelector(".boutonCroix"); 

    boutonContact.addEventListener("click", function() {
        // Gestion de la fermeture de la modale - En cliquant à nouveau sur Contact 
        if (modale.style.display === "flex") {
            modale.style.display = "none"; 
        }
        else {
            modale.style.display = "flex";
        } 
    });

    // Fermeture de la modale lorsqu'on clic sur la croix 
    boutonFermeture.addEventListener("click", function() {
        modale.style.display = "none"; 
    });
});


// Lorsqu'on click sur le bouton "Contact" sur la page d'une photo, on ouvre la modale et on remplit automatique de la référence en fonction de la photo
document.addEventListener("DOMContentLoaded", function () {

    // Si on se trouve sur la page single-photo.php seulement
    let urlActuelle = window.location.href;

    if (urlActuelle.match(/photographies/)) {
        const nav = document.querySelector("nav");
        const boutonContactPhoto = document.querySelector(".boutonContact");
        const modaleBis = document.querySelector(".emplacement-modale");
        const refARemplir = document.querySelector(".reference-formulaire input");
        const refADupliquer = document.getElementById("reference");

        boutonContactPhoto.addEventListener("click", function () {
            nav.classList.add("active");
            refARemplir.value = refADupliquer.textContent;
            modaleBis.style.display = "block";
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            });
        });
    }
});