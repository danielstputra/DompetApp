@extends('layouts.backend.app',[
	'title' => 'Dompet Keluar',
	'contentTitle' => 'Kelola Dompet Keluar',
])

@section('content')
<div class="container-fluid">        
	<div class="page-title">
		<div class="row">
			<div class="col-6">
				<h3>{{ __('Dompet Keluar') }}</h3>
			</div>
			<div class="col-6">
				<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('admin.index') }}">{{ __('Halaman Utama') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.dompet.keluar.index') }}">{{ __('Dompet') }}</a></li>
				<li class="breadcrumb-item active">{{ __('Keluar') }}</li>
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
                    <div class="text-end">
                        <a class="btn btn-square btn-info mb-4" type="button" href="{{ route('admin.dompet.keluar.create') }}">{{ __('Buat Baru') }}</a>
                    </div>

					@include('flash-message')
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

                                @foreach($transaksi as $value)
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
	<!-- /.row -->
</div>
<!-- Container-fluid Ends-->
@push('js')
<!-- DataTables -->
<script>
$(function () {
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