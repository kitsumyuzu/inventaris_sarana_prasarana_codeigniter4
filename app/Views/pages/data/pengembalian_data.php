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

														<a>inventaris</a>

													</li>

                                                <li class="separator">

                                                    <i class="fas fa-caret-right"></i>

                                                </li>

													<li class="nav-item">

														<a>peminjaman</a>

													</li>

                                            </ul>

										</div>

									</div>

                                    <div class="card-body">

                                        <div class="table-responsive">

                                            <table id="limit-data-10" class="table table-striped table-hover table-bordered-bg-light mt-4">

                                                <thead>

                                                    <tr style="text-align: center;">

                                                        <th>No.</th>
                                                        <th>Nama Barang</th>
                                                        <th>Jumlah</th>
                                                        <th>Tanggal Peminjaman</th>
                                                        <th>Status Peminjaman</th>
                                                        <th>Action</th>

                                                    </tr>

                                                </thead>

                                                <tbody>

                                                    <?php $no = 1;

                                                        foreach($peminjamanData as $data) {

                                                            $tanggal_peminjaman = new DateTime($data -> tanggal_pinjam);

                                                            if ($data -> status_peminjaman == 'dikembalikan') {

                                                    ?>

                                                        <tr style="text-align: center;">
                                                    
                                                            <td><?php echo $no++?></td>
                                                            <td><?php echo ucwords($data -> nama ? $data -> nama : '-') ?></td>
                                                            <td><?php echo ($data -> jumlah_peminjaman ? $data -> jumlah_peminjaman : '-') ?></td>
                                                            <td><?php echo ucwords($data -> tanggal_pinjam ? $tanggal_peminjaman -> format('d M Y') : '-') ?></td>
                                                            <td><?php echo ucwords($data -> status_peminjaman ? $data -> status_peminjaman : '-') ?></td>

                                                            <td>

                                                                <a href="<?= base_url('/user/view_update_user/'.$data -> id_petugas) ?>">

                                                                    <button type="button" data-toggle="tooltip" class="btn btn-link btn-success btn-sm" data-original-title="Change Status"><i class="fas fa-chart-simple fa-xl"></i></button>

                                                                </a>

                                                            </td>

                                                        </tr>

                                                    <?php

                                                            }
                                                
                                                        }
                                                        
                                                    ?>
                                                    
                                                </tbody>

                                            </table>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>