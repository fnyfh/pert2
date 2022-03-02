<!DOCTYPE html>
<html lang="en">

  <?php $this->load->view('template/head')?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <?php $this->load->view('template/preloader')?>
  <?php $this->load->view('template/navbar')?>
  <?php $this->load->view('template/slidebar')?>

  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Produk</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      
		<div class="row">
			<div class="col-12">
			  <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
                <br>
                <button class="btn btn-primary" id="btn-create"><i class="fa fa-plus"></i>Create</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>NO</th>
                    <th>Nama Produk</th>
                    <th>Kuantitas</th>
                    <th>Harga Beli</th>
                    <th>Harga Jual</th>
					          <th>Margin</th>
                    <th>Owner</th>
                  </tr>
                  </thead>
                  <tbody>
				            <?php $no=1; foreach($read_produk as $d){
					            $margin = $d->harga_jual-$d->harga_beli;?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $d->nama ?>
                    </td>
                    <td><?= $d->kuantitas ?></td>
                    <td><?= $d->harga_beli ?></td>
                    <td><?= $d->harga_jual ?></td>
					          <td><?= $margin ?></td>
                    <td><?= $d->id_owner ?></td>
                  </tr>
				            <?php } ?>
                  </tbody>
                </table>
		</div>
		</div>
	  </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php $this->load->view('template/footer')?>
</div>
<!-- ./wrapper -->

<?php $this->load->view('template/script')?>
</body>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');   
  });

  $(document).ready(function() {
			var myTable = $('#table').DataTable({});
			
			$(document).on('click','#btn-create',function(){
				$('#Modal').modal('show');
				
				$('#modal-header').html('<i class="fa fa-plus"></i> Create');
				$('#modal-body-update-or-create').removeClass('hidden');
				$('[name="img"]').addClass('hidden');
				$('#modal-body-delete').addClass('hidden');
				$('#modal-button').html('Create');
				$('#modal-button').removeClass('btn-danger');
				$('#modal-button').addClass('btn-success');
				
				$('[name="id"]').val(id);
				$('[name="nama"]').val(nama);
				$('[name="kuantitas"]').val(kuantitas);
        $('[name="harga_jual"]').val(harga_jual);
        $('[name="harga_beli"]').val(harga_beli);
        $('[name="id_owner"]').val(id_owner);
				
				document.form.action = '<?php echo base_url();?>Kasir/Create1';
			});
			
			$(document).on('click','#btn-update',function(){
				$('#Modal').modal('show');
				
				$('#modal-header').html('<i class="fa fa-pencil"></i> Update');
				$('#modal-body-update-or-create').removeClass('hidden');
				$('[name="img"]').removeClass('hidden');
				$('#modal-body-delete').addClass('hidden');
				$('#modal-button').html('Update');
				$('#modal-button').removeClass('btn-danger');
				$('#modal-button').addClass('btn-success');
				
				var id = $(this).data('id');
				var nama = $(this).data('nama');
				var kuantitas = $(this).data('kuantitas');
				var harga_jual = $(this).data('harga_jual');
        var harga_beli = $(this).data('harga_beli');
        var id_owner = $(this).data('id_owner');
				
				$('[name="id"]').val(id);
				$('[name="nama"]').val(nama);
				$('[name="kuantitas"]').val(kuantitas);
				$('[name="harga_jual"]').val(harga_jual);
				$('[name="harga_beli"]').val(harga_beli);
				$('[name="id_owner"]').val(id_owner);
				
				document.form.action = '<?php echo base_url();?>Kasir/Create1';
			});
			
			$(document).on('click','#btn-delete',function(){
				$('#Modal').modal('show');
				$('#modal-button').html('Delete');
				$('#modal-button').removeClass('btn-success');
				$('#modal-button').addClass('btn-danger');
				$('#modal-body-update-or-create').addClass('hidden');
				$('#modal-body-delete').removeClass('hidden');
				$('#modal-header').html('<i class="fa fa-trash"></i> Delete');
				
				var id = $(this).data('id');
				var nama = $(this).data('nama');
				
				$('[name="id"]').val(id);
				$('#name-delete').html(text);
				
				document.form.action = '<?php echo base_url();?>Crud/Delete1';
			});
			
		});
</script>
<!--Modal-->
<form name="form" action="" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
		<div id="Modal" class="modal fade" tabindex="-1">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header" style="text-align:center">
						<h3 id="modal-header"></h3>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						
						<input type="hidden" name="id">
						
						<span id="modal-body-update-or-create">
							<label>Nama Produk</label>
							<input type="text" name="nama" class="form-control" placeholder="Nama Produk">
							<label>Kuantitas</label>
							<input type="number" name="kuantitas" class="form-control" placeholder="Kuantitas">
							<label>Harga Jual</label>
							<input type="text" name="harga_jual" class="form-control" placeholder="Harga Jual">
							<label>Harga Beli</label>
							<input type="text" name="harga_beli" class="form-control" placeholder="Harga Beli">
              				<label>Owner</label>
							<input type="number" name="id_owner" class="form-control" placeholder="Masukan ID Owner">
						</span>
						
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Back</button>
						<button type="submit" class="btn btn-success" id="modal-button">Create</button>
					</div>
				</div>
			</div>
		</div>
	</form>
	<!--Modal-->
</html>
