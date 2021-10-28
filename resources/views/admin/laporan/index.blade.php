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
					  	<div class="col-md-8">
							<div class="row g-3 mb-3">
								<div class="col-md-6">
									<label class="form-label" for="kategori_name">{{ __('Tanggal Awal') }} <a style="color:red;">*</a></label>
									<input class="datepicker-here form-control digits" type="text" data-language="en"/>
								</div>

								<div class="col-md-6">
									<label class="form-label" for="kategori_name">{{ __('Tanggal Akhir') }} <a style="color:red;">*</a></label>
									<input class="datepicker-here form-control digits" type="text" data-language="en"/>
								</div>

								<div class="col-md-6">
									<label class="form-label" for="kategori_status">{{ __('Kategori') }}</label>
									<select class="form-select" id="kategori_status" name="kategori_status">
										@foreach($kategori as $value)
											<option value="{{ $value->cat_id }}">{{ $value->cat_name }}</option>
										@endforeach
									</select>
								</div>

								<div class="col-md-6">
									<label class="form-label" for="kategori_status">{{ __('Dompet') }}</label>
									<select class="form-select" id="kategori_status" name="kategori_status">
										@foreach($dompet as $value)
											<option value="{{ $value->dompet_id }}">{{ $value->dompet_name }}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>

						<div class="col-md-4">
							<div class="media">
								<div class="media-body">
									<span class="d-block">Status</span>
									<span class="d-block">
										<i class="fa fa-check"></i> Tampilakn Uang Masuk
									</span>
									<span class="d-block">
										<i class="fa fa-check"></i> Tampilakn Uang Keluar
									</span>
								</div>
							</div>
						</div>
                      </div>

					  <div class="mt-4 mb-3" style="border-bottom: 1px solid #ecf3fa"></div>

                      <button class="btn btn-primary pull-left" type="submit">{{ __('Buat Laporan') }}</button>
                      <button class="btn btn-primary pull-left" type="submit">{{ __('Buat ke Excel') }}</button>
                    </form>
				</div>
			</div>
		</div>
	</div>
	<!-- /.row -->
</div>
<!-- Container-fluid Ends-->
@stop