<?php
class User {
    private $dbHost     = "localhost";
    private $dbUsername = "root";
    private $dbPassword = "-bus@[46f9)";
    private $dbName     = "coursegrab";
    private $userTbl    = 'user_table';
    
    function __construct(){
        if(!isset($this->db)){
            // Connect to the database
            $conn = new mysqli($this->dbHost, $this->dbUsername, $this->dbPassword, $this->dbName);
            if($conn->connect_error){
                die("Failed to connect with MySQL: " . $conn->connect_error);
            }else{
                $this->db = $conn;
            }
        }
    }  

    function fbcheckUser($oauth_provider,$oauth_uid,$fname,$lname,$email,$gender,$locale,$picture){

        $prev_query = mysqli_query($this->db,"SELECT * FROM ".$this->userTbl." WHERE oauth_provider = '".$oauth_provider."' AND oauth_uid = '".$oauth_uid."'") or die(mysql_error($conn));
        if(mysqli_num_rows($prev_query)>0){
            $update = mysqli_query($this->db,"UPDATE ".$this->userTbl." SET oauth_provider = '".$oauth_provider."', oauth_uid = '".$oauth_uid."', first_name = '".$fname."', last_name = '".$lname."', email = '".$email."', gender = '".$gender."', locale = '".$locale."', picture = '".$picture."', modified_on = '".date("Y-m-d H:i:s")."' WHERE oauth_provider = '".$oauth_provider."' AND oauth_uid = '".$oauth_uid."'");
        }else{
            $insert = mysqli_query($this->db,"INSERT INTO ".$this->userTbl." SET oauth_provider = '".$oauth_provider."', oauth_uid = '".$oauth_uid."', first_name = '".$fname."', last_name = '".$lname."', email = '".$email."', gender = '".$gender."', locale = '".$locale."', picture = '".$picture."', created_on = '".date("Y-m-d H:i:s")."', modified_on = '".date("Y-m-d H:i:s")."'");
        }
        
        $query = mysqli_query($this->db,"SELECT * FROM ".$this->userTbl." WHERE oauth_provider = '".$oauth_provider."' AND oauth_uid = '".$oauth_uid."'");
        $result = mysqli_fetch_array($query);
        return $result;
    }

