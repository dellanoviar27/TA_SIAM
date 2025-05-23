@extends('staff.master')

@push('link')
    
@endpush

@section('title')
    SIAM Al-Mu'min | Tambah Kelas
@endsection

@section('content')
   <div class="row">
    <div class="col-lg-12">
        <div class="card">
          <div class="px-4 py-3 border-bottom">
            <h4 class="card-title mb-0">Tambah Kelas</h4>
          </div>
          <form action="" method="post">
            @csrf
            <div class="card-body">
                <div class="mb-4 row align-items-center">
                  <label for="exampleInputText1" class="form-label col-sm-3 col-form-label">Tingkatan Kelas</label>
                  <div class="col-sm-9">
                    <select class ="form-select mr-sm-2" id="inLineFormCustomSelect" name="cls_level" oninvalid="this.setCustomValidity ('Tingkatan Wajib Diisi')"
                    onchange="this.setCustomValidity('')" required>
                        <option selected value="">Pilih...</option>
                        <option value="Idadiyah">Idadiyah</option>
                        <option value="Awwaliyah">Awwaliyah</option>
                        <option value="Wustho">Wustho</option>
                        <option value="Ula">Ula</option>
                    </select>
                  </div>
                  @error('cls_level')
                    <div>error</div>
                  @enderror
                </div>

                <div class="mb-4 row align-items-center">
                  <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Nomor Kelas</label>
                  <div class="col-sm-9">
                    <input type="text" name="cls_number" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Nomor Kelas Wajib Diisi')" 
                    onchange="this.setCustomValidity('')">
                  </div>
                  @error('cls_number')
                    <div>error</div>
                  @enderror
                </div>

                <div class="mb-4 row align-items-center">
                  <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Kelas Umum</label>
                  <div class="col-sm-9">
                    <input type="text" name="cls_general_level" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Kelas Umum Wajib Diisi')" 
                    onchange="this.setCustomValidity('')">
                  </div>
                  @error('cls_general_level')
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