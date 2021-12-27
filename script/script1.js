$(document).ready(function () {
    $('.myCard').css('opacity', '1');
    setInterval(update, 1000);
    $('#tambah').click(function (event) {
        event.preventDefault();
        clearInterval(0);
    });
    function update() {
        var date = new Date();
        $('#clock').css({ 'color': '#fff', 'text-shadow': '0 0 6px #fff' });
        function ubah(x) {
            if (x < 10) return x = '0' + x;
            else return x;
        }

        function twelveHour(x) {
            if (x > 12) return x = x - 12;
            else if (x == 0) return x = 12;
            else return x;
        }
        var Y = ubah(date.getFullYear());
        var M = ubah(date.getMonth());
        var D = ubah(date.getDate());
        var j = ubah(date.getHours());
        var m = ubah(date.getMinutes());
        var d = ubah(date.getSeconds());
        $('#clock').text(j + ':' + m + ':' + d + ' ' + D + '-' + M + '-' + Y)
    }
    update();
    $('.modalTambah').click(function () {
        $('#formModalLabel').html('Tambah Film');
        $('.modal-footer button[type=submit]').html('Tambahkan');
        $('.modal-body form').attr('action', 'db/create.php')
        $('#film_id').val('');
        $('#title').val('');
        $('#length ').val('');
        $('#release_year ').val('');
        $('#rental_duration').val('');
        $('#language_id').val('1');
        $('#rental_rate').val('');
        $('#replacement_cost').val('');
        $('#description').val('');
        $('#rating').val('1');
    })
    $('.modalUbah').click(function () {
        $('#formModalLabel').html('Ubah Data Film');
        $('.modal-footer button[type=submit]').html('Ubah');
        $('.modal-body form').attr('action', 'db/update.php')

        const id = $(this).data('id');
        console.log(id);
        $.ajax({
            url: 'db/json.php',
            data: { id: id },
            method: 'get',
            dataType: 'json',
            success: function (data) {
                $('#film_id').val(data.film_id);
                $('#title').val(data.title);
                $('#length ').val(data.length);
                $('#release_year ').val(data.release_year);
                $('#rental_duration').val(data.rental_duration);
                $('#language_id').val(data.language_id);
                $('#rental_rate').val(data.rental_rate);
                $('#replacement_cost').val(data.replacement_cost);
                $('#description').val(data.description);
                var rating = '';
                if (data.rating == 'G') {
                    rating = '1';
                } else if (data.rating == 'PG') {
                    rating = '2';
                } else if (data.rating == 'PG-13') {
                    rating = '3';
                } else if (data.rating == 'R') {
                    rating = '4';
                } else if (data.rating == 'NC-17') {
                    rating = '5';
                }
                $('#rating').val(rating);
            }
        })

    })
    $('.userModal').click(function () {
        const id = $(this).data('id');
        console.log(id);
        $.ajax({
            url: 'db/user.php',
            data: { id: id },
            method: 'get',
            dataType: 'json',
            success: function (data) {
                $('#id').val(data.id);
                $('#username').val(data.username);
                $('#avatar').val(data.avatar);
            }
        })

    })
})
