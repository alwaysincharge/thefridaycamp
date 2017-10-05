

<?php  include_once('../../../includes/all_classes_and_functions.php');  ?>


<?php $session->if_not_logged_in($_SESSION['url_placeholder'] . 'login'); ?>


<?php

$user_details = $user->find_one_user($_SESSION['admin_id']);

$user_details_result = $user_details->get_result();

$user_info = $user_details_result->fetch_assoc();


?>



<html lang="en">
    
    
    
    
<head>
    
    
	<title>Friday Camp - connect with people, you already know.</title>
    
    <meta name="description" content="Create, display and update your resume, find jobs, find a co-founder, message your hero, meet other techies, all here.">
    
    <?php include('../templates/head_info.php'); ?>
    
    
</head>
    
    
    
    
    
<body class="dashboard-body" style="min-height: 110%;">
    
    
    

    
    
   <nav class="nav-head">
    
    <div class="row nav-main-row">
        
        
        <div class="col-xs-6">
            
            <a class="logo-heading-1">friday camp <span class="logo-heading-2">//</span> <span class="logo-heading-3">
                <?php
                
                $get_find_group_by_id = $group->find_group_by_id($_GET['group']);

                $get_find_group_by_id_result = $get_find_group_by_id->get_result();

             
                    while($group_name = $get_find_group_by_id_result->fetch_assoc()) {
                        
                        echo $group_name['name'];
                        
                    }
                
                ?>
               </span></a>
                            
        </div>
        
        
        
        
        <div class="col-xs-6">
            
            
            <div style="float: right;">
            
            
            <input id="myTextBox"  maxlength="100" name="keywords" class="search-main" placeholder="Search group chat and files" />
                
            
            
            
            <a href="<?php echo $_SESSION['url_placeholder'];  ?>newgroup">
                
            <button class="btn new-group-1">   
                    
            Create group</button>
            
            </a>
            
            
                <div class="dropdown">
           
                      <img src="<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/notification.svg" width="35" height="35" class="current-user-img"  />
                    
                <div class="dropdown-content">
                    
                      <?php
                    
                    
                      $request_list = $request->current_member_requests($_SESSION['admin_id']); 
          
                      $request_list_result = $request_list->get_result();
          
          
                      if ($request_list_result->num_rows > 0) {
              
                        
                          while($row_list_request = $request_list_result->fetch_assoc()) { ?>
                              
                              
                                <?php 
                              
                                $group_details = $group->find_group_by_id($row_list_request['group_id']); 
          
                                $group_details_result = $group_details->get_result();
                              
                                $row_group = $group_details_result->fetch_assoc();
                              
                                
                              
                              
                              
                              
                                $user_details = $user->find_one_user($row_list_request['sender_id']); 
          
                                $user_details_result = $user_details->get_result();
                              
                                $row_user = $user_details_result->fetch_assoc();
                                                                                          
                                ?>
                    
                    
                              
                              <div class="row" id="group<?php echo $row_group['id'];  ?>">
                    
                                  <div class="col-xs-2">
                                  
                                      <img src="<?php echo $row_group['img_path'];  ?>" width="35" height="35" class="current-user-img"  />
                                  
                                  </div>
                    
                                  
                                  
                                  <div class="col-xs-6" style="font-weight: bold; font-size: 16px;font-family: Josefin Slab;">
                                  <p><?php echo $row_user['username'];  ?> wants you to join <span style="color: blue;"><?php echo $row_group['name'];  ?></span></p>
                                  
                                  </div>
                                  
                                  
                                  <div class="col-xs-4">
                                      
                                      
                                      <form method="post" action="<?php echo $_SESSION['url_placeholder'];  ?>accept_request" style="width: 30px; display: inline;">
                                      
                                      <input type="text" name="group_id" style="display: none;" value="<?php echo $row_group['id'];  ?>" />
                                         
                                          
                                      
                                          
                                     <input type="submit" name="submit" value="accept" class="btn" style="outline: 0px ! important; font-weight: bold; font-size: 14px;font-family: Josefin Slab; background: #ddd; padding: 7px; border-radius: 4px; margin-right: 1px;" /> 
                                      
                                      
                                      </form>
                                      
                                      
                                              
                                      
                                      
                                      
                                      
                                                      <div style="width: 30px; display: inline;">
                                      

                                         
                                          
                                      
                                          
                                     <input type="submit" onclick="myFunction('<?php echo $row_group['id'];  ?>')" name="submit" value="decline" class="btn" style="font-weight: bold; font-size: 14px;font-family: Josefin Slab; background: #ddd; padding: 7px; border-radius: 4px; margin-right: 0px;" /> 
                                      
                                      
                                      </div>
                                      
                                      

                                  
                                  </div>
                    
                    
                              </div>
                              
                       <?php   }
                          
                          
        
                      } else {
                          
                          echo "none";
                      }
            
                    
                      ?>
                    
                </div>
                    
                </div>
                
                <div class="dropdown">
            
            <img src="<?php echo $_SESSION['url_placeholder'];  ?><?php echo $user_info['img_path'];  ?>" width="35" height="35" class="current-user-img"  />
                    
                    
                    <div class="dropdown-content-2">
                        <a href="<?php echo $_SESSION['url_placeholder'];  ?>profile" style="font-size: 15px; font-family: Work Sans;">Edit profile</a> //
                        <a href="<?php echo $_SESSION['url_placeholder'];  ?>logout" style="font-size: 15px; font-family: Work Sans;">Logout</a>
                    </div>
            
                </div>
            
            </div>
            
                    
        </div>
        
        
        
       </div>
    
    </nav>

                    
    
    
    
    
            <div class="row main-body-div">
                
                
                
                <div class="col-xs-9">
                
                
                <div>
                    
                
                <div class="col-xs-1" style="">
                    
                    
                <div>
                    
                     
                <img src="
                              
                <?php
                
                $get_find_group_by_id = $group->find_group_by_id($_GET['group']);

                $get_find_group_by_id_result = $get_find_group_by_id->get_result();

             
                    while($group_img = $get_find_group_by_id_result->fetch_assoc()) {
                        
                        echo $group_img['img_path'];
                        
                    }
                
                ?>   " width="70" height="70" class="writer-profile-img"  />
                    
                   
                    
                </div>    
                
                
                </div>
                
                
                
                
                <div class="col-xs-11">
                    
                    
                    
                    <div id="content-div">
                    
                    
                    
                        
                        
                        
                        
                           
                    <div class="row post-editor">
                        
                    
                        
                        
                    <div class="col-xs-2" id="chatboxicon" style="cursor: pointer;">
                        
                        <img src="<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/chatbox.svg" class="input-style-1"  />
                        
                        <p class="input-style-2">Chat</p>
                        
                    </div>
                        
                        
                        
                        
                      
                  
                        
                        
                        
                        
                    <div class="col-xs-2">
                        
                        <img src="<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/camera.svg" class="input-style-1"  />
                        
                         <p class="input-style-2">Photo/Album</p>
                        
                    </div>
                        
                        
                        
                        
                        
                    <a href="<?php echo $_SESSION['url_placeholder'] . "todo/" . $_GET['group'];  ?>"><div class="col-xs-2">
                        
                        <img src="<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/list.svg" class="input-style-1" />
                        
                         <p class="input-style-2">To-do list</p>
                        
                        </div></a>
                        
                        
                        
                        
                        
                        
                    <div class="col-xs-2" id="pollicon" style="cursor: pointer;">
                        
                        <img src="<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/hands.svg" class="input-style-1"  />
                        
                         <p class="input-style-2">Polls</p>
                        
                    </div>
                        
                        
                       
                       <a href="<?php echo $_SESSION['url_placeholder'] . "members/" . $_GET['group'];  ?>">
                        <div class="col-xs-2">
                        
                        <img src="<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/network.svg" class="input-style-1"  />
                        
                         <p class="input-style-2">Members</p>
                        
                        </div> </a> 
                        
                        
                        
                        
                        
                          
                       <a href="<?php echo $_SESSION['url_placeholder'] . "members/" . $_GET['group'];  ?>">
                        <div class="col-xs-2">
                        
                        <img src="<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/save.svg" class="input-style-1"  />
                        
                         <p class="input-style-2">Likes</p>
                        
                        </div> </a> 
                    
                    </div>
                    
                    
                    
                    
                    
                    
                   <div id="chatbox" style="display: none; margin-bottom: -40px;">
                    
                        <textarea id="text" type="text" class="search-main" maxlength="200" placeholder="write something" style="margin-bottom: 10px; width: 100%; height: 70px; resize: none; outline: none;"></textarea>
                       
                       
                       
                                              
                       <label id="file1label" for="file1" class="custom-file-upload" style="display: none; background: #ddd; padding: 6px; border-radius: 4px; font-family: Josefin Slab;
   font-size: 16px; cursor: pointer;
   font-weight: bold;">
    select file
</label>
                       <input type="file" id="file1" class="btn" style="display: none;"/><br>
                       
                       <!-- <input type="button" value="Upload file" onclick="uploadFile()" /><br> -->
                       
                       <progress value="0" max="100" id="progressBar" style="height: 5px; width: 250px; display: none;"></progress> 
                       
                       <a id="status" style="display: inline; font-family: Josefin Slab;
   font-size: 26px;
   font-weight: bold; color: blue; margin-left: 20px;"></a>
                       
                       
                       <a id="progressMessage" style="font-family: Josefin Slab;
   font-size: 16px;
   font-weight: bold;"></a>
                       
                       
                       
                       
                       
                       
                       
                       
                       
                       
                     
                    
                        <a id="chatboxfile"><img src="<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/attachment.svg" style="width: 13px; cursor: pointer;"  /></a>
                    
                        <a id="chatboxclose"><img src="<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/cancel.svg" style="width: 13px; margin-left: 10px; cursor: pointer;"  /></a> <br><br>
                       
                       

                
                    
                   </div> 
                    
                
                    
                    
                    <div id="pollbox" style="display: none; ">
                        
                        <p style="font-family: Work Sans; cursor: pointer;">Create a poll | <span><a onclick="window.location='<?php echo $_SESSION['url_placeholder'] . "poll/" . $_GET['group'];   ?>';">View all polls in this group.</a></span></p>
                        
                        
                    <textarea id="poll-q" type="text" class="poll-q-style" maxlength="140" placeholder="write a poll question."></textarea>  
                        
                    <textarea id="poll-a1" type="text" class="poll-a-style" maxlength="140" placeholder="answer 1"></textarea>
                        
                    <textarea id="poll-a2" type="text" class="poll-a-style" maxlength="140" placeholder="answer 2"></textarea>
                        
                    <textarea id="poll-a3" type="text" class="poll-opt-show" maxlength="140" placeholder="answer 3 (optional)"></textarea>
                        
                    <textarea id="poll-a4" type="text" class="poll-opt" maxlength="140" placeholder="answer 4 (optional)"></textarea>
                        
                    <textarea id="poll-a5" type="text" class="poll-opt" maxlength="140" placeholder="answer 5 (optional)"></textarea>
                        
                    <textarea id="poll-a6" type="text" class="poll-opt" maxlength="140" placeholder="answer 6 (optional)"></textarea>
                        
                        
                    <textarea id="poll-a7" type="text" class="poll-opt" maxlength="140" placeholder="answer 7 (optional)"></textarea>
                        
                    <textarea id="poll-a8" type="text" class="poll-opt" maxlength="140" placeholder="answer 8 (optional)"></textarea>
                        
                    <textarea id="poll-a9" type="text" class="poll-opt" maxlength="140" placeholder="answer 9 (optional)"></textarea>
                        
                    <textarea id="poll-a10" type="text" class="poll-opt" maxlength="140" placeholder="answer 10 (optional)"></textarea>
                        
                        
                    <br>
                        
                        <p id="pollerror"></p>
                        
                    <a id="submitpoll">
                
                    <button class="btn poll-1">   
                    
                    Submit</button>
            
                    </a> 
                        
                        
                        
                    <a id="pollboxclose"><img src="<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/cancel.svg" style="width: 13px; margin-left: 10px; cursor: pointer;"  /></a> <br>
                        
                        
                    </div>
                 
                    
                    
                    
                    
                    
<div id="postsdiv" style="margin-top: 40px;">
                        

                            
                        <!-- Posts go here. -->                        
            
                        
                    </div>
                        
                        
                        
                        
                        
                        
                        <div style="display: table; margin: 0 auto;">
                        
                                                <p id="start" style="display: none; margin-bottom: 30px; font-size: 20px; font-family: Eczar;">
                        
                        Be the first to make a post. 
                        </p>
                        
                        
                        
                        <p id="continue" style="display: none; margin-bottom: 30px; font-size: 20px; font-family: Eczar;">
                        
                        Be the first to make a post. 
                        </p>
                        
                        
                        <p id="end" style="display: none; margin-bottom: 30px; font-size: 20px; font-family: Eczar;">
                        
                        End of posts.
                        </p>
                        
                        
                        </div>
                        

                
                        
                        
                        
                        
                        
                    
                    </div>
                    
                 
                    
                    <div id="search-div" style="display: none;">
                    
                    
                        
                    <p style="display: table; margin: 0 auto; margin-top: 16px; font-weight: bold; font-size: 19px;font-family: Work Sans;">Searching for "<span id="term1"></span>".</p>
                            
                            
                    <div id="areas3" style="margin-top: 40px;">
                                                
                                   
                        <!-- Posts go here. -->                        
            
                        
                    </div>
                            
                            
                        
                        
                    </div>
                    
                    
                </div>
                    
                    
                    
                    

                    
                    

                    </div>
                   

 
                    
                 

                      
                        
                          <div style="display: table; margin: 0 auto;">
                        
                        
                      <!--  <p id="loadagain" style="display: none;">Poor connection. Try again. <a>Here</a></p> -->
                        
                        
                        
                        <img id="loading" style="display: none;" width="60px" height="60px" src="<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/wedges.gif" />
                    
                    
                    
                    </div>
                
                </div>
                
                
            
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
              
                
                
                
                
                
                
                
                
                
                
                
                <div class="col-xs-3 group-list-div">
                    
                    
                    
                    
                    
                <?php
                
                $get_find_group_by_id = $group->find_group_by_id($_GET['group']);

                $get_find_group_by_id_result = $get_find_group_by_id->get_result();

             
                    while($group_list_this = $get_find_group_by_id_result->fetch_assoc()) { ?>
                        
                       
                    
                 <div class="row group-list-row">
                        
                        
                        <div class="col-xs-2">
                            
                           <img src="<?php echo $group_list_this['img_path']; ?>" width="40" height="40" style="group-list-profile-img"  />
                        
                        </div>
                        
                      
                        
                        <div class="col-xs-7 group-list-body">
                            
                            <a class="group-list-name"><?php echo $group_list_this['name']; ?></a><br>                            
                            <a class="group-list-membercount"> <?php
                                                                                            
                                              
$all_members_of_this_group = $member->all_members_of_this_group($group_list_this['id']);

$all_members_of_this_group_result = $all_members_of_this_group->get_result();                                                                  
                                                                                            
                         while($members_this = $all_members_of_this_group_result->fetch_assoc()) { echo $members_this['count'];  }                                                                   
                                                                                            
                                                                                            
                       ?> members</a>
                        
                        </div>
                        
                        
                        
                        <div class="col-xs-3 group-list-notif-1">
                            
                            <img src="<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/view.svg" width="30" height="30" style="group-list-notif-2"  />
                            
                        </div>
                        
                        
                    </div>
                    
                        
                 <?php   }
                
                ?>
                    
                    
                    
  <?php                  
                    
$get_all_groups_of_user = $member->all_users_groups_except($_SESSION['admin_id'], $_GET['group']);

$get_all_groups_of_user_result = $get_all_groups_of_user->get_result();

$numRows = $get_all_groups_of_user_result->num_rows;

      
               if ($numRows > 0) {
                   
                   
                    while($row = $get_all_groups_of_user_result->fetch_assoc()) {
                        
                    
                        
                        
                        
                         $get_find_group_by_id = $group->find_group_by_id($row['group_id']);

                $get_find_group_by_id_result = $get_find_group_by_id->get_result();

             
                    while($group_list_other = $get_find_group_by_id_result->fetch_assoc()) {  ?>
                        
                        
                        
                        
                        
               
                        
                        
                        
                        
                        <div class="row group-list-row" onclick="window.location='<?php echo $_SESSION['url_placeholder'] . "dashboard/" . $group_list_other['id'];   ?>';">
                        
                        
                        <div class="col-xs-2">
                            
                           <img src="<?php  echo $group_list_other['img_path'];   ?>" width="40" height="40" style="group-list-profile-img"  />
                        
                        </div>
                        
                      
                        
                        <div class="col-xs-7 group-list-body">
                            
                            <a class="group-list-name"><?php  echo $group_list_other['name'];   ?></a><br>                            
                            <a class="group-list-membercount">         <?php
                                                                                            
                                              
$all_members_of_this_group = $member->all_members_of_this_group($group_list_other['id']);

$all_members_of_this_group_result = $all_members_of_this_group->get_result();                                                                  
                                                                                            
                         while($members_other = $all_members_of_this_group_result->fetch_assoc()) { echo $members_other['count'];  }                                                                   
                                                                                            
                                                                                            
                       ?> members</a>
                        
                        </div>
                        
                        
                        
                        <div class="col-xs-3 group-list-notif-1">
                            
                            <a class="group-list-notifs">76+</a>
                            
                        </div>
                        
                        
                           </div> 
                        
                        
                        
                        
                        
                        
                        
                  <?php  }
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                    }
                   
                   

               } else {
                   
                   
                   
               } ?>
                    
                    
                    
                    

                    
                    
                    
                    
               
                
                </div>
                
            </div>
    
    


</body>
    
 
    
</html>




    
<script type="text/javascript" src="<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/jquery-3.2.1.min.js"></script>



<script type="text/javascript">
    

 
var url_placeholder = "<?php echo $_SESSION['url_placeholder'];  ?>";  
    
    

page_group_id = "<?php echo $_GET['group'];  ?>";
    
currentArray = [];
    
   var lastTimeID = 0;
    var firstTimeID = 0;
    new_post_id_num = 0;
    new_post_id = "new_post" + new_post_id_num;

    
    
    
    
 $("#poll-a3").on("input", function() {
        
        if ( $(this).val().trim().length > 0 ) { 
               
           $("#poll-a4").show(300);
            
        } 
        
    
});   
    
    
    
$("#poll-a4").on("input", function() {
        
        if ( $(this).val().trim().length > 0 ) { 
               
           $("#poll-a5").show(300);
            
        } 
        
    
});
    
    
    
    
    
    
$("#poll-a5").on("input", function() {
        
        if ( $(this).val().trim().length > 0 ) { 
               
           $("#poll-a6").show(300);
            
        } 
        
    
});
    
    
    
    
$("#poll-a6").on("input", function() {
        
        if ( $(this).val().trim().length > 0 ) { 
               
           $("#poll-a7").show(300);
            
        } 
        
    
});

    
    
$("#poll-a7").on("input", function() {
        
        if ( $(this).val().trim().length > 0 ) { 
               
           $("#poll-a8").show(300);
            
        } 
        
    
});
    
    
    
$("#poll-a8").on("input", function() {
        
        if ( $(this).val().trim().length > 0 ) { 
               
           $("#poll-a9").show(300);
            
        } 
        
    
});
    
    
    
$("#poll-a9").on("input", function() {
        
        if ( $(this).val().trim().length > 0 ) { 
               
           $("#poll-a10").show(300);
            
        } 
        
    
});
    
    
    
 
    
    function pollError(message)  {
        
        $("#pollerror").html(message);
        
    }
    
    
