var baseurl='http://localhost/pilus/';
    //Choose File Foto User
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });

    //Check Box Set Role Auto Input
    $('.form-check-input').on('click', function() {
        const menuId = $(this).data('menu');
        const roleId = $(this).data('role');
        $.ajax({
            url: baseurl + "admin/changeaccess",
            type: 'post',
            data: {
                menuId: menuId,
                roleId: roleId
            },
            success: function() {
                document.location.href = baseurl + "admin/roleaccess/" + roleId;
            }
        })
    });

    $(document).ready(function(){
        $('#tabels').DataTable();
        
    });



    //Berisi Macam Macam Fungsi Ajax
$(function() {

    $('#keyword').on('keyup', function(){
        $('#isitabel').load(baseurl+"tu/datalivesearch");
    })

    //Tombol Tambah Menu ke Modal
    $('.addnewmenu').on('click', function(){
        //jquery tolong carikan di dokumen ini sebuah id form modal label isi dari labelnya diganti ubah data mahasiswa
        $('#newMenuModalLabel').html('Add New Menu');
        $('.modal-footer button[type=submit]').html('Add');
        }
    );

    //Tombol Tambah Siswa ke Modal
    $('.addSiswa').on('click', function(){
        //jquery tolong carikan di dokumen ini sebuah id form modal label isi dari labelnya diganti ubah data mahasiswa
        $('#siswaModalLabel').html('Add Siswa');
        $('.modal-footer button[type=submit]').html('Add');
        }
    );

    //Tombol Tambah Siswa ke Modal
    $('.addKelas').on('click', function(){
        //jquery tolong carikan di dokumen ini sebuah id form modal label isi dari labelnya diganti ubah data mahasiswa
        $('#kelasModalLabel').html('Add Kelas');
        $('.modal-footer button[type=submit]').html('Add');
        }
    );

     //Tombol Tambah Guna Bayar Ke Modal
    $('.addGunaBayar').on('click', function(){
        //jquery tolong carikan di dokumen ini sebuah id form modal label isi dari labelnya diganti ubah data mahasiswa
        $('#gunaBayarModalLabel').html('Add Guna Bayar');
        $('.modal-footer button[type=submit]').html('Add');
        }
    );

    //Action Edit Klik di halaman menu, Jquery tolong carikan saya class tampilmodalubah, jika diklik
    $('.menuEdit').on('click', function() {
        //jquery tolong carikan di dokumen ini sebuah id form modal label isi dari labelnya diganti ubah data mahasiswa
        $('#newMenuModalLabel').html('Edit Menu');
        $('.modal-footer button[type=submit]').html('Update');
        //jquery carikan elemen modal , formnya ganti attribut actionya menjadi...
        $('.modal-dialog form').attr('action', `${baseurl}menu/ubah`);
        const id = $(this).data('id');
        const menu=$(this).data('menu');
        //jquery carikan data berdasarkan elemen #nama kemudian value nya berisi dari data array nama, kalau pakai php pakainya ->, kalau ajax pakainya . 
        $('#menu').val(menu);
        $('#id').val(id);
        //supaya data tidak nyantol di modal karena menggunakan 1 form , sehingga setelah klik ubah di close terus klik tambah , datanya bisa hilang tidak nyantol di form tombol tambah    
        $('.addnewmenu').on('click', function() {
            $('#newMenuModalLabel').html('Add New Menu');
            $('.modal-footer button[type=submit]').html('Add');
            $('#menu').val('');
        });
    });

    //Action Edit Klik di halaman DataKelas, Jquery tolong carikan saya class tampilmodalubah, jika diklik
    $('.editKelas').on('click', function() {
        //jquery tolong carikan di dokumen ini sebuah id form modal label isi dari labelnya diganti ubah data mahasiswa
        $('#kelasModalLabel').html('Edit Kelas');
        $('.modal-footer button[type=submit]').html('Update');
        //jquery carikan elemen modal , formnya ganti attribut actionya menjadi...
        $('.modal-dialog form').attr('action', `${baseurl}tu/editkelas`);
        const idkelas = $(this).data('id');
        const tingkat=$(this).data('tingkat');
        const jurusan=$(this).data('jurusan');
        //jquery carikan data berdasarkan elemen #nama kemudian value nya berisi dari data array nama, kalau pakai php pakainya ->, kalau ajax pakainya . 
        $('#id').val(idkelas);
        $('#tingkat').val(tingkat);
        $('#jurusan').val(jurusan);
        //supaya data tidak nyantol di modal karena menggunakan 1 form , sehingga setelah klik ubah di close terus klik tambah , datanya bisa hilang tidak nyantol di form tombol tambah    
        $('.addKelas').on('click', function() {
            $('#kelasModalLabel').html('Add Kelas');
            $('.modal-footer button[type=submit]').html('Add');
            $('#tingkat').val('');
            $('#jurusan').val('');
        });
    });

//Action Edit Klik di halaman GunaBayar, Jquery tolong carikan saya class tampilmodalubah, jika diklik
$('.editGunaBayar').on('click', function() {
    //jquery tolong carikan di dokumen ini sebuah id form modal label isi dari labelnya diganti ubah data mahasiswa
    $('#gunaBayarModalLabel').html('Edit Guna Bayar');
    $('.modal-footer button[type=submit]').html('Update');
    //jquery carikan elemen modal , formnya ganti attribut actionya menjadi...
    $('.modal-dialog form').attr('action', `${baseurl}laporan/editgunabayar`);
    const idgunabayar = $(this).data('id');
    const gunabayar=$(this).data('gunabayar');
    const wajibbayar=$(this).data('wajibbayar');
    //jquery carikan data berdasarkan elemen #nama kemudian value nya berisi dari data array nama, kalau pakai php pakainya ->, kalau ajax pakainya . 
    $('#id').val(idgunabayar);
    $('#gunabayar').val(gunabayar);
    $('#wajibbayar').val(wajibbayar);
    //supaya data tidak nyantol di modal karena menggunakan 1 form , sehingga setelah klik ubah di close terus klik tambah , datanya bisa hilang tidak nyantol di form tombol tambah    
    $('.addGunaBayar').on('click', function() {
        $('#gunaBayarModalLabel').html('Add Guna Bayar');
        $('.modal-footer button[type=submit]').html('Add');
        $('#gunabayar').val('');
        $('#wajibbayar').val('');
    });
});


    //Tombol tambah Sub Menu Modal
    $('.addnewsubmenu').on('click', function(){
    //jquery tolong carikan di dokumen ini sebuah id form modal label isi dari labelnya diganti ubah data mahasiswa
        $('#newSubMenuModalLabel').html('Add New Sub Menu');
        $('.modal-footer button[type=submit]').html('Add');
        }
    );

    //Action Edit di sub menu 
    $('.subMenuEdit').on('click', function() {
        //jquery tolong carikan di dokumen ini sebuah id form modal label isi dari labelnya diganti ubah data mahasiswa
        $('#newSubMenuModalLabel').html('Edit Sub Menu');
        $('.modal-footer button[type=submit]').html('Update');
        //jquery carikan elemen modal , formnya ganti attribut actionya menjadi...
        $('.modal-dialog form').attr('action', `${baseurl}menu/ubahsub`);
        const id = $(this).data('id');
         //dibawah ini data id pertama nama parameter yang dikirimkan, id yang kedua isi dari this data id di atas
        $.ajax({
            url:`${baseurl}menu/getubahsub`,
            data:{id : id},
            method: 'post',
            dataType: 'json',
            success: function(data){
                //jquery carikan data berdasarkan elemen #nama kemudian value nya berisi dari data array nama, kalau pakai php pakainya ->, kalau ajax pakainya . 
                $('#id').val(data.id);
                $('#submenu').val(data.title);
                $('#menu_id').val(data.menu_id);
                $('#url').val(data.url);
                $('#icon').val(data.icon);
                //supaya data tidak nyantol di modal karena menggunakan 1 form , sehingga setelah klik ubah di close terus klik tambah , datanya bisa hilang tidak nyantol di form tombol tambah    
                $('.addnewsubmenu').on('click', function() {
                    $('#newMenuModalLabel').html('Add New Sub Menu');
                    $('.modal-footer button[type=submit]').html('Add');
                    $('#id').val('');
                    $('#submenu').val('');
                    $('#menu_id').val('');
                    $('#url').val('');
                    $('#icon').val('');
                });
            }
        });
    });

    //Tombol Tambah User di Halaman User Role
    $('.newUser').on('click', function(){
        //jquery tolong carikan di dokumen ini sebuah id form modal label isi dari labelnya diganti ubah data mahasiswa
        $('#newUserLabel').html('Add User');
        $('.modal-footer button[type=submit]').html('Add');
    });

    //Action set role pada halaman User Role , untuk mengganti Role dari User
    $('.setRole').on('click', function() {
        //jquery tolong carikan di dokumen ini sebuah id form modal label isi dari labelnya diganti ubah data mahasiswa
        $('#newUserLabel').html('Edit Role User');
        $('.modal-footer button[type=submit]').html('Set Role');
        //jquery carikan elemen modal , formnya ganti attribut actionya menjadi...
        $('.modal-dialog form').attr('action', `${baseurl}admin/setrole`);
        const id = $(this).data('id');
        const nama=$(this).data('nama');
        const role_id=$(this).data('roleid');
        $('#id').val(id);
        $('#nama').val(nama);
        $('#role_id').val(role_id);
        $('#username').attr('type','hidden');
        $('#password1').attr('type','hidden');
        $('#password2').attr('type','hidden');
        //supaya data tidak nyantol di modal karena menggunakan 1 form , sehingga setelah klik ubah di close terus klik tambah , datanya bisa hilang tidak nyantol di form tombol tambah    
        $('.newUser').on('click', function() {
            $('#newUserLabel').html('Add User');
            $('.modal-footer button[type=submit]').html('Add');
            $('#id').val('');
            $('#submenu').val('');
            $('#menu_id').val('');
            $('#url').val('');
            $('#icon').val('');
        });
    });

    
    //drop down pilih kelas di Bayar SPP on change mengganti isi data drop down Siswa
    $("#idkelas").change(function(){
        var idkelas1 = $("#idkelas").val();
        var tahun1 = $("#tahun").val();
        //dibawah ini data id pertama nama parameter yang dikirimkan, id yang kedua isi dari this data id di atas
        $.ajax({
            url:`${baseurl}tu/carisiswa`,
            data:{id : idkelas1,tahun:tahun1},
            async: 'false',
            cache: 'false',
            method: 'post',
            dataType: 'json',
            success: function(data){
                    var html1 = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html1 += '<option value="'+data[i].idsiswa+'">'+data[i].nama+'</option>';
                    }
                    $("#idsiswa").html(html1);
            }
        });
    });

//drop down pilih kelas di Bayar NON-SPP on change mengganti isi data drop down Siswa
$("#idkelasnon").change(function(){
    var idkelas1 = $("#idkelasnon").val();
    var tahun1 = $("#tahunnon").val();
    //dibawah ini data id pertama nama parameter yang dikirimkan, id yang kedua isi dari this data id di atas
    $.ajax({
        url:`${baseurl}nontu/carisiswa`,
        data:{id : idkelas1,tahun:tahun1},
        async: 'false',
        cache: 'false',
        method: 'post',
        dataType: 'json',
        success: function(data){
                var html1 = '';
                var i;
                for(i=0; i<data.length; i++){
                    html1 += '<option value="'+data[i].idsiswa+'">'+data[i].nama+'</option>';
                }
                $("#idsiswanon").html(html1);
        }
    });
});

//drop down pilih kelas di Data Siswa on change mengganti isi tabelsiswa
$("#idkelassiswa").change(function(){
    var idkelas1 = $("#idkelassiswa").val();
    var tahun1 = $("#tahunsiswa").val();
    
    //dibawah ini data id pertama nama parameter yang dikirimkan, id yang kedua isi dari this data id di atas
    $.ajax({
        url:`${baseurl}tu/carisiswa`,
        data:{id : idkelas1,tahun:tahun1},
        async: 'false',
        cache: 'false',
        method: 'post',
        dataType: 'json',
        success: function(data){
                var html1 = '';
                var i;
                var a=1;
                var b;
                for(i=0; i<data.length; i++){
                    b=a+i;
                    html1 += `<tr><td>${b}</td><td>${data[i].nis}</td><td>${data[i].nama}</td><td>${data[i].ortu}</td><td>${data[i].ket}</td><td>
                    <form method="POST" action="${baseurl+'tu/geteditsiswa'}">
                                                <input type="hidden" name="id" value="${data[i].idsiswa}"><button class="btn btn-primary">Edit</button>
                    <a href="${baseurl+'tu/hapussiswa/'+data[i].idsiswa}" class="btn btn-danger tombol-hapus" onclick="return confirm('Yakin Hapus Data?')">Delete</a>
                    </form></td></tr>`;
                }
                $(".divlaporan").show();
                $("#tabelsiswa").html(html1);
        }
    });
});

//drop down pilih kelas di Cetak PDF on change mengganti isi tabelsiswa
$("#idkelaspdf").change(function(){
    var idkelas1 = $("#idkelaspdf").val();
    var tahun1 = $("#tahunpdf").val();
    
    //dibawah ini data id pertama nama parameter yang dikirimkan, id yang kedua isi dari this data id di atas
    $.ajax({
        url:`${baseurl}laporan/carisiswa`,
        data:{id : idkelas1,tahun:tahun1},
        async: 'false',
        cache: 'false',
        method: 'post',
        dataType: 'json',
        success: function(data){
                var html1 = '';
                var i;
                var a=1;
                var b;
                for(i=0; i<data.length; i++){
                    b=a+i;
                    html1 += `<tr><td>${b}</td><td>${data[i].nis}</td><td>${data[i].nama}</td><td>${data[i].ortu}</td><td>${data[i].ket}</td><td>
                    <form method="POST" action="${baseurl+'laporan/cetakpdf'}">
                    <input type="hidden" name="id" value="${data[i].idsiswa}">
                    <button class="btn btn-primary">Download</button>
                    </form></td></tr>`;
                }
                $(".divlaporan").show();
                $("#id").val(idkelas1);
                $("#tahun").val(tahun1);
                $("#tabelpdf").html(html1);
        }
    });
});


//drop down pilih TAHUN di Data SISWA on change mengganti isi tabelsiswa
$("#tahunsiswa").change(function(){
    var idkelas1 = $("#idkelassiswa").val();
    var tahun1 = $("#tahunsiswa").val();
    //dibawah ini data id pertama nama parameter yang dikirimkan, id yang kedua isi dari this data id di atas
    $.ajax({
        url:`${baseurl}tu/carisiswa`,
        data:{id : idkelas1,tahun:tahun1},
        async: 'false',
        cache: 'false',
        method: 'post',
        dataType: 'json',
        success: function(data){
                var html1 = '';
                var i;
                var a=1;
                var b;
                for(i=0; i<data.length; i++){
                    b=a+i;
                    html1 += `<tr><td>${b}</td><td>${data[i].nis}</td><td>${data[i].nama}</td><td>${data[i].ortu}</td><td>${data[i].ket}</td><td>
                    <form method="POST" action="${baseurl+'tu/geteditsiswa'}">
                                                <input type="hidden" name="id" value="${data[i].idsiswa}"><button class="btn btn-primary">Edit</button>
                    <a href="${baseurl+'tu/hapussiswa/'+data[i].idsiswa}" class="btn btn-danger tombol-hapus" onclick="return confirm('Yakin Hapus Data?')">Delete</a>
                    </form></td></tr>`;
                }
                $(".divlaporan").show();
                $("#tabelsiswa").html(html1);
        }
    });
});



    //ID KELAS LAPORAN SPP, ON CHANGE AMBIL DATA HTML DARI SPPKELAS.PHP
    $('.divlaporan').hide(); //hidden divlaporan on load
    $("#idkelas").change(function(){
            var idkelaslaporan = $("#idkelas").val();
            var tahunlaporan = $("#tahun").val();
            //dibawah ini data id pertama nama parameter yang dikirimkan, id yang kedua isi dari this data id di atas
            $.ajax({
                url:`${baseurl}laporan/sppkelas`,
                data:{id : idkelaslaporan,tahun:tahunlaporan},
                async:'false',
                cache:'false',
                method: 'post',
                dataType: 'html',
                success: function(datalaporan){
                    $(".divlaporan").show();
                    $("#tabellaporan").html(datalaporan);
                }
            });
        });

    //ID TAHUN ON CHANGE LAPORAN SPP DAT DARI SPPKELAS.PHP
    $("#tahun").change(function(){
        var idkelaslaporan = $("#idkelas").val();
        var tahunlaporan = $("#tahun").val();
        //dibawah ini data id pertama nama parameter yang dikirimkan, id yang kedua isi dari this data id di atas
        $.ajax({
            url:`${baseurl}laporan/sppkelas`,
            data:{id : idkelaslaporan,tahun:tahunlaporan},
            async:'false',
            cache:'false',
            method: 'post',
            dataType: 'html',
            success: function(datalaporan){
                $(".divlaporan").show();
                $("#tabellaporan").html(datalaporan);
            }
        });
    });

    //ID KELAS LAPORAN NON-SPP ON CHANGE MENAMPILKAN LAPORAN JENISKET GUNABAYAR NON SPP
    $("#idkelas").change(function(){
        var idkelaslaporan = $("#idkelas").val();
        var tahunlaporan = $("#tahun").val();
        var gunabayar = $("#gunabayar").val();
        //dibawah ini data id pertama nama parameter yang dikirimkan, id yang kedua isi dari this data id di atas
        $.ajax({
            url:`${baseurl}laporan/lappembayaran`,
            data:{id : idkelaslaporan,tahun:tahunlaporan,gunabayar:gunabayar},
            async:'false',
            cache:'false',
            method: 'post',
            dataType: 'html',
            success: function(datalaporan){
                $(".divlaporan").show();
                $("#tabellaporan2").html(datalaporan);
            }
        });
    });

    //ID TAHUN LAPORAN NON-SPP ON CHANGE TAMPILKAN DATA SESUAI GUNABAYAR
    $("#tahun").change(function(){
        var idkelaslaporan = $("#idkelas").val();
        var tahunlaporan = $("#tahun").val();
        var gunabayar=$("#gunabayar").val();
        //dibawah ini data id pertama nama parameter yang dikirimkan, id yang kedua isi dari this data id di atas
        $.ajax({
            url:`${baseurl}laporan/lappembayaran`,
            data:{id : idkelaslaporan,tahun:tahunlaporan,gunabayar:gunabayar},
            async:'false',
            cache:'false',
            method: 'post',
            dataType: 'html',
            success: function(datalaporan){
                $(".divlaporan").show();
                $("#tabellaporan2").html(datalaporan);
            }
        });
    });


     //GUNABAYAR LAPORAN NON-SPP ON CHANGE TAMPILKAN DATA SESUAI GUNABAYAR
     $("#gunabayar").change(function(){
        var idkelaslaporan = $("#idkelas").val();
        var tahunlaporan = $("#tahun").val();
        var gunabayar=$("#gunabayar").val();
        //dibawah ini data id pertama nama parameter yang dikirimkan, id yang kedua isi dari this data id di atas
        $.ajax({
            url:`${baseurl}laporan/lappembayaran`,
            data:{id : idkelaslaporan,tahun:tahunlaporan,gunabayar:gunabayar},
            async:'false',
            cache:'false',
            method: 'post',
            dataType: 'html',
            success: function(datalaporan){
                $(".divlaporan").show();
                $("#tabellaporan2").html(datalaporan);
            }
        });
    });

    //drop down tahun di Bayar SPP on change mengganti isi data drop down Siswa
    $("#tahun").change(function(){
        var idkelas = $("#idkelas").val();
        var tahun = $("#tahun").val();
        //dibawah ini data id pertama nama parameter yang dikirimkan, id yang kedua isi dari this data id di atas
        $.ajax({
            url:`${baseurl}tu/carisiswa`,
            data:{id : idkelas,tahun:tahun},
            method: 'post',
            dataType: 'json',
            success: function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<option value="'+data[i].idsiswa+'">'+data[i].nama+'</option>';
                    }
                    $("#idsiswa").html(html); 
            }
        });
    });

    //drop down tahun di Bayar NON SPP on change mengganti isi data drop down Siswa
    $("#tahunnon").change(function(){
        var idkelas = $("#idkelasnon").val();
        var tahun = $("#tahunnon").val();
        //dibawah ini data id pertama nama parameter yang dikirimkan, id yang kedua isi dari this data id di atas
        $.ajax({
            url:`${baseurl}nontu/carisiswa`,
            data:{id : idkelas,tahun:tahun},
            method: 'post',
            dataType: 'json',
            success: function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<option value="'+data[i].idsiswa+'">'+data[i].nama+'</option>';
                    }
                    $("#idsiswanon").html(html); 
            }
        });
    });

    //Menampilkan NIS siswa on change dropdown SPP
    $("#idsiswa").change(function(){
        var idsiswa = $("#idsiswa").val();
        $.ajax({
            url:`${baseurl}tu/idsiswa`,
            data:{id : idsiswa},
            method: 'post',
            dataType: 'json',
            success: function(data){
                    $("#nis").val(data.nis); 
            }
        });
    });

    //Menampilkan NIS siswa on change dropdown NON-SPP
    $("#idsiswanon").change(function(){
        var idsiswa = $("#idsiswanon").val();
        $.ajax({
            url:`${baseurl}nontu/idsiswa`,
            data:{id : idsiswa},
            method: 'post',
            dataType: 'json',
            success: function(data){
                    $("#nis").val(data.nis); 
            }
        });
    });
    //Cari juli
    $("#idsiswa").change(function(){
        var idsiswa = $("#idsiswa").val();
        var gunabayar = 'Juli';
        $.ajax({
            url:`${baseurl}tu/tagihansiswa`,
            data:{id : idsiswa,gunabayar:gunabayar},
            cache:'false',
            async:'false',
            method: 'post',
            dataType: 'json',
            success: function(juli){
                var htmljuli='';
                if(juli==null){
                    htmljuli+=`<td>Juli</td><td></td><td></td>
                            <td></td>`;
                $('#juli').html(htmljuli);
                $('#juli').attr('class','bg-danger');
                }else{
                    var total= juli.wajibbayar-juli.totalbayar;
                    if(total==0){
                        keterangan='Lunas';
                        bg ='bg-success';
                    }else{
                        keterangan='Belum Lunas';
                        bg ='bg-danger';
                    }
                    htmljuli+=`<td>${juli.gunabayar}</td><td>${Number(juli.wajibbayar).toLocaleString("id-ID",{style:'currency', currency:'IDR'})}</td><td>${Number(juli.totalbayar).toLocaleString("id-ID",{style:'currency', currency:'IDR'})}</td>
                    <td>${new Date(juli.tanggalbayar).toLocaleDateString('id-ID')}</td>`;
                    $('#juli').html(htmljuli);
                    $('#juli').attr('class',bg);
                }
            }
        });
    });

    //Cari agustus
    $("#idsiswa").change(function(){
        var idsiswa = $("#idsiswa").val();
        var gunabayar = 'Agustus';
        $.ajax({
            url:`${baseurl}tu/tagihansiswa`,
            data:{id : idsiswa,gunabayar:gunabayar},
            cache:'false',
            async:'false',
            method: 'post',
            dataType: 'json',
            success: function(agustus){
                var htmlagustus='';
                if(agustus==null){
                    htmlagustus+=`<td>Agustus</td><td></td><td></td>
                            <td></td>`;
                $('#agustus').html(htmlagustus);
                $('#agustus').attr('class','bg-danger');
                }else{
                    var total= agustus.wajibbayar-agustus.totalbayar;
                    if(total==0){
                        keterangan='Lunas';
                        bg ='bg-success';
                    }else{
                        keterangan='Belum Lunas';
                        bg ='bg-danger';
                    }
                    htmlagustus+=`<td>${agustus.gunabayar}</td><td>${Number(agustus.wajibbayar).toLocaleString("id-ID",{style:'currency', currency:'IDR'})}</td><td>${Number(agustus.totalbayar).toLocaleString("id-ID",{style:'currency', currency:'IDR'})}</td>
                    <td>${new Date(agustus.tanggalbayar).toLocaleDateString('id-ID')}</td>`;
                    $('#agustus').html(htmlagustus);
                    $('#agustus').attr('class',bg);
                }
            }
        });
    });

