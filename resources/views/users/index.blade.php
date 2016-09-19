@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    	<div class="col-md-12">
    		{{ $users->links() }}
    			<div class="table-responsive">
    				<table class="table table-hover">
    					<thead>
                            <tr>
                                <th>Name</th>
    							<th>E-mail</th>
    						</tr>
    					</thead>
    					<tbody>
    						@foreach($users as $user)
    							<tr>
                                    <td>{{ $user->name }}</td>
	    							<td>{{ $user->email }}</td>
	    						</tr>
    						@endforeach
    					</tbody>
    				</table>
    			</div>
    		{{ $users->links() }}
    	</div>
    </div>
</div>
@endsection