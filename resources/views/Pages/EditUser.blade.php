<form id="update_form" method="POST" action="{{ route('admin.update', $user->id) }}">
    @csrf
    @method('PUT')
    <label> Name: </label>
    <input class="name" name="name" value="{{ $user['Name'] }}" />
    <span class="name_error"></span> <br /> <br />

    <label> Email: </label>
    <input class="email" name="email" value="{{ $user['Email'] }}" />
    <span class="email_error"></span> <br /> <br />

    <label> Role: </label>
    <select name="role" class="role" value="{{ $user['Role'] }}">
        <option value="manager">Manager</option>
        <option value="employee">Employee</option>
    </select>
    <span class="role_error"></span> <br /> <br />

    <button id="update_btn"> Update </button>
</form>
