<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Schema;
use DateTime;

class Inventaris extends BaseController {

	// ====================================================================================================================================================== // - Index

        public function index() {

            if (session() -> get('id') == NULL) {

                return redirect() -> to('/home/');

            } else if (session() -> get('id') > 0) {

                $Schema = new Schema();

                    // Fetching data

                    $on = 'inventaris.id_jenis = jenis.id_jenis';
                    $on1 = 'inventaris.id_ruang = ruang.id_ruang';
                    $on2 = 'inventaris.id_petugas = petugas.id_petugas';

                    $profile['petugas'] = $Schema -> getWhere('petugas', array('id_petugas' => session() -> get('id')));
                    $_fetch['inventarisData'] = $Schema -> visual_table_join4('inventaris', 'jenis', 'ruang', 'petugas', $on, $on1, $on2);

                echo view('pages/layout/_header');
                echo view('pages/layout/_navbar', $profile);
                echo view('pages/layout/_menu');
                echo view('pages/data/inventaris_data', $_fetch);
                echo view('pages/layout/_footer');

            }

        }

        public function jenis_view() {

            if (session() -> get('id') > 0) {

                $Schema = new Schema();

                    // Fetching data

                    $profile['petugas'] = $Schema -> getWhere('petugas', array('id_petugas' => session() -> get('id')));
                    $_fetch['jenisData'] = $Schema -> visual_table('jenis');

                echo view('pages/layout/_header');
                echo view('pages/layout/_navbar', $profile);
                echo view('pages/layout/_menu');
                echo view('pages/data/jenis_data', $_fetch);
                echo view('pages/layout/_footer');

            } else {

                return redirect() -> to('/home/');

            }

        }

        public function ruang_view() {

            if (session() -> get('id') > 0) {

                $Schema = new Schema();

                    // Fetching data

                    $profile['petugas'] = $Schema -> getWhere('petugas', array('id_petugas' => session() -> get('id')));
                    $_fetch['ruangData'] = $Schema -> visual_table('ruang');

                echo view('pages/layout/_header');
                echo view('pages/layout/_navbar', $profile);
                echo view('pages/layout/_menu');
                echo view('pages/data/ruang_data', $_fetch);
                echo view('pages/layout/_footer');

            } else {

                return redirect() -> to('/home/');

            }

        }

        public function peminjaman_view() {

            if (session() -> get('id') > 0) {

                $Schema = new Schema();

                    // Fetching data

                    $on = 'detail_pinjam.id_inventaris = inventaris.id_inventaris';
                    $on1 = 'detail_pinjam.id_peminjam = peminjam.id_peminjam';

                    $profile['petugas'] = $Schema -> getWhere('petugas', array('id_petugas' => session() -> get('id')));
                    $_fetch['peminjamanData'] = $Schema -> visual_table_join3('detail_pinjam', 'inventaris', 'peminjam', $on, $on1);
                    $_fetch['inventarisData'] = $Schema -> visual_table('inventaris');
                    $_fetch['pegawaiData'] = $Schema -> visual_table('pegawai');

                echo view('pages/layout/_header');
                echo view('pages/layout/_navbar', $profile);
                echo view('pages/layout/_menu');
                echo view('pages/data/peminjaman_data', $_fetch);
                echo view('pages/layout/_footer');

            } else {

                return redirect() -> to('/home/');

            }

        }

        public function pengembalian_view() {

            if (session() -> get('id') > 0) {

                $Schema = new Schema();

                    // Fetching data

                    $on = 'detail_pinjam.id_inventaris = inventaris.id_inventaris';
                    $on1 = 'detail_pinjam.id_peminjam = peminjam.id_peminjam';

                    $profile['petugas'] = $Schema -> getWhere('petugas', array('id_petugas' => session() -> get('id')));
                    $_fetch['peminjamanData'] = $Schema -> visual_table_join3('detail_pinjam', 'inventaris', 'peminjam', $on, $on1);
                    $_fetch['inventarisData'] = $Schema -> visual_table('inventaris');

                echo view('pages/layout/_header');
                echo view('pages/layout/_navbar', $profile);
                echo view('pages/layout/_menu');
                echo view('pages/data/pengembalian_data', $_fetch);
                echo view('pages/layout/_footer');

            } else {

                return redirect() -> to('/home/');

            }

        }

	// ====================================================================================================================================================== // - Create, delete
        
