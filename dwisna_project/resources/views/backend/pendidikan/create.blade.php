@extends('backend/layouts.template')

@section('content')
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="icon_document_alt"></i>Riwayat Hidup</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="{{ url('dashboard') }}">Home</a></li>
                    <li><i class="icon_document_alt"></i>Riwayat Hidup</li>
                    <li><i class="fa fa-files-o"></i>Pendidikan</li>
                </ol>
            </div>
        </div>
        <!-- form validation -->
         <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">{{ isset($admin_lecturer)? 'Mengubah' : 'Menambahkan' }}Pendidikan</header>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problem with your input.<br><br>
                        <ul>@foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach</ul>
                    </div>
                    @endif
                    <div class="panel-body">
                        <div class="form">
                            <for class="form-validate form-horizontal" id="pendidikan_form" method="post" action="{{ isset($pengalaman_kerja) ? route('pengalaman_kerja.update', $pengalaman_kerja->id) : route('pengalaman_kerja.store') }}">
                                {!! csrf_field()!!}
                                {!! isset($pendidikan)? method_field('PUT') : '' !!} -->
                                <input type="hidden" name="id" value="{{ $pengalaman_kerja->id }}"></br>
                                <div class="form-group">
                                    <label for="cname" class="control-label col-lg-2">Nama Sekolah<span class="required">*</span></label>
                                    <div class="col-lg-10">
                                        <input class="form-control" id="nama" name="nama" minlength="5" type="text" value="{{ isset($pendidikan) ? $pendidikan->nama : '' }}" />
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="curl" class="control-label col-lg-2">Tingkatan<span class="required">*</span></label>
                                    <div class="col-lg-10">
                                        <!-- <input id="tahun_masuk" type="text" name="tahun_masuk" class="form-control" value="{{ isset($pengalaman_kerja) ? $pengalaman_kerja->tahun_masuk : '' }}"> -->
                                         <select class="form-control m-bot15" name="tingkatan" id="tingkatan" required>
                                            <option value="1"{{ (isset($pendidikan) && $pendidikan->tingkatan == 1) ? 'selected' : '' }}>TK</option>
                                            <option value="2"{{ (isset($pendidikan) && $pendidikan->tingkatan == 2) ? 'selected' : '' }}>SD</option>
                                            <option value="3"{{ (isset($pendidikan) && $pendidikan->tingkatan == 3) ? 'selected' : '' }}>SMP</option>
                                            <option value="4"{{ (isset($pendidikan) && $pendidikan->tingkatan == 4) ? 'selected' : '' }}>SMA/SMK</option>
                                            <option value="5"{{ (isset($pendidikan) && $pendidikan->tingkatan == 5) ? 'selected' : '' }}>D3</option>
                                            <option value="6"{{ (isset($pendidikan) && $pendidikan->tingkatan == 6) ? 'selected' : '' }}>D4/S1</option>
                                            <option value="7"{{ (isset($pendidikan) && $pendidikan->tingkatan == 7) ? 'selected' : '' }}>S2</option>
                                            <option value="8"{{ (isset($pendidikan) && $pendidikan->tingkatan == 8) ? 'selected' : '' }}>SE</option>
                                         </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="curl" class="control-label col-lg-2">Tahun Masuk<span class="required">*</span></label>
                                    <div class="col-lg-10">
                                        <input id="tahun_masuk" type="text" name="tahun_masuk" class="form-control" value="{{ isset($pendidikan) ? $pendidikan->tahun_keluar : '' }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="curl" class="control-label col-lg-2">Tahun Selesai<span class="required">*</span></label>
                                    <div class="col-lg-10">
                                        <input id="tahun_keluar" type="text" name="tahun_keluar" class="form-control" value="{{ isset($pendidikan) ? $pendidikan->tahun_keluar : '' }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <button class="btn btn-primary" type="submit">Save</button>
                                        <a href="{{ route('pengalaman_kerja.index') }}"><button class="btn btn-default" type="button">Cancel</button></a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
         </div>
         <!--page end-->
         </section>
</section>
@endsection
@push('content-css')
<link href="{{asset('backend/css/bootstrap-datepicker.css')}}" rel="stylesheet"/>
@endpush
@push('content-js')
<script scr="{{asset('backend/js/bootstrap-datepicker.js')}}"></script>
<script type="text/javascript">
    $('#tahun_masuk').datapicker({
        format: "yyyy", 
        viewModel: "years",
        minViewModel: "years"
    });
    $('#tahun_keluar').datapicker({
        format: "yyyy", 
        viewModel: "years",
        minViewModel: "years"
    });
</script>
@endpush