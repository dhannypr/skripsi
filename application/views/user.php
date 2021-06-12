<div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card strpied-tabled-with-hover">
                                <div class="card-header ">
                                    <h4 class="card-title">User</h4>
                                </div>
                                <div class="card-body table-full-width table-responsive">
                                <button class="btn btn-success ml-2 my-4"   type="button" data-toggle="modal" data-target="#exampleModal">
                                <i class="fas fa-plus"></i>
                                Tambah
                                </button>
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Username</th>
                                            <th>Role</th>
                                            <th>Action</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $no = 1;
                                                foreach($datauser as $data => $user){
                                                    
                                                ?>
                                            <tr>
                                                <td><?= $no;?></td>
                                                <td><?= $user['name'];?></td>
                                                <td><?= $user['username'];?></td>
                                                <td><?= $user['role'];?></td>
                                                <td>
                                                    <a href="<?= base_url('dashboard/delete_user/'.$user['id'])?>" class="btn btn-danger btn-circle">
                                                        <i class="fas fa-trash"></i>
                                                </a>
                                                
                                                <a href="<?= base_url('dashboard/edit_user/'.$user['id'])?>" class="btn btn-primary btn-circle">
                                                             Edit
                                                </a>
                                            </tr>
                                            <?php
                                            $no++;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
