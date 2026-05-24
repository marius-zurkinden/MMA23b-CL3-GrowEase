    <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
    </main>

    <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
    <footer class="footer">
        <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
        <div class="footer-brand">
            <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
            <h3>GrowEase</h3>
            <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
            <p>Das ist ein Schulprojekt und keine reale Website.</p>
            <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
        </div>

        <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
        <div>
            <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
            <h4>Team</h4>
            <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
            <p>Alexandra, Leandra, Marius</p>
            <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
        </div>

        <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
        <div>
            <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
            <h4>Kontakt</h4>
            <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
            <p>info@growease.ch<br>Mo–Fr: 08:00–17:00</p>
            <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
        </div>

        <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
        <div>
            <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
            <h4>Social Media</h4>
            <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
            <div class="social-links">
                <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
                <a href="https://www.facebook.com/" class="social-icon" aria-label="Facebook" title="Facebook">
                    <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
                    <img src="https://cdn-icons-png.flaticon.com/512/5968/5968764.png" alt="Facebook Icon">
                    <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
                </a>
                <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
                <a href="https://www.instagram.com/" class="social-icon" aria-label="Instagram" title="Instagram">
                    <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
                    <img src="https://cdn-icons-png.flaticon.com/512/2111/2111463.png" alt="Instagram Icon">
                    <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
                </a>
                <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
                <a href="http://www.tiktok.com/" class="social-icon" aria-label="TikTok" title="TikTok">
                    <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
                    <img src="https://cdn-icons-png.flaticon.com/512/3046/3046121.png" alt="TikTok Icon">
                    <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
                </a>
                <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
            </div>
            <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
            <div class="icon-credits">
                <!-- Kommentar: Führt eine PHP-Anweisung für diese Seite aus. -->
                Icons:
                <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
                <a href="https://www.flaticon.com/free-icons/facebook" title="facebook icons">Facebook</a>,
                <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
                <a href="https://www.flaticon.com/free-icons/instagram-logo" title="instagram logo icons">Instagram</a>,
                <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
                <a href="https://www.flaticon.com/free-icons/tik-tok" title="tik tok icons">TikTok</a>
                <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
            </div>
            <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
        </div>
        <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
    </footer>

    <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
    <script src="assets/js/common.js?v=validation-fix-1"></script>
    <!-- Kommentar: Startet den PHP-Bereich der Datei. -->
    <?php if (!empty($extraJs)) { ?>
        <!-- Kommentar: Startet den PHP-Bereich der Datei. -->
        <?php foreach ($extraJs as $jsFile) { ?>
            <!-- Kommentar: Gibt Text sicher aus, damit kein HTML-Code ausgeführt wird. -->
            <script src="<?= htmlspecialchars($jsFile) ?>"></script>
            <!-- Kommentar: Startet den PHP-Bereich der Datei. -->
        <?php } ?>
        <!-- Kommentar: Startet den PHP-Bereich der Datei. -->
    <?php } ?>
    <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
    </body>

    <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->

    </html>