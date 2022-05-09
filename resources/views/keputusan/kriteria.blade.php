@extends('layouts.template')
<!-- Plugin css for this page -->
<link rel="stylesheet" href="{{ asset('sky/vendors/select2/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('sky/vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}">

<!-- End plugin css for this page -->
@section('main')

<div class="container">
    <div class="row g-5">
        <div class="col-12">
            <div class>
                <div class="card-body">
                    <div class="card col-12 mt-5">
                        <div class="card-body">
                            <h3>Pembobotan Kriteria dengan Metode AHP</h3>
                            <div class="col-md-10">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <td>no</td>
                                            <td>kode</td>
                                            <td>Kriteria</td>
                                            <td>bobot</td>
                                        </tr>
                                    </thead>
                                    @foreach ($kriteria as $k)
                                    <tbody>
                                        <tr>
                                            <td>{{ $k->id }}</td>
                                            <td>{{ $k->code}}</td>
                                            <td>{{ $k->nama_kriteria  }}</td>
                                            <td><td>{{ $k->priority->prioritie }}</td></td>
                                        </tr>
                                    </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="col-12">
                                <div class="row">
                                    <table class="table">
                                        <form action="{{ route('kriteria.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf 
                                        
                                        <?php
                                            $kon = mysqli_connect("localhost", "root", "", "projek_cvsena");
                                            // query kriteria dan hitung jumlahnya
                                            $result = mysqli_query($kon,"SELECT * FROM kriterias");

                                            $kriteria = [];

                                            while($row = mysqli_fetch_assoc($result)){
                                            $kriteria[] = $row;
                                            }

                                            $n = count($kriteria);
                                            $urut = 0;

                                            for($x = 0; $x <= ($n - 2); $x++){
                                            for($y = ($x + 1); $y <= ($n - 1); $y++){
                                                $urut++;

                                            // query nilai perbandingan dari dua kriteria yg dilooping
                                            $query = "SELECT nilai FROM kriteria_comparisons WHERE
                                                        first_kriteria_id = ".$kriteria[$x]['id']." AND
                                                        second_kriteria_id = ".$kriteria[$y]['id']."";
                                            $result = mysqli_query($kon,$query);                               
                                        ?>
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="hidden" name="comparison[<?php echo $urut?>][first_kriteria_id]" value="<?php echo $kriteria[$x]['id']; ?>">
                                                        <label class="form-check-label" for="kriteria<?php echo $urut.$x; ?>"><?php echo $kriteria[$x]['nama_kriteria']; ?></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="hidden" name="comparison[<?php echo $urut?>][second_kriteria_id]" value="<?php echo $kriteria[$y]['id']; ?>">
                                                        <label class="form-check-label" for="kriteria<?php echo $urut.$y; ?>"><?php echo $kriteria[$y]['nama_kriteria']; ?></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <select name="comparison[<?php echo $urut?>][nilai]">
                                                            @foreach($rating as $r)
                                                            <option value="{{ $r->value }}">{{ $r->value }} {{ $r->caption }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php
                                                }
                                            }
                                        ?>
                                        
                                            <tr>
                                                <td>
                                                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                                </td>
                                            </tr>
                                        </form>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection