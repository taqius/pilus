const flashData = $('.flash-data').data('flashdata');

if (flashData) {
    Swal({
        title: 'Data',
        text: 'Berhasil ' + flashData,
        type: 'success'
    });
}

// tombol-hapus
$('.tombol-hapus').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');
    const nama = $("#nama").val();
    Swal({
        title: 'Apakah anda yakin',
        text: "data " + nama + " akan dihapus",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus Data!'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })

});



