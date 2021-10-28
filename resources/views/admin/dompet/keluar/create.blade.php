@extends('layouts.backend.app',[
	'title' => 'Tambah Dompet Keluar',
	'contentTitle' => 'Tambah Dompet Keluar',
])

@section('content')
<div class="container-fluid">        
	<div class="page-title">
		<div class="row">
			<div class="col-6">
				<h3>{{ __('Tambah Dompet Keluar') }}</h3>
			</div>
			<div class="col-6">
				<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('admin.index') }}">{{ __('Halaman Utama') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.dompet.index') }}">{{ __('Dompet') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.dompet.keluar.index') }}">{{ __('Keluar') }}</a></li>
				<li class="breadcrumb-item active">{{ __('Tambah') }}</li>
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
                    
                    <form class="needs-validation" novalidate="" action="{{ route('admin.dompet.keluar.store') }}" method="POST" enctype="multipart/form-data">
					@csrf
                      <div class="row g-3 mb-3">
                        <div class="col-md-2">
							<label class="form-label" for="dompet_keluar_kode">{{ __('Kode') }}</label>
							<input class="form-control" type="text" id="dompet_keluar_kode" name="dompet_keluar_kode" value="{{ $data }}" readonly="true" placeholder="Kode" />
                        </div>

                        <div class="col-md-2">
							<label class="form-label" for="dompet_keluar_tanggal">{{ __('Tanggal') }}</label>
							<input class="form-control" type="text" id="dompet_keluar_tanggal" name="dompet_keluar_tanggal" value="{{ date('Y-m-d') }}" readonly="true" placeholder="Tanggal" />
                        </div>

						<div class="col-md-3">
							<label class="form-label" for="dompet_keluar_kategori">{{ __('Kategori') }}</label>
							<select class="form-select" id="dompet_keluar_kategori" name="dompet_keluar_kategori">
								@foreach($kategori as $value)
									<option value="{{ $value->cat_id }}">{{ $value->cat_name }}</option>
								@endforeach
							</select>
						</div>

                        <div class="col-md-3">
							<label class="form-label" for="dompet_keluar_dompet">{{ __('Dompet') }} <a style="color:red;">*</a></label>
							<select class="form-select" id="dompet_keluar_dompet" name="dompet_keluar_dompet">
								@foreach($dompet as $value)
									<option value="{{ $value->dompet_id }}">{{ $value->dompet_name }}</option>
								@endforeach
							</select>
						</div>

                        <div class="col-md-2">
							<label class="form-label" for="dompet_keluar_nilai">{{ __('Nilai') }} <a style="color:red;">*</a></label>
							<input class="form-control" type="number" id="dompet_keluar_nilai" name="dompet_keluar_nilai" value="0" placeholder="00000000" />
                        </div>

                        
						<div class="col-md-12">
							<label class="form-label" for="dompet_keluar_deskripsi">{{ __('Deskripsi') }} <a style="color:red;">*</a></label>
							<textarea class="form-control" type="text" id="dompet_keluar_deskripsi" name="dompet_keluar_deskripsi" placeholder="Deskripsi">{{ old('dompet_keluar_deskripsi') }}</textarea>
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