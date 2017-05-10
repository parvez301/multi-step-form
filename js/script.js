 //demo 01
 var education_count = 1;
 var user_data = {}
 $(".full-modal").animatedModal({
  color : '#fff'
});
 $(function() {
//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches
$(".next").click(function(){
  console.log($("#career_form").serialize());
  if($("#course_1").val())
  {
    user_data.course = $("#course_1").val();
  }
  if($("#college_1").val())
  {
    user_data.college = $("#college_1").val();
  }
  if($("#passing_year_1").val())
  {
    user_data.passing_year = $("#passing_year_1").val();
  }
  if($("#major_1").val())
  {
    user_data.major = $("#major_1").val();
  }
  if($("#aggregate_percentage_1").val())
  {
    user_data.marks = $("#aggregate_percentage_1").val();
  }

  if($("#fresher").is(":checked"))
  {
    user_data.work_status = $("#fresher").val();
  }
  if($("#working_professional").is(":checked"))
  {
    user_data.work_status = $("#working_professional").val();
    user_data.job_title = $("#job_title").val();
    user_data.job_experience = $("#year_in_experience").val();
    user_data.company_name = $("#company_name").val();
    user_data.company_type = $("#company_type").val();
  }
  if(($('input:checkbox:checked.tag_select').map(function () {
    return this.value;
  }).get().length) > 0)
  {
    user_data.skills = $('input:checkbox:checked.tag_select').map(function () {
      return this.value;
    }).get();
  }
  console.log(education_count);
  console.log(user_data);
  //First Check For Validation

  var form = $("#career_form");
  form.validate({
    errorElement: 'span',
    errorClass: 'help-block',
    highlight: function(element, errorClass, validClass) {
      $(element).closest('.form-group').addClass("has-error");
    },
    unhighlight: function(element, errorClass, validClass) {
      $(element).closest('.form-group').removeClass("has-error");
    },
    rules:{
      course_1:{
        required:true,
      },
      college_1: {
        required : true,
      },
      passing_year_1 : {
        required : true,
      },
      major_1 : {
        required : true,
      },
      aggregate_percentage_1 : {
        required : true,
      },
      work_status : {
        required : true,
      },
      job_title : {
        required : function(element){
          if($("#working_professional").is(':checked'))
          {
            return true
          }
        }
      },
      company_name : {
        required : true,
      },
      company_type : {
        required : true,
      },
      year_in_experience : {
        required : true,
      },
      /*skills : {
        required : true,
      },*/
    },
    messages : {
      course_1 : {
        required : 'Please Select Course',
      },
      college_1 : {
        required : 'Please Select college',
      },
      passing_year_1 : {
        required : 'Select Your passing_year',
      },
      major_1 : {
        required : 'Please Enter Your Major',
      },
      aggregate_percentage_1 : {
        required : 'Please Enter Your Percentage',
      },
      work_status : {
        required : 'Choose Any One',
      },
      job_title : {
        required : 'Select Your Job Title',
      },
      company_name : {
        required : 'Enter Your Company Name'
      },
      company_type : {
        required : 'Select Your Company Type',
      },
      year_in_experience : {
        required : 'Please Select How Much Exeperience You Have',
      },
     /* skills : {
        required : 'Do not forget to mention your skills',
      },*/
    },

  });
  if (form.valid() === true){

    if(animating) return false;
    animating = true;
    if ($('#education_details').is(":visible")){
      current_fs = $("#education_details");
      next_fs = $("#work_details");
    }
    else if($('#work_details').is(":visible"))
    {
     current_fs = $("#work_details");
     next_fs = $("#skill_details");
   }
   else if($('#skill_details').is(":visible"))
   {
     current_fs = $("#skill_details");
     next_fs = $("#login");
   }
   $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
   next_fs.show();
   current_fs.animate({opacity: 0}, {
    step: function(now, mx) {
      //as the opacity of current_fs reduces to 0 - stored in "now"
      //1. scale current_fs down to 80%
      scale = 1 - (1 - now) * 0.2;
      //2. bring next_fs from the right(50%)
      left = (now * 50)+"%";
      //3. increase opacity of next_fs to 1 as it moves in
      opacity = 1 - now;
      current_fs.css({'transform': 'scale('+scale+')'});
      next_fs.css({'left': left, 'opacity': opacity});
    }, 
    duration: 800, 
    complete: function(){
      current_fs.hide();
      animating = false;
    }, 
    //this comes from the custom easing plugin
    easing: 'easeInOutBack'
  });
 }
});
 $(".previous").click(function(){
  if(animating) return false;
  animating = true;
  if ($('#login').is(":visible")){
    current_fs = $("#login");
    next_fs = $("#skill_details");
  }
  else if($('#skill_details').is(":visible"))
  {
   current_fs = $("#skill_details");
   next_fs = $("#work_details");
 }
 else if($('#work_details').is(":visible"))
 {
   current_fs = $("#work_details");
   next_fs = $("#education_details");
 }
  //de-activate current step on progressbar
  $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
  //show the previous fieldset
  next_fs.show(); 
  //hide the current fieldset with style
  current_fs.animate({opacity: 0}, {
    step: function(now, mx) {
      //as the opacity of current_fs reduces to 0 - stored in "now"
      //1. scale previous_fs from 80% to 100%
      scale = 0.8 + (1 - now) * 0.2;
      //2. take current_fs to the right(50%) - from 0%
      left = ((1-now) * 50)+"%";
      //3. increase opacity of previous_fs to 1 as it moves in
      opacity = 1 - now;
      current_fs.css({'left': left});
      next_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
    }, 
    duration: 800, 
    complete: function(){
      current_fs.hide();
      animating = false;
    }, 
    //this comes from the custom easing plugin
    easing: 'easeInOutBack'
  });
});

});

 var count = 0;
 /*$('#course_'+education_count).on('change',function(){
  var course = $(this).val();
  $.ajax({
    type: 'POST',
    url : 'college_list.php',
    data : {course : course},
    success : function(html)
    {
      $('#college_'+education_count).html(html);
    }
  });
});*/

 $(".add_education").on('click',function(){
  if(education_count > 1)
  {
    var items = $("#ed_details .form-control").slice(0,5);
  }
  else
  {
    var items = $("#ed_details .form-control");
  }
  education_count++;
  var output = $("#first").html();
  
  console.log(items.length);
  for(var i=0;i<items.length;i++)
  {
    if(education_count - 1 > 1)
    {

      items[i].name = items[i].name.substring(0,items[i].name.length - 2);
      items[i].id = items[i].id.substring(0,items[i].id.length - 2);
      if(items[i].id = 'course')
      {
        $("$"+items[i].id).addClass('new');
        alert("added");
      }
      $("#"+items[i].id).attr('name',items[i].name+'_'+education_count);
      $("#"+items[i].id).attr('id',items[i].id+'_'+education_count);
      var name = items[i].name;
      var id = items[i].id;
       //sets up the validator
       $( "#"+items[i].id ).rules( "add", {
        required: true,
        messages: {
          required: "Required input",
        }
      });
       $("#career_form").validate();
     }
     else
     {
      items[i].name = items[i].name.substring(0,items[i].name.length - 2);

      items[i].id = items[i].id.substring(0,items[i].id.length - 2);
      $("#"+items[i].id).attr('name',items[i].name+'_'+education_count);
      $("#"+items[i].id).attr('id',items[i].id+'_'+education_count);

    }
    console.log(items[i].id + ' and ' + items[i].name);
  }
  
  $("#ed_details").append("<br><p style='text-align:center;'>Add Education</p>"+output);
  $("#ed_details").append("<div class='remove_education' style='float: lefyt;color:blue;'> <a href='#'> -Remove Education</a></div>'");

  return false;
});


 $(".add_work").on('click',function(){

 });
 $("#working_professional").on('click',function(){
  $("#work_experience").removeClass('hidden');
});
 $("#fresher").on('click',function(){
  $("#work_experience").addClass('hidden');
});
 $(".tag_select").click(function(){
  var data = $(this).data();
  console.log(data)

  var id = data.id;
  $(this).toggleClass("red");
  if($(this). prop("checked") == true)
  {
    var name = data.name;
    var worth = data.worth;
    var output = "<div class='selected_tags' id='selected_tag_"+id+"'";
    output += " name='tag_"+id+"'";
    output += " value ="+worth;
    output += ">"+name+"<a href='javascript:void(0)' class='remove glyphicon glyphicon-remove' id='remove_'"+id+" data-id="+id+"></a></div>";
    $("#tags").append(output);
    count++;
  }
  else
  {
    $("#selected_tag_"+id).remove();
    count--;
  }
});
 $("#tags").on('click','.remove',function(){
  var tag_id = $(this).data('id');
  $("#selected_tag_"+tag_id).remove();
  $("#tag_select_"+tag_id).prop('checked',false);
  count--;
  console.log(count);
});
 function filter(element) {
  var value = $(element).val();
  value = value.toLowerCase().replace(/\b[a-z]/g, function(letter) {
    return letter.toUpperCase();
  });
  $('.menu > li:not(:contains(' + value + '))').hide(); 
  $('.menu > li:contains(' + value + ')').show();
}
// $("#working_from").datepicker({
//         numberOfMonths: 2,
//         onSelect: function (selected) {
//             var dt = new Date(selected);
//             dt.setDate(dt.getDate() + 1);
//             $("#working_till").datepicker("option", "minDate", dt);
//         }
//     });
//     $("#working_till").datepicker({
//         numberOfMonths: 2,
//         onSelect: function (selected) {
//             var dt = new Date(selected);
//             dt.setDate(dt.getDate() - 1);
//             $("#working_from").datepicker("option", "maxDate", dt);
//         }
//     });
// $(".a").on('click',function(){
//   $.ajax({
//     type: 'POST',
//     url : 'backend.php',
//     data : {data : user_data},
//     success : function(response)
//     {
//       alert(response);
//       console.log(response);
//     }
//   })
// });
