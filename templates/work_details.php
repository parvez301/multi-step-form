<h2 class="fs-title">Work Experience</h2>
<div class="form-group" >
	<div class="row">

		<ul class="work_status">
			<li>
				<input type="radio" id="fresher" name="work_status" value="fresher" />
				<label for="fresher">Fresher?</label>
			</li>
			<li>
				<input type="radio" id="working_professional"  name="work_status" value="working" />
				<label for="working_professional">Working Professional?</label>
			</li>
		</ul>
	</div>
</div>
<br>
<div class="hidden" id = "work_experience">
	<div id="w_details">
		<div id = "second">
			<div class="form-group work">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<select class="form-control" id="job_title" name="job_title" placeholder= "What's Your Job Title" class="required" >
							<option value="">Select Your Job Title</option>
							<?php
							$query = "SELECT id,job_title,slug from job_titles_list where status = 1";
							$result = mysqli_query($conn,$query) or die(mysqli_error($conn));
							while($row = mysqli_fetch_array($result))
							{
								$job_id = $row['id'];
								$job_title = $row['job_title'];
								$slug = $row['slug'];

								?>
								<option value="<?php echo $slug;?>"><?php echo $job_title;?></option>
								<?php
							}
							?>
						</select>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<input class="form-control" type="text" name="company_name" id="company_name" placeholder="Your Comapany's Name" >
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<select class="form-control" id="company_type" name="company_type">
							<option value="">Type Of Company</option>
							<option value="Startup">Start Up</option>
							<option value="IT Services">IT Solutions</option>
							<option value="Product Based Company">Product Based Company</option>
						</select>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-2 col-sm-2 col-xs-2">
						<label for="working_from">From:</label>
					</div>
					<div class="col-md-10 col-sm-10 col-xs-10">
						<input type="date" name="working_from" id="working_from" class="form-control">
					</div>
				</div>
				<div class="row">
					<div class="col-md-2 col-sm-2 col-xs-2">
						<label for="working_till">Till:</label>
					</div>
					<div class="col-md-10 col-sm-10 col-xs-10">
						<input type="date" name="working_till" id="working_till" class="form-control">
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<select class="form-control" id="year_in_experience" name="year_in_experience" >
							<option value = "">Years of experience</option>
							<option value="1">0-1</option>
							<option value="2">1-3</option>
							<option value="3">3-5</option>
							<option value="4">5-7</option>
							<option value="5">7-10</option>
							<option value="6">10+</option>
						</select>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="hidden add_work" style="float: right;color:blue;">
	<a href="#">
		+Add work
	</a>
</div>
</div>
<div class="hidden add_work" style="float: right;color:blue;">
	<a href="#">
		+Add work
	</a>
</div>
<input type="button" name="previous" class="previous action-button" value="Previous" />
<input type="button" name="next" class="next action-button" value="Next" />