        public function insert_jenis() {

			if (in_array(session() -> get('level'), [1]) && session() -> get('id') > 0) {

				$Schema = new Schema();

				// Inventaris data collecting

                    $nama_jenis = $this -> request -> getPost('nama_jenis');
                    $kode_jenis = $this -> request -> getPost('kode_jenis');
                    $keterangan = $this -> request -> getPost('keterangan');

				// Add data into databases
                
                    // Convert data into an array and insert to database table

                        $inventarisData = array(
                            'nama_jenis' => $nama_jenis,
                            'kode_jenis' => $kode_jenis,
                            'keterangan' => $keterangan,
                        );

                    $Schema -> add_data('jenis', $inventarisData);

				return redirect() -> to('/inventaris/jenis_view'); // Redirect to user pages


			} else {

				return redirect() -> to('/inventaris/'); // Redirect pages into user function

			}

		}

        public function delete_jenis($_id) {

            if (in_array(session() -> get('level'), [1]) && session() -> get('id') > 0) {

                $Schema = new Schema();

                    // Delete data from database

                        $Schema -> delete_data('jenis', array('id_jenis' => $_id));

                return redirect() -> to('/inventaris/jenis_view'); // Reidrect to user pages

            } else {

                return redirect() -> to('/inventaris/'); // Redirect to user pages

            }

        }

	// ====================================================================================================================================================== // - Create, delete
    
        public function insert_ruang() {

			if (in_array(session() -> get('level'), [1]) && session() -> get('id') > 0) {

				$Schema = new Schema();

				// Inventaris data collecting

                    $nama_ruang = $this -> request -> getPost('nama_ruang');
                    $kode_ruang = $this -> request -> getPost('kode_ruang');
                    $keterangan = $this -> request -> getPost('keterangan');

				// Add data into databases
                
                    // Convert data into an array and insert to database table

                        $inventarisData = array(
                            'nama_ruang' => $nama_ruang,
                            'kode_ruang' => $kode_ruang,
                            'keterangan' => $keterangan,
                        );

                    $Schema -> add_data('ruang', $inventarisData);

				return redirect() -> to('/inventaris/ruang_view'); // Redirect to user pages


			} else {

				return redirect() -> to('/inventaris/'); // Redirect pages into user function

			}

		}

        public function delete_ruang($_id) {

            if (in_array(session() -> get('level'), [1]) && session() -> get('id') > 0) {

                $Schema = new Schema();

                    // Delete data from database

                        $Schema -> delete_data('ruang', array('id_ruang' => $_id));

                return redirect() -> to('/inventaris/ruang_view'); // Reidrect to user pages

            } else {

                return redirect() -> to('/inventaris/'); // Redirect to user pages

            }

        }

	// ====================================================================================================================================================== // - Create, update, delete

        public function view_insert_inventaris() {

            if (in_array(session() -> get('level'), [1]) && session() -> get('id') > 0) {

                $Schema = new Schema();

                // Fetching data

                    $profile['petugas'] = $Schema -> getWhere('petugas', array('id_petugas' => session() -> get('id')));
                    $_fetch['jenisData'] = $Schema -> visual_table('jenis');
                    $_fetch['ruangData'] = $Schema -> visual_table('ruang');
                    $_fetch['petugasData'] = $Schema -> visual_table('petugas');

                echo view('pages/layout/_header');
                echo view('pages/layout/_navbar', $profile);
                echo view('pages/layout/_menu');
                echo view('pages/forms/insert_inventaris', $_fetch);
                echo view('pages/layout/_footer');

            } else {

                return redirect() -> to('/home/'); // Redirect pages into home function

            }
            
        }

