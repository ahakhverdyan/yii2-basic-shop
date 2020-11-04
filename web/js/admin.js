$(function() {
    $(".sidebar-menu a").each(function () {
        let location = window.location.protocol + '//' + window.location.host + window.location.pathname;
        let href = this.href;

        if(href == location) {
            $(".sidebar-menu li").removeClass('active');
            $(this).parent().addClass('active').closest('.treeview').addClass('active');
        }

    })
});