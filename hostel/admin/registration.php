<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();
//code for registration
if(isset($_POST['submit']))
{
$roomno=$_POST['room'];
$seater=$_POST['seater'];
$feespm=$_POST['fpm'];
$foodstatus=$_POST['foodstatus'];
$stayfrom=$_POST['stayf'];
$duration=$_POST['duration'];
$course=$_POST['course'];
$regno=$_POST['regno'];
$fname=$_POST['fname'];
$mname=$_POST['mname'];
$lname=$_POST['lname'];
$gender=$_POST['gender'];
$contactno=$_POST['contact'];
$emailid=$_POST['email'];
$emcntno=$_POST['econtact'];
$gurname=$_POST['gname'];
$gurrelation=$_POST['grelation'];
$gurcntno=$_POST['gcontact'];
$caddress=$_POST['address'];
$ccity=$_POST['city'];
$cstate=$_POST['state'];
$cpincode=$_POST['pincode'];
$paddress=$_POST['paddress'];
$pcity=$_POST['pcity'];
$pstate=$_POST['pstate'];
$ppincode=$_POST['ppincode'];
	$result ="SELECT count(*) FROM userRegistration WHERE email=? || regNo=?";
		$stmt = $mysqli->prepare($result);
		$stmt->bind_param('ss',$email,$regno);
		$stmt->execute();
$stmt->bind_result($count);
$stmt->fetch();
$stmt->close();
if($count>0)
{
echo"<script>alert('Registration number or email id already registered.');</script>";
}else{


$query="insert into  registration(roomno,seater,feespm,foodstatus,stayfrom,duration,course,regno,firstName,middleName,lastName,gender,contactno,emailid,egycontactno,guardianName,guardianRelation,guardianContactno,corresAddress,corresCIty,corresState,corresPincode,pmntAddress,pmntCity,pmnatetState,pmntPincode) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
$stmt = $mysqli->prepare($query);
$rc=$stmt->bind_param('iiiisisissssisississsisssi',$roomno,$seater,$feespm,$foodstatus,$stayfrom,$duration,$course,$regno,$fname,$mname,$lname,$gender,$contactno,$emailid,$emcntno,$gurname,$gurrelation,$gurcntno,$caddress,$ccity,$cstate,$cpincode,$paddress,$pcity,$pstate,$ppincode);
$stmt->execute();
$stmt->close();


$query1="insert into  userregistration(regNo,firstName,middleName,lastName,gender,contactNo,email,password) values(?,?,?,?,?,?,?,?)";
$stmt1= $mysqli->prepare($query1);
$stmt1->bind_param('sssssiss',$regno,$fname,$mname,$lname,$gender,$contactno,$emailid,$contactno);
$stmt1->execute();
echo"<script>alert('Student Succssfully register');</script>";
}
}
?>

<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	<title>𓂀 𝕊𝕥𝕦𝕕𝕖𝕟𝕥 ℍ𝕠𝕤𝕥𝕖𝕝 ℝ𝕖𝕘𝕚𝕤𝕥𝕣𝕒𝕥𝕚𝕠𝕟 𓂀</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">>
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
<script type="text/javascript" src="js/jquery-1.11.3-jquery.min.js"></script>
<script type="text/javascript" src="js/validation.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
<script>
function getSeater(val) {
$.ajax({
type: "POST",
url: "get_seater.php",
data:'roomid='+val,
success: function(data){
//alert(data);
$('#seater').val(data);
}
});

$.ajax({
type: "POST",
url: "get_seater.php",
data:'rid='+val,
success: function(data){
//alert(data);
$('#fpm').val(data);
}
});
}
</script>

