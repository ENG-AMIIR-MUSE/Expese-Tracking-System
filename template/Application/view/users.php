<?php

include('./header.php');
include('./navbar.php');

?>
<style>
    #show {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        border: 1px solid gray;

    }
</style>

<div class="pcoded-main-container">
    <div class="pcoded-wrapper">

        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <!-- [ breadcrumb ] start -->

                <!-- [ breadcrumb ] end -->
                <div class="main-body">

                    <div class="page-wrapper">
                        <!-- [ Main Content ] start -->

                        <div class="row">


                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Manage Users</h5>
                                        <span class="d-block m-t-5">use class <code>table</code> inside table element</span>
                                    </div>
                                    <div class="card-block table-border-style">

                                        <button class="btn btn-primary " id="addUsers">add User</button>



                                        <div class="table-responsive">
                                            <!-- <button class="btn btn-primary " type="submit" id="addNew">show Statment</button> -->
                                            <table class="table " id="myTable">
                                                <thead>

                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal" tabindex="-1" role="dialog" id="modal">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">User Registration Form</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="expenseForm" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">

                                                        <input type="text" id='id' name='id' class="form-control d-none">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">

                                                        <input type="text" id='UserName' name='UserName' placeholder='UserName' class="form-control">
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="form-group">

                                                        <input type="password" id="password" name="password" placeholder='Password' class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">

                                                        <input type="date" id="date" placeholder='date' name="date" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">

                                                        <input type="status" id="status" name="status" placeholder="Status" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">

                                                        <input type="file" id="image" name="image" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 ">
                                                    <div class="form-group">
                                                        <img src="" id="show" alt="">
                                                    </div>
                                                </div>
                                            </div>


                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Save changes</button>

                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- [ Main Content ] end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php
include('./footer.php');
?>
<script src="../js/users.js"></script>