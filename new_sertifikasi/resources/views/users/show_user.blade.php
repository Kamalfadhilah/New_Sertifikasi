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

<div class="row">
    <div class="col card">
        <!-- tabel pendaftaran -->
        <div class="container">
            <div class="tabel-pendaftaran">
                <div class="heading-tabel">
                    <div class="heading-tabel-keberangkatan">
                        <h1>Tabel User</h1>

                    </div>
                    <div class="body-tabel-pendaftaran" style="overflow-x: scroll;">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">...</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($user as $index => $item)
                                <tr>
                                    <th scope="row">{{ $index + 1 }}</th>
                                    <td>{{ $item->name}}</td>
                                    <td>{{ $item->email}}</td>
                                    <td>
                                        <a class="btn btn-dark" href="{{ url('users/detail_user/'. $item->user_id .'') }}" role="button">Detail</a>
                                        <a class="btn btn-dark" href="{{ url('users/edit_user/'. $item->user_id .'') }}" role="button">Edit</a>
                                        <a class="btn btn-dark" href="{{ url('users/destroy/'. $item->user_id .'') }}" role="button">Delete</a>
                                        
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection
