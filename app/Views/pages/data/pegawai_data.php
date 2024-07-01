            <div class="main-panel">

                <div class="content">

                    <div class="page-inner py-3">

                        <div class="row d-flex justify-content-center">

                            <div class="col-md-12">

                                <div class="card">

                                    <div class="card-header">

										<div class="d-flex align-items-center">

											<h4 class="card-title"><i class="mr-2 fas fa-archive"></i><b>DATABASE</b></h4>
                                            <ul class="breadcrumbs">

                                                <li class="nav-home">

                                                    <a href="<?= base_url('/home/dashboard') ?>" class="fas fa-home"></a>

                                                </li>

                                                <li class="separator">

                                                    <i class="fas fa-caret-right"></i>

                                                </li>

													<li class="nav-item">

														<a>user</a>

													</li>

                                            </ul>

                                            <a href="/user/" class="ml-auto">

                                                <button class="btn btn-lg btn-rounded btn-secondary"><i class="fas fa-circle-left mr-2"></i>Back</button>

                                            </a>

										</div>

									</div>

                                    <div class="card-body">

                                        <div class="table-responsive">

                                            <table id="limit-data-10-preview" class="table table-striped table-hover table-bordered-bg-light mt-4">

                                                <thead>

                                                    <tr style="text-align: center;">

                                                        <th>No.</th>
                                                        <th>NIP</th>
                                                        <th>Nama Depan</th>
                                                        <th>Nama Belakang</th>
                                                        <th>Jenis Kelamin</th>
                                                        <th>Tgl & Tempat Lahir</th>
                                                        <th>Alamat</th>
                                                        <th>No Handphone</th>

                                                    </tr>

                                                </thead>

                                                <tbody>

                                                    <?php $tanggal_lahir = new DateTime($pegawaiData -> tanggal_lahir); ?>

                                                        <tr style="text-align: center;">
                                                    
                                                            <td>1</td>
                                                            <td><?php echo ($pegawaiData -> nip ? $pegawaiData -> nip : '-') ?></td>
                                                            <td><?php echo ucwords($pegawaiData -> nama_depan ? $pegawaiData -> nama_depan : '-') ?></td>
                                                            <td><?php echo ucwords($pegawaiData -> nama_belakang ? $pegawaiData -> nama_belakang : '-') ?></td>
                                                            <td><?php echo ucwords($pegawaiData -> jenis_kelamin ? $pegawaiData -> jenis_kelamin : '-') ?></td>
                                                            <td><?php echo ucwords($pegawaiData -> tempat_lahir ? $pegawaiData -> tempat_lahir : '-') ?>, <?php echo $tanggal_lahir -> format('d M Y') ?></td>
                                                            <td><?php echo ucwords($pegawaiData -> alamat ? $pegawaiData -> alamat : '-') ?></td>
                                                            <td><?php echo ucwords($pegawaiData -> nomor_handphone ? $pegawaiData -> nomor_handphone : '-') ?></td>

                                                        </tr>
                                                    
                                                </tbody>

                                            </table>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>