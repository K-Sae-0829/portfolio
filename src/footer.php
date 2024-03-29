<footer id="footer" class="footer" itemscope itemtype="http://schema.org/WPFooter">
    <div class="wrap w1200 sp-wrap">
        <div class="footer__frame flex bet sp-break vcenter">
            <div class="footerData">
                <a href="<?php echo H_URL; ?>" class="footerLogo flex vcenter">
                    <div class="footerLogo__img">
                        <img src="<?php echo T_URL; ?>img/logo.png" alt="ロゴ画像">
                    </div>
                    <div class="footerLogo__text aquatico">KIMURA SAE<br>PORTFOLIO SITE</div>
                </a>
            </div>
            <div class="footerLink aquatico pc">
                <ul class="footerLink__list pc-flex vcenter">
                    <li class="footerLink__item"><a class="footerLink__link" href="<?php echo H_URL; ?>" target="">TOP</a></li>
                    <li class="footerLink__item"><a class="footerLink__link" href="<?php echo H_URL; ?>about/" target="">ABOUT</a></li>
                    <li class="footerLink__item"><a class="footerLink__link" href="<?php echo H_URL; ?>works/" target="">WORKS</a></li>
                    <li class="footerLink__item"><a class="footerLink__link" href="<?php echo H_URL; ?>original/" target="">ORIGINAL WORKS</a></li>
                    <li class="footerLink__item"><a class="footerLink__link" href="<?php echo H_URL; ?>contact/" target="">CONTACT</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
</div>
</div>
<script>
    {
        var tUrl = '<?php echo T_URL; ?>'
    }
</script>
<script src="<?php echo T_URL; ?>js/lib.min.js?<?php echo filemtime(T_PATH . 'js/lib.min.js'); ?>"></script>
<script src="<?php echo T_URL; ?>js/main.min.js?<?php echo filemtime(T_PATH . 'js/main.min.js'); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/scrollify/1.0.21/jquery.scrollify.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.15/jquery.bxslider.min.js"></script>
<script src="<?php echo T_URL; ?>js/luxy.js?<?php echo filemtime(T_PATH . 'js/main.min.js'); ?>></script>
<?php wp_footer(); ?>
</body>

</html>