//Cari september
$("#idsiswa").change(function(){
    var idsiswa = $("#idsiswa").val();
    var gunabayar = 'September';
    $.ajax({
        url:`${baseurl}tu/tagihansiswa`,
        data:{id : idsiswa,gunabayar:gunabayar},
        cache:'false',
        async:'false',
        method: 'post',
        dataType: 'json',
        success: function(september){
            var htmlseptember='';
            if(september==null){
                htmlseptember+=`<td>September</td><td></td><td></td>
                        <td></td>`;
            $('#september').html(htmlseptember);
            $('#september').attr('class','bg-danger');
            }else{
                var total= september.wajibbayar-september.totalbayar;
                if(total==0){
                    keterangan='Lunas';
                    bg ='bg-success';
                }else{
                    keterangan='Belum Lunas';
                    bg ='bg-danger';
                }
                htmlseptember+=`<td>${september.gunabayar}</td><td>${Number(september.wajibbayar).toLocaleString("id-ID",{style:'currency', currency:'IDR'})}</td><td>${Number(september.totalbayar).toLocaleString("id-ID",{style:'currency', currency:'IDR'})}</td>
                <td>${new Date(september.tanggalbayar).toLocaleDateString('id-ID')}</td>`;
                $('#september').html(htmlseptember);
                $('#september').attr('class',bg);
            }
        }
    });
});

