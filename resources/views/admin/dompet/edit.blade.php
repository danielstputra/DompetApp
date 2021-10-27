@extends('layouts.backend.app',[
	'title' => 'Edit Dompet',
	'contentTitle' => 'Edit Dompet',
])

@section('content')
<div class="container-fluid">        
	<div class="page-title">
		<div class="row">
			<div class="col-6">
				<h3>{{ __('Edit Dompet') }}</h3>
			</div>
			<div class="col-6">
				<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('admin.index') }}">{{ __('Halaman Utama') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.dompet.index') }}">{{ __('Dompet') }}</a></li>
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
                    
                    <form class="needs-validation" novalidate="" action="{{ route('admin.dompet.update', $dompet->dompet_id) }}" method="POST" enctype="multipart/form-data">
					@csrf
                    @method('PUT')
                      <div class="row g-3 mb-3">
                        <div class="col-md-6">
							<label class="form-label" for="dompet_name">{{ __('Nama') }} <a style="color:red;">*</a></label>
							<input class="form-control" type="text" id="dompet_name" name="dompet_name" value="{{ $dompet->dompet_name }}" placeholder="Nama" />
                        </div>

                        <div class="col-md-6">
							<label class="form-label" for="dompet_referensi">{{ __('Referensi') }} <a style="color:red;">*</a></label>
							<input class="form-control" type="text" id="dompet_referensi" name="dompet_referensi" value="{{ $dompet->dompet_reference }}" placeholder="Referensi" />
                        </div>

						<div class="col-md-12">
							<label class="form-label" for="dompet_deskripsi">{{ __('Deskripsi') }} <a style="color:red;">*</a></label>
							<textarea class="form-control" type="text" id="dompet_deskripsi" name="dompet_deskripsi" placeholder="Deskripsi">{{ $dompet->dompet_description }}</textarea>
                        </div>

						<div class="col-md-12">
							<label class="form-label" for="dompet_status">{{ __('Status') }} <a style="color:red;">*</a></label>
							<select class="form-select" id="dompet_status" name="dompet_status">
								@foreach($status as $value)
                                    <option value="{{ $value->status_id }}" {{ ($value->status_id == $dompet->dompet_status_id) ? 'Selected' : ''}}>{{ $value->status_name }}</option>
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