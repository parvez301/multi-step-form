<div id="animatedModal" >
	<div class="container">
		<!--THIS IS IMPORTANT! to close the modal, the class name has to match the name given on the ID -->
		<div  id="btn-close-modal" class=" close-animatedModal"> 
			<img src="http://www.ziffyhomes.com/image/data/graphics/close.svg">
		</div>
		<div class="row related">
			<div id="tags" class="outline">
			</div> 
		</div> 
		<div class="row">
			<div class="col-md-10">
				<ul id="skill_menu" class="nav nav-pills nav-justified">
					<li class="active" style="width: 25%;"><a data-toggle="pill" href="#home">Tecnical Skills</a></li>
					<li style="width: 25%;"> <a data-toggle="pill" href="#menu3">Sales and Marketing</a></li>
					<li style="width: 25;%"><a data-toggle="pill" href="#menu1">Management Skills</a></li>
					<li style="width: 25%;" ><a data-toggle="pill" href="#menu2">Finance</a></li>
				</ul>
			</div>
		</div>
		<!--Your modal content goes here-->
		<br>
		<div class="form-group">
			<input type="text" name="filter_skills" onkeyup="filter(this)"  class= "form-control search_skills" placeholder="Search..">
		</div>
		<div class="tab-content">
			<div id="home" class="tab-pane fade in active">
				<?php
				$query = "SELECT skill_type , GROUP_CONCAT(skill_name) as skill_names , GROUP_CONCAT(slug) as slugs, GROUP_CONCAT(skill_id) as skill_id, GROUP_CONCAT(worth) as worth from skills_list GROUP BY skill_type order by worth";
				$result = mysqli_query($conn,$query) or die(mysqli_error($conn));
				while($row = mysqli_fetch_array($result))
				{
					$skill_type = $row['skill_type'];
					$skill_names = $row['skill_names'];
					$slugs = $row['slugs'];
					$slugs = explode(',', $slugs);
					$worth = $row['worth'];
					$worth = explode(',',$worth);
					$skill_id = $row['skill_id'];
					$skill_id = explode(',',$skill_id);
					$skill_names = explode(',',$skill_names);
					?>
					<div class="row select">
						<div class="col-md-4">
							<h4><?php echo $skill_type;?></h4 >
							</div>
							<div class="col-md-8">

								<div class="outline">
									<ul class="menu" style="display: inline-block;">
										<?php
										foreach ($skill_names as $index => $skill_name) {
											?>
											<li ><input type="checkbox" name="tech_skill_name[]" class = "tag_select" id = "tag_select_<?php echo $skill_id[$index];?>" data-id = "<?php
												echo $skill_id[$index];?>" data-name = "<?php echo $skill_name;?>"  data-worth =  "<?php echo $worth[$index];?>" data-skill_type = "<?php echo $skill_type;?>" value = "<?php echo $skill_name;?>"><?php echo $skill_name;?></li>
												<?php
											}
											?>
										</ul>
									</div>
								</div>
							</div>
							<?php
						}
						?>
					</div>
					<div id="menu1" class="tab-pane fade">
						<h3>Menu 1</h3>
						<p>Some content in menu 1.</p>
					</div>
					<div id="menu2" class="tab-pane fade">
						<h3>Menu 2</h3>
						<p>Some content in menu 2.</p>
					</div>
					<div id="menu3" class="tab-pane fade">
						<h3>Menu 2</h3>
						<p>Some content in menu 2.</p>
					</div>
				</div>
			</div>
		</div>