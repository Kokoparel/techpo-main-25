<?= $this->extend('sejarah/layout'); ?>

<?= $this->section('content'); ?>

<div style="width: 100vw">
	<div class="bg-fillwhite-auto" style="padding: 0; color: white; width: 100vw">
		<div class="page-margin">
			<div id="sejarah-header"
				style="background-image: url(<?= base_url('assets-old/images/background2.jpeg') ?>)">
				<div id="tittle-anim1" class="Smallmont" style=""><span><span
							style="display:block; margin-bottom: 10px;font-size: 30px;">SEJARAH</span>Technology
						Euphoria 2018</span></div>
				<div id="tittle-anim2" class="Smallmont" style="">Technology Euphoria 2018 memiliki tema "Pemberdayaan
					Teknologi Informasi di Era Globalisasi Guna Memajukan Sumber Daya di Indonesia".
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
								Logo <br>Techphoria 2018
							</div>
							<div id="logopng" style="width:200px; height: 200px;">
								<img src="<?= base_url() ?>assets-old/images/logos/18.png" id="logopng"
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
											<td>Competitive Programming Competition </td>
										</tr>
										<tr>
											<td>2</td>
											<td>Paper Competition </td>
										</tr>
										<tr>
											<td>3</td>
											<td>IT case Competition </td>
										</tr>
										<tr>
											<td>4</td>
											<td>Network Competition </td>
										</tr>
										<tr>
											<td>5</td>
											<td>Robotic Competition </td>
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
							Penyelenggaraan <br>Techphoria 2018
						</div>
						<div class="Smallmont" id="hayongapain">
							Techphoria merupakan serangkaian acara IT tahunan dengan fokus utama kompetisi tingkat
							nasional yang diperuntukan bagi Universitas/Politeknik se-Indonesia untuk meningkatkan
							kesadaran tentang peranan IT serta meningkatkan nilai keilmuan dan komprehensif di bidang
							ilmu teknologi informasi komputer, ajang ini sendiri diprakarsai oleh Mahasiswa Fakultas
							Ilmu Komputer Universitas Sriwijaya.
							<span style="display: block;margin-top: 15px">Technology Euphoria 2018 memiliki event khusus
								yaitu Fexo dan Seminar</span>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="highlights"
		<div class="Mediummont" style="text-align: center;font-weight: 700; font-size: 30px;padding-top: 100px">
			Techphoria 2018 Highlights
		</div>

		<div class="pomar">
			<div class="owl-carousel owl-theme">
				<?php for ($i = 1; $i < 7; $i++) { ?>
					<div class="item"> <img src="<?= base_url('assets-old/sejarah-image/techpho18-' . $i . '.jpg') ?>"
							style="width: 270px" class="highlight-foto" alt=""></div>
				<?php } ?>
			</div>
		</div>
	</div>
	<div class="bg-fillwhite-auto"
		style="background-image: url(<?= base_url('assets-old/images/background2.jpeg') ?>); color: white;background-repeat:no-repeat;background-size:cover;">
		<div class="page-margin">
			<div class="Mediummont" style="font-size:30px; font-weight: 700;text-align: center;margin-bottom: 50px">
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
				Daftar pemenang Techphoria 2018
			</div>

			<div>
				<div class="Mediummont"
					style="font-size:25px; font-weight: 700;text-align: center;margin-top: 70px;margin-bottom: 10px">
					<span class="header-win">Bussines IT Case</span>
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
										<span class="marbot">Al Varrel Putra</span>
										<span class="marbot">Ronaldo Matthew </span>
										<span class="marbot">Alesandro Aria</span>
									</div>
									<div class="cell" data-title="Utusan">
										Institut Teknologi Bandung
									</div>
								</div>

								<div class="row">
									<div class="cell" data-title="Juara">
										2
									</div>
									<div class="cell" data-title="Nama Peserta">
										<span class="marbot">Adelia Farah Aglia</span>
										<span class="marbot">Christian Wibisono</span>
									</div>
									<div class="cell" data-title="Utusan">
										Institut Teknologi Bandung
									</div>
								</div>

								<div class="row">
									<div class="cell" data-title="Juara">
										3
									</div>
									<div class="cell" data-title="Nama Peserta">
										<span class="marbot">Nurmasita Anula</span>
										<span class="marbot">Madyus Randika</span>
										<span class="marbot">Wahyuni Cahnia Sari</span>
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
										<span class="marbot">Nurlitha Dhuha Fatmawati</span>
										<span class="marbot">Yolanda Hertita Pratama</span>
									</div>
									<div class="cell" data-title="Utusan">
										Institur Teknologi Sepuluh Nopember
									</div>
								</div>

								<div class="row">
									<div class="cell" data-title="Juara">
										2
									</div>
									<div class="cell" data-title="Nama Peserta">
										<span class="marbot">Sidiq Tri Prastiko</span>
										<span class="marbot">Josua Aditya Mustiko</span>>
									</div>
									<div class="cell" data-title="Utusan">
										Universitas Gadjah Mada
									</div>
								</div>

								<div class="row">
									<div class="cell" data-title="Juara">
										3
									</div>
									<div class="cell" data-title="Nama Peserta">
										<span class="marbot">Hansvin Tandi Sugata</span>
										<span class="marbot">Richard Putra</span>
									</div>
									<div class="cell" data-title="Utusan">
										Bina Nusantara University
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
					<span class="header-win">Paper Competition</span>
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
										<span class="marbot">Gey Nouvan</span>
										<span class="marbot">Samuel Angga Wijaya</span>
										<span class="marbot">Kelfin Yonatan Silitonga</span>
									</div>
									<div class="cell" data-title="Utusan">
										Universitas Sumatera Utara
									</div>
								</div>

								<div class="row">
									<div class="cell" data-title="Juara">
										2
									</div>
									<div class="cell" data-title="Nama Peserta">
										<span class="marbot">Adelia Farah Aglia</span>
										<span class="marbot">Angga Tri Rizki Ramadhani</span>
										<span class="marbot">Muhammad Dika Muhsin</span>
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
										<span class="marbot">Hedi Yunus</span>
										<span class="marbot">Tisa Monita</span>
										<span class="marbot">Suci Inayah</span>
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

			<div>
				<div class="Mediummont"
					style="font-size:25px; font-weight: 700;text-align: center;margin-top: 70px;margin-bottom: 10px">
					<span class="header-win">Network Competition</span>
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
										<span class="marbot">Mukhlish Abdul Aziz</span>

									</div>
									<div class="cell" data-title="Utusan">
										Universitas Diponegoro
									</div>
								</div>

								<div class="row">
									<div class="cell" data-title="Juara">
										2
									</div>
									<div class="cell" data-title="Nama Peserta">
										<span class="marbot">Abda Rafi Hamaminata</span>

									</div>
									<div class="cell" data-title="Utusan">
										Universitas Diponegoro
									</div>
								</div>

								<div class="row">
									<div class="cell" data-title="Juara">
										3
									</div>
									<div class="cell" data-title="Nama Peserta">
										<span class="marbot">Ridwan Dwi Susilo</span>
									</div>
									<div class="cell" data-title="Utusan">
										Politeknik Meta Industri
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