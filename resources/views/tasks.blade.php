<table class="table">

  <thead>
    <tr>
      <th scope="col">Task Name</th>
      <th scope="col">Start Time</th>
      <th scope="col"> End Time</th>
    </tr>
  </thead>

  @foreach($tasks as $task)
    <tbody>

      <tr>

        <td> {{ $task->name }}</td>
        <td> {{ $task->start_time }} </td>
        <td> {{ $task->end_time }} </td>
        <td><a href="edit/{{ $task->id }}">assign time</a>
      </tr>

    </tbody>
  @endforeach


</table>

    {{ $tasks->links() }}