//Cari oktober
$("#idsiswa").change(function(){
    var idsiswa = $("#idsiswa").val();
    var gunabayar = 'Oktober';
    $.ajax({
        url:`${baseurl}tu/tagihansiswa`,
        data:{id : idsiswa,gunabayar:gunabayar},
        cache:'false',
        async:'false',
        method: 'post',
        dataType: 'json',
        success: function(oktober){
            var htmloktober='';
            if(oktober==null){
                htmloktober+=`<td>Oktober</td><td></td><td></td>
                        <td></td>`;
            $('#oktober').html(htmloktober);
            $('#oktober').attr('class','bg-danger');
            }else{
                var total= oktober.wajibbayar-oktober.totalbayar;
                if(total==0){
                    keterangan='Lunas';
                    bg ='bg-success';
                }else{
                    keterangan='Belum Lunas';
                    bg ='bg-danger';
                }
                htmloktober+=`<td>${oktober.gunabayar}</td><td>${Number(oktober.wajibbayar).toLocaleString("id-ID",{style:'currency', currency:'IDR'})}</td><td>${Number(oktober.totalbayar).toLocaleString("id-ID",{style:'currency', currency:'IDR'})}</td>
                <td>${new Date(oktober.tanggalbayar).toLocaleDateString('id-ID')}</td>`;
                $('#oktober').html(htmloktober);
                $('#oktober').attr('class',bg);
            }
        }
    });
});

