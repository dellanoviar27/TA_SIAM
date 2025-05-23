@extends('staff.master')

@push('link')
    
@endpush

@section('title')
    SIAM Al-Mu'min | Tambah Mata Pelajaran
@endsection

@section('content')
   <div class="row">
    <div class="col-lg-12">
        <div class="card">
          <div class="px-4 py-3 border-bottom">
            <h4 class="card-title mb-0">Tambah Pelajaran</h4>
          </div>
          <form action="" method="post">
            @csrf
            <div class="card-body">

                <div class="mb-4 row align-items-center">
                    <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Kode Mata Pelajaran</label>
                    <div class="col-sm-9">
                      <input type="text" name="sbj_code" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Kode Wajib Diisi')" 
                      onchange="this.setCustomValidity('')">
                    </div>
                    @error('sbj_code')
                      <div>error</div>
                    @enderror
                  </div>

                  <div class="mb-4 row align-items-center">
                    <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Nama Mata Pelajaran</label>
                    <div class="col-sm-9">
                      <input type="text" name="sbj_name" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Mata Pelajaran Wajib Diisi')" 
                      onchange="this.setCustomValidity('')">
                    </div>
                    @error('sbj_name')
                      <div>error</div>
                    @enderror
                  </div>

                  <div class="mb-4 row align-items-center">
                    <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">KKM</label>
                    <div class="col-sm-9">
                      <input type="text" name="sbj_kkm" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('KKM  Wajib Diisi')" 
                      onchange="this.setCustomValidity('')">
                    </div>
                    @error('sbj_kkm')
                      <div>error</div>
                    @enderror
                  </div>

                  <div class="mb-4 row align-items-center">
                    <label for="Select" class="form-label col-sm-3 col-form-label">Semester</label>
                    <div class="col-sm-9">
                    <select id="Select" name="smt_id" class="form-control" required>
                    <option hidden  value="">Pilih Semester</option>
                    @foreach ($Semester as  $Semester)
                      <option value="{{ $Semester->smt_id }}">{{ $Semester->smt_semester }}</option>
                    @endforeach
                    </select>
                    @error('sbj_semester_id')
                        <div id="sbj_id" class="form-text">{{ $message }}</div>
                    @enderror
                    </div>
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