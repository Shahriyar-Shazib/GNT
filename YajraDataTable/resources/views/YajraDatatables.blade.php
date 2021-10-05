<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> 

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href=" https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href=" https://cdn.datatables.net/fixedheader/3.2.0/css/fixedHeader.dataTables.min.css">
    
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.2.0/js/dataTables.fixedHeader.min.js"></script>

    <title>Document</title>

</head>

<body>
<div class="container">
<div class="row">
    <form action=""class="form">
        <select name="type"onchange="myFunction(this) "id="type">
            <option value="all">ALL</option>
            <option value="admin">Admin</option>
            <option value="moderator">Moderator</option>
            <option value="customer">Customerz</option>
        </select>
    </form>
</div>
</div>
    <div class="container"> 

        <div class="row">

            <div class="col-md-12"style="margin:10% 5% 10% 5%">
            
                <table id="user_table" class="table table-bordered table-hover table-striped">

                    <thead>

                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Type</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Action</th>
                        </tr>
                        
                    </thead>
                    <tfoot>
                        <tr>
                            <th colspan="5" style="text-align:right">Total:</th>
                            <th></th>
                        </tr>
                    </tfoot>
                
                </table>

            </div>

        </div>

    </div>
    

</body>

</html>

<script>

    $(document).ready(function(){
        $('#user_table thead tr')
        .clone(true)
        .addClass('filters')
        .appendTo('#user_table thead');
        $('#user_table').DataTable({

            processing: true,

            serverside: true,

            order: [[0, 'asc']],

            ajax: {
                url: "/user-list"
            },

            columns: [

                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'email',name: 'email' },
                { data: 'type',name: 'type' },
                { data: 'created_at', name: 'created_at' },
                { data: 'updated_at', name: 'updated_at' },
                { data: 'action', name: 'action',  orderable: false },
            ],

            orderCellsTop: true,
            fixedHeader: true,
            initComplete: function () {
                var api = this.api();
 
                // For each column
                api
                    .columns()
                    .eq(0)
                    .each(function (colIdx) {
                        // Set the header cell to contain the input element
                        var cell = $('.filters th').eq(
                            $(api.column(colIdx).header()).index()
                        );
                        var title = $(cell).text();
                        $(cell).html('<input type="text" placeholder="' + title + '" />');
    
                        // On every keypress in this input
                        $(
                            'input',
                            $('.filters th').eq($(api.column(colIdx).header()).index())
                        )
                            .off('keyup change')
                            .on('keyup change', function (e) {
                                e.stopPropagation();
    
                                // Get the search value
                                $(this).attr('title', $(this).val());
                                var regexr = '({search})'; //$(this).parents('th').find('select').val();
    
                                var cursorPosition = this.selectionStart;
                                // Search the column for that value
                                api
                                    .column(colIdx)
                                    .search(
                                        this.value != ''
                                            ? regexr.replace('{search}', '(((' + this.value + ')))')
                                            : '',
                                        this.value != '',
                                        this.value == ''
                                    )
                                    .draw();
    
                                $(this)
                                    .focus()[0]
                                    .setSelectionRange(cursorPosition, cursorPosition);
                            });
                    });
            },

            // "drawCallback":function(settings) { 
            //     // let total = sum_table_col($("#user_table"),"calculation"); 
 
            //     // $("#datavalue").text() = "$ "+total; 
            //     alert("HHI") 
            // },

            "footerCallback": function ( ) {
                var api = this.api(), data;
    
                // Remove the formatting to get integer data for summation
                var intVal = function ( i ) {
                    return i ;
                };
    
                // Total over all pages
                total = api
                    .column( 0 )
                    .data()
                    .reduce( function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0 );
    
                // Total over this page
                pageTotal = api
                    .column( 0, { page: 'current'} )
                    .data()
                    .reduce( function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0 );
    
                // Update footer
                $( api.column( 4 ).footer() ).html(
                    '$'+pageTotal +' ( $'+ total +' total)'
                );
            }


        });
        

       
       
        $(document).on('click','#editbtn',function(){

            var id=$(this).data('id');
            
                var data = 
                {
                    key : id
                };
                
            alert(id);
                ajax({
                    type: 'GET',
                    url: '/user-list/edit'+json,
                    contentType: 'application/json',
                    dataType: "json",
                    success: function(results) {
                        var result = results.result;
                    
                        console.log(result);
                        
                
                
                }
            });
        })

        $(document).on('click','#deletebtn',function(){

            var id=$(this).data('id');
            
                var data = 
                {
                    key : id
                };
                var json = JSON.stringify(data);
            alert(id);
                ajax({
                    type: 'GET',
                    url: '/user-list/edit'+json,
                    contentType: 'application/json',
                    dataType: "json",
                    success: function(results) {
                        var result = results.result;
                    
                        console.log(result);
     
                }
            });
        })
        function myFunction(input){

            var type= input.value ;
            console.log(type);

            $.ajax({
                type:'GET',
                url:'/user-list/find/'
                });


} 
       
    });
  

</script>