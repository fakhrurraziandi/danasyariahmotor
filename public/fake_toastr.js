

var duration = 15000;

toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": false,
    "progressBar": true,
    "positionClass": "toast-bottom-left",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "" +duration+"",
    "hideDuration": "" +duration+"",
    "timeOut": "" +duration+"",
    "extendedTimeOut": "" +duration+"",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
};



function generateRandomFakeToastr() {
    var randomMessages = [
        '201 user Berhasil Register, 10 Aplikasi telah mengajukan pinjaman dengan jaminan BPKB Motor',
    ];

    var key = Math.floor(Math.random() * randomMessages.length);
    var selectedRandomMessage = randomMessages[key];
    var message = selectedRandomMessage;

    toastr["success"](message);
}

// (function loop() {
//     var rand = Math.round(Math.random() * 10000);

    setInterval(function () {
        console.log('tik tok');
    }, 1000);

    generateRandomFakeToastr();

    setInterval(function () {
        generateRandomFakeToastr();
        // loop();
    }, duration);

//     console.log(rand);
// }());