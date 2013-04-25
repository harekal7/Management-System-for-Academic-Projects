<?php

require_once("../includes/initialize.php");

// Redirect to index page if not logged in
if(!$session->is_logged_in()) {
  	redirect_to("../index1.php");
}
// instantiate all data members of User class execpt profile & friends
$user = User::find_by_id($_SESSION['id']);
?>


<html>
<head>
	<script type="text/javascript">
		
		function fun(x)
		{
		     	return '04-04-2013';

		}		

		function init()
		{
			
			grey_out();
			calculate_fine();
					
		}
		function dateToString(date)
		{
			return date.getFullYear().toString()+"-"+ date.getMonth().toString() + "-"+date.getDate().toString();
		}
		function calculate_fine()
		{
			var fine1 = document.getElementById("fine1");
			var fine2 = document.getElementById("fine2");
			var fine3 = document.getElementById("fine3");
			var today = new Date();	
			var diff=0;
			var due1= toDate(document.getElementById("duedate1").innerHTML);
			var due2= toDate(document.getElementById("duedate2").innerHTML);
			var due3= toDate(document.getElementById("duedate3").innerHTML);
			if( (diff=difference_of_dates(due1, today))>0)
			{
				fine1.innerHTML=diff;	
			}
			if( (diff=difference_of_dates(due2, today))>0)
			{
				fine2.innerHTML=diff;	
			}
			if( (diff=difference_of_dates(due3, today))>0)
			{
				fine3.innerHTML=diff;	
			}
						
		}
		function difference_of_dates( date1, date2)
		{
			
			return (Math.floor((date2.getTime() - date1.getTime())/(1000*60*60*24)));
		}
		function toDate( s)
		{
			var d_array=s.split("-");//0-year,1-month,2-day
			var returnDate = new Date();       
			returnDate.setFullYear(d_array[0],d_array[1]-1,d_array[2]);
			return returnDate;
		}
		function grey_out()
		{
			/*var Date1 = new Date (2013, 2, 26);
			var Date2 = new Date (2013, 2, 29);
			Date2.setDate(Date1.getDate()-31);
			var Days =(Math.floor((Date2.getTime() - Date1.getTime())/(1000*60*60*24)));
			alert(Days);*/
			/*var demo = new Date();
			demo.setDate(demo.getDate()-31);
			alert(demo);*/
			/////////////////////////
			var today = new Date();//javascript has indices 0 to 11 for months.
			var date_string = document.getElementById("duedate1").innerHTML;
			
			var d_array=date_string.split("-");//0-year,1-month,2-day
			var due_date = new Date();       
			due_date.setFullYear(d_array[0],d_array[1]-1,d_array[2]);
			
			if(date_string==null)
				document.getElementById("book1_renew").disabled=true;
			else if((today.getFullYear()==due_date.getFullYear()) && (today.getMonth()==due_date.getMonth())&& (today.getDate()==due_date.getDate()) )
				document.getElementById("book1_renew").disabled=false;
			else
				document.getElementById("book1_renew").disabled=true;	
						
			date_string = document.getElementById("duedate2").innerHTML;
			
			d_array=date_string.split("-");//0-year,1-month,2-day
			due_date.setFullYear(d_array[0],d_array[1]-1,d_array[2]);
			
			if(date_string==null)
				document.getElementById("book2_renew").disabled=true;
			else if((today.getFullYear()==due_date.getFullYear()) && (today.getMonth()==due_date.getMonth())&& (today.getDate()==due_date.getDate()) )
				document.getElementById("book2_renew").disabled=false;
			else
				document.getElementById("book2_renew").disabled=true;

			date_string = document.getElementById("duedate3").innerHTML;
			
			d_array=date_string.split("-");//0-year,1-month,2-day
			due_date.setFullYear(d_array[0],d_array[1]-1,d_array[2]);
			
			if(date_string==null)
				document.getElementById("book3_renew").disabled=true;
			else if((today.getFullYear()==due_date.getFullYear()) && (today.getMonth()==due_date.getMonth())&& (today.getDate()==due_date.getDate()) )
				document.getElementById("book3_renew").disabled=false;
			else
				document.getElementById("book3_renew").disabled=true;
		}
	</script>
</head>
<body  onload="init()">

<table>
<!--<tr><td><img src="<?= $user->pic ?>" width="100" height="100"/></td></tr>-->
<tr> <td><font face="verdana" size="2"><? echo($user->Name );?></font></td> <td></td><tr>
<tr><td><font face="verdana" size="2"><?= $user->email ?></font></td> <td></td><tr>
</table>

<table border="1">
	<tr>
		<th> books </th>
		<th> bookName </th>
		<th> issue_date</th>
		<th> due_date</th>
		<th> fine </th>		
		<th> action</th>
	</tr>
	<tr>
		<td>book1:</td>
		<td> <?= $user->book1 ?></td>
		<td id="issuedate1"> <?= $user->issue_date?></td>
		<td id="duedate1"> <?= $user->due_date?></td>
		<td id="fine1"> 0</td>
		<td><input type="button" value="renew" id="book1_renew" onclick="window.open('renew.php','body');"/></td>
		
	</tr>
	
	<tr>
		<td>book2:</td>
		<td> <?= $user->book2 ?></td>
		<td id="issuedate2"> <?= $user->issue_date?></td>
		<td id="duedate2"> <?= $user->due_date?></td>
		<td id="fine2"> 0</td>		
		<td><input type="button" value="renew" id="book2_renew"></td>
	</tr>
	
	<tr>
		<td>book3:</td>
		<td> <?= $user->book3 ?></td>
		<td id="issuedate3"> <?= $user->issue_date?></td>
		<td id="duedate3"> <?= $user->due_date?></td>
		<td id="fine3"> 0</td>		
		<td><input type="button" value="renew" id="book3_renew"></td>
	</tr>
</table>

</body>
</html>


