
                    <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div class="page-title-icon">
                                        <i class="pe-7s-config icon-gradient bg-sunny-morning">
                                        </i>
                                    </div>
                                    <div>Ubah Password
                                        <div class="page-title-subheading">Halaman ini berfungsi untuk mengubah password login.
                                        </div>
                                    </div>
                                </div>
                                </div>
                        </div>

                            <div class="tab-pane tabs-animation fade show active" id="tab-content-1" role="tabpanel">
                                @include('pesan')
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Account</h5>
                                        <form class="" action="/account" method="post">
                                        @csrf
                                      <div class="form-row">
                                         <div class="col-sm-2">
                                             <div class="position-relative form-group">
                                                 <label for="exampleText" class="col-form-label">Password Lama :</label>
                                             </div>
                                         </div>
                                            <div class="col-sm-8">
                                                <div class="position-relative form-group">
                                                    <input name="oldpassword" id="exampleText" placeholder="Password Lama" type="password" class="form-control" required>
                                                </div>
                                            </div>
                                      </div>
                                      <div class="form-row">
                                        <div class="col-sm-2">
                                            <div class="position-relative form-group">
                                                <label for="exampleText" class="col-form-label">Password Baru :</label>
                                            </div>
                                        </div>
                                           <div class="col-sm-8">
                                               <div class="position-relative form-group">
                                                   <input name="newpassword" id="exampleText" placeholder="Password Baru" type="password" class="form-control" required>
                                               </div>
                                           </div>
                                     </div>
                                     <div class="form-row">
                                        <div class="col-sm-2">
                                            <div class="position-relative form-group">
                                                <label for="exampleText" class="col-form-label">Konfirmasi Password Baru :</label>
                                            </div>
                                        </div>
                                           <div class="col-sm-8">
                                               <div class="position-relative form-group">
                                                   <input name="newpasswordconfirm" id="exampleText" placeholder="Masukkan Ulang Password Baru" type="password" class="form-control" required>
                                               </div>
                                           </div>
                                     </div>

                                            <div class="position-relative row form-group">
                                                <div class="col-sm-10 offset-sm-2">
                                                    <button type="submit" class="btn btn-warning"> <i class="fa fa-pencil" aria-hidden="true" title="Copy to use user-plus"></i> Ubah Password</button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>

                                </div>
                            </div>
                        </div>
                    <!-- </div> -->

