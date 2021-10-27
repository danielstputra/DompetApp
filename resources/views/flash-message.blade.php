@if ($customMessages = Session::get('success_transaction'))
<div class="alert alert-info" role="alert">
    <h4 class="alert-heading">Berhasil!</h4>
    @foreach($customMessages as $key => $value)
    <p><b>Pesanan Anda akan diproses 1x24 jam hingga pembayaran Anda masuk.</b></p><br />
    <p><b>No. Rekening : </b>{{ $value['pay_number'] }}</p>
    <p><b>Atas Nama : </b>{{ $value['pay_pemilik'] }}</p>
    <p><b>Nominal Yang Dibayarkan : </b>{{ $value['pay_name'] }}</p>
    <p><b>Nama Bank : </b>{{ $value['total'] }}</p><br />
    <p><b>Note : </b>Sebelum melakukan transfer ke rekening diatas, pastikan data Anda benar!</p>
    @endforeach
    <hr>
    <p class="mb-0">Jika ada pertanyaan lainnya, kalian bisa hubungi customer service kami di <a href="" style="color:yellow;"><b>cs@local.host</b></a>.</p>
</div>
@endif

@if ($message = Session::get('success'))
<div class="alert alert-success" role="alert">
    <h4 class="alert-heading">Berhasil!</h4>
    <p>{{ $message }}</p>
    <hr>
    <p class="mb-0">Jika ada pertanyaan lainnya, kalian bisa hubungi customer service kami di cs@local.host.</p>
</div>
@endif
  
@if ($message = Session::get('error'))
<div class="alert alert-danger" role="alert">
    <h4 class="alert-heading">Kesalahan!</h4>
    <p>{{ $message }}</p>
    <hr>
    <p class="mb-0">Jika ada pertanyaan lainnya, kalian bisa hubungi customer service kami di cs@local.host.</p>
</div>
@endif
   
@if ($message = Session::get('warning'))
<div class="alert alert-warning" role="alert">
    <h4 class="alert-heading">Peringatan!</h4>
    <p>{{ $message }}</p>
    <hr>
    <p class="mb-0">Jika ada pertanyaan lainnya, kalian bisa hubungi customer service kami di cs@local.host.</p>
</div>
@endif
   
@if ($message = Session::get('info'))
<div class="alert alert-info" role="alert">
    <h4 class="alert-heading">Informasi!</h4>
    <p>{{ $message }}</p>
    <hr>
    <p class="mb-0">Jika ada pertanyaan lainnya, kalian bisa hubungi customer service kami di cs@local.host.</p>
</div>
@endif
  
@if ($errors->any())
<div class="alert alert-danger" role="alert">
    <h4 class="alert-heading">Kesalahan!</h4>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    <hr>
    <p class="mb-0">Jika ada pertanyaan lainnya, kalian bisa hubungi customer service kami di cs@local.host.</p>
</div>
@endif
