<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>UTS KPL - Program Hitung Gaji Karyawan</title>

    {{-- css import --}}
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="css/iofrm-style.css">
    <link rel="stylesheet" type="text/css" href="css/iofrm-theme25.css">
</head>
<body>
    <div class="form-body">
        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder">
                    <div class="tekss text-center p-3"style="margin-left:10px;margin-top:-80px;color:white;">
                        <h5> Universitas Pendidikan Indonesia </h5>
                        <span> Projek UTS Konstruksi Perangkat Lunak </span>
                    </div>    
                    <img class="md-size" src="images/logo-upi.png" alt="">
                    <div class="tekss text-center p-3"style="margin-left:10px;margin-top:0px;color:white;">
                        <h5> Reihan Manzis Syahputra </h5>
                        <span> 2008580 </span>
                    </div> 
                </div>
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3 class="form-title">Program Hitung Gaji Karyawan</h3>
                        <ul class="nav nav-tabs" id="stepsTabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="step1-tab" data-toggle="tab" href="#step1" role="tab" aria-controls="step1" aria-selected="true">Biodata</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="step2-tab" data-toggle="tab" href="#step2" role="tab" aria-controls="step2" aria-selected="false">Perhitungan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="step3-tab" data-toggle="tab" href="#step3" role="tab" aria-controls="step3" aria-selected="false">| Data Gaji Karyawan</a>
                            </li>
                        </ul>
                        <form name="hitung" action="/" method="POST">
                            @csrf
                            <div class="tab-content" id="stepsTabContent">
                                {{-- tab 1 --}}
                                <div class="tab-pane fade show active" id="step1" role="tabpanel" aria-labelledby="step1-tab">
                                    <div class="form-subtitle">1. Biodata Kamu</div>
                                    <div class="inline-el-holder">

                                        {{-- NIK --}}
                                        <div class="inline-el">
                                            <label>NIK</label>
                                            <div class="input-with-ccicon">
                                                <input type="number"name="nik" class="form-control input-credit-card
                                                @error('nik') is-invalid                            
                                                @enderror" placeholder="1234567891234567"  value="{{ old('nik') }}">
                                                @error('nik')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>                            
                                                @enderror
                                                <i id="ccicon"></i>
                                            </div>
                                        </div>

                                        {{-- Nama --}}
                                        <div class="inline-el">
                                            <label>Nama</label>
                                            <div class="input-with-ccicon">
                                                <input type="TEXT" name="nama"class="form-control input-credit-card
                                                @error('nama') is-invalid                            
                                                @enderror" placeholder="Fullname"  value="{{ old('nama') }}">
                                                @error('nama')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>                            
                                                @enderror
                                                <i id="ccicon"></i>
                                            </div>
                                        </div>

                                        {{-- jenkel --}}
                                        <div class="inline-el">
                                            <label>Jenis Kelamin</label>
                                            <div class="input-with-ccicon">
                                            <select class="form-control"name="jns_klm">
                                                <option value="Laki-Laki">Laki-Laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="separator"></div>
                                    
                                    <div class="form-button text-right">
                                        <button id="btn-next" class="ibtn btn-tab-next">Next</button>
                                    </div>
                                </div>
                                {{-- tab 2 --}}
                                <div class="tab-pane fade" id="step2" role="tabpanel" aria-labelledby="step2-tab">
                                    <div class="form-subtitle">2. Perhitungan Gaji Kamu</div>
                                    <div class="inline-el">
                                        <label>Masukan Golongan</label>
                                        <div class="input-with-ccicon">
                                        <select class="form-control"name="golongan"id="gol">
                                            <option>Pilih Golongan </option>
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="C">C</option>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="inline-el">
                                        <label>Status</label>
                                        <div class="input-with-ccicon">
                                        <select class="form-control p-1"name="status"id="stat">
                                            <option>Pilih Status </option>
                                            <option value="Belum_Kawin">Belum Kawin</option>
                                            <option value="Sudah_Kawin">Sudah Kawin</option>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="form-button">
                                    <input type="button" class="ibtn"value="Hitung" onClick='cek(this)'style="width:100px">
                                    </div>
                                    <div class="inline-el-holder">
                                    <div class="inline-el">
                                        <label>Gaji Pokok : </label>
                                        <input type="text"name="gapok"id="gapok"class="form-control sm-content"value="{{ old('gapok') }}"readonly>
                                    </div>
                                    <div class="inline-el">
                                        <label>Tunjangan : </label>
                                        <input type="text"name="tunjangan"id="tunj"class="form-control sm-content"value="{{ old('tunjangan') }}"readonly>
                                    </div>  
                                    </div>
                                    <div class="inline-el-holder">
                                    <div class="inline-el">
                                        <label>Potongan : </label>
                                        <input type="text"name="potongan"id="pot"class="form-control sm-content"value="{{ old('potongan') }}"readonly>
                                    </div>  

                                    <div class="inline-el">
                                        <label>Total Gaji : </label>
                                        <input type="text"name="total"id="total"class="form-control sm-content"value="{{ old('total') }}"readonly>
                                    </div>
                                    <div class="form-button">
                                        <button id="submit" type="submit" class="ibtn"style="margin-top:-10px;">Save Ke Database</button>
                                    </div>
                                    </div>
                                </div>

                                {{-- tab 3 --}}
                                <div class="tab-pane fade" id="step3" role="tabpanel" aria-labelledby="step3s-tab">
                                    <div class="form-subtitle"style="margin-left:-150px">3. Data Gaji Karyawan</div>
                                    
                                    {{-- tabel --}}
                                    @if ($data->count())
                                    <table class="table-responsive table-hover" style="margin-left:-150px;width:730px">
                                        <style>
                                            table{
                                                border-collapse: collapse;
                                                border: 1px solid black;
                                                text-align: center;
                                                vertical-align: middle;
                                            }
                                            table tr{
                                                
                                                border-top-width: 2px
                                            }
                                            tr,td{
                                                padding: 8px;
                                            }
                                            thead{
                                                font-weight: bold;
                                                color: white;
                                                background-color: rgb(0,91,151)
                                            }
                                        </style>
                                        <thead>
                                        <tr>
                                            <td></td>
                                            <td>NIK</td>
                                            <td>Nama</td>
                                            <td>Jenis Kelamin</td>
                                            <td>Golongan</td>
                                            <td>Status</td>
                                            <td>Gaji Pokok</td>
                                            <td>Tunjangan</td>
                                            <td>Potongan</td>
                                            <td>Total Gaji</td>
                                        </tr>
                                        </thead>
                                        @foreach ($data as $datagaji )
                                        <tr>   
                                            <td><a href="/delete/{{ $datagaji->NIK }}"class="text-danger"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                                            <td>{{ $datagaji->NIK }}</td>
                                            <td>{{ $datagaji->nama }}</td>
                                            <td>{{ $datagaji->jns_klm }}</td>
                                            <td>{{ $datagaji->golongan }}</td>
                                            <td>{{ $datagaji->status }}</td>
                                            <td>{{ $datagaji->gapok }}</td>
                                            <td>{{ $datagaji->tunjangan }}</td>
                                            <td>{{ $datagaji->potongan }}</td>
                                            <td>{{ $datagaji->total }}</td>
                                        </tr>
                                        @endforeach
                                      </table>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
    <p>No Data Yet</p>    
    @endif

    {{-- perhitungan --}}

