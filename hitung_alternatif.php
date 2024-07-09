<head>
	<link rel="stylesheet" type="text/css" href="semantic/dist/semantic.min.css">
	
</head>
<?php
include('navbar.php');

?>
<?php
require("controller/bobot_alternatif.php");

$halaman = 3;
$hasil = count(Index("SELECT * FROM pembobotan"));
$total = ceil($hasil / $halaman);
$aktif = (isset($_GET["page"])) ? $_GET["page"] : 1;
$awal = ($halaman * $aktif) - $halaman;

$data = Index("SELECT * FROM pembobotan LIMIT $awal,$halaman");
$banding1 = Index("SELECT * FROM alternatif");
$banding2 = Index("SELECT * FROM kriteria");
?>

<section class="section">
	<div class="container">
		<div class="row">
			<div class="columns">
				<div class="column">
					<div class="card animate__animated animate__zoomIn">
						<div class="card-header">
							<p class="card-header-title">Table Pembobotan</p>
							<div class="buttons card-header-icon">
							<a class="button is-link animate__animated animate__bounceInRight" href="pembobotan/add.php">
								<ion-icon name="add-circle"></ion-icon>
								<span class="ml-2">Tambah Data</span>
							</a>

							</div>
						</div>
						<div class="card-content">
							<div class="table-container">
								<table class="table is-fullwidth">
									<thead class="has-background-success">
										<tr>
											<th class="has-text-white">No</th>
											<th class="has-text-white">Kriteria</th>
											<th class="has-text-white">Alternatif</th>
											<th class="has-text-white">Nilai</th>
											<th class="has-text-white">Aksi</th>
										</tr>
									</thead>
									<tfoot class="has-background-success has-text-white">
										<tr>
											<th class="has-text-white">No</th>
											<th class="has-text-white">Kriteria</th>
											<th class="has-text-white">Alternatif</th>
											<th class="has-text-white">Nilai</th>
											<th class="has-text-white">Aksi</th>
										</tr>
									</tfoot>
									<tbody>
										<?php $i = 1 + $awal ?>
										<?php foreach ($data as $row): ?>
											<tr>
												<th>
													<?= $i ?>
												</th>
												<td>
													<?php foreach ($banding2 as $hasil): ?>
														<?php if ($row["id"] == $hasil["id"]): ?>
															<?= $hasil["nama"] ?>
														<?php endif ?>
													<?php endforeach ?>
												</td>
												<td>
													<?php foreach ($banding1 as $result): ?>
														<?php if ($row["id_alternatif"] == $result["id_alternatif"]): ?>
															<?= $result["nama"] ?>
														<?php endif ?>
													<?php endforeach ?>
												</td>
												<td>
													<?php if ($row["nilai"] > 1000000): ?>
														<?= "Rp " . number_format($row["nilai"], 2, ',', '.'); ?>
													</td>
												<?php else: ?>
													<?= $row["nilai"] ?>
												<?php endif ?>
												<td>
													<div class="buttons">
														<a class="button is-link"
															href="hitung_alternatif.php?halaman=editdatabobot&id=<?= $row['id_nilai']; ?>">
															<ion-icon name="create"></ion-icon>
														</a>
														<a href="hitung_alternatif.php?halaman=hapusdatabobot&id=<?= $row['id_nilai']; ?>"
															class="button is-danger"
															onclick="return confirm('Yakin mau hapus data ini?')">
															<ion-icon name="trash"></ion-icon>
														</a>
													</div>
												</td>
											</tr>
											<?php $i++ ?>
										<?php endforeach ?>
									</tbody>
								</table>
							</div>
							<?php require 'controller/PaginationBobot.php'; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<script>
	function archiveFunction(id_nilai) {
		console.log("archiveFunction called with id_nilai:", id_nilai);
		Swal.fire({
			title: 'Yakin mau hapus data ini?',
			text: "kalo sudah dihapus, tidak bisa dibalikin ya!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#276CDA',
			cancelButtonColor: '#F03A5F',
			confirmButtonText: 'Iya, hapus aja',
			showClass: {
				popup: 'animate__animated animate__fadeInDown'
			},
			hideClass: {
				popup: 'animate__animated animate__fadeOutUp'
			}
		}).then((result) => {
			if (result.isConfirmed) {
				window.location.href = "hitung_alternatif.php?halaman=hapusdatabobot&id=" + id_nilai;
			}
		});
	}
</script>