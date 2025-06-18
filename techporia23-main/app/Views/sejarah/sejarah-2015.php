<?= $this->extend('sejarah/layout'); ?>

<?= $this->section('content'); ?>

<div style="width: 100vw">
	<div class="bg-fillwhite-auto" style="padding: 0; color: white; width: 100vw">
		<div class="page-margin">
			<div id="sejarah-header"
				style="background-image: url(<?= base_url('assets-old/images/background2.jpeg') ?>)">
				<div id="tittle-anim1" class="Smallmont" style=""><span><span
							style="display:block; margin-bottom: 10px;font-size: 30px;">SEJARAH</span>Technology
						Euphoria 2015</span></div>
				<div id="tittle-anim2" class="Smallmont" style="">Technology Euphoria 2015 mempunyai tema “Indonesian
					Youth and Technology in Harmony”
				</div>

			</div>
		</div>
	</div>
	<div class="section-140"></div>
	<div id="logo-bar">
		<div class="page-margin">
			<div class="uk-grid-collapse" uk-grid>
				<div class="uk-width-expand@m">
					<div class="carder">
						<div class="card-head">
							<div class="ball-first"></div>
							<div class="ball-second"></div>
							<div class="ball-second"></div>
						</div>
						<div class="card-body-transparent" style="background-color: #030057;">
							<div class="Smallmont" id="logoku">
								Logo <br>Techphoria 2015
							</div>
							<div id="logopng" style="width:200px; height: 200px;">
								<img src="<?= base_url() ?>assets-old/images/logos/15.png" id="logopng"
									style="width:200px; height: 200px;" alt="">
							</div>
							<div class="ucuy">
								<table class="uk-table uk-table-small uk-table-divider">
									<thead>
										<tr>
											<th colspan="2" class="uk-text-center">Daftar Kompetisi</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<td>Web Development Competition </td>
										</tr>
										<tr>
											<td>2</td>
											<td>Mobile Game Development Competition </td>
										</tr>
										<tr>
											<td>3</td>
											<td>Competitive Programming </td>
										</tr>
										<tr>
											<td>4</td>
											<td>Manipulation Photography Competition </td>
										</tr>
										<tr>
											<td>5</td>
											<td> Poster Design Competition </td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<div class="uk-width-1-3@m">
					<div id="info-right">
						<div class="Smallmont"
							style="font-weight: 700; font-size: 20px;line-height: 1.7; margin-bottom: 30px; text-align: center; color: white">
							Penyelenggaraan <br>Techphoria 2015
						</div>
						<div class="Smallmont" id="hayongapain">
							Pagelaran Nasional TIK Mahasiswa yang diberi nama Technology Euphoria 2015 adalah
							serangkaian acara IT (Information Technology) tingkat Nasional yang diselenggarakan oleh
							Keluarga Mahasiswa Fakultas Ilmu Komputer Universitas Sriwijaya yang bertujuan untuk menjadi
							bagian dari pemacu peningkatan perkembangan IT di Indonesia.
							<span style="display: block;margin-top: 15px">Kompetisi final diadakan langsung pada 2
								Oktober 2015 di Fakultas Ilmu Komputer Universitas Sriwijaya, Indralaya dimana
								sebelumnya sudah dilaksanakan penyeleksian</span>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="highlights">
		<div class="Mediummont" style="text-align: center;font-weight: 700; font-size: 30px;padding-top: 100px">
			Techphoria 2015 Highlights
		</div>

		<div class="pomar">
			<div class="owl-carousel owl-theme">
				<?php for ($i = 1; $i < 7; $i++) { ?>
					<div class="item"> <img src="<?= base_url('assets-old/sejarah-image/tehcpo15-' . $i . '.jpg') ?>"
							style="width: 270px" class="highlight-foto" alt=""></div>
				<?php } ?>
			</div>
		</div>
	</div>
	<div class="bg-fillwhite-auto"
		style="background-image: url(<?= base_url('assets-old/images/background2.jpeg') ?>); color: white;background-repeat:no-repeat;background-size:cover;">
		<div class="page-margin">
			<div class="Mediummont" style="font-size:30px; font-weight: 700;text-align: center;margin-bottom: 50px;">
				Daftar Universitas Peserta Techphoria
			</div>
			<div class="uk-grid-collapse" uk-grid>
				<div class="uk-width-1-3@m">
					<table class="uk-table uk-table-small uk-table-divider">
						<tbody>
							<tr>
								<td>1</td>
								<td>Universitas Indonesia</td>
							</tr>
							<tr>
								<td>2</td>
								<td>Universitas Sriwijaya</td>
							</tr>
							<tr>
								<td>3</td>
								<td>Institut Teknologi Bandung</td>
							</tr>
							<tr>
								<td>4</td>
								<td>Universitas Sumatera Utara</td>
							</tr>
							<tr>
								<td>5</td>
								<td>Universitas Atma Jaya Yogyakarta</td>
							</tr>
							<tr>
								<td>6</td>
								<td>Universitas Gunadrama</td>
							</tr>
							<tr>
								<td>7</td>
								<td>Universitas Islam Indonesia</td>
							</tr>
							<tr style="border-bottom: solid 1px white">
								<td>8</td>
								<td>Institut Teknologi Del</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="uk-width-1-3@m">
					<table class="uk-table uk-table-small uk-table-divider">
						<tbody>
							<tr>
								<td>9</td>
								<td>STMIK-STIE Mikroskil</td>
							</tr>
							<tr>
								<td>10</td>
								<td>Institut Teknologi Sepuluh Nopember</td>
							</tr>
							<tr>
								<td>11</td>
								<td>STMIK STIKOM Bali</td>
							</tr>
							<tr>
								<td>12</td>
								<td>Universitas Bina Darma</td>
							</tr>
							<tr>
								<td>13</td>
								<td>Universitas Muhammadiyah Jakarta</td>
							</tr>
							<tr>
								<td>14</td>
								<td>STMIK PalComTech</td>
							</tr>
							<tr>
								<td>15</td>
								<td>Universitas Trunojoyo Madura</td>
							</tr>
							<tr style="border-bottom: solid 1px white">
								<td>16</td>
								<td>Institut Stikom Surabaya</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="uk-width-1-3@m">
					<table class="uk-table uk-table-small uk-table-divider">
						<tbody>

							<tr>
								<td>17</td>
								<td>Universitas Diponegoro</td>
							</tr>
							<tr>
								<td>18</td>
								<td>Universitas Gadjahmada</td>
							</tr>
							<tr>
								<td>19</td>
								<td>Universitas Andalas</td>
							</tr>
							<tr>
								<td>20</td>
								<td>Universitas Bina Nusantara</td>
							</tr>
							<tr>
								<td>21</td>
								<td>Universitas Bhayangkara Jaya</td>
							</tr>
							<tr>
								<td>22</td>
								<td>Institut Pertanian Bogor</td>
							</tr>
							<tr>
								<td>23</td>
								<td>Politeknik Meta Industri</td>
							</tr>
							<tr style="border-bottom: solid 1px white">
								<td>24</td>
								<td>Politeknik Negeri Sriwijaya</td>
							</tr>
				</div>
				</tbody>
				</table>
			</div>
		</div>
	</div>

	<div class="bg-fillwhite-auto"
		style="background-image: url(<?= base_url('assets-old/images/background2.jpeg') ?>); color: white;background-repeat:no-repeat;background-size:cover;">
		<div class="page-margin">
			<div class="Mediummont" style="font-size:30px; font-weight: 700;text-align: center">
				Daftar pemenang Techphoria 2015
			</div>

			<div>
				<div class="Mediummont"
					style="font-size:25px; font-weight: 700;text-align: center;margin-top: 70px;margin-bottom: 10px">
					<span class="header-win">Mobile Game Development</span>
				</div>
				<div class="limiter">
					<div class="container-table100">
						<div class="wrap-table100">
							<div class="table">
								<div class="row header" style="background-color: #030057;">
									<div class="cell">
										Juara
									</div>
									<div class="cell">
										Nama Peserta
									</div>
									<div class="cell">
										Utusan
									</div>

								</div>

								<div class="row">
									<div class="cell" data-title="Juara">
										I
									</div>
									<div class="cell" data-title="Nama Peserta">
										<span class="marbot">Hisbullah Akbar</span>
										<span class="marbot">Adhityah Anugrah</span>
										<span class="marbot">Elbananda Permana</span>
									</div>
									<div class="cell" data-title="Utusan">
										Universitas Sriwijaya
									</div>
								</div>

								<div class="row">
									<div class="cell" data-title="Juara">
										2
									</div>
									<div class="cell" data-title="Nama Peserta">
										<span class="marbot">Noer Dzaky Putra</span>
										<span class="marbot">Natasha Aufanada Ramdani</span>
										<span class="marbot">Rizki Raynaldy</span>
									</div>
									<div class="cell" data-title="Utusan">
										Institut Pertanian Bogor
									</div>
								</div>

								<div class="row">
									<div class="cell" data-title="Juara">
										3
									</div>
									<div class="cell" data-title="Nama Peserta">
										<span class="marbot">Sugeng Riyanti</span>
										<span class="marbot">Hana Hanifah</span>
										<span class="marbot">Sigit Prabowo</span>
									</div>
									<div class="cell" data-title="Utusan">
										Universitas Islam Indonesia Yogyakarta
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div>
				<div class="Mediummont"
					style="font-size:25px; font-weight: 700;text-align: center;margin-top: 70px;margin-bottom: 10px">
					<span class="header-win">Competitive Programming</span>
				</div>
				<div class="limiter">
					<div class="container-table100">
						<div class="wrap-table100">
							<div class="table">
								<div class="row header" style="background-color: #030057;">
									<div class="cell">
										Juara
									</div>
									<div class="cell">
										Nama Peserta
									</div>
									<div class="cell">
										Utusan
									</div>
								</div>

								<div class="row">
									<div class="cell" data-title="Juara">
										I
									</div>
									<div class="cell" data-title="Nama Peserta">
										<span class="marbot">Dennis Daslim</span>
										<span class="marbot">Alvin Yaputra</span>
										<span class="marbot">Denny Ho</span>
									</div>
									<div class="cell" data-title="Utusan">
										STMIK Mikrosil Medan
									</div>
								</div>

								<div class="row">
									<div class="cell" data-title="Juara">
										2
									</div>
									<div class="cell" data-title="Nama Peserta">
										<span class="marbot">Fitrah Ramadhan</span>
										<span class="marbot">Natasha Aufanada Ramdani</span>
										<span class="marbot">Rizki Raynaldy</span>
									</div>
									<div class="cell" data-title="Utusan">
										Universitas Gunadarma Depok
									</div>
								</div>

								<div class="row">
									<div class="cell" data-title="Juara">
										3
									</div>
									<div class="cell" data-title="Nama Peserta">
										<span class="marbot"> Sugeng Riyanti</span>
										<span class="marbot">Fawwaz Kurniawan</span>
										<span class="marbot">Akhmad Syarifurrahman</span>
									</div>
									<div class="cell" data-title="Utusan">
										Universitas Islam Indonesia Yogyakarta
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div>
				<div class="Mediummont"
					style="font-size:25px; font-weight: 700;text-align: center;margin-top: 70px;margin-bottom: 10px">
					<span class="header-win">Web Development</span>
				</div>
				<div class="limiter">
					<div class="container-table100">
						<div class="wrap-table100">
							<div class="table">
								<div class="row header" style="background-color: #030057;">
									<div class="cell">
										Juara
									</div>
									<div class="cell">
										Nama Peserta
									</div>
									<div class="cell">
										Utusan
									</div>
								</div>

								<div class="row">
									<div class="cell" data-title="Juara">
										I
									</div>
									<div class="cell" data-title="Nama Peserta">
										<span class="marbot">I Nyoman Andi Radita</span>
										<span class="marbot">I Wayam Okariyadi</span>
										<span class="marbot">Hisyam Rahmawan</span>
									</div>
									<div class="cell" data-title="Utusan">
										Universitas Atmajaya Yogyakarta
									</div>
								</div>

								<div class="row">
									<div class="cell" data-title="Juara">
										2
									</div>
									<div class="cell" data-title="Nama Peserta">
										<span class="marbot">Zefta Aditya</span>
										<span class="marbot">Muhammad Anshori</span>
										<span class="marbot">Mutia Fadila Putri</span>
									</div>
									<div class="cell" data-title="Utusan">
										Universitas Sriwijaya
									</div>
								</div>

								<div class="row">
									<div class="cell" data-title="Juara">
										3
									</div>
									<div class="cell" data-title="Nama Peserta">
										<span class="marbot"> Rifki Nurfaiz</span>
										<span class="marbot">M Rizki Noerhamid</span>
									</div>
									<div class="cell" data-title="Utusan">
										Universitas Indonesia
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div>
				<div class="Mediummont"
					style="font-size:25px; font-weight: 700;text-align: center;margin-top: 70px;margin-bottom: 10px">
					<span class="header-win">Poster Design</span>
				</div>
				<div class="limiter">
					<div class="container-table100">
						<div class="wrap-table100">
							<div class="table">
								<div class="row header" style="background-color: #030057;">
									<div class="cell">
										Juara
									</div>
									<div class="cell">
										Nama Peserta
									</div>
									<div class="cell">
										Utusan
									</div>
								</div>

								<div class="row">
									<div class="cell" data-title="Juara">
										I
									</div>
									<div class="cell" data-title="Nama Peserta">
										<span class="marbot">Supradi</span>

									</div>
									<div class="cell" data-title="Utusan">
										SMK Negeri 2 Prabumulih
									</div>
								</div>

								<div class="row">
									<div class="cell" data-title="Juara">
										2
									</div>
									<div class="cell" data-title="Nama Peserta">
										<span class="marbot">Lailatul Kiftiah</span>
									</div>
									<div class="cell" data-title="Utusan">
										SMA Negeri 12 Palembang
									</div>
								</div>

								<div class="row">
									<div class="cell" data-title="Juara">
										3
									</div>
									<div class="cell" data-title="Nama Peserta">
										<span class="marbot">Alisa Rosalina</span>
									</div>
									<div class="cell" data-title="Utusan">
										SMA Pusri Palembang
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div>
				<div class="Mediummont"
					style="font-size:25px; font-weight: 700;text-align: center;margin-top: 70px;margin-bottom: 10px">
					<span class="header-win">Digital Imaging</span>
				</div>
				<div class="limiter">
					<div class="container-table100">
						<div class="wrap-table100">
							<div class="table">
								<div class="row header" style="background-color: #030057;">
									<div class="cell">
										Juara
									</div>
									<div class="cell">
										Nama Peserta
									</div>
									<div class="cell">
										Utusan
									</div>
								</div>

								<div class="row">
									<div class="cell" data-title="Juara">
										I
									</div>
									<div class="cell" data-title="Nama Peserta">
										<span class="marbot">Deni Aprilyadi</span>

									</div>
									<div class="cell" data-title="Utusan">
										Universitas Sriwijaya
									</div>
								</div>

								<div class="row">
									<div class="cell" data-title="Juara">
										2
									</div>
									<div class="cell" data-title="Nama Peserta">
										<span class="marbot"> Masud Abidin</span>
									</div>
									<div class="cell" data-title="Utusan">
										Universitas Sarjanawiyata Tamansiswa Yogyakarta
									</div>
								</div>

								<div class="row">
									<div class="cell" data-title="Juara">
										3
									</div>
									<div class="cell" data-title="Nama Peserta">
										<span class="marbot">Sepriansyah</span>
									</div>
									<div class="cell" data-title="Utusan">
										Universitas Sriwijaya
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?= $this->endSection(); ?>