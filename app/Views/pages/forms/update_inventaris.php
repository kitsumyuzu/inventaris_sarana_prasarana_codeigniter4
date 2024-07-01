            <div class="main-panel">

                <div class="content">

                    <div class="page-inner py-3">

                        <div class="row">

                            <div class="col-md-4">

                                <a href="/inventaris/">
                                    <button class="btn btn-lg btn-rounded btn-secondary col-12"><i class="fas fa-circle-left mr-2"></i>Back</button>
                                </a>

                            </div>

                            <div class="col-md-8">

                                <div class="card d-flex align-items-center justify-content-center">

                                    <div class="card-header">

										<div class="d-flex align-items-center">

											<h4 class="card-title"><i class="mr-2 fas fa-archive"></i><b>UPDATE</b></h4>
                                            <ul class="breadcrumbs">

                                                <li class="nav-home">

                                                    <a href="/home/dashboard/" class="fas fa-home"></a>

                                                </li>

                                                <li class="separator">

                                                    <i class="fas fa-caret-right"></i>

                                                </li>

													<li class="nav-item">

														<a href="/inventaris/">inventaris</a>

													</li>

                                                <li class="separator">

                                                    <i class="fas fa-caret-right"></i>

                                                </li>

													<li class="nav-item">

														<a>update_inventaris</a>

													</li>

                                            </ul>

										</div>

									</div>

                                    <form action="/inventaris/update_inventaris/" method="post" enctype="multipart/form-data">

                                        <input type="hidden" name="InventarisID" value="<?php echo $inventarisData -> id_inventaris ?>">

                                        <div class="card-body">

                                            <div class="row">
                                                
                                                <div class="form-group col-md-4">
    
                                                    <label for="nama_barang_input">Nama Barang <span style="color: #ff0000"> *</span></label>
    
                                                    <div class="col-md-12 p-0">
    
                                                        <input class="form-control" type="text" name="nama_barang" id="nama_barang_input" value="<?php echo $inventarisData -> nama ?>" placeholder="Nama Barang" required maxlength="225">
    
                                                    </div>
    
                                                </div>
    
                                                <div class="form-group col-md-4">
    
                                                    <label for="kondisi_barang_input">Kondisi Barang <span style="color: #ff0000"> *</span></label>
    
                                                    <div class="col-md-12 p-0">
    
                                                        <select class="form-control input-full" name="kondisi_barang" id="kondisi_barang_input">
    
                                                            <option disabled selected>Select Kondisi</option>
                                                            <option value="baik" <?php echo $inventarisData -> kondisi == 'baik' ? 'selected' : '' ?>>Baik</option>
                                                            <option value="buruk" <?php echo $inventarisData -> kondisi == 'buruk' ? 'selected' : '' ?>>Buruk</option>
    
                                                        </select>
    
                                                    </div>
    
                                                </div>
    
                                                <div class="form-group col-md-4">
    
                                                    <label for="keterangan_input">Keterangan <span style="color: #ff0000"> *</span></label>
    
                                                    <div class="col-md-12 p-0">
    
                                                        <input class="form-control" type="text" name="keterangan_barang" id="keterangan_input" value="<?php echo $inventarisData -> keterangan_inventaris ?>" placeholder="Keterangan" required maxlength="100">
    
                                                    </div>
    
                                                </div>

                                                <div class="form-group col-md-4">
    
                                                    <label for="jumlah_input">Jumlah <span style="color: #ff0000"> *</span></label>
    
                                                    <div class="col-md-12 p-0">
    
                                                        <input class="form-control" type="number" name="jumlah_barang" id="jumlah_input" value="<?php echo $inventarisData -> jumlah ?>" placeholder="Jumlah" required min="0">
    
                                                    </div>
    
                                                </div>

                                                <div class="form-group col-md-4">
                                                    
                                                    <label for="jenis_input">Jenis <span style="color: #ff0000"> *</span></label>

                                                    <div class="col-md-12 p-0">

                                                        <select class="form-control" name="jenis" id="jenis_input" required>

                                                            <option disabled selected>Select Jenis</option>
                                                            <?php foreach ($jenisData as $data) { ?>

                                                                <option value="<?php echo $data -> id_jenis ?>" <?php echo $inventarisData -> id_jenis == $data -> id_jenis ? 'selected' : '' ?>><?php echo ucwords($data -> nama_jenis) ?></option>

                                                            <?php } ?>

                                                        </select>

                                                    </div>

                                                </div>

                                                <div class="form-group col-md-4">
                                                    
                                                    <label for="ruang_input">Ruang <span style="color: #ff0000"> *</span></label>

                                                    <div class="col-md-12 p-0">

                                                        <select class="form-control" name="ruang" id="ruang_input" required>

                                                            <option disabled selected>Select Ruang</option>
                                                            <?php foreach ($ruangData as $data) { ?>

                                                                <option value="<?php echo $data -> id_ruang ?>" <?php echo $inventarisData -> id_ruang == $data -> id_ruang ? 'selected' : '' ?>><?php echo ucwords($data -> nama_ruang) ?></option>

                                                            <?php } ?>

                                                        </select>

                                                    </div>

                                                </div>

                                                <div class="form-group col-md-4">
    
                                                    <label for="kode_input">Kode Inventaris <span style="color: #ff0000"> *</span></label>
    
                                                    <div class="col-md-12 p-0">
    
                                                        <input class="form-control" type="text" name="kode" id="kode_input" value="<?php echo $inventarisData -> kode_inventaris ?>" placeholder="Kode Inventaris" required maxlength="100">
    
                                                    </div>
    
                                                </div>

                                                <div class="form-group col-md-4">
                                                    
                                                    <label for="petugas_input">Petugas <span style="color: #ff0000"> *</span></label>

                                                    <div class="col-md-12 p-0">

                                                        <select class="form-control" name="petugas" id="petugas_input" required>

                                                            <option disabled selected>Select Petugas</option>
                                                            <?php 
                                                            
                                                                foreach ($petugasData as $data) {
                                                                    
                                                                    if ($data -> id_level == '2') {
                                                                        
                                                            ?>

                                                                <option value="<?php echo $data -> id_petugas ?>" <?php echo $inventarisData -> id_petugas == $data -> id_petugas ? 'selected' : '' ?>><?php echo ucwords($data -> nama_petugas) ?></option>

                                                            <?php 
                                                        
                                                                    }
                                                            
                                                                }
                                                                
                                                            ?>

                                                        </select>

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

                        </div>

                    </div>

                </div>