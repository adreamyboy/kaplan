<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>

<script type="text/javascript">
    
    
</script>
<style type="text/css">
    body {
        background-color: #efefef;
    }

    .table-latitude {
        width: 100%;
    }
    .table-latitude caption {
        text-transform: uppercase;
        font-weight: bold;
        color: #fab700;
        text-align: center;
    }
    .table-latitude thead {
        border-top: 2px solid #fab700;
        border-bottom: 2px solid #fab700;
    }
    .table-latitude thead th {
        text-transform: uppercase;
        text-align: center;
        padding: 10px;
        color: #006ac6;
        border: 1px solid #F1F1F1;
    }
        
    .table-latitude tbody tr{        
        border-bottom: 1px solid #F1F1F1;
        color: #75787b;
    }
    .table-latitude tbody tr td {
        padding: 10px;
        border: 1px solid #F1F1F1;
    }
    .table-latitude tbody tr th {
        padding-left: 10px;
        border: 1px solid #F1F1F1;
    }
    .table-latitude tfoot {
        color: #fab700;
        font-style: italic;
        border-bottom: 2px solid #fab700;
    }
    .table-latitude tfoot tr td {
        padding: 10px;
        border: 1px solid #F1F1F1;
    }

</style>
<div class="">
    <div class="panel panel-default">
        <div class="panel-body">
            <table class="table-latitude">
                <input type="text" id="assignedUser" class="pull-left" name="assigned-users" list="users" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc;" placeholder="Assigned User.." value="">
                <datalist id="users">
                </datalist>
                <div id="reportrange"  class="pull-left" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc;">
                    <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>&nbsp;
                    <span></span> <b class="caret"></b>
                </div>
                <button style="border: 1px solid #ccc; background: #fff; height: 32px; padding: 1px 10px; margin-left: -1px;" onclick="filterData()"><i class="glyphicon glyphicon-filter"></i></button>
                 <caption>Payment Tracking</caption>
                <div class="pull-right">
                    <button type="button" class="btn btn-default btn-sm" onclick="downloadCSV()">
                      <span class="glyphicon glyphicon-download-alt"></span> Download CSV
                    </button>
                </div>                 
                  <thead>
                      <th>Invoice Number</th>
                      <th>Invoiced Date</th>
                      <th>Quote Valid Until</th>
                      <th>Invoice Value</th>
                      <th>Payment link Value</th>
                      <th>Received Amount</th>
                      <th>Pending Amount</th>
                      <th>PmtLink Sent Date</th>
                </thead>
                <tfoot>
                    <tr>
                        <td colspan=3>Total Count: <strong id="totalCount"></strong></td>
                    </tr>
                </tfoot>
                <tbody class="data-body">

                </tbody>
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function() {
        var start = moment().subtract(29, 'days');
        var end = moment();
        let updateFilter = false;

        
        function cb(start, end) {
            $('#reportrange span').html(start.format('YYYY/MM/DD') + ' - ' + end.format('YYYY/MM/DD'));
        }

        $('#reportrange').daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {
               'Today': [moment(), moment()],
               'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
               'Last 7 Days': [moment().subtract(6, 'days'), moment()],
               'Last 30 Days': [moment().subtract(29, 'days'), moment()],
               'This Month': [moment().startOf('month'), moment().endOf('month')],
               'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        }, cb);
        cb(start, end);        
        // Generate Dynamic Assigned User Dropdown
        let allUsers = getAssignedUserList();       
        filterData(start.format('YYYY/MM/DD'), end.format('YYYY/MM/DD'),updateFilter);  


    });

    function getAssignedUserList(){
        $.ajax({
            type: "POST",
            url: "../index.php?entryPoint=PaymentLinkTracking",
            datatype: 'json',
            data : {getAssignedUsers:'GetAllAssignedUsers'}
        }).done(function( response ) {
            jsonResponse = JSON.parse(response);
            let optionRows = '';
            if (!jsonResponse['Error']) {
                for (var i = 0; i < jsonResponse.length; i++) 
                {
                    let userId = jsonResponse[i]['assigned_user_id'];
                    let userName = jsonResponse[i]['AssignedUser'];                         
                    optionRows += "<option data-value='"+userId+"' value='"+userName+"'></option>";
                }
                $('#users').html(optionRows);
            }
        });
    }
    function filterData(start, end, updateFilter){
        let dateFrom = '';
        let dateTo = '';
        let assignedUser = '';
        let currentUser = '';
        let filter = '';
        
        let assignedUserName = $('#assignedUser').val();
        let cUser = $('#usermenu a', window.parent.document).attr("href");
        
        currentUser = cUser.split("record=")[1];
        if (assignedUserName != '') {
            assignedUser = $("#users option[value='"+assignedUserName.trim()+"']").attr('data-value');
        }
        if (assignedUser == undefined) {
            alert('No user found!');
        }
        if (updateFilter == undefined) {
            filter = true;
        }else{
            filter = false;
        }

        if (start==undefined && end == undefined) {
            let dates = $('#reportrange span').html().split("-");                  
            dateFrom = dates[0];
            dateTo = dates[1];
        }else{       
            dateFrom = start;
            dateTo = end;
        }
        $.ajax({
            type: "POST",
            url: "../index.php?entryPoint=PaymentLinkTracking",
            datatype: 'json',
            data : {FromDate : dateFrom, ToDate : dateTo, AssignedUser: assignedUser,currentUser : currentUser,filter : filter}
        }).done(function( response ) {
            jsonResponse = JSON.parse(response);
            let dataRows = '';
            let optionRows = '';
            if (!jsonResponse['Error']) {
                for (var i = 0; i < jsonResponse.data.length; i++) 
                {         
                    dataRows += "<tr><th><a href="+jsonResponse.siteUrl+"/index.php?module=Opportunities&action=DetailView&record="+jsonResponse.data[i]['id']+" target='_blank' >"+jsonResponse.data[i]['InvoiceNumber']+"</a></th><td>"+jsonResponse.data[i]['InvoicedDate']+"</td><td>"+jsonResponse.data[i]['QuoteValidUntil']+"</td><td>"+jsonResponse.data[i]['InvoiceValue']+"</td><td>"+jsonResponse.data[i]['PaymentLinkValue']+"</td><td>"+jsonResponse.data[i]['ReceivedAmount']+"</td><td>"+jsonResponse.data[i]['PendingAmount']+"</td><td>"+jsonResponse.data[i]['PaymentLinkSentDate']+"</td></tr>";
                }
                $('.data-body').html(dataRows);
                $('#totalCount').html(jsonResponse.data.length);
                // Setting Dynamic Filters
                if (typeof(jsonResponse['Filter']) == 'object') {
                     let previousStartDt = jsonResponse['Filter'].from_date.split(" ")[0].replaceAll("-","/");
                     let previousEndDt = jsonResponse['Filter'].to_date.split(" ")[0].replaceAll("-","/");
                     let finalDate = previousStartDt+' - '+previousEndDt;
                     $('#reportrange span').html(finalDate);
                    $('#assignedUser').val(jsonResponse['Filter'].name); 

                }
            }else{
                $('.data-body').html("<tr><td colspan=3>"+jsonResponse['Message']+"</td></tr>");
                $('#totalCount').html('0');
                if (typeof(jsonResponse['Filter']) == 'object') {
                    let previousStartDt = jsonResponse['Filter'].from_date.split(" ")[0].replaceAll("-","/");
                    let previousEndDt = jsonResponse['Filter'].to_date.split(" ")[0].replaceAll("-","/");
                    let finalDate = previousStartDt+' - '+previousEndDt;
                    $('#reportrange span').html(finalDate);
                   $('#assignedUser').val(jsonResponse['Filter'].name); 
                }
            }
        });
    }
    function createCSV(array){
      var keys = Object.keys(array[0]); //Collects Table Headers
      
      var result = ''; //CSV Contents
      result += keys.join(','); //Comma Seperates Headers
      result += '\n'; //New Row
      
      array.forEach(function(item){ //Goes Through Each Array Object
        keys.forEach(function(key){//Goes Through Each Object value
          result += item[key] + ','; //Comma Seperates Each Key Value in a Row
        })
        result += '\n';//Creates New Row
      })
      
      return result;
    }
    function downloadCSV() {        
        let dates = $('#reportrange span').html().split("-");        
        dateFrom = dates[0];
        dateTo = dates[1];
        let assignedUserName = $('#assignedUser').val();
        let assignedUser = '';
        let currentUser = '';
        let filter = '';

        let cUser = $('#usermenu a', window.parent.document).attr("href");        
        currentUser = cUser.split("record=")[1];

        if (assignedUserName != '') {
            assignedUser = $("#users option[value='"+assignedUserName+"']").attr('data-value');
        }
        if (assignedUser == undefined) {
            alert('No user found!');
            return false;
        }

        $.ajax({
            type: "POST",
            url: "../index.php?entryPoint=PaymentLinkTracking",
            datatype: 'json',
            data : {FromDate : dateFrom, ToDate : dateTo, AssignedUser: assignedUser,currentUser : currentUser, filter : filter}
        }).done(function( response ) {
            let finalData = '';
            jsonResponse = JSON.parse(response);
            for (var i = 0; i < jsonResponse.data.length; i++) 
            {
                delete jsonResponse.data[i].id;
            }
            csv = 'data:text/csv;charset=utf-8,' + createCSV(jsonResponse.data);
            //Creates CSV File Format
            excel = encodeURI(csv); //Links to CSV 

            link = document.createElement('a');
            link.setAttribute('href', excel); //Links to CSV File 
            link.setAttribute('download', 'TrackPaymentLink.csv');
             //Filename that CSV is saved as
            link.click();
        });
    }
</script>