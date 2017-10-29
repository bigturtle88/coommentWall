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
        "check_callback" : function (operation, node, parent, position, more) {
            if(operation === "copy_node" || operation === "move_node") {
                if(parent.id === "#") {
                    return false; // prevent moving a child above or below the root
                }
            }
            console.log(operation);
            return true; // allow everything else
        },
        "themes" : { "stripes" : true, },
        'data' :{
            'url': function (node) {
                return node.id === '#' ?
                    '/comment/read/' :
                    '/page/child/' + node.id ;
            },
            'dataType' : "json" }
    },
    "types" : {
        "#" : {
            "max_children" : 1,
            "max_depth" : 4,
            "valid_children" : ["root"]
        },
        "root" : {
            "icon" : false,
            "valid_children" : ["default"]
        },
        "default" : {
            "valid_children" : ["default","file"]
        },
        "file" : {
            "icon" : "glyphicon glyphicon-file",
            "valid_children" : []
        }
    },
    "plugins" : [
        "contextmenu", "dnd", "search",
        "state", "types", "wholerow"
    ]
});


