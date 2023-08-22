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
                           
                          
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Basic Table</h5>
                                        <span class="d-block m-t-5">use class <code>table</code> inside table element</span>
                                    </div>
                                    <div class="card-block table-border-style">
                                        <form id="statement" >
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="">Statement Type</label>
                                                    <select id="type" class="form-control">
                                                        <option value="0">All</option>
                                                        <option value="Custom" >Custom</option>
                                                    </select>

                                                </div>

                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label for="">From</label>
                                                        <input type="date"  id = 'from'class='form-control'>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label for="">To</label>
                                                        <input type="date"  id = 'to'class='form-control'>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="table-responsive">
                                            <button class="btn btn-primary  " id="addNew">show Statment</button>
                                        </form>

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
<script src="../js/userStatement.js"></script>