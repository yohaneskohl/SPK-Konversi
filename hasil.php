<head>
	<link rel="stylesheet" type="text/css" href="semantic/dist/semantic.min.css">
</head>
<?php
include('navbar.php');
require("controller/Kriteria.php");

$kriteria = Index("SELECT * FROM kriteria");
$alternatif = Index("SELECT * FROM alternatif");
$bobot = Index("SELECT * FROM pembobotan");
$test = [];
$varV = [];
$totalS = 0;
?>
<section class="section">
	<div class="container">
		<div class="row">
			<div class="columns">
				<div class="column">
					<div class="card animate__animated animate__zoomIn">
						<div class="card-header">
							<p class="card-header-title">Table penilaian (Metode WP)</p>
						</div>
						<div class="card-content">
							<div class="table-container">
								<table class="table is-fullwidth">
									<thead class="has-background-success">
										<tr>
											<th class="has-text-white">No</th>
											<th class="has-text-white">Alternatif</th>
											<?php foreach ($kriteria as $header): ?>
												<th class="has-text-white">
													<?= $header["nama"] ?>
												</th>
											<?php endforeach ?>
										</tr>
									</thead>
									<tfoot class="has-background-success">
										<tr>
											<th class="has-text-white">No</th>
											<th class="has-text-white">Alternatif</th>
											<?php foreach ($kriteria as $header): ?>
												<th class="has-text-white">
													<?= $header["nama"] ?>
												</th>
											<?php endforeach ?>
										</tr>
									</tfoot>
									<tbody>
										<?php $a = 1 ?>
										<?php foreach ($alternatif as $row): ?>
											<tr>
												<th>
													<?= $a++ ?>
												</th>
												<td>
													<?= $row["nama"] ?>
												</td>
												<?php foreach ($bobot as $pembobot): ?>
													<?php if ($pembobot["id_alternatif"] == $row["id_alternatif"]): ?>
														<td>
															<?= $pembobot["nilai"] ?>
														</td>
													<?php endif ?>
												<?php endforeach ?>
											</tr>
										<?php endforeach ?>
									</tbody>
								</table>
							</div>
							<hr>

							<!-- BAGIAN -->

							<!-- Bagian 1: Mencari Nilai Vector (S) -->
							<h4 class="subtitle">Bagian 1 : Mencari Nilai Vector (S) (Metode WP)</h4>
							<p>Pembobotan :</p>
							<?php $d = 1 ?>
							<?php $e = 0 ?>
							<?php foreach ($alternatif as $les): ?>
								<?php $id_alternatif = $les["id_alternatif"] ?>
								<?php $bobot = Index("SELECT * FROM pembobotan WHERE id_alternatif = $id_alternatif"); ?>
								<?php $test[$e] = 1 ?>
								S
								<?= $d++ ?> =
								<?php foreach ($bobot as $pembobot): ?>
									<?php $idbobot = $pembobot["id"] ?>
									<?php $kriteria = Index("SELECT * FROM pv_kriteria WHERE id_kriteria = $idbobot"); ?>
									<?php foreach ($kriteria as $pv_kriteria): ?>
										<?php
										// Menghitung total bobot dari pv_kriteria
										$total_bobot_result = Index("SELECT SUM(nilai) AS Total FROM pv_kriteria");
										$total_bobot = isset($total_bobot_result[0]['Total']) ? $total_bobot_result[0]['Total'] : 0;
										?>
										<?php if ($pv_kriteria["status"] == "COST"): ?>
											(
											<?= $pembobot["nilai"] . "<sup>" . round($pv_kriteria["nilai"] / $total_bobot, 3) * -1 . "</sup>" ?>)
											<?php $test[$e] = $test[$e] * pow($pembobot["nilai"], round($pv_kriteria["nilai"] / $total_bobot, 3) * -1) ?>
										<?php else: ?>
											(
											<?= $pembobot["nilai"] . "<sup>" . round($pv_kriteria["nilai"] / $total_bobot, 3) . "</sup>" ?>)
											<?php $test[$e] = $test[$e] * pow($pembobot["nilai"], round($pv_kriteria["nilai"] / $total_bobot, 3)) ?>
										<?php endif ?>
									<?php endforeach ?>
								<?php endforeach ?>
								=
								<?= round($test[$e], 3) ?>
								<?php $totalS = $totalS + $test[$e] ?>
								<?php $e++ ?>
								<br>
							<?php endforeach ?>

							<hr>
							<!-- Bagian 2: Mencari Nilai V (V) (Metode WP) -->
							<h4 class="subtitle">Bagian 2 : Mencari Nilai V (V) (Metode WP)</h4>
							<?php $f = 1 ?>
							<?php $g = 0 ?>
							<?php foreach ($alternatif as $row): ?>
								<p>V
									<?= $f++ ?> =
									<?= round($test[$g], 3) . "/" . round($totalS, 3) ?> =
									<?= round($totalS !== 0 ? $test[$g] / $totalS : 0, 3) ?>
								</p>
								<?php $g++ ?>
							<?php endforeach ?>
							<hr>

							<!-- Bagian 4: Hasil (Metode WP) -->
							<h4 class="subtitle">Hasil (Metode WP)</h4>
							<div class="table-container">
								<table class="table is-fullwidth">
									<thead class="has-background-success">
										<tr>
											<th class="has-text-white">No</th>
											<th class="has-text-white">Alternatif</th>
											<th class="has-text-white">Nilai</th>
										</tr>
									</thead>
									<tfoot class="has-background-success">
										<tr>
											<th class="has-text-white">No</th>
											<th class="has-text-white">Alternatif</th>
											<th class="has-text-white">Nilai</th>
										</tr>
									</tfoot>
									<tbody>
										<?php $h = 1 ?>
										<?php $i = 0 ?>
										<?php foreach ($alternatif as $row): ?>
											<tr>
												<th>
													<?= $h++ ?>
												</th>
												<td>
													<?= $row["nama"] ?>
												</td>
												<td>
													<?= round($totalS !== 0 ? $test[$i] / $totalS : 0, 3) ?>
												</td>
											</tr>
											<?php $i++ ?>
										<?php endforeach ?>
									</tbody>
								</table>
							</div>

							<!-- tabel rangking (Metode WP) -->
							<hr>
							<h4 class="subtitle">Hasil Perangkingan (Metode WP)</h4>
							<div class="table-container">
								<table class="table is-fullwidth">
									<thead class="has-background-success">
										<tr>
											<th class="has-text-white">No</th>
											<th class="has-text-white">Nama Alternatif</th>
											<th class="has-text-white">Vi</th>
										</tr>
									</thead>
									<tfoot class="has-background-success">
										<tr>
											<th class="has-text-white">No</th>
											<th class="has-text-white">Nama Alternatif</th>
											<th class="has-text-white">Vi</th>
										</tr>
									</tfoot>
									<tbody>
										<?php
										// Membuat array untuk menyimpan nilai Vi
										$viArray = [];
										foreach ($alternatif as $key => $row) {
											$vi = round($test[$key], 5) / round($totalS, 5);
											$viArray[] = ['index' => $key, 'vi' => $vi];
										}

										// Mengurutkan array berdasarkan nilai Vi secara descending
										usort($viArray, function ($a, $b) {
											return $b['vi'] <=> $a['vi'];
										});

										// Menampilkan hasil setelah diurutkan
										foreach ($viArray as $h => $data):
											$index = $data['index'];
											?>
											<tr>
												<th>
													<?= $h + 1 ?>
												</th>
												<td>
													<?= $alternatif[$index]["nama"] ?>
												</td>
												<td>
													<?= round(round($test[$index], 5) / round($totalS, 5), 5) ?>
												</td>
											</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
						</div>

						<!-- Penjelasan metode AHP -->
						<div class="card-header">
							<p class="card-header-title">Penjelasan Metode AHP</p>
						</div>
						<div class="card-content">
							<p>Metode AHP (Analytic Hierarchy Process) adalah metode pengambilan keputusan yang digunakan untuk mengorganisir dan menganalisis keputusan yang kompleks. AHP didasarkan pada matematika dan psikologi, serta membantu dalam menetapkan prioritas dan membuat keputusan terbaik dengan memperhitungkan berbagai kriteria yang ada.</p>
						</div>

						<!-- Penjelasan metode WP -->
						<div class="card-header">
							<p class="card-header-title">Penjelasan Metode WP</p>
						</div>
						<div class="card-content">
							<p>Metode WP (Weighted Product) adalah metode pengambilan keputusan yang menggunakan perkalian untuk menghubungkan nilai atribut dari setiap alternatif dengan bobot atribut yang bersangkutan. Metode ini sering digunakan dalam pemilihan alternatif terbaik berdasarkan sejumlah kriteria.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
