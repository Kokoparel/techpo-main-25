<?= $this->extend('sejarah/layout'); ?>

<?= $this->section('content'); ?>

<div style="width: 100vw">
	<div class="bg-fillwhite-auto" style="padding: 0; color: white; width: 100vw">
		<div class="page-margin">
			<div id="sejarah-header"
				style="background-image: url(<?= base_url('assets-old/images/background2.jpeg') ?>)">
				<div id="tittle-anim1" class="Smallmont" style=""><span><span
							style="display:block; margin-bottom: 10px;font-size: 30px;">SEJARAH</span>Technology
						Euphoria 2020</span></div>
				<div id="tittle-anim2" class="Smallmont" style="">Technology Euphoria 2020 memiliki tema "Youth
					Innovation in Creative Digital Industry To Enhance Global Competitiveness".
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
								Logo <br>Techphoria 2020
							</div>
							<div id="logopng" style="width:200px; height: 200px;">
								<img src="<?= base_url() ?>assets-old/images/logos/20.png" id="logopng"
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
											<td>Competitive Programming</td>
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
										<tr>
											<td>5</td>
											<td>Web Development</td>
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
							Penyelenggaraan <br>Techphoria 2020
						</div>
						<div class="Smallmont" id="hayongapain">
							Techphoria merupakan serangkaian acara IT tahunan dengan fokus utama kompetisi tingkat
							nasional yang diperuntukan bagi Universitas/Politeknik se-Indonesia untuk meningkatkan
							kesadaran tentang peranan IT serta meningkatkan nilai keilmuan dan komprehensif di bidang
							ilmu teknologi informasi komputer, ajang ini sendiri diprakarsai oleh Mahasiswa Fakultas
							Ilmu Komputer Universitas Sriwijaya.
							<span style="display: block;margin-top: 15px">Technology Euphoria 2020 memiliki event khusus
								yaitu Fexo dan Seminar</span>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="highlights">
		<div class="Mediummont" style="text-align: center;font-weight: 700; font-size: 30px;padding-top: 100px">
			Techphoria 2020 Highlights
		</div>

		<div class="pomar">
			<div class="owl-carousel owl-theme">
				<?php for ($i = 1; $i < 7; $i++) { ?>
					<div class="item"> <img src="<?= base_url('assets-old/sejarah-image/techpho19-' . $i . '.jpeg') ?>"
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
								<td>Institut Teknologi Bandung</td>
							</tr>
							<tr>
								<td>2</td>
								<td>Institut Teknologi Del</td>
							</tr>
							<tr>
								<td>3</td>
								<td>Calvin Institute of Technology</td>
							</tr>
							<tr>
								<td>4</td>
								<td>Institut Teknologi Sepuluh Nopember</td>
							</tr>
							<tr>
								<td>5</td>
								<td>Institut Teknologi Harapan Bangsa</td>
							</tr>
							<tr>
								<td>6</td>
								<td>Institut Teknologi Kalimantan</td>
							</tr>
							<tr>
								<td>7</td>
								<td>Institut Teknologi Telkom Purwokerto</td>
							</tr>
							<tr>
								<td>8</td>
								<td>Universitas Ahmad Dahlan</td>
							</tr>
							<tr>
								<td>9</td>
								<td>Universitas AMIKOM Yogyakarta</td>
							</tr>
							<tr>
								<td>10</td>
								<td>Universitas Andalas</td>
							</tr>
							<tr>
								<td>11</td>
								<td>Universitas Bina Insani</td>
							</tr>
							<tr>
								<td>12</td>
								<td>Universitas Binus Bandung</td>
							</tr>
							<tr>
								<td>13</td>
								<td>Universitas Brawijaya</td>
							</tr>
							<tr>
								<td>14</td>
								<td>Universitas Buana Perjuangan Karawang</td>
							</tr>
							<tr>
								<td>15</td>
								<td>Universitas Budi Luhur</td>
							</tr>
							<tr>
								<td>16</td>
								<td>Universitas Dian Nuswantoro</td>
							</tr>
							<tr>
								<td>17</td>
								<td>Universitas Gadjah Mada</td>
							</tr>
							<tr>
								<td>18</td>
								<td>Universitas Gunadarma</td>
							</tr>
							<tr>
								<td>19</td>
								<td>Universitas Hasanuddin</td>
							<tr style="border-bottom: solid 1px white">
								<td>20</td>
								<td>Universitas Indo Global Mandiri</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="uk-width-1-3@m">
					<table class="uk-table uk-table-small uk-table-divider">
						<tbody>
							<tr>
								<td>21</td>
								<td>Universitas Indonesia</td>
							</tr>
							<tr>
								<td>22</td>
								<td>Universitas Indraprasta PGRI</td>
							</tr>
							<tr>
								<td>23</td>
								<td>Universitas Islam Indonesia</td>
							</tr>
							<tr>
								<td>24</td>
								<td>Universitas Jambi</td>
							</tr>
							<tr>
								<td>25</td>
								<td>Universitas Kristen Duta Wacana</td>
							</tr>
							<tr>
								<td>26</td>
								<td>Universitas Kristen Maranatha</td>
							</tr>
							<tr>
								<td>27</td>
								<td>Universitas Kristen Satya Wacana</td>
							</tr>
							<tr>
								<td>28</td>
								<td>Universitas Kuningan</td>
							</tr>
							<tr>
								<td>29</td>
								<td>Universitas Malikussaleh</td>
							</tr>
							<tr>
								<td>30</td>
								<td>Universitas Muhammadiyah Yogyakarta</td>
							</tr>
							<tr>
								<td>31</td>
								<td>Universitas Mulia Balikpapan</td>
							</tr>
							<tr>
								<td>32</td>
								<td>Universitas Multimedia Nusantara</td>
							</tr>
							<tr>
								<td>33</td>
								<td>Universitas Negeri Jakarta</td>
							</tr>
							<tr>
								<td>34</td>
								<td>Universitas Negeri Padang</td>
							</tr>
							<tr>
								<td>35</td>
								<td>Universitas Negeri Surabaya</td>
							</tr>
							<tr>
								<td>36</td>
								<td>Universitas Pamulang</td>
							</tr>
							<tr>
								<td>37</td>
								<td>Universitas Pancasila</td>
							</tr>
							<tr>
								<td>38</td>
								<td>Universitas Pelita Bangsa</td>
							</tr>
							<tr>
								<td>39</td>
								<td>Universitas Pembangunan Nasional Veteran Jakarta</td>
							<tr style="border-bottom: solid 1px white">
								<td>40</td>
								<td>Universitas Pendidikan Indonesia</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="uk-width-1-3@m">
					<table class="uk-table uk-table-small uk-table-divider">
						<tbody>
							<tr>
								<td>41</td>
								<td>Universitas President</td>
							</tr>
							<tr>
								<td>42</td>
								<td>Universitas Sebelas Maret</td>
							</tr>
							<tr>
								<td>43</td>
								<td>Universitas Sriwijaya</td>
							</tr>
							<tr>
								<td>44</td>
								<td>Universitas Teknokrat Indonesiaa</td>
							</tr>
							<tr>
								<td>45</td>
								<td>Universitas Telkom</td>
							</tr>
							<tr>
								<td>46</td>
								<td>Politeknik Caltex Riau</td>
							</tr>
							<tr>
								<td>47</td>
								<td>Politeknik Elektronika Negeri Surabaya</td>
							</tr>
							<tr>
								<td>48</td>
								<td>Politeknik Manufaktur Negeri Bangka Belitung</td>
							</tr>
							<tr>
								<td>49</td>
								<td>Politeknik Negeri Jakarta</td>
							</tr>
							<tr>
								<td>50</td>
								<td>Politeknik Negeri Samarinda</td>
							</tr>
							<tr>
								<td>51</td>
								<td>Politeknik Negeri Sriwijaya</td>
							</tr>
							<tr>
								<td>52</td>
								<td>Politeknik PalComTech Palembang</td>
							</tr>
							<tr>
								<td>53</td>
								<td>STMIK AMIK BANDUNG</td>
							</tr>
							<tr>
								<td>54</td>
								<td>STMIK Dipanegara Makassar</td>
							</tr>
							<tr>
								<td>55</td>
								<td>STMIK Global Informatika Multi Data Palembang</td>
							</tr>
							<tr>
								<td>56</td>
								<td>STMIK Kharisma Karawang</td>
							</tr>
							<tr>
								<td>57</td>
								<td>STMIK Mikroskil</td>
							</tr>
							<tr>
								<td>58</td>
								<td>STMIK Royal Kisaran</td>
							</tr>
							<tr>
								<td>59</td>
								<td>UIN Alaudin Makasar</td>
							</tr>
							<tr>
								<td>60</td>
								<td>UIN Raden Fatah Palembang</td>
							</tr>
							<tr style="border-bottom: solid 1px white">

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
				Daftar pemenang Techphoria 2020
			</div>

			<div>
				<div class="Mediummont"
					style="font-size:25px; font-weight: 700;text-align: center;margin-top: 70px;margin-bottom: 10px">
					<span class="header-win">Bussines Plan</span>
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
										Nama Tim
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
										<span class="marbot">PHIWPHIWPHIW</span>
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
										<span class="marbot">MATERPIECE</span>
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
										<span class="marbot">LESTARI SOLUTION</span>
									</div>
									<div class="cell" data-title="Utusan">
										Universitas Malikussaleh
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
										Nama Tim
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
										<span class="marbot">ULTRAMAN NGODING SANTUY</span>
									</div>
									<div class="cell" data-title="Utusan">
										Universitas Sebelas Maret
									</div>
								</div>

								<div class="row">
									<div class="cell" data-title="Juara">
										2
									</div>
									<div class="cell" data-title="Nama Peserta">
										<span class="marbot">DREAM UP</span>
									</div>
									<div class="cell" data-title="Utusan">
										Universitas Pendidikan Indonesia
									</div>
								</div>

								<div class="row">
									<div class="cell" data-title="Juara">
										3
									</div>
									<div class="cell" data-title="Nama Peserta">
										<span class="marbot">TSUKOYOMI</span>
									</div>
									<div class="cell" data-title="Utusan">
										Universitas Bina Nusantara
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
					<span class="header-win">UI/UX</span>
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
										Nama Tim
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
										<span class="marbot">TUMTUMMY</span>

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
										<span class="marbot">DHIK RATRI</span>

									</div>
									<div class="cell" data-title="Utusan">
										Institut Teknologi Sepuluh Novemper
									</div>
								</div>

								<div class="row">
									<div class="cell" data-title="Juara">
										3
									</div>
									<div class="cell" data-title="Nama Peserta">
										<span class="marbot">SI JAYA</span>
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
										<span class="marbot">Ihwan Ramadhani</span>

									</div>
									<div class="cell" data-title="Utusan">
										SMKS Pancakarya Tangerang
									</div>
								</div>

								<div class="row">
									<div class="cell" data-title="Juara">
										2
									</div>
									<div class="cell" data-title="Nama Peserta">
										<span class="marbot">Rexy Fahrezi</span>

									</div>
									<div class="cell" data-title="Utusan">
										Universitas Teknorat Indonesia
									</div>
								</div>

								<div class="row">
									<div class="cell" data-title="Juara">
										3
									</div>
									<div class="cell" data-title="Nama Peserta">
										<span class="marbot">Zasda Yusuf Mikail</span>
									</div>
									<div class="cell" data-title="Utusan">
										Universitas Budi Luhur
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
										Nama Tim
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
										<span class="marbot">SPARTANS</span>
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
										<span class="marbot">WEBLIKASI</span>
									</div>
									<div class="cell" data-title="Utusan">
										STMIK Kharisma Karawang
									</div>
								</div>

								<div class="row">
									<div class="cell" data-title="Juara">
										3
									</div>
									<div class="cell" data-title="Nama Peserta">
										<span class="marbot">NAKULA</span>
									</div>
									<div class="cell" data-title="Utusan">
										Universitas Dian Nuswantoro
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
