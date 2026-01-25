<!DOCTYPE html>
<html>

<head>
	<title>Halaman Tidak Ditemukan</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background: #f4f6f9;
			text-align: center;
			padding: 50px;
		}

		.box {
			background: white;
			padding: 40px;
			border-radius: 10px;
			box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
			display: inline-block;
		}

		h1 {
			font-size: 80px;
			margin: 0;
			color: #e74c3c;
		}

		p {
			font-size: 18px;
			color: #555;
		}

		a {
			display: inline-block;
			margin-top: 20px;
			padding: 10px 20px;
			background: #3498db;
			color: white;
			text-decoration: none;
			border-radius: 5px;
		}

		a:hover {
			background: #2980b9;
		}
	</style>
</head>

<body>
	<div class="box">
		<h1>404</h1>
		<p>Oops! Halaman yang kamu cari tidak ditemukan.</p>
		<a href="<?= base_url() ?>">Kembali ke Beranda</a>
	</div>
</body>

</html>