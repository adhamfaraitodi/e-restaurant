import './bootstrap';
import '../assets/bootstrap/dist/css/bootstrap.min.css';
import '../assets/font-awesome/css/font-awesome.min.css';
import '../assets/nprogress/nprogress.css';
import '../assets/iCheck/skins/flat/green.css';
import '../assets/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css';
import '../assets/jqvmap/dist/jqvmap.min.css';
import '../assets/bootstrap-daterangepicker/daterangepicker.css';
import '../assets/custom.min.css';

let ManageMenuTable = new DataTable('#ManageMenuTable',{
    lengthMenu: [[5,10,-1],[5,10,'All']]
});

window.destroyMenu = function (idMenu) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "POST",
        url: "/admin/menu/" + idMenu + "/delete",
        data: {
            token : "<?php echo csrf_token() ?>"
        },
        dataType: 'json',
        success: function (response) {
            alert(response.success);
            // mendapatkan instance datatable


        // menghapus baris saat tombol di klik
        ManageMenuTable.row($('#btnMenuDelete' + idMenu).closest('tr')).remove().draw();

        }
    });
}

