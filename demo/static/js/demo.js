$(function () {

    bindScript();

});

function bindScript() {

    $('a[data-json]').on('click', function () {

        var param = $(this).data('json');

        if (!$.isPlainObject(param)) {
            param = $.parseJSON(param);
        }

        var ajax = param.ajax ? param.ajax : {};

        if (param.confirm) {
            confirmScript(param.confirm, ajax);
        } else if (param.prompt) {
            promptScript(param.prompt, ajax);
        }

        return false;
    });
}

/**
 *
 * @param param
 * @returns {boolean}
 */
function asyncRequest(param) {

    if (!param.url) {
        return;
    }

    $.ajax({
        url: param.url,
        type: param.type ? param.type : 'post',
        data: param.data ? param.data : {},
        dataType: param.dataType ? param.dataType : 'json',
        success: function (resp) {
            if (resp.code) {
                if (param.redirect) {
                    window.location.href = param.redirect;
                }

                if (resp.url) {
                    window.location.href = param.url;
                }
            }
        }
    });

    return true;
}

/**
 *
 * @param param
 * @param ajax
 */
function confirmScript(param, ajax) {
    var message = param.message ? param.message : '请再次确认?';
    var config = param.config ? param.config : {title: '请确认', icon: 3};
    layer.confirm(message, config, function () {
        if (ajax) {
            asyncRequest(ajax);
        }
    });
}

/**
 *
 * @param param
 * @param ajax
 */
function promptScript(param, ajax) {

    if (!param.input) {
        return;
    }

    var input = param.input;
    var config = param.config ? param.config : {title: '请确认', icon: 3};

    if (input) {

        var content = '';

        var concat = function (item) {
            return '<div class="prompt-input">'
                + item.title
                + ' <input name="' + item.name + '" value="' + item.value + '" data-message="' + item.message + '"/>'
                + '</div>';
        };

        if ($.isArray(input)) {
            for (var i in input) {
                content += concat(input[i]);
            }
        } else {
            content += concat(input);
        }

        layer.open({
            title: config.title ? config.title : '请输入',
            content: content,
            area: ["500px", ""],
            yes: function () {
                if (ajax) {
                    var error = false;
                    $('.prompt-input input').each(function () {
                        var name = $.trim($(this).attr('name'));
                        var value = $.trim($(this).val());
                        var message = $.trim($(this).data('message'));
                        if (message && !value) {
                            layer.tips(message, $(this));
                            error = true;
                            return;
                        } else {
                            ajax.data[name] = value;
                        }
                    });
                    if (error) {
                        return;
                    }
                    layer.closeAll();
                    asyncRequest(ajax);

                }
            }
        });
    }
}
