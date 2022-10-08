
@extends('layouts.pcl_front')
@section('content')
<style>
	.errorpage{
		text-align: center;
		min-height:400px;
		padding:200px 20px;
		width:100%;
		margin:auto;
	}
</style>	
<div class="container">
	<div class="row">
		<div class="errorpage">
			<h1>403</h1>
			<h2>Unauthorized Click</h2>
			<a href="{{url('/')}}" class="btn btn-warning">Go To Home</a>
		</div>	
	</div>
</div>
@endsection

