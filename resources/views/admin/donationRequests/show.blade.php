@extends('layouts.app')

@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Donation Request Details</h1>
        </div>
        @include('admin.includes.message')
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Donation Request Details</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body p-0">
        <table class="table">
          <tbody>
            <tr>
              <td style="width:200px;" class="text-muted">Patient Name: </td>
              <td>{{ $donationRequest->patient_name }}</td>
            </tr>
            <tr>
              <td style="width:200px;" class="text-muted">Patient Age: </td>
              <td>{{ $donationRequest->patient_age }}</td>
            </tr>
            <tr>
              <td style="width:200px;" class="text-muted">Blood Type: </td>
              <td>{{ $donationRequest->bloodType->name }}</td>
            </tr>
            <tr>
              <td style="width:200px;" class="text-muted">Related Client: </td>
              <td>{{ $donationRequest->client->name }}</td>
            </tr>
            <tr>
              <td style="width:200px;" class="text-muted">No. Bags: </td>
              <td>{{ $donationRequest->bags_num }}</td>
            </tr>
            <tr>
              <td style="width:200px;" class="text-muted">Hospital Name: </td>
              <td>{{ $donationRequest->hospital_name }}</td>
            </tr>
            <tr>
              <td style="width:200px;" class="text-muted">Hospital Address: </td>
              <td>{{ $donationRequest->hospital_address }}</td>
            </tr>
            <tr>
              <td style="width:200px;" class="text-muted">City: </td>
              <td>{{ $donationRequest->city->name }}</td>
            </tr>
            <tr>
              <td style="width:200px;" class="text-muted">Patient Phone No.: </td>
              <td>{{ $donationRequest->patient_phone }}</td>
            </tr>
            <tr>
              <td style="width:200px;" class="text-muted">Additional Notes: </td>
              <td>{{ $donationRequest->additional_notes }}</td>
            </tr>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
  </section>
  <!-- /.content -->
@endsection
