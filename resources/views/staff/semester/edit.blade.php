@extends('staff.master')

@push('link')
    
@endpush

@section('title')
    Edit Semester | SIAM Al-Mu'min
@endsection

@section('content')
   <div class="row">
    <div class="col-lg-12">
        <div class="card">
          <div class="px-4 py-3 border-bottom">
            <h4 class="card-title mb-0">Edit Semester</h4>
          </div>
          <form action="" method="post">
            @csrf
            <div class="card-body">

                <div class="mb-4 row align-items-center">
                  <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Semester</label>
                  <div class="col-sm-9">
                    <input type="text" name="smt_semester" value="{{$Semester->smt_semester}}" class="form-control" id="exampleInputText1" placeholder="" required oninvalid="this.setCustomValidity('Semester Wajib Diisi')" 
                    onchange="this.setCustomValidity('')">
                  </div>
                  @error('smt_semester')
                    <div>error</div>
                  @enderror
                </div>

                <div class="mb-4 row align-items-center">
                    <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Tahun Ajaran</label>
                    <div class="col-sm-9">
                      <input type="text" name="smt_school_year" value="{{$Semester->smt_school_year}}" class="form-control" id="exampleInputText1" placeholder="" required oninvalid="this.setCustomValidity('Tahun Ajaran Wajib Diisi')" 
                      onchange="this.setCustomValidity('')">
                    </div>
                    @error('smt_school_year')
                      <div>error</div>
                    @enderror
                  </div>
                
                <div class="row">
                  <div class="col-sm-3"></div>
                  <div class="col-sm-9">
                    <input type="submit" class="btn btn-primary me-2" value="Kirim">
                    <input type="button" class="btn btn-danger" value="Batal" onclick="history.back();">
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