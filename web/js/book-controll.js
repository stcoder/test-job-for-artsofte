$(function() {

    var buttonGetBooks = $('.button-getBooks-wrap');
    var errorBlock = buttonGetBooks.children('.info-error-block');
    var infoBlock = buttonGetBooks.children('.info-muted-block');
    var preloader = buttonGetBooks.children('.preloader');
    var link = buttonGetBooks.children('a');
    var table = $('.books-list');
    var dialogModal = $('#dialog-modal');

    table.on('click', '.line', function() {
        var description = $(this).data('description');
        var title = $(this).find('td:last-child').text();
        dialogModal.html(description);
        dialogModal.dialog({
            width: 512,
            modal: true,
            title: title
        });
    });

    link.on('click', function() {
        var $this = $(this);
        var offset = table.find('.line').length;
        var link = $this.attr('href') + '?offset=' + offset;
        $this.hide();
        preloader.show();
        $.getJSON(link, function(response) {
            table.children('tbody').append(response.books_list);
            if (response.is_last) {
                $this.hide();
                preloader.hide();
                infoBlock.show();
            } else {
                $this.show();
                preloader.hide();
            }
        });
        return false;
    });

    $(document).ajaxError(function() {
        preloader.hide();
        infoBlock.hide();
        link.show();
        errorBlock.show().delay(2200).fadeOut();
    });

});