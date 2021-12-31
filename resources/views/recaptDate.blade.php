@extends('template.main')
@section('content')
<div class="container-fluid pt-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">DataTable with default features</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="row mb-3">
                    @foreach ($dates as $date)
                    <div class="col-2">
                      <a href="/absen/{{ $date->date }}/{{ $parameter }}" class="btn btn-outline-dark @if($title == $date->date) active @endif">{{ $date->date }}</a>
                    </div>
                    @endforeach
                  </div>
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
                        @foreach ($recapts as $recapt)
                        <tr>
                            <td>{{ $recapt->name }}</td>
                            <td>{{ $recapt->nis }}</td>
                            <td>{{ $recapt->keterangan }}</td>
                            <td>{{ $recapt->date }}</td>
                            <td>{{ $recapt->description }} | <a href="/edit/recapt/{{ $recapt->id }}">Edit</a></td>
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