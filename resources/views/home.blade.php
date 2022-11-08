@extends('partials.template')
@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="stat-widget-two card-body">
                            <div class="stat-content">
                                <div class="stat-text">Today Expenses </div>
                                <div class="stat-digit"> <i class="fa fa-usd"></i>8500</div>
                            </div>
                            <div class="progress">
                                <div class="progress-bar progress-bar-success w-85" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="stat-widget-two card-body">
                            <div class="stat-content">
                                <div class="stat-text">Income Detail</div>
                                <div class="stat-digit"> <i class="fa fa-usd"></i>7800</div>
                            </div>
                            <div class="progress">
                                <div class="progress-bar progress-bar-primary w-75" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="stat-widget-two card-body">
                            <div class="stat-content">
                                <div class="stat-text">Task Completed</div>
                                <div class="stat-digit"> <i class="fa fa-usd"></i> 500</div>
                            </div>
                            <div class="progress">
                                <div class="progress-bar progress-bar-warning w-50" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="stat-widget-two card-body">
                            <div class="stat-content">
                                <div class="stat-text">Task Completed</div>
                                <div class="stat-digit"> <i class="fa fa-usd"></i>650</div>
                            </div>
                            <div class="progress">
                                <div class="progress-bar progress-bar-danger w-65" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                    <!-- /# card -->
                </div>
                <!-- /# column -->
            </div>
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Sales Overview</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-12 col-lg-8">
                                    <div id="morris-bar-chart"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Project</h4>
                        </div>
                        <div class="card-body">
                            <div class="current-progress">
                                <div class="progress-content py-2">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="progress-text">Website</div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="current-progressbar">
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-primary w-40" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
                                                        40%
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="progress-content py-2">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="progress-text">Android</div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="current-progressbar">
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-primary w-60" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">
                                                        60%
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="progress-content py-2">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="progress-text">Ios</div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="current-progressbar">
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-primary w-70" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">
                                                        70%
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="progress-content py-2">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="progress-text">Mobile</div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="current-progressbar">
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-primary w-90" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">
                                                        90%
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
