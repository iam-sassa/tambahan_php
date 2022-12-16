<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('admin/_partials/head.php') ?>
</head>

<body>
	<main class="main">
		<?php $this->load->view('admin/_partials/side_nav.php') ?>

		<div class="content">
			<h1>List of Goods</h1>

			<div class="toolbar">
				<a href="<?= site_url('admin/barang/create') ?>" class="button button-primary" role="button">+ Add Barang</a>
			</div>

			<table class="table">
				<thead>
					<tr>
                        <th style="width: 5%;" class="text-center">No</th>
                        <th style="width:25%;" class="text-center">Image</th>
                        <th style="width: 5%;" class="text-center">Code</th>
                        <th style="width: 5%;" class="text-center">Name</th>
                        <th style="width: 5%;" class="text-center">Init Stock</th>
                        <th style="width: 5%;" class="text-center">Price</th>
                        <th style="width: 5%;" class="text-center">Detail</th>
						<th style="width: 15%;" class="text-center">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($goods as $good): ?>
					<tr>
                        <td>
							<?= $good->id ?>
						</td>
                        <td>
							<img src="<?= base_url('images/'.$good->image) ?>" alt="product images" width="50px" height="50px">
						</td>
                        <td>
							<?= $good->code ?>
						</td>
                        <td>
							<?= $good->name ?>
						</td>
                        <td>
							<?= $good->init_stock ?>
						</td>
                        <td>
							<?= $good->price ?>
						</td>
						<?php if($good->status == 1): ?>
							<td class="text-center text-green">Baru</td>
						<?php else: ?>
							<td class="text-center text-gray">Second</td>
						<?php endif ?>
						<td>
							<div class="action">
								<a href="<?= site_url('admin/barang/edit/'.$good->id) ?>" class="button button-small button" role="button">Edit</a>
								<a href="#" 
									data-delete-url="<?= site_url('admin/barang/delete/'.$good->id) ?>" 
									class="button button-small button-danger" 
									role="button"
									onclick="deleteConfirm(this)">Delete</a>
							</div>
						</td>
					</tr>
					<?php endforeach ?>
				</tbody>
			</table>

			<?php $this->load->view('admin/_partials/footer.php') ?>
		</div>
	</main>

	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script>
		function deleteConfirm(event){
			Swal.fire({
				title: 'Delete Confirmation!',
				text: 'Are you sure to delete the item?',
				icon: 'warning',
				showCancelButton: true,
				cancelButtonText: 'No',
				confirmButtonText: 'Yes Delete',
				confirmButtonColor: 'red'
			}).then(dialog => {
				if(dialog.isConfirmed){
					window.location.assign(event.dataset.deleteUrl);
				}
			});
		}
	</script>

	<?php if($this->session->flashdata('message')): ?>
		<script>
			const Toast = Swal.mixin({
				toast: true,
				position: 'top-end',
				showConfirmButton: false,
				timer: 3000,
				timerProgressBar: true,
				didOpen: (toast) => {
					toast.addEventListener('mouseenter', Swal.stopTimer)
					toast.addEventListener('mouseleave', Swal.resumeTimer)
				}
			})

			Toast.fire({
				icon: 'success',
				title: '<?= $this->session->flashdata('message') ?>'
			})
		</script>
	<?php endif ?>
</body>

</html>