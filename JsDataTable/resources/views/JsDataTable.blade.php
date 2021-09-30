<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jq-3.6.0/dt-1.11.3/datatables.min.css"/>
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.bootstrap.min.css"/> -->
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jq-3.6.0/dt-1.11.3/datatables.min.js"></script>
   
    

  
    <title>Document</title>
</head>
<body class="container" style="margin: 5% 10% 10% 5%;">

<table id ="myTable" class="display">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>remember_token</th>
                                <th>created_at</th>
                                <th>updated_at</th>
                            </tr>
                        </thead>
                        <tbody>

                            @for($i=0; $i<count($Uers); $i++ )
                            <tr>
                                <td> {{$Uers[$i]['id']}}</td>
                                <td>{{$Uers[$i]['name']}} </td>
                                <td> {{$Uers[$i]['email']}} </td>
                                <td>{{$Uers[$i]['password']}} </td>
                                <td>{{$Uers[$i]['remember_token']}} </td>
                                <td>{{ $Uers[$i]['created_at']}} </td>
                                <td>{{ $Uers[$i]['updated_at']}}</td>                            
                            </tr>
                            @endfor

                        </tbody>
                    </table>

    <!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.colVis.min.js"></script>
    

    <!-- <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.bootstrap.min.js"></script>
    <script type="text/javascript" src=" https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script> -->
    
    
    
   
    
</body>
</html>

<script>
    
    $(document).ready( function () {
        $('#myTable').DataTable({
            dom: 'Bfrtip',
        buttons: [
                {
                extend: 'collection',
                text: 'Export',
                buttons: [ 'csv', 'excel', 'pdf' ]
            },
            {
                extend: 'collection',
                text: 'extra',
                buttons: ['copy', 'print' ],
                background: false
            }
        ]
        
            
        
            
        
    } );
 
    
    } );

</script>
