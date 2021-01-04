@extends('layouts.index')
@section('content')
    <div class="content-wrapper">
        <!-- Page header -->
			<div class="page-header">
				<div class="page-header-content header-elements-md-inline">
					<div class="page-title d-flex">
						<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Dashboard</h4>
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>

					<div class="header-elements d-none text-center text-md-left mb-3 mb-md-0">
						<div class="btn-group">
							<button type="button" class="btn bg-indigo-400"><i class="icon-stack2 mr-2"></i> New report</button>
							<button type="button" class="btn bg-indigo-400 dropdown-toggle" data-toggle="dropdown"></button>
							<div class="dropdown-menu dropdown-menu-right">
								<div class="dropdown-header">Actions</div>
								<a href="#" class="dropdown-item"><i class="icon-file-eye"></i> View reports</a>
								<a href="#" class="dropdown-item"><i class="icon-file-plus"></i> Edit reports</a>
								<a href="#" class="dropdown-item"><i class="icon-file-stats"></i> Statistics</a>
								<div class="dropdown-header">Export</div>
								<a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export to PDF</a>
								<a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to CSV</a>
							</div>
						</div>
					</div>
				</div>
			</div>
            <!-- /page header -->
            
            <!-- Content area -->
			<div class="content pt-0">

				<!-- Main charts -->
				<div class="row">
					<div class="col-xl-12">

						<!-- Traffic sources -->
						<div class="card">
							<div class="card-header header-elements-inline">
								<h6 class="card-title">Traffic sources</h6>
							{{--<div class="header-elements">
									<div class="form-check form-check-right form-check-switchery form-check-switchery-sm">
										<label class="form-check-label">
											Live update:
											<input type="checkbox" class="form-input-switchery" checked data-fouc>
										</label>
									</div>
								</div>--}}
							</div>

							<div class="card-body py-0">
								<div class="row">
									<div class="col-sm-4">
										<div class="d-flex align-items-center justify-content-center mb-2">
											<a href="#" class="btn bg-transparent border-teal text-teal rounded-round border-2 btn-icon mr-3">
												<i class="icon-stats-growth"></i>
											</a>
											<div>
												<div class="font-weight-semibold">Invoice</div>
												<span class="text-muted"> </span>
											</div>
										</div>
										<div class="w-75 mx-auto mb-3" id="new-visitors"></div>
									</div>

									<div class="col-sm-4">
										<div class="d-flex align-items-center justify-content-center mb-2">
											<a href="#" class="btn bg-transparent border-warning-400 text-warning-400 rounded-round border-2 btn-icon mr-3">
												<i class="icon-stats-growth"></i>
											</a>
											<div>
												<div class="font-weight-semibold">Estimasi</div>
												<span class="text-muted"> </span>
											</div>
										</div>
										<div class="w-75 mx-auto mb-3" id="new-sessions"></div>
									</div>

									<div class="col-sm-4">
										<div class="d-flex align-items-center justify-content-center mb-2">
											<a href="#" class="btn bg-transparent border-indigo-400 text-indigo-400 rounded-round border-2 btn-icon mr-3">
												<i class="icon-stats-growth"></i>
											</a>
											<div>
												<div class="font-weight-semibold">Work Order</div>
												<span class="text-muted"> </span>
											</div>
										</div>
										<div class="w-75 mx-auto mb-3" id="total-online"></div>
									</div>
								</div>
							</div>
							<canvas id="TrafficChart" style="width: 800px"></canvas>
							
							<div class="chart position-relative" id="traffic-sources" style="width: 1050px;">
							</div>
						</div>
						<!-- /traffic sources -->
					</div>				
				</div>
				<!-- /main charts -->


				<!-- Dashboard content -->
				<div class="row">
					<div class="col-xl-8">

						<!-- Basic map -->
				<div class="card">
					<div class="card-header header-elements-inline">
						<h5 class="card-title">Job Maps</h5>
						<div class="header-elements">
							<div class="list-icons">
		                		<a class="list-icons-item" data-action="collapse"></a>
		                		<a class="list-icons-item" data-action="reload"></a>
		                		<a class="list-icons-item" data-action="remove"></a>
		                	</div>
	                	</div>
					</div>

					<div class="card-body">
						<div class="row">
							<div class="col-md-6">
								<div class="card">
									<div class="card-header bg-primary text-white header-elements-inline">
										<h6 class="card-title">Alerts</h6>
									</div>
		
									<div class="card-body">
										<ul class="list-group list-group-flush border-top">
											<li class="list-group-item">
												Status work order pending
												<span class="badge bg-success-400 ml-auto">{{ $workorder_pending }}</span>
											</li>
											<li class="list-group-item">
												Status work order on going
												<span class="badge bg-indigo-400 ml-auto">{{ $workorder_ongoing }}</span>
											</li>
											<li class="list-group-item">
												Status work order finished
												<span class="badge bg-pink-400 ml-auto">{{ $workorder_finished }}</span>
											</li>
											<li class="list-group-item">
												Status work order draft
												<span class="badge bg-indigo-400 ml-auto">{{ $workorder_draft }}</span>
											</li>
											<li class="list-group-item">
												Staff tracking
												<span class="badge bg-indigo-400 ml-auto">{{ $staff_tracking }}</span>
											</li>
										</ul>
									</div>
								</div>
							</div>
		
							<div class="col-md-6">
								<div class="card">
									<div class="card-header bg-primary text-white header-elements-inline">
										<h6 class="card-title">Log Work Orders</h6>
									</div>
		
									<div class="card-body">
										<h6 class="card-title"><strong>Awesome Update</strong></h6>
										<p class="card-text">This example demonstrates transparent card header and dark card footer. Card title is placed inside card body content.</p>
										<h6 class="card-title text-bold"><strong>Awesome Update</strong></h6>
										<p class="card-text">This example demonstrates transparent card header and dark card footer.</p>
									</div>
								</div>
								
							</div>
						</div>
						<div class="map-container" id="map_basic"></div>
					</div>
				</div>
				<!-- /basic map -->


						<!-- Quick stats boxes -->
						<div class="row">
							
						</div>
						<!-- /quick stats boxes -->						

					</div>

					<div class="col-xl-4">

						<!-- Progress counters -->
						<div class="row">
							<div class="col-sm-6">

								<!-- Available hours -->
								<div class="card text-center">
									<div class="card-body">

					                	<!-- Progress counter -->
										<div class="svg-center position-relative" id="hours-available-progress"></div>
										<!-- /progress counter -->


										<!-- Bars -->
										<div id="hours-available-bars"></div>
										<!-- /bars -->

									</div>
								</div>
								<!-- /available hours -->

							</div>

							<div class="col-sm-6">

								<!-- Productivity goal -->
								<div class="card text-center">
									<div class="card-body">

										<!-- Progress counter -->
										<div class="svg-center position-relative" id="goal-progress"></div>
										<!-- /progress counter -->

										<!-- Bars -->
										<div id="goal-bars"></div>
										<!-- /bars -->

									</div>
								</div>
								<!-- /productivity goal -->

							</div>
						</div>
						<!-- /progress counters -->


						<!-- Daily sales -->
						<div class="card">
							<div class="card-header header-elements-inline">
								<h6 class="card-title">Daily sales stats</h6>
								<div class="header-elements">
									<span class="font-weight-bold text-danger-600 ml-2">$4,378</span>
									<div class="list-icons ml-3">
				                		<div class="dropdown">
				                			<a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown"><i class="icon-cog3"></i></a>
											<div class="dropdown-menu dropdown-menu-right">
												<a href="#" class="dropdown-item"><i class="icon-sync"></i> Update data</a>
												<a href="#" class="dropdown-item"><i class="icon-list-unordered"></i> Detailed log</a>
												<a href="#" class="dropdown-item"><i class="icon-pie5"></i> Statistics</a>
												<div class="dropdown-divider"></div>
												<a href="#" class="dropdown-item"><i class="icon-cross3"></i> Clear list</a>
											</div>
				                		</div>
				                	</div>
								</div>
							</div>

							<div class="card-body">
								<div class="chart" id="sales-heatmap"></div>
							</div>

							<div class="table-responsive">
								<table class="table text-nowrap">
									<thead>
										<tr>
											<th class="w-100">Application</th>
											<th>Time</th>
											<th>Price</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>
												<div class="d-flex align-items-center">
													<div class="mr-3">
														<a href="#" class="btn bg-primary-400 rounded-round btn-icon btn-sm">
															<span class="letter-icon"></span>
														</a>
													</div>
													<div>
														<a href="#" class="text-default font-weight-semibold letter-icon-title">Sigma application</a>
														<div class="text-muted font-size-sm"><i class="icon-checkmark3 font-size-sm mr-1"></i> New order</div>
													</div>
												</div>
											</td>
											<td>
												<span class="text-muted font-size-sm">06:28 pm</span>
											</td>
											<td>
												<h6 class="font-weight-semibold mb-0">$49.90</h6>
											</td>
										</tr>

										<tr>
											<td>
												<div class="d-flex align-items-center">
													<div class="mr-3">
														<a href="#" class="btn bg-danger-400 rounded-round btn-icon btn-sm">
															<span class="letter-icon"></span>
														</a>
													</div>
													<div>
														<a href="#" class="text-default font-weight-semibold letter-icon-title">Alpha application</a>
														<div class="text-muted font-size-sm"><i class="icon-spinner11 font-size-sm mr-1"></i> Renewal</div>
													</div>
												</div>
											</td>
											<td>
												<span class="text-muted font-size-sm">04:52 pm</span>
											</td>
											<td>
												<h6 class="font-weight-semibold mb-0">$90.50</h6>
											</td>
										</tr>

										<tr>
											<td>
												<div class="d-flex align-items-center">
													<div class="mr-3">
														<a href="#" class="btn bg-indigo-400 rounded-round btn-icon btn-sm">
															<span class="letter-icon"></span>
														</a>
													</div>
													<div>
														<a href="#" class="text-default font-weight-semibold letter-icon-title">Delta application</a>
														<div class="text-muted font-size-sm"><i class="icon-lifebuoy font-size-sm mr-1"></i> Support</div>
													</div>
												</div>
											</td>
											<td>
												<span class="text-muted font-size-sm">01:26 pm</span>
											</td>
											<td>
												<h6 class="font-weight-semibold mb-0">$60.00</h6>
											</td>
										</tr>

										<tr>
											<td>
												<div class="d-flex align-items-center">
													<div class="mr-3">
														<a href="#" class="btn bg-success-400 rounded-round btn-icon btn-sm">
															<span class="letter-icon"></span>
														</a>
													</div>
													<div>
														<a href="#" class="text-default font-weight-semibold letter-icon-title">Omega application</a>
														<div class="text-muted font-size-sm"><i class="icon-lifebuoy font-size-sm mr-1"></i> Support</div>
													</div>
												</div>
											</td>
											<td>
												<span class="text-muted font-size-sm">11:46 am</span>
											</td>
											<td>
												<h6 class="font-weight-semibold mb-0">$55.00</h6>
											</td>
										</tr>

										<tr>
											<td>
												<div class="d-flex align-items-center">
													<div class="mr-3">
														<a href="#" class="btn bg-danger-400 rounded-round btn-icon btn-sm">
															<span class="letter-icon"></span>
														</a>
													</div>
													<div>
														<a href="#" class="text-default font-weight-semibold letter-icon-title">Alpha application</a>
														<div class="text-muted font-size-sm"><i class="icon-spinner11 font-size-sm mr-2"></i> Renewal</div>
													</div>
												</div>
											</td>
											<td>
												<span class="text-muted font-size-sm">10:29 am</span>
											</td>
											<td>
												<h6 class="font-weight-semibold mb-0">$90.50</h6>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<!-- /daily sales -->


						<!-- My messages -->
						<div class="card">
							<div class="card-header header-elements-inline">
								<h6 class="card-title">My messages</h6>
								<div class="header-elements">
									<span><i class="icon-history text-warning mr-2"></i> Jul 7, 10:30</span>
									<span class="badge bg-success align-self-start ml-3">Online</span>
								</div>
							</div>

							<!-- Numbers -->
							<div class="card-body py-0">
								<div class="row text-center">
									<div class="col-4">
										<div class="mb-3">
											<h5 class="font-weight-semibold mb-0">2,345</h5>
											<span class="text-muted font-size-sm">this week</span>
										</div>
									</div>

									<div class="col-4">
										<div class="mb-3">
											<h5 class="font-weight-semibold mb-0">3,568</h5>
											<span class="text-muted font-size-sm">this month</span>
										</div>
									</div>

									<div class="col-4">
										<div class="mb-3">
											<h5 class="font-weight-semibold mb-0">32,693</h5>
											<span class="text-muted font-size-sm">all messages</span>
										</div>
									</div>
								</div>
							</div>
							<!-- /numbers -->


							<!-- Area chart -->
							<div id="messages-stats"></div>
							<!-- /area chart -->


							<!-- Tabs -->
		                	<ul class="nav nav-tabs nav-tabs-solid nav-justified bg-indigo-400 border-x-0 border-bottom-0 border-top-indigo-300 mb-0">
								<li class="nav-item">
									<a href="#messages-tue" class="nav-link font-size-sm text-uppercase active" data-toggle="tab">
										Tuesday
									</a>
								</li>

								<li class="nav-item">
									<a href="#messages-mon" class="nav-link font-size-sm text-uppercase" data-toggle="tab">
										Monday
									</a>
								</li>

								<li class="nav-item">
									<a href="#messages-fri" class="nav-link font-size-sm text-uppercase" data-toggle="tab">
										Friday
									</a>
								</li>
							</ul>
							<!-- /tabs -->


							<!-- Tabs content -->
							<div class="tab-content card-body">
								<div class="tab-pane active fade show" id="messages-tue">
									<ul class="media-list">
										<li class="media">
											<div class="mr-3 position-relative">
												<img src="/assets/images/demo/users/face10.jpg" class="rounded-circle" width="36" height="36" alt="">
												<span class="badge bg-danger-400 badge-pill badge-float border-2 border-white">8</span>
											</div>

											<div class="media-body">
												<div class="d-flex justify-content-between">
													<a href="#">James Alexander</a>
													<span class="font-size-sm text-muted">14:58</span>
												</div>

												The constitutionally inventoried precariously...
											</div>
										</li>

										<li class="media">
											<div class="mr-3 position-relative">
												<img src="/assets/images/demo/users/face3.jpg" class="rounded-circle" width="36" height="36" alt="">
												<span class="badge bg-danger-400 badge-pill badge-float border-2 border-white">6</span>
											</div>

											<div class="media-body">
												<div class="d-flex justify-content-between">
													<a href="#">Margo Baker</a>
													<span class="font-size-sm text-muted">12:16</span>
												</div>

												Pinched a well more moral chose goodness...
											</div>
										</li>

										<li class="media">
											<div class="mr-3">
												<img src="/assets/images/demo/users/face24.jpg" class="rounded-circle" width="36" height="36" alt="">
											</div>

											<div class="media-body">
												<div class="d-flex justify-content-between">
													<a href="#">Jeremy Victorino</a>
													<span class="font-size-sm text-muted">09:48</span>
												</div>

												Pert thickly mischievous clung frowned well...
											</div>
										</li>

										<li class="media">
											<div class="mr-3">
												<img src="/assets/images/demo/users/face4.jpg" class="rounded-circle" width="36" height="36" alt="">
											</div>

											<div class="media-body">
												<div class="d-flex justify-content-between">
													<a href="#">Beatrix Diaz</a>
													<span class="font-size-sm text-muted">05:54</span>
												</div>

												Nightingale taped hello bucolic fussily cardinal...
											</div>
										</li>

										<li class="media">
											<div class="mr-3">
												<img src="/assets/images/demo/users/face25.jpg" class="rounded-circle" width="36" height="36" alt="">
											</div>

											<div class="media-body">												
												<div class="d-flex justify-content-between">
													<a href="#">Richard Vango</a>
													<span class="font-size-sm text-muted">01:43</span>
												</div>

												Amidst roadrunner distantly pompously where...
											</div>
										</li>
									</ul>
								</div>

								<div class="tab-pane fade" id="messages-mon">
									<ul class="media-list">
										<li class="media">
											<div class="mr-3">
												<img src="/assets/images/demo/users/face2.jpg" class="rounded-circle" width="36" height="36" alt="">
											</div>

											<div class="media-body">
												<div class="d-flex justify-content-between">
													<a href="#">Isak Temes</a>
													<span class="font-size-sm text-muted">Tue, 19:58</span>
												</div>

												Reasonable palpably rankly expressly grimy...
											</div>
										</li>

										<li class="media">
											<div class="mr-3">
												<img src="/assets/images/demo/users/face7.jpg" class="rounded-circle" width="36" height="36" alt="">
											</div>

											<div class="media-body">
												<div class="d-flex justify-content-between">
													<a href="#">Vittorio Cosgrove</a>
													<span class="font-size-sm text-muted">Tue, 16:35</span>
												</div>

												Arguably therefore more unexplainable fumed...
											</div>
										</li>

										<li class="media">
											<div class="mr-3">
												<img src="/assets/images/demo/users/face18.jpg" class="rounded-circle" width="36" height="36" alt="">
											</div>

											<div class="media-body">
												<div class="d-flex justify-content-between">
													<a href="#">Hilary Talaugon</a>
													<span class="font-size-sm text-muted">Tue, 12:16</span>
												</div>

												Nicely unlike porpoise a kookaburra past more...
											</div>
										</li>

										<li class="media">
											<div class="mr-3">
												<img src="/assets/images/demo/users/face14.jpg" class="rounded-circle" width="36" height="36" alt="">
											</div>

											<div class="media-body">
												<div class="d-flex justify-content-between">
													<a href="#">Bobbie Seber</a>
													<span class="font-size-sm text-muted">Tue, 09:20</span>
												</div>

												Before visual vigilantly fortuitous tortoise...
											</div>
										</li>

										<li class="media">
											<div class="mr-3">
												<img src="/assets/images/demo/users/face8.jpg" class="rounded-circle" width="36" height="36" alt="">
											</div>

											<div class="media-body">
												<div class="d-flex justify-content-between">
													<a href="#">Walther Laws</a>
													<span class="font-size-sm text-muted">Tue, 03:29</span>
												</div>

												Far affecting more leered unerringly dishonest...
											</div>
										</li>
									</ul>
								</div>

								<div class="tab-pane fade" id="messages-fri">
									<ul class="media-list">
										<li class="media">
											<div class="mr-3">
												<img src="/assets/images/demo/users/face15.jpg" class="rounded-circle" width="36" height="36" alt="">
											</div>

											<div class="media-body">
												<div class="d-flex justify-content-between">
													<a href="#">Owen Stretch</a>
													<span class="font-size-sm text-muted">Mon, 18:12</span>
												</div>

												Tardy rattlesnake seal raptly earthworm...
											</div>
										</li>

										<li class="media">
											<div class="mr-3">
												<img src="/assets/images/demo/users/face12.jpg" class="rounded-circle" width="36" height="36" alt="">
											</div>

											<div class="media-body">
												<div class="d-flex justify-content-between">
													<a href="#">Jenilee Mcnair</a>
													<span class="font-size-sm text-muted">Mon, 14:03</span>
												</div>

												Since hello dear pushed amid darn trite...
											</div>
										</li>

										<li class="media">
											<div class="mr-3">
												<img src="/assets/images/demo/users/face22.jpg" class="rounded-circle" width="36" height="36" alt="">
											</div>

											<div class="media-body">
												<div class="d-flex justify-content-between">
													<a href="#">Alaster Jain</a>
													<span class="font-size-sm text-muted">Mon, 13:59</span>
												</div>

												Dachshund cardinal dear next jeepers well...
											</div>
										</li>

										<li class="media">
											<div class="mr-3">
												<img src="/assets/images/demo/users/face24.jpg" class="rounded-circle" width="36" height="36" alt="">
											</div>

											<div class="media-body">
												<div class="d-flex justify-content-between">
													<a href="#">Sigfrid Thisted</a>
													<span class="font-size-sm text-muted">Mon, 09:26</span>
												</div>

												Lighted wolf yikes less lemur crud grunted...
											</div>
										</li>

										<li class="media">
											<div class="mr-3">
												<img src="/assets/images/demo/users/face17.jpg" class="rounded-circle" width="36" height="36" alt="">
											</div>

											<div class="media-body">
												<div class="d-flex justify-content-between">
													<a href="#">Sherilyn Mckee</a>
													<span class="font-size-sm text-muted">Mon, 06:38</span>
												</div>

												Less unicorn a however careless husky...
											</div>
										</li>
									</ul>
								</div>
							</div>
							<!-- /tabs content -->

						</div>
						<!-- /my messages -->


						<!-- Daily Remainder -->
						<div class="card">
							<div class="card-header header-elements-inline">
								<h6 class="card-title">Daily Remainder</h6>
								<div class="header-elements">
									<div class="form-check form-check-inline form-check-right form-check-switchery form-check-switchery-sm">
										<label class="form-check-label">
											<input type="checkbox" class="form-input-switchery" id="realtime" checked data-fouc>
											Realtime
										</label>
									</div>
									<span class="badge bg-danger-400 badge-pill">+86</span>
								</div>
							</div>

							<div class="card-body">
								<div class="chart mb-3" id="bullets"></div>

								<ul class="media-list">
									<li class="media">
										<div class="mr-3">
											<a href="#" class="btn bg-transparent border-pink text-pink rounded-round border-2 btn-icon"><i class="icon-statistics"></i></a>
										</div>
										
										<div class="media-body">
											Stats for July, 6: <span class="font-weight-semibold">1938</span> orders, <span class="font-weight-semibold text-danger">$4220</span> revenue
											<div class="text-muted">2 hours ago</div>
										</div>

										<div class="ml-3 align-self-center">
											<a href="#" class="list-icons-item"><i class="icon-more"></i></a>
										</div>
									</li>

									<li class="media">
										<div class="mr-3">
											<a href="#" class="btn bg-transparent border-success text-success rounded-round border-2 btn-icon"><i class="icon-checkmark3"></i></a>
										</div>
										
										<div class="media-body">
											Invoices <a href="#">#4732</a> and <a href="#">#4734</a> have been paid
											<div class="text-muted">Dec 18, 18:36</div>
										</div>

										<div class="ml-3 align-self-center">
											<a href="#" class="list-icons-item"><i class="icon-more"></i></a>
										</div>
									</li>

									<li class="media">
										<div class="mr-3">
											<a href="#" class="btn bg-transparent border-primary text-primary rounded-round border-2 btn-icon"><i class="icon-alignment-unalign"></i></a>
										</div>
										
										<div class="media-body">
											Affiliate commission for June has been paid
											<div class="text-muted">36 minutes ago</div>
										</div>

										<div class="ml-3 align-self-center">
											<a href="#" class="list-icons-item"><i class="icon-more"></i></a>
										</div>
									</li>

									<li class="media">
										<div class="mr-3">
											<a href="#" class="btn bg-transparent border-warning-400 text-warning-400 rounded-round border-2 btn-icon"><i class="icon-spinner11"></i></a>
										</div>

										<div class="media-body">
											Order <a href="#">#37745</a> from July, 1st has been refunded
											<div class="text-muted">4 minutes ago</div>
										</div>

										<div class="ml-3 align-self-center">
											<a href="#" class="list-icons-item"><i class="icon-more"></i></a>
										</div>
									</li>

									<li class="media">
										<div class="mr-3">
											<a href="#" class="btn bg-transparent border-teal text-teal rounded-round border-2 btn-icon"><i class="icon-redo2"></i></a>
										</div>
										
										<div class="media-body">
											Invoice <a href="#">#4769</a> has been sent to <a href="#">Robert Smith</a>
											<div class="text-muted">Dec 12, 05:46</div>
										</div>

										<div class="ml-3 align-self-center">
											<a href="#" class="list-icons-item"><i class="icon-more"></i></a>
										</div>
									</li>
								</ul>
							</div>
						</div>
						<!-- /daily Remainder -->

					</div>
				</div>
				<!-- /dashboard content -->

			</div>
			<!-- /content area -->
    </div>
@endsection

@push("js")
<script>
new Chart(document.getElementById("TrafficChart"), {
  type: 'line',
  data: {
    labels: ['2020-01-01', '2020-10-24', '2020-12-10', '2020-12-11', '2020-12-14', '2020-12-18','2020-12-19', '2020-12-20', '2020-12-24'],
    datasets: [{
      data: {!! json_encode($estimatesData) !!},
      label: "ESTIMASI",
      borderColor: "#3e95cd",
      fill: false
    }, {
      data: {!! json_encode($invoiceData) !!},
      label: "INVOICE",
      borderColor: "#c45850",
      fill: false
    }, {
      data: {!! json_encode($workOrderData) !!},
      label: "WORK ORDER",
      borderColor: "green",
      fill: false
	}]
  },
  options: {
    title: {
      display: true,
    }
  }
});

</script>
<script src="/assets/js/plugins/visualization/d3/d3.min.js"></script>
<script src="/assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
<script src="/assets/js/plugins/forms/styling/switchery.min.js"></script>
<script src="/assets/js/plugins/pickers/daterangepicker.js"></script>
<script src="/assets/js/demo_pages/dashboard.js"></script>
<script src="/assets/js/demo_charts/pages/dashboard/light/sparklines.js"></script>
<script src="/assets/js/demo_charts/pages/dashboard/light/lines.js"></script>	
<script src="/assets/js/demo_charts/pages/dashboard/light/areas.js"></script>
<script src="/assets/js/demo_charts/pages/dashboard/light/donuts.js"></script>
<script src="/assets/js/demo_charts/pages/dashboard/light/bars.js"></script>
<script src="/assets/js/demo_charts/pages/dashboard/light/progress.js"></script>
<script src="/assets/js/demo_charts/pages/dashboard/light/heatmaps.js"></script>
<script src="/assets/js/demo_charts/pages/dashboard/light/pies.js"></script>
<script src="/assets/js/demo_charts/pages/dashboard/light/bullets.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCbF9O9Ks9_-QNWHi2SFxLqLUBOwrMyzXk"></script>
<script src="/assets/js/demo_maps/google/basic/basic.js"></script>


@endpush