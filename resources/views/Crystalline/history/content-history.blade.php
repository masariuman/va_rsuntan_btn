
                    <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div class="page-title-icon">
                                        <i class="pe-7s-add-user icon-gradient bg-sunny-morning">
                                        </i>
                                    </div>
                                    <div>Riwayat Data
                                        <div class="page-title-subheading">Halaman ini berfungsi untuk mencari riwayat data.
                                        </div>
                                    </div>
                                </div>
                                </div>
                        </div>

                            <div class="tab-pane tabs-animation fade show active" id="tab-content-1" role="tabpanel">
                                @include('pesan')
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Riwayat Data</h5>
                                        <form class="" action="tambah_addvarsuntan" method="post">
                                        @csrf
                                      <div class="form-row">
                                         <div class="col-sm-2">
                                             <div class="position-relative form-group">
                                                 <label for="exampleText" class="col-form-label">Cari Virtual Account :</label>
                                             </div>
                                         </div>
                                            <div class="col-sm-2">
                                               <div class="position-relative form-group">
                                                    <input name="va1" id="exampleText" value="{{$firstva}}" type="text" class="form-control" disabled>
                                               </div>
                                             </div>
                                            <div class="col-sm-8">
                                                <div class="position-relative form-group">
                                                    <input name="va2" id="exampleText" placeholder="Virtual Account" type="text" class="form-control" required>
                                                </div>
                                            </div>
                                      </div>
                                            <div class="position-relative row form-group"><label for="exampleText" class="col-sm-2 col-form-label">Nama :</label>
                                                <div class="col-sm-10"><input name="nama" id="exampleText" placeholder="Nama" type="text" class="form-control" required></div>
                                            </div>
                                            <div class="position-relative row form-group"><label for="exampleText" class="col-sm-2 col-form-label">Layanan :</label>
                                                <div class="col-sm-10"><input name="layanan" id="exampleText" placeholder="Layanan" type="text" class="form-control" required></div>
                                            </div>
                                            <div class="position-relative row form-group"><label for="exampleText" class="col-sm-2 col-form-label">Kode Layanan :</label>
                                                <div class="col-sm-10"><input name="kodelayanan" id="exampleText" placeholder="Kode Layanan" type="text" class="form-control" required></div>
                                            </div>
                                            <div class="position-relative row form-group"><label for="exampleText" class="col-sm-2 col-form-label">Jenis Bayar :</label>
                                                <div class="col-sm-10"><input name="jenisbayar" id="exampleText" placeholder="Jenis Bayar" type="text" class="form-control" required></div>
                                            </div>
                                            <div class="position-relative row form-group"><label for="exampleText" class="col-sm-2 col-form-label">Kode Jenis Bayar :</label>
                                                <div class="col-sm-10"><input name="kodejenisbyr" id="exampleText" placeholder="Kode Jenis Bayar" type="text" class="form-control" required></div>
                                            </div>
                                            <div class="position-relative row form-group"><label for="exampleText" class="col-sm-2 col-form-label">No. ID Pemesanan :</label>
                                                <div class="col-sm-10"><input name="noid" id="exampleText" placeholder="Nomor ID Pemesanan" type="text" class="form-control" required></div>
                                            </div>
                                            <div class="position-relative row form-group"><label for="exampleText" class="col-sm-2 col-form-label">Tagihan :</label>
                                                <div class="col-sm-10"><input name="tagihan" id="exampleText" placeholder="Tagihan" type="number" class="form-control" required></div>
                                            </div>
                                            <div class="position-relative row form-group"><label for="exampleSelect" class="col-sm-2 col-form-label">Flag Full / Partial :</label>
                                                <div class="col-sm-10">
                                                <select name="flag" id="exampleSelect" class="form-control" required>
                                                    <option value="" disabled selected>-Pilih Flag-</option>
                                                    <option value="F">Flag Full</option>
                                                    <option value="P">Flag Partial</option>
                                                </select>
                                                </div>
                                            </div>
                                            <!-- <div class="position-relative row form-group"><label for="exampleText" class="col-sm-2 col-form-label">Expired Date :</label>
                                                <div class="col-sm-10"><input name="expired" id="datepicker" placeholder="Expired Date (yymmddHHMM)" type="text" class="form-control" required></div>
                                            </div> -->
                                            <div class="position-relative row form-group"><label for="exampleText" class="col-sm-2 col-form-label">Reserve Field :</label>
                                                <div class="col-sm-10"><input name="reserve" id="exampleText" placeholder="Reserve Field" type="text" class="form-control"></div>
                                            </div>
                                            <div class="position-relative row form-group"><label for="exampleText" class="col-sm-2 col-form-label">Description :</label>
                                                <div class="col-sm-10"><textarea name="description" id="exampleText" placeholder="Description"  class="form-control" required></textarea></div>
                                            </div>

                                            <div class="position-relative row form-group">
                                                <div class="col-sm-10 offset-sm-2">
                                                    <button type="submit" class="btn btn-warning"> <i class="fa fa-fw" aria-hidden="true" title="Copy to use user-plus"></i> Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- </div> -->