    function gpcheckUser($userData = array()){
        if(!empty($userData)){
            //Check whether user data already exists in database
            $prevQuery = "SELECT * FROM ".$this->userTbl." WHERE oauth_provider = '".$userData['oauth_provider']."' AND oauth_uid = '".$userData['oauth_uid']."'";
            $prevResult = $this->db->query($prevQuery);
            if($prevResult->num_rows > 0){
                //Update user data if already exists
                $query = "UPDATE ".$this->userTbl." SET first_name = '".$userData['first_name']."', last_name = '".$userData['last_name']."', email = '".$userData['email']."', gender = '".$userData['gender']."', locale = '".$userData['locale']."', picture = '".$userData['picture']."', profle_link = '".$userData['link']."', modified_on = '".date("Y-m-d H:i:s")."' WHERE oauth_provider = '".$userData['oauth_provider']."' AND oauth_uid = '".$userData['oauth_uid']."'";
                $update = $this->db->query($query);
            }else{
                //Insert user data
                $query = "INSERT INTO ".$this->userTbl." SET oauth_provider = '".$userData['oauth_provider']."', oauth_uid = '".$userData['oauth_uid']."', first_name = '".$userData['first_name']."', last_name = '".$userData['last_name']."', email = '".$userData['email']."', gender = '".$userData['gender']."', locale = '".$userData['locale']."', picture = '".$userData['picture']."', profile_link = '".$userData['link']."', created_on = '".date("Y-m-d H:i:s")."', modified_on = '".date("Y-m-d H:i:s")."'";
                $insert = $this->db->query($query);
            }         
            //Get user data from the database
            $result = $this->db->query($prevQuery);
            $userData = $result->fetch_assoc();
        }        
        //Return user data
        return $userData;
    }
}
/*
Function to dispay pagination across the pages
*/
function displayPaginationBelow($per_page,$page,$total){
  $page_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  if(strpos($page_url,'?'))
    {
        $page_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
         $page_url = preg_replace("/(page\=[0-9]+[\&]*)/", "", $page_url); 
      $page_url .= '&';
    }
    else{
       $page_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $page_url = preg_replace("/(page\=[0-9]+[\&]*)/", "", $page_url); 
       $page_url .= '?';
    }
$adjacents = "2";
$page = ($page == 0 ? 1 : $page); 
$start = ($page - 1) * $per_page;                              
$prev = $page - 1;                         
$next = $page + 1;
$setLastpage = ceil($total/$per_page);
$lpm1 = $setLastpage - 1;
$setPaginate = "";
if($setLastpage > 1)
{  
   $setPaginate .= "<div class = 'pagination col-lg-12 col-md-12 col-sm-12 col-xs-12' style='text-align:center' ><ul class='setPaginate'>";
    $setPaginate .= "<li class='setPage'>Page $page of $setLastpage</li>";
    if ($setLastpage < 7 + ($adjacents * 2))
    {  
        for ($counter = 1; $counter <= $setLastpage; $counter++)
        {
            if ($counter == $page)
                $setPaginate.= "<li><a class='current_page'>$counter</a></li>";
            else
                $setPaginate.= "<li><a href='{$page_url}page=$counter'>$counter</a></li>";                 
        }
    }
    elseif($setLastpage > 5 + ($adjacents * 2))
    {
        if($page < 1 + ($adjacents * 2))    
        {
            for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
            {
                if ($counter == $page)
                    $setPaginate.= "<li><a class='current_page'>$counter</a></li>";
                else
                    $setPaginate.= "<li><a href='{$page_url}page=$counter'>$counter</a></li>";                 
            }
            $setPaginate.= "<li class='dot'>...</li>";
            $setPaginate.= "<li><a href='{$page_url}page=$lpm1'>$lpm1</a></li>";
            $setPaginate.= "<li><a href='{$page_url}page=$setLastpage'>$setLastpage</a></li>";     
        }
        elseif($setLastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
        {
            $setPaginate.= "<li><a href='{$page_url}page=1'>1</a></li>";
            $setPaginate.= "<li><a href='{$page_url}page=2'>2</a></li>";
            $setPaginate.= "<li class='dot'>...</li>";
            for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
            {
                if ($counter == $page)
                    $setPaginate.= "<li><a class='current_page'>$counter</a></li>";
                else
                    $setPaginate.= "<li><a href='{$page_url}page=$counter'>$counter</a></li>";                 
            }
            $setPaginate.= "<li class='dot'>..</li>";
            $setPaginate.= "<li><a href='{$page_url}page=$lpm1'>$lpm1</a></li>";
            $setPaginate.= "<li><a href='{$page_url}page=$setLastpage'>$setLastpage</a></li>";     
        }
        else
        {
            $setPaginate.= "<li><a href='{$page_url}page=1'>1</a></li>";
            $setPaginate.= "<li><a href='{$page_url}page=2'>2</a></li>";
            $setPaginate.= "<li class='dot'>..</li>";
            for ($counter = $setLastpage - (2 + ($adjacents * 2)); $counter <= $setLastpage; $counter++)
            {
                if ($counter == $page)
                    $setPaginate.= "<li><a class='current_page'>$counter</a></li>";
                else
                    $setPaginate.= "<li><a href='{$page_url}page=$counter'>$counter</a></li>";                 
            }
        }
    }
    if ($page < $counter - 1){
        $setPaginate.= "<li><a href='{$page_url}page=$next'>Next</a></li>";
        $setPaginate.= "<li><a href='{$page_url}page=$setLastpage'>Last</a></li>";
    }else{
        $setPaginate.= "<li><a class='current_page'>Next</a></li>";
        $setPaginate.= "<li><a class='current_page'>Last</a></li>";
    }
    $setPaginate.= "</ul></div>\n";    
}
return $setPaginate;
}
