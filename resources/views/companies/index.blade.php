@extends('layouts.app')

@section('content')
    <div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Companies</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('companies.create') }}"> Create New Company</a>
            </div>
        </div>
    </div>

    @if ($message = \Illuminate\Support\Facades\Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <br>

    <table class="display" id="Company_Table" border="1" width="100%">
        <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>E-mail</th>
            <th>Logo</th>
            <th>Website</th>
            <th width="280px">Action</th>
        </tr>
        </thead>
        <?php $i=1; ?>
        <tbody>
        @if(count($companies) == 0)
            <tr>
                <td colspan="6" style="text-align: center">There is no records.</td>
            </tr>
        @else
        @foreach ($companies as $company)
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $company->name }}</td>
                <td>{{ $company->email }}</td>
                <td>@if(isset($company->logo))<img src="{{ url('public/'.$company->logo) }}" width="50px" height="50px">@endif</td>
                <td>{{ $company->website }}</td>
                <td>
                    <form action="{{ route('companies.destroy',$company->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('companies.show',$company->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('companies.edit',$company->id) }}">Edit</a>

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
    {!! $companies->links() !!}
    </div>
    </div>
@endsection

@section('js')
<script type="text/javascript">
// $(document).ready( function () {
    // $('#Company_Table').DataTable();
// });
</script>
@endsection