//Cari november
$("#idsiswa").change(function(){
    var idsiswa = $("#idsiswa").val();
    var gunabayar = 'November';
    $.ajax({
        url:`${baseurl}tu/tagihansiswa`,
        data:{id : idsiswa,gunabayar:gunabayar},
        cache:'false',
        async:'false',
        method: 'post',
        dataType: 'json',
        success: function(november){
            var htmlnovember='';
            if(november==null){
                htmlnovember+=`<td>November</td><td></td><td></td>
                        <td></td>`;
            $('#november').html(htmlnovember);
            $('#november').attr('class','bg-danger');
            }else{
                var total= november.wajibbayar-november.totalbayar;
                if(total==0){
                    keterangan='Lunas';
                    bg ='bg-success';
                }else{
                    keterangan='Belum Lunas';
                    bg ='bg-danger';
                }
                htmlnovember+=`<td>${november.gunabayar}</td><td>${Number(november.wajibbayar).toLocaleString("id-ID",{style:'currency', currency:'IDR'})}</td><td>${Number(november.totalbayar).toLocaleString("id-ID",{style:'currency', currency:'IDR'})}</td>
                <td>${new Date(november.tanggalbayar).toLocaleDateString('id-ID')}</td>`;
                $('#november').html(htmlnovember);
                $('#november').attr('class',bg);
            }
        }
    });
});

