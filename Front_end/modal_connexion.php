<div id="loginModal" class="modal_connexion">
    <div class="modal-content">
        <button id="closeLoginModal" class="close-btn">
            <i class="ri-close-large-line"></i>
        </button>
        <h2>Connexion</h2>

        <form id="loginForm">
            <div class="form-group">
                <label for="loginEmail">Email:</label>
                <input type="email" id="loginEmail" name="email" required>
            </div>

            <div class="form-group">
                <label for="loginPassword">Mot de passe:</label>
                <div class="password-container">
                    <input type="password" id="loginPassword" name="password" required>
                    <span class="toggle-password" onclick="togglePassword()" id="toggleLoginPassword">👁</span>
                </div>
            </div>

            <div class="form-group">
                <button type="submit" id="btnLogin">Se connecter</button>
            </div>
        </form>

        <p id="motPassOublier"><a href="/actions/modification_mdp.php" target="_blank">Mot de passe oublié ?</a></p>
    </div>
</div>