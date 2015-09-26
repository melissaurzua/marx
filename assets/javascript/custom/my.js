// my JavaScript
var ROOT = $('body').attr('data-root');

var actions = [
    'shopping_list',
    'group',
    'group_year'
];

var actionContainers = $('.group-outer-container');
var activeActionIndex = $('#group-outer').attr('data-index');

var indexMatches = (document.location.href + '').match('(/index/)([0-9])/');
if (indexMatches && indexMatches[2]){
    goToAction(indexMatches[2]);
}



$('body').delegate('a', 'click', function(event){
    if ($(this).attr('href') && $(this).attr('href') != 'javascript:void(0);'){
        event.preventDefault();
        document.location = $(this).attr('href');
    }
});

var payGroups = $('.pay-groups a');

if ($(payGroups).length > 0){
    $(payGroups).click(function() {
        $(payGroups).removeClass('selected');
        $(this).addClass('selected');
        $('#id_group').attr('value', $(this).attr('data-id'));
        $('#pay').removeAttr('disabled');
    })
}

function update() {
    var updateElement = $('.update');

    if ($(updateElement).length > 0) {
        $.getJSON(
            ROOT + 'response/json/controller/live/id/' + $('#group-outer').attr('data-id') + '/',
            function(data) {
                $.each(data.sizes, function(index, size){
                    $('.update .group-id-' + size.id).css('height', size.height + '%');
                    $('.update .group-id-' + size.id + ' .member-value').text(size.total);
                });
            }
        );
        window.setTimeout(update, 3000);
    } else {
        window.setTimeout(update, 3000);
    }
}


update();

$('body').delegate('a', 'click', function(){

    if ($(this).attr('data-uri')){
        var uri = $(this).attr('data-uri');
        var index = $(this).attr('data-target');

        loadDataUri(
            uri,
            actionContainers[index],
            activeActionIndex,
            index
        );
        activeActionIndex = index;
    }
});



function goToAction(newIndex) {
    newIndex = Math.max(0, Math.min(2, newIndex));
    if (newIndex == activeActionIndex){
        return;
    }

    loadData(
        actions[newIndex],
        {
            id : $('#group-outer').attr('data-id')
        },
        actionContainers[newIndex],
        activeActionIndex,
        newIndex
    );

    activeActionIndex = newIndex;
}

function loadData(controller, params, target, oldIndex, newIndex){
    params = params || [];
    var uri = ROOT + 'only_controller/1/controller/' + controller + '/';
    $.each(params, function(index, value) {
        uri += index + '/' + value + '/';
    });

    loadDataUri(uri, target, oldIndex, newIndex);
}

function loadDataUri(uri, target, oldIndex, newIndex) {
    $.get(uri, function(data) {
        $(target).html(data);
        $('.group-outer-scroller').removeClass('active-' + oldIndex);
        $('.group-outer-scroller').addClass('active-' + newIndex);

        $('.pagination').removeClass('active-' + oldIndex);
        $('.pagination').addClass('active-' + newIndex);
        $('.navigation').removeClass('active-' + oldIndex);
        $('.navigation').addClass('active-' + newIndex);
        var link = $('.add-button');
        $(link).removeClass('hide');
        switch(newIndex){
            case 0 :
                $(link).attr(
                    'href',
                    ROOT + 'controller/shopping_list_add/'
                );
                break;
            case 1 :
                $(link).attr(
                    'href',
                    ROOT + 'controller/pay_add/'
                );
                break;
            case 2 :
                $(link).addClass('hide');
                break;
        }

    });
}

$('.cycles a').click(function() {
    $('#cycle').attr('value', $(this).attr('data-id'));
    $('.cycles a').removeClass('selected');
    $(this).addClass('selected');
})


$('#group-outer').swipe({
    swipe:function(event, direction, distance, duration, fingerCount, fingerData) {
        switch(direction){
            case 'left':
                goToAction(activeActionIndex + 1);
                break;
            case 'right':
                goToAction(activeActionIndex - 1);
                break;
            case 'down':
                if (!$('.navigation').hasClass('topnav-open')){
                  toggleList();
                }
                break;
            case 'up':
                if ($('.navigation').hasClass('topnav-open')){
                    toggleList();
                }
                break;
        }
    }
});

window.setInterval(
    function() {
        $('.splash').addClass('disabled')
        window.setInterval(
            function(){
                $('.splash').remove();
            },
            2000
        )
    },
    3000
);