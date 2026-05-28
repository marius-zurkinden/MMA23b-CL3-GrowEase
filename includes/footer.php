    </main>


    <footer class="footer">
        <div class="footer-brand">
            <h3>GrowEase</h3>
            <p>Das ist ein Schulprojekt und keine reale Website.</p>
        </div>


        <div>
            <h4>Team</h4>

            <p>Alexandra, Leandra, Marius</p>
        </div>


        <div>
            <h4>Kontakt</h4>
            <p>info@growease.ch<br>Mo–Fr: 08:00–17:00</p>
        </div>


        <div>
            <h4>Social Media</h4>
            <div class="social-links">
                <a href="https://www.facebook.com/" class="social-icon" aria-label="Facebook" title="Facebook">
                    <img src="https://cdn-icons-png.flaticon.com/512/5968/5968764.png" alt="Facebook Icon">
                </a>

                <a href="https://www.instagram.com/" class="social-icon" aria-label="Instagram" title="Instagram">
                    <img src="https://cdn-icons-png.flaticon.com/512/2111/2111463.png" alt="Instagram Icon">
                </a>

                <a href="http://www.tiktok.com/" class="social-icon" aria-label="TikTok" title="TikTok">
                    <img src="https://cdn-icons-png.flaticon.com/512/3046/3046121.png" alt="TikTok Icon">
                </a>

            </div>

            <div class="icon-credits">
                <!-- Führt eine PHP-Anweisung für diese Seite aus. -->
                Icons:
                <a href="https://www.flaticon.com/free-icons/facebook" title="facebook icons">Facebook</a>,
                <a href="https://www.flaticon.com/free-icons/instagram-logo" title="instagram logo icons">Instagram</a>,
                <a href="https://www.flaticon.com/free-icons/tik-tok" title="tik tok icons">TikTok</a>
            </div>
        </div>
    </footer>


    <script src="assets/js/common.js?v=validation-fix-1"></script>
    <?php if (!empty($extraJs)) { ?>
        <?php foreach ($extraJs as $jsFile) { ?>
            <!-- Gibt Text sicher aus, damit kein HTML-Code ausgeführt wird. -->
            <script src="<?= htmlspecialchars($jsFile) ?>"></script>
        <?php } ?>
    <?php } ?>
    </body>

    </html>