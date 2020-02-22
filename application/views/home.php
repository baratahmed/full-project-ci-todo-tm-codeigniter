<?php if($this->session->flashdata('message')){?>
        <p class="alert alert-success"><?php echo $this->session->flashdata('message');?></p>
<?php } ?>

<?php if($this->session->flashdata('login_success')){?>
        <p class="alert alert-success"><?php echo $this->session->flashdata('login_success');?></p>
<?php } ?>

<?php if($this->session->flashdata('login_failed')){?>
        <p class="alert alert-danger"><?php echo $this->session->flashdata('login_failed');?></p>
<?php } ?>

<?php if($this->session->flashdata('logged_out')){?>
        <p class="alert alert-danger"><?php echo $this->session->flashdata('logged_out');?></p>
<?php } ?>

<?php if($this->session->flashdata('noaccess')){?>
        <p class="alert alert-danger"><?php echo $this->session->flashdata('noaccess');?></p>
<?php } ?>
<h1>Welcome to myTodo!</h1>
<p>myTodo us a simple and helpful application to help you manage your day to day tasks. You can add as many task lists as you want and as many tasks as you want. myTodo is absolutely free! Have fun.</p>

<br />
<h3>My Latest Lists</h3>
<table class="table table-striped" width="50%" cellspacing="5" cellpadding="5">
    <tr>
        <th>List Name</th>
        <th>Created On</th>
        <th>View</th>
    </tr>
    <?php if(isset($lists)) : ?>
    <?php foreach($lists as $list) : ?>
    <tr>
        <td><?php echo $list->list_name; ?></td>
        <td><?php echo $list->list_create_date; ?></td>
        <td><a href="<?php echo base_url(); ?>lists/show/<?php echo $list->id; ?>">View List</a></td>
    </tr>
    <?php endforeach; ?>
    <?php endif; ?>
</table>

<h3>Latest Tasks</h3>
<table class="table table-striped" width="50%" cellspacing="5" cellpadding="5">
    <tr>
        <th>Task Name</th>
        <th>List Name</th>
        <th>Created On</th>
        <th>View</th>
    </tr>
    <?php if(isset($tasks)) : ?>
<?php foreach($tasks as $task) : ?>
     <tr>
        <td> <?php echo $task->task_name; ?></td>
         <td><?php echo $task->list_name; ?></td>
        <td><?php echo $task->task_create_date; ?></td>
        <td><a href="<?php echo base_url(); ?>tasks/show/<?php echo $task->id; ?>">View Task</a></td>

    </tr>
<?php endforeach; ?>
     <?php endif;?>
</table>
