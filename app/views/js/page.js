//$('.list').infiniteScroll({
//    // options
//    path: '.pagination__next',
//    append: '.post',
//    history: false,
//});
$('#send').click(function(){
    $.ajax({
        type: 'GET',
        url: '/comment/creat/' + $('#text').val(),
        success: function(){
            $('#tree').jstree("refresh");
        }
    });
    console.log($('#text').val());});
$('#tree').jstree({
    "core" : {
        "animation" : 0,
        "check_callback": function () {
            return true; // allow everything else
        },
        "themes" : { "stripes" : true, },
        'data' :{
            'url': function (node) {
                return node.id === '#' ?
                    '/comment/read/' :
                    '/comment/read/' + node.id ;
            },
            'dataType' : "json" }
    },
    "types" : {
        "#" : {
            "max_children" : 1,
            "max_depth" : 2,
            "valid_children" : ["root"]
        },
        "default" : {
            "valid_children" : ["default","file"]
        },
    },
    "plugins" : [
        "contextmenu", "dnd", "search",
        "state", "types", "wholerow"
    ]
}).on('create_node.jstree', function (e, data) {

    $.get('/comment/creat/'+ data.node.text + '/' + data.node.parent)
        .done(function (d) {
            obj =  jQuery.parseJSON(d);
            data.instance.set_id(data.node, obj.id);
        })
        .fail(function () {
            data.instance.refresh();
        });
}).on('rename_node.jstree', function (e, data) {
    $.get('/comment/update/' + data.node.id + '/' + data.node.text)
        .done(function (d) {
            data.instance.refresh();
        })
        .fail(function () {
            data.instance.refresh();
        });
}).on('delete_node.jstree', function (e, data) {
    $.get('/comment/delete/' + data.node.id + '/' + data.node.text)
        .fail(function () {
            data.instance.refresh();
        });
});
