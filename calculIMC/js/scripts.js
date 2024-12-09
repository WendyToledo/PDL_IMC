// Gestion des sections
function showSection(sectionId) {
    var sections = document.querySelectorAll('.section');
    sections.forEach(function (section) {
        section.classList.remove('active');
    });
    document.getElementById(sectionId).classList.add('active');
}

// Connexion modal
function co() {
    document.getElementById("connexionModal").style.display = "flex";
}

// Inscription modal
function inscription() {
    document.getElementById("inscriptionModal").style.display = "flex";
}

// Déconnexion
function deco() {
    window.location.href = 'deconnexion.php';  // Exemple de redirection
}

