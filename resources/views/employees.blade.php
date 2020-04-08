  <table class="table">

    <thead>
      <tr>
        <th scope="col">Employee Id</th>
        <th scope="col">Full Name</th>
        <th scope="col">Email</th>
      </tr>
    </thead>

    @foreach($employees as $emp)
      <tbody>

        <tr>

          <th scope="row">{{ $emp->id }}</th>
          <td> {{ $emp->name }}</td>
          <td>{{ $emp->email }}</td>
          <td> 
          <a link rel="stylesheet" type="text/css" value="edit" href="employees/edit/{{$emp->id }}">edit</link>
         </td>

         <td> 
          <a link rel="stylesheet" type="text/css" value="edit" href="employees/delete/{{$emp->id }}">delete</link>
         </td>

        </tr>

      </tbody>
    @endforeach

  </table>

      {{ $employees->links() }}

