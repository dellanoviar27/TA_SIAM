@extends('staff.master_student')

@push('link')
    
@endpush

@section('title')
    SIAM Al-Mu'min | Data Orangtua Siswa
@endsection

@section('content')
   <div class="row">
    <div class="col-lg-12">
        <div class="card">
          <div class="px-4 py-3 border-bottom">
            <h4 class="card-title mb-0">Data Orangtua Siswa</h4>
          </div>
          <form action="{{ route('store_with_parent')}}" method="post">
            @csrf
            <div class="card-body">

                <div class="mb-4 row align-items-center">
                  <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Nama Ayah</label>
                  <div class="col-sm-9">
                    <input type="text" name="prt_father" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Nama Ayah Wajib Diisi')" 
                    onchange="this.setCustomValidity('')">
                  </div>
                  @error('prt_father')
                    <dsdt>error</dsdt>
                  @enderror
                </div>

                <div class="mb-4 row align-items-center">
                  <label for="exampleInputText1" class="form-label col-sm-3 col-form-label">Status Ayah</label>
                  <div class="col-sm-9">
                    <select class ="form-select mr-sm-2" id="inLineFormCustomSelect" name="prt_status_father" oninvalid="this.setCustomValidity ('Status Ayah Wajib Diisi')"
                    onchange="this.setCustomValidity('')" required>
                        <option selected value="">Pilih...</option>
                        <option value="Hidup">Hidup</option>
                        <option value="Meninggal">Meninggal</option>
                    </select>
                  </div>
                  @error('prt_status_father')
                    <div>error</div>
                  @enderror
                </div>

                  <div class="mb-4 row align-items-center">
                    <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Alamat Ayah</label>
                    <div class="col-sm-9">
                      <input type="text" name="prt_address_father" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Alamat Ayah Wajib Diisi')" 
                      onchange="this.setCustomValidity('')">
                    </div>
                    @error('prt_address_father')
                      <div>error</div>
                    @enderror
                  </div>

                  <div class="mb-4 row align-items-center">
                    <label for="exampleInputText1" class="form-label col-sm-3 col-form-label">Pekerjaan Ayah</label>
                    <div class="col-sm-9">
                      <select class ="form-select mr-sm-2" id="inLineFormCustomSelect" name="prt_job_father" oninvalid="this.setCustomValidity ('Pekerjaan Ayah Wajib Diisi')"
                      onchange="this.setCustomValidity('')" required>
                          <option selected value="">Pilih...</option>
                          <option value="PNS">PNS</option>
                          <option value="Pegawai Swasta">Pegawai Swasta</option>
                          <option value="TNI">TNI</option>
                          <option value="POLRI">POLRI</option>
                          <option value="wirausaha">Wirausaha</option>
                          <option value="Buruh">Buruh</option>
                          <option value="Lain-lain">Tidak Bekerja</option>
                          <option value="Lain-lain">Lain-lain</option>
                      </select>
                    </div>
                    @error('prt_job_father')
                      <div>error</div>
                    @enderror
                  </div>

                  <div class="mb-4 row align-items-center">
                    <label for="exampleInputText1" class="form-label col-sm-3 col-form-label">Penghasilan Ayah</label>
                    <div class="col-sm-9">
                      <select class ="form-select mr-sm-2" id="inLineFormCustomSelect" name="prt_income_father" oninvalid="this.setCustomValidity ('Penghasilan Ayah Wajib Diisi')"
                      onchange="this.setCustomValidity('')" required>
                          <option selected value="">Pilih...</option>
                          <option value="0">0</option>
                          <option value="<1.000.000">< 1.000.000 </option>
                          <option value="1.000.000 - 3.000.000">1.000.000 - 3.000.000</option>
                          <option value="3.000.000 - 5.000.000">3.000.000 - 5.000.000</option>
                          <option value=">5.000.000">> 5.000.000</option>
                      </select>
                    </div>
                    @error('prt_income_father')
                      <div>error</div>
                    @enderror
                  </div>

                  <div class="mb-4 row align-items-center">
                    <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Nama Ibu</label>
                    <div class="col-sm-9">
                      <input type="text" name="prt_mother" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Nama Lengkap Ibu Wajib Diisi')" 
                      onchange="this.setCustomValidity('')">
                    </div>
                    @error('prt_mother')
                      <div>error</div>
                    @enderror
                  </div>
  
                  <div class="mb-4 row align-items-center">
                    <label for="exampleInputText1" class="form-label col-sm-3 col-form-label">Status Ibu</label>
                    <div class="col-sm-9">
                      <select class ="form-select mr-sm-2" id="inLineFormCustomSelect" name="prt_status_mother" oninvalid="this.setCustomValidity ('Status Ibu Wajib Diisi')"
                      onchange="this.setCustomValidity('')" required>
                          <option selected value="">Pilih...</option>
                          <option value="Hidup">Hidup</option>
                          <option value="Meninggal">Meninggal</option>
                      </select>
                    </div>
                    @error('prt_status_mother')
                      <div>error</div>
                    @enderror
                  </div>
  
                    <div class="mb-4 row align-items-center">
                      <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Alamat Ibu</label>
                      <div class="col-sm-9">
                        <input type="text" name="prt_address_mother" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Alamat Ibu Wajib Diisi')" 
                        onchange="this.setCustomValidity('')">
                      </div>
                      @error('prt_address_mother')
                        <div>error</div>
                      @enderror
                    </div>
  
                    <div class="mb-4 row align-items-center">
                      <label for="exampleInputText1" class="form-label col-sm-3 col-form-label">Pekerjaan Ibu</label>
                      <div class="col-sm-9">
                        <select class ="form-select mr-sm-2" id="inLineFormCustomSelect" name="prt_job_mother" oninvalid="this.setCustomValidity ('Pekerjaan Ibu Wajib Diisi')"
                        onchange="this.setCustomValidity('')" required>
                            <option selected value="">Pilih...</option>
                            <option value="PNS">PNS</option>
                            <option value="Pegawai Swasta">Pegawai Swasta</option>
                            <option value="TNI">TNI</option>
                            <option value="POLRI">POLRI</option>
                            <option value="wirausaha">Wirausaha</option>
                            <option value="Buruh">Buruh</option>
                            <option value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>
                            <option value="Tidak Bekerja">Tidak Bekerja</option>
                            <option value="Lain-lain">Lain-lain</option>
                        </select>
                      </div>
                      @error('prt_job_mother')
                        <div>error</div>
                      @enderror
                    </div>
  
                    <div class="mb-4 row align-items-center">
                      <label for="exampleInputText1" class="form-label col-sm-3 col-form-label">Penghasilan Ibu</label>
                      <div class="col-sm-9">
                        <select class ="form-select mr-sm-2" id="inLineFormCustomSelect" name="prt_income_mother" oninvalid="this.setCustomValidity ('Penghasilan Ibu Wajib Diisi')"
                        onchange="this.setCustomValidity('')" required>
                            <option selected value="">Pilih...</option>
                            <option value="0">0</option>
                            <option value="<1.000.000">< 1.000.000 </option>
                            <option value="1.000.000 - 3.000.000">1.000.000 - 3.000.000</option>
                            <option value="3.000.000 - 5.000.000">3.000.000 - 5.000.000</option>
                            <option value=">5.000.000">> 5.000.000</option>
                        </select>
                      </div>
                      @error('prt_income_mother')
                        <div>error</div>
                      @enderror
                    </div>

                    <div class="mb-4 row align-items-center">
                      <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Nama Wali (Optional)</label>
                      <div class="col-sm-9">
                        <input type="text" name="prt_guardian" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Nama Wali Umum Wajib Diisi')" 
                        onchange="this.setCustomValidity('')">
                      </div>
                      @error('prt_guardian')
                        <div>error</div>
                      @enderror
                    </div>
    
                      <div class="mb-4 row align-items-center">
                        <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Alamat Wali (Optional)</label>
                        <div class="col-sm-9">
                          <input type="text" name="prt_address_guardian" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Alamat Wali Wajib Diisi')" 
                          onchange="this.setCustomValidity('')">
                        </div>
                        @error('prt_address_guardian')
                          <div>error</div>
                        @enderror
                      </div>
    
                      <div class="mb-4 row align-items-center">
                        <label for="exampleInputText1" class="form-label col-sm-3 col-form-label">Pekerjaan Wali (Optional)</label>
                        <div class="col-sm-9">
                          <select class ="form-select mr-sm-2" id="inLineFormCustomSelect" name="prt_job_guardian" oninvalid="this.setCustomValidity ('Pekerjaan Wali Wajib Diisi')"
                          onchange="this.setCustomValidity('')" required>
                              <option selected value="">Pilih...</option>
                              <option value="PNS">PNS</option>
                              <option value="Pegawai Swasta">Pegawai Swasta</option>
                              <option value="TNI">TNI</option>
                              <option value="POLRI">POLRI</option>
                              <option value="wirausaha">Wirausaha</option>
                              <option value="Buruh">Buruh</option>
                              <option value="Buruh">Tidak Bekerja</option>
                              <option value="Lain-lain">Lain-lain</option>
                          </select>
                        </div>
                        @error('prt_job_guardian')
                          <div>error</div>
                        @enderror
                      </div>
    
                      <div class="mb-4 row align-items-center">
                        <label for="exampleInputText1" class="form-label col-sm-3 col-form-label">Penghasilan Wali (Optional)</label>
                        <div class="col-sm-9">
                          <select class ="form-select mr-sm-2" id="inLineFormCustomSelect" name="prt_income_guardian" oninvalid="this.setCustomValidity ('Penghasilan Wali Wajib Diisi')"
                          onchange="this.setCustomValidity('')" required>
                              <option selected value="">Pilih...</option>
                              <option value="0">0</option>
                              <option value="<1.000.000">< 1.000.000 </option>
                              <option value="1.000.000 - 3.000.000">1.000.000 - 3.000.000</option>
                              <option value="3.000.000 - 5.000.000">3.000.000 - 5.000.000</option>
                              <option value=">5.000.000">> 5.000.000</option>
                          </select>
                        </div>
                        @error('prt_income_guardian')
                          <div>error</div>
                        @enderror
                      </div>

                  <div class="mb-4 row align-items-center">
                    <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">No. HP Orang tua</label>
                    <div class="col-sm-9">
                      <input type="tel" name="prt_parent_phone" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('No. HP Orang tua Wajib Diisi')" 
                      onchange="this.setCustomValidity('')">
                    </div>
                    @error('prt_parent_phone')
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