<script language="javascript">
        // fungsi hitung gapok
        function hgapok(golongan){
        return gp[golongan];
        }
        //fungsi hitung tunjangan
    function htunj(status){
        return tj[status]
    }
        // fungsi hitung potongan
    function hpotongan(golongan){
        return pt[golongan];
    }
        // fungsi hitung total gaji
    function htotal(var1,var2,var3){
        return (var1+var2)-var3;
    }
        // fungsi cetak
    function cetak(gp,tj,pt,tg){
        document.hitung.gapok.value=gp;
        document.hitung.tunjangan.value=tj;
        document.hitung.potongan.value=pt;
        document.hitung.total.value=tg;
        }
        // fungsi kirim data ke form 
    function cek(form){
        var g, s;
        // name form = hitung
        with (hitung){
            g = golongan.value;
            s = status.value;

            gapoks=hgapok(g);

            tunjangans=htunj(s);

            potongans = hpotongan(g);

            totals = htotal(gapoks,tunjangans,potongans)

            cetak(gapoks,tunjangans,potongans,totals);

            return false;
        }
        }
    // Penentuan Gapok berdasarkan Golongan 
    var gp = new Array();
        gp["A"] = 3500000;
        gp["B"] = 4000000;
        gp["C"] = 4500000;
    // Penentuan tunjangan berdasarkan status
    var tj = new Array();
        tj["Belum_Kawin"] = 500000;
        tj["Sudah_Kawin"] = 1000000;
    // Penentuan potongan berdasarkan golongan
    var pt = new Array();
        pt["A"] = 300000;
        pt["B"] = 400000;
        pt["C"] = 500000;

</script>

{{-- js import --}}
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/cleave.min.js"></script>
<script src="js/main.js"></script>

@include('sweetalert::alert')
</body>
</html>