//Cari desember
$("#idsiswa").change(function(){
    var idsiswa = $("#idsiswa").val();
    var gunabayar = 'desember';
    $.ajax({
        url:`${baseurl}tu/tagihansiswa`,
        data:{id : idsiswa,gunabayar:gunabayar},
        cache:'false',
        async:'false',
        method: 'post',
        dataType: 'json',
        success: function(desember){
            var htmldesember='';
            if(desember==null){
                htmldesember+=`<td>Desember</td><td></td><td></td>
                        <td></td>`;
            $('#desember').html(htmldesember);
            $('#desember').attr('class','bg-danger');
            }else{
                var total= desember.wajibbayar-desember.totalbayar;
                if(total==0){
                    keterangan='Lunas';
                    bg ='bg-success';
                }else{
                    keterangan='Belum Lunas';
                    bg ='bg-danger';
                }
                htmldesember+=`<td>${desember.gunabayar}</td><td>${Number(desember.wajibbayar).toLocaleString("id-ID",{style:'currency', currency:'IDR'})}</td><td>${Number(desember.totalbayar).toLocaleString("id-ID",{style:'currency', currency:'IDR'})}</td>
                <td>${new Date(desember.tanggalbayar).toLocaleDateString('id-ID')}</td>`;
                $('#desember').html(htmldesember);
                $('#desember').attr('class',bg);
            }
        }
    });
});

