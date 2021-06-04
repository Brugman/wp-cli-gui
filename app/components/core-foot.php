<script src="/assets/vendor/vue-2.6.12.js"></script>
<script src="/assets/vendor/vue-clipboard-0.3.1.min.js"></script>
<script src="/assets/app.min.js"></script>

<?php if ( in_array( substr( $_SERVER['SERVER_ADDR'], 0, 3 ), array( '127', '192', '172', '10.' ) ) ): ?>
<script src="http://<?=$_SERVER['HTTP_HOST'];?>:35729/livereload.js"></script>
<?php endif; // Livereload ?>

</body>
</html>