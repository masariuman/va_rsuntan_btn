@if (Session::has('Berhasil'))
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
                {{ (Session::get('Berhasil')) }}
              </div>
@endif



@if (Session::has('Gagal'))
              <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Gagal!</h4>
                {{ (Session::get('Gagal')) }}
              </div>   
@endif