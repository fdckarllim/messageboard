<div class="row">
    <div class="col-md-12">
        <div class="pull-right">
            <a href="<?php echo $this->Html->url('/clients/add'); ?>" class="btn btn-primary">New</a>
            <h2></h2>
        </div>
    </div>    
</div>

<div class="row">
    <div class="col-md-12">
        <table id="dataTable" class="table table-striped" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th class="no-sort">Actions</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th class="no-sort">Actions</th>
            </tr>
        </tfoot>
        <tbody>
        <?php foreach ($clients as $client) {
            $id = $client['Client']['id'];
            echo "<tr>
                <td>{$client['Client']['id']}</td>
                <td>{$client['Client']['lname']}, {$client['Client']['fname']}</td>
                <td><a href='".$this->Html->url('/clients/details/'.$id)."' class='btn btn-xs btn-primary'>View</a></td>
            </tr>";
        } ?>
        </tbody>
    </table>

    </div>

</div>