<?php

include('./header.php');
include('./navbar.php');

?>

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
                            <div class="col-sm-12">
                                <div class="alert alert-success d-none" id="success" role="alert">
                                    This is a success alert—check it out!
                                </div>
                                <div class="alert alert-danger d-none" id="error" role="alert">
                                    This is a danger alert—check it out!
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Basic Table</h5>
                                        <span class="d-block m-t-5">use class <code>table</code> inside table element</span>
                                    </div>
                                    <div class="card-block table-border-style">
                                        <div class="table-responsive">
                                            <button class="btn btn-primary  " id="addNew">add New Transaction</button>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Amount</th>
                                                        <th>Type</th>
                                                        <th>Description</th>
                                                        <th>UserId</th>
                                                        <th>Date</th>
                                                        <th>Action</th>
                                                    </tr>
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
                                        <h5 class="modal-title">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="expenseForm">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="amount">Amount</label>
                                                        <input type="text" id='amount' name='amount' class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="type">Type</label>
                                                        <select id="type" name="type" class="form-control">
                                                            <option value="income">Income</option>
                                                            <option value="expense">Exepense</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="desc">Description</label>
                                                        <input type="text" id="desc" name="description" class="form-control">
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