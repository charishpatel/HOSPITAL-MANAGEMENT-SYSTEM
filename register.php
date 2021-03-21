
<?php 
include 'validateSession.php';
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <title>Registration </title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
       <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="js/bootstrap.min.js"/>
    <style>
     .maxl{
  margin:25px ;
}
.inline{
  display: inline-block;
}
.inline + .inline{
  margin-left:10px;
}
.radio{
  color:#999;
  font-size:15px;
  position:relative;
}
.radio span{
  position:relative;
   padding-left:20px;
}
.radio span:after{
  content:'';
  width:15px;
  height:15px;
  border:3px solid;
  position:absolute;
  left:0;
  top:1px;
  border-radius:100%;
  -ms-border-radius:100%;
  -moz-border-radius:100%;
  -webkit-border-radius:100%;
  box-sizing:border-box;
  -ms-box-sizing:border-box;
  -moz-box-sizing:border-box;
  -webkit-box-sizing:border-box;
}
.radio input[type="radio"]{
   cursor: pointer; 
  position:absolute;
  width:100%;
  height:100%;
  z-index: 1;
  opacity: 0;
  filter: alpha(opacity=0);
  -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)"
}
.radio input[type="radio"]:checked + span{
  color:#0B8;  
}
.radio input[type="radio"]:checked + span:before{
    content:'';
  width:5px;
  height:5px;
  position:absolute;
  background:#0B8;
  left:5px;
  top:6px;
  border-radius:100%;
  -ms-border-radius:100%;
  -moz-border-radius:100%;
  -webkit-border-radius:100%;
}
        </style>
    </head>
    <body style="background-image: linear-gradient(#003333,#003333,#003333);" onload="createTable()"> 
        <form action="register.php" method="post">
        <div>
         <?php
         include 'nav.php';
        include 'dbconnect.php';
        if(isset($_POST['register']))
{  
 $pName= $_POST['pname'];  
 $pAge= $_POST['age'];  
 $gender= $_POST['gender'];
 $mobile= $_POST['mobile'];
 $address= $_POST['address'];
 $sid = $_POST['sid'];
  $pid = $rid ="";
$qry="INSERT INTO patient(pName, pAge, gender, mobile, address) VALUES ('$pName', '$pAge', '$gender', '$mobile', '$address')";
   
 $run= mysqli_query($con,$qry);
 
 if($run == true)
    {
     $pid = $con->insert_id;
     
     echo 'Patient record inserted';
     $date = date("Y-m-d");
     $qry="INSERT INTO receipt VALUES ('', '$date', $pid)";
     
 $run= mysqli_query($con,$qry);
 if($run == true)
    {
     $rid = $con->insert_id;
     
    
    
    foreach ($sid as $id){
        
        $qry="INSERT INTO receiptItem VALUES ('', '$id', (select sname from service where id=$id), (select price from service where id=$id), $rid,$pid,'$date')";
       
            $run= mysqli_query($con,$qry);
            
            }
        
    }
    
    }
     
     
     $pName = $pAge = $gender = $mobile = $address ="";
     
     
    }


        
        ?>
        </div>
        <div class="row" style="margin:100px 50px 50px 50px;">
            <div class="col-md-6">
               
                    <h1> <font style= "color:#ffffff">Registration </font></h1>
                Patient Details
              
                    <label> <font style= "color:#ffffff">Name *</font>
                    </label>
                <input type="text" class="long" style="width:60%;" name="pname" required/>
                    <br>
               
                <label> <font style= "color:#ffffff">Age *</font>
                    </label>
                        <input type="text" maxlength="3" style="width:60%;" name="age" required />
                <br>
                    <label> <font style= "color:#ffffff">Gender *</font></label>
                <label class="radio inline"> 
      <input type="radio" name="gender" value="male" checked >
      <span> Male </span> 
   </label>
                <label class="radio inline"> 
      <input type="radio" name="gender" value="female" >
      <span> Female </span> 
   </label>
                    <label> <font style= "color:#ffffff">Mobile *</font>
                    </label>
                    <input type="text" maxlength="10" style="width:60%;" name="mobile" required /><br>
               
                    <label> <font style= "color:#ffffff">Address *</font>
                    </label>
                        <input type="text" class="long" style="width:60%;" name="address" required/>
                
                </p>
               
            </fieldset>
              
                
            </div>
            <div class="col-md-6">
                <p>
                    <font style= "color:#ffffff"> Services</font>
                    <label style= "color:#ffffff" size="6">Total Rs.<label style= "display:inline;color:#ffffff" size="6" id="amtLabel"> 0</label></label>
                </p>
                  <script>
                                    var tAmt = 0.0;
        
	let map = new Map();
        let nameMap = new Map();
        var tableData = {};
                                    </script>
                <select style="display:inline; width: 50%" id="sService">
                    <?php 
                                include 'dbconnect.php';
                                $qry="select * from service";
                                if ($result = $con->query($qry)) {

    /* fetch object array */
                                  
    while ($row = $result->fetch_assoc()) {
                    ?> 
                    <script>
	
                     map.set("<?php  echo $row['id']; ?>", <?php echo $row['price']; ?>);
                     nameMap.set("<?php  echo $row['id']; ?>", "<?php echo $row['sname']; ?>");
                    </script>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['sname']; ?>
                        </option>
               <?php 
    }
    }
               ?> </select>
                <input style= "display:inline;" type="button" value="ADD" name="add" id="addBtn" onclick="addRow()"/>
                <div id="cont">
                </div>
                <div><button type=submit class="button" name="register">Register &raquo;</button></div>
              
            </div>
