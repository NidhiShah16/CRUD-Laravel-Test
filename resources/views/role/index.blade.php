<html>
    <head>
        <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script type="text/javascript" src="{{ asset('jquery-3.4.1.js')}}"></script>
        <script type="text/javascript" src="{{ asset('jquery.dataTables.js')}}"></script>
        <link rel="stylesheet" type="text/css" href="{{ asset('jquery.dataTables.css')}}"/>
        <script>
            $(document).ready(function(){
                $('#myTable').DataTable();
            });
        </script>
    </head>

    <body>
        <table align='center' border='2' id="myTable">
            <tr>
                <td colspan='3'><h2 align='center'>Role List</h2></td>
            </tr>
            <tr>
                <td colspan='3'><center><a href="{{route('role.create')}}"><i class="fa fa-plus" aria-hidden="true"></i>
                    </a></center></td>
            </tr>
            <tr>
                <th><h3>Role</h3></th>
                <th><h3>Edit</h3></th>
                <th><h3>Delete</h3></th>
            </tr>
            
            @foreach($rolearray as $role)
                <tr>
                    <td align='center'>{{$role->role}}</td>
                    <td><center><a href="{{ route('role.edit',$role->role_id) }}">Edit</a></center></td>
                    <td>
                        <form action="{{ route('role.destroy',$role->role_id)}}" method='post'>
                            @csrf
                            @method('DELETE')
                            <center><button type="submit" class='button'>Delete</button></center>
                        </form>
                    </td>
                </tr>
            @endforeach


        </table>
    </body>
</html>