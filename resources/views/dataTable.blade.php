@extends('app')

@section('content')
<style>
    .active {
        color: green;
    }
    .inactive {
        color: red;
    }
</style>

<button id="printButton" class="btn btn-primary m-2">Print PDF</button>
    <table id="myDataTable" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script>
        var $ = jQuery.noConflict()
        $(document).ready(function() {
            $('#myDataTable').DataTable({
    processing: true,
    serverSide: true,
    ajax: '{{ url('users') }}',
    columns: [
      { data: 'name' },
      { data: 'email' },
      {
                    data: 'status',
                    render: function(data, type, row) {
                        // Add a class based on the status value
                        return '<span class="' + (data ? 'active' : 'inactive') + '">' + (data ? 'Active' : 'Inactive') + '</span>';
                    }
    }
    ]
  });

  $('#printButton').click(function() {
        window.location.href = '{{ url('users/pdf') }}';
    });
});
</script>
  
@endsection
