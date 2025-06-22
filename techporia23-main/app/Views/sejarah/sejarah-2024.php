<?= $this->extend('sejarah/layout'); ?>

<?= $this->section('content'); ?>

<div style="width: 100vw">
	<div class="bg-fillwhite-auto" style="padding: 0; color: white; width: 100vw">
		<div class="page-margin">
			<div id="sejarah-header"
				style="background-image: url(<?= base_url('assets-old/images/background2.jpeg') ?>)">
				<div id="tittle-anim1" class="Smallmont" style=""><span><span
							style="display:block; margin-bottom: 10px;font-size: 30px;">SEJARAH</span>Technology
						Euphoria 2023</span></div>
				<div id="tittle-anim2" class="Smallmont" style="">Technology Euphoria 2023 memiliki tema "Expressing, Educating, and Inspiring Change through Digital Creative in the Era of 5.0".
				</div>
			</div>
		</div>
	</div>
	<div class="section-140"></div>
	<div id="logo-bar" style="color: white;">
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
								Logo <br>Techphoria 2023
							</div>
							<div id="logopng" style="width:200px; height: 200px;">
								<img src="<?= base_url() ?>assets-old/images/logos/23.png" id="logopng"
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
											<td>Web Development Competition </td>
										</tr>
										<tr>
											<td>3</td>
											<td>UI/UX Competition </td>
										</tr>
										<tr>
											<td>4</td>
											<td>Business Plan Competition </td>
										</tr>
										<tr>
											<td>5</td>
											<td>Networking Competition </td>
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
							Penyelenggaraan <br>Techphoria 2023
						</div>
						<div class="Smallmont" id="hayongapain">
							Techphoria merupakan serangkaian acara IT tahunan dengan fokus utama kompetisi tingkat
							nasional yang diperuntukan bagi Universitas/Politeknik se-Indonesia untuk meningkatkan
							kesadaran tentang peranan IT serta meningkatkan nilai keilmuan dan komprehensif di bidang
							ilmu teknologi informasi komputer, ajang ini sendiri diprakarsai oleh Mahasiswa Fakultas
							Ilmu Komputer Universitas Sriwijaya.
							<span style="display: block;margin-top: 15px">Technology Euphoria 2023 memiliki event khusus
								yaitu Fexo dan Seminar</span>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="highlights">
		<div class="Mediummont" style="text-align: center;font-weight: 700; font-size: 30px;padding-top: 100px">
			Techphoria 2023 Highlights
		</div>

		<div class="pomar">
			<div class="owl-carousel owl-theme">
				<?php for ($i = 1; $i < 8; $i++) { ?>
					<div class="item"> <img src="<?= base_url('assets-old/sejarah-image/techpho23-' . $i . '.jpg') ?>"
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
								<td>Universitas Gadjah Mada</td>
							</tr>
							<tr>
								<td>2</td>
								<td>Institut Teknologi Bandung</td>
							</tr>
							<tr>
								<td>3</td>
								<td>Institut Pertanian Bogor</td>
							</tr>
							<tr>
								<td>4</td>
								<td>Universitas Diponegoro</td>
							</tr>
							<tr>
								<td>5</td>
								<td>Universitas Brawijaya</td>
							</tr>
							<tr>
								<td>6</td>
								<td>Institut Teknologi Sepuluh November</td>
							</tr>
							<tr>
								<td>7</td>
								<td>Universitas Hasanuddin</td>
							</tr>
							<tr>
								<td>8</td>
								<td>Universitas Sriwijaya</td>
							</tr>
							<tr>
								<td>9</td>
								<td>Telkom University</td>
							</tr>
							<tr>
								<td>10</td>
								<td>Universitas Pelita Harapan</td>
							</tr>
							<tr>
								<td>11</td>
								<td>UPN Veteran Jawa Timur</td>
							</tr>
							<tr>
								<td>12</td>
								<td>Universitas Negeri Padang</td>
							</tr>
							<tr style="border-bottom: solid 1px white">
								<td>13</td>
								<td>Universitas Gunadarma</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="uk-width-1-3@m">
					<table class="uk-table uk-table-small uk-table-divider">
						<tbody>
						<tr>
								<td>14</td>
								<td>Universitas Udayana</td>
							</tr>
							<tr>
								<td>15</td>
								<td>Universitas Bani Saleh</td>
							</tr>
							<tr>
								<td>16</td>
								<td>UIN Raden Fatah</td>
							</tr>
							<tr>
								<td>17</td>
								<td>Universitas Muhammadiyah Palembang</td>
							</tr>
							<tr>
								<td>18</td>
								<td>Universitas Muhammadiyah Surakarta</td>
							</tr>
							<tr>
								<td>19</td>
								<td>Universitas Amikom Yogyakarta</td>
							<tr>
								<td>20</td>
								<td>Universitas Lambung Mangkurat</td>
							</tr>
							<tr>
								<td>21</td>
								<td>Institut Teknologi Telkom Purwokerto</td>
							</tr>
							<tr>
								<td>22</td>
								<td>Sekolah Tinggi Teknologi Terpadu Nurul Fikri</td>
							</tr>
							<tr>
								<td>23</td>
								<td>Politeknik Siber dan Sandi Negara</td>
							</tr>
							<tr>
								<td>24</td>
								<td>Politeknik Negeri Banjarmasin</td>
							</tr>
							<tr>
								<td>25</td>
								<td>Politeknik Caltex Riau</td>
							</tr>
							<tr style="border-bottom: solid 1px white">
								<td>26</td>
								<td>Politeknik Negeri Media Kreatif</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="uk-width-1-3@m">
					<table class="uk-table uk-table-small uk-table-divider">
						<tbody>
						<tr>
								<td>27</td>
								<td>Ignatius Global School (IGS)</td>
							</tr>
							<tr>
								<td>28</td>
								<td>SMA Negeri 1 Palembang</td>
							</tr>
							<tr>
								<td>29</td>
								<td>SMA Al-Hikmah Boarding School</td>
							</tr>
							<tr>
								<td>30</td>
								<td>SMA Maitreyawira Palembang</td>
							</tr>
							<tr>
								<td>31</td>
								<td>SMA Regina Pacis Bogor</td>
							</tr>
							<tr>
								<td>32</td>
								<td>SMK IDN Boarding School</td>
							</tr>
							<tr>
								<td>33</td>
								<td>SMK Telkom Malang</td>
							</tr>
							<tr>
								<td>34</td>
								<td>SMK Atisa Dipamkara</td>
							</tr>
							<tr>
								<td>35</td>
								<td>SMK Negeri 1 Sukatani</td>
							</tr>
							<tr>
								<td>36</td>
								<td>SMK ISFI Banjarmasin</td>
							</tr>
							<tr style="border-bottom: solid 1px white">
								<td>37</td>
								<td>MAN 2 Ponorogo</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="bg-fillwhite-auto"
		style="background-image: url(<?= base_url('assets-old/images/background2.jpeg') ?>); color: white;background-repeat:no-repeat;background-size:cover;">
		<div class="page-margin">
			<div class="Mediummont" style="font-size:30px; font-weight: 700;text-align: center">
				Daftar pemenang Techphoria 2023
			</div>

			<div>
				<div class="Mediummont"
					style="font-size:25px; font-weight: 700;text-align: center;margin-top: 70px;margin-bottom: 10px">
					<span class="header-win">Business Plan</span>
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
										<span class="marbot">Sultan Hafizh Alexander</span>
										<span class="marbot">Ramadhan Oktovivian Muhammad</span>
										<span class="marbot">Aldian Prawira</span>
									</div>
									<div class="cell" data-title="Utusan">
										Universitas Telkom
									</div>
								</div>

								<div class="row">
									<div class="cell" data-title="Juara">
										2
									</div>
									<div class="cell" data-title="Nama Peserta">
										<span class="marbot">Nyimas Silvia</span>
										<span class="marbot">Rugaiyah Balqis</span>
										<span class="marbot">Muhammad Fauzan</span>
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
										<span class="marbot">Salman adinata roseno</span>
										<span class="marbot">Fernanda Muhammad Totti</span>
									</div>
									<div class="cell" data-title="Utusan">
										Universitas Gadjah Mada
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
										<span class="marbot">Francis Alexander</span>
										<span class="marbot">Tyrone Matthew Phanghegar</span>
										<span class="marbot">Felix Antonius Suharjo</span>
									</div>
									<div class="cell" data-title="Utusan">
										Universitas Bina Nusantara
									</div>
								</div>

								<div class="row">
									<div class="cell" data-title="Juara">
										2
									</div>
									<div class="cell" data-title="Nama Peserta">
										<span class="marbot">I Gede Arya Raditya Parameswara</span>
										<span class="marbot">Benedict Presley</span>
										<span class="marbot">Mochammad Fariz Rifqi Rizqulloh</span>
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
										<span class="marbot">Luigi Emiliandra</span>
										<span class="marbot">Marvin Alvianus Rainhard</span>
										<span class="marbot">Christivan Komah</span>
									</div>
									<div class="cell" data-title="Utusan">
										SMA Ignatius Global School
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
					<span class="header-win">UI/UX Design</span>
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
										<span class="marbot">Muhammad Fakhri Rizqullah</span>
										<span class="marbot">Naura Tri Raihana</span>
										<span class="marbot">Muhammad Farrel Al-Wafi Frizzy</span>
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
										<span class="marbot">Ramadhan Oktovivian Muhammad</span>
										<span class="marbot">Aldian Prawira</span>
										<span class="marbot">Sultan Hafizh Alexander</span>
									</div>
									<div class="cell" data-title="Utusan">
										Universitas Telkom
									</div>
								</div>

								<div class="row">
									<div class="cell" data-title="Juara">
										3
									</div>
									<div class="cell" data-title="Nama Peserta">
										<span class="marbot">Kesid Dewa Wicaksana</span>
										<span class="marbot">Anda Bagas Aprianto</span>
										<span class="marbot">Yohana Beatrice Nainggolan</span>
									</div>
									<div class="cell" data-title="Utusan">
										Universitas Brawijaya
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
										<span class="marbot">Bayu Fedra A</span>
										<span class="marbot">Muhammad Wahyu Syafi'uddin</span>
										<span class="marbot">Clarisca Audyta Permata</span>

									</div>
									<div class="cell" data-title="Utusan">
										Universitas Muhammadiyah Surakarta
									</div>
								</div>

								<div class="row">
									<div class="cell" data-title="Juara">
										2
									</div>
									<div class="cell" data-title="Nama Peserta">
										<span class="marbot">Emiliano Jossie</span>
										<span class="marbot">Takumi Kozaki</span>
									</div>
									<div class="cell" data-title="Utusan">
										Universitas Gunadarma
									</div>
								</div>

								<div class="row">
									<div class="cell" data-title="Juara">
										3
									</div>
									<div class="cell" data-title="Nama Peserta">
										<span class="marbot">Christopher Ralin Anggoman</span>
										<span class="marbot">Herlambang Rafli Wicaksono</span>
										<span class="marbot">Fikri Muhammad Abdillah</span>
									</div>
									<div class="cell" data-title="Utusan">
										Politeknik Negeri Malang
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
					<span class="header-win">Web Development </span>
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
										<span class="marbot">Putu Agus Dharma Kusuma</span>
										<span class="marbot">I Putu Gede Mahardika Adi Putra</span>
										<span class="marbot">Anak Agung Ngurah Mahadana Apta Gotra</span>

									</div>
									<div class="cell" data-title="Utusan">
										Universitas Udayana
									</div>
								</div>

								<div class="row">
									<div class="cell" data-title="Juara">
										2
									</div>
									<div class="cell" data-title="Nama Peserta">
										<span class="marbot">Ifa aprillianto</span>
										<span class="marbot">Sarwan Hamid</span>
									</div>
									<div class="cell" data-title="Utusan">
										Institut Teknologi Telkom Purwokerto
									</div>
								</div>

								<div class="row">
									<div class="cell" data-title="Juara">
										3
									</div>
									<div class="cell" data-title="Nama Peserta">
										<span class="marbot">M. Naufal Fawwaz Haryono</span>
										<span class="marbot">Hanif Robby Rodhiya</span>
										<span class="marbot">Nauval Fahreza Attamimi</span>
									</div>
									<div class="cell" data-title="Utusan">
										Universitas Brawijaya
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
