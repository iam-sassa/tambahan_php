<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('admin/_partials/head.php') ?>
</head>

<body>
	<main class="main">
		<?php $this->load->view('admin/_partials/side_nav.php') ?>

		<div class="content">
			<h1>Add new good</h1>

			<form action="" method="POST">
                <label for="code">Product Code</label>
				<input type="text" name="code" placeholder="code"/>
				<label for="name">Product Name</label>
				<input type="text" name="name" placeholder="product name" required title="required"/>
				<label for="price">Product Price</label>
				<input type="text" name="price" placeholder="product name" required title="required"/>
				<label for="image">Product Image</label>
				<input type="file" name="image" required title="required"/>
				<small><?php if (isset($error)) {
	                echo $error;} ?></small>


                <label for="init_stock">Init Stock</label>
				<input type="text" name="init_stock" placeholder="init stock" required title="required"/>
                <label for="status">Status</label>
				<select name="status" id="">
					<option value="1">Baru</option>
					<option value="0">Second</option>
				</select>
				<br/>
                <label for="uom">UOM</label>
				<input type="text" name="uom" required placeholder="uom" title="required"/>
				<label for="description">Description</label>
				<textarea name="description" value="<?= $goods->description ?>"></textarea>
                
                <label for="created_at">Created</label>
				<input type="datetime-local" name="created_at" required title="required"/>



				<div>
					<button type="submit" name="submit" class="button" value="submit">Save</button>
				</div>
			</form>
		</div>
	</main>
</body>

</html>