//Cari januari
$("#idsiswa").change(function(){
    var idsiswa = $("#idsiswa").val();
    var gunabayar = 'Januari';
    $.ajax({
        url:`${baseurl}tu/tagihansiswa`,
        data:{id : idsiswa,gunabayar:gunabayar},
        cache:'false',
        async:'false',
        method: 'post',
        dataType: 'json',
        success: function(januari){
            var htmljanuari='';
            if(januari==null){
                htmljanuari+=`<td>Januari</td><td></td><td></td>
                        <td></td>`;
            $('#januari').html(htmljanuari);
            $('#januari').attr('class','bg-danger');
            }else{
                var total= januari.wajibbayar-januari.totalbayar;
                if(total==0){
                    keterangan='Lunas';
                    bg ='bg-success';
                }else{
                    keterangan='Belum Lunas';
                    bg ='bg-danger';
                }
                htmljanuari+=`<td>${januari.gunabayar}</td><td>${Number(januari.wajibbayar).toLocaleString("id-ID",{style:'currency', currency:'IDR'})}</td><td>${Number(januari.totalbayar).toLocaleString("id-ID",{style:'currency', currency:'IDR'})}</td>
                <td>${new Date(januari.tanggalbayar).toLocaleDateString('id-ID')}</td>`;
                $('#januari').html(htmljanuari);
                $('#januari').attr('class',bg);
            }
        }
    });
});

//Cari februari
$("#idsiswa").change(function(){
    var idsiswa = $("#idsiswa").val();
    var gunabayar = 'Februari';
    $.ajax({
        url:`${baseurl}tu/tagihansiswa`,
        data:{id : idsiswa,gunabayar:gunabayar},
        cache:'false',
        async:'false',
        method: 'post',
        dataType: 'json',
        success: function(februari){
            var htmlfebruari='';
            if(februari==null){
                htmlfebruari+=`<td>Februari</td><td></td><td></td>
                        <td></td>`;
            $('#februari').html(htmlfebruari);
            $('#februari').attr('class','bg-danger');
            }else{
                var total= februari.wajibbayar-februari.totalbayar;
                if(total==0){
                    keterangan='Lunas';
                    bg ='bg-success';
                }else{
                    keterangan='Belum Lunas';
                    bg ='bg-danger';
                }
                htmlfebruari+=`<td>${februari.gunabayar}</td><td>${Number(februari.wajibbayar).toLocaleString("id-ID",{style:'currency', currency:'IDR'})}</td><td>${Number(februari.totalbayar).toLocaleString("id-ID",{style:'currency', currency:'IDR'})}</td>
                <td>${new Date(februari.tanggalbayar).toLocaleDateString('id-ID')}</td>`;
                $('#februari').html(htmlfebruari);
                $('#februari').attr('class',bg);
            }
        }
    });
});

