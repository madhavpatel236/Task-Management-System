<form id="admin_form" method="POST" action="{{ route('admin.store') }}">
    @csrf
    <label> Name: </label>
    <input id="name" class="name" name="name" />
    <span id="name_error" class="name_error"></span> <br /> <br />

    <label> Email: </label>
    <input id="email" class="email" name="email" />
    <span id="email_error" class="email_error"></span> <br /> <br />

    <label class="password" for="password"> Password: </label>
    <input id="password" class="password" name="password" type="password" />
    <span id="password_error" class="password_error"></span> <br class="password" /> <br class="password" />

    <label> Role: </label>
    <select id="role" name="role" class="role">
        <option value="manager">Manager</option>
        <option value="employee">Employee</option>
    </select>
    <span id="role_error" class="role_error"></span> <br /> <br />

    <button id="submit_btn"> Submit </button>
</form>


<table border="2">
    <thead>
        {{-- <th>No.</th> --}}
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Action</th>
    </thead>
    <tbody id="table_body">
        {{-- {{ $users }} --}}
        @foreach ($users as $eachUser)
            <tr>
                {{-- <td>  </td> --}}
                <td>{{ $eachUser['Name'] }}</td>
                <td>{{ $eachUser['Email'] }}</td>
                <td>{{ $eachUser['Role'] }}</td>
                <td>
                    <a href="{{ route('admin.edit', $eachUser->id) }}"> Edit </a>
                    <form onsubmit="return confirm('Sure are you want to delete the user?')"
                        action="{{ route('admin.destroy', $eachUser->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button onclick="">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>



{{-- {{ $users }}
@foreach ($users as $eachUser)
    <tr>
        <td> {{ $eachUser['Name'] }} </td>
    </tr>
@endforeach --}}


{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> --}}

{{-- <script>
    function editUser(Id) {
        let editUrl = '{{ route('admin.edit', ['admin' => 'id']) }}'.replace(
            'id', Id);

        $.ajax({
            url: editUrl,
            type: 'get',
            success: function(res) {
                // console.log(res);
                $('#admin_form :input').prop('disabled', true);
                $('#admin_form').hide();
                $('#update_form').show();
                $('.new_name').val(res['Name']);
                $('.new_email').val(res['Email']);
                $('.new_role').val(res['Role']);
                $('#update_btn').attr('value', res['id']);
            }
        })
    };


    $('#update_btn').on('click', function(e) {
        e.preventDefault();
        var Id = $('#update_btn').val();
        let updateUrl = '{{ route('admin.update', ['admin' => 'id']) }}'.replace(
            'id', Id);

        $.ajax({
            url: updateUrl,
            type: 'put',
            success: function(res) {
                console.log(res);
            }
        })
    })




    // $(document).ready(function() {
    // getAllUser();
    // $(".edit_form").submit(function(e) {
    //     e.preventDefault();
    //     var id = $('edit_id').val();
    //     alert(id);
    // })

    // $('#admin_form').on('submit', function(e) {
    //     e.preventDefault();
    //     var formData = [
    //         'name' => $('#name').val();
    //         'email' => $('#email').val();
    //         'password' => $('#password').val();
    //         'role' => $('#role').val();
    //     ];

    //     $.ajax({
    //         url: '{{ route('admin.store') }}',
    //         type: 'post',
    //         data: formData,
    //         success: function(res) {
    //             alert(res);
    //         }
    //     })
    // });

    // })



    // function getAllUser() {
    //     $.ajax({
    //         url: '{{ route('admin.index') }}',
    //         type: 'get',
    //         data: {},
    //         success: function(res) {
    //             // alert(res);
    //         }
    //     })
    // }
</script> --}}
