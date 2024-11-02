<?php $this->load->view('includes/header.php') ?>
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h5>User List</h5>
            <a href="<?= base_url('user/store') ?>" class="btn btn-primary">Create User</a>
        </div>
    </div>
    <div class="card-body">
        <?php if ($this->session->flashdata('success')) { ?>
            <div class="alert alert-success">
                <?= $this->session->flashdata('success') ?>
            </div>
        <?php } ?>
        <?php if ($this->session->flashdata('error')) { ?>
            <div class="alert alert-danger">
                <?= $this->session->flashdata('error') ?>
            </div>
        <?php } ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone No</th>
                    <th scope="col">Address</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) { ?>
                    <tr>
                        <td><?= $user['id'] ?></td>
                        <td><?= $user['name'] ?></td>
                        <td><?= $user['email'] ?></td>
                        <td><?= $user['phone_no'] ?></td>
                        <td><?= $user['address'] ?></td>
                        <td><a href="<?= base_url('user/edit/' . $user['id']) ?>" class="btn btn-warning">Edit</a></td>
                        <td><a href="<?= base_url('user/delete/' . $user['id']) ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">Delete</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<?php $this->load->view('includes/footer.php') ?>