//Cari maret
$("#idsiswa").change(function(){
    var idsiswa = $("#idsiswa").val();
    var gunabayar = 'Maret';
    $.ajax({
        url:`${baseurl}tu/tagihansiswa`,
        data:{id : idsiswa,gunabayar:gunabayar},
        cache:'false',
        async:'false',
        method: 'post',
        dataType: 'json',
        success: function(maret){
            var htmlmaret='';
            if(maret==null){
                htmlmaret+=`<td>Maret</td><td></td><td></td>
                        <td></td>`;
            $('#maret').html(htmlmaret);
            $('#maret').attr('class','bg-danger');
            }else{
                var total= maret.wajibbayar-maret.totalbayar;
                if(total==0){
                    keterangan='Lunas';
                    bg ='bg-success';
                }else{
                    keterangan='Belum Lunas';
                    bg ='bg-danger';
                }
                htmlmaret+=`<td>${maret.gunabayar}</td><td>${Number(maret.wajibbayar).toLocaleString("id-ID",{style:'currency', currency:'IDR'})}</td><td>${Number(maret.totalbayar).toLocaleString("id-ID",{style:'currency', currency:'IDR'})}</td><td>${new Date(maret.tanggalbayar).toLocaleDateString('id-ID')}</td>`;
                $('#maret').html(htmlmaret);
                $('#maret').attr('class',bg);
            }
        }
    });
});

//Cari april
$("#idsiswa").change(function(){
    var idsiswa = $("#idsiswa").val();
    var gunabayar = 'April';
    $.ajax({
        url:`${baseurl}tu/tagihansiswa`,
        data:{id : idsiswa,gunabayar:gunabayar},
        cache:'false',
        async:'false',
        method: 'post',
        dataType: 'json',
        success: function(april){
            var htmlapril='';
            if(april==null){
                htmlapril+=`<td>April</td><td></td><td></td>
                        <td></td>`;
            $('#april').html(htmlapril);
            $('#april').attr('class','bg-danger');
            }else{
                var total= april.wajibbayar-april.totalbayar;
                if(total==0){
                    keterangan='Lunas';
                    bg ='bg-success';
                }else{
                    keterangan='Belum Lunas';
                    bg ='bg-danger';
                }
                htmlapril+=`<td>${april.gunabayar}</td><td>${Number(april.wajibbayar).toLocaleString("id-ID",{style:'currency', currency:'IDR'})}</td><td>${Number(april.totalbayar).toLocaleString("id-ID",{style:'currency', currency:'IDR'})}</td>
                <td>${new Date(april.tanggalbayar).toLocaleDateString('id-ID')}</td>`;
                $('#april').html(htmlapril);
                $('#april').attr('class',bg);
            }
        }
    });
});

//Cari mei
$("#idsiswa").change(function(){
    var idsiswa = $("#idsiswa").val();
    var gunabayar = 'Mei';
    $.ajax({
        url:`${baseurl}tu/tagihansiswa`,
        data:{id : idsiswa,gunabayar:gunabayar},
        cache:'false',
        async:'false',
        method: 'post',
        dataType: 'json',
        success: function(mei){
            var htmlmei='';
            if(mei==null){
                htmlmei+=`<td>Mei</td><td></td><td></td>
                        <td></td>`;
            $('#mei').html(htmlmei);
            $('#mei').attr('class','bg-danger');
            }else{
                var total= mei.wajibbayar-mei.totalbayar;
                if(total==0){
                    keterangan='Lunas';
                    bg ='bg-success';
                }else{
                    keterangan='Belum Lunas';
                    bg ='bg-danger';
                }
                htmlmei+=`<td>${mei.gunabayar}</td><td>${Number(mei.wajibbayar).toLocaleString("id-ID",{style:'currency', currency:'IDR'})}</td><td>${Number(mei.totalbayar).toLocaleString("id-ID",{style:'currency', currency:'IDR'})}</td>
                <td>${new Date(mei.tanggalbayar).toLocaleDateString('id-ID')}</td>`;
                $('#mei').html(htmlmei);
                $('#mei').attr('class',bg);
            }
        }
    });
});

//Cari Juni
$("#idsiswa").change(function(){
    var idsiswa = $("#idsiswa").val();
    var gunabayar = 'Juni';
    $.ajax({
        url:`${baseurl}tu/tagihansiswa`,
        data:{id : idsiswa,gunabayar:gunabayar},
        cache:'false',
        async:'false',
        method: 'post',
        dataType: 'json',
        success: function(juni){
            var htmljuni='';
            if(juni==null){
                htmljuni+=`<td>Juni</td><td></td><td></td>
                        <td></td>`;
            $('#juni').html(htmljuni);
            $('#juni').attr('class','bg-danger');
            }else{
                var total = juni.wajibbayar-juni.totalbayar;
                if(total==0){
                    keterangan='Lunas';
                    bg ='bg-success';
                }else{
                    keterangan='Belum Lunas';
                    bg ='bg-danger';
                }
                htmljuni+=`<td>${juni.gunabayar}</td><td>${Number(juni.wajibbayar).toLocaleString("id-ID",{style:'currency', currency:'IDR'})}</td><td>${Number(juni.totalbayar).toLocaleString("id-ID",{style:'currency', currency:'IDR'})}</td>
                <td>${new Date(juni.tanggalbayar).toLocaleDateString('id-ID')}</td>`;
                $('#juni').html(htmljuni);
                $('#juni').attr('class',bg);
            }
        }
    });
});

