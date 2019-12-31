<div class="app-main">
    @include('crystalline.sidebar')
    <div class="app-main__outer">
        @include('crystalline.history.search-content-history')
        @include('crystalline.footer')
    </div>
    <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
</div>
@include('petunjuk')


@foreach($search as $search)
<!-- Modal Detail -->
<div class="modal fade" id="exampleModalLongDetail-{{ $search->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
                    <div class="col-sm-8 col-form-label col-form-text"><h5>{{ $search->va }}</h5></div>
                </div>
                <div class="position-relative row form-group"><label for="exampleText" class="col-sm-4 col-form-label">Nama :</label>
                    <div class="col-sm-8 col-form-label col-form-text"><h5>{{ $search->nama }}</h5></div>
                </div>
                <div class="position-relative row form-group"><label for="exampleText" class="col-sm-4 col-form-label">Layanan :</label>
                    <div class="col-sm-8 col-form-label col-form-text"><h5>{{ $search->layanan }}</h5></div>
                </div>
                <div class="position-relative row form-group"><label for="exampleText" class="col-sm-4 col-form-label">Kode Layanan :</label>
                    <div class="col-sm-8 col-form-label col-form-text"><h5>{{ $search->kodelayanan }}</h5></div>
                </div>
                <div class="position-relative row form-group"><label for="exampleText" class="col-sm-4 col-form-label">Jenis Bayar :</label>
                    <div class="col-sm-8 col-form-label col-form-text"><h5>{{ $search->jenisbayar }}</h5></div>
                </div>
                <div class="position-relative row form-group"><label for="exampleText" class="col-sm-4 col-form-label">Kode Jenis Bayar :</label>
                    <div class="col-sm-8 col-form-label col-form-text"><h5>{{ $search->kodejenisbyr }}</h5></div>
                </div>
                <div class="position-relative row form-group"><label for="exampleText" class="col-sm-4 col-form-label">No ID Pemesanan :</label>
                    <div class="col-sm-8 col-form-label col-form-text"><h5>{{ $search->noid }}</h5></div>
                </div>
                <div class="position-relative row form-group"><label for="exampleText" class="col-sm-4 col-form-label">Tagihan :</label>
                    <div class="col-sm-8 col-form-label col-form-text"><h5>{{ $search->tagihan }}</h5></div>
                </div>
                <div class="position-relative row form-group"><label for="exampleText" class="col-sm-4 col-form-label">Flag Full / Partial :</label>
                    <div class="col-sm-8 col-form-label col-form-text">
                    <h5>
                    @if($search->flag == "F")
                       Flag Full
                    @elseif($search->flag == "P")
                       Flag Partial
                    @endif
                    </h5>
                    </div>
                </div>
                <div class="position-relative row form-group"><label for="exampleText" class="col-sm-4 col-form-label">Expired Date :</label>
                    <div class="col-sm-8 col-form-label col-form-text"><h5>{{ $search->expired }}</h5></div>
                </div>
                <div class="position-relative row form-group"><label for="exampleText" class="col-sm-4 col-form-label">Reserve Field :</label>
                    <div class="col-sm-8 col-form-label col-form-text"><h5>{{ $search->reserve }}</h5></div>
                </div>
                <div class="position-relative row form-group"><label for="exampleText" class="col-sm-4 col-form-label">Description :</label>
                    <div class="col-sm-8 col-form-label col-form-text"><h5>{{ $search->description }}</h5></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"> <i class="fa fa-fw" aria-hidden="true" title="Copy to use times"></i> Tutup</button>
                <!-- <button type="button" class="btn btn-info"> <i class="fa fa-fw" aria-hidden="true" title="Copy to use check"></i> Done</button>  -->
            </div>
        </div>
    </div>
</div>
<!-- Modal Detail -->
@endforeach
