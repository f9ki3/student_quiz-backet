<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Student Quizzes</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
</head>
<body>
<div class="container">
    <h1 class="page-header text-center" style="font-weight: bold;">Student Quizzes</h1><p style="text-align: center">by: Nicole Cervantes</p>
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
        <a href="#addnew" class="btn btn-primary" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span> New</a>
        <a href="index.php" class="btn btn-primary">Refresh</a>
            <?php 
                session_start();
                if(isset($_SESSION['message'])){
                    ?>
                    <div class="alert alert-info text-center" style="margin-top:20px;">
                        <?php echo $_SESSION['message']; ?>
                    </div>
                    <?php

                    unset($_SESSION['message']);
                }
            ?>
            <table class="table table-bordered table-striped" style="margin-top:20px;">
                <thead>
                    <th width="10%">Student No.</th>
                    <th width="15%">Student Name</th>
                    <th width="3%">Q1</th>
                    <th width="3%">Q2</th>
                    <th width="3%">Q3</th>
                    <th width="3%">Q4</th>
                    <th width="3%">Q5</th>
                    <th width="10%">Ave Quiz</th>
                    <th width="20%">Action</th>
                </thead>
                <tbody>
                    <?php
                    //load xml file
                    $file = simplexml_load_file('Cervantes_Nicole.xml');
                    
                    foreach($file->user as $row){
                        ?>
                        <tr>
                            <td><?php echo $row->id; ?></td>
                            <td><?php echo $row->student_name; ?></td>
                            <td><?php echo $row->q1; ?></td>
                            <td><?php echo $row->q2; ?></td>
                            <td><?php echo $row->q3; ?></td>
                            <td><?php echo $row->q4; ?></td>
                            <td><?php echo $row->q5; ?></td>
                            <td><?php echo ($row->q1+$row->q2+$row->q3+$row->q4+$row->q5)/5; ?></td>
                            <td>
                                <a href="#edit_<?php echo $row->id; ?>" data-toggle="modal" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span> Edit</a>
                                <a href="#delete_<?php echo $row->id; ?>" data-toggle="modal" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                            </td>
                            <?php include('edit_delete_modal.php'); ?>
                        </tr>
                        <?php
                    }
        
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include('add_modal.php'); ?>
<script src="jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>