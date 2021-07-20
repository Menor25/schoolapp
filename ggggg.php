<div class="modal-bg">
        <div class="modal-content" id="form">
            <div class="close">+</div>
            <div class="card">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item text-center"> 
                        <a class="nav-link active btl" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Login</a> 
                    </li>
                    <li class="nav-item text-center"> 
                        <a class="nav-link btr" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Signup</a> 
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <div class="form px-4 pt-5"> 
                            <div class="inputBox form-control">
                                <!----<label for="">Username :</label>--->
                                <input type="text" name="stusername" id="stusername" class="username" placeholder="Username" required>
                                <i class="fa fa-check-circle"></i>
                                <i class="fa fa-exclamation-circle"></i>
                                <small>Error message</small>
                            </div>

                            <div class="inputBox form-control">
                                <!---<label for="">Password :</label>--->
                                <input type="password" name="stpassword" id="stpassword" class="stpassword" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                                <i class="fa fa-check-circle"></i>
                                <i class="fa fa-exclamation-circle"></i>
                                <small>Error message</small>
                            </div>

                            <div class="d-flex">
                                <button class="submit" onclick="checkLogin()">Submit</button>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="form px-4"> 
                            <div class="inputBox form-control">
                                <!----<label for="">Username :</label>--->
                                <input type="text" name="stusername" id="stusername" class="username" placeholder="Username" required>
                                <i class="fa fa-check-circle"></i>
                                <i class="fa fa-exclamation-circle"></i>
                                <small>Error message</small>
                            </div>

                            <div class="inputBox form-control">
                                <!---<label for="">Password :</label>--->
                                <input type="password" name="stpassword" id="stpassword" class="stpassword" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                                <i class="fa fa-check-circle"></i>
                                <i class="fa fa-exclamation-circle"></i>
                                <small>Error message</small>
                            </div>

                            <div class="d-flex">
                                <button class="submit" onclick="checkLogin()">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // //Check if it is a valid class name
      <?php  if(!preg_match("/^[A-Z A-Z]+ [0-9]+$/", $class_name)): ?>
        
        toastr.success (<?="Please enter a valid class name"?>);
        <?php endif ?>
    
        // //Check if it is a valid subject number
        if(!preg_match("/^[0-9]+$/", $no_of_subjects))
        {
             $Error = "Please enter a valid number";
        }

        // //Check if it is a valid phone number
        if(!preg_match("/^[a-zA-Z]+[0-9]+$/", $fees))
        {
            $Error = "Please enter a valid amount";
        }
    </script>