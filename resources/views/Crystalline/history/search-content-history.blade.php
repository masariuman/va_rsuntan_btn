
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
                                        <form class="" action="/search" method="post">
                                        @csrf
                                      <div class="form-row">
                                         <div class="col-sm-2">
                                             <div class="position-relative form-group">
                                                 <label for="exampleText" class="col-form-label">Cari Virtual Account :</label>
                                             </div>
                                         </div>
                                            <div class="col-sm-8">
                                                <div class="position-relative form-group">
                                                    <input name="cari" id="exampleText" placeholder="Nomor VA / Nama" type="text" class="form-control" value="{{$cari}}" required>
                                                </div>
                                            </div>
                                      </div>

                                            <div class="position-relative row form-group">
                                                <div class="col-sm-10 offset-sm-2">
                                                    <button type="submit" class="btn btn-warning"> <i class="fa fa-search" aria-hidden="true" title="Copy to use user-plus"></i> Cari</button>
                                                </div>
                                            </div>
                                        </form>

                                        <table class="mb-0 table" id="table">
                                            <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Virutal Account</th>
                                                <th>Nama</th>
                                                <th>Status</th>
                                                <th>Teller</th>
                                                <th>Option</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                  
                                            
                                            @foreach($search as $search)
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>{{ $search->va}}</td>
                                                <td>{{ $search->nama}}</td>
                                                <td><div class="mb-2 mr-2 badge badge-pill badge-info">Pending</div></td>
                                                <td>{{$search->user->name}}</td>
                                                <td>
                                                    <!-- <button class="mb-2 mr-2 btn btn-success" data-toggle="modal" data-target=".bd-example-modal-sm-inquiry-{{ $search->id }}"> <i class="fa fa-fw" aria-hidden="true" title="Copy to use plus-square"></i> Inquiry
                                                    </button>||&nbsp; -->
                                                    <button class="mb-2 mr-2 btn btn-info" data-toggle="modal" data-target="#exampleModalLongDetail-{{ $search->id }}"> <i class="fa fa-fw" aria-hidden="true" title="Copy to use address-card"></i> Detail
                                                    </button>&nbsp;
                                                    <!-- <button class="mb-2 mr-2 btn btn-alternate" data-toggle="modal" data-target="#exampleModalLongEdit-{{ $search->id }}"> <i class="fa fa-fw" aria-hidden="true" title="Copy to use edit"></i> Edit
                                                    </button>||&nbsp;
                                                    <button class="mb-2 mr-2 btn btn-danger" data-toggle="modal" data-target=".bd-example-modal-sm-delete-{{ $search->id }}"> <i class="fa fa-fw" aria-hidden="true" title="Copy to use trash"></i> Delete
                                                    </button>||&nbsp;
                                                    <button class="mb-2 mr-2 btn btn-focus" data-toggle="modal" data-target="#exampleModalLongHistory-{{ $search->id }}"> <i class="fa fa-fw" aria-hidden="true" title="Copy to use history"></i> History
                                                    </button> -->
                                                    </td>
                                            </tr>
                                            @endforeach

                                         

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- </div> -->

