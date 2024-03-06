@extends('app')

@section('content')
    <h1>Data Table</h1>

    <table id="data-table" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>

    <button id="export-pdf">Export to PDF</button>

    @push('scripts')
        <script>
           $(document).ready(function() {
    var jsonData = {!! json_encode($jsonData) !!};

    $('#data-table').DataTable({
        data: jsonData,
        columns: [
            { data: 'name' },
            { data: 'email' },
            { data: 'status' }
        ]
    });

    $('#export-pdf').click(function() {
        console.log('click')
        var data = JSON.stringify($('#data-table').DataTable().data().toArray());
        $.ajax({
            url: "{{ route('data-table.export-pdf') }}",
            method: 'POST',
            data: { data: data },
            success: function(response) {
                console.log(response.message);
            },
            error: function(error) {
                console.error(error);
            }
        });
    });
});

        </script>
    @endpush
@endsection
