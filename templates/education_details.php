	<h2 class="fs-title"> Education Details</h2>
	<div id="ed_details">
		<div id = "first">
			<div class="form-group ">
				<div class="education_details">
					<div class="row">
					<select class="form-control" id="course_1" name="course_1" placeholder= "Select Course" class="required">
							<option  value="">Select  Degree You Have</option>
							<?php
							$query = "SELECT course_id,course_name,slug from course_list where status = 1";
							$result = mysqli_query($conn,$query) or die(mysqli_error($conn));
							while($row = mysqli_fetch_array($result))
							{
								$course_id = $row['course_id'];
								$course_name = $row['course_name'];
								$slug = $row['slug'];
								?>
								<option value="<?php echo $slug;?>"><?php echo $course_name;?></option>
								<?php
							}
							?>
						</select>
					</div>
					<br>
					<div class="row">
						<select class="form-control" id="college_1" name="college_1" placeholder= "Select College" class="required" >
							<option value="">Select College</option>
							<?php
							$query = "SELECT college_name from college_list where status = 1";
							$result = mysqli_query($conn,$query) or die(mysqli_error($conn));
							while($row = mysqli_fetch_array($result))
							{
							
								$college_name = $row['college_name'];
							
								?>
								<option value="<?php echo $college_name;?>"><?php echo $college_name;?></option>
								<?php
							}
							?>
						</select>
					</div>
					<br>
					<div class="row">
						<select class="form-control" id="passing_year_1" name="passing_year_1" placeholder= "passing_year" class="required" >
							<option value="">Select Passing Year</option>
							<option value="2017">2017</option>
							<option value="2016">2016</option>
							<option value="2015">2015</option>
							<option value="2014">2014</option>
							<option value="2013">2013</option>
							<option value="2012">2012</option>
							<option value="2011">2011</option>
							<option value="2010">2010</option>
							<option value="2009">2009</option>
							<option value="2008">2008</option>
							<option value="2007">2007</option>
							<option value="2006">2006</option>
							<option value="2005">2005</option>
							<option value="2004">2004</option>
							<option value="2003">2003</option>
							<option value="2002">2002</option>
							<option value="2001">2001</option>
							<option value="2000">2000</option>
						</select>
					</div>
					<br>
					<div class="row" >
						<input type="text" name="major_1" class="form-control" id = "major_1" placeholder="Major">
					</div>
					<div class="row" >
						<input type="text" name="aggregate_percentage_1" id = "aggregate_percentage_1" class = "form-control" placeholder="Passing Perentage/CGPA">
					</div>


					<div id="msg" style="color : red;">
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="add_education" style="float: right;color:blue;">
		<a href="#">
			+Add Education
		</a>
	</div>
	<input type="button" name="next" class="next action-button" value="Next" />