@extends('staff.master')

@push('link')
    
@endpush

@section('title')
    SIAM Al-Mu'min | Tambah Siswa
@endsection

@section('content')
   <div class="row">
    <div class="col-lg-12">
        <div class="card">
          <div class="px-4 py-3 border-bottom">
            <h4 class="card-title mb-0">Tambah Siswa</h4>
          </div>
          <form action="" method="post">
            @csrf
            <div class="card-body">
              <div class="mb-4 row align-items-center">
                <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">NIK</label>
                <div class="col-sm-9">
                  <input type="number" name="std_nik" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('NIK Wajib Diisi')" 
                  onchange="this.setCustomValidity('')">
                </div>
                @error('std_nik')
                  <div>error</div>
                @enderror
              </div>

              <div class="mb-4 row align-items-center">
                <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Nama Lengkap</label>
                <div class="col-sm-9">
                  <input type="text" name="std_name" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Nama Wajib Diisi')" 
                  onchange="this.setCustomValidity('')">
                </div>
                @error('std_name')
                  <div>error</div>
                @enderror
              </div>

              <div class="mb-4 row align-items-center">
                <label for="exampleInputText1" class="form-label col-sm-3 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-9">
                  <select class ="form-select mr-sm-2" id="inLineFormCustomSelect" name="std_gender" oninvalid="this.setCustomValidity ('Jenis Kelamin Wajib Diisi')"
                  onchange="this.setCustomValidity('')" required>
                      <option selected value="">Pilih...</option>
                      <option value="Perempuan">Perempuan</option>
                      <option value="Laki-laki">Laki-laki</option>
                  </select>
                </div>
                @error('std_gender')
                  <div>error</div>
                @enderror
              </div>

              <div class="mb-4 row align-items-center">
                <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Tempat Lahir</label>
                <div class="col-sm-9">
                  <input type="text" name="std_place_of_birth" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Tempat Lahir Kelas Wajib Diisi')" 
                  onchange="this.setCustomValidity('')">
                </div>
                @error('std_place_of_birth')
                  <div>error</div>
                @enderror
              </div>

              <div class="mb-4 row align-items-center">
                  <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Tanggal Lahir</label>
                  <div class="col-sm-9">
                    <input type="date" name="pds_date_of_birth" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Tanggal Lahir Wajib Diisi')" 
                    onchange="this.setCustomValidity('')">
                  </div>
                  @error('pds_date_of_birth')
                    <div>error</div>
                  @enderror
                </div>

                <div class="mb-4 row align-items-center">
                  <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Anak Ke</label>
                  <div class="col-sm-9">
                    <input type="text" name="std_child_to" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Anak Ke Wajib Diisi')" 
                    onchange="this.setCustomValidity('')">
                  </div>
                  @error('std_child_to')
                    <div>error</div>
                  @enderror
                </div>

                <div class="mb-4 row align-items-center">
                  <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Jumlah Saudara</label>
                  <div class="col-sm-9">
                    <input type="text" name="std_number_of_siblings" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('RW Wajib Diisi')" 
                    onchange="this.setCustomValidity('')">
                  </div>
                  @error('std_number_of_siblings')
                    <div>error</div>
                  @enderror
                </div>

                <div class="mb-4 row align-items-center">
                  <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Alamat</label>
                  <div class="col-sm-9">
                    <input type="text" name="std_address" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Alamat Wajib Diisi')" 
                    onchange="this.setCustomValidity('')">
                  </div>
                  @error('std_address')
                    <div>error</div>
                  @enderror
                </div>

                <div class="mb-4 row align-items-center">
                    <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Tanggal Masuk</label>
                    <div class="col-sm-9">
                      <input type="date" name="std_date_registration" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Tanggal Masuk Wajib Diisi')" 
                      onchange="this.setCustomValidity('')">
                    </div>
                    @error('std_date_registration')
                      <div>error</div>
                    @enderror
                  </div>

                  <div class="mb-4 row align-items-center">
                    <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Nama Sekolah</label>
                    <div class="col-sm-9">
                      <input type="text" name="std_school" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Nomor Kartu Keluarga Wajib Diisi')" 
                      onchange="this.setCustomValidity('')">
                    </div>
                    @error('std_school')
                      <div>error</div>
                    @enderror
                  </div>

                  <div class="mb-4 row align-items-center">
                    <label for="Select" class="form-label col-sm-3 col-form-label">Kelas</label>
                    <div class="col-sm-9">
                    <select id="Select" name="cls_id" class="form-control" required>
                    <option hidden  value="">Pilih Kelas</option>
                    @foreach ($classes as  $Classes)
                      <option value="{{ $Classes->cls_id }}">{{ $Classes->cls_level }} {{ $Classes->cls_number }} {{ $Classes->cls_general_level }}</option>
                    @endforeach
                    </select>
                    @error('std_class_id')
                        <div id="std_id" class="form-text">{{ $message }}</div>
                    @enderror
                    </div>
                </div>

                <div class="mb-4 row align-items-center">
                  <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">NISN</label>
                  <div class="col-sm-9">
                    <input type="number" name="std_nisn" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('NISN Wajib Diisi')" 
                    onchange="this.setCustomValidity('')">
                  </div>
                  @error('std_nisn')
                    <div>error</div>
                  @enderror
                </div>

                <div class="mb-4 row align-items-center">
                  <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Nama Ayah</label>
                  <div class="col-sm-9">
                    <input type="text" name="std_father" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Nama Ayah Umum Wajib Diisi')" 
                    onchange="this.setCustomValidity('')">
                  </div>
                  @error('std_father')
                    <div>error</div>
                  @enderror
                </div>

                <div class="mb-4 row align-items-center">
                  <label for="exampleInputText1" class="form-label col-sm-3 col-form-label">Status Ayah</label>
                  <div class="col-sm-9">
                    <select class ="form-select mr-sm-2" id="inLineFormCustomSelect" name="std_status_father" oninvalid="this.setCustomValidity ('Status Ayah Wajib Diisi')"
                    onchange="this.setCustomValidity('')" required>
                        <option selected value="">Pilih...</option>
                        <option value="Hidup">Hidup</option>
                        <option value="Meninggal">Meninggal</option>
                    </select>
                  </div>
                  @error('std_status_father')
                    <div>error</div>
                  @enderror
                </div>

                  <div class="mb-4 row align-items-center">
                    <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Alamat Ayah</label>
                    <div class="col-sm-9">
                      <input type="text" name="std_address_father" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Alamat Ayah Wajib Diisi')" 
                      onchange="this.setCustomValidity('')">
                    </div>
                    @error('std_address_father')
                      <div>error</div>
                    @enderror
                  </div>

                  <div class="mb-4 row align-items-center">
                    <label for="exampleInputText1" class="form-label col-sm-3 col-form-label">Pekerjaan Ayah</label>
                    <div class="col-sm-9">
                      <select class ="form-select mr-sm-2" id="inLineFormCustomSelect" name="std_status_father" oninvalid="this.setCustomValidity ('Pekerjaan Ayah Wajib Diisi')"
                      onchange="this.setCustomValidity('')" required>
                          <option selected value="">Pilih...</option>
                          <option value="PNS">PNS</option>
                          <option value="Pegawai Swasta">Pegawai Swasta</option>
                          <option value="TNI">TNI</option>
                          <option value="POLRI">POLRI</option>
                          <option value="wirausaha">Wirausaha</option>
                          <option value="Buruh">Buruh</option>
                          <option value="Lain-lain">Lain-lain</option>
                      </select>
                    </div>
                    @error('std_status_father')
                      <div>error</div>
                    @enderror
                  </div>

                  <div class="mb-4 row align-items-center">
                    <label for="exampleInputText1" class="form-label col-sm-3 col-form-label">Penghasilan Ayah</label>
                    <div class="col-sm-9">
                      <select class ="form-select mr-sm-2" id="inLineFormCustomSelect" name="std_status_father" oninvalid="this.setCustomValidity ('Penghasilan Ayah Wajib Diisi')"
                      onchange="this.setCustomValidity('')" required>
                          <option selected value="">Pilih...</option>
                          <option value="0">0</option>
                          <option value="<1.000.000">< 1.000.000 </option>
                          <option value="1.000.000 - 3.000.000">1.000.000 - 3.000.000</option>
                          <option value="3.000.000 - 5.000.000">3.000.000 - 5.000.000</option>
                          <option value=">5.000.000">> 5.000.000</option>
                      </select>
                    </div>
                    @error('std_status_father')
                      <div>error</div>
                    @enderror
                  </div>

                  <div class="mb-4 row align-items-center">
                    <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Nama Ibu</label>
                    <div class="col-sm-9">
                      <input type="text" name="std_mother" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Nama Ibu Umum Wajib Diisi')" 
                      onchange="this.setCustomValidity('')">
                    </div>
                    @error('std_mother')
                      <div>error</div>
                    @enderror
                  </div>
  
                  <div class="mb-4 row align-items-center">
                    <label for="exampleInputText1" class="form-label col-sm-3 col-form-label">Status Ibu</label>
                    <div class="col-sm-9">
                      <select class ="form-select mr-sm-2" id="inLineFormCustomSelect" name="std_status_mother" oninvalid="this.setCustomValidity ('Status Ibu Wajib Diisi')"
                      onchange="this.setCustomValidity('')" required>
                          <option selected value="">Pilih...</option>
                          <option value="Hidup">Hidup</option>
                          <option value="Meninggal">Meninggal</option>
                      </select>
                    </div>
                    @error('std_status_mother')
                      <div>error</div>
                    @enderror
                  </div>
  
                    <div class="mb-4 row align-items-center">
                      <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Alamat Ibu</label>
                      <div class="col-sm-9">
                        <input type="text" name="std_address_mother" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Alamat Ibu Wajib Diisi')" 
                        onchange="this.setCustomValidity('')">
                      </div>
                      @error('std_address_mother')
                        <div>error</div>
                      @enderror
                    </div>
  
                    <div class="mb-4 row align-items-center">
                      <label for="exampleInputText1" class="form-label col-sm-3 col-form-label">Pekerjaan Ibu</label>
                      <div class="col-sm-9">
                        <select class ="form-select mr-sm-2" id="inLineFormCustomSelect" name="std_status_mother" oninvalid="this.setCustomValidity ('Pekerjaan Ibu Wajib Diisi')"
                        onchange="this.setCustomValidity('')" required>
                            <option selected value="">Pilih...</option>
                            <option value="PNS">PNS</option>
                            <option value="Pegawai Swasta">Pegawai Swasta</option>
                            <option value="TNI">TNI</option>
                            <option value="POLRI">POLRI</option>
                            <option value="wirausaha">Wirausaha</option>
                            <option value="Buruh">Buruh</option>
                            <option value="Lain-lain">Lain-lain</option>
                        </select>
                      </div>
                      @error('std_status_mother')
                        <div>error</div>
                      @enderror
                    </div>
  
                    <div class="mb-4 row align-items-center">
                      <label for="exampleInputText1" class="form-label col-sm-3 col-form-label">Penghasilan Ibu</label>
                      <div class="col-sm-9">
                        <select class ="form-select mr-sm-2" id="inLineFormCustomSelect" name="std_status_father" oninvalid="this.setCustomValidity ('Penghasilan Ibu Wajib Diisi')"
                        onchange="this.setCustomValidity('')" required>
                            <option selected value="">Pilih...</option>
                            <option value="0">0</option>
                            <option value="<1.000.000">< 1.000.000 </option>
                            <option value="1.000.000 - 3.000.000">1.000.000 - 3.000.000</option>
                            <option value="3.000.000 - 5.000.000">3.000.000 - 5.000.000</option>
                            <option value=">5.000.000">> 5.000.000</option>
                        </select>
                      </div>
                      @error('std_status_father')
                        <div>error</div>
                      @enderror
                    </div>

                    <div class="mb-4 row align-items-center">
                      <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Nama Wali</label>
                      <div class="col-sm-9">
                        <input type="text" name="std_guardian" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Nama Wali Umum Wajib Diisi')" 
                        onchange="this.setCustomValidity('')">
                      </div>
                      @error('std_guardian')
                        <div>error</div>
                      @enderror
                    </div>
    
                      <div class="mb-4 row align-items-center">
                        <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Alamat Wali</label>
                        <div class="col-sm-9">
                          <input type="text" name="std_address_guardian" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Alamat Wali Wajib Diisi')" 
                          onchange="this.setCustomValidity('')">
                        </div>
                        @error('std_address_guardian')
                          <div>error</div>
                        @enderror
                      </div>
    
                      <div class="mb-4 row align-items-center">
                        <label for="exampleInputText1" class="form-label col-sm-3 col-form-label">Pekerjaan Wali</label>
                        <div class="col-sm-9">
                          <select class ="form-select mr-sm-2" id="inLineFormCustomSelect" name="std_status_guardian" oninvalid="this.setCustomValidity ('Pekerjaan Wali Wajib Diisi')"
                          onchange="this.setCustomValidity('')" required>
                              <option selected value="">Pilih...</option>
                              <option value="PNS">PNS</option>
                              <option value="Pegawai Swasta">Pegawai Swasta</option>
                              <option value="TNI">TNI</option>
                              <option value="POLRI">POLRI</option>
                              <option value="wirausaha">Wirausaha</option>
                              <option value="Buruh">Buruh</option>
                              <option value="Lain-lain">Lain-lain</option>
                          </select>
                        </div>
                        @error('std_status_guardian')
                          <div>error</div>
                        @enderror
                      </div>
    
                      <div class="mb-4 row align-items-center">
                        <label for="exampleInputText1" class="form-label col-sm-3 col-form-label">Penghasilan Wali</label>
                        <div class="col-sm-9">
                          <select class ="form-select mr-sm-2" id="inLineFormCustomSelect" name="std_status_guardian" oninvalid="this.setCustomValidity ('Penghasilan Wali Wajib Diisi')"
                          onchange="this.setCustomValidity('')" required>
                              <option selected value="">Pilih...</option>
                              <option value="0">0</option>
                              <option value="<1.000.000">< 1.000.000 </option>
                              <option value="1.000.000 - 3.000.000">1.000.000 - 3.000.000</option>
                              <option value="3.000.000 - 5.000.000">3.000.000 - 5.000.000</option>
                              <option value=">5.000.000">> 5.000.000</option>
                          </select>
                        </div>
                        @error('std_status_guardian')
                          <div>error</div>
                        @enderror
                      </div>

                  <div class="mb-4 row align-items-center">
                    <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">No. HP Orang tua</label>
                    <div class="col-sm-9">
                      <input type="tel" name="std_parent_phone" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('No. HP Orang tua Wajib Diisi')" 
                      onchange="this.setCustomValidity('')">
                    </div>
                    @error('std_parent_phone')
                      <div>error</div>
                    @enderror
                  </div>

                  <div class="mb-4 row align-items-center">
                    <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Foto</label>
                    <div class="col-sm-9">
                      <input type="file" name="std_pictures" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Foto Diri Wajib Diisi')" 
                      onchange="this.setCustomValidity('')">
                    </div> 
                    @error('std_picturess')
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