        public function insert_inventaris() {

			if (in_array(session() -> get('level'), [1]) && session() -> get('id') > 0) {

				$Schema = new Schema();

				// Inventaris data collecting

                    $nama_barang = $this -> request -> getPost('nama_barang');
                    $kondisi_barang = $this -> request -> getPost('kondisi_barang');
                    $keterangan_barang = $this -> request -> getPost('keterangan_barang');
                    $jumlah_barang = $this -> request -> getPost('jumlah_barang');
                    $jenis = $this -> request -> getPost('jenis');
                    $ruang = $this -> request -> getPost('ruang');
                    $kode = $this -> request -> getPost('kode');
                    $petugas = $this -> request -> getPost('petugas');

				// Add data into databases
                
                    // Convert data into an array and insert to database table

                        $inventarisData = array(
                            'nama' => $nama_barang,
                            'kondisi' => $kondisi_barang,
                            'keterangan_inventaris' => $keterangan_barang,
                            'jumlah' => $jumlah_barang,
                            'id_jenis' => $jenis,
                            'tanggal_register' => date('Y-m-d', strtotime('now')),
                            'id_ruang' => $ruang,
                            'kode_inventaris' => $kode,
                            'id_petugas' => $petugas
                        );

                    $Schema -> add_data('inventaris', $inventarisData);

				return redirect() -> to('/inventaris/'); // Redirect to user pages


			} else {

				return redirect() -> to('/inventaris/'); // Redirect pages into user function

			}

		}

        public function view_update_inventaris($_id) {

            if (in_array(session() -> get('level'), [1]) && session() -> get('id') > 0) {

                $Schema = new Schema();

                // Fetching data

                    $profile['petugas'] = $Schema -> getWhere('petugas', array('id_petugas' => session() -> get('id')));
                    $_fetch['inventarisData'] = $Schema -> getWhere('inventaris', array('id_inventaris' => $_id));
                    $_fetch['jenisData'] = $Schema -> visual_table('jenis');
                    $_fetch['ruangData'] = $Schema -> visual_table('ruang');
                    $_fetch['petugasData'] = $Schema -> visual_table('petugas');

                echo view('pages/layout/_header');
                echo view('pages/layout/_navbar', $profile);
                echo view('pages/layout/_menu');
                echo view('pages/forms/update_inventaris', $_fetch);
                echo view('pages/layout/_footer');

            } else {

                return redirect() -> to('/home/'); // Redirect pages into home function

            }
            
        }

        public function update_inventaris() {

			if (in_array(session() -> get('level'), [1]) && session() -> get('id') > 0) {

				$Schema = new Schema();

				// Inventaris data collecting

                    $nama_barang = $this -> request -> getPost('nama_barang');
                    $kondisi_barang = $this -> request -> getPost('kondisi_barang');
                    $keterangan_barang = $this -> request -> getPost('keterangan_barang');
                    $jumlah_barang = $this -> request -> getPost('jumlah_barang');
                    $jenis = $this -> request -> getPost('jenis');
                    $ruang = $this -> request -> getPost('ruang');
                    $kode = $this -> request -> getPost('kode');
                    $petugas = $this -> request -> getPost('petugas');
                    $inventarisid = $this -> request -> getPost('InventarisID');

				// Add data into databases
                
                    // Convert data into an array and insert to database table

                        $inventarisData = array(
                            'nama' => $nama_barang,
                            'kondisi' => $kondisi_barang,
                            'keterangan_inventaris' => $keterangan_barang,
                            'jumlah' => $jumlah_barang,
                            'id_jenis' => $jenis,
                            'id_ruang' => $ruang,
                            'kode_inventaris' => $kode,
                            'id_petugas' => $petugas
                        );

                    $Schema -> edit_data('inventaris', $inventarisData, array('id_inventaris' => $inventarisid));

				return redirect() -> to('/inventaris/'); // Redirect to user pages


			} else {

				return redirect() -> to('/inventaris/'); // Redirect pages into user function

			}

		}

        public function delete_inventaris($_id) {

            if (in_array(session() -> get('level'), [1]) && session() -> get('id') > 0) {

                $Schema = new Schema();

                    // Delete data from database

                        $Schema -> delete_data('inventaris', array('id_inventaris' => $_id));

                return redirect() -> to('/inventaris/'); // Reidrect to user pages

            } else {

                return redirect() -> to('/inventaris/'); // Redirect to user pages

            }

        }

	// ====================================================================================================================================================== // - Create, update, delete

        public function insert_peminjaman() {

			if (session() -> get('id') > 0) {

				$Schema = new Schema();

				// Inventaris data collecting

                    $nama_barang = $this -> request -> getPost('nama_barang');
                    $jumlah = $this -> request -> getPost('jumlah');
                    $pegawai = $this -> request -> getPost('pegawai');

				// Add data into databases
                
                    if (in_array(session() -> get('level'), [1, 2])) {

                        // Convert data into an array and insert to database table

                            $inventarisData = array(
                                'tanggal_pinjam' => date('Y-m-d', strtotime('now')),
                                'status_peminjaman' => 'dipinjam',
                                'id_pegawai' => $pegawai
                            );

                        $Schema -> add_data('peminjam', $inventarisData);

                    } else if (in_array(session() -> get('level'), [3])) {

                        // Convert data into an array and insert to database table

                            $inventarisData = array(
                                'tanggal_pinjam' => date('Y-m-d', strtotime('now')),
                                'status_pinjam' => 'dipinjam',
                                'id_pegawai' => session() -> get('id')
                            );

                        $Schema -> add_data('peminjam', $inventarisData);

                    }

                    $where = $Schema -> getWhere2('peminjam', array('id_pegawai' => $pegawai));
                    $id = $where['id_pegawai'];

					// Convert data into an array and insert to databse table

                        $detail = array(
                            'id_inventaris' => $nama_barang,
                            'jumlah_peminjaman' => $jumlah,
                            'id_peminjam' => $id,
                        );

                    $Schema -> add_data('detail_pinjam', $detail);

				return redirect() -> to('/inventaris/'); // Redirect to user pages


			} else {

				return redirect() -> to('/inventaris/'); // Redirect pages into user function

			}

		}

        public function view_update_peminjaman($_id) {

            if (in_array(session() -> get('level'), [1]) && session() -> get('id') > 0) {

                $Schema = new Schema();

                // Fetching data

                    $profile['petugas'] = $Schema -> getWhere('petugas', array('id_petugas' => session() -> get('id')));
                    $_fetch['inventarisData'] = $Schema -> getWhere('inventaris', array('id_inventaris' => $_id));
                    $_fetch['jenisData'] = $Schema -> visual_table('jenis');
                    $_fetch['ruangData'] = $Schema -> visual_table('ruang');
                    $_fetch['petugasData'] = $Schema -> visual_table('petugas');

                echo view('pages/layout/_header');
                echo view('pages/layout/_navbar', $profile);
                echo view('pages/layout/_menu');
                echo view('pages/forms/update_inventaris', $_fetch);
                echo view('pages/layout/_footer');

            } else {

                return redirect() -> to('/home/'); // Redirect pages into home function

            }
            
        }

        // public function update_inventaris() {

		// 	if (in_array(session() -> get('level'), [1]) && session() -> get('id') > 0) {

		// 		$Schema = new Schema();

		// 		// Inventaris data collecting

        //             $nama_barang = $this -> request -> getPost('nama_barang');
        //             $kondisi_barang = $this -> request -> getPost('kondisi_barang');
        //             $keterangan_barang = $this -> request -> getPost('keterangan_barang');
        //             $jumlah_barang = $this -> request -> getPost('jumlah_barang');
        //             $jenis = $this -> request -> getPost('jenis');
        //             $ruang = $this -> request -> getPost('ruang');
        //             $kode = $this -> request -> getPost('kode');
        //             $petugas = $this -> request -> getPost('petugas');
        //             $inventarisid = $this -> request -> getPost('InventarisID');

		// 		// Add data into databases
                
        //             // Convert data into an array and insert to database table

        //                 $inventarisData = array(
        //                     'nama' => $nama_barang,
        //                     'kondisi' => $kondisi_barang,
        //                     'keterangan_inventaris' => $keterangan_barang,
        //                     'jumlah' => $jumlah_barang,
        //                     'id_jenis' => $jenis,
        //                     'id_ruang' => $ruang,
        //                     'kode_inventaris' => $kode,
        //                     'id_petugas' => $petugas
        //                 );

        //             $Schema -> edit_data('inventaris', $inventarisData, array('id_inventaris' => $inventarisid));

		// 		return redirect() -> to('/inventaris/'); // Redirect to user pages


		// 	} else {

		// 		return redirect() -> to('/inventaris/'); // Redirect pages into user function

		// 	}

		// }

        // public function delete_inventaris($_id) {

        //     if (in_array(session() -> get('level'), [1]) && session() -> get('id') > 0) {

        //         $Schema = new Schema();

        //             // Delete data from database

        //                 $Schema -> delete_data('inventaris', array('id_inventaris' => $_id));

        //         return redirect() -> to('/inventaris/'); // Reidrect to user pages

        //     } else {

        //         return redirect() -> to('/inventaris/'); // Redirect to user pages

        //     }

        // }

}