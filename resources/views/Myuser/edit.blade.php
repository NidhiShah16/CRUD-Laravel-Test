<html>
    <head>
        <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script type="text/javascript" src="{{ asset('jquery-3.4.1.js')}}"></script>
        <script type="text/javascript" src="{{ asset('additional-methods.js')}}"></script>
        <script type="text/javascript" src="{{ asset('jquery.validate.js')}}"></script>
        <script>
            $(document).ready(function(){
                $("#myForm").validate();
            });
        </script>
    </head>
    <body>
        <form action="{{ route('myuser.update',$myuserarray->myuser_id) }}" method="post" id="myForm">
        @method('patch')
        @csrf
            <table align='center' border='2'>
                <tr>
                    <td colspan='2'><center><h2>Update Profile</h2></center></td>
                </tr>
                <tr>
                    <td colspan='2'><center><a href="{{route('myuser.index')}}"><i class="fa fa-eye" aria-hidden="true"></i>
                        </a></center></td>
                </tr>
                <tr>
                    <td>First Name</td>
                    <td><input type="text" name="myuser_fname" value="{{$myuserarray->myuser_fname}}" require='true'></td>
                </tr>
                <tr>
                    <td>Last Name</td>
                    <td><input type="text" name="myuser_lname" value="{{$myuserarray->myuser_lname}}" require='true'></td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="myuser_username" value="{{$myuserarray->myuser_username}}" require='true'></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="text" name="myuser_password" value="{{$myuserarray->myuser_password}}" require='true'></td>
                </tr>
                <tr>
                    <td>Role</td>
                    <td>
                        <select name="role_id">
                            <!-- <option value="{{$myuserarray->role_id}}">{{$myuserarray->role_id}}</option> -->
                            <option value="">--Select Role--</option>
                            @foreach($rolearray as $role)
                                <option value="{{$role->role_id}}">{{$role->role}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan='2'><center><input type="submit" value="Update" name="submit"></center></td>
                </tr>
            </table>
        </form>
    </body>
</html>



