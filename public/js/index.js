const activeMenu = $('.kt-menu__nav').find('.current-menu');
if(activeMenu.parent().hasClass('kt-menu__subnav'))
{
    activeMenu.parent().parent().parent().addClass('kt-menu__item--open');
}

$('.button-logout').click(function () {
    swal.fire({
        title: 'Apakah anda akan keluar?',
        text: "Sampai jumpa kembali!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Keluar!',
        cancelButtonText: 'Batal!',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
    }).then(function(result) {
        if (result.value) {
            $('.do-logout').submit();
        }
    });
});

/**
 * checking checkbox input for delete action
 */
const check_checked = function (button = '#delete_button') {
    const checked_count = $('input:checkbox[name="id[]"]:checked').length;
    if (checked_count > 0) {
        // $('#delete_button').prop('disabled', false);
        $(button).show();
    } else {
        // $('#delete_button').prop('disabled', true);
        $(button).hide();
    }
};

/**
 * checkbox target to chek all checkbox input
 */
$('#check_all').click(function () {
    $('input:checkbox[name="id[]"]').not(this).prop('checked', this.checked);
    var button = ($(this).data('button')) ? $(this).data('button') : '#delete_button';
    check_checked(button);
});


const remove = function (id) {
    Swal.fire({
        title: 'Apakah anda yakin?',
        text: "Data yg dihapus tidak dapat dipulihkan kembali!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Batal!'
    }).then((result) => {
        if (result.value) {
            $('#' + id).submit();
        }
    });
};

/*
 * set thumbnail image to target
 * @param {type} input
 * @param {type} target_img
 * @param {type} target_name
 * @returns {void}
 */
var setThumbnail = function (input, target_img) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();

        reader.onload = function (e) {
            $('#' + target_img).attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

var setThumbnailHolder = function (input, img) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function (e) {
            $(img).attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

