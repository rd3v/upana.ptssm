                <div class="m-grid__item m-grid__item--fluid m-wrapper">
                    <!-- BEGIN: Subheader -->
                    <div class="m-subheader ">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="m-subheader__title m-subheader__title--separator">
                                    Rincian Pengeluaran Material
                                </h3>
                                <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                                    <li class="m-nav__item m-nav__item--home">
                                        <a href="<?=site_url('gudang')?>" class="m-nav__link m-nav__link--icon">
                                            <i class="m-nav__link-icon la la-home"></i>
                                        </a>
                                    </li>
                                    <li class="m-nav__separator">
                                        -
                                    </li>
                                    <li class="m-nav__item">
                                        <a href="<?=site_url('gudang/pengeluaran-material')?>" class="m-nav__link">
                                            <span class="m-nav__link-text">
                                                Pengeluaran Material
                                            </span>
                                        </a>
                                    </li>
                                    <li class="m-nav__separator">
                                        -
                                    </li>
                                    <li class="m-nav__item">
                                        <a href="<?=site_url('gudang/pengeluaran-material/rincian/'.$data['id'])?>" class="m-nav__link">
                                            <span class="m-nav__link-text">
                                                Rincian
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- END: Subheader -->
                    <div class="m-content">
                        <div class="row">
                            <div class="col-xl-12">
                                <div id="data_print" class="m-portlet m-portlet--tab">
                                    <div  class="m-portlet__head header">
                                        <h3 class="header-pesanan">
                                        </h3><br>
                                        <button onclick="window.open('<?=site_url('gudang/pengeluaran-material/cetak/'.$data['id'])?>')" style="padding: 5px;width: 200px" id="btn_print" class="btn btn-primary ">
                                            Print Bukti Pengeluaran
                                        </button>
                                        <h3 name="no_surat_jalan" class="header-pesanan-no">
                                            <i class="fa fa-check-circle"> </i> <?=$data['data']->no_spk?>
                                        </h3><br><br>
                                        <div class="info row">
                                            <div class="col-sm">
                                                <p id="tanggal_surat"><i class="flaticon-calendar-2"> </i><?=tgl_indo($data['data']->tanggal)?></p>
                                                <p id="nama_pelanggan"><i class="flaticon-users"> </i> <?=$data['data']->nama?></p>
                                                <p id="no_telpon"><i class="fa fa-phone"> </i> <?=$data['data']->telepon?></p>
                                            </div>
                                            <div class="col-sm">
                                                <p id="email_pelanggan"><i class="fa fa-envelope-o "> </i> <?=$data['data']->email?></p>
                                                <p id="alamat_pelanggan"><i class="flaticon-placeholder-1"> </i> <?=$data['data']->alamat?></p>
                                                <p id="keterangan_pesanan"><i class="fa fa-suitcase"> </i> <?=$data['data']->catatan?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <form class="m-form m-form--fit m-form--label-align-right">
                                        <div class="m-portlet__body">
                                            <div class="col-xl-12" style="margin-bottom: 20px">
                                                <label style="font-size: 1.5rem;font-weight: 500;" for="example-text-input" class="col-xl-9">
                                                    Material
                                                </label>
                                            </div>
                                            <div class="col-xl-12">
                                                <table class="table" id="tbl_material"></table>
                                                <div class="form-group m-form__group ">
                                                    <label  class="col-xl-12 col-form-label">
                                                        Catatan
                                                    </label>
                                                    <div class="col-xl-12">
                                                        <textarea style="resize: none" class="form-control m-input " id="catatan" rows="3" disabled><?=$data['data2']->catatan?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end:: Body -->

<script type="text/javascript">
    var tbl_material = $('#tbl_material').mDatatable({
        data: {
            saveState: {cookie: false},
                    type: 'remote',
                    source: {
                      read: {
                        // sample GET method
                        method: 'GET',
                        url: '<?=site_url('gudang/pengeluaran-material/items/'.$data['id'])?>'
                      },
                    },
                    pageSize: 10,
                    serverPaging: true,
                    serverFiltering: true,
                    serverSorting: true,
                },
                sortable: false,
                search: {
                    input: $('#generalSearch'),
                },
                columns: [

                {
                    field: '#',
                    title: 'No.',
                    textAlign: 'center',
                    template: function(data, type, row, meta) {
                        return ((row.getCurrentPage() - 1) * row.getPageSize()) + data.getIndex() + 1;
                    }
                },
                {
                    field: 'nama',
                    title: 'Nama Material',
                    textAlign: 'center',
                    width:150
                },
                {
                    field: 'id_teknisi',
                    title: 'Teknisi',
                    textAlign: 'center',
                    width: 75,
                    template: function(data) {
                        return (data.id_teknisi != '0' ? '<i class="fa fa-check"> </i>' : '');
                    }
                },
                {
                    field: 'id_pelanggan',
                    title: 'Kostumer',
                    textAlign: 'center',
                    width: 75,
                    template: function(data) {
                        return (data.id_pelanggan != '0' ? '<i class="fa fa-check"> </i>' : '');
                    }
                },
                {
                    field: 'pengeluaran',
                    title: 'Pengeluaran',
                    textAlign: 'center',
                    template: function(data) {
                        return data.pengeluaran + ' ' + data.satuan;
                    }
                },
                {
                    field: 'kembali',
                    title: 'Retur',
                    textAlign: 'center',
                    template: function(data) {
                        return data.kembali + ' ' + data.satuan;
                    }
                },
                {
                    field: 'total',
                    title: 'Total',
                    textAlign: 'center',
                    template: function(data) {
                        return (data.pengeluaran - data.kembali) + ' ' + data.satuan;
                    }
                }

                ],
            });
        </script>
