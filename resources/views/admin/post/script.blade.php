@include('utils.create')
@include('utils.store')
@include('utils.destroy')

{{-- select2 --}}
<script src="{{ asset('asset_template/plugins/select2/js/select2.min.js') }}"></script>

<script>
    function create() {
        setCreate('#modal-form', '#form')
    }

    function store(){
        let url = "{{ route('posts.store') }}"
        let method = "POST"
        let formData = new FormData($('#form')[0])
        let isServerSide = true
        procesStore(url, method, formData, "#modal-form", "#btn-save", "#table", isServerSide)
    }

    function edit(id){
        $('.modal-title').text('Edit User')
        $('#modal-form ').modal('show')
        $('#form').trigger('reset')

        $.ajax({
            url: "{{ route('posts.edit', ':id') }}".replace(':id', id),
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('#id').val(data.idpost)
                $('#title').val(data.title)
                $('#content').val(data.content)
                $('#date').val(data.date)
                $('#iduser').val(data.iduser).trigger('change')

            },
            error: function() {
                Swal.fire({
                    title: 'Error!',
                    text: 'Data not found!',
                    icon: 'error',
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true,
                })
            }
        })
    }
</script>
<script>
    let table = $('#table').DataTable({
        responsive: true,
        autoWidth: false,
        serverSide: true,
        ajax: '',
        columns: [{
                data: 'DT_RowIndex',
                orderable: false,
                searchable: false
            },
            {
                data: 'title',
                name: 'title',
            },
            {
                data: 'content',
                name: 'content'
            },
            {
                data: 'date',
                name: 'date'
            },
            {
                data: 'user.name',
                name: 'user.name'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false,

            }
        ]
    })

</script>
