@extends('layouts.backend.app',[
	'title' => 'Kategori',
	'contentTitle' => 'Management Kategori',
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
				<li class="breadcrumb-item active">{{ __('Kategori') }}</li>
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
                    <div class="col text-end">
                        <a class="btn btn-square btn-info mb-4" type="button" href="{{ route('admin.dompet.create') }}">{{ __('Buat Baru') }}</a>
                        <div style="float:right;">
                            <select id="status_filter" class="form-select">
                                <option value="0">Semua ({{ $kategori->count() }})</option>
                                @foreach($status as $value)
                                <option value="{{ $value->status_id }}">{{ $value->status_name }} ({{ $kategori->where('cat_status_id', $value->status_id)->count() }})</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
					@include('flash-message')
					<div class="table-responsive">
                        <table class="display table-dompet">
                            <thead>
                                <tr>
                                    <th>{{ __('#') }}</th>
                                    <th>{{ __('NAMA') }}</th>
                                    <th>{{ __('DESKRIPSI') }}</th>
                                    <th>{{ __('STATUS') }}</th>
                                    <th>{{ __('AKSI') }}</th>
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
    var table = $('.table-kategori').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ route('admin.kategori.index') }}",
            data: function (d) {
                d.statusCode = $('#status_filter').val(),
                d.search = $('input[type="search"]').val()
            }
        },
        columns: [
            {data: 'cat_id', name: 'cat_id'},
            {data: 'cat_name', name: 'cat_name'},
            {data: 'cat_description', name: 'cat_description'},
            {data: 'cat_status_id', name: 'dompet_status_id'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
  
    $('#status_filter').change(function(){
        table.draw();
    });
});
</script>
@endpush
@stop