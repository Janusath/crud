@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-2 col-sm-12 col-lg-2"></div>
        <div class="col-md-8 col-sm-12 col-lg-8">
            @if ($msg = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ $msg }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @elseif($msg = Session::get('fail'))
                <div class="alert alert-danget alert-dismissible fade show" role="alert">
                    <strong>{{ $msg }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card p-3">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-6 mt-3">
                            <div class="pull-right mb-2">
                                <a class="btn btn-success" href="{{ route('create') }}">+ Add User</a>
                                &nbsp;
                                <a class="btn btn-info" href="{{ route('export') }}">Export</a>
                                &nbsp;
                                <a class="btn btn-warning" href="{{ route('import.view') }}">Import</a>
                            </div>
                        </div>
                        <div class="col-lg-6 mt-3">
                            <div class="pull-left mb-2">
                                <h2>laravel import export </h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Sr. No.</th>
                            <th>Username</th>
                            <th>Profile</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>

                        @forelse($users as $key=>$u)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $u->name }}</td>
                                <td><img src="{{ url('/') }}/{{ $u->profile }}" class="img img-thumbnail"
                                        width="100" /></td>
                                <td>{{ $u->email }}</td>
                                <td>
                                    <a class="btn btn-sm btn-info" href="{{ route('edit', $u->id) }}">Edit</a>
                                    &nbsp;<a class="btn btn-sm btn-success"  onclick="view({{$u->id}} , '{{route('view',$u->id)}}')" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view"  >View</a>
                                    &nbsp;<a class="btn btn-sm btn-danger" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#delete" onclick="setId({{$u->id}})" >Delete</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <th colspan="4" class="text-center p-3">No User Found!!</th>
                            </tr>
                        @endforelse
                    </table>

                    {{ $users->links() }}
                </div>
            </div>
        </div>
        <div class="col-md-2 col-sm-12 col-lg-2"></div>
    </div>
  @include('view')
  @include('delete')
    <script>
        function view(id,url)
        {
            $('#table').hide();
            $('#spinner').show();
            $.ajax({
             url:url,
             type:"GET",
             data:{id:id},
             success:function(data)
             {
                $.each(data,function(index,item){
                    $('#profile').attr("src","{{url('/')}}/"+item.profile);
                    $('#user').text(item.name);
                    $('#email').text(item.email);
                });
            $('#table').show();
            $('#spinner').hide();
             },
             error:function(data)
             {
                console.log(data);
             }
            });
        }

        //set delete user id

        function setId(id)
        {
            $('#delete_id').attr('value','');
            $('#delete_id').attr('value',id);

        }

        function deleteUser(){
            var id =  $('#delete_id').val();

            $.ajax({
             url:'{{url("/")}}/delete-user/'+id,
             type:"GET",
             data:{id:id},
             success:function(data)
             {

               alert(data.msg);
               location.reload();
             },
             error:function(data)
             {
                console.log(data);
             }
            });
        }
        </script>
@endsection
