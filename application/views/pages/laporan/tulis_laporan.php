<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary mt-2" data-toggle="modal" data-target="#exampleModal">
                Tulis Laporan
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                            <th>Start date</th>
                            <th>Salary</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                            <th>Start date</th>
                            <th>Salary</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>61</td>
                            <td>2011/04/25</td>
                            <td>$320,800</td>
                        </tr>
                        <tr>
                            <td>Garrett Winters</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>63</td>
                            <td>2011/07/25</td>
                            <td>$170,750</td>
                        </tr>
                        <tr>
                            <td>Ashton Cox</td>
                            <td>Junior Technical Author</td>
                            <td>San Francisco</td>
                            <td>66</td>
                            <td>2009/01/12</td>
                            <td>$86,000</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tulis Laporan Pengaduan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open_multipart('tulis_laporan/lapor'); ?>
                <input type="hidden" class="form-control" id="inputCity" value="<?= $masyarakat['nik']; ?>" name="nik" readonly>
                <div class="form-group">
                    <label for="inputCity" class="form-label">Judul Pengaduan</label>
                    <input type="text" class="form-control" id="inputCity" name="judul_pengaduan" required>
                </div>
                <div class="form-group">
                    <label for="inputCity" class="form-label">Deskripsi Pengaduan</label>
                    <textarea class="form-control" name="deskripsi_pengaduan" id="" cols="1" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="inputCity" class="form-label">Foto</label>
                    <input type="file" class="" style="
                    display: block;
                    width: 100%;
                    height: calc(1.5em + 1.2rem + 2px);
                    padding: 0.375rem 0.375rem;
                    font-size: 1rem;
                    font-weight: 400;
                    line-height: 1.5;
                    color: #6e707e;
                    background-color: #fff;
                    background-clip: padding-box;
                    border: 1px solid #d1d3e2;
                    border-radius: 0.35rem;
                    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
                    " id="inputCity" name="foto" required>
                </div>
            </div>
            <div class="form-group text-center">
                <label for="inputCity" class="form-label" style="">Kategori Pengaduan</label>
                    <div class="input-group justify-content-center mb-3">
                        <?php
                        foreach ($querykategori as $kategori) {
                        ?>
                            <div class="input-group-text" style="margin-right: 15px;">
                                <input class="form-check-input mt-0" type="radio" name="id_kategori[]" value="<?= $kategori->id_kategori ?>"> &nbsp; <?= $kategori->nama_kategori ?>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>