//Cari seragam
$("#idsiswa").change(function(){
    var idsiswa = $("#idsiswa").val();
    var gunabayar = 'Seragam';
    $.ajax({
        url:`${baseurl}tu/tagihansiswa2`,
        data:{id : idsiswa,gunabayar:gunabayar},
        cache:'false',
        async:'false',
        method: 'post',
        dataType: 'json',
        success: function(seragam){
            var htmlseragam='';
            if(seragam==null){
                htmlseragam+=`<td>Seragam</td><td></td><td></td>
                        <td></td>`;
            $('#seragam').html(htmlseragam);
            $('#seragam').attr('class','bg-danger');
            }else{
                var total= seragam.wajibbayar-seragam.totalbayar;
                if(total==0){
                    keterangan='Lunas';
                    bg ='bg-success';
                }else{
                    keterangan='Belum Lunas';
                    bg ='bg-danger';
                }
                htmlseragam+=`<td>${seragam.gunabayar}</td><td>${Number(seragam.wajibbayar).toLocaleString("id-ID",{style:'currency', currency:'IDR'})}</td><td>${Number(seragam.totalbayar).toLocaleString("id-ID",{style:'currency', currency:'IDR'})}</td>
                <td>${new Date(seragam.tanggalbayar).toLocaleDateString('id-ID')}</td>`;
                $('#seragam').html(htmlseragam);
                $('#seragam').attr('class',bg);
            }
        }
    });
});

//Cari alatpraktek
$("#idsiswa").change(function(){
    var idsiswa = $("#idsiswa").val();
    var gunabayar = 'Alat Praktek';
    $.ajax({
        url:`${baseurl}tu/tagihansiswa2`,
        data:{id : idsiswa,gunabayar:gunabayar},
        cache:'false',
        async:'false',
        method: 'post',
        dataType: 'json',
        success: function(alatpraktek){
            var htmlalatpraktek='';
            if(alatpraktek==null){
                htmlalatpraktek+=`<td>Alat Praktek</td><td></td><td></td>
                        <td></td>`;
            $('#alatpraktek').html(htmlalatpraktek);
            $('#alatpraktek').attr('class','bg-danger');
            }else{
                var total= alatpraktek.wajibbayar-alatpraktek.totalbayar;
                if(total==0){
                    keterangan='Lunas';
                    bg ='bg-success';
                }else{
                    keterangan='Belum Lunas';
                    bg ='bg-danger';
                }
                htmlalatpraktek+=`<td>${alatpraktek.gunabayar}</td><td>${Number(alatpraktek.wajibbayar).toLocaleString("id-ID",{style:'currency', currency:'IDR'})}</td><td>${Number(alatpraktek.totalbayar).toLocaleString("id-ID",{style:'currency', currency:'IDR'})}</td>
                <td>${new Date(alatpraktek.tanggalbayar).toLocaleDateString('id-ID')}</td>`;
                $('#alatpraktek').html(htmlalatpraktek);
                $('#alatpraktek').attr('class',bg);
            }
        }
    });
});

//Cari uanggedung
$("#idsiswa").change(function(){
    var idsiswa = $("#idsiswa").val();
    var gunabayar = 'Uang Gedung';
    $.ajax({
        url:`${baseurl}tu/tagihansiswa2`,
        data:{id : idsiswa,gunabayar:gunabayar},
        cache:'false',
        async:'false',
        method: 'post',
        dataType: 'json',
        success: function(uanggedung){
            var htmluanggedung='';
            if(uanggedung==null){
                htmluanggedung+=`<td>Uang Gedung</td><td></td><td></td>
                        <td></td>`;
            $('#uanggedung').html(htmluanggedung);
            $('#uanggedung').attr('class','bg-danger');
            }else{
                var total= uanggedung.wajibbayar-uanggedung.totalbayar;
                if(total==0){
                    keterangan='Lunas';
                    bg ='bg-success';
                }else{
                    keterangan='Belum Lunas';
                    bg ='bg-danger';
                }
                htmluanggedung+=`<td>${uanggedung.gunabayar}</td><td>${Number(uanggedung.wajibbayar).toLocaleString("id-ID",{style:'currency', currency:'IDR'})}</td><td>${Number(uanggedung.totalbayar).toLocaleString("id-ID",{style:'currency', currency:'IDR'})}</td>
                <td>${new Date(uanggedung.tanggalbayar).toLocaleDateString('id-ID')}</td>`;
                $('#uanggedung').html(htmluanggedung);
                $('#uanggedung').attr('class',bg);
            }
        }
    });
});

// ID GUNA BAYAR SPP UNTUK KE WAJIB BAYAR
$("#idgunabayar").change(function(){
    var idgunabayar = $("#idgunabayar").val();
    $.ajax({
        url:`${baseurl}tu/gunakewajib`,
        data:{id : idgunabayar},
        cache:'false',
        async:'false',
        method: 'post',
        dataType: 'json',
        success: function(gunabayar){
            $('#wajibbayar').val(gunabayar.wajibbayar);
        }
    });
});

//ID GUNA BAYAR NON SPP KE WAJIB BAYAR
$("#idgunabayarnon").change(function(){
    var idgunabayar = $("#idgunabayarnon").val();
    $.ajax({
        url:`${baseurl}nontu/gunakewajib`,
        data:{id : idgunabayar},
        cache:'false',
        async:'false',
        method: 'post',
        dataType: 'json',
        success: function(gunabayar){
            $('#wajibbayar').val(gunabayar.wajibbayar);
        }
    });
});






//end function
});


