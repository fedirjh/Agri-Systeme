<div>
    <!-- Navbar -->
    <!-- End Navbar -->
    <div class="container-fluid py-4">

        <div class="row mt-4">
            <div class="col-md-3 col-sm-6 col-6">
                <div class="card">
                    <div class="card-body text-center">
                        <h1 class="text-gradient text-primary" wire:ignore x-data
                            x-init="(new CountUp('state1', {{count($agriculteurs)}})).start()">
                            <span id="state1">0</span>
                        </h1>
                        <h6 class="mb-0 font-weight-bolder">Agriculteurs</h6>
                        <p class="opacity-8 mb-0 text-sm">Agriculteur / collecteur</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-6">
                <div class="card">
                    <div class="card-body text-center">
                        <h1 class="text-gradient text-primary" wire:ignore x-data
                            x-init="(new CountUp('state2', {{count($transporteurs)}})).start()">
                            <span id="state2">0</span></h1>
                        <h6 class="mb-0 font-weight-bolder">Transporteurs</h6>
                        <p class="opacity-8 mb-0 text-sm">Responsable Losigitque</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-6 mt-4 mt-md-0">
                <div class="card">
                    <div class="card-body text-center">
                        <h1 class="text-gradient text-primary" wire:ignore x-data
                            x-init="(new CountUp('state3', {{count($bennes)}})).start()">
                            <span id="state3">0</span></h1>
                        <h6 class="mb-0 font-weight-bolder">Bennes</h6>
                        <p class="opacity-8 mb-0 text-sm">Outils Transport</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-6 mt-4 mt-md-0">
                <div class="card">
                    <div class="card-body text-center">
                        <h1 class="text-gradient text-primary" wire:ignore x-data
                            x-init="(new CountUp('state4', {{count($responsables)}})).start()">
                            <span id="state4">0</span></h1>
                        <h6 class="mb-0 font-weight-bolder">Responsables</h6>
                        <p class="opacity-8 mb-0 text-sm">Ingénieur Agronomique</p>
                    </div>
                </div>
            </div>
        </div>
        <hr class="horizontal dark my-4">
        <div class="row ">
            <div class="col-lg-6">
                <div class="card h-100">
                    <div class="card-header pb-0 p-3">
                        <h6 class="text-start">Stock limit</h6>
                    </div>
                    <div class="card-body p-3 py-1">
                        <div class="row">
                            <div class="col-5 text-center">
                                <round-slider disabled min="0" max="100"
                                              value="{{ 100 - number_format($inUse * 100 / $stock,2)  }}"
                                              valuelabel="Stock"></round-slider>
                                <h4 class="font-weight-bold mt-md-n7 mt-n6"><span class="text-dark"
                                                                                  id="value">{{ 100 - number_format($inUse * 100 / $stock,2)  }}</span><span
                                            class="text-body"> %</span></h4>
                                <p class="ps-1 mt-md-5 mt-4 mb-0"><span class="px-3">Stock Libre</span></p>
                            </div>
                            <div class="col-7 my-auto">
                                <div class="table-responsive">
                                    <table class="table align-items-center mb-0">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-0">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">Total</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-md text-bolder"> {{$stock}} </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-0">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">In Stock</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-md text-bolder"> {{$stock-$inUse}} </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-0">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">In Use</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-md text-bolder"> {{$inUse}} </span>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mt-4 mt-lg-0" wire:ignore x-data x-init="ctx1 = $refs.chartConsumption.getContext('2d');

                 gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

                   gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
              gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
              gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

              new Chart(ctx1, {
              type: 'doughnut',
              data: {
              labels: ['En Cours Livraison', 'Livraison Valide', 'En Attente', 'Rejeté'],
              datasets: [{
              label: 'Consumption',
              weight: 9,
              cutout: 90,
              tension: 0.9,
              pointRadius: 2,
              borderWidth: 2,
              backgroundColor: ['#03A9F4', '#9E9E9E', '#4CAF50', '#ff667c'],
              data: [{{$enLivraison}}, {{$livred}}, {{$enAttente}}, {{$reject}}],
              fill: false
              }],
              },
              options: {
              responsive: true,
              maintainAspectRatio: false,
              plugins: {
              legend: {
              display: false,
              }
              },
              interaction: {
              intersect: false,
              mode: 'index',
              },
              scales: {
              y: {
              grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              },
              ticks: {
              display: false
              }
              },
              x: {
              grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              },
              ticks: {
              display: false,
              }
              },
              },
              },
              });
              ">
                <div class="card">
                    <div class="card-header pb-0 p-3">
                        <div class="d-flex align-items-center">
                            <h6 class="mb-0">Entity In Use</h6>
                            <button type="button"
                                    class="btn btn-icon-only btn-rounded btn-outline-secondary mb-0 ms-2 btn-sm d-flex align-items-center justify-content-center ms-auto"
                                    data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    title="See the consumption per room">
                                <i class="fas fa-info"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-5 text-center">
                                <div class="chart">
                                    <canvas x-ref="chartConsumption" id="chart-consumption" class="chart-canvas"
                                            height="197"></canvas>
                                </div>
                                <h4 class="font-weight-bold mt-n8">
                                    <span>{{$inUse}}</span>
                                    <span class="d-block text-body text-sm">Entity Used</span>
                                </h4>
                            </div>
                            <div class="col-7 my-4">
                                <div class="table-responsive">
                                    <table class="table align-items-center mb-0">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-0">
                                                    <span class="badge bg-gradient-info me-3"> </span>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">En Cours Livraison</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-xs"> {{number_format($enLivraison* 100 / $inUse,2)}} % </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-0">
                                                    <span class="badge bg-gradient-secondary me-3"> </span>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">Livraison Valide</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-xs"> {{number_format($livred* 100 / $inUse,2)}} % </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-0">
                                                    <span class="badge bg-gradient-success me-3"> </span>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">En Attente Reception</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-xs"> {{number_format($enAttente* 100 / $inUse,2)}} % </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-0">
                                                    <span class="badge bg-gradient-warning me-3"> </span>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">Reception Rejeté</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-xs"> {{number_format($reject* 100 / $inUse,2)}} % </span>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr class="horizontal dark my-5">

<!--        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div
                                class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                            <i class="material-icons opacity-10">weekend</i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Today's Money</p>
                            <h4 class="mb-0">$53k</h4>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-3">
                        <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+55% </span>than
                            lask week</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div
                                class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                            <i class="material-icons opacity-10">person</i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Today's Users</p>
                            <h4 class="mb-0">2,300</h4>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-3">
                        <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+3% </span>than
                            lask month</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div
                                class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                            <i class="material-icons opacity-10">person</i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">New Clients</p>
                            <h4 class="mb-0">3,462</h4>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-3">
                        <p class="mb-0"><span class="text-danger text-sm font-weight-bolder">-2%</span> than
                            yesterday</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div
                                class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                            <i class="material-icons opacity-10">weekend</i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Sales</p>
                            <h4 class="mb-0">$103,430</h4>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-3">
                        <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+5% </span>than
                            yesterday</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-4 col-md-6 mt-4 mb-4">
                <div class="card z-index-2 ">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                            <div class="chart">
                                <canvas id="chart-bars" class="chart-canvas" height="170"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="mb-0 ">Website Views</h6>
                        <p class="text-sm ">Last Campaign Performance</p>
                        <hr class="dark horizontal">
                        <div class="d-flex ">
                            <i class="material-icons text-sm my-auto me-1">schedule</i>
                            <p class="mb-0 text-sm"> campaign sent 2 days ago </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mt-4 mb-4">
                <div class="card z-index-2  ">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                        <div class="bg-gradient-success shadow-success border-radius-lg py-3 pe-1">
                            <div class="chart">
                                <canvas id="chart-line" class="chart-canvas" height="170"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="mb-0 "> Daily Sales </h6>
                        <p class="text-sm "> (<span class="font-weight-bolder">+15%</span>) increase in today
                            sales. </p>
                        <hr class="dark horizontal">
                        <div class="d-flex ">
                            <i class="material-icons text-sm my-auto me-1">schedule</i>
                            <p class="mb-0 text-sm"> updated 4 min ago </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mt-4 mb-3">
                <div class="card z-index-2 ">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                        <div class="bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1">
                            <div class="chart">
                                <canvas id="chart-line-tasks" class="chart-canvas" height="170"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="mb-0 ">Completed Tasks</h6>
                        <p class="text-sm ">Last Campaign Performance</p>
                        <hr class="dark horizontal">
                        <div class="d-flex ">
                            <i class="material-icons text-sm my-auto me-1">schedule</i>
                            <p class="mb-0 text-sm">just updated</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-lg-8 col-md-6 mb-md-0 mb-4">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-lg-6 col-7">
                                <h6>Projects</h6>
                                <p class="text-sm mb-0">
                                    <i class="fa fa-check text-info" aria-hidden="true"></i>
                                    <span class="font-weight-bold ms-1">30 done</span> this month
                                </p>
                            </div>
                            <div class="col-lg-6 col-5 my-auto text-end">
                                <div class="dropdown float-lg-end pe-4">
                                    <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown"
                                       aria-expanded="false">
                                        <i class="fa fa-ellipsis-v text-secondary"></i>
                                    </a>
                                    <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5"
                                        aria-labelledby="dropdownTable">
                                        <li><a class="dropdown-item border-radius-md" href="javascript:">Action</a>
                                        </li>
                                        <li><a class="dropdown-item border-radius-md" href="javascript:">Another
                                                action</a></li>
                                        <li><a class="dropdown-item border-radius-md" href="javascript:">Something
                                                else here</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0">
                                <thead>
                                <tr>
                                    <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Companies
                                    </th>
                                    <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Members
                                    </th>
                                    <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Budget
                                    </th>
                                    <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Completion
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="{{ asset('assets') }}/img/small-logos/logo-xd.svg"
                                                     class="avatar avatar-sm me-3" alt="xd">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">Material XD Version</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="avatar-group mt-2">
                                            <a href="javascript:" class="avatar avatar-xs rounded-circle"
                                               data-bs-toggle="tooltip" data-bs-placement="bottom"
                                               title="Ryan Tompson">
                                                <img src="{{ asset('assets') }}/img/team-1.jpg" alt="team1">
                                            </a>
                                            <a href="javascript:" class="avatar avatar-xs rounded-circle"
                                               data-bs-toggle="tooltip" data-bs-placement="bottom"
                                               title="Romina Hadid">
                                                <img src="{{ asset('assets') }}/img/team-2.jpg" alt="team2">
                                            </a>
                                            <a href="javascript:" class="avatar avatar-xs rounded-circle"
                                               data-bs-toggle="tooltip" data-bs-placement="bottom"
                                               title="Alexander Smith">
                                                <img src="{{ asset('assets') }}/img/team-3.jpg" alt="team3">
                                            </a>
                                            <a href="javascript:" class="avatar avatar-xs rounded-circle"
                                               data-bs-toggle="tooltip" data-bs-placement="bottom"
                                               title="Jessica Doe">
                                                <img src="{{ asset('assets') }}/img/team-4.jpg" alt="team4">
                                            </a>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="text-xs font-weight-bold"> $14,000 </span>
                                    </td>
                                    <td class="align-middle">
                                        <div class="progress-wrapper w-75 mx-auto">
                                            <div class="progress-info">
                                                <div class="progress-percentage">
                                                    <span class="text-xs font-weight-bold">60%</span>
                                                </div>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar bg-gradient-info w-60"
                                                     role="progressbar" aria-valuenow="60" aria-valuemin="0"
                                                     aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="{{ asset('assets') }}/img/small-logos/logo-atlassian.svg"
                                                     class="avatar avatar-sm me-3" alt="atlassian">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">Add Progress Track</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="avatar-group mt-2">
                                            <a href="javascript:" class="avatar avatar-xs rounded-circle"
                                               data-bs-toggle="tooltip" data-bs-placement="bottom"
                                               title="Romina Hadid">
                                                <img src="{{ asset('assets') }}/img/team-2.jpg" alt="team5">
                                            </a>
                                            <a href="javascript:" class="avatar avatar-xs rounded-circle"
                                               data-bs-toggle="tooltip" data-bs-placement="bottom"
                                               title="Jessica Doe">
                                                <img src="{{ asset('assets') }}/img/team-4.jpg" alt="team6">
                                            </a>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="text-xs font-weight-bold"> $3,000 </span>
                                    </td>
                                    <td class="align-middle">
                                        <div class="progress-wrapper w-75 mx-auto">
                                            <div class="progress-info">
                                                <div class="progress-percentage">
                                                    <span class="text-xs font-weight-bold">10%</span>
                                                </div>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar bg-gradient-info w-10"
                                                     role="progressbar" aria-valuenow="10" aria-valuemin="0"
                                                     aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="{{ asset('assets') }}/img/small-logos/logo-slack.svg"
                                                     class="avatar avatar-sm me-3" alt="team7">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">Fix Platform Errors</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="avatar-group mt-2">
                                            <a href="javascript:" class="avatar avatar-xs rounded-circle"
                                               data-bs-toggle="tooltip" data-bs-placement="bottom"
                                               title="Romina Hadid">
                                                <img src="{{ asset('assets') }}/img/team-3.jpg" alt="team8">
                                            </a>
                                            <a href="javascript:" class="avatar avatar-xs rounded-circle"
                                               data-bs-toggle="tooltip" data-bs-placement="bottom"
                                               title="Jessica Doe">
                                                <img src="{{ asset('assets') }}/img/team-1.jpg" alt="team9">
                                            </a>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="text-xs font-weight-bold"> Not set </span>
                                    </td>
                                    <td class="align-middle">
                                        <div class="progress-wrapper w-75 mx-auto">
                                            <div class="progress-info">
                                                <div class="progress-percentage">
                                                    <span class="text-xs font-weight-bold">100%</span>
                                                </div>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar bg-gradient-success w-100"
                                                     role="progressbar" aria-valuenow="100" aria-valuemin="0"
                                                     aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="{{ asset('assets') }}/img/small-logos/logo-spotify.svg"
                                                     class="avatar avatar-sm me-3" alt="spotify">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">Launch our Mobile App</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="avatar-group mt-2">
                                            <a href="javascript:" class="avatar avatar-xs rounded-circle"
                                               data-bs-toggle="tooltip" data-bs-placement="bottom"
                                               title="Ryan Tompson">
                                                <img src="{{ asset('assets') }}/img/team-4.jpg" alt="user1">
                                            </a>
                                            <a href="javascript:" class="avatar avatar-xs rounded-circle"
                                               data-bs-toggle="tooltip" data-bs-placement="bottom"
                                               title="Romina Hadid">
                                                <img src="{{ asset('assets') }}/img/team-3.jpg" alt="user2">
                                            </a>
                                            <a href="javascript:" class="avatar avatar-xs rounded-circle"
                                               data-bs-toggle="tooltip" data-bs-placement="bottom"
                                               title="Alexander Smith">
                                                <img src="{{ asset('assets') }}/img/team-4.jpg" alt="user3">
                                            </a>
                                            <a href="javascript:" class="avatar avatar-xs rounded-circle"
                                               data-bs-toggle="tooltip" data-bs-placement="bottom"
                                               title="Jessica Doe">
                                                <img src="{{ asset('assets') }}/img/team-1.jpg" alt="user4">
                                            </a>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="text-xs font-weight-bold"> $20,500 </span>
                                    </td>
                                    <td class="align-middle">
                                        <div class="progress-wrapper w-75 mx-auto">
                                            <div class="progress-info">
                                                <div class="progress-percentage">
                                                    <span class="text-xs font-weight-bold">100%</span>
                                                </div>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar bg-gradient-success w-100"
                                                     role="progressbar" aria-valuenow="100" aria-valuemin="0"
                                                     aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="{{ asset('assets') }}/img/small-logos/logo-jira.svg"
                                                     class="avatar avatar-sm me-3" alt="jira">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">Add the New Pricing Page</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="avatar-group mt-2">
                                            <a href="javascript:" class="avatar avatar-xs rounded-circle"
                                               data-bs-toggle="tooltip" data-bs-placement="bottom"
                                               title="Ryan Tompson">
                                                <img src="{{ asset('assets') }}/img/team-4.jpg" alt="user5">
                                            </a>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="text-xs font-weight-bold"> $500 </span>
                                    </td>
                                    <td class="align-middle">
                                        <div class="progress-wrapper w-75 mx-auto">
                                            <div class="progress-info">
                                                <div class="progress-percentage">
                                                    <span class="text-xs font-weight-bold">25%</span>
                                                </div>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar bg-gradient-info w-25"
                                                     role="progressbar" aria-valuenow="25" aria-valuemin="0"
                                                     aria-valuemax="25"></div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="{{ asset('assets') }}/img/small-logos/logo-invision.svg"
                                                     class="avatar avatar-sm me-3" alt="invision">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">Redesign New Online Shop</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="avatar-group mt-2">
                                            <a href="javascript:" class="avatar avatar-xs rounded-circle"
                                               data-bs-toggle="tooltip" data-bs-placement="bottom"
                                               title="Ryan Tompson">
                                                <img src="{{ asset('assets') }}/img/team-1.jpg" alt="user6">
                                            </a>
                                            <a href="javascript:" class="avatar avatar-xs rounded-circle"
                                               data-bs-toggle="tooltip" data-bs-placement="bottom"
                                               title="Jessica Doe">
                                                <img src="{{ asset('assets') }}/img/team-4.jpg" alt="user7">
                                            </a>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="text-xs font-weight-bold"> $2,000 </span>
                                    </td>
                                    <td class="align-middle">
                                        <div class="progress-wrapper w-75 mx-auto">
                                            <div class="progress-info">
                                                <div class="progress-percentage">
                                                    <span class="text-xs font-weight-bold">40%</span>
                                                </div>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar bg-gradient-info w-40"
                                                     role="progressbar" aria-valuenow="40" aria-valuemin="0"
                                                     aria-valuemax="40"></div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card h-100">
                    <div class="card-header pb-0">
                        <h6>Orders overview</h6>
                        <p class="text-sm">
                            <i class="fa fa-arrow-up text-success" aria-hidden="true"></i>
                            <span class="font-weight-bold">24%</span> this month
                        </p>
                    </div>
                    <div class="card-body p-3">
                        <div class="timeline timeline-one-side">
                            <div class="timeline-block mb-3">
                                  <span class="timeline-step">
                                      <i class="material-icons text-success text-gradient">notifications</i>
                                  </span>
                                <div class="timeline-content">
                                    <h6 class="text-dark text-sm font-weight-bold mb-0">$2400, Design changes
                                    </h6>
                                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">22 DEC 7:20 PM
                                    </p>
                                </div>
                            </div>
                            <div class="timeline-block mb-3">
                                  <span class="timeline-step">
                                      <i class="material-icons text-danger text-gradient">code</i>
                                  </span>
                                <div class="timeline-content">
                                    <h6 class="text-dark text-sm font-weight-bold mb-0">New order #1832412</h6>
                                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">21 DEC 11 PM
                                    </p>
                                </div>
                            </div>
                            <div class="timeline-block mb-3">
                                  <span class="timeline-step">
                                      <i class="material-icons text-info text-gradient">shopping_cart</i>
                                  </span>
                                <div class="timeline-content">
                                    <h6 class="text-dark text-sm font-weight-bold mb-0">Server payments for
                                        April</h6>
                                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">21 DEC 9:34 PM
                                    </p>
                                </div>
                            </div>
                            <div class="timeline-block mb-3">
                                  <span class="timeline-step">
                                      <i class="material-icons text-warning text-gradient">credit_card</i>
                                  </span>
                                <div class="timeline-content">
                                    <h6 class="text-dark text-sm font-weight-bold mb-0">New card added for order
                                        #4395133</h6>
                                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">20 DEC 2:20 AM
                                    </p>
                                </div>
                            </div>
                            <div class="timeline-block mb-3">
                                  <span class="timeline-step">
                                      <i class="material-icons text-primary text-gradient">key</i>
                                  </span>
                                <div class="timeline-content">
                                    <h6 class="text-dark text-sm font-weight-bold mb-0">Unlock packages for
                                        development</h6>
                                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">18 DEC 4:54 AM
                                    </p>
                                </div>
                            </div>
                            <div class="timeline-block">
                                  <span class="timeline-step">
                                      <i class="material-icons text-dark text-gradient">payments</i>
                                  </span>
                                <div class="timeline-content">
                                    <h6 class="text-dark text-sm font-weight-bold mb-0">New order #9583120</h6>
                                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">17 DEC</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>-->
    </div>
