 
      @foreach($products as $row)
      <tr>
       <td>{{ $row->id}}</td>
       <td>{{ $row->product_name }}</td>
      </tr>
      @endforeach
      <tr>
       <td colspan="2" align="center">
        {!! $products->links() !!}
       </td>
      </tr>