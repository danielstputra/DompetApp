@extends('layouts.backend.app',[
	'title' => 'Dompet',
	'contentTitle' => 'Management Dompet',
])
@push('css')

@endpush
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
                                <button class="btn btn-info dropdown-toggle" id="filters" name="filters" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Semua ({{ $dompets->count() }})</button>
                                <div class="dropdown-menu" aria-labelledby="filters">
                                    @foreach($status as $value)
                                        <a class="dropdown-item" href="#" id="filters{{ $value->status_id }}" name="filters{{ $value->status_id }}">{{ $value->status_name }} ({{ $dompets->where('dompet_status_id', $value->status_id)->count() }})</a>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="col-md-10">
                            <a class="btn btn-square btn-info mb-4" type="button" href="{{ route('admin.dompet.create') }}">{{ __('Buat Baru') }}</a>
                        </div>
                    </div>
                    
					<div class="table-responsive">
                        <table class="display table-dompet">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('NAMA') }}</th>
                                    <th>{{ __('REFERENSI') }}</th>
                                    <th>{{ __('DESKRIPSI') }}</th>
                                    <th>{{ __('STATUS') }}</th>
                                </tr>
                            </thead>
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
    var table = $('.table-dompet').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ route('admin.dompet.index') }}",
            data: function (d) {
                d.status = $('#status').val()
            }
        },
        columns: [
            {data: 'id ', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'reference', name: 'reference'},
            {data: 'description', name: 'description'},
            {data: 'status', name: 'status'},
        ]
    });
  
    $('#status').change(function(){
        table.draw();
    });
});
</script>
@endpush
@stop