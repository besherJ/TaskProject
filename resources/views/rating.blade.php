
  <table class="table">

    <thead>
      <tr>
        <th scope="col">Full Name</th>
        <th scope="col">tasks assigned to this week</th>
      </tr>
    </thead>

    <div>
        
      @foreach($employees as $emp)
        <tbody>

          <tr>

            <td name='name'> {{ $emp->name }}</td>
            <td name='tasks '>{{ $emp->tasks }}</td>

          </tr>

        </tbody>
      @endforeach


  </table>

  {{ $employees->links() }}