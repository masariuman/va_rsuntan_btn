<div class="app-main">
    @include('crystalline.sidebar')
    <div class="app-main__outer">
        @include('crystalline.content-infovarsuntan')
        @include('crystalline.footer')
    </div>
    <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
</div>
@include('petunjuk')

@foreach($va as $vas)
<!-- Modal Detail -->
<div class="modal fade" id="exampleModalLongDetail-{{ $vas->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Detail Virtual Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="position-relative row form-group"><label for="exampleText" class="col-sm-4 col-form-label">Virtual Account :</label>
                    <div class="col-sm-8 col-form-label col-form-text"><h5>{{ $vas->va }}</h5></div>
                </div>
                <div class="position-relative row form-group"><label for="exampleText" class="col-sm-4 col-form-label">Nama :</label>
                    <div class="col-sm-8 col-form-label col-form-text"><h5>{{ $vas->nama }}</h5></div>
                </div>
                <div class="position-relative row form-group"><label for="exampleText" class="col-sm-4 col-form-label">Layanan :</label>
                    <div class="col-sm-8 col-form-label col-form-text"><h5>{{ $vas->layanan }}</h5></div>
                </div>
                <div class="position-relative row form-group"><label for="exampleText" class="col-sm-4 col-form-label">Kode Layanan :</label>
                    <div class="col-sm-8 col-form-label col-form-text"><h5>{{ $vas->kodelayanan }}</h5></div>
                </div>
                <div class="position-relative row form-group"><label for="exampleText" class="col-sm-4 col-form-label">Jenis Bayar :</label>
                    <div class="col-sm-8 col-form-label col-form-text"><h5>{{ $vas->jenisbayar }}</h5></div>
                </div>
                <div class="position-relative row form-group"><label for="exampleText" class="col-sm-4 col-form-label">Kode Jenis Bayar :</label>
                    <div class="col-sm-8 col-form-label col-form-text"><h5>{{ $vas->kodejenisbyr }}</h5></div>
                </div>
                <div class="position-relative row form-group"><label for="exampleText" class="col-sm-4 col-form-label">No ID Pemesanan :</label>
                    <div class="col-sm-8 col-form-label col-form-text"><h5>{{ $vas->noid }}</h5></div>
                </div>
                <div class="position-relative row form-group"><label for="exampleText" class="col-sm-4 col-form-label">Tagihan :</label>
                    <div class="col-sm-8 col-form-label col-form-text"><h5>{{ $vas->tagihan }}</h5></div>
                </div>
                <div class="position-relative row form-group"><label for="exampleText" class="col-sm-4 col-form-label">Flag Full / Partial :</label>
                    <div class="col-sm-8 col-form-label col-form-text">
                    <h5>
                    @if($vas->flag == "F")
                       Flag Full
                    @elseif($vas->flag == "P")
                       Flag Partial
                    @endif
                    </h5>
                    </div>
                </div>
                <div class="position-relative row form-group"><label for="exampleText" class="col-sm-4 col-form-label">Expired Date :</label>
                    <div class="col-sm-8 col-form-label col-form-text"><h5>{{ $vas->expired }}</h5></div>
                </div>
                <div class="position-relative row form-group"><label for="exampleText" class="col-sm-4 col-form-label">Reserve Field :</label>
                    <div class="col-sm-8 col-form-label col-form-text"><h5>{{ $vas->reserve }}</h5></div>
                </div>
                <div class="position-relative row form-group"><label for="exampleText" class="col-sm-4 col-form-label">Description :</label>
                    <div class="col-sm-8 col-form-label col-form-text"><h5>{{ $vas->description }}</h5></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"> <i class="fa fa-fw" aria-hidden="true" title="Copy to use times"></i> Tutup</button>
                {{-- <button type="button" class="btn btn-info"> <i class="fa fa-fw" aria-hidden="true" title="Copy to use check"></i> Done</button> --}}
            </div>
        </div>
    </div>
</div>
<!-- Modal Detail -->
@endforeach


