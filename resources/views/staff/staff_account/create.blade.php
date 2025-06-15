@extends('staff.master')

@push('link')
    
@endpush

@section('title')
    SIAM Al-Mu'min | Tambah Staf
@endsection

@section('content')
   <div class="row">
    <div class="col-lg-12">
        <div class="card">
          <div class="px-4 py-3 border-bottom">
            <h4 class="card-title mb-0">Tambah Staf</h4>
          </div>
          <form action="" method="post">
            @csrf
            <div class="card-body">

                <div class="mb-4 row align-items-center">
                <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Nama Lengkap</label>
                <div class="col-sm-9">
                  <input type="text" name="name" class="form-control" value="{{ old('name') }}" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Nama Wajib Diisi')" 
                  onchange="this.setCustomValidity('')">
                </div>
                @error('name')
                  <div>error</div>
                @enderror
              </div>

                <div class="mb-4 row align-items-center">
                  <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Email</label>
                  <div class="col-sm-9">
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Email Wajib Diisi')" 
                    onchange="this.setCustomValidity('')">
                  </div>
                  @error('email')
                    <div>error</div>
                  @enderror
                </div>

               <div class="mb-4 row align-items-center">
                  <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Password</label>
                  <div class="col-sm-9">
                    <input type="password" name="password" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Password Wajib Diisi')" 
                    onchange="this.setCustomValidity('')">
                  </div>
                  @error('password')
                    <div>error</div>
                  @enderror
                </div>

                <div class="mb-4 row align-items-center">
                  <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Konfirmasi Password</label>
                  <div class="col-sm-9">
                    <input type="password" name="password_confirmation" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Password Wajib Diisi')" 
                    onchange="this.setCustomValidity('')">
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