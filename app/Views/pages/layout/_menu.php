            <div class="sidebar sidebar-style-2" data-background-color="dark2">

				<div class="sidebar-wrapper scrollbar scrollbar-inner">

					<div class="sidebar-content">

						<ul class="nav nav-primary">

							<li class="nav-item active">

								<a href="/home/dashboard/">

									<i class="fas fa-home"></i>
									<p>Dashboard</p>
									
								</a>

							</li>

							<?php if (in_array(session() -> get('level'), [1])) { ?>

								<li class="nav-item">
									
									<a href="/user/">

										<i class="fas fa-user-secret"></i>
										<p>Data Pengguna</p>

									</a>

								</li>

								<li class="nav-item">

									<a data-toggle="collapse" href="#inventarisir-section">

										<i class="fa fa-boxes-packing"></i>
										<p>Inventarisir</p>
										<span class="caret"></span>

									</a>

									<div class="collapse" id="inventarisir-section">

										<ul class="nav nav-collapse subnav">

											<li>

												<a href="/inventaris/jenis_view">
											
													<p>Jenis</p>

												</a>

												<a href="/inventaris/ruang_view">
											
													<p>Ruang</p>
													
												</a>

												<a href="/inventaris/">
											
													<p>Inventaris</p>
													
												</a>

											</li>

										</ul>

									</div>
									
								</li>

								<li class="nav-item">

									<a data-toggle="collapse" href="#peminjaman-section">

										<i class="fa fa-hands-holding"></i>
										<p>Peminjaman</p>
										<span class="caret"></span>

									</a>

									<div class="collapse" id="peminjaman-section">

										<ul class="nav nav-collapse subnav">

											<li>

												<a href="/inventaris/peminjaman_view/">

													<p>Peminjaman</p>

												</a>

												<a href="/inventaris/pengembalian_view/">

													<p>Pengembalian</p>

												</a>

											</li>

										</ul>

									</div>
									
								</li>

								<li class="nav-item">

									<a href="">

										<i class="fa fa-file-pdf"></i>
										<p>Laporan</p>

									</a>
									
								</li>

							<?php } else if (in_array(session() -> get('level'), [2])) { ?>

								<li class="nav-item">

									<a data-toggle="collapse" href="#peminjaman-section">

										<i class="fa fa-hands-holding"></i>
										<p>Peminjaman</p>
										<span class="caret"></span>

									</a>

									<div class="collapse" id="peminjaman-section">

										<ul class="nav nav-collapse subnav">

											<li>

												<a href="/inventaris/peminjaman_view/">

													<p>Peminjaman</p>

												</a>

												<a href="/inventaris/pengembalian_view/">

													<p>Pengembalian</p>

												</a>

											</li>

										</ul>

									</div>
									
								</li>
							
							<?php } else if (in_array(session() -> get('level'), [3])) { ?>
							
								<li class="nav-item">

									<a href="/inventaris/peminjaman_view/">

										<i class="fa fa-hands-holding"></i>
										<p>Peminjaman</p>

									</a>
									
								</li>
								
							<?php } ?>
								
						</ul>

					</div>

				</div>

			</div>