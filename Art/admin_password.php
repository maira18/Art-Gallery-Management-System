<!DOCTYPE html>
<html lang="en">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Panel</title>
    <script type="text/javascript">
        function validatePassword() {
            var newpass = document.getElementById("new").value;
            var confirm = document.getElementById("confirm").value;
            if(newpass !=  confirm){
                alert("Password not Matched");
                return false;
            }
            alert("Password successfully changed");
            return true;
        }
    </script>
    <?php
    require_once 'admin_header.php';
    ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Change Password</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col">
                    <div class="panel panel-info">
    <div class="panel-heading">Change Password </div>
    <div class="panel-body" style="margin-left: .1cm">
        <form action="includes/adminpass.php" method="post" onsubmit="validatePassword()">
                <div class="form-group">
                    <div class="form-row">
                        <div class="col"><label>Old Password:&nbsp;</label>
                            <input class="form-control" id="old" name="oldpas" type="password" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col"><label>New Password:&nbsp;</label>
                            <input id="new" class="form-control" name="newpas" type="password" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col"><label>Confirm Password:&nbsp;</label>
                            <input id="confirm" class="form-control" name="conpas" type="password" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col"><input class="btn btn-primary" type="submit" name="submit" value="Change Password"></div>
                    </div>
                </div>
            </form></div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    <?php
        require_once 'admin_endinf.php';
    ?>

</body>

</html>