@foreach($va as $vas)
<!-- Modal Edit -->
<div class="modal fade" id="exampleModalLongEdit-{{ $vas->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Virtual Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="ubah_infovarsuntan/{{ $vas->id}}" method="post">
                @method('patch')
                @csrf
                <div class="position-relative row form-group"><label for="exampleText" class="col-sm-4 col-form-label">Virtual Account :</label>
                    <div class="col-sm-8"><input name="va" id="exampleText" placeholder="Virtual Account" type="text" class="form-control" value="{{ $vas->va }}" required></div>
                </div>
                <div class="position-relative row form-group"><label for="exampleText" class="col-sm-4 col-form-label">Nama :</label>
                    <div class="col-sm-8"><input name="nama" id="exampleText" placeholder="Nama" type="text" class="form-control" value="{{ $vas->nama }}" required></div>
                </div>
                <div class="position-relative row form-group"><label for="exampleText" class="col-sm-4 col-form-label">Layanan :</label>
                    <div class="col-sm-8"><input name="layanan" id="exampleText" placeholder="Layanan" type="text" class="form-control" value="{{ $vas->layanan }}" required></div>
                </div>
                <div class="position-relative row form-group"><label for="exampleText" class="col-sm-4 col-form-label">Kode Layanan :</label>
                    <div class="col-sm-8"><input name="kodelayanan" id="exampleText" placeholder="Kode Layanan" type="text" class="form-control" value="{{ $vas->kodelayanan }}" required></div>
                </div>
                <div class="position-relative row form-group"><label for="exampleText" class="col-sm-4 col-form-label">Jenis Bayar :</label>
                    <div class="col-sm-8"><input name="jenisbayar" id="exampleText" placeholder="Jenis Bayar" type="text" class="form-control" value="{{ $vas->jenisbayar }}" required></div>
                </div>
                <div class="position-relative row form-group"><label for="exampleText" class="col-sm-4 col-form-label">Kode Jenis Bayar :</label>
                    <div class="col-sm-8"><input name="kodejenisbyr" id="exampleText" placeholder="Kode Jenis Bayar" type="text" class="form-control" value="{{ $vas->kodejenisbyr }}" required></div>
                </div>
                <div class="position-relative row form-group"><label for="exampleText" class="col-sm-4 col-form-label">Nomor ID Pemesanan :</label>
                    <div class="col-sm-8"><input name="noid" id="exampleText" placeholder="Nomor ID Pemesanan" type="text" class="form-control" value="{{ $vas->noid }}" required></div>
                </div>
                <div class="position-relative row form-group"><label for="exampleText" class="col-sm-4 col-form-label">Tagihan :</label>
                    <div class="col-sm-8"><input name="tagihan" id="exampleText" placeholder="Tagihan" type="number" class="form-control" value="{{ $vas->tagihan }}" required></div>
                </div>
                <div class="position-relative row form-group"><label for="exampleSelect" class="col-sm-4 col-form-label">Flag Full / Partial :</label>
                    <div class="col-sm-8">
                        <select name="flag" id="exampleSelect" class="form-control" required>
                             @if($vas->flag == "F")
                             <option value="F" selected>
                             Flag Full
                             </option>
                             <option value="P">
                             Flag Partial
                             </option>
                             @elseif($vas->flag == "P")
                             <option value="P" selected>
                             Flag Partial
                             </option>
                             <option value="F">
                             Flag Full
                             </option>
                             @endif
                        </select>
                    </div>
                </div>
                <div class="position-relative row form-group"><label for="exampleText" class="col-sm-4 col-form-label">Expired Date :</label>
                    <div class="col-sm-8"><input name="expired" id="datepicker" placeholder="Expired Date (yymmddHHMM)" type="text" class="form-control" value="{{ $vas->expired }}" disabled required></div>
                </div>
                <div class="position-relative row form-group"><label for="exampleText" class="col-sm-4 col-form-label">Reserve Field :</label>
                    <div class="col-sm-8"><input name="reserve" id="exampleText" placeholder="Reserve Field" type="text" class="form-control" value="{{ $vas->reserve }}" required></div>
                </div>
                <div class="position-relative row form-group"><label for="exampleText" class="col-sm-4 col-form-label">Description :</label>
                    <div class="col-sm-8"><textarea name="description" id="exampleText" placeholder="Description"  class="form-control" value="{{ $vas->description }}" required> {{ $vas->description }} </textarea></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"> <i class="fa fa-fw" aria-hidden="true" title="Copy to use times"></i> Cancel</button>
                <button type="submit" class="btn btn-alternate"> <i class="fa fa-fw" aria-hidden="true" title="Copy to use edit"></i> Ubah</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Edit -->
@endforeach


@foreach($va as $vas)
<!-- Small modal Iquiry -->
<div class="modal fade bd-example-modal-sm-iquiry-{{ $vas->id }}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Cek Status Virtual Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="" method="">
                <p><center>Cek Status Virtual Account <b> {{ $vas->va}}</b> </p> Atas Nama : <b> {{ $vas->nama }} </b></center></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"> <i class="fa fa-fw" aria-hidden="true" title="Copy to use times"></i> Cancel</button>
                <button type="submit" class="btn btn-success"> <i class="fa fa-search" aria-hidden="true" title="Copy to use plus-square"></i> Cek Status</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Small modal Iquiry -->
