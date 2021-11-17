<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!-- Bootstrap Date-Picker Plugin -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
        <script src="https://kit.fontawesome.com/03928923d1.js" crossorigin="anonymous"></script>
        <script src="main.js"></script>
        <title>Musu Chatbot</title>
        <link rel="stylesheet" href="css/bot.css">
    </head>
    <body onload="template()" style="background-image: url('setBackground.jpg'); background-size: cover; ">
        
        <!-- Update tasks -->
        <div id="updateModal" class="modal fade text-center">
            <div class="modal-dialog">
                <div class="modal-content">
                </div>
            </div>
        </div>
        <!-- View messages -->
        <div id="messagesModal" class="modal fade text-center">
            <div class="modal-dialog">
                <div class="modal-content">
                </div>
            </div>
        </div>
        <!--  View tasks  -->
        <div id="theModal" class="modal fade text-center">
            <div class="modal-dialog">
                <div class="modal-content">
                </div>
            </div>
        </div>
        <!--    Add task modal -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add Task</h4>
                    </div>
                    <div class="modal-body"><!-- task input -->
                    <form method="post" action="insert.php">
                        <div class="form-group">
                            <label>Task Name</label>
                            <input type="text" required name="task" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Date</label>
                            <input type="text" required name="task_date" name="task_date" placeholder="YYY/MM/DD" type="text" class="form-control">
                        </div>
                        <input type="submit" name="send" value="Add Task" class="btn btn-primary">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div id="container1" >
        
        <div id="dot2">
            <h1 class="text-center my-5 heading">Pomodoro Web App</h1>
            <!-- <a href="updateModal.php" data-toggle="modal" data-target="#updateModal" class="btn btn-danger btn-lg">under Construction</a> -->
            <!-- <form class="form-inline" method="post" action="generate_pdf.php">
                <button type="submit" id="pdf" name="generate_pdf" class="btn btn-primary"><i class="fa fa-pdf"" aria-hidden="true"></i>
                Generate PDF</button>
            </form>
             -->
            <div >
                <?php
                echo "Hello " . $_SESSION["email"] . ".<br>";
                ?>
                <p> <a class="btn btn-danger" href="index.php?logout='1'" style="color: white; margin-left: 20px;">logout</a> </p>
            </div>
            
            
            <div class="container timer">
                <div class="row">
                    <div class="col-sm-5 col-xs-5">
                        <h4 id="minutes"></h4>
                    </div>
                    <div class="col-sm-2 col-xs-2">
                        <h4>:</h4>
                    </div>
                    <div class="col-sm-5 col-xs-5">
                        <h4 id="seconds"></h4>
                    </div>
                </div>
            </div>
            <div class="container clickButton">
                <a  class="btn" onclick="start()"><i class="fas fa-play fa-2x"></i></a>
                <a href="mainbot.php"><i class="fas fa-redo-alt fa-2x"></i></a>
            </div>
            <div>
                <h3 id="done" class="text-center my-5"></h3>
            </div>
        </div>
        
        
        <div id="screen">
            <div id="header">Musu</div>
            <div id="messageDisplaySection">
            </div>
            <div id="userInput">
                <input type="text" name="messages" id="messages" autocomplete="OFF" placeholder="Type Your Message Here." required>
                <input type="submit" value="Send" id="send" name="send">
            </div>
        </div>
    </div>
    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    
    <!-- Jquery Start -->
    <script>
    $(document).ready(function(){
    $("#messages").on("keyup",function(){
    if($("#messages").val()){
    $("#send").css("display","block");
    }else{
    $("#send").css("display","none");
    }
    });
    });
    // when send button clicked
    $("#send").on("click",function(e){
    $userMessage = $("#messages").val();
    $appendUserMessage = '<div class="chat usersMessages">'+ $userMessage +'</div>';
    $("#messageDisplaySection").append($appendUserMessage);
    // ajax start
    $.ajax({
    url: "bot.php",
    type: "POST",
    // sending data
    data: {messageValue: $userMessage},
    // response text
    success: function(data){
    // show response
    $appendBotResponse = '<div id="messagesContainer"><div class="chat botMessages">'+data+'</div></div>';
    $("#messageDisplaySection").append($appendBotResponse);
    }
    });
    $("#messages").val("");
    $("#send").css("display","none");
    });
    </script>
    <script>
    $(document).ready(function(){
    var date_input=$('input[name="task_date"]'); //our date input has the name "date"
    var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
    var options={
    format: 'yyyy/mm/dd',
    container: container,
    todayHighlight: true,
    autoclose: true,
    };
    date_input.datepicker(options);
    })
    </script>
</body>
</html>