@extends('layouts.template')
@section('main')
<div class="container">
    <div class="col-12">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <div class="col-md-10">
                        <table>
                            <form>
                                <tbody>
                                @foreach($comparisons as $comparison)
                                <td><input nama></td>
                                @endforeach
                                </tbody>
                            </form>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection