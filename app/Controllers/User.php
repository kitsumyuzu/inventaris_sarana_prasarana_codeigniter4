<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Schema;

class User extends BaseController {

	// ====================================================================================================================================================== // - Index

        public function index() {

            if (session() -> get('id') == NULL) {

                return redirect() -> to('/home/'); // Redirect pages into home function

            } else if (session() -> get('id') > 0) {

                $Schema = new Schema();

					// Fetching data

                    $on = 'petugas.id_level = level.id_level';

					$profile['petugas'] = $Schema -> getWhere('petugas', array('id_petugas' => session() -> get('id')));
					$_fetch['petugasData'] = $Schema -> visual_table_join2('petugas', 'level', $on);

				echo view('pages/layout/_header');
				echo view('pages/layout/_navbar', $profile);
				echo view('pages/layout/_menu');
				echo view('pages/data/user_data', $_fetch);
				echo view('pages/layout/_footer');

            }

        }

		public function view_pegawai($_id) {

			if (session() -> get('id') > 0) {

				$Schema = new Schema();

					// Fetching data

					$on = 'petugas.id_petugas = pegawai._user';

					$profile['petugas'] = $Schema -> getWhere('petugas', array('id_petugas' => session() -> get('id')));
					$_fetch['pegawaiData'] = $Schema -> getWhere_table_join_2('pegawai', 'petugas', $on, array('id_petugas' => $_id));

				echo view('pages/layout/_header');
				echo view('pages/layout/_navbar', $profile);
				echo view('pages/layout/_menu');
				echo view('pages/data/pegawai_data', $_fetch);
				echo view('pages/layout/_footer');

			} else {

				return redirect() -> to('/home/');

			}

		}

	// ====================================================================================================================================================== // - Create, update, delete

		public function view_insert_user() {

			if (in_array(session() -> get('level'), [1]) && session() -> get('id') > 0) {

				$Schema = new Schema();

				// Fetching data

					$profile['petugas'] = $Schema -> getWhere('petugas', array('id_petugas' => session() -> get('id')));
					$_fetch['levelData'] = $Schema -> visual_table('level');

				echo view('pages/layout/_header');
				echo view('pages/layout/_navbar', $profile);
				echo view('pages/layout/_menu');
				echo view('pages/forms/insert_user', $_fetch);
				echo view('pages/layout/_footer');

			} else {

				return redirect() -> to('/home/'); // Redirect pages into home function

			}
			
		}

		public function insert_user() {

			if (in_array(session() -> get('level'), [1]) && session() -> get('id') > 0) {

				$Schema = new Schema();

				// Petugas data collecting

					$profile = $this -> request -> getFile('profile');
					$username = $this -> request -> getPost('username');
					$password = $this -> request -> getPost('password');
					$level = $this -> request -> getPost('level');

				// Pegawai data collecting

					$nip = $this -> request -> getPost('nip');
					$nama_depan = $this -> request -> getPost('nama_depan');
					$nama_belakang = $this -> request -> getPost('nama_belakang');
					$jenis_kelamin = $this -> request -> getPost('jenis_kelamin');
					$tanggal_lahir = $this -> request -> getPost('tanggal_lahir');
					$tempat_lahir = $this -> request -> getPost('tempat_lahir');
					$alamat = $this -> request -> getPost('alamat');
					$nomor_handphone = $this -> request -> getPost('nomor_handphone');

				// Image validate

					if ($profile && $profile -> isValid() && ! $profile -> hasMoved()) {

						if ($profile == 'default.png' || 'default-profile.png' || NULL) {

							$images = $profile -> getRandomName();
							$profile -> move('assets/images/', $images);

						} else {

							$images = $profile -> getRandomName();
							$profile -> move('assets/images/', $images);

						}

					} else {

						$images = 'default-profile.png';

					}

				// Add data into databases

					if ($level == '1') {

						// Convert data into an array and insert to database table

							$petugasData = array(
								'profile' => $images,
								'username' => $username,
								'password' => md5($password),
								'nama_petugas' => $nama_depan . " " . $nama_belakang,
								'id_level' => '1',
							);

						$Schema -> add_data('petugas', $petugasData);

					} else if ($level == '2') {

						// Convert data into an array and insert to database table

							$petugasData = array(
								'profile' => $images,
								'username' => $username,
								'password' => md5($password),
								'nama_petugas' => $nama_depan . " " . $nama_belakang,
								'id_level' => '2',
							);

						$Schema -> add_data('petugas', $petugasData);

					} else {

						// Convert data into an array and insert to database table

							$petugasData = array(
								'profile' => $images,
								'username' => $username,
								'password' => md5($password),
								'nama_petugas' => $nama_depan . " " . $nama_belakang,
								'id_level' => '3',
							);

						$Schema -> add_data('petugas', $petugasData);

					}

					$where = $Schema -> getWhere2('petugas', array('username' => $username));
					$id = $where['id_petugas'];

					// Convert data into an array and insert to databse table
				
						$pegawaiData = array(
							'nip' => $nip,
							'nama_depan' => $nama_depan,
							'nama_belakang' => $nama_belakang,
							'jenis_kelamin' => $jenis_kelamin,
							'tanggal_lahir' => $tanggal_lahir,
							'tempat_lahir' => $tempat_lahir,
							'alamat' => $alamat,
							'nomor_handphone' => '+62 ' . $nomor_handphone,
							'_user' => $id
						);

					$Schema -> add_data('pegawai', $pegawaiData);

				return redirect() -> to('/user/'); // Redirect to user pages


			} else {

				return redirect() -> to('/user/'); // Redirect pages into user function

			}

		}

		public function view_update_user($_id) {

			if (in_array(session() -> get('level'), [1]) && session() -> get('id') > 0) {

				$Schema = new Schema();

				// Fetching data

					$on = 'petugas.id_petugas = pegawai._user';
					$profile['petugas'] = $Schema -> getWhere('petugas', array('id_petugas' => session() -> get('id')));
					$_fetch['petugasData'] = $Schema -> getWhere_table_join_2('petugas', 'pegawai', $on, array('id_petugas' => $_id));
					$_fetch['levelData'] = $Schema -> visual_table('level');

				echo view('pages/layout/_header');
				echo view('pages/layout/_navbar', $profile);
				echo view('pages/layout/_menu');
				echo view('pages/forms/update_user', $_fetch);
				echo view('pages/layout/_footer');

			} else {

				return redirect() -> to('/home/'); // Redirect pages into home function

			}
			
		}

		public function update_user() {

			if (in_array(session() -> get('level'), [1]) && session() -> get('id') > 0) {

				$Schema = new Schema();

				// Petugas data collecting

					$profile = $this -> request -> getFile('profile');
					$username = $this -> request -> getPost('username');
					$level = $this -> request -> getPost('level');
					$petugasid = $this -> request -> getPost('PetugasID');
					$petugasprofile = $this -> request -> getPost('PetugasProfile');

				// Pegawai data collecting

					$nip = $this -> request -> getPost('nip');
					$nama_depan = $this -> request -> getPost('nama_depan');
					$nama_belakang = $this -> request -> getPost('nama_belakang');
					$jenis_kelamin = $this -> request -> getPost('jenis_kelamin');
					$tanggal_lahir = $this -> request -> getPost('tanggal_lahir');
					$tempat_lahir = $this -> request -> getPost('tempat_lahir');
					$alamat = $this -> request -> getPost('alamat');
					$nomor_handphone = $this -> request -> getPost('nomor_handphone');
					$pegawaiid = $this -> request -> getPost('PetugasID');
					
				// Image validate

					if ($profile && $profile -> isValid() && ! $profile -> hasMoved()) {

						if ($profile == 'default.png' || 'default-profile.png' || NULL) {

							$images = $profile -> getRandomName();
							$profile -> move('assets/images/', $images);

						} else {

							if (file_exists('assets/images/'.$profile)) {

								unlink('assets/images/'.$petugasprofile);

							} else {

								$images = $profile -> getRandomName();
								$profile -> move('assets/images/', $images);
								
							}

						}

					} else {

						if ($petugasprofile == 'default-profile.png' || NULL) {

							$images = 'default-profile.png';

						} else {

							$images = $petugasprofile;

						}

					}

				// Add data into databases

					if ($level == '1') {

						// Convert data into an array and insert to database table

							$petugasData = array(
								'profile' => $images,
								'username' => $username,
								'nama_petugas' => $nama_depan . " " . $nama_belakang,
								'id_level' => '1',
							);

						$Schema -> edit_data('petugas', $petugasData, array('id_petugas' => $petugasid));
						
					} else if ($level == '2') {

						// Convert data into an array and insert to database table

							$petugasData = array(
								'profile' => $images,
								'username' => $username,
								'nama_petugas' => $nama_depan . " " . $nama_belakang,
								'id_level' => '2',
							);

						$Schema -> edit_data('petugas', $petugasData, array('id_petugas' => $petugasid));

					} else {

						// Convert data into an array and insert to database table

							$petugasData = array(
								'profile' => $images,
								'username' => $username,
								'nama_petugas' => $nama_depan . " " . $nama_belakang,
								'id_level' => '3',
							);

						$Schema -> edit_data('petugas', $petugasData, array('id_petugas' => $petugasid));

					}

					// Convert data into an array and insert to databse table

						$pegawaiData = array(
							'nip' => $nip,
							'nama_depan' => $nama_depan,
							'nama_belakang' => $nama_belakang,
							'jenis_kelamin' => $jenis_kelamin,
							'tanggal_lahir' => $tanggal_lahir,
							'tempat_lahir' => $tempat_lahir,
							'alamat' => $alamat,
							'nomor_handphone' => '+62 ' . $nomor_handphone,
						);

					$Schema -> edit_data('pegawai', $pegawaiData, array('_user' => $pegawaiid));

				return redirect() -> to('/user/'); // Redirect to user pages


			} else {

				return redirect() -> to('/user/'); // Redirect pages into user function

			}

		}

		public function delete_user($_id) {

            if (in_array(session() -> get('level'), [1]) && session() -> get('id') > 0) {

                $Schema = new Schema();

                    // Delete data from database

                        $Schema -> delete_data('petugas', array('id_petugas' => $_id));
                        $Schema -> delete_data('pegawai', array('_user' => $_id));

                return redirect() -> to('/user/'); // Reidrect to user pages

            } else {

                return redirect() -> to('/user/'); // Redirect to user pages

            }

        }

}