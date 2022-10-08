@extends('layouts.admin')

@section('title', 'Admin Business Payouts')

@section('business header')

@section('business sidebar')


@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Business Payouts</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('business')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Business Payouts</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
    
              <div class="row">

<div class="col-sm-12">
  <div class="card">
  <div class="card-header">
    <h3 class="card-title">Payouts</h3>
  </div>
  <div class="card-body">

<form action="{{url('admin/business/payouts/update')}}" method="POST"  enctype="multipart/form-data">
  @csrf
  <input type="hidden" value="{{$payout->id}}" name="id">

  <div class="form-group">
    <label for="amount">Amount You want to pay</label>
    <input type="text" id="amount" name="amount" value="{{$payout->request_amount}}" class="form-control"> 
  </div>

  <div class="form-group">
    <label for="invoice_id">Invoice or Transaction/Reference Number</label>
    <input type="text" id="invoice_id" name="invoice_id" value="{{$payout->invoice_id}}" class="form-control"> 
  </div>

   <div class="form-group">
    <label for="attachment">Attachment</label>
    <input type="file"  id="attachment" name="image" class="form-control"> 
  </div>

  <div class="form-group">
    <small class="text-danger">Once you click on the button then, you will not be able to update this payout again.</small>
    <br/>
    <button type="submit" class="btn btn-primary">Pay Now</button>
  </div>
  
</form>

  </div>
  </div>
</div>




        </div>  
      

      </div>
      
    </section>
    <!-- /.content -->
  </div>


 
@endsection

@section('business footer')