$("#submitpoll").on("click", function() {
    
    
        
     poll_q = $("#poll-q").val();
    
     poll_a1 = $("#poll-a1").val();
    
     poll_a2 = $("#poll-a2").val();  
    
     poll_a3 = $("#poll-a3").val();
    
     poll_a4 = $("#poll-a4").val();
    
     poll_a5 = $("#poll-a5").val();
    
     poll_a6 = $("#poll-a6").val();  
    
     poll_a7 = $("#poll-a7").val();
    
     poll_a8 = $("#poll-a8").val();
    
     poll_a9 = $("#poll-a9").val();
    
     poll_a10 = $("#poll-a10").val();
    
     question_filled = false;
    
     first_two_answers = false;
    
     rank_disparity = false;
    
    
    
    
    
    if (poll_q.trim().length > 0)  {
        
        question_filled = true;
        
    } else {
        
        question_filled = false;
        
        pollError("Poll question cannot be left blank.");
        
    }
    
    
    
    if (question_filled)  {
        
        
        if ( (poll_a1.trim().length > 0) && (poll_a2.trim().length > 0) )  {
        
             first_two_answers = true;
        
        } else {
        
             first_two_answers = false;
        
             pollError("A poll must have at least two answers.");
        
        }
        
        
    }
    
    
    
    if (first_two_answers) {
        
        
        if ( (poll_a3.trim().length == 0) && (poll_a4.trim().length > 0) )  {
        
             rank_disparity = true;
        
        } 
        
        
        
        
        if ( (poll_a4.trim().length == 0) && (poll_a5.trim().length > 0) )  {
            
             rank_disparity = true;
        
        } 
        
        
        
        
        
        if ( (poll_a5.trim().length == 0) && (poll_a6.trim().length > 0) )  {
        
             rank_disparity = true;
        
        } 
        
        
        
        if ( (poll_a6.trim().length == 0) && (poll_a7.trim().length > 0) )  {

        
             rank_disparity = true;
        
        } 
        
        
        
        
        if ( (poll_a7.trim().length == 0) && (poll_a8.trim().length > 0) )  {
            
        
             rank_disparity = true;
        
        }
        
        
        
        
        
        if ( (poll_a8.trim().length == 0) && (poll_a9.trim().length > 0) )  {
    
        
             rank_disparity = true;
        
        } 
        
        
        
        
        
        if ( (poll_a9.trim().length == 0) && (poll_a10.trim().length > 0) )  {
    
        
             rank_disparity = true;
        
        } 
        
        
        
        if(rank_disparity) {
            
            pollError("If an answer box is filled, the one above it cannot be left empty.");
            
        }
        
    }
    
    
    
    
    
   if(!rank_disparity && first_two_answers && question_filled) {
       
       pollError("");
       
       AppendPoll(poll_q, poll_a1, poll_a2, poll_a3, poll_a4, poll_a5, poll_a6, poll_a7, poll_a8, poll_a9, poll_a10);
       
       
        $("#poll-q").val("");
    
        $("#poll-a1").val("");
    
        $("#poll-a2").val("");  
    
        $("#poll-a3").val("");
    
        $("#poll-a4").val("");
    
        $("#poll-a5").val("");
    
        $("#poll-a6").val("");  
    
        $("#poll-a7").val("");
    
        $("#poll-a8").val("");
    
        $("#poll-a9").val("");
    
        $("#poll-a10").val("");
       
       
       
       $("#poll-a4").hide(300);
       
       $("#poll-a5").hide(300);
       
       $("#poll-a6").hide(300);
       
       $("#poll-a7").hide(300);
       
       $("#poll-a8").hide(300);
       
       $("#poll-a9").hide(300);
       
       $("#poll-a10").hide(300);
       
       
       closeAllBoxes();
    
       
   }
    
    
    
        
    
});
    
    
    
    
    
    
   function sendPoll(poll_q, poll_a1, poll_a2, poll_a3, poll_a4, poll_a5, poll_a6, poll_a7, poll_a8, poll_a9, poll_a10, post_id_poll, poll_num_poll) {
       
       
       
          function  poll_is_submitted(new_back_id)  {
              
        
           
          var new_poll_sub = "";
              
          new_poll_sub += '<div class=\"row\">';                    
                            
          new_poll_sub += '<div class=\"col-xs-12\">';
              
                            
          new_poll_sub += '<a  onclick=\"pollvote('+ poll_num_poll + ',' + new_back_id + ')\">';    
        
          new_poll_sub += '<button id=\"pollvote_'+ poll_num_poll +'\" class=\"btn poll-1\">';
        
          new_poll_sub += 'Vote</button></a>';
              
              
          new_poll_sub += '<a onclick=\"voteagain('+ poll_num_poll + ',' + new_back_id + ')\" id=\"pollchange_'+ poll_num_poll +'\" style=\"display: none;\">';    
        
          new_poll_sub += '<button class=\"btn poll-1\">';
        
          new_poll_sub += 'Change Vote</button></a>';
              
              
        
          new_poll_sub += '<a class=\"poll-total'+ poll_num_poll +'\" style=\"display: none; margin-left: 30px;\">589 total votes</a>';
              
          new_poll_sub += '</div></div><br>';
              
              
                     
          new_poll_sub += '<div class=\"row\" >';
                     
                     
          new_poll_sub += '<div class=\"col-xs-2\" style=\" height: 25px;\">';
                     
                    
                     
          new_poll_sub += '<img onclick=\"start_delete(' + poll_num_poll + ') \" class=\" size-0 \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/arrow.svg' + '\" />';
                     
                     
          new_poll_sub += '</div>';
                     
                     
          new_poll_sub += '<div class=\"col-xs-3\" style=\" height: 25px;\">';
                     
                    
           
           
          new_poll_sub += '<img class=\" size-2 '+ 'start_delete' + poll_num_poll + '   like_delete'  +  poll_num_poll  +  '    \" src=\"' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/unlike.svg' + '\" onclick=\"likenewpoll(' +  new_back_id + ',' + poll_num_poll + ') \" />';
           
           
                     
          new_poll_sub += '<img onclick=\"show_delete(' + poll_num_poll + ') \" class=\" size-3 '+ 'start_delete' + poll_num_poll +' \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/garbage.svg' + '\" />';
                     
          new_poll_sub += '</div>';
                     
                     
          new_poll_sub += '<div class=\"col-xs-5\" >';
                     
                     
          new_poll_sub += '<a class=\"delete-2 '+ 'show_delete' + poll_num_poll +'\" onclick=\"deletenewpoll(' +  new_back_id + ',' + poll_num_poll + ') \">delete</a><a style=\"display: none; font-size: 13px;\" class=\"'+ 'show_delete' + poll_num_poll +'\" > //</a>';
                     
                     
          new_poll_sub += '<a onclick=\"hide_delete(' + poll_num_poll + ') \" class=\"delete-3 '+ 'show_delete' + poll_num_poll +'\">don\'t</a>';
                     
                     
          new_poll_sub += '</div>';
                     
                         
                     
          new_poll_sub += '<div class=\"col-xs-2\" style=\" height: 25px;\">';
                     
                    
                     
          new_poll_sub += '<img class=\" size-1 \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/checked.svg' + '\" />';
                     
                     
          new_poll_sub += '</div>';
                     
                     
                     
          new_poll_sub += '</div>';
                     
                     
                     
              
              
           var new_items_poll_send = $( new_poll_sub ).hide();
           
           $( "#whole_body_" + post_id_poll ).append( new_items_poll_send );
           
           new_items_poll_send.show(200);
              
          }
       
       
       
       
       
          currentPoll = new Date();
        
          currentMilliPoll = currentPoll.getTime();
           
          currentArray.push(currentMilliPoll);
       
       
       
   
    $.ajax({
        
       data: {
           
           "poll": 1, 
           "poll_q": poll_q,
           "poll_a1": poll_a1,
           "poll_a2": poll_a2,
           "poll_a3": poll_a3,
           "poll_a4": poll_a4,
           "poll_a5": poll_a5,
           "poll_a6": poll_a6,
           "poll_a7": poll_a7,
           "poll_a8": poll_a8,
           "poll_a9": poll_a9,
           "poll_a10": poll_a10,
           "group_id": page_group_id,
           "time": currentMilliPoll
           
       
       
       },
       dataType: 'text',
       async: true,
       timeout: 15000,
       url: url_placeholder + 'poll_send',
       type: "POST",
    
       success: function( data ) {  
            
                  
        
            var jsonPollAppend = JSON.parse( data );
            
            var attach_poll_status =  jsonPollAppend[0];
            
            var attach_poll_back_id =  jsonPollAppend[1];
        
            
        
            poll_is_submitted(attach_poll_back_id);
        
          
            
            
        },
             error: function( xhr, textStatus, errorThrown ) {
                
                 
                 $.ajax( this );
                return;
                 
             }
        
    
        
    });
    
    
} 
    
    
    

    
    
    
    function voteagain(front_id, back_id) {
        
        window["votebutton" + front_id] = false;
        
        
                 $("#pollvote_" + front_id).show();
                 
                 $("#pollchange_" + front_id).hide();
                 
                 $("#pollvote_" + front_id).blur();
                 
                 
                 $(".radio-first-" + front_id).show(300);
                 
                 $(".radio-second-" + front_id).hide(300);
        
                $(".poll-total" + front_id).hide().html(totalJsonChoice + " total votes.");
        
        
    }
    
    
    
    
    
    
    
     function voteagainold(back_id) {
        
        window["votebuttonold" + back_id] = false;
        
        
                 $("#pollvote_old" + back_id).show();
                 
                 $("#pollchange_old" + back_id).hide();
                 
                 $("#pollvote_old" + back_id).blur();
                 
                 
                 $(".radio-first-old" + back_id).show(300);
                 
                 $(".radio-second-old" + back_id).hide(300);
        
            //    $(".poll-totalold" + front_id).hide().html(totalJsonChoice + " total votes.");
        
        
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
$("#myTextBox").on("input", function() {
        
        if ( $(this).val().trim().length != 0 ) { 
            
            $("#content-div").hide(600);
            
            $("#search-div").show(500);
            
            $("#term1").html($("#myTextBox").val());
            
            search_posts($(this).val());
            
        } else {
            
            $("#content-div").show(600);
            
            $("#search-div").hide(500);
            
        }
        
    
});
    
    
    
    
    function pollvote(front_id, back_id)  {
        
        
        
        var which_radio = "radio_group_new_post" + front_id;
        
        if ( ( $('input[name="'+ which_radio +'"]:checked').val() > 0 ) && ( $('input[name="'+ which_radio +'"]:checked').val() < 11 ) ) {
            
            
            
            which_radio_selection = $('input[name="'+ which_radio +'"]:checked').val();
            
            sendPollVote(which_radio_selection, back_id, front_id);
            
            
            
        } else {
            
            alert("select soemthing");
            
        }
        
        
        
    }
    
    
    
    
    
    
    
    
        function pollvoteold(back_id)  {
        
        
        
        var which_radio_old = "radio_group_old" + back_id;
        
        if ( ( $('input[name="'+ which_radio_old +'"]:checked').val() > 0 ) && ( $('input[name="'+ which_radio_old +'"]:checked').val() < 11 ) ) {
            
            
            
            which_radio_selection_old = $('input[name="'+ which_radio_old +'"]:checked').val();
            
            
            
           sendPollVoteOld(which_radio_selection_old, back_id);
            
            
            
        } else {
            
            alert("select soemthing");
            
        }
        
        
        
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    function sendPollVote(selection, back_db_id, front_client_id)  {
        
        
             poll_vote_url = "<?php echo $_SESSION['url_placeholder'];  ?>poll_vote";
        
        
             $.ajax( {
             url: poll_vote_url,
             type: "POST",
             async: true,
             timeout: 15000,
             data: {
                "vote": 1,
                "choice": selection,
                 "group_id": page_group_id,
                 "post_id": back_db_id
             },
             success: function( data ) {
                 
                 
                 window["votebutton" + front_client_id] = true;
                 
                 getPollVote(back_db_id, front_client_id);
                 
              //   setInterval(getPollVote, 10000, back_db_id, front_client_id);
                 
        
             },
             error: function( xhr, textStatus, errorThrown ) {
                
                 
                 $.ajax( this );
                return;
                 
             }
          } );
        
    }
 
    
    
 
    
    
        
    function sendPollVoteOld(selection, back_db_id)  {
        
        
             poll_vote_url = "<?php echo $_SESSION['url_placeholder'];  ?>poll_vote";
        
        
             $.ajax( {
             url: poll_vote_url,
             type: "POST",
             async: true,
             timeout: 15000,
             data: {
                "vote": 1,
                "choice": selection,
                 "group_id": page_group_id,
                 "post_id": back_db_id
             },
             success: function( data ) {
                 
                 
                 window["votebuttonold" + back_db_id] = true;
                 
                 getOldPollVote(back_db_id);
                 
              //   setInterval(getOldPollVote, 10000, back_db_id);
                 
        
             },
             error: function( xhr, textStatus, errorThrown ) {
                
                 $.ajax( this );
                return;
                 
             }
          } );
        
    }
    
    
    
    
    
    
    function getPollVote(back_id, front_id)  {
        
        
             poll_percent_url = "<?php echo $_SESSION['url_placeholder'];  ?>poll_percent";
        
        
             $.ajax( {
             url: poll_percent_url,
             type: "POST",
             async: true,
             timeout: 15000,
             data: {
                "percent": 1,
                 "post_id": back_id
             },
             success: function( data ) {
                 
                 
                
                 
                 
                 if(window["votebutton" + front_id]) {
                     
                     
                     
                 $("#pollvote_" + front_id).hide();
                 
                 $("#pollchange_" + front_id).show();
                 
                 $("#pollvote_" + front_id).blur();
                 
                 
                 $(".radio-first-" + front_id).hide(300);
                 
                 $(".radio-second-" + front_id).show(300);
                     
                
                     
                 }
                 
                 
                 
                 
                 
                 var jsonGetPoll = JSON.parse( data );
            
                 var jsonChoice1 =  jsonGetPoll[0];
                 
                 var jsonChoice2 =  jsonGetPoll[1];
                 
                 var jsonChoice3 =  jsonGetPoll[2];
                 
                 var jsonChoice4 =  jsonGetPoll[3];
                 
                 var jsonChoice5 =  jsonGetPoll[4];
                 
                 var jsonChoice6 =  jsonGetPoll[5];
                 
                 var jsonChoice7 =  jsonGetPoll[6];
                 
                 var jsonChoice8 =  jsonGetPoll[7];
                 
                 var jsonChoice9 =  jsonGetPoll[8];
                 
                 var jsonChoice10 =  jsonGetPoll[9];
                 
                 var jsonUserChoice = jsonGetPoll[10];
                 
                 
                 var totalJsonChoice = jsonChoice1 + jsonChoice2 + jsonChoice3 + jsonChoice4 + jsonChoice5 + jsonChoice6 + jsonChoice7 + jsonChoice8 + jsonChoice9 + jsonChoice10;
                 
                 
                 
                 for ( var poll_img_i = 1; poll_img_i < 11; poll_img_i++ ) {
                     
                     $(".poll-img" + poll_img_i + front_id).hide();
                     
                 }
                 
                 
                 $(".poll-img" + jsonUserChoice + front_id).show();
                 
                 
                 $(".poll-score1" + front_id).html(Math.round((jsonChoice1/totalJsonChoice) * 100) + "% | " + jsonChoice1 + " votes");
                 $("#progressPoll1" + front_id).val(((jsonChoice1/totalJsonChoice) * 100));
                 
                 
                 
                 $(".poll-score2" + front_id).html(Math.round((jsonChoice2/totalJsonChoice) * 100) + "% | " + jsonChoice2 + " votes");
                 $("#progressPoll2" + front_id).val(((jsonChoice2/totalJsonChoice) * 100));
                 
                 
                 
                 $(".poll-score3" + front_id).html(Math.round((jsonChoice3/totalJsonChoice) * 100) + "% | " + jsonChoice3 + " votes");
                 $("#progressPoll3" + front_id).val(((jsonChoice3/totalJsonChoice) * 100));
                 
                 
                 $(".poll-score4" + front_id).html(Math.round((jsonChoice4/totalJsonChoice) * 100) + "% | " + jsonChoice4 + " votes");
                 $("#progressPoll4" + front_id).val(((jsonChoice4/totalJsonChoice) * 100));
                 
                 
                 $(".poll-score5" + front_id).html(Math.round((jsonChoice5/totalJsonChoice) * 100) + "% | " + jsonChoice5 + " votes");
                 $("#progressPoll5" + front_id).val(((jsonChoice5/totalJsonChoice) * 100));
                 
                 
                 
                 $(".poll-score6" + front_id).html(Math.round((jsonChoice6/totalJsonChoice) * 100) + "% | " + jsonChoice6 + " votes");
                 $("#progressPoll6" + front_id).val(((jsonChoice6/totalJsonChoice) * 100));
                 
                 
                 $(".poll-score7" + front_id).html(Math.round((jsonChoice7/totalJsonChoice) * 100) + "% | " + jsonChoice7 + " votes");
                 $("#progressPoll7" + front_id).val(((jsonChoice7/totalJsonChoice) * 100));
                 
                 
                 
                 $(".poll-score8" + front_id).html(Math.round((jsonChoice8/totalJsonChoice) * 100) + "% | " + jsonChoice8 + " votes");
                 $("#progressPoll8" + front_id).val(((jsonChoice8/totalJsonChoice) * 100));
                 
                 
                 $(".poll-score9" + front_id).html(Math.round((jsonChoice9/totalJsonChoice) * 100) + "% | " + jsonChoice9 + " votes");
                 $("#progressPoll9" + front_id).val(((jsonChoice9/totalJsonChoice) * 100));
                 
                 
                 $(".poll-score10" + front_id).html(Math.round((jsonChoice10/totalJsonChoice) * 100) + "% | " + jsonChoice10 + " votes");
                 $("#progressPoll10" + front_id).val(((jsonChoice10/totalJsonChoice) * 100));
                 
                 
                 
                                  
                 if(window["votebutton" + front_id]) {
                     
                     
                 $(".poll-total" + front_id).show().html(totalJsonChoice + " total votes.");
                     
                 }
        
             },
             error: function( xhr, textStatus, errorThrown ) {
                
              
                 
             },
                  complete: function( ) {
               
                $.ajax( this );
                return;
                
             }
          } );
        
        
        
    }
    
    
    
    
  
    
    
    
    
    
    
    
    
    function getOldPollVote(back_id)  {
        
        
             poll_percent_url = "<?php echo $_SESSION['url_placeholder'];  ?>poll_percent";
        
        
             $.ajax( {
             url: poll_percent_url,
             type: "POST",
             async: true,
             timeout: 15000,
             data: {
                "percent": 1,
                 "post_id": back_id
             },
             success: function( data ) {
                 
                 
                
             $(".poll-load-old-" + back_id).hide();
                 
                 
             //   alert(data);
                 
                 
                 var jsonGetPollOld = JSON.parse( data );
            
                 var jsonOldChoice1 =  jsonGetPollOld[0];
                 
                 var jsonOldChoice2 =  jsonGetPollOld[1];
                 
                 var jsonOldChoice3 =  jsonGetPollOld[2];
                 
                 var jsonOldChoice4 =  jsonGetPollOld[3];
                 
                 var jsonOldChoice5 =  jsonGetPollOld[4];
                 
                 var jsonOldChoice6 =  jsonGetPollOld[5];
                 
                 var jsonOldChoice7 =  jsonGetPollOld[6];
                 
                 var jsonOldChoice8 =  jsonGetPollOld[7];
                 
                 var jsonOldChoice9 =  jsonGetPollOld[8];
                 
                 var jsonOldChoice10 =  jsonGetPollOld[9];
                 
                 var jsonUserOldChoice = jsonGetPollOld[10];
                 
                 
                 var totalJsonOldChoice = jsonOldChoice1 + jsonOldChoice2 + jsonOldChoice3 + jsonOldChoice4 + jsonOldChoice5 + jsonOldChoice6 + jsonOldChoice7 + jsonOldChoice8 + jsonOldChoice9 + jsonOldChoice10;
                 
                 
                 var totalJsonOldChoiceSum = jsonOldChoice1 + jsonOldChoice2 + jsonOldChoice3 + jsonOldChoice4 + jsonOldChoice5 + jsonOldChoice6 + jsonOldChoice7 + jsonOldChoice8 + jsonOldChoice9 + jsonOldChoice10;
                 
                 
                 if (totalJsonOldChoice == 0) {
                     
                     totalJsonOldChoice = 1;
                     
                 } else {
                     
                     totalJsonOldChoice = totalJsonOldChoice;
                     
                 }
                 
                 
                 
                 
                 
                 if(window["votebuttonold" + back_id]) {
                     
                     
                     
        
                     
                     
                     if(jsonUserOldChoice == 0) {
                         
                         $(".radio-first-old" + back_id).show(300);
                 
                         $(".radio-second-old" + back_id).hide(30);
                         
                         $("#pollvote_old" + back_id).show(300);
                 
                 $("#pollchange_old" + back_id).hide(300);
                 
                 $("#pollvote_old" + back_id).blur();
                         
                
                     
                     
                 
                     
            
                     
                    $(".poll-totalold" + back_id).hide(300);
                     
                 
                         
                     } else if  (jsonUserOldChoice > 0)  {
                         
                         $(".radio-first-old" + back_id).hide(300);
                 
                         $(".radio-second-old" + back_id).show(300);
                         
                         $("#pollvote_old" + back_id).hide(300);
                 
                 $("#pollchange_old" + back_id).show(300);
                 
                 $("#pollvote_old" + back_id).blur();
                         
                         $(".poll-totalold" + back_id).show(300).html(totalJsonOldChoiceSum + " total votes.");
                         
                     }
                 
                 
                 
                     
                
                     
                 }
                 
                 
                 for ( var poll_img_i_old = 1; poll_img_i_old < 11; poll_img_i_old++ ) {
                     
                     $(".poll-img" + poll_img_i_old + "-old" + back_id).hide();
                     
                 }
                 
                 
                 
                 
                 
                 $(".poll-img" + jsonUserOldChoice + "-old" + back_id).show();
                 
                 
                 $(".poll-score1-old" + back_id).html(Math.round((jsonOldChoice1/totalJsonOldChoice) * 100) + "% | " + jsonOldChoice1 + " votes");
                 
                 $("#progressPoll1-old" + back_id).val(Math.round((jsonOldChoice1/totalJsonOldChoice) * 100));
                 
                 
                 
                 $(".poll-score2-old" + back_id).html(Math.round((jsonOldChoice2/totalJsonOldChoice) * 100) + "% | " + jsonOldChoice2 + " votes");
                 
                 $("#progressPoll2-old" + back_id).val(Math.round((jsonOldChoice2/totalJsonOldChoice) * 100));
                 
                 
                     
                 $(".poll-score3-old" + back_id).html(Math.round((jsonOldChoice3/totalJsonOldChoice) * 100) + "% | " + jsonOldChoice3 + " votes");
                 $("#progressPoll3-old" + back_id).val(((jsonOldChoice3/totalJsonOldChoice) * 100));
                 
                 
                 $(".poll-score4-old" + back_id).html(Math.round((jsonOldChoice4/totalJsonOldChoice) * 100) + "% | " + jsonOldChoice4 + " votes");
                 $("#progressPoll4-old" + back_id).val(((jsonOldChoice4/totalJsonOldChoice) * 100));
                 
                 
                 $(".poll-score5-old" + back_id).html(Math.round((jsonOldChoice5/totalJsonOldChoice) * 100) + "% | " + jsonOldChoice5 + " votes");
                 $("#progressPoll5-old" + back_id).val(((jsonOldChoice5/totalJsonOldChoice) * 100));
                 
                 
                 
                 $(".poll-score6-old" + back_id).html(Math.round((jsonOldChoice6/totalJsonOldChoice) * 100) + "% | " + jsonOldChoice6 + " votes");
                 $("#progressPoll6-old" + back_id).val(((jsonOldChoice6/totalJsonOldChoice) * 100));
                 
                 
                 $(".poll-score7-old" + back_id).html(Math.round((jsonOldChoice7/totalJsonOldChoice) * 100) + "% | " + jsonOldChoice7 + " votes");
                 $("#progressPoll7-old" + back_id).val(((jsonOldChoice7/totalJsonOldChoice) * 100));
                 
                 
                 
                 $(".poll-score8-old" + back_id).html(Math.round((jsonOldChoice8/totalJsonOldChoice) * 100) + "% | " + jsonOldChoice8 + " votes");
                 $("#progressPoll8-old" + back_id).val(((jsonOldChoice8/totalJsonOldChoice) * 100));
                 
                 
                 $(".poll-score9-old" + back_id).html(Math.round((jsonOldChoice9/totalJsonOldChoice) * 100) + "% | " + jsonOldChoice9 + " votes");
                 $("#progressPoll9-old" + back_id).val(((jsonOldChoice9/totalJsonOldChoice) * 100));
                 
                 
                 $(".poll-score10-old" + back_id).html(Math.round((jsonOldChoice10/totalJsonOldChoice) * 100) + "% | " + jsonOldChoice10 + " votes");
                 $("#progressPoll10-old" + back_id).val(((jsonOldChoice10/totalJsonOldChoice) * 100));
                 
                 
                 
                                  
              
        
             },
             error: function( xhr, textStatus, errorThrown ) {
                
                 
                 
             }, 
                 
                complete: function( ) {
               
                $.ajax( this );
                return;
                
             }
          } );
        
        
        
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    function AppendPoll(question, answer1, answer2, answer3, answer4, answer5, answer6, answer7, answer8, answer9, answer10)  {
        
        
        
        
        var new_poll_html = '';
        
        new_poll_html += '<div id=\"'+ 'whole_' + new_post_id +'\" class=\"row poll-div\">';
        
        
        new_poll_html += '<div class=\"col-xs-2\"><img src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/nopic.png\" style=\"width: 40px; margin-left: 10px;\"  /></div>';
        
        new_poll_html += '<div id=\"'+ 'whole_body_' + new_post_id +'\" class=\"col-xs-10 poll-body\">';
        
        new_poll_html += '<p class=\"poll-quest-box\"> ' +  question +' </p>';

    
        new_poll_html += '<form action=\"#\">';
    
        
        
    
        new_poll_html += '<p class=\"poll-answer-box'+ new_post_id_num +'\">';       
        
        new_poll_html += '<div class=\"radio-first  radio-first-'+ new_post_id_num +'\"><input class=\"radio-new-class-'+ new_post_id_num +'\"  type=\"radio\" id=\"poll-id-1'+ new_post_id_num +'\" value=\"1\" name=\"radio_group_' + new_post_id + '\">';
        
        new_poll_html += '<label for=\"poll-id-1'+ new_post_id_num +'\" class=\"poll-answer-style-1\"><span> ' + answer1 + '</span></label><br></div>';
        
        new_poll_html +=  '<div class=\"radio-second radio-second-'+ new_post_id_num +'\" style=\"display: none;\">';
        
        new_poll_html +=  '<p class=\"poll-answer-style-1\"> ' + answer1 + ' </p>';
        
        new_poll_html +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll1'+ new_post_id_num +'\" class=\"poll-progress\"></progress>'; 
        
        new_poll_html +=  '<a class=\"poll-score poll-score1'+ new_post_id_num +'\"> 30% | 34 votes</a>'; 
        
        new_poll_html += '<img class=\"poll-img1'+ new_post_id_num +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        new_poll_html +=  '</div>';

                        
                        
                            
        
        new_poll_html += '<p class=\"poll-answer-box'+ new_post_id_num +'\">';       
        
        new_poll_html += '<div class=\"radio-first  radio-first-'+ new_post_id_num +'\"><input class=\"radio-new-class-'+ new_post_id_num +'\"  type=\"radio\" id=\"poll-id-2'+ new_post_id_num +'\" value=\"2\" name=\"radio_group_' + new_post_id + '\">';
        
        new_poll_html += '<label for=\"poll-id-2'+ new_post_id_num +'\" class=\"poll-answer-style-1\"><span> ' + answer2 + '</span></label><br></div>';
        
        new_poll_html +=  '<div class=\"radio-second radio-second-'+ new_post_id_num +'\" style=\"display: none;\">';
        
        new_poll_html +=  '<p class=\"poll-answer-style-1\"> ' + answer2 + ' </p>';
        
        new_poll_html +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll2'+ new_post_id_num +'\" class=\"poll-progress\"></progress>'; 
        
        new_poll_html +=  '<a class=\"poll-score poll-score2'+ new_post_id_num +'\"> 30% | 34 votes</a>'; 
        
        new_poll_html += '<img class=\"poll-img2'+ new_post_id_num +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        new_poll_html +=  '</div>';

        
        
        if (answer3.trim().length > 0) {
        
        new_poll_html += '<p class=\"poll-answer-box'+ new_post_id_num +'\">';       
        
        new_poll_html += '<div class=\"radio-first  radio-first-'+ new_post_id_num +'\"><input class=\"radio-new-class-'+ new_post_id_num +'\"  type=\"radio\" id=\"poll-id-3'+ new_post_id_num +'\" value=\"3\" name=\"radio_group_' + new_post_id + '\">';
        
        new_poll_html += '<label for=\"poll-id-3'+ new_post_id_num +'\" class=\"poll-answer-style-1\"><span> ' + answer3 + '</span></label><br></div>';
        
        new_poll_html +=  '<div class=\"radio-second radio-second-'+ new_post_id_num +'\" style=\"display: none;\">';
        
        new_poll_html +=  '<p class=\"poll-answer-style-1\"> ' + answer3 + ' </p>';
        
        new_poll_html +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll3'+ new_post_id_num +'\" class=\"poll-progress\"></progress>'; 
        
        new_poll_html +=  '<a class=\"poll-score poll-score3'+ new_post_id_num +'\"> 30% | 34 votes</a>';
            
        new_poll_html += '<img class=\"poll-img3'+ new_post_id_num +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        new_poll_html +=  '</div>';                

        }
        
        
        
        if (answer4.trim().length > 0) {
            
        new_poll_html += '<p class=\"poll-answer-box'+ new_post_id_num +'\">';       
        
        new_poll_html += '<div class=\"radio-first  radio-first-'+ new_post_id_num +'\"><input class=\"radio-new-class-'+ new_post_id_num +'\"  type=\"radio\" id=\"poll-id-4'+ new_post_id_num +'\" value=\"4\" name=\"radio_group_' + new_post_id + '\">';
        
        new_poll_html += '<label for=\"poll-id-4'+ new_post_id_num +'\" class=\"poll-answer-style-1\"><span> ' + answer4 + '</span></label><br></div>';
        
        new_poll_html +=  '<div class=\"radio-second radio-second-'+ new_post_id_num +'\" style=\"display: none;\">';
        
        new_poll_html +=  '<p class=\"poll-answer-style-1\"> ' + answer4 + ' </p>';
        
        new_poll_html +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll4'+ new_post_id_num +'\" class=\"poll-progress\"></progress>'; 
        
        new_poll_html +=  '<a class=\"poll-score poll-score4'+ new_post_id_num +'\"> 30% | 34 votes</a>'; 
            
        new_poll_html += '<img class=\"poll-img4'+ new_post_id_num +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        new_poll_html +=  '</div>';                

        }
        
        
        if (answer5.trim().length > 0) {
            
        new_poll_html += '<p class=\"poll-answer-box'+ new_post_id_num +'\">';       
        
        new_poll_html += '<div class=\"radio-first  radio-first-'+ new_post_id_num +'\"><input class=\"radio-new-class-'+ new_post_id_num +'\"  type=\"radio\" id=\"poll-id-5'+ new_post_id_num +'\" value=\"5\" name=\"radio_group_' + new_post_id + '\">';
        
        new_poll_html += '<label for=\"poll-id-5'+ new_post_id_num +'\" class=\"poll-answer-style-1\"><span> ' + answer5 + '</span></label><br></div>';
        
        new_poll_html +=  '<div class=\"radio-second radio-second-'+ new_post_id_num +'\" style=\"display: none;\">';
        
        new_poll_html +=  '<p class=\"poll-answer-style-1\"> ' + answer5 + ' </p>';
        
        new_poll_html +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll5'+ new_post_id_num +'\" class=\"poll-progress\"></progress>'; 
        
        new_poll_html +=  '<a class=\"poll-score poll-score5'+ new_post_id_num +'\"> 30% | 34 votes</a>'; 
            
        new_poll_html += '<img class=\"poll-img5'+ new_post_id_num +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        new_poll_html +=  '</div>';

        }
        
        
        
        if (answer6.trim().length > 0) {
        
        new_poll_html += '<p class=\"poll-answer-box'+ new_post_id_num +'\">';       
        
        new_poll_html += '<div class=\"radio-first  radio-first-'+ new_post_id_num +'\"><input class=\"radio-new-class-'+ new_post_id_num +'\"  type=\"radio\" id=\"poll-id-6'+ new_post_id_num +'\" value=\"6\" name=\"radio_group_' + new_post_id + '\">';
        
        new_poll_html += '<label for=\"poll-id-6'+ new_post_id_num +'\" class=\"poll-answer-style-1\"><span> ' + answer6 + '</span></label><br></div>';
        
        new_poll_html +=  '<div class=\"radio-second radio-second-'+ new_post_id_num +'\" style=\"display: none;\">';
        
        new_poll_html +=  '<p class=\"poll-answer-style-1\"> ' + answer6 + ' </p>';
        
        new_poll_html +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll6'+ new_post_id_num +'\" class=\"poll-progress\"></progress>'; 
        
        new_poll_html +=  '<a class=\"poll-score poll-score6'+ new_post_id_num +'\"> 30% | 34 votes</a>'; 
            
        new_poll_html += '<img class=\"poll-img6'+ new_post_id_num +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        new_poll_html +=  '</div>';                 

        }
        
        
        
        if (answer7.trim().length > 0) {
            
        new_poll_html += '<p class=\"poll-answer-box'+ new_post_id_num +'\">';       
        
        new_poll_html += '<div class=\"radio-first  radio-first-'+ new_post_id_num +'\"><input class=\"radio-new-class-'+ new_post_id_num +'\"  type=\"radio\" id=\"poll-id-7'+ new_post_id_num +'\" value=\"7\" name=\"radio_group_' + new_post_id + '\">';
        
        new_poll_html += '<label for=\"poll-id-7'+ new_post_id_num +'\" class=\"poll-answer-style-1\"><span> ' + answer7 + '</span></label><br></div>';
        
        new_poll_html +=  '<div class=\"radio-second radio-second-'+ new_post_id_num +'\" style=\"display: none;\">';
        
        new_poll_html +=  '<p class=\"poll-answer-style-1\"> ' + answer7 + ' </p>';
        
        new_poll_html +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll7'+ new_post_id_num +'\" class=\"poll-progress\"></progress>'; 
        
        new_poll_html +=  '<a class=\"poll-score poll-score7'+ new_post_id_num +'\"> 30% | 34 votes</a>';
            
        new_poll_html += '<img class=\"poll-img7'+ new_post_id_num +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        new_poll_html +=  '</div>';                

        }
        
        
        
        
        if (answer8.trim().length > 0) {
        
        new_poll_html += '<p class=\"poll-answer-box'+ new_post_id_num +'\">';       
        
        new_poll_html += '<div class=\"radio-first  radio-first-'+ new_post_id_num +'\"><input class=\"radio-new-class-'+ new_post_id_num +'\"  type=\"radio\" id=\"poll-id-8'+ new_post_id_num +'\" value=\"8\" name=\"radio_group_' + new_post_id + '\">';
        
        new_poll_html += '<label for=\"poll-id-8'+ new_post_id_num +'\" class=\"poll-answer-style-1\"><span> ' + answer8 + '</span></label><br></div>';
        
        new_poll_html +=  '<div class=\"radio-second radio-second-'+ new_post_id_num +'\" style=\"display: none;\">';
        
        new_poll_html +=  '<p class=\"poll-answer-style-1\"> ' + answer8 + ' </p>';
        
        new_poll_html +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll8'+ new_post_id_num +'\" class=\"poll-progress\"></progress>'; 
        
        new_poll_html +=  '<a class=\"poll-score poll-score8'+ new_post_id_num +'\"> 30% | 34 votes</a>';
            
        new_poll_html += '<img class=\"poll-img8'+ new_post_id_num +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        new_poll_html +=  '</div>';                 

        }
        
        
        
        if (answer9.trim().length > 0) {
            
        new_poll_html += '<p class=\"poll-answer-box'+ new_post_id_num +'\">';       
        
        new_poll_html += '<div class=\"radio-first  radio-first-'+ new_post_id_num +'\"><input class=\"radio-new-class-'+ new_post_id_num +'\"  type=\"radio\" id=\"poll-id-9'+ new_post_id_num +'\" value=\"9\" name=\"radio_group_' + new_post_id + '\">';
        
        new_poll_html += '<label for=\"poll-id-9'+ new_post_id_num +'\" class=\"poll-answer-style-1\"><span> ' + answer9 + '</span></label><br></div>';
        
        new_poll_html +=  '<div class=\"radio-second radio-second-'+ new_post_id_num +'\" style=\"display: none;\">';
        
        new_poll_html +=  '<p class=\"poll-answer-style-1\"> ' + answer9 + ' </p>';
        
        new_poll_html +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll9'+ new_post_id_num +'\" class=\"poll-progress\"></progress>'; 
        
        new_poll_html +=  '<a class=\"poll-score poll-score9'+ new_post_id_num +'\"> 30% | 34 votes</a>'; 
            
        new_poll_html += '<img class=\"poll-img9'+ new_post_id_num +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        new_poll_html +=  '</div>';  
            
        }
        
        
        
        if (answer10.trim().length > 0) {
            
        new_poll_html += '<p class=\"poll-answer-box'+ new_post_id_num +'\">';       
        
        new_poll_html += '<div class=\"radio-first  radio-first-'+ new_post_id_num +'\"><input class=\"radio-new-class-'+ new_post_id_num +'\"  type=\"radio\" id=\"poll-id-10'+ new_post_id_num +'\" value=\"10\" name=\"radio_group_' + new_post_id + '\">';
        
        new_poll_html += '<label for=\"poll-id-10'+ new_post_id_num +'\" class=\"poll-answer-style-1\"><span> ' + answer10 + '</span></label><br></div>';
        
        new_poll_html +=  '<div class=\"radio-second radio-second-'+ new_post_id_num +'\" style=\"display: none;\">';
        
        new_poll_html +=  '<p class=\"poll-answer-style-1\"> ' + answer10 + ' </p>';
        
        new_poll_html +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll10'+ new_post_id_num +'\" class=\"poll-progress\"></progress>'; 
        
        new_poll_html +=  '<a class=\"poll-score poll-score10'+ new_post_id_num +'\"> 30% | 34 votes</a>'; 
            
        new_poll_html += '<img class=\"poll-img10'+ new_post_id_num +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        new_poll_html +=  '</div>';                 

        }
        
        
        new_poll_html += '</form>';
        
        new_poll_html += '</div></div><br>';                
                        
     
        
          var new_items_poll = $( new_poll_html ).hide();
          $( '#postsdiv' ).prepend( new_items_poll );
          new_items_poll.show( 100 );
                
        
          sendPoll(poll_q, poll_a1, poll_a2, poll_a3, poll_a4, poll_a5, poll_a6, poll_a7, poll_a8, poll_a9, poll_a10, new_post_id, new_post_id_num);
                
          new_post_id_num = new_post_id_num + 1;
          new_post_id = "new_post" + new_post_id_num;
        
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    function search_posts(term) {
        
        search_posts_url = "<?php echo $_SESSION['url_placeholder'];  ?>search_posts";
        
       $.ajax( {
        
          url: search_posts_url,
          type: "POST",
          async: true,
          data: {
              
             "term": term,
              "search": 1,
              "group": page_group_id
              
          },
          success: function( d ) {
              
           console.log(d);
             var jsonSearch = JSON.parse( d );
             var jsonSearchLength = jsonSearch.new_search.length;
             var htmlSearch = "";
             
             //If lastTimeID is zero.
           
             for ( var search_i = 0; search_i < jsonSearchLength; search_i++ ) {
                var resultSearch = jsonSearch.new_search[ search_i ];
                // For each row from the database, set the last processed id number to lastTimeID.
                
                // If the row's id is even.
                 
                 
                 
                 
                 
                 
                 
                 
                 
                 
                 
                 
                 
                 

                 
                 if(resultSearch.type == 'attach' && resultSearch.owner == "<?php echo $user_info['id']; ?>") {
                     
                     
                                htmlSearch += '<div id=\"'+ 'search_post' + resultSearch.id +'\" class=\"row\">';
                htmlSearch += '<div class=\"col-xs-2\">';
                htmlSearch += '<a><img src=\" '+ '<?php echo $_SESSION['url_placeholder'];  ?>' + resultSearch.image  +' \" class=\"chat-left-1\"  /></a>';
                htmlSearch += '</div>';
                htmlSearch += '<div class=\"col-xs-10\">';
                htmlSearch += '<div class=\"talk-bubble tri-right left-top\" class=\"chat-left-2\">';
                htmlSearch += '<div class=\"talktext\">';
                htmlSearch += '<p class=\"text-username\">' + resultSearch.username + '</p>';
                htmlSearch += '<p class=\"text-body\"><a href=\" ' + resultSearch.path  + ' \" download>' + resultSearch.name + '</a></p>';
                     
                     
                     
                        
                     htmlSearch += '<div class=\"row\" >';
                     
                     
                     htmlSearch += '<div class=\"col-xs-2\" style=\" height: 25px;\">';
                     
                    
                     
                     htmlSearch += '<img onclick=\"start_delete(' + resultSearch.id + ') \" class=\" size-0 \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/arrow.svg' + '\" />';
                     
                     
                     htmlSearch += '</div>';
                     
                     
                     htmlSearch += '<div class=\"col-xs-3\" style=\" height: 25px;\">';
                     
                    
                     
                     htmlSearch += '<img class=\" size-2 '+ 'start_delete' + resultSearch.id + '   like_delete'  +  resultSearch.id  +  '    \" src=\"' +  resultSearch.like_src + '\" onclick=\"likeoldpost(' + resultSearch.id + ') \" />';
                     
                     htmlSearch += '<img onclick=\"show_delete(' + resultSearch.id + ') \" class=\" size-3 '+ 'start_delete' + resultSearch.id +' \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/garbage.svg' + '\" />';
                     
                     htmlSearch += '</div>';
                     
                     
                     htmlSearch += '<div class=\"col-xs-5\" >';
                     
                     
                     htmlSearch += '<a class=\"delete-2 '+ 'show_delete' + resultSearch.id +'\" onclick=\"deleteoldpost(' + resultSearch.id + ') \">delete</a><a style=\"display: none; font-size: 13px;\" class=\"'+ 'show_delete' + resultSearch.id +'\" > //</a>';
                     
                     
                      htmlSearch += '<a onclick=\"hide_delete(' + resultSearch.id + ') \" class=\"delete-3 '+ 'show_delete' + resultSearch.id +'\">don\'t</a>';
                     
                     
                     htmlSearch += '</div>';
                     
                     
                     
                     
                     
                    htmlSearch += '<div class=\"col-xs-2\" style=\" height: 25px;\">';
                     
                    
                     
                     htmlSearch += '<img class=\" size-1 \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/checked.svg' + '\" />';
                     
                     
                     htmlSearch += '</div>';
                     
                     
                     
                     htmlSearch += '</div>';
                     
                
                     
                     
                     
                     
                htmlSearch += ' </div></div></div></div>';         
                     
                     
                     
                     
                     
                     
                     
                     
                     
                 }  
                 
                 
                 
                    if(resultSearch.type == 'attach' && resultSearch.owner != "<?php echo $user_info['id']; ?>") {
         
                
                        
                        
                                           htmlSearch += '<div id=\"'+ 'search_post' + resultOldPost.id +'\" class=\"row\">';
                   htmlSearch += '<div class=\"col-xs-10\">';
                   htmlSearch += '<div class=\"talk-bubble1 tri-right1 left-top1\" class=\"chat-right-1\">';
                   htmlSearch += '<div class=\"talktext1\">';
                   htmlSearch += '<p class=\"text-username\">' + resultOldPost.username + '</p>';
                   htmlSearch += '<p class=\"text-body\"><a href=\" ' + resultOldPost.path  + ' \" download>' + resultOldPost.name + '</a></p>';
                        
                        
                        
                        
                        
                                             htmlSearch += '<div class=\"row\" >';
                     
                     
                     htmlSearch += '<div class=\"col-xs-2\" style=\" height: 25px;\">';
                     
                    
                     
                     htmlSearch += '<img onclick=\"start_delete(' + resultOldPost.id + ') \" class=\" size-0 \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/arrow.svg' + '\" />';
                     
                     
                     htmlSearch += '</div>';
                     
                     
                     htmlSearch += '<div class=\"col-xs-3\" style=\" height: 25px;\">';
                     
                    
                     
                     htmlSearch += '<img class=\" size-2 '+ 'start_delete' + resultOldPost.id + '   like_delete'  +  resultOldPost.id  +  '    \" src=\"' +  resultOldPost.like_src + '\" onclick=\"likeoldpost(' + resultOldPost.id + ') \" />';
                     
                    
                     
                     htmlSearch += '</div>';
                     
                     
                     htmlSearch += '<div class=\"col-xs-5\" >';
                     
                     // Empty div.
                   
                     htmlSearch += '</div>';
                     
                     
                     
                     
                     
                    htmlSearch += '<div class=\"col-xs-2\" style=\" height: 25px;\">';
                     
                    
                    // Empty div.
                     
                     htmlSearch += '</div>';
                     
                     
                     
                     htmlSearch += '</div>';
                     
                     
                     
                    
                        
                        
                        
                   htmlSearch += ' </div></div></div>';
                   htmlSearch += '<div class=\"col-xs-2\">';
                   htmlSearch += '<a><img src=\" ' +  '<?php echo $_SESSION['url_placeholder'];  ?>' + resultOldPost.image  +' \" class=\"chat-right-2\"  /></a>';
                   htmlSearch += '</div>';
                   htmlSearch += '</div>';
                    
                        
                        
                        
                        
                        
                        
                    
                 }
                 
                 
                 
                 
                 
                 
                 
                 if (resultSearch.type == "chat" && resultSearch.owner == "<?php echo $user_info['id']; ?>") {
                     
                     
                     
                                     htmlSearch += '<div id=\"'+ 'search_post' + resultSearch.id +'\" class=\"row\">';
                htmlSearch += '<div class=\"col-xs-2\">';
                htmlSearch += '<a><img src=\" '+ '<?php echo $_SESSION['url_placeholder'];  ?>' + resultSearch.image +'  \" class=\"chat-left-1\"  /></a>';
                htmlSearch += '</div>';
                htmlSearch += '<div class=\"col-xs-10\">';
                htmlSearch += '<div class=\"talk-bubble tri-right left-top\" class=\"chat-left-2\">';
                htmlSearch += '<div class=\"talktext\">';
                htmlSearch += '<p class=\"text-username\">' + resultSearch.username + '</p>';
                htmlSearch += '<p class=\"text-body\">'  + resultSearch.message + '</p>';
                     
                

                     
                     
                     htmlSearch += '<div class=\"row\" >';
                     
                     
                     htmlSearch += '<div class=\"col-xs-2\" style=\" height: 25px;\">';
                     
                    
                     
                     htmlSearch += '<img onclick=\"start_delete(' + resultSearch.id + ') \" class=\" size-0 \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/arrow.svg' + '\" />';
                     
                     
                     htmlSearch += '</div>';
                     
                     
                     htmlSearch += '<div class=\"col-xs-3\" style=\" height: 25px;\">';
                     
                    
                     
                     htmlSearch += '<img class=\" size-2 '+ 'start_delete' + resultSearch.id + '   like_delete'  +  resultSearch.id  +  '    \" src=\"' +  resultSearch.like_src + '\" onclick=\"likeoldpost(' + resultSearch.id + ') \" />';
                     
                     htmlSearch += '<img onclick=\"show_delete(' + resultSearch.id + ') \" class=\" size-3 '+ 'start_delete' + resultSearch.id +' \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/garbage.svg' + '\" />';
                     
                     htmlSearch += '</div>';
                     
                     
                     htmlSearch += '<div class=\"col-xs-5\" >';
                     
                     
                     htmlSearch += '<a class=\"delete-2 '+ 'show_delete' + resultSearch.id +'\" onclick=\"deleteoldpost(' + resultSearch.id + ') \">delete</a><a style=\"display: none; font-size: 13px;\" class=\"'+ 'show_delete' + resultSearch.id +'\" > //</a>';
                     
                     
                      htmlSearch += '<a onclick=\"hide_delete(' + resultSearch.id + ') \" class=\"delete-3 '+ 'show_delete' + resultSearch.id +'\">don\'t</a>';
                     
                     
                     htmlSearch += '</div>';
                     
                     
                     
                     
                     
                    htmlSearch += '<div class=\"col-xs-2\" style=\" height: 25px;\">';
                     
                    
                     
                     htmlSearch += '<img class=\" size-1 \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/checked.svg' + '\" />';
                     
                     
                     htmlSearch += '</div>';
                     
                     
                     
                     htmlSearch += '</div>';
                     
                     
                     
                     
                    htmlSearch += '</div></div></div></div>'; 
                     
                 }
                 
                 
                 
                 
                 
                 
                 
                 
                 
                 
                if (resultSearch.type == "chat" && resultSearch.owner != "<?php echo $user_info['id']; ?>") {
                    
          
                     
                    
                   htmlSearch += '<div id=\"'+ 'search_post' + resultSearch.id +'\" class=\"row\">';
                   htmlSearch += '<div class=\"col-xs-10\">';
                   htmlSearch += '<div class=\"talk-bubble1 tri-right1 left-top1\" class=\"chat-right-1\">';
                   htmlSearch += '<div class=\"talktext1\">';
                   htmlSearch += '<p class=\"text-username\">' + resultSearch.username + '</p>';
                   htmlSearch += '<p class=\"text-body\">' + resultSearch.message + '</p>';
                    
                    
                       
                     htmlSearch += '<div class=\"row\" >';
                     
                     
                     htmlSearch += '<div class=\"col-xs-2\" style=\" height: 25px;\">';
                     
                    
                     
                     htmlSearch += '<img onclick=\"start_delete(' + resultSearch.id + ') \" class=\" size-0 \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/arrow.svg' + '\" />';
                     
                     
                     htmlSearch += '</div>';
                     
                     
                     htmlSearch += '<div class=\"col-xs-3\" style=\" height: 25px;\"> ';
                    
                    
                   
                     
                    
                     htmlSearch += '<img class=\" size-2 '+ 'start_delete' + resultSearch.id + '   like_delete'  +  resultSearch.id  +  '    \" src=\"' +  resultSearch.like_src + '\" onclick=\"likeoldpost(' + resultSearch.id + ') \" />';
                     
                    
                    
                     
                     htmlSearch += '</div>';
                     
                     
                     htmlSearch += '<div class=\"col-xs-5\" >';
                     
                     // Empty div.
                   
                     htmlSearch += '</div>';
                     
                     
                     
                     
                     
                    htmlSearch += '<div class=\"col-xs-2\" style=\" height: 25px;\">';
                     
                    
                    // Empty div.
                     
                     htmlSearch += '</div>';
                     
                     
                     
                     htmlSearch += '</div>';
                     
                     
                     
                    
                    
                    
                    
                   htmlSearch += ' </div></div></div>';
                   htmlSearch += '<div class=\"col-xs-2\">';
                   htmlSearch += '<a><img src=\" ' +  '<?php echo $_SESSION['url_placeholder'];  ?>' + resultSearch.image  +' \" class=\"chat-right-2\"  /></a>';
                   htmlSearch += '</div>';
                   htmlSearch += '</div>';
                    
                     
                       
                       
               
                     
                 }
                 
                 
                 
             }
         
                // Return and prepend just parsed json from the database to the page. 
                var new_items_search = $( htmlSearch ).hide();
                $( '#areas3' ).html( new_items_search );
                new_items_search.show( 100 );
             }, //error after here.
           error: function( xhr, textStatus, errorThrown ) {
                $.ajax( this );
                return;
             }
       } );
        
    }
    

    
    
    
    
    
    
    
function _(el) {
            
    return document.getElementById(el);
            
}
    
    

    
$('#file1').change(function() { 
    
    uploadFile();
    
});
    
    
    
    
function uploadFile() { 
        
    
        var file = _('file1').files[0];
        
        
        if (file.size <= 1000000) {
        
        $('#progressBar').show();
            
        
        var formdata = new FormData();
        
        formdata.append('file1', file);
        
      
        
        var ajax = new XMLHttpRequest();
        
        ajax.upload.addEventListener("progress", progressHandler, false);
        
        ajax.addEventListener("load", completeHandler, false);
        
        ajax.addEventListener("abort", abortHandler, false);
        
        ajax.open("POST", "<?php echo $_SESSION['url_placeholder'];  ?>send_attach");
        
        ajax.send(formdata);
        
        } else {
            
            _('progressMessage').innerHTML = file.name + " is bigger than 1MB. Try again. <br><br> ";
            
        }
        
        function progressHandler(event) {
            
        //    _('loadedbytes').innerHTML = "Uploaded " + event.loaded + " of" + event.total;
            
            var percent = (event.loaded / event.total) * 100;
            
            _('progressBar').value = Math.round(percent);
            
             $('#progressMessage').show();
            
            _('status').innerHTML = Math.round(percent) + "%";
            
            _('progressMessage').innerHTML = "Uploading " + file.name;
            
            $('#file1label').hide();
            
            $('#chatboxclose').hide();
            
            $('#chatboxfile').hide();
        }
        
        
        
        function completeHandler(event) {
            
            
         //   alert(event.target.responseText);
            
            _('status').innerHTML = "";
            
              
              sendAppend("", event.target.responseText);
            
            $('#file1label').hide(160);
            
            
            
            _('progressBar').value = 0;
            
           $('#progressBar').hide();
            
           _('progressMessage').innerHTML = "";
            
             $('#chatboxclose').show();
            
            $('#chatboxfile').show();
        }
        
        
        
        function errorHandler(event) {
            
            _('status').innerHTML = "Upload fail";
            
            
        }
        
        
        
        
        function abortHandler(event) {
            
            _('status').innerHTML = "Upload aborted";
            
            
        }
        
        
        
        
        
        
    }
    
    
    
    
    
    
    
    

    $( window ).on( "scroll", function() {
        
       if ( ( window.innerHeight + window.scrollY ) >= document.body.offsetHeight ) {
           
        displayFromDatabasePagination();
           
           
           
          $(window).unbind("scroll");
           
       }
        
    } );
    
    
    
    
    $( '#text' ).on( "focus", function() {
       
       $( '#text' ).keypress( function( e ) {
          if ( e.which == 13 ) {
             
             sendAppend( e, null );
              
          }
       } );
    } );
      
    
    function closeAllBoxes()  {
        
        $('#chatbox').hide(100);
            
        $('#text').val("");
        
        $('#file1label').hide(160);
        
        
        
        $('#pollbox').hide(100);
        
    }
    
    
    
  $('#chatboxicon').click(function() { 
        
        closeAllBoxes();
      
        $('#chatbox').show(100);
      
  });
    
    
    
    
  $('#chatboxclose').click(function() { 
        
            closeAllBoxes();
            
  });
    
    
    
  $('#chatboxfile').click(function() { 
            
        $('#file1label').toggle(160);
      
  });
    
    
    
    
    
    
    
    $('#pollicon').click(function() { 
        
        closeAllBoxes();
        
        $('#pollbox').show(100);
  });
    
    
    
    
  $('#pollboxclose').click(function() { 
        
      
        closeAllBoxes();
            
    
  });
    
    
    
    
 
    
    
    
    
    $( document ).ready( function() {
       
       displayFromDatabasePagination();
        
       $(window).unbind("scroll");
       
      startPostLoop();
        
    if ($("#poll-a3").val().length > 0) {
        
        alert("mkodad");
        
    }
        
    } );
    
    
    

    function startPostLoop() {
    
       displayFromDatabase();
        
    }
    
    
    
    
function displayFromDatabase() {
    
    
        
       fetch_new_url = "<?php echo $_SESSION['url_placeholder'];  ?>fetch_recent_posts";
    
    var post_on_page = false;
        
       $.ajax( {
           
          url: fetch_new_url,
          type: "POST",
          async: true,
          timeout: 15000,
          data: {
              
             "fetchnew": 1,
             "offset": lastTimeID,
              "group": page_group_id
              
          },
          success: function( data ) {
              
        
            
             var jsonData = JSON.parse( data );
             var jsonLength = jsonData.new_posts.length;
             var html_new_posts_1 = "";
             var lastTimeIDzeroTest;
             
             if ( lastTimeID === 0 ) {
                 
                lastTimeIDzeroTest = 1;
                 
             }
              
              
                if (lastTimeID > 0) {
                     
                     post_on_page = true;
              
                     
                     
                 }
              
              
              
              
             for ( var i_for_id = jsonLength - 1; i_for_id > -1; i_for_id-- ) {
                 
                 
                var new_post_result0 = jsonData.new_posts[ i_for_id ];
                
                lastTimeID = new_post_result0.id;
                
             }
            
                 
              
              
              
              for ( var i = 0; i < jsonLength; i++ ) {
                  
                  
              var new_post_result = jsonData.new_posts[ i ];
              
                 if (new_post_result.owner == 0) {
                     
                     $('#start').show();
                     
                     $('#continue').hide();
                     
                     $('#end').hide();
                     
                 } 
                 
                 
                
           
                 if (post_on_page) {
                     
                    if (new_post_result.owner > 0) {
                     
                     $('#start').hide();
                     
                     $('#continue').hide();
                     
                 } else {
                     
                     
                     
                 }
                     
                 }
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                    if(new_post_result.type == 'poll' && new_post_result.owner != "<?php echo $user_info['id']; ?>") { 
                   
                   
                      
                      
        html_new_posts_1 += '<div id=\"'+ 'whole_old_post' + new_post_result.id +'\" class=\"row poll-div-2\" style=\"margin-bottom: 20px;\">';
        
        
        html_new_posts_1 += '<div class=\"col-xs-10 poll-body\">';
        
        html_new_posts_1 += '<p class=\"poll-quest-box\"> ' +  new_post_result.question +' </p>';
                        
                        
        html_new_posts_1 += '<div class=\"poll-load-old-'+ new_post_result.id +'\"><img src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/wedges.gif\" width=\"90\" height=\"90\"  style=\"display: table; margin: 0 auto;\"  /></div>';

    
        html_new_posts_1 += '<form action=\"#\">';
    
        
        
    
        html_new_posts_1 += '<p class=\"poll-answer-box-old'+ new_post_result.id +'\">';       
        
        html_new_posts_1 += '<div class=\"radio-first  radio-first-old'+ new_post_result.id +'\" style=\"display: none;\"><input class=\"radio-new-class-old'+ new_post_result.id +'\"  type=\"radio\" id=\"poll-id-1-old'+ new_post_result.id +'\" value=\"1\" name=\"radio_group_old' + new_post_result.id + '\">';
        
        html_new_posts_1 += '<label for=\"poll-id-1-old'+ new_post_result.id +'\" class=\"poll-answer-style-1\"><span> ' + new_post_result.answer1 + '</span></label><br></div>';
        
        html_new_posts_1 +=  '<div class=\"radio-second radio-second-old'+ new_post_result.id +'\" style=\"display: none;\">';
        
        html_new_posts_1 +=  '<p class=\"poll-answer-style-1\"> ' + new_post_result.answer1 + ' </p>';
        
        html_new_posts_1 +=  '<progress value=\"100\" max=\"100\" id=\"progressPoll1-old'+ new_post_result.id +'\" class=\"poll-progress\"></progress>'; 
        
        html_new_posts_1 +=  '<a class=\"poll-score poll-score1-old'+ new_post_result.id +'\"> 30% | 34 votes</a>'; 
        
        html_new_posts_1 += '<img class=\"poll-img1-old'+ new_post_result.id +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        html_new_posts_1 +=  '</div>';
                      
                      
                      
                      
                      
                      
                      
                      
                
        html_new_posts_1 += '<p class=\"poll-answer-box-old'+ new_post_result.id +'\">';       
        
        html_new_posts_1 += '<div class=\"radio-first  radio-first-old'+ new_post_result.id +'\" style=\"display: none;\"><input class=\"radio-new-class-old'+ new_post_result.id +'\"  type=\"radio\" id=\"poll-id-2-old'+ new_post_result.id +'\" value=\"2\" name=\"radio_group_old' + new_post_result.id + '\">';
        
        html_new_posts_1 += '<label for=\"poll-id-2-old'+ new_post_result.id +'\" class=\"poll-answer-style-1\"><span> ' + new_post_result.answer2 + '</span></label><br></div>';
        
        html_new_posts_1 +=  '<div class=\"radio-second radio-second-old'+ new_post_result.id +'\" style=\"display: none;\">';
        
        html_new_posts_1 +=  '<p class=\"poll-answer-style-1\"> ' + new_post_result.answer2 + ' </p>';
        
        html_new_posts_1 +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll2-old'+ new_post_result.id +'\" class=\"poll-progress\"></progress>'; 
        
        html_new_posts_1 +=  '<a class=\"poll-score poll-score2-old'+ new_post_result.id +'\"> 30% | 34 votes</a>'; 
        
        html_new_posts_1 += '<img class=\"poll-img2-old'+ new_post_result.id +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        html_new_posts_1 +=  '</div>';
                      
                      
                      
                      
                      
                      
                      
            if (new_post_result.answer3.trim().length > 0) {          
            
        html_new_posts_1 += '<p class=\"poll-answer-box-old'+ new_post_result.id +'\">';       
        
        html_new_posts_1 += '<div class=\"radio-first  radio-first-old'+ new_post_result.id +'\" style=\"display: none;\"><input class=\"radio-new-class-old'+ new_post_result.id +'\"  type=\"radio\" id=\"poll-id-3-old'+ new_post_result.id +'\" value=\"3\" name=\"radio_group_old' + new_post_result.id + '\">';
        
        html_new_posts_1 += '<label for=\"poll-id-3-old'+ new_post_result.id +'\" class=\"poll-answer-style-1\"><span> ' + new_post_result.answer3 + '</span></label><br></div>';
        
        html_new_posts_1 +=  '<div class=\"radio-second radio-second-old'+ new_post_result.id +'\" style=\"display: none;\">';
        
        html_new_posts_1 +=  '<p class=\"poll-answer-style-1\"> ' + new_post_result.answer3 + ' </p>';
        
        html_new_posts_1 +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll3-old'+ new_post_result.id +'\" class=\"poll-progress\"></progress>'; 
        
        html_new_posts_1 +=  '<a class=\"poll-score poll-score3-old'+ new_post_result.id +'\"> 30% | 34 votes</a>'; 
        
        html_new_posts_1 += '<img class=\"poll-img3-old'+ new_post_result.id +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        html_new_posts_1 +=  '</div>';

        }
                      
                      
                      
                      
                      
                      
                      
                      
                      
            if (new_post_result.answer4.trim().length > 0) {          
            
        html_new_posts_1 += '<p class=\"poll-answer-box-old'+ new_post_result.id +'\">';       
        
        html_new_posts_1 += '<div class=\"radio-first  radio-first-old'+ new_post_result.id +'\" style=\"display: none;\"><input class=\"radio-new-class-old'+ new_post_result.id +'\"  type=\"radio\" id=\"poll-id-4-old'+ new_post_result.id +'\" value=\"4\" name=\"radio_group_old' + new_post_result.id + '\">';
        
        html_new_posts_1 += '<label for=\"poll-id-4-old'+ new_post_result.id +'\" class=\"poll-answer-style-1\"><span> ' + new_post_result.answer4 + '</span></label><br></div>';
        
        html_new_posts_1 +=  '<div class=\"radio-second radio-second-old'+ new_post_result.id +'\" style=\"display: none;\">';
        
        html_new_posts_1 +=  '<p class=\"poll-answer-style-1\"> ' + new_post_result.answer4 + ' </p>';
        
        html_new_posts_1 +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll4-old'+ new_post_result.id +'\" class=\"poll-progress\"></progress>'; 
        
        html_new_posts_1 +=  '<a class=\"poll-score poll-score4-old'+ new_post_result.id +'\"> 30% | 34 votes</a>'; 
        
        html_new_posts_1 += '<img class=\"poll-img4-old'+ new_post_result.id +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        html_new_posts_1 +=  '</div>';

        }
                      
                      
                      
                      
                      
                      
        if (new_post_result.answer5.trim().length > 0) {          
            
        html_new_posts_1 += '<p class=\"poll-answer-box-old'+ new_post_result.id +'\">';       
        
        html_new_posts_1 += '<div class=\"radio-first  radio-first-old'+ new_post_result.id +'\" style=\"display: none;\"><input class=\"radio-new-class-old'+ new_post_result.id +'\"  type=\"radio\" id=\"poll-id-5-old'+ new_post_result.id +'\" value=\"5\" name=\"radio_group_old' + new_post_result.id + '\">';
        
        html_new_posts_1 += '<label for=\"poll-id-5-old'+ new_post_result.id +'\" class=\"poll-answer-style-1\"><span> ' + new_post_result.answer5 + '</span></label><br></div>';
        
        html_new_posts_1 +=  '<div class=\"radio-second radio-second-old'+ new_post_result.id +'\" style=\"display: none;\">';
        
        html_new_posts_1 +=  '<p class=\"poll-answer-style-1\"> ' + new_post_result.answer5 + ' </p>';
        
        html_new_posts_1 +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll5-old'+ new_post_result.id +'\" class=\"poll-progress\"></progress>'; 
        
        html_new_posts_1 +=  '<a class=\"poll-score poll-score5-old'+ new_post_result.id +'\"> 30% | 34 votes</a>'; 
        
        html_new_posts_1 += '<img class=\"poll-img5-old'+ new_post_result.id +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        html_new_posts_1 +=  '</div>';

        }
                      
                      
                      
                      
           
                      
               if (new_post_result.answer6.trim().length > 0) {          
            
        html_new_posts_1 += '<p class=\"poll-answer-box-old'+ new_post_result.id +'\">';       
        
        html_new_posts_1 += '<div class=\"radio-first  radio-first-old'+ new_post_result.id +'\" style=\"display: none;\"><input class=\"radio-new-class-old'+ new_post_result.id +'\"  type=\"radio\" id=\"poll-id-6-old'+ new_post_result.id +'\" value=\"6\" name=\"radio_group_old' + new_post_result.id + '\">';
        
        html_new_posts_1 += '<label for=\"poll-id-6-old'+ new_post_result.id +'\" class=\"poll-answer-style-1\"><span> ' + new_post_result.answer6 + '</span></label><br></div>';
        
        html_new_posts_1 +=  '<div class=\"radio-second radio-second-old'+ new_post_result.id +'\" style=\"display: none;\">';
        
        html_new_posts_1 +=  '<p class=\"poll-answer-style-1\"> ' + new_post_result.answer6 + ' </p>';
        
        html_new_posts_1 +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll6-old'+ new_post_result.id +'\" class=\"poll-progress\"></progress>'; 
        
        html_new_posts_1 +=  '<a class=\"poll-score poll-score6-old'+ new_post_result.id +'\"> 30% | 34 votes</a>'; 
        
        html_new_posts_1 += '<img class=\"poll-img6-old'+ new_post_result.id +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        html_new_posts_1 +=  '</div>';

        }
                      
                      
                      
                      
                      
                      
                      
                      if (new_post_result.answer7.trim().length > 0) {          
            
        html_new_posts_1 += '<p class=\"poll-answer-box-old'+ new_post_result.id +'\">';       
        
        html_new_posts_1 += '<div class=\"radio-first  radio-first-old'+ new_post_result.id +'\" style=\"display: none;\"><input class=\"radio-new-class-old'+ new_post_result.id +'\"  type=\"radio\" id=\"poll-id-7-old'+ new_post_result.id +'\" value=\"7\" name=\"radio_group_old' + new_post_result.id + '\">';
        
        html_new_posts_1 += '<label for=\"poll-id-7-old'+ new_post_result.id +'\" class=\"poll-answer-style-1\"><span> ' + new_post_result.answer7 + '</span></label><br></div>';
        
        html_new_posts_1 +=  '<div class=\"radio-second radio-second-old'+ new_post_result.id +'\" style=\"display: none;\">';
        
        html_new_posts_1 +=  '<p class=\"poll-answer-style-1\"> ' + new_post_result.answer7 + ' </p>';
        
        html_new_posts_1 +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll7-old'+ new_post_result.id +'\" class=\"poll-progress\"></progress>'; 
        
        html_new_posts_1 +=  '<a class=\"poll-score poll-score7-old'+ new_post_result.id +'\"> 30% | 34 votes</a>'; 
        
        html_new_posts_1 += '<img class=\"poll-img7-old'+ new_post_result.id +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        html_new_posts_1 +=  '</div>';

        }       
                      
                      
                      
          
                      
                      
                      
                      
                             if (new_post_result.answer8.trim().length > 0) {          
            
        html_new_posts_1 += '<p class=\"poll-answer-box-old'+ new_post_result.id +'\">';       
        
        html_new_posts_1 += '<div class=\"radio-first  radio-first-old'+ new_post_result.id +'\" style=\"display: none;\"><input class=\"radio-new-class-old'+ new_post_result.id +'\"  type=\"radio\" id=\"poll-id-8-old'+ new_post_result.id +'\" value=\"8\" name=\"radio_group_old' + new_post_result.id + '\">';
        
        html_new_posts_1 += '<label for=\"poll-id-8-old'+ new_post_result.id +'\" class=\"poll-answer-style-1\"><span> ' + new_post_result.answer8 + '</span></label><br></div>';
        
        html_new_posts_1 +=  '<div class=\"radio-second radio-second-old'+ new_post_result.id +'\" style=\"display: none;\">';
        
        html_new_posts_1 +=  '<p class=\"poll-answer-style-1\"> ' + new_post_result.answer8 + ' </p>';
        
        html_new_posts_1 +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll8-old'+ new_post_result.id +'\" class=\"poll-progress\"></progress>'; 
        
        html_new_posts_1 +=  '<a class=\"poll-score poll-score8-old'+ new_post_result.id +'\"> 30% | 34 votes</a>'; 
        
        html_new_posts_1 += '<img class=\"poll-img8-old'+ new_post_result.id +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        html_new_posts_1 +=  '</div>';

        }
                      
                      
                
                      
                      
                      
                             if (new_post_result.answer9.trim().length > 0) {          
            
        html_new_posts_1 += '<p class=\"poll-answer-box-old'+ new_post_result.id +'\">';       
        
        html_new_posts_1 += '<div class=\"radio-first  radio-first-old'+ new_post_result.id +'\" style=\"display: none;\"><input class=\"radio-new-class-old'+ new_post_result.id +'\"  type=\"radio\" id=\"poll-id-9-old'+ new_post_result.id +'\" value=\"9\" name=\"radio_group_old' + new_post_result.id + '\">';
        
        html_new_posts_1 += '<label for=\"poll-id-9-old'+ new_post_result.id +'\" class=\"poll-answer-style-1\"><span> ' + new_post_result.answer9 + '</span></label><br></div>';
        
        html_new_posts_1 +=  '<div class=\"radio-second radio-second-old'+ new_post_result.id +'\" style=\"display: none;\">';
        
        html_new_posts_1 +=  '<p class=\"poll-answer-style-1\"> ' + new_post_result.answer9 + ' </p>';
        
        html_new_posts_1 +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll9-old'+ new_post_result.id +'\" class=\"poll-progress\"></progress>'; 
        
        html_new_posts_1 +=  '<a class=\"poll-score poll-score9-old'+ new_post_result.id +'\"> 30% | 34 votes</a>'; 
        
        html_new_posts_1 += '<img class=\"poll-img9-old'+ new_post_result.id +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        html_new_posts_1 +=  '</div>';

        }
                      
                      
           
                      
                if (new_post_result.answer10.trim().length > 0) {          
            
        html_new_posts_1 += '<p class=\"poll-answer-box-old'+ new_post_result.id +'\">';       
        
        html_new_posts_1 += '<div class=\"radio-first  radio-first-old'+ new_post_result.id +'\" style=\"display: none;\"><input class=\"radio-new-class-old'+ new_post_result.id +'\"  type=\"radio\" id=\"poll-id-10-old'+ new_post_result.id +'\" value=\"10\" name=\"radio_group_old' + new_post_result.id + '\">';
        
        html_new_posts_1 += '<label for=\"poll-id-10-old'+ new_post_result.id +'\" class=\"poll-answer-style-1\"><span> ' + new_post_result.answer10 + '</span></label><br></div>';
        
        html_new_posts_1 +=  '<div class=\"radio-second radio-second-old'+ new_post_result.id +'\" style=\"display: none;\">';
        
        html_new_posts_1 +=  '<p class=\"poll-answer-style-1\"> ' + new_post_result.answer10 + ' </p>';
        
        html_new_posts_1 +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll10-old'+ new_post_result.id +'\" class=\"poll-progress\"></progress>'; 
        
        html_new_posts_1 +=  '<a class=\"poll-score poll-score10-old'+ new_post_result.id +'\"> 30% | 34 votes</a>'; 
        
        html_new_posts_1 += '<img class=\"poll-img10-old'+ new_post_result.id +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        html_new_posts_1 +=  '</div>';

        }
                      
                      
                      
                            
        
        html_new_posts_1 += '</form>';
        
        
                      
                      
                      
                      
                      
                      
                      
                      
        html_new_posts_1 += '<div class=\"row\">';                    
                            
          html_new_posts_1 += '<div class=\"col-xs-12\">';
              
                            
          html_new_posts_1 += '<a id=\"pollvote_old'+ new_post_result.id +'\" onclick=\"pollvoteold('+ new_post_result.id + ')\" style=\"display: none;\">';    
        
          html_new_posts_1 += '<button  class=\"btn poll-1\">';
        
          html_new_posts_1 += 'Vote</button></a>';
              
              
          html_new_posts_1 += '<a onclick=\"voteagainold('+ new_post_result.id + ')\" id=\"pollchange_old'+ new_post_result.id +'\" style=\"display: none;\">';    
        
          html_new_posts_1 += '<button class=\"btn poll-1\">';
        
          html_new_posts_1 += 'Change Vote</button></a>';
              
              
        
          html_new_posts_1 += '<a class=\"poll-totalold'+ new_post_result.id +'\" style=\"display: none; margin-left: 30px;\">589 total votes</a>';
              
          html_new_posts_1 += '</div></div><br>';
              
              
                     
          html_new_posts_1 += '<div class=\"row\" >';
                     
                     
          html_new_posts_1 += '<div class=\"col-xs-2\" style=\" height: 25px;\">';
                     
                    
                     
          html_new_posts_1 += '<img onclick=\"start_delete_old(' + new_post_result.id + ') \" class=\" size-0 \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/arrow.svg' + '\" />';
                     
                     
          html_new_posts_1 += '</div>';
                     
                     
          html_new_posts_1 += '<div class=\"col-xs-3\" style=\" height: 25px;\">';
                     
                    
           
           
          html_new_posts_1 += '<img class=\" size-2 '+ 'start_delete_old' + new_post_result.id + '   like_delete_old'  +  new_post_result.id  +  '    \" src=\"' + new_post_result.like_src + '\" onclick=\"likeoldpoll(' +  new_post_result.id + ') \" />';
           
           
                     
        
          html_new_posts_1 += '</div>';
                     
                     
          html_new_posts_1 += '<div class=\"col-xs-5\" >';
                     
                     
         
                     
          html_new_posts_1 += '</div>';
                     
                         
                     
          html_new_posts_1 += '<div class=\"col-xs-2\" style=\" height: 25px;\">';
                     
                    
                     
      
                     
          html_new_posts_1 += '</div>';
                     
                     
                     
          html_new_posts_1 += '</div></div>';
                     
          html_new_posts_1 += '<div class=\"col-xs-2\"><img src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/nopic.png\" style=\"width: 40px; margin-left: 0px;\"  /></div></div>';
                      
            window["votebuttonold" + new_post_result.id] = true;
              
               // setTimeout(getOldPollVote, 10000, new_post_result.id);     
                      
                  //    $(".radio-first-old" + new_post_result.id).hide(0);
                      
                //      $(".radio-second-old" + new_post_result.id).hide(0);
                      
             getOldPollVote(new_post_result.id);
                   
               }
                  
                  
                  
                  
                  
                  
                  
                  
                  
                 
                  
                  
                  
                  
                  
                      if (new_post_result.type == "poll" && new_post_result.owner == "<?php echo $user_info['id']; ?>") {

                     
                     
                     
                     
                            const haystack = currentArray;
                     
                            const needle = new_post_result.timeinput;
                     
                            const isInArray = haystack.includes(parseInt(needle));

                     
                
                     
                     
                           if (isInArray) {

                           // Do nothing.
                           }     
                     
                     
                     
                     if (!isInArray)  {
                         
                         
                         
                         
                        html_new_posts_1 += '<div id=\"'+ 'whole_old_post' + new_post_result.id +'\" class=\"row poll-div\" style=\"margin-bottom: 20px;\">';
        
        
        html_new_posts_1 += '<div class=\"col-xs-2\"><img src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/nopic.png\" style=\"width: 40px; margin-left: 10px;\"  /></div>';
        
        html_new_posts_1 += '<div class=\"col-xs-10 poll-body\">';
        
        html_new_posts_1 += '<p class=\"poll-quest-box\"> ' +  new_post_result.question +' </p>';
                         
                         
        html_new_posts_1 += '<div class=\"poll-load-old-'+ new_post_result.id +'\"><img src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/wedges.gif\" width=\"90\" height=\"90\"  style=\"display: table; margin: 0 auto;\"  /></div>'; 

    
        html_new_posts_1 += '<form action=\"#\">';
    
        
        
    
        html_new_posts_1 += '<p class=\"poll-answer-box-old'+ new_post_result.id +'\">';       
        
        html_new_posts_1 += '<div class=\"radio-first  radio-first-old'+ new_post_result.id +'\" style=\"display: none;\"><input class=\"radio-new-class-old'+ new_post_result.id +'\"  type=\"radio\" id=\"poll-id-1-old'+ new_post_result.id +'\" value=\"1\" name=\"radio_group_old' + new_post_result.id + '\">';
        
        html_new_posts_1 += '<label for=\"poll-id-1-old'+ new_post_result.id +'\" class=\"poll-answer-style-1\"><span> ' + new_post_result.answer1 + '</span></label><br></div>';
        
        html_new_posts_1 +=  '<div class=\"radio-second radio-second-old'+ new_post_result.id +'\" style=\"display: none;\">';
        
        html_new_posts_1 +=  '<p class=\"poll-answer-style-1\"> ' + new_post_result.answer1 + ' </p>';
        
        html_new_posts_1 +=  '<progress value=\"100\" max=\"100\" id=\"progressPoll1-old'+ new_post_result.id +'\" class=\"poll-progress\"></progress>'; 
        
        html_new_posts_1 +=  '<a class=\"poll-score poll-score1-old'+ new_post_result.id +'\"> 30% | 34 votes</a>'; 
        
        html_new_posts_1 += '<img class=\"poll-img1-old'+ new_post_result.id +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        html_new_posts_1 +=  '</div>';
                      
                      
                      
                      
                      
                      
                      
                      
                
        html_new_posts_1 += '<p class=\"poll-answer-box-old'+ new_post_result.id +'\">';       
        
        html_new_posts_1 += '<div class=\"radio-first  radio-first-old'+ new_post_result.id +'\" style=\"display: none;\"><input class=\"radio-new-class-old'+ new_post_result.id +'\"  type=\"radio\" id=\"poll-id-2-old'+ new_post_result.id +'\" value=\"2\" name=\"radio_group_old' + new_post_result.id + '\">';
        
        html_new_posts_1 += '<label for=\"poll-id-2-old'+ new_post_result.id +'\" class=\"poll-answer-style-1\"><span> ' + new_post_result.answer2 + '</span></label><br></div>';
        
        html_new_posts_1 +=  '<div class=\"radio-second radio-second-old'+ new_post_result.id +'\" style=\"display: none;\">';
        
        html_new_posts_1 +=  '<p class=\"poll-answer-style-1\"> ' + new_post_result.answer2 + ' </p>';
        
        html_new_posts_1 +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll2-old'+ new_post_result.id +'\" class=\"poll-progress\"></progress>'; 
        
        html_new_posts_1 +=  '<a class=\"poll-score poll-score2-old'+ new_post_result.id +'\"> 30% | 34 votes</a>'; 
        
        html_new_posts_1 += '<img class=\"poll-img2-old'+ new_post_result.id +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        html_new_posts_1 +=  '</div>';
                      
                      
                      
                      
                      
                      
                      
            if (new_post_result.answer3.trim().length > 0) {          
            
        html_new_posts_1 += '<p class=\"poll-answer-box-old'+ new_post_result.id +'\">';       
        
        html_new_posts_1 += '<div class=\"radio-first  radio-first-old'+ new_post_result.id +'\" style=\"display: none;\"><input class=\"radio-new-class-old'+ new_post_result.id +'\"  type=\"radio\" id=\"poll-id-3-old'+ new_post_result.id +'\" value=\"3\" name=\"radio_group_old' + new_post_result.id + '\">';
        
        html_new_posts_1 += '<label for=\"poll-id-3-old'+ new_post_result.id +'\" class=\"poll-answer-style-1\"><span> ' + new_post_result.answer3 + '</span></label><br></div>';
        
        html_new_posts_1 +=  '<div class=\"radio-second radio-second-old'+ new_post_result.id +'\" style=\"display: none;\">';
        
        html_new_posts_1 +=  '<p class=\"poll-answer-style-1\"> ' + new_post_result.answer3 + ' </p>';
        
        html_new_posts_1 +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll3-old'+ new_post_result.id +'\" class=\"poll-progress\"></progress>'; 
        
        html_new_posts_1 +=  '<a class=\"poll-score poll-score3-old'+ new_post_result.id +'\"> 30% | 34 votes</a>'; 
        
        html_new_posts_1 += '<img class=\"poll-img3-old'+ new_post_result.id +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        html_new_posts_1 +=  '</div>';

        }
                      
                      
                      
                      
                      
                      
                      
                      
                      
            if (new_post_result.answer4.trim().length > 0) {          
            
        html_new_posts_1 += '<p class=\"poll-answer-box-old'+ new_post_result.id +'\">';       
        
        html_new_posts_1 += '<div class=\"radio-first  radio-first-old'+ new_post_result.id +'\" style=\"display: none;\"><input class=\"radio-new-class-old'+ new_post_result.id +'\"  type=\"radio\" id=\"poll-id-4-old'+ new_post_result.id +'\" value=\"4\" name=\"radio_group_old' + new_post_result.id + '\">';
        
        html_new_posts_1 += '<label for=\"poll-id-4-old'+ new_post_result.id +'\" class=\"poll-answer-style-1\"><span> ' + new_post_result.answer4 + '</span></label><br></div>';
        
        html_new_posts_1 +=  '<div class=\"radio-second radio-second-old'+ new_post_result.id +'\" style=\"display: none;\">';
        
        html_new_posts_1 +=  '<p class=\"poll-answer-style-1\"> ' + new_post_result.answer4 + ' </p>';
        
        html_new_posts_1 +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll4-old'+ new_post_result.id +'\" class=\"poll-progress\"></progress>'; 
        
        html_new_posts_1 +=  '<a class=\"poll-score poll-score4-old'+ new_post_result.id +'\"> 30% | 34 votes</a>'; 
        
        html_new_posts_1 += '<img class=\"poll-img4-old'+ new_post_result.id +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        html_new_posts_1 +=  '</div>';

        }
                      
                      
                      
                      
                      
                      
        if (new_post_result.answer5.trim().length > 0) {          
            
        html_new_posts_1 += '<p class=\"poll-answer-box-old'+ new_post_result.id +'\">';       
        
        html_new_posts_1 += '<div class=\"radio-first  radio-first-old'+ new_post_result.id +'\" style=\"display: none;\"><input class=\"radio-new-class-old'+ new_post_result.id +'\"  type=\"radio\" id=\"poll-id-5-old'+ new_post_result.id +'\" value=\"5\" name=\"radio_group_old' + new_post_result.id + '\">';
        
        html_new_posts_1 += '<label for=\"poll-id-5-old'+ new_post_result.id +'\" class=\"poll-answer-style-1\"><span> ' + new_post_result.answer5 + '</span></label><br></div>';
        
        html_new_posts_1 +=  '<div class=\"radio-second radio-second-old'+ new_post_result.id +'\" style=\"display: none;\">';
        
        html_new_posts_1 +=  '<p class=\"poll-answer-style-1\"> ' + new_post_result.answer5 + ' </p>';
        
        html_new_posts_1 +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll5-old'+ new_post_result.id +'\" class=\"poll-progress\"></progress>'; 
        
        html_new_posts_1 +=  '<a class=\"poll-score poll-score5-old'+ new_post_result.id +'\"> 30% | 34 votes</a>'; 
        
        html_new_posts_1 += '<img class=\"poll-img5-old'+ new_post_result.id +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        html_new_posts_1 +=  '</div>';

        }
                      
                      
                      
                      
           
                      
               if (new_post_result.answer6.trim().length > 0) {          
            
        html_new_posts_1 += '<p class=\"poll-answer-box-old'+ new_post_result.id +'\">';       
        
        html_new_posts_1 += '<div class=\"radio-first  radio-first-old'+ new_post_result.id +'\" style=\"display: none;\"><input class=\"radio-new-class-old'+ new_post_result.id +'\"  type=\"radio\" id=\"poll-id-6-old'+ new_post_result.id +'\" value=\"6\" name=\"radio_group_old' + new_post_result.id + '\">';
        
        html_new_posts_1 += '<label for=\"poll-id-6-old'+ new_post_result.id +'\" class=\"poll-answer-style-1\"><span> ' + new_post_result.answer6 + '</span></label><br></div>';
        
        html_new_posts_1 +=  '<div class=\"radio-second radio-second-old'+ new_post_result.id +'\" style=\"display: none;\">';
        
        html_new_posts_1 +=  '<p class=\"poll-answer-style-1\"> ' + new_post_result.answer6 + ' </p>';
        
        html_new_posts_1 +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll6-old'+ new_post_result.id +'\" class=\"poll-progress\"></progress>'; 
        
        html_new_posts_1 +=  '<a class=\"poll-score poll-score6-old'+ new_post_result.id +'\"> 30% | 34 votes</a>'; 
        
        html_new_posts_1 += '<img class=\"poll-img6-old'+ new_post_result.id +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        html_new_posts_1 +=  '</div>';

        }
                      
                      
                      
                      
                      
                      
                      
                      if (new_post_result.answer7.trim().length > 0) {          
            
        html_new_posts_1 += '<p class=\"poll-answer-box-old'+ new_post_result.id +'\">';       
        
        html_new_posts_1 += '<div class=\"radio-first  radio-first-old'+ new_post_result.id +'\" style=\"display: none;\"><input class=\"radio-new-class-old'+ new_post_result.id +'\"  type=\"radio\" id=\"poll-id-7-old'+ new_post_result.id +'\" value=\"7\" name=\"radio_group_old' + new_post_result.id + '\">';
        
        html_new_posts_1 += '<label for=\"poll-id-7-old'+ new_post_result.id +'\" class=\"poll-answer-style-1\"><span> ' + new_post_result.answer7 + '</span></label><br></div>';
        
        html_new_posts_1 +=  '<div class=\"radio-second radio-second-old'+ new_post_result.id +'\" style=\"display: none;\">';
        
        html_new_posts_1 +=  '<p class=\"poll-answer-style-1\"> ' + new_post_result.answer7 + ' </p>';
        
        html_new_posts_1 +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll7-old'+ new_post_result.id +'\" class=\"poll-progress\"></progress>'; 
        
        html_new_posts_1 +=  '<a class=\"poll-score poll-score7-old'+ new_post_result.id +'\"> 30% | 34 votes</a>'; 
        
        html_new_posts_1 += '<img class=\"poll-img7-old'+ new_post_result.id +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        html_new_posts_1 +=  '</div>';

        }       
                      
                      
                      
          
                      
                      
                      
                      
                             if (new_post_result.answer8.trim().length > 0) {          
            
        html_new_posts_1 += '<p class=\"poll-answer-box-old'+ new_post_result.id +'\">';       
        
        html_new_posts_1 += '<div class=\"radio-first  radio-first-old'+ new_post_result.id +'\" style=\"display: none;\"><input class=\"radio-new-class-old'+ new_post_result.id +'\"  type=\"radio\" id=\"poll-id-8-old'+ new_post_result.id +'\" value=\"8\" name=\"radio_group_old' + new_post_result.id + '\">';
        
        html_new_posts_1 += '<label for=\"poll-id-8-old'+ new_post_result.id +'\" class=\"poll-answer-style-1\"><span> ' + new_post_result.answer8 + '</span></label><br></div>';
        
        html_new_posts_1 +=  '<div class=\"radio-second radio-second-old'+ new_post_result.id +'\" style=\"display: none;\">';
        
        html_new_posts_1 +=  '<p class=\"poll-answer-style-1\"> ' + new_post_result.answer8 + ' </p>';
        
        html_new_posts_1 +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll8-old'+ new_post_result.id +'\" class=\"poll-progress\"></progress>'; 
        
        html_new_posts_1 +=  '<a class=\"poll-score poll-score8-old'+ new_post_result.id +'\"> 30% | 34 votes</a>'; 
        
        html_new_posts_1 += '<img class=\"poll-img8-old'+ new_post_result.id +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        html_new_posts_1 +=  '</div>';

        }
                      
                      
                
                      
                      
                      
                             if (new_post_result.answer9.trim().length > 0) {          
            
        html_new_posts_1 += '<p class=\"poll-answer-box-old'+ new_post_result.id +'\">';       
        
        html_new_posts_1 += '<div class=\"radio-first  radio-first-old'+ new_post_result.id +'\" style=\"display: none;\"><input class=\"radio-new-class-old'+ new_post_result.id +'\"  type=\"radio\" id=\"poll-id-9-old'+ new_post_result.id +'\" value=\"9\" name=\"radio_group_old' + new_post_result.id + '\">';
        
        html_new_posts_1 += '<label for=\"poll-id-9-old'+ new_post_result.id +'\" class=\"poll-answer-style-1\"><span> ' + new_post_result.answer9 + '</span></label><br></div>';
        
        html_new_posts_1 +=  '<div class=\"radio-second radio-second-old'+ new_post_result.id +'\" style=\"display: none;\">';
        
        html_new_posts_1 +=  '<p class=\"poll-answer-style-1\"> ' + new_post_result.answer9 + ' </p>';
        
        html_new_posts_1 +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll9-old'+ new_post_result.id +'\" class=\"poll-progress\"></progress>'; 
        
        html_new_posts_1 +=  '<a class=\"poll-score poll-score9-old'+ new_post_result.id +'\"> 30% | 34 votes</a>'; 
        
        html_new_posts_1 += '<img class=\"poll-img9-old'+ new_post_result.id +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        html_new_posts_1 +=  '</div>';

        }
                      
                      
           
                      
                if (new_post_result.answer10.trim().length > 0) {          
            
        html_new_posts_1 += '<p class=\"poll-answer-box-old'+ new_post_result.id +'\">';       
        
        html_new_posts_1 += '<div class=\"radio-first  radio-first-old'+ new_post_result.id +'\" style=\"display: none;\"><input class=\"radio-new-class-old'+ new_post_result.id +'\"  type=\"radio\" id=\"poll-id-10-old'+ new_post_result.id +'\" value=\"10\" name=\"radio_group_old' + new_post_result.id + '\">';
        
        html_new_posts_1 += '<label for=\"poll-id-10-old'+ new_post_result.id +'\" class=\"poll-answer-style-1\"><span> ' + new_post_result.answer10 + '</span></label><br></div>';
        
        html_new_posts_1 +=  '<div class=\"radio-second radio-second-old'+ new_post_result.id +'\" style=\"display: none;\">';
        
        html_new_posts_1 +=  '<p class=\"poll-answer-style-1\"> ' + new_post_result.answer10 + ' </p>';
        
        html_new_posts_1 +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll10-old'+ new_post_result.id +'\" class=\"poll-progress\"></progress>'; 
        
        html_new_posts_1 +=  '<a class=\"poll-score poll-score10-old'+ new_post_result.id +'\"> 30% | 34 votes</a>'; 
        
        html_new_posts_1 += '<img class=\"poll-img10-old'+ new_post_result.id +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        html_new_posts_1 +=  '</div>';

        }
                      
                      
                      
                            
        
        html_new_posts_1 += '</form>';
        
        
                      
                      
                      
                      
                      
                      
                      
                      
          html_new_posts_1 += '<div class=\"row\">';                    
                            
          html_new_posts_1 += '<div class=\"col-xs-12\">';
              
                            
          html_new_posts_1 += '<a id=\"pollvote_old'+ new_post_result.id +'\" onclick=\"pollvoteold('+ new_post_result.id + ')\" style=\"display: none;\">';    
        
          html_new_posts_1 += '<button  class=\"btn poll-1\">';
        
          html_new_posts_1 += 'Vote</button></a>';
              
              
          html_new_posts_1 += '<a onclick=\"voteagainold('+ new_post_result.id + ')\" id=\"pollchange_old'+ new_post_result.id +'\" style=\"display: none;\">';    
        
          html_new_posts_1 += '<button class=\"btn poll-1\">';
        
          html_new_posts_1 += 'Change Vote</button></a>';
              
              
        
          html_new_posts_1 += '<a class=\"poll-totalold'+ new_post_result.id +'\" style=\"display: none; margin-left: 30px;\">589 total votes</a>';
              
          html_new_posts_1 += '</div></div><br>';
              
              
                     
          html_new_posts_1 += '<div class=\"row\" >';
                     
                     
          html_new_posts_1 += '<div class=\"col-xs-2\" style=\" height: 25px;\">';
                     
                    
                     
          html_new_posts_1 += '<img onclick=\"start_delete_old(' + new_post_result.id + ') \" class=\" size-0 \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/arrow.svg' + '\" />';
                     
                     
          html_new_posts_1 += '</div>';
                     
                     
          html_new_posts_1 += '<div class=\"col-xs-3\" style=\" height: 25px;\">';
                     
                    
           
           
          html_new_posts_1 += '<img class=\" size-2 '+ 'start_delete_old' + new_post_result.id + '   like_delete_old'  +  new_post_result.id  +  '    \" src=\"' + new_post_result.like_src + '\" onclick=\"likeoldpoll(' +  new_post_result.id + ') \" />';
           
           
                     
          html_new_posts_1 += '<img onclick=\"show_delete_old(' + new_post_result.id + ') \" class=\" size-3 '+ 'start_delete_old' + new_post_result.id +' \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/garbage.svg' + '\" />';
                     
          html_new_posts_1 += '</div>';
                     
                     
          html_new_posts_1 += '<div class=\"col-xs-5\" >';
                     
                     
          html_new_posts_1 += '<a class=\"delete-2 '+ 'show_delete_old' + new_post_result.id +'\" onclick=\"deletenewpoll_old(' +  new_post_result.id + ') \">delete</a><a style=\"display: none; font-size: 13px;\" class=\"'+ 'show_delete_old' + new_post_result.id +'\" > //</a>';
                     
                     
          html_new_posts_1 += '<a onclick=\"hide_delete_old(' + new_post_result.id + ') \" class=\"delete-3 '+ 'show_delete_old' + new_post_result.id +'\">don\'t</a>';
                     
                     
          html_new_posts_1 += '</div>';
                     
                         
                     
          html_new_posts_1 += '<div class=\"col-xs-2\" style=\" height: 25px;\">';
                     
                    
                     
          html_new_posts_1 += '<img class=\" size-1 \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/checked.svg' + '\" />';
                     
                     
          html_new_posts_1 += '</div>';
                     
                     
                     
          html_new_posts_1 += '</div></div></div>';
                     
                        
                      
            window["votebuttonold" + new_post_result.id] = true;
              
               // setTimeout(getOldPollVote, 10000, new_post_result.id);     
                      
               //       $(".radio-first-old" + new_post_result.id).hide(0);
                      
               //       $(".radio-second-old" + new_post_result.id).hide(0);
                      
             getOldPollVote(new_post_result.id);
                    
                         
                         
                         
                         
                         
                         
                         
                         
                     }
                          
                          
                          
                      }
                  
                  
                  
                  
                  
                  
                  
                  
                  
                 

                 
                 

                 
                 if(new_post_result.type == 'attach' && new_post_result.owner == "<?php echo $user_info['id']; ?>") {
                     
        
                            const haystack = currentArray;
                     
                            const needle = new_post_result.timeinput;
                     
                            const isInArray = haystack.includes(parseInt(needle));

                     
                
                     
                     
                           if (isInArray) {

                           // Do nothing.
                           }     
                     
                     
                     
                     if (!isInArray)  {
                     
                                                
                html_new_posts_1 += '<div class=\"row\" id=\"'+ 'old_post' + new_post_result.id +'\">';
                html_new_posts_1 += '<div class=\"col-xs-2\">';
                html_new_posts_1 += '<a><img src=\" '+ '<?php echo $_SESSION['url_placeholder'];  ?>' + new_post_result.image  +' \" class=\"chat-left-1\"  /></a>';
                html_new_posts_1 += '</div>';
                html_new_posts_1 += '<div class=\"col-xs-10\">';
                html_new_posts_1 += '<div class=\"talk-bubble tri-right left-top\" class=\"chat-left-2\">';
                html_new_posts_1 += '<div class=\"talktext\">';
                html_new_posts_1 += '<p class=\"text-username\">' + new_post_result.username + '</p>';
                html_new_posts_1 += '<p class=\"text-body\"><a href=\" ' + new_post_result.path  + ' \" download>' + new_post_result.name + '</a></p>';
                         
                         
                                                 
                                             html_new_posts_1 += '<div class=\"row\" >';
                     
                     
                     html_new_posts_1 += '<div class=\"col-xs-2\" style=\" height: 25px;\">';
                     
                    
                     
                     html_new_posts_1 += '<img onclick=\"start_delete(' + new_post_result.id + ') \" class=\" size-0 \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/arrow.svg' + '\" />';
                     
                     
                     html_new_posts_1 += '</div>';
                     
                     
                     html_new_posts_1 += '<div class=\"col-xs-3\" style=\" height: 25px;\">';
                     
                    
                     
                    
                    html_new_posts_1 += '<img class=\" size-2 '+ 'start_delete' + new_post_result.id + '   like_delete'  +  new_post_result.id  +  '    \" src=\"' +  new_post_result.like_src + '\" onclick=\"likeoldpost(' + new_post_result.id + ') \" />';
                    
                     
                                        html_new_posts_1 += '<img onclick=\"show_delete(' + new_post_result.id + ') \" class=\" size-3 '+ 'start_delete' + new_post_result.id +' \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/garbage.svg' + '\" />';
                     
                     html_new_posts_1 += '</div>';
                     
                     
                     html_new_posts_1 += '<div class=\"col-xs-5\" >';
                     
                       html_new_posts_1 += '<a class=\"delete-2 '+ 'show_delete' + new_post_result.id +'\" onclick=\"deleteoldpost(' + new_post_result.id + ') \">delete</a><a style=\"display: none; font-size: 13px;\" class=\"'+ 'show_delete' + new_post_result.id +'\" > //</a>';
                     
                     
                      html_new_posts_1 += '<a onclick=\"hide_delete(' + new_post_result.id + ') \" class=\"delete-3 '+ 'show_delete' + new_post_result.id +'\">don\'t</a>';
                     
                        
                   
                     html_new_posts_1 += '</div>';
                     
                     
                     
                     
                     
                    html_new_posts_1 += '<div class=\"col-xs-2\" style=\" height: 25px;\">';
                     
                    
                    html_new_posts_1 += '<img class=\" size-1 \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/checked.svg' + '\" />';
                     
                     
                     html_new_posts_1 += '</div>';
                     
                     
                     
                     html_new_posts_1 += '</div>';
                     
                     
                         
                         
                         
                html_new_posts_1 += ' </div></div></div></div>';    
                      
                         
                         
                     }
                     
                     
        
                     
                 }  
                 
                 
                 
                    if(new_post_result.type == 'attach' && new_post_result.owner != "<?php echo $user_info['id']; ?>") {
         
                   html_new_posts_1 += '<div class=\"row\" id=\"'+ 'old_post' + new_post_result.id +'\">';
                   html_new_posts_1 += '<div class=\"col-xs-10\">';
                   html_new_posts_1 += '<div class=\"talk-bubble1 tri-right1 left-top1\" class=\"chat-right-1\">';
                   html_new_posts_1 += '<div class=\"talktext1\">';
                   html_new_posts_1 += '<p class=\"text-username\">' + new_post_result.username + '</p>';
                   html_new_posts_1 += '<p class=\"text-body\"><a href=\" ' + new_post_result.path  + ' \" download>' + new_post_result.name + '</a></p>';
                        
                        
                                             html_new_posts_1 += '<div class=\"row\" >';
                     
                     
                     html_new_posts_1 += '<div class=\"col-xs-2\" style=\" height: 25px;\">';
                     
                    
                     
                     html_new_posts_1 += '<img onclick=\"start_delete(' + new_post_result.id + ') \" class=\" size-0 \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/arrow.svg' + '\" />';
                     
                     
                     html_new_posts_1 += '</div>';
                     
                     
                     html_new_posts_1 += '<div class=\"col-xs-3\" style=\" height: 25px;\">';
                     
                    
                     
                                         
                    html_new_posts_1 += '<img class=\" size-2 '+ 'start_delete' + new_post_result.id + '   like_delete'  +  new_post_result.id  +  '    \" src=\"' +  new_post_result.like_src + '\" onclick=\"likeoldpost(' + new_post_result.id + ') \" />';
                    
                     
                    
                     
                     html_new_posts_1 += '</div>';
                     
                     
                     html_new_posts_1 += '<div class=\"col-xs-5\" >';
                     
                     // Empty div.
                   
                     html_new_posts_1 += '</div>';
                     
                     
                     
                     
                     
                    html_new_posts_1 += '<div class=\"col-xs-2\" style=\" height: 25px;\">';
                     
                    
                    // Empty div.
                     
                     html_new_posts_1 += '</div>';
                     
                     
                     
                     html_new_posts_1 += '</div>';
                     
                     
                     
                    
                        
                        
                   html_new_posts_1 += ' </div></div></div>';
                   html_new_posts_1 += '<div class=\"col-xs-2\">';
                   html_new_posts_1 += '<a><img src=\" ' +  '<?php echo $_SESSION['url_placeholder'];  ?>' + new_post_result.image  +' \" class=\"chat-right-2\"  /></a>';
                   html_new_posts_1 += '</div>';
                   html_new_posts_1 += '</div>';
                    
                 }
                 
                 
                 
                 
                 
                 
                 
                 
                 
                 
                 
                 
                 if (new_post_result.type == "chat" && new_post_result.owner == "<?php echo $user_info['id']; ?>") {

                     
                     
                     
                     
                            const haystack = currentArray;
                     
                            const needle = new_post_result.timeinput;
                     
                            const isInArray = haystack.includes(parseInt(needle));

                     
                
                     
                     
                           if (isInArray) {

                           // Do nothing.
                           }     
                     
                     
                     
                     if (!isInArray)  {
                         
                                        
                                         html_new_posts_1 += '<div class=\"row\" id=\"'+ 'old_post' + new_post_result.id +'\">';
                html_new_posts_1 += '<div class=\"col-xs-2\">';
                html_new_posts_1 += '<a><img src=\" '+ '<?php echo $_SESSION['url_placeholder'];  ?>' + new_post_result.image +'  \" class=\"chat-left-1\"  /></a>';
                html_new_posts_1 += '</div>';
                html_new_posts_1 += '<div class=\"col-xs-10\">';
                html_new_posts_1 += '<div class=\"talk-bubble tri-right left-top\" class=\"chat-left-2\">';
                html_new_posts_1 += '<div class=\"talktext\">';
                html_new_posts_1 += '<p class=\"text-username\">' + new_post_result.username + '</p>';
                html_new_posts_1 += '<p class=\"text-body\">'  + new_post_result.message + '</p>';
                                        
                                        
                                        
                                        
                                                                
                                             html_new_posts_1 += '<div class=\"row\" >';
                     
                     
                     html_new_posts_1 += '<div class=\"col-xs-2\" style=\" height: 25px;\">';
                     
                    
                     
                     html_new_posts_1 += '<img onclick=\"start_delete(' + new_post_result.id + ') \" class=\" size-0 \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/arrow.svg' + '\" />';
                     
                     
                     html_new_posts_1 += '</div>';
                     
                     
                     html_new_posts_1 += '<div class=\"col-xs-3\" style=\" height: 25px;\">';
                     
                    
                     
                                         
                    html_new_posts_1 += '<img class=\" size-2 '+ 'start_delete' + new_post_result.id + '   like_delete'  +  new_post_result.id  +  '    \" src=\"' +  new_post_result.like_src + '\" onclick=\"likeoldpost(' + new_post_result.id + ') \" />';
                    
                         
                         
                     
                    html_new_posts_1 += '<img onclick=\"show_delete(' + new_post_result.id + ') \" class=\" size-3 '+ 'start_delete' + new_post_result.id +' \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/garbage.svg' + '\" />';
                     
                     html_new_posts_1 += '</div>';
                     
                     
                     html_new_posts_1 += '<div class=\"col-xs-5\" >';
                     
                     
                     html_new_posts_1 += '<a class=\"delete-2 '+ 'show_delete' + new_post_result.id +'\" onclick=\"deleteoldpost(' + new_post_result.id + ') \">delete</a><a style=\"display: none; font-size: 13px;\" class=\"'+ 'show_delete' + new_post_result.id +'\" > //</a>';
                     
                     
                      html_new_posts_1 += '<a onclick=\"hide_delete(' + new_post_result.id + ') \" class=\"delete-3 '+ 'show_delete' + new_post_result.id +'\">don\'t</a>';
                     
                         
                   
                     html_new_posts_1 += '</div>';
                     
                     
                     
                     
                     
                    html_new_posts_1 += '<div class=\"col-xs-2\" style=\" height: 25px;\">';
                     
                    
                    html_new_posts_1 += '<img class=\" size-1 \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/checked.svg' + '\" />';
                     
                     
                     html_new_posts_1 += '</div>';
                     
                     
                     
                     html_new_posts_1 += '</div>';
                     
                     
                                        
                                        
                                        
                html_new_posts_1 += ' </div></div></div></div>';  
                                        
 
                                        
                                        
                                       
                         
                     }
                     
    
                     
                     
                     

                     
                 }
                 
                 
                 
                 
                 
                 
                 
                 
                 
                 
                 
                 
                 
                 
                 
                if (new_post_result.type == "chat" && new_post_result.owner != "<?php echo $user_info['id']; ?>") {
                    
                    
                   html_new_posts_1 += '<div class=\"row\" id=\"'+ 'old_post' + new_post_result.id +'\">';
                   html_new_posts_1 += '<div class=\"col-xs-10\">';
                   html_new_posts_1 += '<div class=\"talk-bubble1 tri-right1 left-top1\" class=\"chat-right-1\">';
                   html_new_posts_1 += '<div class=\"talktext1\">';
                   html_new_posts_1 += '<p class=\"text-username\">' + new_post_result.username + '</p>';
                   html_new_posts_1 += '<p class=\"text-body\">' + new_post_result.message + '</p>';
                    
                    
                                         html_new_posts_1 += '<div class=\"row\" >';
                     
                     
                     html_new_posts_1 += '<div class=\"col-xs-2\" style=\" height: 25px;\">';
                     
                    
                     
                     html_new_posts_1 += '<img onclick=\"start_delete(' + new_post_result.id + ') \" class=\" size-0 \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/arrow.svg' + '\" />';
                     
                     
                     html_new_posts_1 += '</div>';
                     
                     
                     html_new_posts_1 += '<div class=\"col-xs-3\" style=\" height: 25px;\">';
                     
                    
                    
                    
                    html_new_posts_1 += '<img class=\" size-2 '+ 'start_delete' + new_post_result.id + '   like_delete'  +  new_post_result.id  +  '    \" src=\"' +  new_post_result.like_src + '\" onclick=\"likeoldpost(' + new_post_result.id + ') \" />';
                    
                    
                     
                    html_new_posts_1 += '';
                     
                     html_new_posts_1 += '</div>';
                     
                     
                     html_new_posts_1 += '<div class=\"col-xs-5\" >';
                     
                     // Empty div.
                   
                     html_new_posts_1 += '</div>';
                     
                     
                     
                     
                     
                    html_new_posts_1 += '<div class=\"col-xs-2\" style=\" height: 25px;\">';
                     
                    
                    // Empty div.
                     
                     html_new_posts_1 += '</div>';
                     
                     
                     
                     html_new_posts_1 += '</div>';
                     
                     
                     
                    
                    
                   html_new_posts_1 += ' </div></div></div>';
                   html_new_posts_1 += '<div class=\"col-xs-2\">';
                   html_new_posts_1 += '<a><img src=\" ' +  '<?php echo $_SESSION['url_placeholder'];  ?>' + new_post_result.image  +' \" class=\"chat-right-2\"  /></a>';
                   html_new_posts_1 += '</div>';
                   html_new_posts_1 += '</div>';
                    
                     
                       
               
                     
                 }
                 
                 
                 
             }
             
             if ( lastTimeIDzeroTest === 1 ) {
            
                lastTimeIDzeroTest = 2;
                 
             } else {
            
                var new_items = $( html_new_posts_1 ).hide();
                 
                $( '#postsdiv' ).prepend( new_items );
                 
                new_items.show( 300 );
                 
             }
             
            
          }, 
           error: function( xhr, textStatus, errorThrown ) {
              
             },
            complete: function( ) {
               
                displayFromDatabase();
                
             }
       } );
    }
    
    
    
    
    
    
    
    
    
function displayFromDatabasePagination() {
        
    completedPosts = false;
    
    fetch_old_url = "<?php echo $_SESSION['url_placeholder'];  ?>fetch_old_posts";
      
    var flag;
        
    flag =   $.ajax( {
        
          url: fetch_old_url,
          type: "POST",
          async: true,
          data: {
              
             "fetchold": 1,
             "offset": firstTimeID,
              "group": page_group_id
              
          },
          success: function( data ) {
           
    
              if (data == 100) {
                  
                  $(window).unbind("scroll");
                  completedPosts = true;
                  $('#loading').hide();
                  $('#end').show();
                 return; 
              }
              
              
                if (data == 200) {
                  
                  $(window).unbind("scroll");
                  completedPosts = true;
                  $('#loading').hide();
                  $('#end').hide();
                  $('#continue').show();
                  $('#start').hide();
                 return; 
              }
              
              
              
            if (flag.readyState == 4 && flag.status == 200) { 
                                                              
                                                              
               $('#loadagain').hide();
                
               $('#loading').hide();
                
               var jsonOldPost = JSON.parse( data );
                
               var jsonOldLength = jsonOldPost.old_posts.length;
              
               var oldPostHtml = "";
                
               for ( var for_oldpost = 0; for_oldpost < jsonOldLength; for_oldpost++ ) {
                   
                   
                  var resultOldPost = jsonOldPost.old_posts[ for_oldpost ];
                   
                  firstTimeID = resultOldPost.id;
                   
                   
                   
                   
                   
                  if(resultOldPost.type == 'poll' && resultOldPost.owner == "<?php echo $user_info['id']; ?>") { 
                   
                   
                      
                      
        oldPostHtml += '<div id=\"'+ 'whole_old_post' + resultOldPost.id +'\" class=\"row poll-div\" style=\"margin-bottom: 20px;\">';
        
        
        oldPostHtml += '<div class=\"col-xs-2\"><img src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/nopic.png\" style=\"width: 40px; margin-left: 10px;\"  /></div>';
        
        oldPostHtml += '<div class=\"col-xs-10 poll-body\">';
        
        oldPostHtml += '<p class=\"poll-quest-box\"> ' +  resultOldPost.question +' </p>';

        oldPostHtml += '<div class=\"poll-load-old-'+ resultOldPost.id +'\"><img src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/wedges.gif\" width=\"90\" height=\"90\"  style=\"display: table; margin: 0 auto;\"  /></div>';             
                      
                      
        oldPostHtml += '<form action=\"#\">';
    
        
        
    
        oldPostHtml += '<p class=\"poll-answer-box-old'+ resultOldPost.id +'\">';       
        
        oldPostHtml += '<div class=\"radio-first  radio-first-old'+ resultOldPost.id +'\" style=\"display: none;\"><input class=\"radio-new-class-old'+ resultOldPost.id +'\"  type=\"radio\" id=\"poll-id-1-old'+ resultOldPost.id +'\" value=\"1\" name=\"radio_group_old' + resultOldPost.id + '\">';
        
        oldPostHtml += '<label for=\"poll-id-1-old'+ resultOldPost.id +'\" class=\"poll-answer-style-1\"><span> ' + resultOldPost.answer1 + '</span></label><br></div>';
        
        oldPostHtml +=  '<div class=\"radio-second radio-second-old'+ resultOldPost.id +'\" style=\"display: none;\">';
        
        oldPostHtml +=  '<p class=\"poll-answer-style-1\"> ' + resultOldPost.answer1 + ' </p>';
        
        oldPostHtml +=  '<progress value=\"100\" max=\"100\" id=\"progressPoll1-old'+ resultOldPost.id +'\" class=\"poll-progress\"></progress>'; 
        
        oldPostHtml +=  '<a class=\"poll-score poll-score1-old'+ resultOldPost.id +'\"> 30% | 34 votes</a>'; 
        
        oldPostHtml += '<img class=\"poll-img1-old'+ resultOldPost.id +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        oldPostHtml +=  '</div>';
                      
                      
                      
                      
                      
                      
                      
                      
                
        oldPostHtml += '<p class=\"poll-answer-box-old'+ resultOldPost.id +'\">';       
        
        oldPostHtml += '<div class=\"radio-first  radio-first-old'+ resultOldPost.id +'\" style=\"display: none;\"><input class=\"radio-new-class-old'+ resultOldPost.id +'\"  type=\"radio\" id=\"poll-id-2-old'+ resultOldPost.id +'\" value=\"2\" name=\"radio_group_old' + resultOldPost.id + '\">';
        
        oldPostHtml += '<label for=\"poll-id-2-old'+ resultOldPost.id +'\" class=\"poll-answer-style-1\"><span> ' + resultOldPost.answer2 + '</span></label><br></div>';
        
        oldPostHtml +=  '<div class=\"radio-second radio-second-old'+ resultOldPost.id +'\" style=\"display: none;\">';
        
        oldPostHtml +=  '<p class=\"poll-answer-style-1\"> ' + resultOldPost.answer2 + ' </p>';
        
        oldPostHtml +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll2-old'+ resultOldPost.id +'\" class=\"poll-progress\"></progress>'; 
        
        oldPostHtml +=  '<a class=\"poll-score poll-score2-old'+ resultOldPost.id +'\"> 30% | 34 votes</a>'; 
        
        oldPostHtml += '<img class=\"poll-img2-old'+ resultOldPost.id +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        oldPostHtml +=  '</div>';
                      
                      
                      
                      
                      
                      
                      
            if (resultOldPost.answer3.trim().length > 0) {          
            
        oldPostHtml += '<p class=\"poll-answer-box-old'+ resultOldPost.id +'\">';       
        
        oldPostHtml += '<div class=\"radio-first  radio-first-old'+ resultOldPost.id +'\" style=\"display: none;\"><input class=\"radio-new-class-old'+ resultOldPost.id +'\"  type=\"radio\" id=\"poll-id-3-old'+ resultOldPost.id +'\" value=\"3\" name=\"radio_group_old' + resultOldPost.id + '\">';
        
        oldPostHtml += '<label for=\"poll-id-3-old'+ resultOldPost.id +'\" class=\"poll-answer-style-1\"><span> ' + resultOldPost.answer3 + '</span></label><br></div>';
        
        oldPostHtml +=  '<div class=\"radio-second radio-second-old'+ resultOldPost.id +'\" style=\"display: none;\">';
        
        oldPostHtml +=  '<p class=\"poll-answer-style-1\"> ' + resultOldPost.answer3 + ' </p>';
        
        oldPostHtml +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll3-old'+ resultOldPost.id +'\" class=\"poll-progress\"></progress>'; 
        
        oldPostHtml +=  '<a class=\"poll-score poll-score3-old'+ resultOldPost.id +'\"> 30% | 34 votes</a>'; 
        
        oldPostHtml += '<img class=\"poll-img3-old'+ resultOldPost.id +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        oldPostHtml +=  '</div>';

        }
                      
                      
                      
                      
                      
                      
                      
                      
                      
            if (resultOldPost.answer4.trim().length > 0) {          
            
        oldPostHtml += '<p class=\"poll-answer-box-old'+ resultOldPost.id +'\">';       
        
        oldPostHtml += '<div class=\"radio-first  radio-first-old'+ resultOldPost.id +'\" style=\"display: none;\"><input class=\"radio-new-class-old'+ resultOldPost.id +'\"  type=\"radio\" id=\"poll-id-4-old'+ resultOldPost.id +'\" value=\"4\" name=\"radio_group_old' + resultOldPost.id + '\">';
        
        oldPostHtml += '<label for=\"poll-id-4-old'+ resultOldPost.id +'\" class=\"poll-answer-style-1\"><span> ' + resultOldPost.answer4 + '</span></label><br></div>';
        
        oldPostHtml +=  '<div class=\"radio-second radio-second-old'+ resultOldPost.id +'\" style=\"display: none;\">';
        
        oldPostHtml +=  '<p class=\"poll-answer-style-1\"> ' + resultOldPost.answer4 + ' </p>';
        
        oldPostHtml +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll4-old'+ resultOldPost.id +'\" class=\"poll-progress\"></progress>'; 
        
        oldPostHtml +=  '<a class=\"poll-score poll-score4-old'+ resultOldPost.id +'\"> 30% | 34 votes</a>'; 
        
        oldPostHtml += '<img class=\"poll-img4-old'+ resultOldPost.id +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        oldPostHtml +=  '</div>';

        }
                      
                      
                      
                      
                      
                      
        if (resultOldPost.answer5.trim().length > 0) {          
            
        oldPostHtml += '<p class=\"poll-answer-box-old'+ resultOldPost.id +'\">';       
        
        oldPostHtml += '<div class=\"radio-first  radio-first-old'+ resultOldPost.id +'\" style=\"display: none;\"><input class=\"radio-new-class-old'+ resultOldPost.id +'\"  type=\"radio\" id=\"poll-id-5-old'+ resultOldPost.id +'\" value=\"5\" name=\"radio_group_old' + resultOldPost.id + '\">';
        
        oldPostHtml += '<label for=\"poll-id-5-old'+ resultOldPost.id +'\" class=\"poll-answer-style-1\"><span> ' + resultOldPost.answer5 + '</span></label><br></div>';
        
        oldPostHtml +=  '<div class=\"radio-second radio-second-old'+ resultOldPost.id +'\" style=\"display: none;\">';
        
        oldPostHtml +=  '<p class=\"poll-answer-style-1\"> ' + resultOldPost.answer5 + ' </p>';
        
        oldPostHtml +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll5-old'+ resultOldPost.id +'\" class=\"poll-progress\"></progress>'; 
        
        oldPostHtml +=  '<a class=\"poll-score poll-score5-old'+ resultOldPost.id +'\"> 30% | 34 votes</a>'; 
        
        oldPostHtml += '<img class=\"poll-img5-old'+ resultOldPost.id +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        oldPostHtml +=  '</div>';

        }
                      
                      
                      
                      
           
                      
               if (resultOldPost.answer6.trim().length > 0) {          
            
        oldPostHtml += '<p class=\"poll-answer-box-old'+ resultOldPost.id +'\">';       
        
        oldPostHtml += '<div class=\"radio-first  radio-first-old'+ resultOldPost.id +'\" style=\"display: none;\"><input class=\"radio-new-class-old'+ resultOldPost.id +'\"  type=\"radio\" id=\"poll-id-6-old'+ resultOldPost.id +'\" value=\"6\" name=\"radio_group_old' + resultOldPost.id + '\">';
        
        oldPostHtml += '<label for=\"poll-id-6-old'+ resultOldPost.id +'\" class=\"poll-answer-style-1\"><span> ' + resultOldPost.answer6 + '</span></label><br></div>';
        
        oldPostHtml +=  '<div class=\"radio-second radio-second-old'+ resultOldPost.id +'\" style=\"display: none;\">';
        
        oldPostHtml +=  '<p class=\"poll-answer-style-1\"> ' + resultOldPost.answer6 + ' </p>';
        
        oldPostHtml +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll6-old'+ resultOldPost.id +'\" class=\"poll-progress\"></progress>'; 
        
        oldPostHtml +=  '<a class=\"poll-score poll-score6-old'+ resultOldPost.id +'\"> 30% | 34 votes</a>'; 
        
        oldPostHtml += '<img class=\"poll-img6-old'+ resultOldPost.id +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        oldPostHtml +=  '</div>';

        }
                      
                      
                      
                      
                      
                      
                      
                      if (resultOldPost.answer7.trim().length > 0) {          
            
        oldPostHtml += '<p class=\"poll-answer-box-old'+ resultOldPost.id +'\">';       
        
        oldPostHtml += '<div class=\"radio-first  radio-first-old'+ resultOldPost.id +'\" style=\"display: none;\"><input class=\"radio-new-class-old'+ resultOldPost.id +'\"  type=\"radio\" id=\"poll-id-7-old'+ resultOldPost.id +'\" value=\"7\" name=\"radio_group_old' + resultOldPost.id + '\">';
        
        oldPostHtml += '<label for=\"poll-id-7-old'+ resultOldPost.id +'\" class=\"poll-answer-style-1\"><span> ' + resultOldPost.answer7 + '</span></label><br></div>';
        
        oldPostHtml +=  '<div class=\"radio-second radio-second-old'+ resultOldPost.id +'\" style=\"display: none;\">';
        
        oldPostHtml +=  '<p class=\"poll-answer-style-1\"> ' + resultOldPost.answer7 + ' </p>';
        
        oldPostHtml +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll7-old'+ resultOldPost.id +'\" class=\"poll-progress\"></progress>'; 
        
        oldPostHtml +=  '<a class=\"poll-score poll-score7-old'+ resultOldPost.id +'\"> 30% | 34 votes</a>'; 
        
        oldPostHtml += '<img class=\"poll-img7-old'+ resultOldPost.id +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        oldPostHtml +=  '</div>';

        }       
                      
                      
                      
          
                      
                      
                      
                      
                             if (resultOldPost.answer8.trim().length > 0) {          
            
        oldPostHtml += '<p class=\"poll-answer-box-old'+ resultOldPost.id +'\">';       
        
        oldPostHtml += '<div class=\"radio-first  radio-first-old'+ resultOldPost.id +'\" style=\"display: none;\"><input class=\"radio-new-class-old'+ resultOldPost.id +'\"  type=\"radio\" id=\"poll-id-8-old'+ resultOldPost.id +'\" value=\"8\" name=\"radio_group_old' + resultOldPost.id + '\">';
        
        oldPostHtml += '<label for=\"poll-id-8-old'+ resultOldPost.id +'\" class=\"poll-answer-style-1\"><span> ' + resultOldPost.answer8 + '</span></label><br></div>';
        
        oldPostHtml +=  '<div class=\"radio-second radio-second-old'+ resultOldPost.id +'\" style=\"display: none;\">';
        
        oldPostHtml +=  '<p class=\"poll-answer-style-1\"> ' + resultOldPost.answer8 + ' </p>';
        
        oldPostHtml +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll8-old'+ resultOldPost.id +'\" class=\"poll-progress\"></progress>'; 
        
        oldPostHtml +=  '<a class=\"poll-score poll-score8-old'+ resultOldPost.id +'\"> 30% | 34 votes</a>'; 
        
        oldPostHtml += '<img class=\"poll-img8-old'+ resultOldPost.id +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        oldPostHtml +=  '</div>';

        }
                      
                      
                
                      
                      
                      
                             if (resultOldPost.answer9.trim().length > 0) {          
            
        oldPostHtml += '<p class=\"poll-answer-box-old'+ resultOldPost.id +'\">';       
        
        oldPostHtml += '<div class=\"radio-first  radio-first-old'+ resultOldPost.id +'\" style=\"display: none;\"><input class=\"radio-new-class-old'+ resultOldPost.id +'\"  type=\"radio\" id=\"poll-id-9-old'+ resultOldPost.id +'\" value=\"9\" name=\"radio_group_old' + resultOldPost.id + '\">';
        
        oldPostHtml += '<label for=\"poll-id-9-old'+ resultOldPost.id +'\" class=\"poll-answer-style-1\"><span> ' + resultOldPost.answer9 + '</span></label><br></div>';
        
        oldPostHtml +=  '<div class=\"radio-second radio-second-old'+ resultOldPost.id +'\" style=\"display: none;\">';
        
        oldPostHtml +=  '<p class=\"poll-answer-style-1\"> ' + resultOldPost.answer9 + ' </p>';
        
        oldPostHtml +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll9-old'+ resultOldPost.id +'\" class=\"poll-progress\"></progress>'; 
        
        oldPostHtml +=  '<a class=\"poll-score poll-score9-old'+ resultOldPost.id +'\"> 30% | 34 votes</a>'; 
        
        oldPostHtml += '<img class=\"poll-img9-old'+ resultOldPost.id +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        oldPostHtml +=  '</div>';

        }
                      
                      
           
                      
                if (resultOldPost.answer10.trim().length > 0) {          
            
        oldPostHtml += '<p class=\"poll-answer-box-old'+ resultOldPost.id +'\">';       
        
        oldPostHtml += '<div class=\"radio-first  radio-first-old'+ resultOldPost.id +'\" style=\"display: none;\"><input class=\"radio-new-class-old'+ resultOldPost.id +'\"  type=\"radio\" id=\"poll-id-10-old'+ resultOldPost.id +'\" value=\"10\" name=\"radio_group_old' + resultOldPost.id + '\">';
        
        oldPostHtml += '<label for=\"poll-id-10-old'+ resultOldPost.id +'\" class=\"poll-answer-style-1\"><span> ' + resultOldPost.answer10 + '</span></label><br></div>';
        
        oldPostHtml +=  '<div class=\"radio-second radio-second-old'+ resultOldPost.id +'\" style=\"display: none;\">';
        
        oldPostHtml +=  '<p class=\"poll-answer-style-1\"> ' + resultOldPost.answer10 + ' </p>';
        
        oldPostHtml +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll10-old'+ resultOldPost.id +'\" class=\"poll-progress\"></progress>'; 
        
        oldPostHtml +=  '<a class=\"poll-score poll-score10-old'+ resultOldPost.id +'\"> 30% | 34 votes</a>'; 
        
        oldPostHtml += '<img class=\"poll-img10-old'+ resultOldPost.id +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        oldPostHtml +=  '</div>';

        }
                      
                      
                      
                            
        
        oldPostHtml += '</form>';
        
        
                      
                      
                      
                      
                      
                      
                      
                      
        oldPostHtml += '<div class=\"row\">';                    
                            
          oldPostHtml += '<div class=\"col-xs-12\">';
              
                            
          oldPostHtml += '<a id=\"pollvote_old'+ resultOldPost.id +'\" onclick=\"pollvoteold('+ resultOldPost.id + ')\" style="display: none;">';    
        
          oldPostHtml += '<button class=\"btn poll-1\">';
        
          oldPostHtml += 'Vote</button></a>';
              
              
          oldPostHtml += '<a onclick=\"voteagainold('+ resultOldPost.id + ')\" id=\"pollchange_old'+ resultOldPost.id +'\" style=\"display: none;\">';    
        
          oldPostHtml += '<button class=\"btn poll-1\">';
        
          oldPostHtml += 'Change Vote</button></a>';
              
              
        
          oldPostHtml += '<a class=\"poll-totalold'+ resultOldPost.id +'\" style=\"display: none; margin-left: 30px;\">589 total votes</a>';
              
          oldPostHtml += '</div></div><br>';
              
              
                     
          oldPostHtml += '<div class=\"row\" >';
                     
                     
          oldPostHtml += '<div class=\"col-xs-2\" style=\" height: 25px;\">';
                     
                    
                     
          oldPostHtml += '<img onclick=\"start_delete_old(' + resultOldPost.id + ') \" class=\" size-0 \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/arrow.svg' + '\" />';
                     
                     
          oldPostHtml += '</div>';
                     
                     
          oldPostHtml += '<div class=\"col-xs-3\" style=\" height: 25px;\">';
                     
                    
           
           
          oldPostHtml += '<img class=\" size-2 '+ 'start_delete_old' + resultOldPost.id + '   like_delete_old'  +  resultOldPost.id  +  '    \" src=\"' + resultOldPost.like_src + '\" onclick=\"likeoldpoll(' +  resultOldPost.id + ') \" />';
           
           
                     
          oldPostHtml += '<img onclick=\"show_delete_old(' + resultOldPost.id + ') \" class=\" size-3 '+ 'start_delete_old' + resultOldPost.id +' \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/garbage.svg' + '\" />';
                     
          oldPostHtml += '</div>';
                     
                     
          oldPostHtml += '<div class=\"col-xs-5\" >';
                     
                     
          oldPostHtml += '<a class=\"delete-2 '+ 'show_delete_old' + resultOldPost.id +'\" onclick=\"deletenewpoll_old(' +  resultOldPost.id + ') \">delete</a><a style=\"display: none; font-size: 13px;\" class=\"'+ 'show_delete_old' + resultOldPost.id +'\" > //</a>';
                     
                     
          oldPostHtml += '<a onclick=\"hide_delete_old(' + resultOldPost.id + ') \" class=\"delete-3 '+ 'show_delete_old' + resultOldPost.id +'\">don\'t</a>';
                     
                     
          oldPostHtml += '</div>';
                     
                         
                     
          oldPostHtml += '<div class=\"col-xs-2\" style=\" height: 25px;\">';
                     
                    
                     
          oldPostHtml += '<img class=\" size-1 \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/checked.svg' + '\" />';
                     
                     
          oldPostHtml += '</div>';
                     
                     
                     
          oldPostHtml += '</div></div></div>';
                     
                        
                      
            window["votebuttonold" + resultOldPost.id] = true;
              
               // setTimeout(getOldPollVote, 10000, resultOldPost.id);     
                      
                  //    $(".radio-first-old" + resultOldPost.id).hide(0);
                      
                   //   $(".radio-second-old" + resultOldPost.id).hide(0);
                      
             getOldPollVote(resultOldPost.id);
                   
               }
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                    
                  if(resultOldPost.type == 'poll' && resultOldPost.owner != "<?php echo $user_info['id']; ?>") { 
                   
                   
                      
                      
        oldPostHtml += '<div id=\"'+ 'whole_old_post' + resultOldPost.id +'\" class=\"row poll-div-2\" style=\"margin-bottom: 20px;\">';
        
        
        oldPostHtml += '<div class=\"col-xs-10 poll-body\">';
        
        oldPostHtml += '<p class=\"poll-quest-box\"> ' +  resultOldPost.question +' </p>';

    
        oldPostHtml += '<div class=\"poll-load-old-'+ resultOldPost.id +'\"><img src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/wedges.gif\" width=\"90\" height=\"90\"  style=\"display: table; margin: 0 auto;\"  /></div>';              
                      
                      
        oldPostHtml += '<form action=\"#\">';
    
        
        
    
        oldPostHtml += '<p class=\"poll-answer-box-old'+ resultOldPost.id +'\">';       
        
        oldPostHtml += '<div class=\"radio-first  radio-first-old'+ resultOldPost.id +'\" style=\"display: none;\"><input class=\"radio-new-class-old'+ resultOldPost.id +'\"  type=\"radio\" id=\"poll-id-1-old'+ resultOldPost.id +'\" value=\"1\" name=\"radio_group_old' + resultOldPost.id + '\">';
        
        oldPostHtml += '<label for=\"poll-id-1-old'+ resultOldPost.id +'\" class=\"poll-answer-style-1\"><span> ' + resultOldPost.answer1 + '</span></label><br></div>';
        
        oldPostHtml +=  '<div class=\"radio-second radio-second-old'+ resultOldPost.id +'\" style=\"display: none;\">';
        
        oldPostHtml +=  '<p class=\"poll-answer-style-1\"> ' + resultOldPost.answer1 + ' </p>';
        
        oldPostHtml +=  '<progress value=\"100\" max=\"100\" id=\"progressPoll1-old'+ resultOldPost.id +'\" class=\"poll-progress\"></progress>'; 
        
        oldPostHtml +=  '<a class=\"poll-score poll-score1-old'+ resultOldPost.id +'\"> 30% | 34 votes</a>'; 
        
        oldPostHtml += '<img class=\"poll-img1-old'+ resultOldPost.id +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        oldPostHtml +=  '</div>';
                      
                      
                      
                      
                      
                      
                      
                      
                
        oldPostHtml += '<p class=\"poll-answer-box-old'+ resultOldPost.id +'\">';       
        
        oldPostHtml += '<div class=\"radio-first  radio-first-old'+ resultOldPost.id +'\" style=\"display: none;\"><input class=\"radio-new-class-old'+ resultOldPost.id +'\"  type=\"radio\" id=\"poll-id-2-old'+ resultOldPost.id +'\" value=\"2\" name=\"radio_group_old' + resultOldPost.id + '\">';
        
        oldPostHtml += '<label for=\"poll-id-2-old'+ resultOldPost.id +'\" class=\"poll-answer-style-1\"><span> ' + resultOldPost.answer2 + '</span></label><br></div>';
        
        oldPostHtml +=  '<div class=\"radio-second radio-second-old'+ resultOldPost.id +'\" style=\"display: none;\">';
        
        oldPostHtml +=  '<p class=\"poll-answer-style-1\"> ' + resultOldPost.answer2 + ' </p>';
        
        oldPostHtml +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll2-old'+ resultOldPost.id +'\" class=\"poll-progress\"></progress>'; 
        
        oldPostHtml +=  '<a class=\"poll-score poll-score2-old'+ resultOldPost.id +'\"> 30% | 34 votes</a>'; 
        
        oldPostHtml += '<img class=\"poll-img2-old'+ resultOldPost.id +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        oldPostHtml +=  '</div>';
                      
                      
                      
                      
                      
                      
                      
            if (resultOldPost.answer3.trim().length > 0) {          
            
        oldPostHtml += '<p class=\"poll-answer-box-old'+ resultOldPost.id +'\">';       
        
        oldPostHtml += '<div class=\"radio-first  radio-first-old'+ resultOldPost.id +'\" style=\"display: none;\"><input class=\"radio-new-class-old'+ resultOldPost.id +'\"  type=\"radio\" id=\"poll-id-3-old'+ resultOldPost.id +'\" value=\"3\" name=\"radio_group_old' + resultOldPost.id + '\">';
        
        oldPostHtml += '<label for=\"poll-id-3-old'+ resultOldPost.id +'\" class=\"poll-answer-style-1\"><span> ' + resultOldPost.answer3 + '</span></label><br></div>';
        
        oldPostHtml +=  '<div class=\"radio-second radio-second-old'+ resultOldPost.id +'\" style=\"display: none;\">';
        
        oldPostHtml +=  '<p class=\"poll-answer-style-1\"> ' + resultOldPost.answer3 + ' </p>';
        
        oldPostHtml +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll3-old'+ resultOldPost.id +'\" class=\"poll-progress\"></progress>'; 
        
        oldPostHtml +=  '<a class=\"poll-score poll-score3-old'+ resultOldPost.id +'\"> 30% | 34 votes</a>'; 
        
        oldPostHtml += '<img class=\"poll-img3-old'+ resultOldPost.id +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        oldPostHtml +=  '</div>';

        }
                      
                      
                      
                      
                      
                      
                      
                      
                      
            if (resultOldPost.answer4.trim().length > 0) {          
            
        oldPostHtml += '<p class=\"poll-answer-box-old'+ resultOldPost.id +'\">';       
        
        oldPostHtml += '<div class=\"radio-first  radio-first-old'+ resultOldPost.id +'\" style=\"display: none;\"><input class=\"radio-new-class-old'+ resultOldPost.id +'\"  type=\"radio\" id=\"poll-id-4-old'+ resultOldPost.id +'\" value=\"4\" name=\"radio_group_old' + resultOldPost.id + '\">';
        
        oldPostHtml += '<label for=\"poll-id-4-old'+ resultOldPost.id +'\" class=\"poll-answer-style-1\"><span> ' + resultOldPost.answer4 + '</span></label><br></div>';
        
        oldPostHtml +=  '<div class=\"radio-second radio-second-old'+ resultOldPost.id +'\" style=\"display: none;\">';
        
        oldPostHtml +=  '<p class=\"poll-answer-style-1\"> ' + resultOldPost.answer4 + ' </p>';
        
        oldPostHtml +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll4-old'+ resultOldPost.id +'\" class=\"poll-progress\"></progress>'; 
        
        oldPostHtml +=  '<a class=\"poll-score poll-score4-old'+ resultOldPost.id +'\"> 30% | 34 votes</a>'; 
        
        oldPostHtml += '<img class=\"poll-img4-old'+ resultOldPost.id +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        oldPostHtml +=  '</div>';

        }
                      
                      
                      
                      
                      
                      
        if (resultOldPost.answer5.trim().length > 0) {          
            
        oldPostHtml += '<p class=\"poll-answer-box-old'+ resultOldPost.id +'\">';       
        
        oldPostHtml += '<div class=\"radio-first  radio-first-old'+ resultOldPost.id +'\" style=\"display: none;\"><input class=\"radio-new-class-old'+ resultOldPost.id +'\"  type=\"radio\" id=\"poll-id-5-old'+ resultOldPost.id +'\" value=\"5\" name=\"radio_group_old' + resultOldPost.id + '\">';
        
        oldPostHtml += '<label for=\"poll-id-5-old'+ resultOldPost.id +'\" class=\"poll-answer-style-1\"><span> ' + resultOldPost.answer5 + '</span></label><br></div>';
        
        oldPostHtml +=  '<div class=\"radio-second radio-second-old'+ resultOldPost.id +'\" style=\"display: none;\">';
        
        oldPostHtml +=  '<p class=\"poll-answer-style-1\"> ' + resultOldPost.answer5 + ' </p>';
        
        oldPostHtml +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll5-old'+ resultOldPost.id +'\" class=\"poll-progress\"></progress>'; 
        
        oldPostHtml +=  '<a class=\"poll-score poll-score5-old'+ resultOldPost.id +'\"> 30% | 34 votes</a>'; 
        
        oldPostHtml += '<img class=\"poll-img5-old'+ resultOldPost.id +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        oldPostHtml +=  '</div>';

        }
                      
                      
                      
                      
           
                      
               if (resultOldPost.answer6.trim().length > 0) {          
            
        oldPostHtml += '<p class=\"poll-answer-box-old'+ resultOldPost.id +'\">';       
        
        oldPostHtml += '<div class=\"radio-first  radio-first-old'+ resultOldPost.id +'\" style=\"display: none;\"><input class=\"radio-new-class-old'+ resultOldPost.id +'\"  type=\"radio\" id=\"poll-id-6-old'+ resultOldPost.id +'\" value=\"6\" name=\"radio_group_old' + resultOldPost.id + '\">';
        
        oldPostHtml += '<label for=\"poll-id-6-old'+ resultOldPost.id +'\" class=\"poll-answer-style-1\"><span> ' + resultOldPost.answer6 + '</span></label><br></div>';
        
        oldPostHtml +=  '<div class=\"radio-second radio-second-old'+ resultOldPost.id +'\" style=\"display: none;\">';
        
        oldPostHtml +=  '<p class=\"poll-answer-style-1\"> ' + resultOldPost.answer6 + ' </p>';
        
        oldPostHtml +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll6-old'+ resultOldPost.id +'\" class=\"poll-progress\"></progress>'; 
        
        oldPostHtml +=  '<a class=\"poll-score poll-score6-old'+ resultOldPost.id +'\"> 30% | 34 votes</a>'; 
        
        oldPostHtml += '<img class=\"poll-img6-old'+ resultOldPost.id +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        oldPostHtml +=  '</div>';

        }
                      
                      
                      
                      
                      
                      
                      
                      if (resultOldPost.answer7.trim().length > 0) {          
            
        oldPostHtml += '<p class=\"poll-answer-box-old'+ resultOldPost.id +'\">';       
        
        oldPostHtml += '<div class=\"radio-first  radio-first-old'+ resultOldPost.id +'\" style=\"display: none;\"><input class=\"radio-new-class-old'+ resultOldPost.id +'\"  type=\"radio\" id=\"poll-id-7-old'+ resultOldPost.id +'\" value=\"7\" name=\"radio_group_old' + resultOldPost.id + '\">';
        
        oldPostHtml += '<label for=\"poll-id-7-old'+ resultOldPost.id +'\" class=\"poll-answer-style-1\"><span> ' + resultOldPost.answer7 + '</span></label><br></div>';
        
        oldPostHtml +=  '<div class=\"radio-second radio-second-old'+ resultOldPost.id +'\" style=\"display: none;\">';
        
        oldPostHtml +=  '<p class=\"poll-answer-style-1\"> ' + resultOldPost.answer7 + ' </p>';
        
        oldPostHtml +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll7-old'+ resultOldPost.id +'\" class=\"poll-progress\"></progress>'; 
        
        oldPostHtml +=  '<a class=\"poll-score poll-score7-old'+ resultOldPost.id +'\"> 30% | 34 votes</a>'; 
        
        oldPostHtml += '<img class=\"poll-img7-old'+ resultOldPost.id +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        oldPostHtml +=  '</div>';

        }       
                      
                      
                      
          
                      
                      
                      
                      
                             if (resultOldPost.answer8.trim().length > 0) {          
            
        oldPostHtml += '<p class=\"poll-answer-box-old'+ resultOldPost.id +'\">';       
        
        oldPostHtml += '<div class=\"radio-first  radio-first-old'+ resultOldPost.id +'\" style=\"display: none;\"><input class=\"radio-new-class-old'+ resultOldPost.id +'\"  type=\"radio\" id=\"poll-id-8-old'+ resultOldPost.id +'\" value=\"8\" name=\"radio_group_old' + resultOldPost.id + '\">';
        
        oldPostHtml += '<label for=\"poll-id-8-old'+ resultOldPost.id +'\" class=\"poll-answer-style-1\"><span> ' + resultOldPost.answer8 + '</span></label><br></div>';
        
        oldPostHtml +=  '<div class=\"radio-second radio-second-old'+ resultOldPost.id +'\" style=\"display: none;\">';
        
        oldPostHtml +=  '<p class=\"poll-answer-style-1\"> ' + resultOldPost.answer8 + ' </p>';
        
        oldPostHtml +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll8-old'+ resultOldPost.id +'\" class=\"poll-progress\"></progress>'; 
        
        oldPostHtml +=  '<a class=\"poll-score poll-score8-old'+ resultOldPost.id +'\"> 30% | 34 votes</a>'; 
        
        oldPostHtml += '<img class=\"poll-img8-old'+ resultOldPost.id +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        oldPostHtml +=  '</div>';

        }
                      
                      
                
                      
                      
                      
                             if (resultOldPost.answer9.trim().length > 0) {          
            
        oldPostHtml += '<p class=\"poll-answer-box-old'+ resultOldPost.id +'\">';       
        
        oldPostHtml += '<div class=\"radio-first  radio-first-old'+ resultOldPost.id +'\" style=\"display: none;\"><input class=\"radio-new-class-old'+ resultOldPost.id +'\"  type=\"radio\" id=\"poll-id-9-old'+ resultOldPost.id +'\" value=\"9\" name=\"radio_group_old' + resultOldPost.id + '\">';
        
        oldPostHtml += '<label for=\"poll-id-9-old'+ resultOldPost.id +'\" class=\"poll-answer-style-1\"><span> ' + resultOldPost.answer9 + '</span></label><br></div>';
        
        oldPostHtml +=  '<div class=\"radio-second radio-second-old'+ resultOldPost.id +'\" style=\"display: none;\">';
        
        oldPostHtml +=  '<p class=\"poll-answer-style-1\"> ' + resultOldPost.answer9 + ' </p>';
        
        oldPostHtml +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll9-old'+ resultOldPost.id +'\" class=\"poll-progress\"></progress>'; 
        
        oldPostHtml +=  '<a class=\"poll-score poll-score9-old'+ resultOldPost.id +'\"> 30% | 34 votes</a>'; 
        
        oldPostHtml += '<img class=\"poll-img9-old'+ resultOldPost.id +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        oldPostHtml +=  '</div>';

        }
                      
                      
           
                      
                if (resultOldPost.answer10.trim().length > 0) {          
            
        oldPostHtml += '<p class=\"poll-answer-box-old'+ resultOldPost.id +'\">';       
        
        oldPostHtml += '<div class=\"radio-first  radio-first-old'+ resultOldPost.id +'\" style=\"display: none;\"><input class=\"radio-new-class-old'+ resultOldPost.id +'\"  type=\"radio\" id=\"poll-id-10-old'+ resultOldPost.id +'\" value=\"10\" name=\"radio_group_old' + resultOldPost.id + '\">';
        
        oldPostHtml += '<label for=\"poll-id-10-old'+ resultOldPost.id +'\" class=\"poll-answer-style-1\"><span> ' + resultOldPost.answer10 + '</span></label><br></div>';
        
        oldPostHtml +=  '<div class=\"radio-second radio-second-old'+ resultOldPost.id +'\" style=\"display: none;\">';
        
        oldPostHtml +=  '<p class=\"poll-answer-style-1\"> ' + resultOldPost.answer10 + ' </p>';
        
        oldPostHtml +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll10-old'+ resultOldPost.id +'\" class=\"poll-progress\"></progress>'; 
        
        oldPostHtml +=  '<a class=\"poll-score poll-score10-old'+ resultOldPost.id +'\"> 30% | 34 votes</a>'; 
        
        oldPostHtml += '<img class=\"poll-img10-old'+ resultOldPost.id +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        oldPostHtml +=  '</div>';

        }
                      
                      
                      
                            
        
        oldPostHtml += '</form>';
        
        
                      
                      
                      
                      
                      
                      
                      
                      
        oldPostHtml += '<div class=\"row\">';                    
                            
          oldPostHtml += '<div class=\"col-xs-12\">';
              
                            
          oldPostHtml += '<a  onclick=\"pollvoteold('+ resultOldPost.id + ')\" id=\"pollvote_old'+ resultOldPost.id +'\" style=\"display: none;\">';    
        
          oldPostHtml += '<button  class=\"btn poll-1\">';
        
          oldPostHtml += 'Vote</button></a>';
              
              
          oldPostHtml += '<a onclick=\"voteagainold('+ resultOldPost.id + ')\" id=\"pollchange_old'+ resultOldPost.id +'\" style=\"display: none;\">';    
        
          oldPostHtml += '<button class=\"btn poll-1\">';
        
          oldPostHtml += 'Change Vote</button></a>';
              
              
        
          oldPostHtml += '<a class=\"poll-totalold'+ resultOldPost.id +'\" style=\"display: none; margin-left: 30px;\">589 total votes</a>';
              
          oldPostHtml += '</div></div><br>';
              
              
                     
          oldPostHtml += '<div class=\"row\" >';
                     
                     
          oldPostHtml += '<div class=\"col-xs-2\" style=\" height: 25px;\">';
                     
                    
                     
          oldPostHtml += '<img onclick=\"start_delete_old(' + resultOldPost.id + ') \" class=\" size-0 \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/arrow.svg' + '\" />';
                     
                     
          oldPostHtml += '</div>';
                     
                     
          oldPostHtml += '<div class=\"col-xs-3\" style=\" height: 25px;\">';
                     
                    
           
           
          oldPostHtml += '<img class=\" size-2 '+ 'start_delete_old' + resultOldPost.id + '   like_delete_old'  +  resultOldPost.id  +  '    \" src=\"' + resultOldPost.like_src + '\" onclick=\"likeoldpoll(' +  resultOldPost.id + ') \" />';
           
           
                     
        
          oldPostHtml += '</div>';
                     
                     
          oldPostHtml += '<div class=\"col-xs-5\" >';
                     
                     
         
                     
          oldPostHtml += '</div>';
                     
                         
                     
          oldPostHtml += '<div class=\"col-xs-2\" style=\" height: 25px;\">';
                     
                    
                     
      
                     
          oldPostHtml += '</div>';
                     
                     
                     
          oldPostHtml += '</div></div>';
                     
          oldPostHtml += '<div class=\"col-xs-2\"><img src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/nopic.png\" style=\"width: 40px; margin-left: 0px;\"  /></div></div>';
                      
            window["votebuttonold" + resultOldPost.id] = true;
              
               // setTimeout(getOldPollVote, 10000, resultOldPost.id);     
                      
                 //     $(".radio-first-old" + resultOldPost.id).hide(0);
                      
                 //     $(".radio-second-old" + resultOldPost.id).hide(0);
                      
             getOldPollVote(resultOldPost.id);
                   
               }
                   
                   
                   
                   
                   
                 
                 
                 
                 if(resultOldPost.type == 'attach' && resultOldPost.owner == "<?php echo $user_info['id']; ?>") {
                     
                oldPostHtml += '<div id=\"'+ 'old_post' + resultOldPost.id +'\" class=\"row\">';
                oldPostHtml += '<div class=\"col-xs-2\">';
                oldPostHtml += '<a><img src=\" '+ '<?php echo $_SESSION['url_placeholder'];  ?>' + resultOldPost.image  +' \" class=\"chat-left-1\"  /></a>';
                oldPostHtml += '</div>';
                oldPostHtml += '<div class=\"col-xs-10\">';
                oldPostHtml += '<div class=\"talk-bubble tri-right left-top\" class=\"chat-left-2\">';
                oldPostHtml += '<div class=\"talktext\">';
                oldPostHtml += '<p class=\"text-username\">' + resultOldPost.username + '</p>';
                oldPostHtml += '<p class=\"text-body\"><a href=\" ' + resultOldPost.path  + ' \" download>' + resultOldPost.name + '</a></p>';
                     
                     
                     
                        
                     oldPostHtml += '<div class=\"row\" >';
                     
                     
                     oldPostHtml += '<div class=\"col-xs-2\" style=\" height: 25px;\">';
                     
                    
                     
                     oldPostHtml += '<img onclick=\"start_delete(' + resultOldPost.id + ') \" class=\" size-0 \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/arrow.svg' + '\" />';
                     
                     
                     oldPostHtml += '</div>';
                     
                     
                     oldPostHtml += '<div class=\"col-xs-3\" style=\" height: 25px;\">';
                     
                    
                     
                     oldPostHtml += '<img class=\" size-2 '+ 'start_delete' + resultOldPost.id + '   like_delete'  +  resultOldPost.id  +  '    \" src=\"' +  resultOldPost.like_src + '\" onclick=\"likeoldpost(' + resultOldPost.id + ') \" />';
                     
                     oldPostHtml += '<img onclick=\"show_delete(' + resultOldPost.id + ') \" class=\" size-3 '+ 'start_delete' + resultOldPost.id +' \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/garbage.svg' + '\" />';
                     
                     oldPostHtml += '</div>';
                     
                     
                     oldPostHtml += '<div class=\"col-xs-5\" >';
                     
                     
                     oldPostHtml += '<a class=\"delete-2 '+ 'show_delete' + resultOldPost.id +'\" onclick=\"deleteoldpost(' + resultOldPost.id + ') \">delete</a><a style=\"display: none; font-size: 13px;\" class=\"'+ 'show_delete' + resultOldPost.id +'\" > //</a>';
                     
                     
                      oldPostHtml += '<a onclick=\"hide_delete(' + resultOldPost.id + ') \" class=\"delete-3 '+ 'show_delete' + resultOldPost.id +'\">don\'t</a>';
                     
                     
                     oldPostHtml += '</div>';
                     
                     
                     
                     
                     
                    oldPostHtml += '<div class=\"col-xs-2\" style=\" height: 25px;\">';
                     
                    
                     
                     oldPostHtml += '<img class=\" size-1 \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/checked.svg' + '\" />';
                     
                     
                     oldPostHtml += '</div>';
                     
                     
                     
                     oldPostHtml += '</div>';
                     
                
                     
                     
                     
                     
                oldPostHtml += ' </div></div></div></div>';    
                     
                 }  
                 
                 
                 
                    if(resultOldPost.type == 'attach' && resultOldPost.owner != "<?php echo $user_info['id']; ?>") {
         
                   oldPostHtml += '<div id=\"'+ 'old_post' + resultOldPost.id +'\" class=\"row\">';
                   oldPostHtml += '<div class=\"col-xs-10\">';
                   oldPostHtml += '<div class=\"talk-bubble1 tri-right1 left-top1\" class=\"chat-right-1\">';
                   oldPostHtml += '<div class=\"talktext1\">';
                   oldPostHtml += '<p class=\"text-username\">' + resultOldPost.username + '</p>';
                   oldPostHtml += '<p class=\"text-body\"><a href=\" ' + resultOldPost.path  + ' \" download>' + resultOldPost.name + '</a></p>';
                        
                        
                        
                        
                        
                                             oldPostHtml += '<div class=\"row\" >';
                     
                     
                     oldPostHtml += '<div class=\"col-xs-2\" style=\" height: 25px;\">';
                     
                    
                     
                     oldPostHtml += '<img onclick=\"start_delete(' + resultOldPost.id + ') \" class=\" size-0 \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/arrow.svg' + '\" />';
                     
                     
                     oldPostHtml += '</div>';
                     
                     
                     oldPostHtml += '<div class=\"col-xs-3\" style=\" height: 25px;\">';
                     
                    
                     
                     oldPostHtml += '<img class=\" size-2 '+ 'start_delete' + resultOldPost.id + '   like_delete'  +  resultOldPost.id  +  '    \" src=\"' +  resultOldPost.like_src + '\" onclick=\"likeoldpost(' + resultOldPost.id + ') \" />';
                     
                    
                     
                     oldPostHtml += '</div>';
                     
                     
                     oldPostHtml += '<div class=\"col-xs-5\" >';
                     
                     // Empty div.
                   
                     oldPostHtml += '</div>';
                     
                     
                     
                     
                     
                    oldPostHtml += '<div class=\"col-xs-2\" style=\" height: 25px;\">';
                     
                    
                    // Empty div.
                     
                     oldPostHtml += '</div>';
                     
                     
                     
                     oldPostHtml += '</div>';
                     
                     
                     
                    
                        
                        
                        
                   oldPostHtml += ' </div></div></div>';
                   oldPostHtml += '<div class=\"col-xs-2\">';
                   oldPostHtml += '<a><img src=\" ' +  '<?php echo $_SESSION['url_placeholder'];  ?>' + resultOldPost.image  +' \" class=\"chat-right-2\"  /></a>';
                   oldPostHtml += '</div>';
                   oldPostHtml += '</div>';
                    
                 }
                 
                 
                 
                 if (resultOldPost.type == "chat" && resultOldPost.owner == "<?php echo $user_info['id']; ?>") {
                     
                       
                oldPostHtml += '<div id=\"'+ 'old_post' + resultOldPost.id +'\" class=\"row\">';
                oldPostHtml += '<div class=\"col-xs-2\">';
                oldPostHtml += '<a><img src=\" '+ '<?php echo $_SESSION['url_placeholder'];  ?>' + resultOldPost.image +'  \" class=\"chat-left-1\"  /></a>';
                oldPostHtml += '</div>';
                oldPostHtml += '<div class=\"col-xs-10\">';
                oldPostHtml += '<div class=\"talk-bubble tri-right left-top\" class=\"chat-left-2\">';
                oldPostHtml += '<div class=\"talktext\">';
             //   oldPostHtml += '<p class=\"text-username\">' + resultOldPost.username + '</p>';
                oldPostHtml += '<p class=\"text-body\">'  + resultOldPost.message + '</p>';
                     
                

                     
                     
                     oldPostHtml += '<div class=\"row\" >';
                     
                     
                     oldPostHtml += '<div class=\"col-xs-2\" style=\" height: 25px;\">';
                     
                    
                     
                     oldPostHtml += '<img onclick=\"start_delete(' + resultOldPost.id + ') \" class=\" size-0 \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/arrow.svg' + '\" />';
                     
                     
                     oldPostHtml += '</div>';
                     
                     
                     oldPostHtml += '<div class=\"col-xs-3\" style=\" height: 25px;\">';
                     
                    
                     
                     oldPostHtml += '<img class=\" size-2 '+ 'start_delete' + resultOldPost.id + '   like_delete'  +  resultOldPost.id  +  '    \" src=\"' +  resultOldPost.like_src + '\" onclick=\"likeoldpost(' + resultOldPost.id + ') \" />';
                     
                     oldPostHtml += '<img onclick=\"show_delete(' + resultOldPost.id + ') \" class=\" size-3 '+ 'start_delete' + resultOldPost.id +' \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/garbage.svg' + '\" />';
                     
                     oldPostHtml += '</div>';
                     
                     
                     oldPostHtml += '<div class=\"col-xs-5\" >';
                     
                     
                     oldPostHtml += '<a class=\"delete-2 '+ 'show_delete' + resultOldPost.id +'\" onclick=\"deleteoldpost(' + resultOldPost.id + ') \">delete</a><a style=\"display: none; font-size: 13px;\" class=\"'+ 'show_delete' + resultOldPost.id +'\" > //</a>';
                     
                     
                      oldPostHtml += '<a onclick=\"hide_delete(' + resultOldPost.id + ') \" class=\"delete-3 '+ 'show_delete' + resultOldPost.id +'\">don\'t</a>';
                     
                     
                     oldPostHtml += '</div>';
                     
                     
                     
                     
                     
                    oldPostHtml += '<div class=\"col-xs-2\" style=\" height: 25px;\">';
                     
                    
                     
                     oldPostHtml += '<img class=\" size-1 \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/checked.svg' + '\" />';
                     
                     
                     oldPostHtml += '</div>';
                     
                     
                     
                     oldPostHtml += '</div>';
                     
                     
                     
                     
                    oldPostHtml += '</div></div></div></div>'; 
                     
                 }
                 
                 
                 
                if (resultOldPost.type == "chat" && resultOldPost.owner != "<?php echo $user_info['id']; ?>") {
                    
                    
                   oldPostHtml += '<div id=\"'+ 'old_post' + resultOldPost.id +'\" class=\"row\">';
                   oldPostHtml += '<div class=\"col-xs-10\">';
                   oldPostHtml += '<div class=\"talk-bubble1 tri-right1 left-top1\" class=\"chat-right-1\">';
                   oldPostHtml += '<div class=\"talktext1\">';
                   oldPostHtml += '<p class=\"text-username\">' + resultOldPost.username + '</p>';
                   oldPostHtml += '<p class=\"text-body\">' + resultOldPost.message + '</p>';
                    
                    
                       
                     oldPostHtml += '<div class=\"row\" >';
                     
                     
                     oldPostHtml += '<div class=\"col-xs-2\" style=\" height: 25px;\">';
                     
                    
                     
                     oldPostHtml += '<img onclick=\"start_delete(' + resultOldPost.id + ') \" class=\" size-0 \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/arrow.svg' + '\" />';
                     
                     
                     oldPostHtml += '</div>';
                     
                     
                     oldPostHtml += '<div class=\"col-xs-3\" style=\" height: 25px;\"> ';
                    
                    
                   
                     
                    
                     oldPostHtml += '<img class=\" size-2 '+ 'start_delete' + resultOldPost.id + '   like_delete'  +  resultOldPost.id  +  '    \" src=\"' +  resultOldPost.like_src + '\" onclick=\"likeoldpost(' + resultOldPost.id + ') \" />';
                     
                    
                    
                     
                     oldPostHtml += '</div>';
                     
                     
                     oldPostHtml += '<div class=\"col-xs-5\" >';
                     
                     // Empty div.
                   
                     oldPostHtml += '</div>';
                     
                     
                     
                     
                     
                    oldPostHtml += '<div class=\"col-xs-2\" style=\" height: 25px;\">';
                     
                    
                    // Empty div.
                     
                     oldPostHtml += '</div>';
                     
                     
                     
                     oldPostHtml += '</div>';
                     
                     
                     
                    
                    
                    
                    
                   oldPostHtml += ' </div></div></div>';
                   oldPostHtml += '<div class=\"col-xs-2\">';
                   oldPostHtml += '<a><img src=\" ' +  '<?php echo $_SESSION['url_placeholder'];  ?>' + resultOldPost.image  +' \" class=\"chat-right-2\"  /></a>';
                   oldPostHtml += '</div>';
                   oldPostHtml += '</div>';
                    
                     
                       
               
                     
                 }
                 
             }
                
             $( '#postsdiv' ).append( oldPostHtml );                            
                                                              
        } 
             
             
          },
        
            error: function( xhr, textStatus, errorThrown ) {
               
                $('#loading').hide();
                
                $('#loadagain').show();
                
             },
                    
            complete: function( ) {
                
                
                  
                if (!completedPosts) {
                    
                $(window).bind("scroll", (function () {
                
                  if ( ( window.innerHeight + window.scrollY ) >= document.body.offsetHeight ) {
                      
                      displayFromDatabasePagination();
                      
                      $(window).unbind("scroll");
                      
                  }
                
            } ));   }          
                
          }
        
        
       } ); 
       
    if (!completedPosts) {
        
      $('#loading').show();
    
    } 
    
    
    if (completedPosts) { 
    
    $('#loading').hide();
        
    }
}
    
    
    
    
    
    
    
    
    
    function sendPostData(textMessage, e, sent_post_id, text, post_id_num ) {
        
       var is_sent_already = function( post_ui, post_id_0 ) {
           
           
           
                     append_post_sent_1 = "";
                     
                     append_post_sent_1 += '<div class=\"row\" >';
                     
                     
                     append_post_sent_1 += '<div class=\"col-xs-2\" style=\" height: 25px;\">';
                     
                    
                     
                     append_post_sent_1 += '<img onclick=\"start_delete(' + post_id_0 + ') \" class=\" size-0 \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/arrow.svg' + '\" />';
                     
                     
                     append_post_sent_1 += '</div>';
                     
                     
                     append_post_sent_1 += '<div class=\"col-xs-3\" style=\" height: 25px;\">';
                     
                    
           
           
                     append_post_sent_1 += '<img class=\" size-2 '+ 'start_delete' + post_id_0 + '   like_delete'  +  post_id_0  +  '    \" src=\"' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/unlike.svg' + '\" onclick=\"likeoldpost(' + post_id_0 + ') \" />';
           
           
                     
                     append_post_sent_1 += '<img onclick=\"show_delete(' + post_id_0 + ') \" class=\" size-3 '+ 'start_delete' + post_id_0 +' \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/garbage.svg' + '\" />';
                     
                     append_post_sent_1 += '</div>';
                     
                     
                     append_post_sent_1 += '<div class=\"col-xs-5\" >';
                     
                     
                     append_post_sent_1 += '<a class=\"delete-2 '+ 'show_delete' + post_id_0 +'\" onclick=\"deletenewpost(' +  post_id_num + ',' + post_id_0 + ') \">delete</a><a style=\"display: none; font-size: 13px;\" class=\"'+ 'show_delete' + post_id_0 +'\" > //</a>';
                     
                     
                      append_post_sent_1 += '<a onclick=\"hide_delete(' + post_id_0 + ') \" class=\"delete-3 '+ 'show_delete' + post_id_0 +'\">don\'t</a>';
                     
                     
                     append_post_sent_1 += '</div>';
                     
                     
                     
                     
                     
                    append_post_sent_1 += '<div class=\"col-xs-2\" style=\" height: 25px;\">';
                     
                    
                     
                     append_post_sent_1 += '<img class=\" size-1 \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/checked.svg' + '\" />';
                     
                     
                     append_post_sent_1 += '</div>';
                     
                     
                     
                     append_post_sent_1 += '</div>';
                     
                     
                     
           
      
           
           var new_items_chat_append_1 = $( append_post_sent_1 ).hide();
           
           $( "#" + post_ui ).prepend( new_items_chat_append_1 );
           
           new_items_chat_append_1.show(500);
           
       };
        
        

          
          // true shit
           
          e.preventDefault();
          
           
          post_url_2 = "<?php  echo $_SESSION['url_placeholder'];  ?>" + "send_chat";   
           
           
          current = new Date();
        
          currentMilli = current.getTime();
        
          
          
           
          currentArray.push(currentMilli);
               
           
          $.ajax( {
             url: post_url_2,
             type: "POST",
             async: true,
             timeout: 15000,
             data: {
                "done": 1,
                "message": textMessage,
                 "group_id": page_group_id,
                 "time": currentMilli
             },
             success: function( data ) {
                 
                 
             var jsonNewPost = JSON.parse( data );
            
             var statusNewPost =  jsonNewPost[0];
            
             var post_id_new_from_json =  jsonNewPost[1];
                 
                if ( statusNewPost == 1 ) {
                    
                   is_sent_already( sent_post_id, post_id_new_from_json );
                    
                } else {}
                
              //  $( "#text" ).val( "" );
                
                e.preventDefault();
             },
             error: function( xhr, textStatus, errorThrown ) {
                $.ajax( this );
                return;
             }
          } );
      
    }
    
    
    
   function myFunction(group) {
       
       post_url = "<?php  echo $_SESSION['url_placeholder'];  ?>" + "decline_request";
       
       $.ajax( {
             url: post_url,
             type: "POST",
             async: true,
             data: {
                "deleterequest": 1,
                "group_id": group
             },
             success: function( data ) {
                 
                if ( data == 1 ) {
                  //  alert(data);
                   $("#group" + group).hide();
                } 
             },
           
             error: function( xhr, textStatus, errorThrown ) {
             
                 
                 
             }
          } );
       
       
   } 
    
    
  
    
       function likeoldpost(post_ui_id) {
           
           
          if ( $('.like_delete' + post_ui_id).attr('src') == '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/unlike.svg' ) {
              
                   
              
                   $('.like_delete' + post_ui_id).attr('src', '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/like.svg');
              
               
           } else if ($('.like_delete' + post_ui_id).attr('src') == '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/like.svg') {
              
              
                   $('.like_delete' + post_ui_id).attr('src', '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/unlike.svg');
               
               
           }
           
           
           
       like_old_url = "<?php  echo $_SESSION['url_placeholder'];  ?>" + "like_old";
       
       $.ajax( {
             url: like_old_url,
             type: "POST",
             async: true,
             data: {
                "likepost": 1,
                "post_id": post_ui_id,
                 "group_id": page_group_id
             },
             success: function( data ) {
          
             },
           
             error: function( xhr, textStatus, errorThrown ) {
             
                 
                 
             }
          } ); 
           
           
           
     } 
    
    
    
    
    
    
    
    
    
    
    function likenewpoll(back_id, front_id) {
           
           
            if ( $('.like_delete' + front_id).attr('src') == '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/unlike.svg' ) {
              
                   
              
                   $('.like_delete' + front_id).attr('src', '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/like.svg');
              
               
           } else if ($('.like_delete' + front_id).attr('src') == '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/like.svg') {
              
              
                   $('.like_delete' + front_id).attr('src', '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/unlike.svg');
               
               
           }
           
           
           
       like_old_url = "<?php  echo $_SESSION['url_placeholder'];  ?>" + "like_old";
       
       $.ajax( {
             url: like_old_url,
             type: "POST",
             async: true,
             data: {
                "likepost": 1,
                "post_id": back_id,
                 "group_id": page_group_id
             },
             success: function( data ) {
          
             },
           
             error: function( xhr, textStatus, errorThrown ) {
             
                 
                 
             }
          } ); 
           
           
           
     } 
    
    
    
    
    
    
    
    
    
        
    function likeoldpoll(back_id) {
           
           
            if ( $('.like_delete_old' + back_id).attr('src') == '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/unlike.svg' ) {
              
                   
              
                   $('.like_delete_old' + back_id).attr('src', '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/like.svg');
              
               
           } else if ($('.like_delete_old' + back_id).attr('src') == '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/like.svg') {
              
              
                   $('.like_delete_old' + back_id).attr('src', '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/unlike.svg');
               
               
           }
           
           
           
       like_old_url = "<?php  echo $_SESSION['url_placeholder'];  ?>" + "like_old";
       
       $.ajax( {
             url: like_old_url,
             type: "POST",
             async: true,
             data: {
                "likepost": 1,
                "post_id": back_id,
                 "group_id": page_group_id
             },
             success: function( data ) {
          
             },
           
             error: function( xhr, textStatus, errorThrown ) {
             
                 
                 
             }
          } ); 
           
           
           
     } 
    
    
    
    
    
    
    
    
    
    
    
    
        
   function deleteoldpost(post_ui_id) {
       
       
    
       $("#old_post" + post_ui_id).hide(200);
       
       $("#search_post" + post_ui_id).hide(200);
       
       $("#whole_new_post" + post_ui_id).hide(200);
       
       delete_post_url = "<?php  echo $_SESSION['url_placeholder'];  ?>" + "delete_post";
       
       $.ajax( {
             url: delete_post_url,
             type: "POST",
             async: true,
             data: {
                "deletepost": 1,
                "post_id": post_ui_id
             },
             success: function( data ) {
          
             },
           
             error: function( xhr, textStatus, errorThrown ) {
             
                 
                 
             }
          } ); 
       
       
   } 
    
    
    
    
    
    
    
    function deletenewpost(post_ui, post_ui_id) {
    
       $("#whole_new_post" + post_ui).hide(200);
     
       delete_post_url_new = "<?php  echo $_SESSION['url_placeholder'];  ?>" + "delete_post";
       
       $.ajax( {
             url: delete_post_url_new,
             type: "POST",
             async: true,
             data: {
                "deletepost": 1,
                "post_id": post_ui_id
             },
             success: function( data ) {
                 
             },
           
             error: function( xhr, textStatus, errorThrown ) {
             
                 
                 
             }
          } );  
       
       
   }
    
    
    
  
    
    
    
    
    
    
    
       function deletenewpoll(back_id, front_id) {
    
       $("#whole_new_post" + front_id).hide(200);
     
       delete_post_url_new = "<?php  echo $_SESSION['url_placeholder'];  ?>" + "delete_post";
       
       $.ajax( {
             url: delete_post_url_new,
             type: "POST",
             async: true,
             data: {
                "deletepost": 1,
                "post_id": back_id
             },
             success: function( data ) {
                 
                 
                 
             },
           
             error: function( xhr, textStatus, errorThrown ) {
             
                 
                 
             }
          } );  
       
       
   }
    
    
    
    
    
    
    
    
        function deletenewpoll_old(back_id) {
    
       $("#whole_old_post" + back_id).hide(200);
     
       delete_post_url_new = "<?php  echo $_SESSION['url_placeholder'];  ?>" + "delete_post";
       
       $.ajax( {
             url: delete_post_url_new,
             type: "POST",
             async: true,
             data: {
                "deletepost": 1,
                "post_id": back_id
             },
             success: function( data ) {
                 
                 
                 
             },
           
             error: function( xhr, textStatus, errorThrown ) {
             
                 
                 
             }
          } );  
       
       
   }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
 function start_delete(post_ui) {

     $(".start_delete" + post_ui).toggle(200);
       
       
}  
    
     function start_delete_old(back_id) {

     $(".start_delete_old" + back_id).toggle(200);
       
       
} 
    
    
 function show_delete(post_ui) {

     $(".show_delete" + post_ui).show(200);
       
       
}
    
    
    
     function show_delete_old(back_id) {

     $(".show_delete_old" + back_id).show(200);
       
       
}
    
    
    
  
function hide_delete(post_ui) {

     $(".show_delete" + post_ui).hide(200);
       
       
}
    
   
    
    
    function hide_delete_old(back_id) {

     $(".show_delete_old" + back_id).hide(200);
       
       
}
    
    
    function sendPostDataAttach( post_id, path, name, type, posttype,  post_id_0) {
        
        var is_sent = function( post_id_new ) {
            
          
                     append_post_sent_2 = "";
                     
                     append_post_sent_2 += '<div class=\"row\" >';
                     
                     
                     append_post_sent_2 += '<div class=\"col-xs-2\" style=\" height: 25px;\">';
                     
                    
                     
                     append_post_sent_2 += '<img onclick=\"start_delete(' + post_id_new + ') \" class=\" size-0 \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/arrow.svg' + '\" />';
                     
                     
                     append_post_sent_2 += '</div>';
                     
                     
                     append_post_sent_2 += '<div class=\"col-xs-3\" style=\" height: 25px;\">';
            
            
            
                     append_post_sent_2 += '<img class=\" size-2 '+ 'start_delete' + post_id_new + '   like_delete'  +  post_id_new  +  '    \" src=\"' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/unlike.svg' + '\" onclick=\"likeoldpost(' + post_id_new + ') \" />';
                     
                     append_post_sent_2 += '<img onclick=\"show_delete(' + post_id_new + ') \" class=\" size-3 '+ 'start_delete' + post_id_new +' \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/garbage.svg' + '\" />';
                     
                     append_post_sent_2 += '</div>';
                     
                     
                     append_post_sent_2 += '<div class=\"col-xs-5\" >';
                     
                     
                     append_post_sent_2 += '<a class=\"delete-2 '+ 'show_delete' + post_id_new +'\" onclick=\"deletenewpost(' +  post_id_0 + ',' + post_id_new + ') \">delete</a><a style=\"display: none; font-size: 13px;\" class=\"'+ 'show_delete' + post_id_new +'\" > //</a>';
                     
                     
                      append_post_sent_2 += '<a onclick=\"hide_delete(' + post_id_new + ') \" class=\"delete-3 '+ 'show_delete' + post_id_new +'\">don\'t</a>';
                     
                     
                     append_post_sent_2 += '</div>';
                     
                     
                     
                     
                     
                    append_post_sent_2 += '<div class=\"col-xs-2\" style=\" height: 25px;\">';
                     
                    
                     
                     append_post_sent_2 += '<img class=\" size-1 \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/checked.svg' + '\" />';
                     
                     
                     append_post_sent_2 += '</div>';
                     
                     
                     
                     append_post_sent_2 += '</div>';
                     
                     
                     
           
      
           
           var new_items_chat_append_2 = $( append_post_sent_2 ).hide();
           
           $( "#" + post_id ).prepend( new_items_chat_append_2 );
           
           new_items_chat_append_2.show(500);
            
            

            
        };
        

            
            
          insert_attach_url = "<?php  echo $_SESSION['url_placeholder'];  ?>" + "insert_attach";
        
        
          current_attach = new Date();
        
          currentMilli_attach = current_attach.getTime();
        
          
          
           
          currentArray.push(currentMilli_attach);
            
  
          $.ajax( {
             url: insert_attach_url,
             type: "POST",
             async: true,
             data: {
                "insert_attach": 1,
                "path": path,
                 "name": name,
                 "type": type,
                 "posttype": posttype,
                 "group": page_group_id,
                 "time": currentMilli_attach
             },
             success: function( data ) {
                 
                 
             var jsonNewPostAttach = JSON.parse( data );
            
             var statusNewPostAttach =  jsonNewPostAttach[0];
            
             var post_id_new_from_json_2 =  jsonNewPostAttach[1];
                 
                if ( statusNewPostAttach == 1 ) {
                    
                   is_sent( post_id_new_from_json_2 );
                    
                } else {}
                 
                 
                 
             },
             error: function( xhr, textStatus, errorThrown ) {
                $.ajax( this );
                return;
             }
          } );
      
    }
    
    
    
    
    
    
    
    
    
        function metaLink( data33, new_post_id ) {
        
 var dooos1 = function( lam, data56, url, title, desc, img ) {
     
     var html45 = "";
     
    html45 +=   "<a href=\"  " + url + " \"><div class=\"row\" style=\"border: 2px solid #ddd; border-radius: 5px; padding: 10px; margin: 5px;\"><div>" 
                
                
                        
html45  += "<img src=\"  " + img +"  \" style=\"width: 100%;\" ></div><div><br>";
                        
                
                        
                        
                        
          html45 +=  " <p style=\" font-family: Josefin Slab; font-size: 15px; font-weight: bold;\">   " + title  +  "</p>";  
                        
                       html45 +=    "<p style=\" font-family: Josefin Slab; font-size: 15px; font-weight: bold;\">  " + desc + " </p>        </div> </div></a>  ";
     
     
     
     
     
     
          $( "#" + new_post_id ).html(html45);
       };
            
  
          $.ajax( {
             url: "<?php echo $_SESSION['url_placeholder']; ?>link_prepare",
             type: "POST",
             async: true,
             dataType:"text",
             data: {
                "preview": 1,
                 "name": name,
                 relay: data33
             },
             success: function( datasss ) {
                 
                 if (datasss) {
                     
                     
                    var jsonData16 = JSON.parse( datasss );
                     
                     
            
                    //  var attach_path12 =  jsonData16[0];
                   var metaurl = jsonData16.article["url"];
                    var metatitle = jsonData16.article["title"];
                     var metaimage = jsonData16.article['image']['src'];
                     var metadesc = jsonData16.article['description'];
                     
                   //  alert(metaimage);
                     dooos1(new_post_id, datasss, metaurl, metatitle, metadesc, metaimage);
                     
                 }
                 
                 
             },
             error: function( xhr, textStatus, errorThrown ) {
                $.ajax( this );
                return;
             }
          } );
      
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
      function previewLink( text, new_post_id ) {
        
            
  
          $.ajax( {
             url: "<?php echo $_SESSION['url_placeholder']; ?>link_preview",
             type: "POST",
             async: true,
             data: {
                "preview": 1,
                 "text": text
             },
             success: function( data ) {
                 
                 if (data) {
                     
                    metaLink(data, new_post_id);
                     
                 }
                 
                 
             },
             error: function( xhr, textStatus, errorThrown ) {
                $.ajax( this );
                return;
             }
          } );
      
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    function sendAppend( e, attach ) {
        
        
        if ( $("#text").val().length > 200 ) {
            
            return;
            
        }
        
        
        
        if (attach) {
            
           
            var jsonChatAppend = JSON.parse( attach );
            
            var attach_chat_path =  jsonChatAppend[0];
            
            var attach_chat_name =  jsonChatAppend[1];
            
            var attach_chat_type = jsonChatAppend[2];
            
            var post_type_chat =  jsonChatAppend[3];
          
            
            
            var new_chat_html = '';
            new_chat_html += '<div id=\"'+ 'whole_' + new_post_id +'\" class=\"row\">';
            new_chat_html += '<div class=\"col-xs-2\">';
            new_chat_html += '<a><img src=\" '+  '<?php echo $_SESSION['url_placeholder'] . $user_info['img_path'];  ?>' +' \" class=\"chat-left-1\"  /></a>';
            new_chat_html += '</div>';
            new_chat_html += '<div class=\"col-xs-10\">';
            new_chat_html += '<div class=\"talk-bubble tri-right left-top\" class=\"chat-left-2\">';
            new_chat_html += '<div class=\"talktext\">';
            new_chat_html += '<p class=\"text-username\"> ' + '<?php echo $user_info['username']; ?>' + '</p>';
            new_chat_html += '<p class=\"text-body\"><a href=\" ' + attach_chat_path  + ' \" download>' + attach_chat_name + '</a></p><span id=\"' + new_post_id + '\" ></span>';
            new_chat_html += ' </div></div></div></div>';
            
            var new_items_chat = $( new_chat_html ).hide();
            $( '#postsdiv' ).prepend( new_items_chat );
            new_items_chat.show( 'fast' );
            sendPostDataAttach( new_post_id, attach_chat_path, attach_chat_name, attach_chat_type, post_type_chat, new_post_id_num );
            
            new_post_id_num = new_post_id_num + 1;
            new_post_id = "new_post" + new_post_id_num;
            
        } else {
            
            
          var text = $( "#text" ).val();
          var textTrim = $( "#text" ).val().trim();
            
      if ( textTrim != "" ) {
          
          var new_chat_html = '';
          new_chat_html += '<div id=\"'+ 'whole_' + new_post_id +'\" class=\"row\">';
          new_chat_html += '<div class=\"col-xs-2\">';
          new_chat_html += '<a><img src=\" '+  '<?php echo $_SESSION['url_placeholder'] . $user_info['img_path'];  ?>' +' \" class=\"chat-left-1\"  /></a>';
          new_chat_html += '</div>';
          new_chat_html += '<div class=\"col-xs-10\">';
          new_chat_html += '<div class=\"talk-bubble tri-right left-top\" class=\"chat-left-2\">';
          new_chat_html += '<div class=\"talktext\">';
        //  new_chat_html += '<p class=\"text-username\">' + '<?php echo $user_info['username'];  ?>' + '</p>';        
          new_chat_html += '<p class=\"text-body\">' + text + '</p><span id=\"' + new_post_id + '\" ></span>';
          new_chat_html += ' </div></div></div></div>';
                
                
                
          var new_items_chat = $( new_chat_html ).hide();
          $( '#postsdiv' ).prepend( new_items_chat );
          new_items_chat.show( 100 );
                
          previewLink(name, new_post_id);
         
          
          sendPostData(text, e, new_post_id, text,  new_post_id_num);
                
             $( "#text" ).val( "" ); 
          
          new_post_id_num = new_post_id_num + 1;
          new_post_id = "new_post" + new_post_id_num;
       
       } else {
           
           $( "#text" ).val( "" );
           e.preventDefault();
       }
    }
        
     
}
    
</script>   