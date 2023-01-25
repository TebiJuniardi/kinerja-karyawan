@extends('layout.app')
@section('body')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
      <div class="col-lg-12 mb-4 order-0">
        <div class="card">
          <div class="d-flex align-items-end row">
            <div class="col-sm-7">
              <div class="card-body">
                <h5 class="card-title text-primary">Selamat {{$totalSelesai->nama_lengkap}}</h5>
                <p class="mb-4">
                  Kamu telah mengirimkan <span class="fw-bold">{{$totalSelesai->total}} paket</span> selama bulan ini. Klik disini untuk melihat profile {{$totalSelesai->nama_lengkap}}.
                </p>

                {{-- <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a> --}}
              </div>
            </div>
            <div class="col-sm-5 text-center text-sm-left">
              <div class="card-body pb-0 px-0 px-md-4">
                {{-- <img
                  src="{{ asset('assets/assets/img/illustrations/man-with-laptop-light.png')}}"
                  height="140"
                  alt="View Badge User"
                  data-app-dark-img="illustrations/man-with-laptop-dark.png"
                  data-app-light-img="illustrations/man-with-laptop-light.png"
                /> --}}
                <img src="{{ URL::to('/') }}/images/{{$totalSelesai->foto}}" class="rounded" width="50%">
              </div>
            </div>
          </div>
        </div>
      </div>
      {{-- <div class="col-lg-4 col-md-4 order-1">
        <div class="row">
          <div class="col-lg-6 col-md-12 col-6 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                  <div class="avatar flex-shrink-0">
                    <img
                      src="{{ asset('assets/assets/img/icons/unicons/chart-success.png')}}"
                      alt="chart success"
                      class="rounded"
                    />
                  </div>
                  <div class="dropdown">
                    <button
                      class="btn p-0"
                      type="button"
                      id="cardOpt3"
                      data-bs-toggle="dropdown"
                      aria-haspopup="true"
                      aria-expanded="false"
                    >
                      <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                      <a class="dropdown-item" href="javascript:void(0);">View More</a>
                      <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                    </div>
                  </div>
                </div>
                <span class="fw-semibold d-block mb-1">Profit</span>
                <h3 class="card-title mb-2">$12,628</h3>
                <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +72.80%</small>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-12 col-6 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                  <div class="avatar flex-shrink-0">
                    <img
                      src="{{ asset('assets/assets/img/icons/unicons/wallet-info.png')}}"
                      alt="Credit Card"
                      class="rounded"
                    />
                  </div>
                  <div class="dropdown">
                    <button
                      class="btn p-0"
                      type="button"
                      id="cardOpt6"
                      data-bs-toggle="dropdown"
                      aria-haspopup="true"
                      aria-expanded="false"
                    >
                      <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                      <a class="dropdown-item" href="javascript:void(0);">View More</a>
                      <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                    </div>
                  </div>
                </div>
                <span>Sales</span>
                <h3 class="card-title text-nowrap mb-1">$4,679</h3>
                <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +28.42%</small>
              </div>
            </div>
          </div>
        </div>
      </div> --}}
      <!-- Total Revenue -->
      <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
        <div class="card">
          <div class="row row-bordered g-0">
            <div class="col-md-8">
              <h5 class="card-header m-0 me-2 pb-3">Total Revenue</h5>
              {{-- <div id="totalRevenueChart" class="px-2"></div> --}}
                <div class="card-body">
                    <div class="table-resvonsive">
                        <table class="table table-bordered table-striped" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>Nama Pengirim</th>
                                    <th>Alamat Pengirim</th>
                                    <th>Nama Penerima</th>
                                    <th>Alamat Penerima</th>
                                    <th>Berat Paket</th>
                                    <th>Nama Driver</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($table as $row)
                                    <tr>
                                        <td>{{$row->nama_pengirim}}</td>
                                        <td>{{$row->alamat_pengirim}}</td>
                                        <td>{{$row->nama_penerima}}</td>
                                        <td>{{$row->alamat}}</td>
                                        <td>{{$row->berat}} kg</td>
                                        <td>{{$row->nama_lengkap}} kg</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
        <div class="card h-100">
          <div class="card-header d-flex align-items-center justify-content-between pb-0">
            <div class="card-title mb-0">
              <h5 class="m-0 me-2">Statistik Paket Terkirim</h5>
              <small class="text-muted"></small>
            </div>
            <div class="dropdown">
              <button
                class="btn p-0"
                type="button"
                id="orederStatistics"
                data-bs-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
                <i class="bx bx-dots-vertical-rounded"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="orederStatistics">
                <a class="dropdown-item" href="javascript:void(0);">Select All</a>
                <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                <a class="dropdown-item" href="javascript:void(0);">Share</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <div class="d-flex flex-column align-items-center gap-1">
                <h2 class="mb-2">8,258</h2>
                <span>Total Orders</span>
              </div>
              <div id="orderStatisticsChart"></div>
            </div>
            <ul class="p-0 m-0">
              <li class="d-flex mb-4 pb-1">
                <div class="avatar flex-shrink-0 me-3">
                  <span class="avatar-initial rounded bg-label-primary"
                    ><i class="bx bx-mobile-alt"></i
                  ></span>
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <h6 class="mb-0">Electronic</h6>
                    <small class="text-muted">Mobile, Earbuds, TV</small>
                  </div>
                  <div class="user-progress">
                    <small class="fw-semibold">82.5k</small>
                  </div>
                </div>
              </li>
              <li class="d-flex mb-4 pb-1">
                <div class="avatar flex-shrink-0 me-3">
                  <span class="avatar-initial rounded bg-label-success"><i class="bx bx-closet"></i></span>
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <h6 class="mb-0">Fashion</h6>
                    <small class="text-muted">T-shirt, Jeans, Shoes</small>
                  </div>
                  <div class="user-progress">
                    <small class="fw-semibold">23.8k</small>
                  </div>
                </div>
              </li>
              <li class="d-flex mb-4 pb-1">
                <div class="avatar flex-shrink-0 me-3">
                  <span class="avatar-initial rounded bg-label-info"><i class="bx bx-home-alt"></i></span>
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <h6 class="mb-0">Decor</h6>
                    <small class="text-muted">Fine Art, Dining</small>
                  </div>
                  <div class="user-progress">
                    <small class="fw-semibold">849k</small>
                  </div>
                </div>
              </li>
              <li class="d-flex">
                <div class="avatar flex-shrink-0 me-3">
                  <span class="avatar-initial rounded bg-label-secondary"
                    ><i class="bx bx-football"></i
                  ></span>
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <h6 class="mb-0">Sports</h6>
                    <small class="text-muted">Football, Cricket Kit</small>
                  </div>
                  <div class="user-progress">
                    <small class="fw-semibold">99</small>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <!--/ Total Revenue -->
      {{-- <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
        <div class="row"> --}}
          {{-- <div class="col-6 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                  <div class="avatar flex-shrink-0">
                    <img src="{{ asset('assets/assets/img/icons/unicons/paypal.png')}}" alt="Credit Card" class="rounded" />
                  </div>
                  <div class="dropdown">
                    <button
                      class="btn p-0"
                      type="button"
                      id="cardOpt4"
                      data-bs-toggle="dropdown"
                      aria-haspopup="true"
                      aria-expanded="false"
                    >
                      <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt4">
                      <a class="dropdown-item" href="javascript:void(0);">View More</a>
                      <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                    </div>
                  </div>
                </div>
                <span class="d-block mb-1">Payments</span>
                <h3 class="card-title text-nowrap mb-2">$2,456</h3>
                <small class="text-danger fw-semibold"><i class="bx bx-down-arrow-alt"></i> -14.82%</small>
              </div>
            </div>
          </div>
          <div class="col-6 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                  <div class="avatar flex-shrink-0">
                    <img src="{{ asset('assets/assets/img/icons/unicons/cc-primary.png')}}" alt="Credit Card" class="rounded" />
                  </div>
                  <div class="dropdown">
                    <button
                      class="btn p-0"
                      type="button"
                      id="cardOpt1"
                      data-bs-toggle="dropdown"
                      aria-haspopup="true"
                      aria-expanded="false"
                    >
                      <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="cardOpt1">
                      <a class="dropdown-item" href="javascript:void(0);">View More</a>
                      <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                    </div>
                  </div>
                </div>
                <span class="fw-semibold d-block mb-1">Transactions</span>
                <h3 class="card-title mb-2">$14,857</h3>
                <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +28.14%</small>
              </div>
            </div>
          </div> --}}
          {{-- <div class="col-12 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                  <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                    <div class="card-title">
                      <h5 class="text-nowrap mb-2">Profile Report</h5>
                      <span class="badge bg-label-warning rounded-pill">Year 2021</span>
                    </div>
                    <div class="mt-sm-auto">
                      <small class="text-success text-nowrap fw-semibold"
                        ><i class="bx bx-chevron-up"></i> 68.2%</small
                      >
                      <h3 class="mb-0">$84,686k</h3>
                    </div>
                  </div>
                  <div id="profileReportChart"></div>
                </div>
              </div>
            </div>
          </div> --}}
        {{-- </div>
      </div> --}}
    </div>
    <div class="row">
      <!-- Order Statistics -->
      {{-- <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
        <div class="card h-100">
          <div class="card-header d-flex align-items-center justify-content-between pb-0">
            <div class="card-title mb-0">
              <h5 class="m-0 me-2">Statistik Paket Terkirim</h5>
              <small class="text-muted"></small>
            </div>
            <div class="dropdown">
              <button
                class="btn p-0"
                type="button"
                id="orederStatistics"
                data-bs-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
                <i class="bx bx-dots-vertical-rounded"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="orederStatistics">
                <a class="dropdown-item" href="javascript:void(0);">Select All</a>
                <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                <a class="dropdown-item" href="javascript:void(0);">Share</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <div class="d-flex flex-column align-items-center gap-1">
                <h2 class="mb-2">8,258</h2>
                <span>Total Orders</span>
              </div>
              <div id="orderStatisticsChart"></div>
            </div>
            <ul class="p-0 m-0">
              <li class="d-flex mb-4 pb-1">
                <div class="avatar flex-shrink-0 me-3">
                  <span class="avatar-initial rounded bg-label-primary"
                    ><i class="bx bx-mobile-alt"></i
                  ></span>
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <h6 class="mb-0">Electronic</h6>
                    <small class="text-muted">Mobile, Earbuds, TV</small>
                  </div>
                  <div class="user-progress">
                    <small class="fw-semibold">82.5k</small>
                  </div>
                </div>
              </li>
              <li class="d-flex mb-4 pb-1">
                <div class="avatar flex-shrink-0 me-3">
                  <span class="avatar-initial rounded bg-label-success"><i class="bx bx-closet"></i></span>
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <h6 class="mb-0">Fashion</h6>
                    <small class="text-muted">T-shirt, Jeans, Shoes</small>
                  </div>
                  <div class="user-progress">
                    <small class="fw-semibold">23.8k</small>
                  </div>
                </div>
              </li>
              <li class="d-flex mb-4 pb-1">
                <div class="avatar flex-shrink-0 me-3">
                  <span class="avatar-initial rounded bg-label-info"><i class="bx bx-home-alt"></i></span>
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <h6 class="mb-0">Decor</h6>
                    <small class="text-muted">Fine Art, Dining</small>
                  </div>
                  <div class="user-progress">
                    <small class="fw-semibold">849k</small>
                  </div>
                </div>
              </li>
              <li class="d-flex">
                <div class="avatar flex-shrink-0 me-3">
                  <span class="avatar-initial rounded bg-label-secondary"
                    ><i class="bx bx-football"></i
                  ></span>
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <h6 class="mb-0">Sports</h6>
                    <small class="text-muted">Football, Cricket Kit</small>
                  </div>
                  <div class="user-progress">
                    <small class="fw-semibold">99</small>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div> --}}
      <!--/ Order Statistics -->

      <!-- Expense Overview -->
      {{-- <div class="col-md-6 col-lg-4 order-1 mb-4">
        <div class="card h-100">
          <div class="card-header">
            <ul class="nav nav-pills" role="tablist">
              <li class="nav-item">
                <button
                  type="button"
                  class="nav-link active"
                  role="tab"
                  data-bs-toggle="tab"
                  data-bs-target="#navs-tabs-line-card-income"
                  aria-controls="navs-tabs-line-card-income"
                  aria-selected="true"
                >
                  Income
                </button>
              </li>
              <li class="nav-item">
                <button type="button" class="nav-link" role="tab">Expenses</button>
              </li>
              <li class="nav-item">
                <button type="button" class="nav-link" role="tab">Profit</button>
              </li>
            </ul>
          </div>
          <div class="card-body px-0">
            <div class="tab-content p-0">
              <div class="tab-pane fade show active" id="navs-tabs-line-card-income" role="tabpanel">
                <div class="d-flex p-4 pt-3">
                  <div class="avatar flex-shrink-0 me-3">
                    <img src="{{ asset('assets/assets/img/icons/unicons/wallet.png')}}" alt="User" />
                  </div>
                  <div>
                    <small class="text-muted d-block">Total Balance</small>
                    <div class="d-flex align-items-center">
                      <h6 class="mb-0 me-1">$459.10</h6>
                      <small class="text-success fw-semibold">
                        <i class="bx bx-chevron-up"></i>
                        42.9%
                      </small>
                    </div>
                  </div>
                </div>
                <div id="incomeChart"></div>
                <div class="d-flex justify-content-center pt-4 gap-2">
                  <div class="flex-shrink-0">
                    <div id="expensesOfWeek"></div>
                  </div>
                  <div>
                    <p class="mb-n1 mt-1">Expenses This Week</p>
                    <small class="text-muted">$39 less than last week</small>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> --}}
      <!--/ Expense Overview -->

      <!-- Transactions -->
      {{-- <div class="col-md-6 col-lg-4 order-2 mb-4">
        <div class="card h-100">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="card-title m-0 me-2">Transactions</h5>
            <div class="dropdown">
              <button
                class="btn p-0"
                type="button"
                id="transactionID"
                data-bs-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
                <i class="bx bx-dots-vertical-rounded"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID">
                <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
                <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <ul class="p-0 m-0">
              <li class="d-flex mb-4 pb-1">
                <div class="avatar flex-shrink-0 me-3">
                  <img src="{{ asset('assets/assets/img/icons/unicons/paypal.png')}}" alt="User" class="rounded" />
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <small class="text-muted d-block mb-1">Paypal</small>
                    <h6 class="mb-0">Send money</h6>
                  </div>
                  <div class="user-progress d-flex align-items-center gap-1">
                    <h6 class="mb-0">+82.6</h6>
                    <span class="text-muted">USD</span>
                  </div>
                </div>
              </li>
              <li class="d-flex mb-4 pb-1">
                <div class="avatar flex-shrink-0 me-3">
                  <img src="{{ asset('assets/assets/img/icons/unicons/wallet.png')}}" alt="User" class="rounded" />
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <small class="text-muted d-block mb-1">Wallet</small>
                    <h6 class="mb-0">Mac'D</h6>
                  </div>
                  <div class="user-progress d-flex align-items-center gap-1">
                    <h6 class="mb-0">+270.69</h6>
                    <span class="text-muted">USD</span>
                  </div>
                </div>
              </li>
              <li class="d-flex mb-4 pb-1">
                <div class="avatar flex-shrink-0 me-3">
                  <img src="{{ asset('assets/assets/img/icons/unicons/chart.png')}}" alt="User" class="rounded" />
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <small class="text-muted d-block mb-1">Transfer</small>
                    <h6 class="mb-0">Refund</h6>
                  </div>
                  <div class="user-progress d-flex align-items-center gap-1">
                    <h6 class="mb-0">+637.91</h6>
                    <span class="text-muted">USD</span>
                  </div>
                </div>
              </li>
              <li class="d-flex mb-4 pb-1">
                <div class="avatar flex-shrink-0 me-3">
                  <img src="{{ asset('assets/assets/img/icons/unicons/cc-success.png')}}" alt="User" class="rounded" />
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <small class="text-muted d-block mb-1">Credit Card</small>
                    <h6 class="mb-0">Ordered Food</h6>
                  </div>
                  <div class="user-progress d-flex align-items-center gap-1">
                    <h6 class="mb-0">-838.71</h6>
                    <span class="text-muted">USD</span>
                  </div>
                </div>
              </li>
              <li class="d-flex mb-4 pb-1">
                <div class="avatar flex-shrink-0 me-3">
                  <img src="{{ asset('assets/assets/img/icons/unicons/wallet.png')}}" alt="User" class="rounded" />
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <small class="text-muted d-block mb-1">Wallet</small>
                    <h6 class="mb-0">Starbucks</h6>
                  </div>
                  <div class="user-progress d-flex align-items-center gap-1">
                    <h6 class="mb-0">+203.33</h6>
                    <span class="text-muted">USD</span>
                  </div>
                </div>
              </li>
              <li class="d-flex">
                <div class="avatar flex-shrink-0 me-3">
                  <img src="{{ asset('assets/assets/img/icons/unicons/cc-warning.png')}}" alt="User" class="rounded" />
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <small class="text-muted d-block mb-1">Mastercard</small>
                    <h6 class="mb-0">Ordered Food</h6>
                  </div>
                  <div class="user-progress d-flex align-items-center gap-1">
                    <h6 class="mb-0">-92.45</h6>
                    <span class="text-muted">USD</span>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div> --}}
      <!--/ Transactions -->
    </div>
  </div>
