<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="icon" href="favicon.ico" type="image/x-icon"/>
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
        <title>Offline Registration</title>

        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/quiz.css" rel="stylesheet">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <?php
            require_once 'php/init.php';
            getNavBar("OfflineRegister");
        ?>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <?php
                    if (isset($_GET["registered"])) {
                        echo '<div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <strong>Message:</strong> Thank you for entering your details
                            </div>';
                    }else if(isset($_GET["failed"])){
                        echo '<div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <strong>Message:</strong> Sorry, your details were not recorded
                            </div>';
                    } 
                    ?>
                    <h1>Registration Form</h1>
                        <div id="Form">
                            <form id="register-form" action="php/register-exec.php" method="post">
                                <div class="form-group">
                                    <label for="inputName">Name <span class="red" >*</span></label>
                                    <input type="text" class="form-control required" name="inputName" id="inputName" placeholder="Enter your name">
                                    <span class="childHidden">* Please do not leave this empty</span>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail">Email address <span class="red" >*</span></label>
                                    <input type="email" class="form-control required" name="inputEmail" id="inputEmail" placeholder="Enter email">
                                    <span class="childHidden">* Please do not leave this empty</span>
                                </div>
                                <div class="form-group">
                                    <label for="inputPhone">Phone Number <span class="red" >*</span></label>
                                    <input type="text" class="form-control required" name="inputPhone" id="inputPhone" placeholder="Enter phone number">
                                    <span class="childHidden">* Please do not leave this empty<br /></span>
                                    <span class="childHidden phone">* Enter 10 or 11 digit phone number with area code, no spaces and hyphens</span>
                                </div>
                                <div class="form-group">
                                    <label for="inputAge">Age <span class="red" >*</span></label>
                                    <input type="text" class="form-control required" name="inputAge" id="inputAge" placeholder="Enter you age">
                                    <span class="childHidden">* Please do not leave this empty</span>
                                </div>
                                <div class="form-group">
                                    <label for="inputRemark">Remark (graduation period/ notice period) <span class="red" >*</span></label>
                                    <textarea class="form-control required"  name="inputRemark" id="inputRemark" placeholder="Enter your area of interest" rows="3"></textarea>
                                    <span class="childHidden">* Please do not leave this empty</span>
                                </div>
                                <div class="form-group">
                                    <label for="inputInterest">Area Of Interest <span class="red" >*</span></label>
                                    <textarea class="form-control required"  name="inputInterest" id="inputInterest" placeholder="Enter your area of interest" rows="3"></textarea>
                                    <span class="childHidden">* Please do not leave this empty</span>
                                </div>
                                <hr />
                                <div class="form-group">
                                    <label for="inputStatus">Status: </label>
                                    <div class="radio">
                                      <label>
                                        <input type="radio" name="inputStatus" id="inputStatus" value="Fresh Graduate" checked>
                                        Fresh Graduate
                                      </label>
                                    </div>
                                    <div class="radio">
                                      <label>
                                        <input type="radio" name="inputStatus" id="inputStatus" value="Professional">
                                        Professional
                                      </label>
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group">
                                    <label for="inputResume">Have you already submited your resume? </label>
                                    <div class="checkbox">
                                        <label>
                                          <input type="checkbox" name="inputResume" id="inputResume" value="1"> Yes, I did.
                                        </label>
                                      </div>
                                </div>
                                <input type="hidden" name="token" value="<?php $token =bin2hex(mcrypt_create_iv(128, MCRYPT_DEV_RANDOM)); ?>" />
                                <button type="submit" class="btn btn-default">
                                    Submit
                                </button>
                            </form>
                        </div>
                </div>
            </div>
        </div>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
        <script>
            //Validation
            var inputPhone = $('#inputPhone');
            $("#register-form").submit(function(){
                var isFormValid = true;

                $( ".required" ).each(function( index ) {
                    if ($.trim($(this).val()).length == 0){

                        $(this).addClass("highlight");
                        isFormValid = false;
                        $(this).next('.childHidden').show();
                    }
                    else{
                        $(this).removeClass("highlight");
                        $(this).next('.childHidden').hide();
                    }
                });
                var trimmedLength = $.trim(inputPhone.val()).length;
                  if(trimmedLength != 10 && trimmedLength != 11) {
                    $('#inputPhone').addClass("highlight");
                    $('#inputPhone').next('.childHidden').next('.childHidden').show();
                    isFormValid = false;
                }else{
                    $('#inputPhone').removeClass("highlight");
                    $('#inputPhone').next('.childHidden').next('.childHidden').hide();
                }

                return isFormValid;
            });
        </script>
        </body>
</html>