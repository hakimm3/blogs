@extends('layouts.app_beckend')
@section('content')
    <x-admin.layout-component>
        @slot('pageHeader')
            Dashboard
        @endslot
        @slot('breadcrumb')
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        @endslot
        @slot('content')
            <x-admin.box-component>
                @slot('boxHeader')
                    Dashboard
                @endslot
                @slot('boxBody')
                    <div class="row">
                        <div class="col-12 mt-4">
                            <div class="card">
                                <div class="card-body">
                                    <form action="" method="get">
                                        <div class="row">
                                            <div class="col-md-3 mb-3">
                                                <input type="text" id="date" name="date" class="form-control">
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <button class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endslot
            </x-admin.box-component>
        @endslot
    </x-admin.layout-component>
@endsection