@endsection

<script>
    (function() {
    let cardColor, headingColor, axisColor, shadeColor, borderColor;

    cardColor = config.colors.white;
    headingColor = config.colors.headingColor;
    axisColor = config.colors.axisColor;
    borderColor = config.colors.borderColor;

    // Total Revenue Report Chart - Bar Chart
    // --------------------------------------------------------------------
    const totalRevenueChartEl = document.querySelector('#totalRevenueChart'),
        totalRevenueChartOptions = {
            series: [{
                    name: '2021',
                    data: [18, 7, 15, 29, 18, 12, 9]
                },
                {
                    name: '2020',
                    data: [-13, -18, -9, -14, -5, -17, -15]
                }
            ],
            chart: {
                height: 300,
                stacked: true,
                type: 'bar',
                toolbar: { show: false }
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '33%',
                    borderRadius: 12,
                    startingShape: 'rounded',
                    endingShape: 'rounded'
                }
            },
            colors: [config.colors.primary, config.colors.info],
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth',
                width: 6,
                lineCap: 'round',
                colors: [cardColor]
            },
            legend: {
                show: true,
                horizontalAlign: 'left',
                position: 'top',
                markers: {
                    height: 8,
                    width: 8,
                    radius: 12,
                    offsetX: -3
                },
                labels: {
                    colors: axisColor
                },
                itemMargin: {
                    horizontal: 10
                }
            },
            grid: {
                borderColor: borderColor,
                padding: {
                    top: 0,
                    bottom: -8,
                    left: 20,
                    right: 20
                }
            },
            xaxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
                labels: {
                    style: {
                        fontSize: '13px',
                        colors: axisColor
                    }
                },
                axisTicks: {
                    show: false
                },
                axisBorder: {
                    show: false
                }
            },
            yaxis: {
                labels: {
                    style: {
                        fontSize: '13px',
                        colors: axisColor
                    }
                }
            },
            responsive: [{
                    breakpoint: 1700,
                    options: {
                        plotOptions: {
                            bar: {
                                borderRadius: 10,
                                columnWidth: '32%'
                            }
                        }
                    }
                },
                {
                    breakpoint: 1580,
                    options: {
                        plotOptions: {
                            bar: {
                                borderRadius: 10,
                                columnWidth: '35%'
                            }
                        }
                    }
                },
                {
                    breakpoint: 1440,
                    options: {
                        plotOptions: {
                            bar: {
                                borderRadius: 10,
                                columnWidth: '42%'
                            }
                        }
                    }
                },
                {
                    breakpoint: 1300,
                    options: {
                        plotOptions: {
                            bar: {
                                borderRadius: 10,
                                columnWidth: '48%'
                            }
                        }
                    }
                },
                {
                    breakpoint: 1200,
                    options: {
                        plotOptions: {
                            bar: {
                                borderRadius: 10,
                                columnWidth: '40%'
                            }
                        }
                    }
                },
                {
                    breakpoint: 1040,
                    options: {
                        plotOptions: {
                            bar: {
                                borderRadius: 11,
                                columnWidth: '48%'
                            }
                        }
                    }
                },
                {
                    breakpoint: 991,
                    options: {
                        plotOptions: {
                            bar: {
                                borderRadius: 10,
                                columnWidth: '30%'
                            }
                        }
                    }
                },
                {
                    breakpoint: 840,
                    options: {
                        plotOptions: {
                            bar: {
                                borderRadius: 10,
                                columnWidth: '35%'
                            }
                        }
                    }
                },
                {
                    breakpoint: 768,
                    options: {
                        plotOptions: {
                            bar: {
                                borderRadius: 10,
                                columnWidth: '28%'
                            }
                        }
                    }
                },
                {
                    breakpoint: 640,
                    options: {
                        plotOptions: {
                            bar: {
                                borderRadius: 10,
                                columnWidth: '32%'
                            }
                        }
                    }
                },
                {
                    breakpoint: 576,
                    options: {
                        plotOptions: {
                            bar: {
                                borderRadius: 10,
                                columnWidth: '37%'
                            }
                        }
                    }
                },
                {
                    breakpoint: 480,
                    options: {
                        plotOptions: {
                            bar: {
                                borderRadius: 10,
                                columnWidth: '45%'
                            }
                        }
                    }
                },
                {
                    breakpoint: 420,
                    options: {
                        plotOptions: {
                            bar: {
                                borderRadius: 10,
                                columnWidth: '52%'
                            }
                        }
                    }
                },
                {
                    breakpoint: 380,
                    options: {
                        plotOptions: {
                            bar: {
                                borderRadius: 10,
                                columnWidth: '60%'
                            }
                        }
                    }
                }
            ],
            states: {
                hover: {
                    filter: {
                        type: 'none'
                    }
                },
                active: {
                    filter: {
                        type: 'none'
                    }
                }
            }
        };
    if (typeof totalRevenueChartEl !== undefined && totalRevenueChartEl !== null) {
        const totalRevenueChart = new ApexCharts(totalRevenueChartEl, totalRevenueChartOptions);
        totalRevenueChart.render();
    }

    // Growth Chart - Radial Bar Chart
    // --------------------------------------------------------------------
    const growthChartEl = document.querySelector('#growthChart'),
        growthChartOptions = {
            series: [78],
            labels: ['Growth'],
            chart: {
                height: 240,
                type: 'radialBar'
            },
            plotOptions: {
                radialBar: {
                    size: 150,
                    offsetY: 10,
                    startAngle: -150,
                    endAngle: 150,
                    hollow: {
                        size: '55%'
                    },
                    track: {
                        background: cardColor,
                        strokeWidth: '100%'
                    },
                    dataLabels: {
                        name: {
                            offsetY: 15,
                            color: headingColor,
                            fontSize: '15px',
                            fontWeight: '600',
                            fontFamily: 'Public Sans'
                        },
                        value: {
                            offsetY: -25,
                            color: headingColor,
                            fontSize: '22px',
                            fontWeight: '500',
                            fontFamily: 'Public Sans'
                        }
                    }
                }
            },
            colors: [config.colors.primary],
            fill: {
                type: 'gradient',
                gradient: {
                    shade: 'dark',
                    shadeIntensity: 0.5,
                    gradientToColors: [config.colors.primary],
                    inverseColors: true,
                    opacityFrom: 1,
                    opacityTo: 0.6,
                    stops: [30, 70, 100]
                }
            },
            stroke: {
                dashArray: 5
            },
            grid: {
                padding: {
                    top: -35,
                    bottom: -10
                }
            },
            states: {
                hover: {
                    filter: {
                        type: 'none'
                    }
                },
                active: {
                    filter: {
                        type: 'none'
                    }
                }
            }
        };
    if (typeof growthChartEl !== undefined && growthChartEl !== null) {
        const growthChart = new ApexCharts(growthChartEl, growthChartOptions);
        growthChart.render();
    }

    // Profit Report Line Chart
    // --------------------------------------------------------------------
    const profileReportChartEl = document.querySelector('#profileReportChart'),
        profileReportChartConfig = {
            chart: {
                height: 80,
                // width: 175,
                type: 'line',
                toolbar: {
                    show: false
                },
                dropShadow: {
                    enabled: true,
                    top: 10,
                    left: 5,
                    blur: 3,
                    color: config.colors.warning,
                    opacity: 0.15
                },
                sparkline: {
                    enabled: true
                }
            },
            grid: {
                show: false,
                padding: {
                    right: 8
                }
            },
            colors: [config.colors.warning],
            dataLabels: {
                enabled: false
            },
            stroke: {
                width: 5,
                curve: 'smooth'
            },
            series: [{
                data: [110, 270, 145, 245, 205, 285]
            }],
            xaxis: {
                show: false,
                lines: {
                    show: false
                },
                labels: {
                    show: false
                },
                axisBorder: {
                    show: false
                }
            },
            yaxis: {
                show: false
            }
        };
    if (typeof profileReportChartEl !== undefined && profileReportChartEl !== null) {
        const profileReportChart = new ApexCharts(profileReportChartEl, profileReportChartConfig);
        profileReportChart.render();
    }

    // Order Statistics Chart
    // --------------------------------------------------------------------
    const chartOrderStatistics = document.querySelector('#orderStatisticsChart1'),
        orderChartConfig = {
            chart: {
                height: 165,
                width: 130,
                type: 'donut'
            },
            labels: ['Electronic', 'Sports', 'Decor', 'Fashion'],
            series: [85, 15, 50, 50],
            colors: [config.colors.primary, config.colors.secondary, config.colors.info, config.colors.success],
            stroke: {
                width: 5,
                colors: cardColor
            },
            dataLabels: {
                enabled: false,
                formatter: function(val, opt) {
                    return parseInt(val) + '%';
                }
            },
            legend: {
                show: false
            },
            grid: {
                padding: {
                    top: 0,
                    bottom: 0,
                    right: 15
                }
            },
            plotOptions: {
                pie: {
                    donut: {
                        size: '75%',
                        labels: {
                            show: true,
                            value: {
                                fontSize: '1.5rem',
                                fontFamily: 'Public Sans',
                                color: headingColor,
                                offsetY: -15,
                                formatter: function(val) {
                                    return parseInt(val) + '%';
                                }
                            },
                            name: {
                                offsetY: 20,
                                fontFamily: 'Public Sans'
                            },
                            total: {
                                show: true,
                                fontSize: '0.8125rem',
                                color: axisColor,
                                label: 'Weekly',
                                formatter: function(w) {
                                    return '38%';
                                }
                            }
                        }
                    }
                }
            }
        };
    if (typeof chartOrderStatistics !== undefined && chartOrderStatistics !== null) {
        const statisticsChart = new ApexCharts(chartOrderStatistics, orderChartConfig);
        statisticsChart.render();
    }

    // Income Chart - Area chart
    // --------------------------------------------------------------------
    const incomeChartEl = document.querySelector('#incomeChart'),
        incomeChartConfig = {
            series: [{
                data: [24, 21, 30, 22, 42, 26, 35, 29]
            }],
            chart: {
                height: 215,
                parentHeightOffset: 0,
                parentWidthOffset: 0,
                toolbar: {
                    show: false
                },
                type: 'area'
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                width: 2,
                curve: 'smooth'
            },
            legend: {
                show: false
            },
            markers: {
                size: 6,
                colors: 'transparent',
                strokeColors: 'transparent',
                strokeWidth: 4,
                discrete: [{
                    fillColor: config.colors.white,
                    seriesIndex: 0,
                    dataPointIndex: 7,
                    strokeColor: config.colors.primary,
                    strokeWidth: 2,
                    size: 6,
                    radius: 8
                }],
                hover: {
                    size: 7
                }
            },
            colors: [config.colors.primary],
            fill: {
                type: 'gradient',
                gradient: {
                    shade: shadeColor,
                    shadeIntensity: 0.6,
                    opacityFrom: 0.5,
                    opacityTo: 0.25,
                    stops: [0, 95, 100]
                }
            },
            grid: {
                borderColor: borderColor,
                strokeDashArray: 3,
                padding: {
                    top: -20,
                    bottom: -8,
                    left: -10,
                    right: 8
                }
            },
            xaxis: {
                categories: ['', 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
                axisBorder: {
                    show: false
                },
                axisTicks: {
                    show: false
                },
                labels: {
                    show: true,
                    style: {
                        fontSize: '13px',
                        colors: axisColor
                    }
                }
            },
            yaxis: {
                labels: {
                    show: false
                },
                min: 10,
                max: 50,
                tickAmount: 4
            }
        };
    if (typeof incomeChartEl !== undefined && incomeChartEl !== null) {
        const incomeChart = new ApexCharts(incomeChartEl, incomeChartConfig);
        incomeChart.render();
    }

    // Expenses Mini Chart - Radial Chart
    // --------------------------------------------------------------------
    const weeklyExpensesEl = document.querySelector('#expensesOfWeek'),
        weeklyExpensesConfig = {
            series: [65],
            chart: {
                width: 60,
                height: 60,
                type: 'radialBar'
            },
            plotOptions: {
                radialBar: {
                    startAngle: 0,
                    endAngle: 360,
                    strokeWidth: '8',
                    hollow: {
                        margin: 2,
                        size: '45%'
                    },
                    track: {
                        strokeWidth: '50%',
                        background: borderColor
                    },
                    dataLabels: {
                        show: true,
                        name: {
                            show: false
                        },
                        value: {
                            formatter: function(val) {
                                return '$' + parseInt(val);
                            },
                            offsetY: 5,
                            color: '#697a8d',
                            fontSize: '13px',
                            show: true
                        }
                    }
                }
            },
            fill: {
                type: 'solid',
                colors: config.colors.primary
            },
            stroke: {
                lineCap: 'round'
            },
            grid: {
                padding: {
                    top: -10,
                    bottom: -15,
                    left: -10,
                    right: -10
                }
            },
            states: {
                hover: {
                    filter: {
                        type: 'none'
                    }
                },
                active: {
                    filter: {
                        type: 'none'
                    }
                }
            }
        };
    if (typeof weeklyExpensesEl !== undefined && weeklyExpensesEl !== null) {
        const weeklyExpenses = new ApexCharts(weeklyExpensesEl, weeklyExpensesConfig);
        weeklyExpenses.render();
    }
})();
</script>
