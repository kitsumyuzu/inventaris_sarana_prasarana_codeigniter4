<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Schema;

class Home extends BaseController {

	// ====================================================================================================================================================== // - Index

		public function index() {

			if (session() -> get('id') == NULL) {

				return view('pages/login');

			} else if (session() -> get('id') > 0) {

				if (in_array(session() -> get('level'), [1, 2])) {

					return redirect() -> to('/home/dashboard'); // Redirect pages into dashboard function

				} else if (in_array(session() -> get('level'), [3])) {

					return redirect() -> to('/home/dashboard');
					
				}

			}

		}
		
	// ====================================================================================================================================================== // - Login function

		public function authentication_login() {

			$Schema = new Schema();

				$username = $this -> request -> getPost('username');
				$password = $this -> request -> getPost('password');

				$login_data = array(
					'username' => $username,
					'password' => md5($password)
				);

			$session = $Schema -> getWhere2('petugas', $login_data);

			if ($session > 0) {

				session() -> set('id', $session['id_petugas']);
				session() -> set('username', $session['username']);
				session() -> set('nickname', $session['nama_petugas']);
				session() -> set('level', $session['id_level']);
				
				return redirect() -> to('/home/dashboard'); // Redirect pages into dashboard function

			} else {

				return redirect() -> to('/home/'); // Redirect pages into home function
			}

		}

		public function authentication_logout() {

			session() -> destroy();

			return redirect() -> to('/home/'); // Redirect pages into home function

		}

	// ====================================================================================================================================================== // - Pages view function
	
		public function dashboard() {

			if (session() -> get('id') > 0) {

				$Schema = new Schema();

					// Fetching data

						$profile['petugas'] = $Schema -> getWhere('petugas', array('id_petugas' => session() -> get('id')));

				echo view('pages/layout/_header');
				echo view('pages/layout/_navbar', $profile);
				echo view('pages/layout/_menu');
				echo view('pages/dashboard');
				echo view('pages/layout/_footer');

			} else {

				return redirect() -> to('/home/'); // Redirect pages into home function

			}

		}

}