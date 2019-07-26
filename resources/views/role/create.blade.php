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
        <form action="{{ route('role.store') }}" method="post">
        {{ csrf_field() }}
            <table border='2' align='center'>
                <tr>
                    <td colspan='2'><center><h2>Role Insertion</h2></center></td>
                </tr>
                <tr>
                    <td colspan='2'><center><a href="{{route('role.index')}}"><i class="fa fa-eye" aria-hidden="true"></i>
                        </a></center></td>
                </tr>
                <tr>
                    <th>Role</th>
                    <td><input type="text" name="role" placeholder="Enter Role" require="true"></td>
                </tr>
                <tr>
                    <td colspan='2'><center><input type="submit" value="Insert"></center></td>
                </tr>
            </table> 
        </form>
    </body>
</html>