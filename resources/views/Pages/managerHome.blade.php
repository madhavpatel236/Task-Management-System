{{-- Task Management:   - CRUD operations for tasks.
   - Attributes: title, description, priority (low, medium, high), due date, status, assignees.
   - Managers assign tasks; Employees update status. --}}

{{-- {{ $currentUser['Name']}}
{{ $tasks}} --}}

<form method="post" action="{{ route('managers.store') }}">
    @csrf
    @forelse ($employees as $each)
        <label> Title: </label>
        <input name="title" id="title" class="title" />
        <span class="title_error"> </span> <br /> <br />

        <label for="description"> Description: </label>
        <textarea name="description" id="description" class="description" cols="20" rows="6">  </textarea>
        <span class="description_error"> </span> <br /> <br />

        <label> Priority: </label>
        <select id="priority" class="priority" name="priority">
            <option value=""> -- </option>
            <option value="low"> low </option>
            <option value="medium"> medium </option>
            <option value="high"> High </option>
        </select>
        <span class="priority_error"> </span> <br /> <br />

        <label> Due date: </label>
        <input type="date" id="due date" class="due date" name="due date" />
        <span class="due_date_error"> </span> <br /> <br />

        <label> Assignees: </label>
        <select id="assignees" class="assignees" name="assignees">
            <option value="{{ $each['Name'] }}"> {{ $each['Name'] }} </option>
        </select>
        <span class="assignees_error"> </span> <br /> <br />
        {{-- <input value="{{ $tasks[0]['manager_name'] }}" type="hidden" /> --}}
        <input name="manager_name" value="{{ $currentUser['Name'] }}" type="hidden" />
        <button class="add_task_btn" id="add_task_btn"> Add Task </button>
    @empty
        <strong> No employee found, please hire the employee first and then assign a task. </strong>
    @endforelse
</form>


@forelse ($tasks as $each)
    <table border="1">
        <thead>
            <td>Manager Name</td>
            <td>Title</td>
            <td>Description</td>
            <td>Priority</td>
            <td>Due date</td>
            <td>Assignees</td>
            <td>Status</td>
        </thead>

        <tbody>
            <tr>
                <td> {{ $each['manager_name'] }} </td>
                <td> {{ $each['title'] }} </td>
                <td> {{ $each['description'] }} </td>
                <td> {{ $each['priority'] }} </td>
                <td> {{ $each['due date'] }} </td>
                <td> {{ $each['assignees'] }} </td>
                <td> {{ $each['status'] }} </td>
            </tr>
        @empty
            <strong>
                No Task in spending...
            </strong>
@endforelse
</tbody>

</table>
