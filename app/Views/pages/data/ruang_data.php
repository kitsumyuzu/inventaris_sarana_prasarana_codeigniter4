            <div class="main-panel">

                <div class="content">

                    <div class="page-inner py-3">

                        <div class="row d-flex justify-content-center">

                            <div class="col-md-4">

                                <div class="card">

                                    <div class="card-header">

										<div class="d-flex align-items-center">

											<h4 class="card-title"><i class="mr-2 fas fa-archive"></i><b>INSERT</b></h4>
                                            
										</div>

									</div>

                                    <form action="/inventaris/insert_ruang/" method="post" enctype="multipart/form-data">

                                        <div class="card-body">

                                            <div class="row">

                                                <div class="form-group col-md-12">

                                                    <div class="col-md-12 p-0">
    
                                                        <input class="form-control" type="text" name="nama_ruang" placeholder="Nama Ruang" required maxlength="225">
    
                                                    </div>

                                                </div>

                                                <div class="form-group col-md-12">

                                                    <div class="col-md-12 p-0">
    
                                                        <input class="form-control" type="text" name="kode_ruang" placeholder="Kode Ruang" required maxlength="225">
    
                                                    </div>

                                                </div>

                                                <div class="form-group col-md-12">

                                                    <div class="col-md-12 p-0">
    
                                                        <input class="form-control" type="text" name="keterangan" placeholder="Keterangan" required maxlength="100">
    
                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="card-footer d-flex justify-content-center">

                                            <button type="submit" class="btn btn-success btn-rounded mr-2"><i class="fas fa-check mr-2"></i> Submit</button>
                                            <button type="reset" class="btn btn-danger btn-rounded"><i class="fas fa-rotate mr-2"></i>Reset</button>

                                        </div>

                                    </form>

                                </div>

                            </div>

                            <div class="col-md-8">

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

										</div>

									</div>

                                    <div class="card-body">

                                        <div class="table-responsive">

                                            <table id="limit-data-10" class="table table-striped table-hover table-bordered-bg-light mt-4">

                                                <thead>

                                                    <tr style="text-align: center;">

                                                        <th>No.</th>
                                                        <th>Nama Jenis</th>
                                                        <th>Kode Jenis</th>
                                                        <th>Keterangan</th>
                                                        <th>Action</th>

                                                    </tr>

                                                </thead>

                                                <tbody>

                                                    <?php $no = 1;

                                                        foreach($ruangData as $data) {

                                                    ?>

                                                        <tr style="text-align: center;">
                                                    
                                                            <td><?php echo $no++?></td>
                                                            <td><?php echo ucwords($data -> nama_ruang ? $data -> nama_ruang : '-') ?></td>
                                                            <td><?php echo ucwords($data -> kode_ruang ? $data -> kode_ruang : '-') ?></td>
                                                            <td><?php echo ucwords($data -> keterangan ? $data -> keterangan : '-') ?></td>

                                                            <td width="20%">

                                                                <a href="<?= base_url('/inventaris/delete_jenis/'.$data -> id_ruang) ?>">

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