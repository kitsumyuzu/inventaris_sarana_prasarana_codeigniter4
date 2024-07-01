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

                                            </ul>

                                            <a href="/inventaris/view_insert_inventaris/" class="ml-auto">

                                                <button class="btn btn-md btn-rounded btn-success">Add</button>

                                            </a>

										</div>

									</div>

                                    <div class="card-body">

                                        <div class="table-responsive">

                                            <table id="limit-data-10" class="table table-striped table-hover table-bordered-bg-light mt-4">

                                                <thead>

                                                    <tr style="text-align: center;">

                                                        <th>No.</th>
                                                        <th>Nama Barang</th>
                                                        <th>Kondisi Barang</th>
                                                        <th>Keterangan</th>
                                                        <th>Jumlah</th>
                                                        <th>Jenis</th>
                                                        <th>Tanggal Registrasi</th>
                                                        <th>Ruangan</th>
                                                        <th>Kode Inventaris</th>
                                                        <th>Nama Petugas</th>
                                                        <th>Action</th>

                                                    </tr>

                                                </thead>

                                                <tbody>

                                                    <?php $no = 1;
                                                    
                                                        foreach ($inventarisData as $data) {
                                                            
                                                            $tanggal_register = new DateTime($data -> tanggal_register);

                                                    ?>

                                                        <tr style="text-align: center;">
                                                    
                                                            <td><?php echo $no++ ?></td>
                                                            <td><?php echo ucwords($data -> nama ? $data -> nama : '-') ?></td>
                                                            <td><?php echo ucwords($data -> kondisi ? $data -> kondisi : '-') ?></td>
                                                            <td><?php echo ucwords($data -> keterangan_inventaris ? $data -> keterangan_inventaris : '-') ?></td>
                                                            <td><?php echo ($data -> jumlah ? $data -> jumlah : '-') ?></td>
                                                            <td><?php echo ucwords($data -> nama_jenis ? $data -> nama_jenis : '-') ?></td>
                                                            <td><?php echo ucwords($data -> tanggal_register ? $tanggal_register -> format('d M Y') : '-') ?></td>
                                                            <td><?php echo ucwords($data -> nama_ruang ? $data -> nama_ruang : '-') ?></td>
                                                            <td><?php echo ($data -> kode_inventaris ? $data -> kode_inventaris : '-') ?></td>
                                                            <td><?php echo ucwords($data -> nama_petugas ? $data -> nama_petugas : '-') ?></td>

                                                            <td>

                                                                <a href="<?= base_url('/inventaris/view_update_inventaris/'.$data -> id_inventaris) ?>">

                                                                    <button type="button" data-toggle="tooltip" class="btn btn-link btn-primary btn-sm" data-original-title="Edit Data"><i class="fas fa-user-pen fa-xl"></i></button>

                                                                </a>

                                                                <a href="<?= base_url('/inventaris/delete_inventaris/'.$data -> id_inventaris) ?>">

                                                                    <button type="button" data-toggle="tooltip" class="btn btn-link btn-danger btn-sm" data-original-title="Delete Data"><i class="fas fa-trash-can fa-xl"></i></button>

                                                                </a>

                                                            </td>

                                                        </tr>

                                                    <?php } ?>
                                                    
                                                </tbody>

                                            </table>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>