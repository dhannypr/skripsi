<div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card strpied-tabled-with-hover">
                                <div class="card-header ">
                                    <h4 class="card-title">Meja</h4>
                                </div>
                                <div class="card-body table-full-width table-responsive">
                                <button class="btn btn-success ml-2 my-4"   type="button" data-toggle="modal" data-target="#exampleModal">
                                <i class="fas fa-plus"></i>
                                Tambah
                                </button>
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <th>No</th>
                                            <th>No Meja</th>
                                            <th>Action</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $no = 1;
                                                foreach($datameja as $data => $user){   
                                                ?>
                                            <tr>
                                                <td><?= $no;?></td>
                                                <td><?= $user['no_meja'];?></td>
                                                <td>
                                                    <a href="<?= base_url('dashboard/delete_meja/'.$user['id'])?>" class="btn btn-danger btn-circle">
                                                       Delete
                                                </a>
                                                
                                                <a href="<?= base_url('dashboard/edit_meja/'.$user['id'])?>" class="btn btn-primary btn-circle">
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