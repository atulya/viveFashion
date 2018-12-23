var base_url = 'http://papermuglab.com/vf/admin/';
var CURRENT_URL = window.location.href.split('#')[0].split('?')[0];
var nav_bar = $('.navbar-collapse');
nav_bar.find('a[href="' + CURRENT_URL + '"]').parent('li').addClass('current-page');
nav_bar.find('a').filter(function () {
    return this.href == CURRENT_URL;
}).parent('li').addClass('current-page').parents('ul').slideDown(function () {
    setContentHeight();
}).parent().addClass('active');
function showModal(id, name) {
    var subject = $('input[name=subject_' + id + ']').val();
    var message = $('input[name=message_' + id + ']').val();
    $('#name').html(name);
    $('#subject').html(subject);
    $('#message').html(message);
    $('#myModal').modal('show');
}
function blockUser(userID, elem) {
    if (confirm('Are you sure?')) {
        var title = elem.title;
        var state, className, newTitle, removeClass = '';
        if (title == 'Want to block?') {
            state = 1;
            className = 'fa fa-lock';
            removeClass = 'fa fa-unlock';
            newTitle = 'Want to unblock?';
        } else {
            state = 0;
            className = 'fa fa-unlock';
            removeClass = 'fa fa-lock';
            newTitle = 'Want to block?';
        }
        $.post(base_url + 'user/blockUser', {user: userID, state: state}, function (data) {
            if (data == 1) {
                elem.title = newTitle;
                $(elem).children('li').removeClass(removeClass);
                $(elem).children('li').addClass(className);
            }
        });
    }
}
function blockBusiness(businessID, elem) {
    if (confirm('Are you sure?')) {
        var title = elem.title;
        var state, className, newTitle, removeClass = '';
        if (title == 'Want to block?') {
            state = 1;
            className = 'fa fa-lock';
            removeClass = 'fa fa-unlock';
            newTitle = 'Want to unblock?';
        } else {
            state = 0;
            className = 'fa fa-unlock';
            removeClass = 'fa fa-lock';
            newTitle = 'Want to block?';
        }
        $.post(base_url + 'business/blockBusiness', {business: businessID, state: state}, function (data) {
            if (data == 1) {
                elem.title = newTitle;
                $(elem).children('li').removeClass(removeClass);
                $(elem).children('li').addClass(className);
            }
        });
    }
}

function deleteRow(notificationID) {
    if (confirm('Are you sure?')) {
        var url = $("input[name='url']").val();
        $.post(url, {id: notificationID}, function (data) {
            $('#row_' + notificationID).remove();
            var total = parseInt($('#total_count').html());
            $('#total_count').html(total - 1);
        });
    }
}