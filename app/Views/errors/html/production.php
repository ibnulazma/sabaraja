<!DOCTYPE html>
<html>

<head>
	<title>Terjadi Kesalahan</title>
	<style>
		body {
			font-family: Arial;
			background: #fff3f3;
			text-align: center;
			padding: 60px;
		}

		.box {
			background: white;
			padding: 40px;
			border-radius: 10px;
			display: inline-block;
			box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
		}

		h1 {
			color: #c0392b;
		}

		p {
			color: #555;
		}

		a {
			margin-top: 20px;
			display: inline-block;
			padding: 10px 20px;
			background: #27ae60;
			color: white;
			border-radius: 5px;
			text-decoration: none;
		}
	</style>
</head>

<body>
	<div class="box">
		<h1>Terjadi Kesalahan</h1>
		<p>Maaf, sistem sedang mengalami gangguan.<br>Silakan coba beberapa saat lagi.</p>
		<a href="<?= base_url() ?>">Kembali ke Beranda</a>
	</div>
</body>

</html>