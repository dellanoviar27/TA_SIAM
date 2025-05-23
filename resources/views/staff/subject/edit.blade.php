@extends('staff.master')

@push('link')
    
@endpush

@section('title')
    SIAM Al-Mu'min | Edit Mata Pelajaran
@endsection

@section('content')
   <div class="row">
    <div class="col-lg-12">
        <div class="card">
          <div class="px-4 py-3 border-bottom">
            <h4 class="card-title mb-0">Edit Pelajaran</h4>
          </div>
          <form action="" method="post">
            @csrf
            <div class="card-body">
              <div class="mb-4 row align-items-center">
                <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Kode</label>
                <div class="col-sm-9">
                  <input type="text" name="sbj_code" value="{{$Subject->sbj_code}}" class="form-control" id="exampleInputText1" placeholder="" required oninvalid="this.setCustomValidity('Kode Wajib Diisi')" 
                  onchange="this.setCustomValidity('')">
                </div>
                @error('sbj_code')
                  <div>error</div>
                @enderror
              </div>

                <div class="mb-4 row align-items-center">
                  <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Nama Mata Pelajaran</label>
                  <div class="col-sm-9">
                    <input type="text" name="sbj_name" value="{{$Subject->sbj_name}}" class="form-control" id="exampleInputText1" placeholder="" required oninvalid="this.setCustomValidity('Mata Pelajaran Wajib Diisi')" 
                    onchange="this.setCustomValidity('')">
                  </div>
                  @error('sbj_name')
                    <div>error</div>
                  @enderror
                </div>

                <div class="mb-4 row align-items-center">
                    <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">KKM</label>
                    <div class="col-sm-9">
                      <input type="text" name="sbj_kkm" value="{{$Subject->sbj_kkm}}" class="form-control" id="exampleInputText1" placeholder="" required oninvalid="this.setCustomValidity('KKM Wajib Diisi')" 
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
                    {{-- <option hidden  value="{{$Semester->semester->smt_id}}">{{$Semester->semester->smt_semester}}</option> --}}
                    @foreach ($Semester as $Semester)
                      <option value="{{$Semester->smt_id}}">{{$Semester->smt_semester}}</option>
                    @endforeach
                    </select>
                    @error('sch_semester_id')
                        <div id="sch_id" class="form-text">{{ $message }}</div>
                    @enderror
                    </div>
                </div>

                  {{-- <div class="mb-4 row align-items-center">
                    <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Semester</label>
                    <div class="col-sm-9">
                      <input type="text" name="sbj_semester" value="{{$Subject->sbj_semester}}" class="form-control" id="exampleInputText1" placeholder="" required oninvalid="this.setCustomValidity('Semester Wajib Diisi')" 
                      onchange="this.setCustomValidity('')">
                    </div>
                    @error('sbj_semester')
                      <div>error</div>
                    @enderror
                  </div> --}}

                  {{-- <div class="mb-4 row align-items-center">
                    <label for="exampleInputText1" class="form-label col-sm-3 col-form-label">Semester</label>
                    <div class="col-sm-9">
                      <select class ="form-select mr-sm-2" id="inLineFormCustomSelect" name="sbj_semester"  oninvalid="this.setCustomValidity ('Semester Wajib Diisi')"
                      onchange="this.setCustomValidity('')" required>
                      @if ($Subject->sbj_semester == "Ganjil")
                      <option value="Ganjil">Ganjil</option>
                      <option value="Genap">Genap</option>
                      @else
                      <option value="Ganjil">Ganjil</option>
                      <option value="Genap">Genap</option>
                      @endif
                      </select>
                    </div>
                    @error('sbj_semester')
                      <div>error</div>
                    @enderror
                  </div> --}}

                {{-- <div class="mb-4 row align-items-center">
                  <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Wali Kelas</label>
                  <div class="col-sm-9">
                    <input type="text" name="cls_homeroom" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Singkatan Wajib Diisi')" 
                    onchange="this.setCustomValidity('')">
                  </div>
                  @error('cls_homeroom')
                    <div>error</div>
                  @enderror
                </div> --}}
                
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