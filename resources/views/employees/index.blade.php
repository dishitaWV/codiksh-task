@extends('layouts.app')

@section('content')
    <div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Employees</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('employees.create') }}"> Create New Employee</a>
            </div>
        </div>
    </div>

    @if ($message = \Illuminate\Support\Facades\Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <br>

    <table class="display" id="Emp_Table" border="1" width="100%">
        <thead>
        <tr>
            <th>No</th>
            <th>Full Name</th>
            <th>E-mail</th>
            <th>Company</th>
            <th>Phone</th>
            <th width="280px">Action</th>
        </tr>
        </thead>
        <?php $i=1; ?>
        <tbody>
        @if(count($employees) == 0)
            <tr>
                <td colspan="6" style="text-align: center">There is no records.</td>
            </tr>
        @else
        @foreach ($employees as $employee)
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $employee->first_name }} {{ $employee->last_name }}</td>
                <td>{{ $employee->email }}</td>
                <td>{{ isset($employee->company) ? $employee->company_data->name : '' }}</td>
                <td>{{ $employee->phone }}</td>
                <td>
                    <form action="{{ route('employees.destroy',$employee->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('employees.show',$employee->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('employees.edit',$employee->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            <?php $i++; ?>
        @endforeach
        @endif
        </tbody>
    </table>

    <br>

    <div style="float: right">
    {!! $employees->links() !!}
    </div>
    </div>
@endsection

@section('js')
<script type="text/javascript">
// $(document).ready( function () {
//     $('#Emp_Table').DataTable();
// });
</script>
@endsection
