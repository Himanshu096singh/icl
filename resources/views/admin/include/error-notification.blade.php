@if( Session::has('errors') )
<div class="alert alert-danger" role="alert" align="left">
<ul class="errlist">
@foreach($errors->all() as $error) 
<li>{{$error}}</li>
@endforeach
</ul>
</div>
@endif
 
@if( Session::has('message') )
<div class="alert alert-success" role="alert">
{{ Session::get('message') }}
</div>
@endif

@if( Session::has('singleerror') )
<div class="alert alert-danger" role="alert">
{{ Session::get('singleerror') }}
</div>
@endif

@if( Session::has('error') )
<div class="alert alert-danger" role="alert">
{{ Session::get('error') }}
</div>
@endif