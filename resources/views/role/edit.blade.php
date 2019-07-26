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
        <form action="{{ route('role.update',$rolearray->role_id) }}" method="post" id="myFrom">
        @method('patch')
        @csrf
            <table border='2' align='center'>
                <tr>
                    <td colspan='2'><center><h2>Role Update</h2></center></td>
                </tr>
                <tr>
                    <th>Role</th>
                    <td><input type="text" name="role" value="{{$rolearray->role}}"></td>
                </tr>
                <tr>
                    <td colspan='2'><center><input type="submit" value="Update"></center></td>
                </tr>
            </table> 
        </form>
    </body>
</html>