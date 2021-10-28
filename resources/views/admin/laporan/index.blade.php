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
                    
					<div class="row">
						<form class="needs-validation" novalidate="" action="{{ route('admin.laporan') }}" method="GET" enctype="multipart/form-data">
							<div class="row g-3 mb-3">
								<div class="col-md-8">
									<div class="row g-3 mb-3">
										<div class="col-md-6">
											<label class="form-label" for="start_date">{{ __('Tanggal Awal') }} <a style="color:red;">*</a></label>
											<input class="start-date form-control digits" type="text" data-language="en" id="start_date" name="start_date"/>
										</div>

										<div class="col-md-6">
											<label class="form-label" for="end_date">{{ __('Tanggal Akhir') }} <a style="color:red;">*</a></label>
											<input class="end-date form-control digits" type="text" data-language="en" id="end_date" name="end_date"/>
										</div>

										<div class="col-md-6">
											<label class="form-label" for="kategori">{{ __('Kategori') }}</label>
											<select class="form-select" id="kategori" name="kategori">
												<option value="">{{ __('Semuanya') }}</option>
												@foreach($kategori as $value)
													<option value="{{ $value->cat_id }}">{{ $value->cat_name }}</option>
												@endforeach
											</select>
										</div>

										<div class="col-md-6">
											<label class="form-label" for="dompet">{{ __('Dompet') }}</label>
											<select class="form-select" id="dompet" name="dompet">
												<option value="">{{ __('Semuanya') }}</option>
												@foreach($dompet as $value)
													<option value="{{ $value->dompet_id }}">{{ $value->dompet_name }}</option>
												@endforeach
											</select>
										</div>
									</div>
								</div>

								<div class="col-md-4">
									<div class="media" style="
										background: #fbff00;
										/* color: #ffffff; */
										padding: 20px;
										border-radius: 10px;
									">
										<div class="media-body">
											<h4 class="d-block p-2 text-center" style="border-bottom: 1px solid #ecf3fa">STATUS LAPORAN</h4>
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
							<button type="submit" class="btn btn-primary pull-left">{{ __('Buat Laporan') }}</button>
							<button type="button" class="btn btn-danger pull-left" id="export_laporan">{{ __('Export Excel') }}</button>
						</form>
					</div>

					<div class="row mt-5">
						<div class="table-responsive">
							<table class="display" id="table_laporan">
								<thead>
									<tr>
										<th>#</th>
										<th>{{ __('TANGGAL') }}</th>
										<th>{{ __('KODE') }}</th>
										<th>{{ __('DESKRIPSI') }}</th>
										<th>{{ __('DOMPET') }}</th>
										<th>{{ __('KATEGORI') }}</th>
										<th>{{ __('NILAI') }}</th>
									</tr>
								</thead>
								<tbody>
									@php 
										$no=1;
									@endphp

									@foreach($data as $key => $value)
									<tr>
										<td>{{ $no++ }}</td>
										<td>{{ $value->trx_date }}</td>
										<td>{{ $value->trx_code }}</td>
										<td>{{ $value->trx_description }}</td>
										<td>{{ $value->dompet_name }}</td>
										<td>{{ $value->cat_name }}</td>
										<td>(-) {{ number_format($value->trx_value,0,'.') }}</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
                    </div>
				</div>
			</div>
		</div>
	</div>
	<!-- /.row -->
</div>
<!-- Container-fluid Ends-->
@push('js')
<!-- DataTables -->
<script>
$(function () {
	$(".start-date").datepicker({ 
        dateFormat: 'yyyy-mm-dd'
    });

	$(".end-date").datepicker({ 
        dateFormat: 'yyyy-mm-dd'
    });

	$('#table_laporan').DataTable({
        'language' : {
            'url' : '/templates/backend/CyberFrostModernTheme/js/datatable/datatables/indonesia.json',
            'sEmptyTable' : 'Tidads'
        },
    });
});
</script>
@endpush
@stop