@extends('layouts.app_beckend')
@section('content')
    <x-admin.layout-component>
        @slot('pageHeader')
            Posts
        @endslot
        @slot('breadcrumb')
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Posts</li>
        @endslot
        @slot('content')
            <x-admin.box-component>
                @slot('boxHeader')
                   @can('create post')
                   <button class="btn btn-outline-primary my-2 btn-sm" onclick="create()">Create</button>
                   @endcan
                @endslot
                @slot('boxBody')
                    <x-admin.server-side-datatable-component id="table">
                        @slot('columns')
                           <th>Title</th>
                           <th>Content</th>
                           <th>Date</th>
                            <th>Author</th>
                        @endslot
                    </x-admin.server-side-datatable-component>
                @endslot
            </x-admin.box-component>
        @endslot
    </x-admin.layout-component>

    <x-admin.modal-component id="modal-form">
        @slot('modalTitle')
            Create Post
        @endslot
        @slot('modalBody')
            <form action="" id="form" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" name="title" id="title" class="form-control" placeholder="title">
                </div>
                <div class="form-group">
                    <label for="">Content</label>
                    <textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="">Date</label>
                    <input type="datetime-local" name="date" id="date" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Author</label>
                    <select name="iduser" id="iduser" class="form-control">
                        <option value="">--Select Author --</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <input type="hidden" name="id" id="id">
            </form>
        @endslot
    </x-admin.modal-component>
@endsection

@push('css')
    {{-- select 2 --}}
    <link rel="stylesheet" href="{{ asset('asset_template/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset_template/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endpush

@push('js')
    @include('admin.post.script')
@endpush
