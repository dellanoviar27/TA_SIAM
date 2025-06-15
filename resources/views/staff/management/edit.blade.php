@extends('staff.master')

@push('link')
    
@endpush

@section('title')
    SIAM Al-Mu'min | Edit Staf
@endsection

@section('content')
   <div class="row">
    <div class="col-lg-12">
        <div class="card">
          <div class="px-4 py-3 border-bottom">
            <h4 class="card-title mb-0">Edit Staf</h4>
          </div>
          <form action="" method="post">
            @csrf
            <div class="card-body">

              <div class="mb-4 row align-items-center">
                <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">NIK</label>
                <div class="col-sm-9">
                  <input type="number" name="stf_nik" value="{{$staff->stf_nik}}" class="form-control" id="exampleInputText1" placeholder="" required oninvalid="this.setCustomValidity('NIK Wajib Diisi')" 
                  onchange="this.setCustomValidity('')">
                </div>
                @error('stf_nik')
                  <div>error</div>
                @enderror
              </div>

                <div class="mb-4 row align-items-center">
                    <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Nama</label>
                    <div class="col-sm-9">
                      <input type="text" name="stf_name" value="{{$staff->stf_name}}" class="form-control" id="exampleInputText1" placeholder="" required oninvalid="this.setCustomValidity('Nama Wajib Diisi')" 
                      onchange="this.setCustomValidity('')">
                    </div>
                    @error('stf_name')
                      <div>error</div>
                    @enderror
                  </div>

                <div class="mb-4 row align-items-center">
                  <label for="exampleInputText1" class="form-label col-sm-3 col-form-label">Jenis Kelamin</label>
                  <div class="col-sm-9">
                    <select class ="form-select mr-sm-2" id="inLineFormCustomSelect" name="stf_gender"  oninvalid="this.setCustomValidity ('Jenis Kelamin Wajib Diisi')"
                    onchange="this.setCustomValidity('')" required>
                    @if ($staff->stf_gender == "Perempuan")
                    <option value="Perempuan">Perempuan</option>
                    <option value="Laki-laki">Laki-laki</option>
                    @else
                    <option value="Perempuan">Perempuan</option>
                    <option value="Laki-laki">Laki-laki</option>
                    @endif
                    </select>
                  </div>
                  @error('stf_gender')
                    <div>error</div>
                  @enderror
                </div>

                <div class="mb-4 row align-items-center">
                    <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Tempat Lahir</label>
                    <div class="col-sm-9">
                      <input type="text" name="stf_birth_place" value="{{$staff->stf_birth_place}}" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Tempat Lahir Kelas Wajib Diisi')" 
                      onchange="this.setCustomValidity('')">
                    </div>
                    @error('stf_birth_place')
                      <div>error</div>
                    @enderror
                  </div>

                  <div class="mb-4 row align-items-center">
                    <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Tanggal Lahir</label>
                    <div class="col-sm-9">
                      <input type="date" name="stf_birth_date" value="{{$staff->stf_birth_date}}" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Tanggal Lahir Wajib Diisi')" 
                      onchange="this.setCustomValidity('')">
                    </div>
                    @error('stf_birth_date')
                      <div>error</div>
                    @enderror
                  </div>

                  <div class="mb-4 row align-items-center">
                    <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Alamat</label>
                    <div class="col-sm-9">
                      <input type="text" name="stf_address" value="{{$staff->stf_address}}" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Alamat Wajib Diisi')" 
                      onchange="this.setCustomValidity('')">
                    </div>
                    @error('stf_address')
                      <div>error</div>
                    @enderror
                  </div>

                  <div class="mb-4 row align-items-center">
                    <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">No. HP</label>
                    <div class="col-sm-9">
                      <input type="tel" name="stf_phone" value="{{$staff->stf_phone}}" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Telpon Wajib Diisi')" 
                      onchange="this.setCustomValidity('')">
                    </div>
                    @error('stf_phone')
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