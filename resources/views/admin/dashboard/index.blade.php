@extends('layouts.app')

@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Dashboard</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-bullhorn"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Donation Requests</span>
                <span class="info-box-number">
                  {{ App\Models\DonationRequest::count() }}
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-pen"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Posts</span>
                <span class="info-box-number">{{ App\Models\Post::count() }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-inbox"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Contact Messages</span>
                <span class="info-box-number">{{ App\Models\ContactUs::count() }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">New Clients</span>
                <span class="info-box-number">{{ App\Models\Client::count() }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="card">
          <div class="card-header">
            <h5 class="card-title">Monthly Recap Report</h5>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <div class="btn-group">
                <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                  <i class="fas fa-wrench"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right" role="menu">
                  <a href="#" class="dropdown-item">Action</a>
                  <a href="#" class="dropdown-item">Another action</a>
                  <a href="#" class="dropdown-item">Something else here</a>
                  <a class="dropdown-divider"></a>
                  <a href="#" class="dropdown-item">Separated link</a>
                </div>
              </div>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-8">
                <p class="text-center">
                  <strong>Current Donation Requests & Clients</strong>
                </p>
                <div class="chart">
                  <div class="chartjs-size-monitor">
                    <div class="chartjs-size-monitor-expand">
                      <div class=""></div>
                    </div>
                    <div class="chartjs-size-monitor-shrink">
                      <div class=""></div>
                    </div>
                  </div>

                  <div style="width:75%;">
                    {!! $chartjs->render() !!}
                  </div>
                </div>
                <!-- /.chart-responsive -->
              </div>
              <!-- /.col -->
              <div class="col-md-4">
                <p class="text-center">
                  <strong>Goal Completion</strong>
                </p>

                <div class="progress-group">
                  New Donation Requests
                  <span class="float-right"><b>{{ App\Models\DonationRequest::count() }}</b>/200</span>
                  <div class="progress progress-sm">
                    <div class="progress-bar bg-primary" style="width: {{ App\Models\DonationRequest::count() }}%">
                    </div>
                  </div>
                </div>
                <!-- /.progress-group -->

                <div class="progress-group">
                  New Posts
                  <span class="float-right"><b>{{ App\Models\Post::count() }}</b>/400</span>
                  <div class="progress progress-sm">
                    <div class="progress-bar bg-danger" style="width: {{ App\Models\Post::count() }}%"></div>
                  </div>
                </div>

                <!-- /.progress-group -->
                <div class="progress-group">
                  <span class="progress-text">New Messages</span>
                  <span class="float-right"><b>{{ App\Models\ContactUs::count() }}</b>/800</span>
                  <div class="progress progress-sm">
                    <div class="progress-bar bg-success" style="width: {{ App\Models\ContactUs::count() }}%"></div>
                  </div>
                </div>

                <!-- /.progress-group -->
                <div class="progress-group">
                  New Clients
                  <span class="float-right"><b>{{ App\Models\Client::count() }}</b>/500</span>
                  <div class="progress progress-sm">
                    <div class="progress-bar bg-warning" style="width: {{ App\Models\Client::count() }}%"></div>
                  </div>
                </div>
                <!-- /.progress-group -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- ./card-body -->
          <div class="card-footer">
            <div class="row">
              <div class="col-sm-3 col-6">
                <div class="description-block border-right">
                  <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 17%</span>
                  <h5 class="description-header">$35,210.43</h5>
                  <span class="description-text">TOTAL REVENUE</span>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
              <div class="col-sm-3 col-6">
                <div class="description-block border-right">
                  <span class="description-percentage text-warning"><i class="fas fa-caret-left"></i> 0%</span>
                  <h5 class="description-header">$10,390.90</h5>
                  <span class="description-text">TOTAL COST</span>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
              <div class="col-sm-3 col-6">
                <div class="description-block border-right">
                  <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 20%</span>
                  <h5 class="description-header">$24,813.53</h5>
                  <span class="description-text">TOTAL PROFIT</span>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
              <div class="col-sm-3 col-6">
                <div class="description-block">
                  <span class="description-percentage text-danger"><i class="fas fa-caret-down"></i> 18%</span>
                  <h5 class="description-header">1200</h5>
                  <span class="description-text">GOAL COMPLETIONS</span>
                </div>
                <!-- /.description-block -->
              </div>
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-footer -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>


    <div class="row">
      {{-- <div class="col-lg-4">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Latest Donations</h3>

            <div class="card-tools">
              <span class="badge badge-info">{{ App\Models\DonationRequest::count() }} New Donations</span>
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">
            <ul class="users-list clearfix">
              @forelse ( App\Models\DonationRequest::all() as $donation)
                <li>
                  <a class="users-list-name"
                    href="{{ route('donationRequest.show', [$donation->id]) }}">{{ $donation->patient_name }}</a>
                  <span class="users-list-date">{{ $donation->city->name }}</span>
                  <span class="users-list-date">{{ $donation->bloodType->name }}</span>
                  <span class="users-list-date">{{ $donation->bags_num }} bags</span>
                </li>
              @empty
                <p>No new donations.</p>
              @endforelse
            </ul>
            <!-- /.users-list -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer text-center">
            <a href="{{ route('donationRequest.index') }}">View All Donations</a>
          </div>
          <!-- /.card-footer -->
        </div>
      </div> --}}
      <div class="col-lg-7">
        <div class="card">
          <div class="card-header border-transparent">
            <h3 class="card-title">Latest Donation Requests</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table m-0">
                <thead>
                  <tr>
                    <th>
                      Patient
                    </th>
                    <th>City</th>
                    <th>Bloof Type</th>
                    <th>Bags no.</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ( App\Models\DonationRequest::all() as $donation)

                    <tr>
                      <td><a
                          href="{{ route('donationRequest.show', [$donation->id]) }}">{{ $donation->patient_name }}</a>
                      </td>
                      <td>{{ $donation->city->name }}</td>
                      <td>{{ $donation->bloodType->name }}</td>
                      <td>
                        {{ $donation->bags_num }} bags
                      </td>
                    </tr>

                  @empty
                    <p>No new donations.</p>
                  @endforelse

                </tbody>
              </table>
            </div>
            <!-- /.table-responsive -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer text-center clearfix">
            <a href="{{ route('donationRequest.index') }}">View All Requests</a>
          </div>
          <!-- /.card-footer -->
        </div>
      </div>


      <div class="col-lg-5">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Latest Messages</h3>

            <div class="card-tools">
              <span class="badge badge-success">{{ App\Models\ContactUs::count() }} New Messages</span>
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">
            <ul class="users-list clearfix">
              @forelse ( App\Models\ContactUs::all() as $msg)
                <li>
                  <a class="users-list-name" href="{{ route('contacts.index') }}">{{ $msg->client->name }}</a>
                  <span class="users-list-date">{{ $msg->subject }}</span>
                </li>
              @empty
                <p>No new Messages.</p>
              @endforelse

            </ul>
            <!-- /.users-list -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer text-center">
            <a href="{{ route('contacts.index') }}">View All Messages</a>
          </div>
          <!-- /.card-footer -->
        </div>


        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Latest Clients</h3>

            <div class="card-tools">
              <span class="badge badge-warning">{{ App\Models\Client::count() }} New Clients</span>
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">
            <ul class="users-list clearfix">
              @forelse ( App\Models\Client::all() as $client)
                <li>
                  <a class="users-list-name"
                    href="{{ route('client.index', [$client->id]) }}">{{ $client->name }}</a>
                  <span
                    class="users-list-date">{{ Carbon\Carbon::parse($client->created_at)->format('Y-m-d') }}</span>
                </li>
              @empty
                <p>No new clients.</p>
              @endforelse


            </ul>
            <!-- /.users-list -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer text-center">
            <a href="{{ route('client.index') }}">View All Clients</a>
          </div>
          <!-- /.card-footer -->
        </div>
      </div>
      <div class="col-lg-4">

      </div>
    </div>




  </section>
  <!-- /.content -->
@endsection
