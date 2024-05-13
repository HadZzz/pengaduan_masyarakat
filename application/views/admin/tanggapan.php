<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<br>
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
	<hr>
	<br>

	<?php if (!empty($data_pengaduan)) : ?>
		<div class="card shadow mb-4">
			<div class="row no-gutters">
				<div class="table-responsive">
					<div class="card-body">
						<table class="table table-bordered" id="dataTable">
							<tr>
								<th scope="col" class="text-center">#</th>
								<th scope="col" class="text-center">Nama</th>
								<th scope="col" class="text-center">Isi Laporan</th>
								<th scope="col" class="text-center">Tanggal Melapor</th>
								<th scope="col" class="text-center">Foto</th>
								<th scope="col" class="text-center">Status</th>
								<th scope="col" class="text-center">Lihat Detail</th>
							</tr>
							<tbody>
								<?php $no = 1; ?>
								<?php foreach ($data_pengaduan as $dp) : ?>
									<tr>
										<th scope="row" class="text-center"><?= $no++; ?></th>
										<td class="text-center"><?= $dp['nama']; ?></td>
										<td class="text-center"><?= $dp['isi_laporan']; ?></td>
										<td class="text-center"><?= $dp['tgl_pengaduan']; ?></td>
										<td class="text-center">
											<img width="100" src="<?= base_url() ?>assets/uploads/<?= $dp['foto']; ?>" alt="">
										</td>
										<td class="text-center">
											<?php
											if ($dp['status'] == '0') :
												echo '<span class="badge badge-secondary">Sedang di verifikasi</span>';
											elseif ($dp['status'] == 'proses') :
												echo '<span class="badge badge-primary">Sedang di proses</span>';
											elseif ($dp['status'] == 'selesai') :
												echo '<span class="badge badge-success">Selesai di kerjakan</span>';
											elseif ($dp['status'] == 'tolak') :
												echo '<span class="badge badge-danger">Pengaduan di tolak</span>';
											else :
												echo '-';
											endif;
											?>
										</td>
										<td class="text-center">
											<?= form_open('Admin/TanggapanController/tanggapan_detail'); ?>
											<input type="hidden" name="id" value="<?= $dp['id_pengaduan'] ?>">
											<button class="btn btn-success" name="terima"><i class="fas fa-fw fa-eye"></i></button>
											<?= form_close(); ?>
										</td>


									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>


				</div>

			<?php else : ?>
				<div class="text-center">Belum Ada Pengaduan</div>
			<?php endif; ?>


			</div>