</div>
        <script>
        // ARRAY FOR HEADER.
    var arrHead = new Array();
    arrHead = ['Id', 'Service','Price','Delete'];      // SIMPLY ADD OR REMOVE VALUES IN THE ARRAY FOR TABLE HEADERS.

    // FIRST CREATE A TABLE STRUCTURE BY ADDING A FEW HEADERS AND
    // ADD THE TABLE TO YOUR WEB PAGE.
    function createTable() {
        var empTable = document.createElement('table');
		
        empTable.setAttribute('id', 'empTable');            // SET THE TABLE ID.

        var tr = empTable.insertRow(-1);
			
        for (var h = 0; h < arrHead.length; h++) {
            var th = document.createElement('th');          // TABLE HEADER.
            th.innerHTML = arrHead[h];
            tr.appendChild(th);
        }

        var div = document.getElementById('cont');
        div.appendChild(empTable);    // ADD THE TABLE TO YOUR WEB PAGE.
    }

    // ADD A NEW ROW TO THE TABLE.s
    function addRow() {
		
		var fT = document.getElementById("sService");
		var strUser = fT.options[fT.selectedIndex].value;
		
		
		
		if (tableData.hasOwnProperty(nameMap.get(strUser))) {
			alert("Service Already exist");
  			return;
		}
  
        var empTab = document.getElementById('empTable');
        
        var rowCnt = empTab.rows.length;        // GET TABLE ROW COUNT.
        var tr = empTab.insertRow(rowCnt);
		
		// TABLE ROW.
       
		
		
		
 
		
        for (var c = 0; c < 4; c++) {
            var td = document.createElement('td');          // TABLE DEFINITION.
            td = tr.insertCell(c);

            if (c == 0) {           // FIRST COLUMN.
         
			
//                
    var t = document.createTextNode(strUser);
    td.appendChild(t);
				 
	
   
            }
		 if (c == 1) {           // FIRST COLUMN.
         
			
//                
    var t = document.createTextNode(nameMap.get(strUser));
    td.appendChild(t);
				 
	
   
            }	
			
            if (c == 2) {
				
				
                 var para = document.createElement("input");
				para.setAttribute('type', "hidden");
				para.setAttribute('name', "sid[]");
				para.setAttribute('value', strUser);
				
                tableData[nameMap.get(strUser)] = map.get(strUser);
					
    var t = document.createTextNode(map.get(strUser));
					   td.appendChild(t);
					td.appendChild(para);
		tAmt = tAmt+map.get(strUser);
					document.getElementById("amtLabel").innerHTML = tAmt;
				
				
						
		
				}
           
		if (c == 3) {
                
		var dbutton = document.createElement('input');

                // SET INPUT ATTRIBUTE.
                dbutton.setAttribute('type', 'button');
                dbutton.setAttribute('value', 'X');

                // ADD THE BUTTON's 'onclick' EVENT.
                dbutton.setAttribute('onclick', 'removeRow(this)');
                
                td.appendChild(dbutton);
            }
        }
   
	
		
	
	
	}

    // DELETE TABLE ROW.
    function removeRow(oButton) {
		
        var empTab = document.getElementById('empTable');
		var index = oButton.parentNode.parentNode.rowIndex;
		var oCells = empTab.rows.item(index).cells;
		var amount = oCells[2].firstChild.data;
		delete tableData[oCells[1].firstChild.data];
		tAmt = tAmt-amount;
		document.getElementById("amtLabel").innerHTML = tAmt;
        empTab.deleteRow(index);       // BUTTON -> TD -> TR.
        
    }

   
</script>
         </form>
    </body>
</html>