@endforeach


@foreach($va as $vas)
<!-- Small modal Delete -->
<div class="modal fade bd-example-modal-sm-delete-{{ $vas->id }}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Delete Virtual Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="hapus_infovarsuntan/{{ $vas->id }}" method="post">
            @method('delete')
            @csrf
                <p><center>Apakah anda yakin <p>"Delete Virtual Account" <b>{{ $vas->va}}</b> </p></center></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"> <i class="fa fa-fw" aria-hidden="true" title="Copy to use times"></i> Cancel</button>
                <button type="submit" class="btn btn-danger"> <i class="fa fa-fw" aria-hidden="true" title="Copy to use trash"></i> Delete</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Small modal Delete -->
@endforeach


@foreach($va as $vas)
<!-- Modal History -->
<div class="modal fade" id="exampleModalLongHistory-{{ $vas->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">History Virtual Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="position-relative row form-group"><label for="exampleText" class="col-sm-4 col-form-label">Virtual Account :</label>
                    <div class="col-sm-8 col-form-label col-form-text"><h5>{{ $vas->va }}</h5></div>
                </div>
                <div class="position-relative row form-group"><label for="exampleText" class="col-sm-4 col-form-label">Nama :</label>
                    <div class="col-sm-8 col-form-label col-form-text"><h5>{{ $vas->nama }}</h5></div>
                </div>
                <div class="position-relative row form-group"><label for="exampleText" class="col-sm-4 col-form-label">Layanan :</label>
                    <div class="col-sm-8 col-form-label col-form-text"><h5>{{ $vas->layanan }}</h5></div>
                </div>
                <div class="position-relative row form-group"><label for="exampleText" class="col-sm-4 col-form-label">Kode Layanan :</label>
                    <div class="col-sm-8 col-form-label col-form-text"><h5>{{ $vas->kodelayanan }}</h5></div>
                </div>
                <div class="position-relative row form-group"><label for="exampleText" class="col-sm-4 col-form-label">Jenis Bayar :</label>
                    <div class="col-sm-8 col-form-label col-form-text"><h5>{{ $vas->jenisbayar }}</h5></div>
                </div>
                <div class="position-relative row form-group"><label for="exampleText" class="col-sm-4 col-form-label">Kode Jenis Bayar :</label>
                    <div class="col-sm-8 col-form-label col-form-text"><h5>{{ $vas->kodejenisbyr }}</h5></div>
                </div>
                <div class="position-relative row form-group"><label for="exampleText" class="col-sm-4 col-form-label">No ID Pemesanan :</label>
                    <div class="col-sm-8 col-form-label col-form-text"><h5>{{ $vas->noid }}</h5></div>
                </div>
                <div class="position-relative row form-group"><label for="exampleText" class="col-sm-4 col-form-label">Tagihan :</label>
                    <div class="col-sm-8 col-form-label col-form-text"><h5>{{ $vas->tagihan }}</h5></div>
                </div>
                <div class="position-relative row form-group"><label for="exampleText" class="col-sm-4 col-form-label">Flag Full / Partial :</label>
                    <div class="col-sm-8 col-form-label col-form-text">
                    <h5>
                    @if($vas->flag == "F")
                       Flag Full
                    @elseif($vas->flag == "P")
                       Flag Partial
                    @endif
                    </h5>
                    </div>
                </div>
                <div class="position-relative row form-group"><label for="exampleText" class="col-sm-4 col-form-label">Expired Date :</label>
                    <div class="col-sm-8 col-form-label col-form-text"><h5>{{ $vas->expired }}</h5></div>
                </div>
                <div class="position-relative row form-group"><label for="exampleText" class="col-sm-4 col-form-label">Reserve Field :</label>
                    <div class="col-sm-8 col-form-label col-form-text"><h5>{{ $vas->reserve }}</h5></div>
                </div>
                <div class="position-relative row form-group"><label for="exampleText" class="col-sm-4 col-form-label">Description :</label>
                    <div class="col-sm-8 col-form-label col-form-text"><h5>{{ $vas->description }}</h5></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"> <i class="fa fa-fw" aria-hidden="true" title="Copy to use times"></i> Cancel</button>
                <button type="button" class="btn btn-info"> <i class="fa fa-fw" aria-hidden="true" title="Copy to use check"></i> Done</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal History -->
@endforeach
