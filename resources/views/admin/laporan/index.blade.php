@extends('layouts.backend.app',[
	'title' => 'Laporan Transaksi',
	'contentTitle' => 'Laporan Transaksi',
])
@push('css')

@endpush
@section('content')
<div class="container-fluid">        
	<div class="page-title">
		<div class="row">
			<div class="col-6">
				<h3>{{ __('Laporan Transaksi') }}</h3>
			</div>
			<div class="col-6">
				<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('admin.index') }}">{{ __('Halaman Utama') }}</a></li>
				<li class="breadcrumb-item active">{{ __('Laporan Transaksi') }}</li>
				</ol>
			</div>
		</div>
	</div>
</div>
<!-- Container-fluid starts-->
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12 col-xl-12">
			<div class="card">
				<div class="card-body btn-showcase">
				@include('flash-message')
                    
                    <form class="needs-validation" novalidate="" action="#" method="POST" enctype="multipart/form-data">
					@csrf
                      <div class="row g-3 mb-3">
                        <div class="col-md-12">
							<label class="form-label" for="kategori_name">{{ __('Nama') }} <a style="color:red;">*</a></label>
							<input class="datepicker-here form-control digits" type="text" data-language="en"/>
                        </div>
                      </div>

					  <div class="mt-4 mb-3" style="border-bottom: 1px solid #ecf3fa"></div>

                      <button class="btn btn-primary pull-right" type="submit">{{ __('Submit') }}</button>
                    </form>
				</div>
			</div>
		</div>
	</div>
	<!-- /.row -->
</div>
<!-- Container-fluid Ends-->
@stop