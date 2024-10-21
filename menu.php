<nav class="side-menu">
    <ul>
        <li><a href="#" onclick="showSection('imc-section')">Calcul IMC</a></li>
        <li><a href="#" onclick="showSection('tmb-section')">Calcul TMB</a></li>
        <li><a href="#" onclick="showSection('historique-section')">Historique</a></li>
    </ul>
</nav>

<div class="content">
    <!-- Section IMC -->
    <div id="imc-section" class="section active">
        <h2>Calcul de l'IMC</h2>
        <form id="form_imc" method="POST">
            <label for="taille">Taille</label>
            <input type="text" name="taille" id="taille" placeholder="Indiquer votre taille" required>
            <label for="poids">Poids</label>
            <input type="text" name="poids" id="poids" placeholder="Indiquer votre poids" required>
            <input type="submit" value="Calculer IMC">
        </form>
        <div id="resultat_imc">Résultat IMC ici</div>
    </div>

    <!-- Section TMB -->
    <div id="tmb-section" class="section">
        <h2>Calcul de votre TMB</h2>
        <form id="form_tmb" method="POST">
            <label for="age">Âge</label>
            <input type="text" name="age" id="age" placeholder="Indiquer votre âge" required>
            <label for="poids_tmb">Poids</label>
            <input type="text" name="poids_tmb" id="poids_tmb" placeholder="Indiquer votre poids" required>
            <label for="taille_tmb">Taille</label>
            <input type="text" name="taille_tmb" id="taille_tmb" placeholder="Indiquer votre taille" required>
            <label for="sexe">Sexe</label>
            <select name="sexe" id="sexe" required>
                <option value="homme">Homme</option>
                <option value="femme">Femme</option>
            </select>
            <input type="submit" value="Calculer TMB">
        </form>
        <div id="resultat_tmb">Résultat TMB ici</div>
    </div>

    <!-- Section Historique -->
    <div id="historique-section" class="section">
        <h2>Historique</h2>
        <p>Historique sera affiché ici (vide pour l'instant).</p>
    </div>
</div>
