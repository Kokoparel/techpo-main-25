<?= $this->extend('sejarah/layout'); ?>

<?= $this->section('content'); ?>

<div style="width: 100vw">
	<div class="bg-fillwhite-auto" style="padding: 0; color: white; width: 100vw;">
		<div class="page-margin">
			<div id="sejarah-header"
				style="background-image: url(<?= base_url('assets-old/images/background2.jpeg') ?>)">
				<div id="tittle-anim1" class="Smallmont" style=""><span><span
							style="display:block; margin-bottom: 10px;font-size: 30px;">SEJARAH</span>Technology
						Euphoria 2014</span></div>
				<div id="tittle-anim2" class="Smallmont" style="">Technology Euphoria 2014 merupakan awal dimana
					lahirnya kompetisi tingkat nasional Techporia yang selalu diadakan tiap tahunnya.
				</div>

			</div>
		</div>
	</div>
	<div class="section-140"></div>
	<div id="highlights">
		<div class="Mediummont" style="text-align: center; font-weight: 700; background-color: var(--black); font-size: 30px;padding-top: 100px">
			Techphoria 2014 Highlights
		</div>

		<div class="pomar">
			<div class="owl-carousel owl-theme">
				<?php for ($i = 1; $i < 7; $i++) { ?>
					<div class="item"> <img src="<?= base_url('assets-old/sejarah-image/tehcpo14-' . $i . '.jpg') ?>"
							style="width: 270px" class="highlight-foto" alt=""></div>
				<?php } ?>
			</div>
		</div>
	</div>
	<div class="bg-fillwhite-auto"
		style="background-image: url(<?= base_url('assets-old/images/background2.jpeg') ?>); color: white; background-color: var(--black); background-repeat:no-repeat;background-size:cover;">
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
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<?= $this->endSection(); ?>