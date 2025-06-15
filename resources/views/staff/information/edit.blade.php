@extends('staff.master')

@push('link')
    
@endpush

@section('title')
    SIAM Al-Mu'min | Edit Pengumuman
@endsection

@section('content')
   <div class="row">
    <div class="col-lg-12">
        <div class="card">
          <div class="px-4 py-3 border-bottom">
            <h4 class="card-title mb-0">Edit Pengumuman</h4>
          </div>
          <form action="" method="post">
            @csrf
            <div class="card-body">
              <div class="mb-4 row align-items-center">
                <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Judul</label>
                <div class="col-sm-9">
                  <input type="text" name="inf_title" value="{{$information->inf_title}}" class="form-control" id="exampleInputText1" placeholder="" required oninvalid="this.setCustomValidity('Judul Wajib Diisi')" 
                  onchange="this.setCustomValidity('')">
                </div>
                @error('inf_title')
                  <div>error</div>
                @enderror
              </div>

                <div class="mb-4 row align-items-center">
                    <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Konten</label>
                    <div class="col-sm-9">
                      <input type="textarea" name="inf_content" value="{{$information->inf_content}}" class="form-control" id="exampleInputText1" placeholder="" required oninvalid="this.setCustomValidity('Konten Wajib Diisi')" 
                      onchange="this.setCustomValidity('')">
                    </div>
                    @error('inf_content')
                      <div>error</div>
                    @enderror
                  </div>

                <div class="row">
                  <div class="col-sm-3"></div>
                  <div class="col-sm-9">
                    <input type="submit" class="btn btn-primary" value="Kirim" id="">
                  </div>
                </div>
              </div>
          </form>
          
        </div>
      </div>
   </div>
    
@endsection



@push('script')
    
@endpush