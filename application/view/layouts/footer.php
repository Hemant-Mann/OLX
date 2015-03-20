</div><!-- End Container -->
   <div id="footer">
   	<p>Copyright <?php echo date("Y", time()); ?>, Hemant-Mann</p>
   </div>
   <!-- javascript -->
	  <script src="<?php echo JAVASCRIPTS; ?>jquery-2.1.3.min.js"></script>
    <script src="<?php echo JAVASCRIPTS; ?>bootstrap.min.js"></script>
    <script src="<?php echo JAVASCRIPTS; ?>jquery.blueimp-gallery.min.js"></script>
    <script src+"<?php echo JAVASCRIPTS; ?>bootstrap-image-gallery.min.js"></script>
    <script src="<?php echo JAVASCRIPTS; ?>script.js"></script>
  </body>
</html>
<?php if(isset($database)) { $database->close_connection(); } ?>