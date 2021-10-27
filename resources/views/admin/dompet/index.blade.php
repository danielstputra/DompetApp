@extends('layouts.backend.app',[
	'title' => 'Dompet',
	'contentTitle' => 'Management Dompet',
])

@section('content')
<div class="container-fluid">        
	<div class="page-title">
		<div class="row">
			<div class="col-6">
				<h3>{{ __('Dompet') }}</h3>
			</div>
			<div class="col-6">
				<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('admin.index') }}">{{ __('Halaman Utama') }}</a></li>
				<li class="breadcrumb-item active">{{ __('Dompet') }}</li>
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
                            <a class="btn btn-square btn-info mb-4" type="button" href="{{ route('admin.dompet.create') }}">{{ __('Buat Baru') }}</a>
                        </div>
                    </div>
                    
					<div class="table-responsive">
                        <table class="display" id="table-dompet">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('NAMA') }}</th>
                                    <th>{{ __('REFERENSI') }}</th>
                                    <th>{{ __('DESKRIPSI') }}</th>
                                    <th>{{ __('STATUS') }}</th>
                                    <th>{{ __('AKSI') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php 
                                    $no=1;
                                @endphp

                                @foreach($dompets as $value)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td style="font-weight: 600;">{{ $value->name }}</td>
                                    <td>{{ $value->reference }}</td>
                                    <td>{{ $value->description }}</td>
                                    <td>{{ $value->status_name }}</td>
                                    <td>Dompet Utama</td>
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
@stop