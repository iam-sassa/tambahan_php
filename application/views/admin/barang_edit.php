<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('admin/_partials/head.php') ?>
</head>

<body>
	<main class="main">
		<?php $this->load->view('admin/_partials/side_nav.php') ?>

		<div class="content">
			<h1>Edit Goods Data</h1>

            <form action="" method="POST">
			<label for="name">product name</label>
				<input type="text" name="name" value="<?= $barangs->name ?>"/>
				<label for="code">product code</label>
				<input type="text" name="code" value="<?= $barangs->code ?>"/>
                <label for="price">price</label>
				<input type="text" name="price" value="<?= $barangs->price ?>"/>
				<label for="init_stock">Init tsock</label>
				<input type="text" name="init_stock" value="<?= $barangs->init_stock ?>"/>
				<select name="status" id="">
					<option value="1">Baru</option>
					<option value="0">Second</option>
				</select>
				<br/>
                <label for="description">Description</label>
				<textarea name="description" value="<?= $barangs->description ?>"></textarea>
				<label for="uom"> uom</label>
				<input type="text" name="uom" value="<?= $barangs->uom ?>"/>
                <label for="updated_at">Updated</label>
				<input type="datetime-local" name="updated_at" value="<?= $barangs->updated_at ?>"/>

				<div>
					<button type="submit" name="submit" class="button" value="submit">Save</button>
				</div>
			</form>

			<?php $this->load->view('admin/_partials/footer.php') ?>
		</div>
	</main>
</body>

</html>