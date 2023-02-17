@extends('layouts.adminLayout.admin_design')
@section('content')

<!-- page content -->
<div class="col" role="main">
	<div class="conte-sticky">
		<div class="container">
			<div class="row" style="text-align: center;width: 100%;">
				<img src="{{ asset('images/CatuloTango-2.svg') }}" class="img-fluid"  style="margin-top: 170px;width: 300px;margin: 0 auto;padding-top: 150px;" alt="imagen">
			</div>
	</div>
</div>
</div>
<!-- /page content -->

@endsection

@section('page-js-script')

	@if (session('flash_message'))
		  <script>toast('{!! session('flash_message') !!}');</script>
	@endif

@stop


