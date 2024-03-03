<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Basket Record</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
</head>
<body>
<div class="container">
    <h1 class="page-header text-center" style="font-weight: bold;">Basket Record</h1>
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
        <div style="display: flex; flex-direction: row; justify-content: space-between">
        <a href="#addnew" class="btn btn-success" data-toggle="modal" style="width: 49%">+ New</a>
        <a href="index.php" class="btn btn-success" style="width: 49%">Refresh</a>
        </div>
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
                    <th width="15%">Basket No.</th>
                    <th width="15%">Basket Owner</th>
                    <th width="9%">Fruit 1</th>
                    <th width="9%">Fruit 2</th>
                    <th width="9%">Fruit 3</th>
                    <th width="9%">Fruit 4</th>
                    <th width="9%">Fruit 5</th>
                    <th width="20%">Action</th>
                </thead>
                <tbody>
                    <?php
                    //load xml file
                    $file = simplexml_load_file('Hernandez_Rhealuz.xml');
                    
                    // Initialize variables to store total fruit count
                    $total_fruit1 = 0;
                    $total_fruit2 = 0;
                    $total_fruit3 = 0;
                    $total_fruit4 = 0;
                    $total_fruit5 = 0;

                    foreach($file->user as $row){
                        ?>
                        <tr>
                            <td><?php echo $row->id; ?></td>
                            <td><?php echo $row->basket_owner; ?></td>
                            <td><?php echo $row->f1; ?></td>
                            <td><?php echo $row->f2; ?></td>
                            <td><?php echo $row->f3; ?></td>
                            <td><?php echo $row->f4; ?></td>
                            <td><?php echo $row->f5; ?></td>
                            
                            <td>
                                <a href="#edit_<?php echo $row->id; ?>" data-toggle="modal" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span> Edit</a>
                                <a href="#delete_<?php echo $row->id; ?>" data-toggle="modal" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                            </td>
                            <?php include('edit_delete_modal.php'); ?>
                        </tr>
                        <?php
                        // Update total fruit count for each fruit
                        $total_fruit1 += $row->f1;
                        $total_fruit2 += $row->f2;
                        $total_fruit3 += $row->f3;
                        $total_fruit4 += $row->f4;
                        $total_fruit5 += $row->f5;
                    }
        
                    ?>
                    <tr>
                            <td></td>
                            <th>Total Fruits</th>
                            <td><?php echo $total_fruit1; ?></td>
                            <td><?php echo $total_fruit2; ?></td>
                            <td><?php echo $total_fruit3; ?></td>
                            <td><?php echo $total_fruit4; ?></td>
                            <td><?php echo $total_fruit5; ?></td>
                            <td></td>
                    </tr>
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
