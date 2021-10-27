@extends('layouts.backend.app',[
	'title' => 'Dompet Keluar',
	'contentTitle' => 'Management Dompet Keluar',
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
                <li class="breadcrumb-item"><a href="{{ route('admin.dompet') }}">{{ __('Dompet') }}</a></li>
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
					@include('flash-message')
                    
                    <div class="row">
                        <div class="col-md-2">
                            <div class="btn-group" role="group">
                                <button class="btn btn-info dropdown-toggle" id="btnGroupVerticalDrop1" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Semua (4)</button>
                                <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">
                                    <a class="dropdown-item" href="#">Aktif (3)</a>
                                    <a class="dropdown-item" href="#">Tidak Aktif (1)</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-10">
                            <a class="btn btn-square btn-info mb-4" type="button" href="#">{{ __('Buat Baru') }}</a>
                        </div>
                    </div>
                    
					<div class="table-responsive">
                        <table class="display" id="table-dompet">
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
                                <tr>
                                    <td>1</td>
                                    <td>2021-10-27</td>
                                    <td>WOUT00000001</td>
                                    <td>Bayar Kos</td>
                                    <td>Pengeluaran</td>
                                    <td>(-) 500.000</td>
                                    <td>Dompet Utama</td>
                                </tr>
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
@stop