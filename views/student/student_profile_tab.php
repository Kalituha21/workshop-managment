<div class="container light-style flex-grow-1 container-p-y">

    <h4 class="font-weight-bold py-3 mb-4">
        Account settings
    </h4>

            <div class="card overflow-hidden">
                <div class="row no-gutters row-bordered row-border-light">
                    <div class="col-md-3 pt-0">
                        <div class="list-group list-group-flush account-settings-links">
                            <a class="list-group-item list-group-item-action active" data-toggle="list" href="#account-general">General</a>
                            <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-change-password">Change password</a>

                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="account-general">


                                <hr class="border-light m-0">

                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="form-label">Role</label>
                                        <input disabled type="text" class="form-control" value="Student">
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Name</label>
                                        <input disabled type="text" class="form-control" value="Deniss">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Surname</label>
                                        <input disabled type="text" class="form-control" value="Fedutins">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Student ID</label>
                                        <input disabled type="text" class="form-control mb-1" value="181RDC047">

                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">E-mail</label>
                                        <input disabled type="text" class="form-control mb-1" value="fedutin13@gmail.com">

                                    </div>
                                    <div class="form-group">
                                        <script>
                                            function myFunction() {
                                                var x = document.getElementById("psw");
                                                if (x.type === "password") {
                                                    x.type = "text";
                                                } else {
                                                    x.type = "password";
                                                }
                                            }
                                        </script>
                                        <label class="form-label">Password</label>
                                        <input id="psw" type="password" class="form-control" value="Password123">
                                        <label class="switcher">
                                            <input onclick="myFunction()" type="checkbox" class="switcher-input" >
                                            <span class="switcher-indicator">
                      <span class="switcher-yes"></span>
                      <span class="switcher-no"></span>
                    </span>
                                            <span class="switcher-label">Show Password</span>
                                        </label>
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane fade" id="account-change-password">
                                <div class="card-body pb-2">

                                    <div class="form-group">
                                        <label class="form-label">Current password</label>
                                        <input type="password" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">New password</label>
                                        <input type="password" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Repeat new password</label>
                                        <input type="password" class="form-control">
                                    </div>
                                    <button type="button" class="btn btn-primary">Save changes</button>&nbsp;
                                </div>




                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </div>