@can('update post')
<button class="btn btn-sm btn-outline-info" title="Edit" onclick="edit({{ $idpost }})">
    <i class="fa fa-edit"></i>
</button>
@endcan
@can('delete post')
    <button class="btn btn-sm btn-outline-danger" onclick="destroy('{{ route('posts.destroy', $idpost) }}', '#table', false)">
        <i class="fa fa-trash"></i>
    </button>
@endcan
