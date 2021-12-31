@extends('template.main')
@section('content')
    <div class="container-fluid pt-4">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    @if (session()->has('error'))
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-ban"></i> Gagal!</h5>
                        {{ session('error') }}</a>
                    </div>
                    @endif
                    <div class="card-header">
                      <h3 class="card-title">DataTable with default features</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>NIS</th>
                                <th>Gender</th>
                                <th>Kelas</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- {{ $users->count() }} --}}
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->nis }}</td>
                                <td>{{ $user->gender->gender }}</td>
                                <td>{{ $user->kelas->kelas }}</td>
                                <td colspan="2">
                                    <form action="/absen" method="post" class="row d-flex justify-content-center">
                                        @csrf
                                        @foreach($keterangan as $key)
                                        <div class="col-3">
                                            <button name="keterangan" value="{{ $key->id }}">{{ $key->keterangan }}</button>
                                        </div>
                                        @endforeach
                                        <div class="col-2">
                                            <input type="number" hidden value="{{ $user->id }}" name="id">
                                        </div>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                          <th>Rendering engine</th>
                          <th>Browser</th>
                          <th>Platform(s)</th>
                          <th>Engine version</th>
                          <th>CSS grade</th>
                        </tr>
                        </tfoot>
                      </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
@endsection