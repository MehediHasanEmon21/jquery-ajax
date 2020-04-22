    <div class="table-responsive">
     <table class="table table-striped table-bordered">
      <tr>
       <th width="5%">ID</th>
       <th width="38%">Name</th>
       <th width="57%">Gender</th>
      </tr>
      @foreach($data as $row)
      <tr>
       <td>{{ $row->id }}</td>
       <td>{{ $row->name }}</td>
       <td>{{ $row->gender }}</td>
      </tr>
      @endforeach
     </table>

     {!! $data->links() !!}

    </div>