<div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card strpied-tabled-with-hover">
                                <div class="card-header ">
                                    <h4 class="card-title">Striped Table with Hover</h4>
                                    <p class="card-category">Here is a subtitle for this table</p>
                                </div>
                                <div class="card-body table-full-width table-responsive">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <th>No</th>
                                            <th>No Meja</th>
                                            <th>Waktu Order</th>
                                            <th>Action</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $no = 1;
                                                foreach($dataorder as $data => $user){
                                                    
                                                ?>
                                            <tr>
                                                <td><?= $no;?></td>
                                                <td><?= $user['no_meja'];?></td>
                                                <td><?= $user['waktu_order'];?></td>
                                                <td>
                                                    <a href="<?= base_url('dashboard/delete_order/'.$user['id'])?>" class="btn btn-danger btn-circle">
                                                        <i class="fas fa-trash"></i>
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