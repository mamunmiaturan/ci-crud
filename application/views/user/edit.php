<?php $this->load->view('includes/header.php') ?>
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h5>Update User</h5>
            <a href="<?= base_url('user/index') ?>" class="btn btn-primary">User List</a>
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

        <form method="POST" action="<?= base_url('user/edit/' . $user->id) ?>">
            <div class="mb-3">
                <label for="nameID" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="nameID" value="<?= $user->name ?>" placeholder="Please enter your name" required />
            </div>
            <div class="mb-3">
                <label for="emailID" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="emailID" value="<?= $user->email ?>" placeholder="Please enter your email" required />
            </div>
            <div class="mb-3">
                <label for="phoneID" class="form-label">Phone Number</label>
                <input type="text" class="form-control" name="phone_no" id="phoneID" value="<?= $user->phone_no ?>" placeholder="Please enter your phone number" required />
            </div>
            <div class="mb-3">
                <label for="addressID" class="form-label">Address</label>
                <input type="text" class="form-control" name="address" id="addressID" value="<?= $user->address ?>" placeholder="Please enter your address" required />
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </form>
    </div>
</div>
<?php $this->load->view('includes/footer.php') ?>