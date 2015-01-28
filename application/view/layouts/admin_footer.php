</div><!-- End Container -->
   <div id="footer">
   	<p>Copyright <?php echo date("Y", time()); ?>, Hemant-Mann</p>
   </div>
   <!-- javascripts -->
	<script src="<?php echo JAVASCRIPTS; ?>jquery-2.1.1.min.js"></script>
    <script src="<?php echo JAVASCRIPTS; ?>bootstrap.min.js"></script>
    <script src="<?php echo JAVASCRIPTS; ?>jquery.colorbox-min.js"></script>
    <script src="<?php echo JAVASCRIPTS; ?>script.js"></script>
  </body>
</html>
<?php if(isset($database)) { $database->close_connection(); } ?>