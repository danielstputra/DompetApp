@extends('layouts.backend.app',[
	'title' => 'Halaman Utama',
	'contentTitle' => 'Halaman Utama',
])

@section('content')
<div class="container-fluid">        
	<div class="page-title">
		<div class="row">
			<div class="col-6">
				<h3>{{ __('Halaman Utama') }}</h3>
			</div>
			<div class="col-6">
				<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i data-feather="home"></i></a></li>
				<li class="breadcrumb-item active">{{ __('Halaman Utama') }}</li>
				</ol>
			</div>
		</div>
	</div>
</div>
<!-- Container-fluid starts-->
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-header">
					<h5>Dompet Masuk</h5><span>Daftar transaksi dompet masuk.</span>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="display" id="table-dompet-masuk">
							<thead>
								<tr>
									<th>#</th>
									<th>{{ __('TANGGAL') }}</th>
									<th>{{ __('KODE') }}</th>
									<th>{{ __('DESKRIPSI') }}</th>
									<th>{{ __('KATEGORI') }}</th>
									<th>{{ __('NILAI') }}</th>
									<th>{{ __('DOMPET') }}</th>
								</tr>
							</thead>
							<tbody>
								@php 
                                    $no=1;
                                @endphp

                                @foreach($transaksi_masuk as $value)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $value->trx_date }}</td>
                                    <td>{{ $value->trx_code }}</td>
                                    <td>{{ $value->trx_description }}</td>
                                    <td>{{ $value->cat_name }}</td>
                                    <td>(-) {{ number_format($value->trx_value,0,'.') }}</td>
                                    <td>{{ $value->dompet_name }}</td>
                                </tr>
                                @endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

		<div class="col-sm-12">
			<div class="card">
				<div class="card-header">
					<h5>Dompet Keluar</h5><span>Daftar transaksi dompet keluar.</span>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="display" id="table-dompet-keluar">
							<thead>
								<tr>
									<th>#</th>
									<th>{{ __('TANGGAL') }}</th>
									<th>{{ __('KODE') }}</th>
									<th>{{ __('DESKRIPSI') }}</th>
									<th>{{ __('KATEGORI') }}</th>
									<th>{{ __('NILAI') }}</th>
									<th>{{ __('DOMPET') }}</th>
								</tr>
							</thead>
							<tbody>
								@php 
                                    $no=1;
                                @endphp

                                @foreach($transaksi_keluar as $value)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $value->trx_date }}</td>
                                    <td>{{ $value->trx_code }}</td>
                                    <td>{{ $value->trx_description }}</td>
                                    <td>{{ $value->cat_name }}</td>
                                    <td>(-) {{ number_format($value->trx_value,0,'.') }}</td>
                                    <td>{{ $value->dompet_name }}</td>
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
<!-- Container-fluid Ends-->
@push('js')
<!-- DataTables -->
<script>
$(function () {
    $('#table-dompet-masuk').DataTable({
        'language' : {
            'url' : '/templates/backend/CyberFrostModernTheme/js/datatable/datatables/indonesia.json',
            'sEmptyTable' : 'Tidads'
        }
    });

	$('#table-dompet-keluar').DataTable({
        'language' : {
            'url' : '/templates/backend/CyberFrostModernTheme/js/datatable/datatables/indonesia.json',
            'sEmptyTable' : 'Tidads'
        }
    });
});
</script>
@endpush
@stop
