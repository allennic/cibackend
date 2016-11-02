function postajax(e) {
        //alert("test");
        $.ajax({
            type: 'post',
            url: '/index.php/admin/home/delete',
            data: {"boss_id" : "<?php print_r($out1['boss_id']);?>"},
            //dataType: 'json',
            success : function (response) {
                $(e).parents("tr").remove();
            }
        });
    }
