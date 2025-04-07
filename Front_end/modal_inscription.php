<div id="modal">
    <div class="form-container">
        <button id="closeModal"><i class="ri-close-large-line"></i></button>
        <h2>Formulaire d'Inscription</h2>
        <form method="post" action="/actions/controle_formulaire.php" id="form" novalidate>
            <div class="form-group ">
                <label for="nom">Nom<span class="required">*</span>:</label>
                <input type="text" id="nom" name="nom" required>
            </div>
            <div class="form-group">
                <label for="prenom">Prénom<span class="required">*</span>:</label>
                <input type="text" id="prenom" name="prenom" required>
            </div>
            <div class="form-group">
                <label for="adresse">Adresse<span class="required">*</span>:</label>
                <input type="text" id="adresse" name="adresse" required>
            </div>
            <div class="form-group">
                <label for="ville">Ville<span class="required">*</span>:</label>
                <input type="text" id="ville" name="ville" required>
            </div>
            <div class="form-group">
                <label for="codePostale ">Code postale<span class="required">*</span>:</label>
                <input type="text" id="codePostale" name="codePostale" required>
            </div>
            <div class="form-group">
                <label for="mot_de_passe">Mot de passe<span class="required">*</span>:</label>
                <input type="password" id="mot_de_passe" name="mot_de_passe" required>
                <span class="toogleInscription" id="toggleNewPasswordInscription">👁</span>

                <div id="passwordModal" class="modal">
                    <div class="modal-content">
                        <span id="closeModal1" class="close-btn">&times;</span>
                        <h2>Critères du mot de passe</h2>
                        <ul>
                            <li id="length" style="color:red;">❌ Au moins 8 caractères</li>
                            <li id="uppercase" style="color:red;">❌ Une lettre majuscule</li>
                            <li id="lowercase" style="color:red;">❌ Une lettre minuscule</li>
                            <li id="number" style="color:red;">❌ Un chiffre</li>
                            <li id="special" style="color:red;">❌ Un caractère spécial (#?!@$%^&*-)</li>
                        </ul>
                    </div>
                </div>

                <span id="passwordHelp" class="question-mark">?</span>

            </div>
            <div class="form-group">
                <label for="mot_de_passe">Confirmer le mot de passe<span class="required">*</span>:</label>
                <input type="password" id="confirme_mot_de_passe" name="confirme_mot_de_passe" required>
                <span class="toogleConfirmInscription" id="toggleConfirmPasswordInscription">👁</span>

            </div>
            <div class="form-group">
                <label for="telephone">Numéro de téléphone<span class="required">*</span>:</label>
                <input type="tel" id="telephone" name="telephone" required>
            </div>
            <div class="form-group">
                <label for="email">Email<span class="required">*</span>:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="avatarDisposition">
                <div class="avatar-container">
                    <img class="avatar" src="assets/image/avatar1.png" alt="Avatar 1">
                    <input type="radio" class="radio" id="avatar1" name="avatar" value="un">
                    <label for="avatar1">Avatar 1</label>
                </div>

                <div class="avatar-container">
                    <img class="avatar" src="assets/image/avatar2.png" alt="Avatar 2">
                    <input type="radio" class="radio" id="avatar2" name="avatar" value="deux">
                    <label for="avatar2">Avatar 2</label>
                </div>

                <div class="avatar-container">
                    <img class="avatar" src="assets/image/avatar3.png" alt="Avatar 3">
                    <input type="radio" class="radio" id="avatar3" name="avatar" value="trois">
                    <label for="avatar3">Avatar 3</label>
                </div>
            </div>

            <div>
                <input type="checkbox" id="conditionGarageSolidaire" name="conditionGarageSolidaire">
                <label for="conditionGarageSolidaire">J'accepte les conditions d'ahdésion au garage
                    solidaire</label>
            </div>
            <div>
                <input type="checkbox" id="accepter_conditions" name="accepter_conditions">
                <label for="accepter_conditions">J'accepte les conditions générales <span
                        class="required">*</span></label>
            </div>
            <div class="form-group">
                <input type="submit" id="btn" value="S'inscrire">
                <!-- <button type="submit" id="btn">S'inscrire</button> -->
            </div>
        </form>
    </div>

    <a href="#" id="backModal">Retour</a>

</div>