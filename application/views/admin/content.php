<?php foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>

<?php foreach($js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $titulo; ?>
        <small>Panel de control</small>
      </h1>
    </section>

	<!-- Main content -->
	<section class="content">
		<!-- Info boxes -->
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<?php echo $output; ?>
			</div>
		</div>
	</section>  
</div>
<!-- /.content-wrapper -->

