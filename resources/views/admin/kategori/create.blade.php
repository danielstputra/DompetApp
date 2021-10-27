@extends('layouts.backend.app',[
	'title' => 'Tambah Kategori',
	'contentTitle' => 'Tambah Kategori',
])

@section('content')
<div class="container-fluid">        
	<div class="page-title">
		<div class="row">
			<div class="col-6">
				<h3>{{ __('Tambah Kategori') }}</h3>
			</div>
			<div class="col-6">
				<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('admin.index') }}">{{ __('Halaman Utama') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.kategori.index') }}">{{ __('Kategori') }}</a></li>
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
                    
                    <form class="needs-validation" novalidate="" action="{{ route('admin.kategori.store') }}" method="POST" enctype="multipart/form-data">
					@csrf
                      <div class="row g-3 mb-3">
                        <div class="col-md-12">
							<label class="form-label" for="kategori_name">{{ __('Nama') }} <a style="color:red;">*</a></label>
							<input class="form-control" type="text" id="kategori_name" name="kategori_name" value="{{ old('kategori_name') }}" placeholder="Nama" />
                        </div>

						<div class="col-md-12">
							<label class="form-label" for="kategori_status">{{ __('Status') }}</label>
							<select class="form-select" id="kategori_status" name="kategori_status">
								@foreach($status as $value)
									<option value="{{ $value->status_id }}">{{ $value->status_name }}</option>
								@endforeach
							</select>
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