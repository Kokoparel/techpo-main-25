<?= $this->extend('sejarah/layout'); ?>

<?= $this->section('content'); ?>

<div style="width: 100vw">
	<div class="bg-fillwhite-auto" style="padding: 0; color: white; width: 100vw">
		<div class="page-margin">
			<div id="sejarah-header"
				style="background-image: url(<?= base_url('assets-old/images/background2.jpeg') ?>)">
				<div id="tittle-anim1" class="Smallmont" style=""><span><span
							style="display:block; margin-bottom: 10px;font-size: 30px;">SEJARAH</span>Technology
						Euphoria 2016</span></div>
				<div id="tittle-anim2" class="Smallmont">Technology Euphoria 2016 memiliki tema "Empowering Technology
					for Betterment of Indonesia". Sasaran peserta dalam seminar ini berjumlah 300 orang.
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

							<div class="Smallmont" id="logoku" style="padding-top: 20px;margin-bottom: 0">
								Logo <br>Techphoria 2016
							</div>
							<div id="logopng" style="width:200px; height: 200px">
								<img src="<?= base_url() ?>assets-old/images/logos/16.png" id="logopng"
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
											<td>Game Development Competition </td>
										</tr>
										<tr>
											<td>3</td>
											<td>Business IT case Competition </td>
										</tr>
										<tr>
											<td>4</td>
											<td>Capture the Flag Competition </td>
										</tr>
										<tr>
											<td>5</td>
											<td>Digital Imaging Competition </td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<div class="uk-width-1-3@m">
					<div id="info-right">
						<div class="Smallmont" style="color: white">
							Penyelenggaraan <br>Techphoria 2016
						</div>
						<div class="Smallmont" id="hayongapain" style="font-size: 14px;">
							Technology Euphoria diselenggarakan oleh seluruh Keluarga Mahasiswa Fakultas Ilmu Komputer
							Universitas Sriwijaya. <br> <br> Technology Euphoria atau yang disingkat dengan nama
							Techphoria adalah serangkaian acara IT tahunan dengan kompetisi tingkat nasional sebagai
							ajang edukatif bagi Universitas/Politeknik se-Indonesia.
							<span style="display: block;margin-top: 15px">Kompetisi final diadakan langsung pada 7
								Oktober 2016 di Fakultas Ilmu Komputer Universitas Sriwijaya, Indralaya dimana
								sebelumnya sudah dilaksanakan penyeleksian</span>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="highlights">
		<div class="Mediummont" style="text-align: center;font-weight: 700; font-size: 30px;padding-top: 100px">
			Techphoria 2016 Highlights
		</div>

		<div class="pomar">
			<div class="owl-carousel owl-theme">
				<?php for ($i = 1; $i < 7; $i++) { ?>
					<div class="item"> <img src="<?= base_url('assets-old/sejarah-image/tehcpo16-' . $i . '.jpg') ?>"
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
				Daftar pemenang Techphoria 2016
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
										<span class="marbot">Atika Rahmawati</span>
										<span class="marbot">Rizaldy Alkautsar </span>
										<span class="marbot">Nindy Aditya Dewi</span>
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
										<span class="marbot">Yohanes Sitanggang</span>
										<span class="marbot">Galih Muji Agung</span>
									</div>
									<div class="cell" data-title="Utusan">
										Universitas Indonesia
									</div>
								</div>

								<div class="row">
									<div class="cell" data-title="Juara">
										3
									</div>
									<div class="cell" data-title="Nama Peserta">
										<span class="marbot">Astarina Natyasari</span>
										<span class="marbot">Indra Nicolosci Waskita</span>
										<span class="marbot">Neyssa Nathania</span>
									</div>
									<div class="cell" data-title="Utusan">
										Institut Teknologi Bandung
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
										<span class="marbot">John Stephanus Peter</span>
										<span class="marbot">Arianto Wibowo </span>
										<span class="marbot">Fendy</span>
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
										<span class="marbot"> Tommy</span>
										<span class="marbot">Denny Ho</span>
										<span class="marbot">Alvin Yaputra</span>
									</div>
									<div class="cell" data-title="Utusan">
										SMIK Mikroskil
									</div>
								</div>

								<div class="row">
									<div class="cell" data-title="Juara">
										3
									</div>
									<div class="cell" data-title="Nama Peserta">
										<span class="marbot">Wahid Haniv Aryanda</span>
										<span class="marbot">Rahmad Arifan Hr</span>
										<span class="marbot">Nur Muhammad</span>
									</div>
									<div class="cell" data-title="Utusan">
										Universitas Islam Indonesia
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
					<span class="header-win">Capture The Flag</span>
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
										<span class="marbot">I Ketut Pasek Asmarajaya</span>
										<span class="marbot">Dewa Gede Mahendra</span>
										<span class="marbot">Ida Bagus Budanthara</span>
									</div>
									<div class="cell" data-title="Utusan">
										STMIK STIKOM Bali
									</div>
								</div>

								<div class="row">
									<div class="cell" data-title="Juara">
										2
									</div>
									<div class="cell" data-title="Nama Peserta">
										<span class="marbot"> Ibnu Batutah Zarizal</span>
										<span class="marbot">Ilham Rizkanda</span>
										<span class="marbot">Ryan Andri</span>
									</div>
									<div class="cell" data-title="Utusan">
										Universitas Bina Darma
									</div>
								</div>

								<div class="row">
									<div class="cell" data-title="Juara">
										3
									</div>
									<div class="cell" data-title="Nama Peserta">
										<span class="marbot">Muhammad Nur Arifin</span>
										<span class="marbot">Muzammil Insani AL F</span>
										<span class="marbot">Tri Widiarman</span>
									</div>
									<div class="cell" data-title="Utusan">
										Universitas Muhammadiyah Jakarta
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
					<span class="header-win">Game Development</span>
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
										<span class="marbot">Ilham Fathy Saputra</span>
										<span class="marbot">Muhammad Luthfi</span>
										<span class="marbot">Nayana Taradhanti Hodi</span>
									</div>
									<div class="cell" data-title="Utusan">
										Universitas Indonesia
									</div>
								</div>

								<div class="row">
									<div class="cell" data-title="Juara">
										2
									</div>
									<div class="cell" data-title="Nama Peserta">
										<span class="marbot">Rizal Nurman Wahyudi</span>
										<span class="marbot">Mochammad Sodiqin</span>
										<span class="marbot">Huzaini</span>
									</div>
									<div class="cell" data-title="Utusan">
										Universitas Trunojoyo Madura
									</div>
								</div>

								<div class="row">
									<div class="cell" data-title="Juara">
										3
									</div>
									<div class="cell" data-title="Nama Peserta">
										<span class="marbot"> Bayu Tri Putra H</span>
										<span class="marbot">Fajar Alingga Mukti</span>
										<span class="marbot">Elia Pramana Putra</span>
									</div>
									<div class="cell" data-title="Utusan">
										Institut Bisnis dan Informatika Stikom Surabaya
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
										<span class="marbot"> Aditya Alamsyah</span>

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
										<span class="marbot">Muhammad Alhady</span>
									</div>
									<div class="cell" data-title="Utusan">
										Universitas Bina Darma
									</div>
								</div>

								<div class="row">
									<div class="cell" data-title="Juara">
										3
									</div>
									<div class="cell" data-title="Nama Peserta">
										<span class="marbot"> Listiananda Apriliawan</span>
									</div>
									<div class="cell" data-title="Utusan">
										Universitas Bina Darma
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