@can('update user')
<button class="btn btn-sm btn-outline-info" title="Edit" onclick="edit({{ $id }})">
    <i class="fa fa-edit"></i>
 </button>
@endcan
 
 @can('delete user')
 <button class="btn btn-sm btn-outline-danger" onclick="destroy('{{ route('users.destroy', $id) }}', '#table', false)">
     <i class="fa fa-trash"></i>
  </button>
 @endcan
  