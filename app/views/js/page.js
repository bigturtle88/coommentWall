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
        "themes" : { "stripes" : true },
        'data' :{
            "state" : {"opened" : true },
            'url': function (node) {
                return node.id === '#' ?
                    '/comment/read/' :
                    '/comment/read/' + node.id ;
            },
            'dataType' : "json" },

    },
    "contextmenu":{
        "items": function($node) {
            var tree = $("#tree").jstree(true);
            return {
                "Create": {
                    "separator_before": false,
                    "separator_after": false,
                    "label": "Comment",
                    "action": function (obj) {
                        $node = tree.create_node($node, { "attr": { "rel": "Category"}, "text": "Comment" });
                        tree.edit($node);
                    }
                },
                "Rename": {
                    "separator_before": false,
                    "separator_after": false,
                    "label": "Edit",
                    "action": function (obj) {
                        tree.edit($node);
                    }
                },
                "Remove": {
                    "separator_before": false,
                    "separator_after": false,
                    "label": "Delete",
                    "action": function (obj) {
                        tree.delete_node($node);
                    }
                }
            };
        }
    },
    "types" : {
        "#" : {
            "max_children" : 1,
            "max_depth" : 4,
            "valid_children" : ["default","file"],
            "icon" : "glyphicon glyphicon-file",
        },
        "root" : {
            "icon" : "glyphicon glyphicon-file",
            "valid_children" : ["default"]
        },
        "default" : {
            "max_children": 1,
            "max_depth": 4,
            "valid_children": ["default", "file"],
            "icon": "glyphicon glyphicon-file",
        }
    },
    "plugins" : [
        "contextmenu","types"
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
