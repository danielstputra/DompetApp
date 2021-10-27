@extends('layouts.backend.app',[
	'title' => 'Edit Kategori',
	'contentTitle' => 'Edit Kategori',
])

@section('content')
<div class="container-fluid">        
	<div class="page-title">
		<div class="row">
			<div class="col-6">
				<h3>{{ __('Edit Kategori') }}</h3>
			</div>
			<div class="col-6">
				<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('admin.index') }}">{{ __('Halaman Utama') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.kategori.index') }}">{{ __('Kategori') }}</a></li>
				<li class="breadcrumb-item active">{{ __('Edit') }}</li>
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
                    
                    <form class="needs-validation" novalidate="" action="{{ route('admin.kategori.update', $kategori->cat_id) }}" method="POST" enctype="multipart/form-data">
					@csrf
                    @method('PUT')
                      <div class="row g-3 mb-3">
                        <div class="col-md-6">
							<label class="form-label" for="kategori_name">{{ __('Nama') }} <a style="color:red;">*</a></label>
							<input class="form-control" type="text" id="kategori_name" name="kategori_name" value="{{ $kategori->cat_name }}" placeholder="Nama" />
                        </div>

						<div class="col-md-12">
							<label class="form-label" for="kategori_deskripsi">{{ __('Deskripsi') }} <a style="color:red;">*</a></label>
							<textarea class="form-control" type="text" id="kategori_deskripsi" name="kategori_deskripsi" placeholder="Deskripsi">{{ $kategori->cat_description }}</textarea>
                        </div>

						<div class="col-md-12">
							<label class="form-label" for="kategori_status">{{ __('Status') }} <a style="color:red;">*</a></label>
							<select class="form-select" id="kategori_status" name="kategori_status">
								@foreach($status as $value)
                                    <option value="{{ $value->status_id }}" {{ ($value->status_id == $kategori->cat_status_id) ? 'Selected' : ''}}>{{ $value->status_name }}</option>
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