</head>
<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
		<?php include('includes/sidebar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title">🆁🅴🅶🅸🆂🆃🆁🅰🆃🅸🅾🅽</h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-primary">
									<div class="panel-heading">𝙵𝚒𝚕𝚕 𝚊𝚕𝚕 𝙸𝚗𝚏𝚘</div>
									<div class="panel-body">
										<form method="post" action="" class="form-horizontal">
											
										
<div class="form-group">
<label class="col-sm-4 control-label"><h4 style="color: green" align="left">𝚁𝚘𝚘𝚖 𝚁𝚎𝚕𝚊𝚝𝚎𝚍 𝚒𝚗𝚏𝚘</h4> </label>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">𓂀 ℝ𝕠𝕠𝕞 ℕ𝕠. 𓂀 </label>
<div class="col-sm-8">
<select name="room" id="room"class="form-control"  onChange="getSeater(this.value);" onBlur="checkAvailability()" required> 
<option value="">𝚂𝚎𝚕𝚎𝚌𝚝 𝚁𝚘𝚘𝚖</option>
<?php $query ="SELECT * FROM rooms";
$stmt2 = $mysqli->prepare($query);
$stmt2->execute();
$res=$stmt2->get_result();
while($row=$res->fetch_object())
{
?>
<option value="<?php echo $row->room_no;?>"> <?php echo $row->room_no;?></option>
<?php } ?>
</select> 
<span id="room-availability-status" style="font-size:12px;"></span>

</div>
</div>
											
<div class="form-group">
<label class="col-sm-2 control-label">𓂀 𝕊𝕖𝕒𝕥𝕖𝕣 𓂀</label>
<div class="col-sm-8">
<input type="text" name="seater" id="seater"  class="form-control" readonly="true"  >
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">𓂀 𝔽𝕖𝕖𝕤 ℙ𝕖𝕣 𝕄𝕠𝕟𝕥𝕙 𓂀</label>
<div class="col-sm-8">
<input type="text" name="fpm" id="fpm"  class="form-control" readonly="true">
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">𓂀 𝔽𝕠𝕠𝕕 𝕊𝕥𝕒𝕥𝕦𝕤 𓂀</label>
<div class="col-sm-8">
<input type="radio" value="0" name="foodstatus" checked="checked">𝐖𝐢𝐭𝐡𝐨𝐮𝐭 𝐅𝐨𝐨𝐝
<input type="radio" value="1" name="foodstatus"> 𝐖𝐢𝐭𝐡 𝐅𝐨𝐨𝐝(𝐑𝐬 𝟐𝟎𝟎𝟎.𝟎𝟎 𝐏𝐞𝐫 𝐌𝐨𝐧𝐭𝐡 𝐄𝐱𝐭𝐫𝐚)
</div>
</div>	

<div class="form-group">
<label class="col-sm-2 control-label">𝕊𝕥𝕒𝕪 𝔽𝕣𝕠𝕞</label>
<div class="col-sm-8">
<input type="date" name="stayf" id="stayf"  class="form-control" >
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">𝔻𝕦𝕣𝕒𝕥𝕚𝕠𝕟</label>
<div class="col-sm-8">
<select name="duration" id="duration" class="form-control">
<option value="">𝐒𝐞𝐥𝐞𝐜𝐭 𝐃𝐮𝐫𝐚𝐭𝐢𝐨𝐧 𝐈𝐧 𝐌𝐨𝐧𝐭𝐡</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
</select>
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label"><h4 style="color: green" align="left">ℙ𝕖𝕣𝕤𝕠𝕟𝕒𝕝 𝕀𝕟𝕗𝕠 </h4> </label>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">ℂ𝕠𝕦𝕣𝕤𝕖</label>
<div class="col-sm-8">
<select name="course" id="course" class="form-control" required> 
<option value="">𝚂𝚎𝚕𝚎𝚌𝚝 𝙲𝚘𝚞𝚛𝚜𝚎</option>
<?php $query ="SELECT * FROM courses";
$stmt2 = $mysqli->prepare($query);
$stmt2->execute();
$res=$stmt2->get_result();
while($row=$res->fetch_object())
{
?>
<option value="<?php echo $row->course_fn;?>"><?php echo $row->course_fn;?>&nbsp;&nbsp;(<?php echo $row->course_sn;?>)</option>
<?php } ?>
</select> </div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">ℝ𝕖𝕘𝕚𝕤𝕥𝕣𝕒𝕥𝕚𝕠𝕟 ℕ𝕠 :</label>
<div class="col-sm-8">
<input type="text" name="regno" id="regno"  class="form-control" required="required"  onBlur="checkRegnoAvailability()">
<span id="user-reg-availability" style="font-size:12px;"></span>
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label">𝔽𝕚𝕣𝕤𝕥 ℕ𝕒𝕞𝕖 :</label>
<div class="col-sm-8">
<input type="text" name="fname" id="fname"  class="form-control" required="required" >
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">𝕄𝕚𝕕𝕕𝕝𝕖 ℕ𝕒𝕞𝕖 :</label>
<div class="col-sm-8">
<input type="text" name="mname" id="mname"  class="form-control">
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">𝕃𝕒𝕤𝕥 ℕ𝕒𝕞𝕖 : </label>
<div class="col-sm-8">
<input type="text" name="lname" id="lname"  class="form-control" required="required">
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">𝔾𝕖𝕟𝕕𝕖𝕣 :</label>
<div class="col-sm-8">
<select name="gender" class="form-control" required="required">
<option value="">𝚂𝚎𝚕𝚎𝚌𝚝 𝙶𝚎𝚗𝚍𝚎𝚛</option>
<option value="male">𝙼𝚊𝚕𝚎</option>
<option value="female">𝙵𝚎𝚖𝚊𝚕𝚎</option>
<option value="others">𝙾𝚝𝚑𝚎𝚛𝚜</option>
</select>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">ℂ𝕠𝕟𝕥𝕒𝕔𝕥 ℕ𝕠 : </label>
<div class="col-sm-8">
<input type="text" name="contact" id="contact"  class="form-control" required="required" >
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label">𝔼𝕞𝕒𝕚𝕝 𝕀𝕕 : </label>
<div class="col-sm-8">
<input type="email" name="email" id="email"  class="form-control" onBlur="checkAvailability()" required="required">
<span id="user-availability-status" style="font-size:12px;"></span>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">𝔼𝕞𝕖𝕣𝕘𝕖𝕟𝕔𝕪 ℂ𝕠𝕟𝕥𝕒𝕔𝕥:</label>
<div class="col-sm-8">
<input type="text" name="econtact" id="econtact"  class="form-control" required="required">
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">𝔾𝕦𝕒𝕣𝕕𝕚𝕒𝕟 ℕ𝕒𝕞𝕖 :</label>
<div class="col-sm-8">
<input type="text" name="gname" id="gname"  class="form-control" required="required">
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">𝔾𝕦𝕒𝕣𝕕𝕚𝕒𝕟 ℝ𝕖𝕝𝕒𝕥𝕚𝕠𝕟 :</label>
<div class="col-sm-8">
<input type="text" name="grelation" id="grelation"  class="form-control" required="required">
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">𝔾𝕦𝕒𝕣𝕕𝕚𝕒𝕟 ℂ𝕠𝕟𝕥𝕒𝕔𝕥 ℕ𝕠 :</label>
<div class="col-sm-8">
<input type="text" name="gcontact" id="gcontact"  class="form-control" required="required">
</div>
</div>	

<div class="form-group">
<label class="col-sm-3 control-label"><h4 style="color: green" align="left">ℂ𝕠𝕣𝕣𝕖𝕤𝕡𝕠𝕟𝕕𝕖𝕟𝕤𝕖 𝔸𝕕𝕕𝕣𝕖𝕤𝕤</h4> </label>
</div>


<div class="form-group">
<label class="col-sm-2 control-label">𝔸𝕕𝕕𝕣𝕖𝕤𝕤 : </label>
<div class="col-sm-8">
<textarea  rows="5" name="address"  id="address" class="form-control" required="required"></textarea>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">ℂ𝕚𝕥𝕪 : </label>
<div class="col-sm-8">
<input type="text" name="city" id="city"  class="form-control" required="required">
</div>
</div>	

<div class="form-group">
<label class="col-sm-2 control-label">𝕊𝕥𝕒𝕥𝕖 </label>
<div class="col-sm-8">
<select name="state" id="state"class="form-control" required> 
<option value="">𝚂𝚎𝚕𝚎𝚌𝚝 𝚂𝚝𝚊𝚝𝚎</option>
<?php $query ="SELECT * FROM states";
$stmt2 = $mysqli->prepare($query);
$stmt2->execute();
$res=$stmt2->get_result();
while($row=$res->fetch_object())
{
?>
<option value="<?php echo $row->State;?>"><?php echo $row->State;?></option>
<?php } ?>
</select> </div>
</div>							

<div class="form-group">
<label class="col-sm-2 control-label">ℙ𝕚𝕟𝕔𝕠𝕕𝕖 : </label>
<div class="col-sm-8">
<input type="text" name="pincode" id="pincode"  class="form-control" required="required">
</div>
</div>	

<div class="form-group">
<label class="col-sm-3 control-label"><h4 style="color: green" align="left">ℙ𝕖𝕣𝕞𝕒𝕟𝕖𝕟𝕥 𝔸𝕕𝕕𝕣𝕖𝕤𝕤</h4> </label>
</div>


<div class="form-group">
<label class="col-sm-5 control-label">ℙ𝕖𝕣𝕞𝕒𝕟𝕖𝕟𝕥 𝔸𝕕𝕕𝕣𝕖𝕤𝕤 𝕊𝕒𝕞𝕖 𝔸𝕤 ℂ𝕠𝕣𝕣𝕖𝕤𝕡𝕠𝕟𝕕𝕖𝕟𝕤𝕖 𝔸𝕕𝕕𝕣𝕖𝕤𝕤 : </label>
<div class="col-sm-4">
<input type="checkbox" name="adcheck" value="1"/>
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label">𝔸𝕕𝕕𝕣𝕖𝕤𝕤 :</label>
<div class="col-sm-8">
<textarea  rows="5" name="paddress"  id="paddress" class="form-control" required="required"></textarea>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">ℂ𝕚𝕥𝕪 : </label>
<div class="col-sm-8">
<input type="text" name="pcity" id="pcity"  class="form-control" required="required">
</div>
</div>	

<div class="form-group">
<label class="col-sm-2 control-label">𝕊𝕥𝕒𝕥𝕖 </label>
<div class="col-sm-8">
<select name="pstate" id="pstate"class="form-control" required> 
<option value="">𝚂𝚎𝚕𝚎𝚌𝚝 𝚂𝚝𝚊𝚝𝚎</option>
<?php $query ="SELECT * FROM states";
$stmt2 = $mysqli->prepare($query);
$stmt2->execute();
$res=$stmt2->get_result();
while($row=$res->fetch_object())
{
?>
<option value="<?php echo $row->State;?>"><?php echo $row->State;?></option>
<?php } ?>
</select> </div>
</div>							

<div class="form-group">
<label class="col-sm-2 control-label">ℙ𝕚𝕟𝕔𝕠𝕕𝕖 :</label>
<div class="col-sm-8">
<input type="text" name="ppincode" id="ppincode"  class="form-control" required="required">
</div>
</div>	


<div class="col-sm-6 col-sm-offset-4">
<button class="btn btn-default" type="submit">Cancel</button>
<input type="submit" name="submit" Value="Register" class="btn btn-primary">
</div>
</form>

									</div>
									</div>
								</div>
							</div>
						</div>
							</div>
						</div>
					</div>
				</div> 	
			</div>
		</div>
	</div>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
</body>
<script type="text/javascript">
	$(document).ready(function(){
        $('input[type="checkbox"]').click(function(){
            if($(this).prop("checked") == true){
                $('#paddress').val( $('#address').val() );
                $('#pcity').val( $('#city').val() );
                $('#pstate').val( $('#state').val() );
                $('#ppincode').val( $('#pincode').val() );
            } 
            
        });
    });
</script>
	<script>
function checkAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'roomno='+$("#room").val(),
type: "POST",
success:function(data){
$("#room-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>

	<script>
function checkAvailability() {

$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'emailid='+$("#email").val(),
type: "POST",
success:function(data){
$("#user-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function ()
{
event.preventDefault();
alert('error');
}
});
}
</script>
	<script>
function checkRegnoAvailability() {

$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'regno='+$("#regno").val(),
type: "POST",
success:function(data){
$("#user-reg-availability").html(data);
$("#loaderIcon").hide();
},
error:function ()
{
event.preventDefault();
alert('error');
}
});
}
</script>

</html>