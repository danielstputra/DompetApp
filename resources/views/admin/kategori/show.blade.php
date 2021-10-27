@extends('layouts.backend.app',[
	'title' => 'Tampil Kategori',
	'contentTitle' => 'Tampil Kategori',
])

@section('content')
<div class="container-fluid">        
	<div class="page-title">
		<div class="row">
			<div class="col-6">
				<h3>{{ __('Tampil Kategori') }}</h3>
			</div>
			<div class="col-6">
				<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('admin.index') }}">{{ __('Halaman Utama') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.kategori.index') }}">{{ __('Kategori') }}</a></li>
				<li class="breadcrumb-item active">{{ __('Tampil') }}</li>
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
                        <a class="btn btn-square btn-info mb-4" type="button" href="{{ route('admin.kategori.index') }}">{{ __('Kelola Kategori') }}</a>
                    </div>

                    <div class="table-responsive" id="table">
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <td><h6 class="p-2 mb-0">NAMA</h6></td>
                                    <td><p class="m-0">{{ $kategori->cat_name }}</p></td>
                                </tr>
                                <tr>
                                    <td><h6 class="p-2 mb-0">DESKRIPSI</h6></td>
                                    <td><p class="m-0">{{ $kategori->cat_description }}</p></td>
                                </tr>
                                <tr>
                                    <td><h6 class="p-2 mb-0">STATUS</h6></td>
                                    @if ($kategori->cat_status_id == 1)
                                        <td><p class="m-0">{{ __('Aktif') }}</p></td>
                                    @elseif ($kategori->cat_status_id == 2)
                                        <td><p class="m-0">{{ __('Aktif') }}</p></td>
                                    @else
                                        <td><p class="m-0">{{ __('-') }}</p></td>
                                    @endif
                                </tr>
                                <tr>
                                    <td><h6 class="p-2 mb-0">TANGGAL DIBUAT</h6></td>
                                    <td><p class="m-0">{{ $kategori->created_at }}</p></td>
                                </tr>
                                <tr>
                                    <td><h6 class="p-2 mb-0">TANGGAL DIUBAH</h6></td>
                                    <td><p class="m-0">{{ $kategori->updated_at }}</p></td>
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