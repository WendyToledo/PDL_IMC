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

function deco () {
	<?php
		// Destroying the session
		session_destroy();
		unset($_SESSION['user_id']);
	?>
	location.reload();
};

// Modification modal
function modif () {
	document.getElementById("modifModal").style.display = "flex";
};

