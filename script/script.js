$(document).ready(function () {
    update();
    setInterval(update, 1000);
})

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
    $('#clock').text(j+':'+m+':'+d+' '+D+'-'+M+'-'+Y)
}