<?php include('header.php')?>
    <div class="container">
        <?php if($error =  $this->session->flashdata('response') ): ?>
            <div class="alert alert-dismissible alert-success">
                <?php echo $error; ?>
            </div>
<?php endif;?>




        <div class="row">
            <div class="col-lg-12">
                <td ><?php $this->load->helper('url'); echo anchor("home/create", 'Create',['class'=>'btn btn-primary']); ?></td>
            </div>
        </div>
                <table class="table table-striped table-hover ">
                    <thead>
                    <tr>
                        <th>Customer Name</th>
                        <th>Phone Num</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>Country</th>
                        <th>Operation</th>


                    </tr>
        </thead>
                    <tbody>
                    <?php if (count($records)) : ?>
                        <?php foreach ($records as $record):  ?>
                            <tr>
                                <td><?php echo $record->customerName; ?></td>
                                <td><?php echo $record->phone; ?></td>
                                <td><?php echo $record->address; ?></td>
                                <td><?php echo $record->city; ?></td>
                                <td><?php echo $record->country; ?></td>
                                <td><?php echo anchor("home/edit/{$record->id}", 'Update',['class'=>'btn btn-success']); ?></td>
                                <td><?php echo anchor("home/delete/{$record->id}", 'Delete',['class'=>'btn btn-danger']); ?></td>
                            </tr>

                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>No Records found!</tr>
                    <?php endif; ?>

                    </tbody>
                </table>
    </div>
<?php include('footer.php')?>