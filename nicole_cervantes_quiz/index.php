<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Student Quizzes</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
</head>
<body>



<div>
<div style=" padding: 20px; margin: 0px; ">
        <h1 class="text-center" style="font-weight: bold;">Student Quizzes</h1>
        <p style="text-align: center">by: Nicole Cervantes</p>
</div>
    
    <div class="row" style="margin-top: 10px">
        <div class="col-sm-8 col-sm-offset-2">
        <a href="#addnew" class="btn btn-light" style="border: 1px solid #8a8a8a;  color: #8a8a8a" data-toggle="modal"> + Add Record</a>
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
            <table class=" " style="margin-top:20px;">
                <thead>
                    <th width="10%">Student No.</th>
                    <th width="15%">Student Name</th>
                    <th width="5%">Quiz 1</th>
                    <th width="5%">Quiz 2</th>
                    <th width="5%">Quiz 3</th>
                    <th width="5%">Quiz 4</th>
                    <th width="5%">Quiz 5</th>
                    <th width="10%">Average Quiz</th>
                    <th width="15%" class="text-center">Action</th>
                </thead>
                <tbody>
                    <?php
                    //load xml file
                    $file = simplexml_load_file('Cervantes_Nicole.xml');
                    
                    foreach($file->user as $row){
                        ?>
                        <tr>
                            <td class="text-center"><?php echo $row->id; ?></td>
                            <td ><?php echo $row->student_name; ?></td>
                            <td class="text-center"><?php echo $row->q1; ?></td>
                            <td class="text-center"><?php echo $row->q2; ?></td>
                            <td class="text-center"><?php echo $row->q3; ?></td>
                            <td class="text-center"><?php echo $row->q4; ?></td>
                            <td class="text-center"><?php echo $row->q5; ?></td>
                            <td class="text-center"><?php echo ($row->q1+$row->q2+$row->q3+$row->q4+$row->q5)/5; ?></td>
                            <td class="text-center" style="padding: 10px">
                                <a href="#edit_<?php echo $row->id; ?>" data-toggle="modal" class="btn btn-sm btn-warning" > Edit</a>
                                <a href="#delete_<?php echo $row->id; ?>" data-toggle="modal" class="btn btn-sm btn-danger"> Delete</a>
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