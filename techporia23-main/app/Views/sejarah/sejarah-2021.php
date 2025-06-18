<?= $this->extend('sejarah/layout'); ?>

<?= $this->section('content'); ?>

<div style="width: 100vw">
	<div class="bg-fillwhite-auto" style="padding: 0; color: white; width: 100vw">
		<div class="page-margin">
			<div id="sejarah-header"
				style="background-image: url(<?= base_url('assets-old/images/background2.jpeg') ?>)">
				<div id="tittle-anim1" class="Smallmont" style=""><span><span
							style="display:block; margin-bottom: 10px;font-size: 30px;">SEJARAH</span>Technology
						Euphoria 2021</span></div>
				<div id="tittle-anim2" class="Smallmont" style="">Technology Euphoria 2021 dengan tema “Technological Innovation Triggers the Development of the World to Match the Era and Core-Business”.
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
								Logo <br>Techphoria 2021
							</div>
							<div id="logopng" style="width:200px; height: 200px;">
								<img src="<?= base_url() ?>assets-old/images/logos/21.png" id="logopng"
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
											<td>Bussiness IT Case</td>
										</tr>
										<tr>
											<td>3</td>
											<td>UI/UX Design</td>
										</tr>
										<tr>
											<td>4</td>
											<td>Network Competition </td>
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
							Penyelenggaraan <br>Techphoria 2021
						</div>
						<div class="Smallmont" id="hayongapain">
							Techphoria merupakan serangkaian acara IT tahunan dengan fokus utama kompetisi tingkat
							nasional yang diperuntukan bagi Universitas/Politeknik se-Indonesia untuk meningkatkan
							kesadaran tentang peranan IT serta meningkatkan nilai keilmuan dan komprehensif di bidang
							ilmu teknologi informasi komputer, ajang ini sendiri diprakarsai oleh Mahasiswa Fakultas
							Ilmu Komputer Universitas Sriwijaya.
							<span style="display: block;margin-top: 15px">Technology Euphoria 2021 memiliki event khusus
								yaitu Fexo dan Seminar</span>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="highlights">
		<div class="Mediummont" style="text-align: center;font-weight: 700; font-size: 30px;padding-top: 100px">
			Techphoria 2021 Highlights
		</div>

		<div class="pomar">
			<div class="owl-carousel owl-theme">
				<?php for ($i = 1; $i < 7; $i++) { ?>
					<div class="item"> <img src="<?= base_url('assets-old/sejarah-image/techpho22-' . $i . '.jpg') ?>"
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
								<td>Calvin Institute of Technology</td>
							</tr>
							<tr>
								<td>2</td>
								<td>Institut Teknologi Del</td>
							</tr>
							<tr>
								<td>3</td>
								<td>Institut Teknologi Harapan Bangsa</td>
							</tr>
							<tr>
								<td>4</td>
								<td>Institut Teknologi Kalimantan</td>
							</tr>
							<tr>
								<td>5</td>
								<td>Institut Teknologi Sepuluh Nopember</td>
							</tr>
							<tr>
								<td>6</td>
								<td>Institut Teknologi Telkom Purwokerto</td>
							</tr>
							<tr>
								<td>7</td>
								<td>Politeknik Caltex Riau</td>
							</tr>
							<tr>
								<td>8</td>
								<td>Politeknik Manufaktur Negeri Bangka Belitung</td>
							</tr>
							<tr>
								<td>9</td>
								<td>Politeknik Negeri Jakarta</td>
							</tr>
							<tr>
								<td>10</td>
								<td>Politeknik Negeri Samarinda</td>
							</tr>
							<tr>
								<td>11</td>
								<td>Politeknik Negeri Sriwijaya</td>
							</tr>
							<tr>
								<td>12</td>
								<td>Politeknik PalComTech Palembang</td>
							</tr>
							<tr>
								<td>13</td>
								<td>STMIK AMIK BANDUNG</td>
							</tr>
							<tr>
								<td>14</td>
								<td>STMIK Dipanegara Makassar</td>
							</tr>
							<tr>
								<td>15</td>
								<td>STMIK Global Informatika Multi Data Palembang</td>
							</tr>
							<tr>
								<td>16</td>
								<td>STMIK Kharisma Karawang</td>
							</tr>
							<tr>
								<td>17</td>
								<td>STMIK Mikroskil</td>
							</tr>
							<tr style="border-bottom: solid 1px white">
								<td>18</td>
								<td>STMIK Royal Kisaran</td>
							</tr>
							
						</tbody>
					</table>
				</div>
				<div class="uk-width-1-3@m">
					<table class="uk-table uk-table-small uk-table-divider">
						<tbody>
							<tr>
								<td>19</td>
								<td>UIN Alaudin Makasar</td>
							<tr >
								<td>20</td>
								<td>UIN Raden Fatah Palembang</td>
							</tr>
							<tr>
								<td>21</td>
								<td>Universitas Ahmad Dahlan</td>
							</tr>
							<tr>
								<td>22</td>
								<td>Universitas AMIKOM Yogyakarta</td>
							</tr>
							<tr>
								<td>23</td>
								<td>Universitas Andalas</td>
							</tr>
							<tr>
								<td>24</td>
								<td>Universitas Bina Insani</td>
							</tr>
							<tr>
								<td>25</td>
								<td>Universitas Buana Perjuangan Karawang</td>
							</tr>
							<tr>
								<td>26</td>
								<td>Universitas Budi Luhur</td>
							</tr>
							<tr>
								<td>27</td>
								<td>Universitas Dian Nuswantoro</td>
							</tr>
							<tr>
								<td>28</td>
								<td>Universitas Gadjah Mada</td>
							</tr>
							<tr>
								<td>29</td>
								<td>Universitas Gunadarma</td>
							</tr>
							<tr>
								<td>30</td>
								<td>Universitas Hasanuddin</td>
							</tr>
							<tr>
								<td>31</td>
								<td>Universitas Indo Global Mandiri</td>
							</tr>
							<tr>
								<td>32</td>
								<td>Universitas Indraprasta PGRI</td>
							</tr>
							<tr>
								<td>33</td>
								<td>Universitas Islam Indonesia</td>
							</tr>
							<tr>
								<td>34</td>
								<td>Universitas Jambi</td>
							</tr>
							<tr>
								<td>35</td>
								<td>Universitas Kristen Duta Wacana</td>
							</tr>
							<tr style="border-bottom: solid 1px white">
								<td>36</td>
								<td>Universitas Kristen Maranatha</td>
							</tr>
							
						</tbody>
					</table>
				</div>
				<div class="uk-width-1-3@m">
					<table class="uk-table uk-table-small uk-table-divider">
						<tbody>
							<tr>
								<td>37</td>
								<td>Universitas Kristen Satya Wacana</td>
							</tr>
							<tr>
								<td>38</td>
								<td>Universitas Kuningan</td>
							</tr>
							<tr>
								<td>39</td>
								<td>Universitas Malikussaleh</td>
							<tr>
								<td>40</td>
								<td>Universitas Muhammadiyah Yogyakarta</td>
							</tr>
							<tr>
								<td>41</td>
								<td>Universitas Mulia Balikpapan</td>
							</tr>
							<tr>
								<td>42</td>
								<td>Universitas Multimedia Nusantara</td>
							</tr>
							<tr>
								<td>43</td>
								<td>Universitas Negeri Jakarta</td>
							</tr>
							<tr>
								<td>44</td>
								<td>Universitas Negeri Padang</td>
							</tr>
							<tr>
								<td>45</td>
								<td>Universitas Pamulang</td>
							</tr>
							<tr>
								<td>46</td>
								<td>Universitas Pancasila</td>
							</tr>
							<tr>
								<td>47</td>
								<td>Universitas Pelita Bangsa</td>
							</tr>
							<tr>
								<td>48</td>
								<td>Universitas Pembangunan Nasional Veteran Jakarta</td>
							</tr>
							<tr>
								<td>49</td>
								<td>Universitas Pendidikan Indonesia</td>
							</tr>
							<tr>
								<td>50</td>
								<td>Universitas President</td>
							</tr>
							<tr>
								<td>51</td>
								<td>Universitas Sebelas Maret Surakarta</td>
							</tr>
							<tr style="border-bottom: solid 1px white">
								<td>52</td>
								<td>Universitas Telkom</td>
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
		<div class="page-margin">
			<div class="Mediummont" style="font-size:30px; font-weight: 700;text-align: center">
				Daftar pemenang Techphoria 2021
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
										<span class="marbot">Nebiba Abdul</span>
										<span class="marbot">Krismawati Simbolon</span>
										<span class="marbot">Antonius Reynard Affandi</span>
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
										<span class="marbot">Shella Novelinda Purba</span>
										<span class="marbot">Ryan W</span>
										<span class="marbot">Eleen Emanuela</span>
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
										<span class="marbot">Marya Batubara</span>
										<span class="marbot">Debtya Vanni Kiki Harapan Hutapea</span>
									</div>
									<div class="cell" data-title="Utusan">
										Politeknik Caltex Riau
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
										<span class="marbot">James Ryans</span>
										<span class="marbot">Kevin</span>
										<span class="marbot">Ritchie Goldwin</span>
									</div>
									<div class="cell" data-title="Utusan">
										STMIK MIKROSKIL
									</div>
								</div>

								<div class="row">
									<div class="cell" data-title="Juara">
										2
									</div>
									<div class="cell" data-title="Nama Peserta">
										<span class="marbot">Nurlita Dhuha F.</span>
										<span class="marbot">Muhammad Affan</span>
										<span class="marbot">Fadhil Mussad</span>
									</div>
									<div class="cell" data-title="Utusan">
										Institut Teknologi Sepuluh Nopember
									</div>
								</div>

								<div class="row">
									<div class="cell" data-title="Juara">
										3
									</div>
									<div class="cell" data-title="Nama Peserta">
										<span class="marbot">Andy Yusuf</span>
										<span class="marbot">Ryan Owen Thionanda</span>
										<span class="marbot">Steven Wijaya</span>
									</div>
									<div class="cell" data-title="Utusan">
										STMIK MIKROSKIL
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
										<span class="marbot">Gita Prasulistiyono</span>
										<span class="marbot">Kairania Qalbi</span>
									</div>
									<div class="cell" data-title="Utusan">
										Universitas Gadjah Mada
									</div>
								</div>

								<div class="row">
									<div class="cell" data-title="Juara">
										2
									</div>
									<div class="cell" data-title="Nama Peserta">
										<span class="marbot">Aslan Poetra Ramadhan</span>
										<span class="marbot">Nasruddin</span>
										<span class="marbot">Andi Alfian Pratama Putra</span>
									</div>
									<div class="cell" data-title="Utusan">
										Universitas Muslim Indonesia
									</div>
								</div>

								<div class="row">
									<div class="cell" data-title="Juara">
										3
									</div>
									<div class="cell" data-title="Nama Peserta">
										<span class="marbot">Bayu Agung Prakoso</span>
										<span class="marbot">Leriana Thufailah Hidayat Putri</span>
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
										<span class="marbot">Zasda Yusuf Mikail</span>

									</div>
									<div class="cell" data-title="Utusan">
										Universitas Budi Luhur
									</div>
								</div>

								<div class="row">
									<div class="cell" data-title="Juara">
										2
									</div>
									<div class="cell" data-title="Nama Peserta">
										<span class="marbot">Geraldhi Aditya Putra Mahayadna</span>

									</div>
									<div class="cell" data-title="Utusan">
										Institut Bisnis dan Informatika Stikom Surabaya
									</div>
								</div>

								<div class="row">
									<div class="cell" data-title="Juara">
										3
									</div>
									<div class="cell" data-title="Nama Peserta">
										<span class="marbot">Eno Marozi</span>
									</div>
									<div class="cell" data-title="Utusan">
										Universitas Andalas
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
