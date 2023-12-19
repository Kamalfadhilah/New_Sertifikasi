@extends('dashboard.main')

@section('content')

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if (session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<div class="row" id="cetak">
    <div class="col card">
        <!-- tabel pendaftaran -->
        <div class="tabel-pendaftaran">
            <div class="container">
                <div class="heading-tabel">
                    <div class="heading-tabel-keberangkatan">
                        <h1 class="border-bottom border-dark mb-5">Detail User</h1>
                    </div>
                    <form action="{{url('users/update/'.$user->user_id)}}" method="post">
                      @csrf
                      @method('put')
                      <fieldset enabled>
                          <div class="mb-3">
                              <label for="name" class="form-label">Nama</label>
                              <input type="text" name="name" value="{{$user->name}}" class="form-control" id="name" required>
                          </div>
                          <div class="mb-3">
                              <label for="email" class="form-label">Alamat KTP</label>
                              <input type="email" name="email" value="{{$user->email}}" class="form-control" id="email" required>
                          </div>
                          <button class="btn btn-info waves-effect waves-light mb-4" type="submit">Update</button>

                      </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection
