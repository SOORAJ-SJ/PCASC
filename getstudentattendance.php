<?php
	session_start();
	if(!isset($_SESSION['tid']))
	{
		header("location:pagelogin.php");
	}
else{
		$sem=$_GET['sem'];
		$crs=$_GET['crs'];
		mysql_connect("localhost","root","");
		mysql_select_db("pcasc");
		$q="select * from studentdetails where FkCID='$crs' and Sem='$sem' and status='0'";
		$res=mysql_query($q);
		?>
		<div class="form-check" >
				<?php
				while($arr=mysql_fetch_array($res))
				{ ?>
					<div class="checkbox" id="student">
					<label for="checkbox1" class="form-check-label ">
						<input type="checkbox" id="checkbox1" name="checkbox1[]" value="<?php echo $arr['SID'];?>" class="form-check-input" checked><?php echo $arr['Firstname']." ".$arr['Lastname'];?>
					</label>
				</div><?php
				}?>
		<small class="help-block form-text"><i>Uncheck the boxes, who are absent..!</i></small>
	
</div>
<?php } ?>
