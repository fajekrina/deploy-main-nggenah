<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.5/js/jquery.dataTables.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.5/css/jquery.dataTables.css" rel="stylesheet"/>
<table id="example" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>check</th>
            <th>Position</th>
            <th>Office</th>
            <th>Age</th>
            <th>Start date</th>
            <th>Salary</th>
        </tr>
    </thead>
    
    <tbody>
        <tr>
            <td><input type="checkbox" class="checkbox" ></td>
            <td>System Architect</td>
            <td>Edinburgh</td>
            <td>61</td>
            <td>2011/04/25</td>
            <td>$320,800</td>
        </tr>
        <tr>
            <td><input type="checkbox" class="checkbox" ></td>
            <td>Accountant</td>
            <td>Tokyo</td>
            <td>63</td>
            <td>2011/07/25</td>
            <td>$170,750</td>
        </tr>
    </tbody>
</table>

<script>
  var table = $('#example').DataTable();
 
 $('#example tbody').on( 'click', '.checkbox', function () {
 if(this.checked==true)
 {
 console.log( table.row( this.closest('tr') ).data() );
 }
 } );
</script> 