</div>
{{--@push('js')
    <script src="{{ asset('assets') }}/js/plugins/chartjs.min.js"></script>
    <script>
        var ctx = document.getElementById("chart-bars").getContext("2d");

        new Chart(ctx, {
            type: "bar",
            data: {
                labels: ["M", "T", "W", "T", "F", "S", "S"],
                datasets: [{
                    label: "Sales",
                    tension: 0.4,
                    borderWidth: 0,
                    borderRadius: 4,
                    borderSkipped: false,
                    backgroundColor: "rgba(255, 255, 255, .8)",
                    data: [50, 20, 10, 22, 50, 10, 40],
                    maxBarThickness: 6
                },],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5],
                            color: 'rgba(255, 255, 255, .2)'
                        },
                        ticks: {
                            suggestedMin: 0,
                            suggestedMax: 500,
                            beginAtZero: true,
                            padding: 10,
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: 'normal',
                                lineHeight: 2
                            },
                            color: "#fff"
                        },
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5],
                            color: 'rgba(255, 255, 255, .2)'
                        },
                        ticks: {
                            display: true,
                            color: '#f8f9fa',
                            padding: 10,
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });


        var ctx2 = document.getElementById("chart-line").getContext("2d");

        new Chart(ctx2, {
            type: "line",
            data: {
                labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Mobile apps",
                    tension: 0,
                    borderWidth: 0,
                    pointRadius: 5,
                    pointBackgroundColor: "rgba(255, 255, 255, .8)",
                    pointBorderColor: "transparent",
                    borderColor: "rgba(255, 255, 255, .8)",
                    borderColor: "rgba(255, 255, 255, .8)",
                    borderWidth: 4,
                    backgroundColor: "transparent",
                    fill: true,
                    data: [50, 40, 300, 320, 500, 350, 200, 230, 500],
                    maxBarThickness: 6

                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5],
                            color: 'rgba(255, 255, 255, .2)'
                        },
                        ticks: {
                            display: true,
                            color: '#f8f9fa',
                            padding: 10,
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#f8f9fa',
                            padding: 10,
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });

        var ctx3 = document.getElementById("chart-line-tasks").getContext("2d");

        new Chart(ctx3, {
            type: "line",
            data: {
                labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Mobile apps",
                    tension: 0,
                    borderWidth: 0,
                    pointRadius: 5,
                    pointBackgroundColor: "rgba(255, 255, 255, .8)",
                    pointBorderColor: "transparent",
                    borderColor: "rgba(255, 255, 255, .8)",
                    borderWidth: 4,
                    backgroundColor: "transparent",
                    fill: true,
                    data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                    maxBarThickness: 6

                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5],
                            color: 'rgba(255, 255, 255, .2)'
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#f8f9fa',
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#f8f9fa',
                            padding: 10,
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });

    </script>
@endpush--}}
