<script>
    document.write('<script src=' +
        ('__proto__' in {} ? '<?php echo URL; ?>public/js/vendor/zepto' : 'js/vendor/jquery') +
        '.js><\/script>')
</script>

<script src="<?php echo URL; ?>public/js/foundation.min.js"></script>
<script src="<?php echo URL; ?>public/js/foundation/foundation.topbar.js"></script>

<script>
    $(document).foundation();
    $(function () {
        $('#flip_nav, #menu').menuFlip();
    });
</script>
<!--
<script src="<?php echo URL; ?>public/js/foundation/foundation.js"></script>
<script src="<?php echo URL; ?>public/js/foundation/foundation.alerts.js"></script>
<script src="<?php echo URL; ?>public/js/foundation/foundation.clearing.js"></script>
<script src="<?php echo URL; ?>public/js/foundation/foundation.cookie.js"></script>
<script src="<?php echo URL; ?>public/js/foundation/foundation.dropdown.js"></script>
<script src="<?php echo URL; ?>public/js/foundation/foundation.forms.js"></script>
<script src="<?php echo URL; ?>public/js/foundation/foundation.joyride.js"></script>
<script src="<?php echo URL; ?>public/js/foundation/foundation.magellan.js"></script>
<script src="<?php echo URL; ?>public/js/foundation/foundation.orbit.js"></script>
<script src="<?php echo URL; ?>public/js/foundation/foundation.reveal.js"></script>
<script src="<?php echo URL; ?>public/js/foundation/foundation.section.js"></script>
<script src="<?php echo URL; ?>public/js/foundation/foundation.tooltips.js"></script>
<script src="<?php echo URL; ?>public/js/foundation/foundation.interchange.js"></script>
<script src="<?php echo URL; ?>public/js/foundation/foundation.placeholder.js"></script>
<script src="<?php echo URL; ?>public/js/foundation/foundation.abide.js"></script>
-->
</body>
</html>