@extends('layouts.backend.app',[
	'title' => 'Tambah Dompet Masuk',
	'contentTitle' => 'Tambah Dompet Masuk',
])

@section('content')
<div class="container-fluid">        
	<div class="page-title">
		<div class="row">
			<div class="col-6">
				<h3>{{ __('Tambah Dompet Masuk') }}</h3>
			</div>
			<div class="col-6">
				<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('admin.index') }}">{{ __('Halaman Utama') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.dompet.index') }}">{{ __('Dompet') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.dompet.masuk.index') }}">{{ __('Masuk') }}</a></li>
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
                    
                    <form class="needs-validation" novalidate="" action="{{ route('admin.dompet.masuk.store') }}" method="POST" enctype="multipart/form-data">
					@csrf
                      <div class="row g-3 mb-3">
                        <div class="col-md-6">
							<label class="form-label" for="dompet_masuk_kode">{{ __('Kode') }}</label>
							<input class="form-control" type="text" id="dompet_masuk_kode" name="dompet_masuk_kode" value="{{ $data }}" placeholder="Nama" />
                        </div>

                        <div class="col-md-6">
							<label class="form-label" for="dompet_referensi">{{ __('Referensi') }}</label>
							<input class="form-control" type="text" id="dompet_referensi" name="dompet_referensi" value="{{ old('dompet_referensi') }}" placeholder="Referensi" />
                        </div>

						<div class="col-md-12">
							<label class="form-label" for="dompet_deskripsi">{{ __('Deskripsi') }}</label>
							<textarea class="form-control" type="text" id="dompet_deskripsi" name="dompet_deskripsi" placeholder="Deskripsi">{{ old('dompet_deskripsi') }}</textarea>
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