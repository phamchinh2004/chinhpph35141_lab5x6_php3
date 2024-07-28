$(document).ready(function () {
    // $('#song').select2({
    //     placeholder: "Find songs",
    //     allowClear: true
    // });
    $('#songs').select2({
        tags: true,
        placeholder: "Enter your songs",
        tokenSeparators: [','],
        allowClear: true
    });
})