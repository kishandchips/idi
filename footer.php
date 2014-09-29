	</div><!-- #main -->		
</div><!-- #page -->


<?php if( get_field('want_lightbox')): ?>
	<div id="lightbox" class="popupbox" data-delay="<?php the_field('lightbox_delay') ?>">
		<div id="lightbox-inner">
			<div class="container">
				<div class="span six">
					<?php the_field('lightbox_content', 'option'); ?>
				</div>
				<div class="span four">
					<?php gravity_form(3, false, false, false, '', true); ?>
				</div>
			</div>			
		</div>
	</div>
<?php endif; ?>

<?php wp_footer(); ?>
<!-- responseTAP -->
<script type="text/javascript">
//    var adiInit = "11230", adiRVO = true;
//    var adiFunc = null;
//    (function() {
//       var adiSrc = document.createElement("script"); adiSrc.type = "text/javascript";
//       adiSrc.async = true;
//       adiSrc.src = ("https:" == document.location.protocol ? "https://static-ssl" : "http://static-cdn")
//       	+ ".responsetap.com/static/scripts/rTapTrack.min.js";
//       var s = document.getElementsByTagName("script")[0];
//       s.parentNode.insertBefore(adiSrc, s);
//    })();
// </script>
<!--end of responseTAP -->
</body>
</html>