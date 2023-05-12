/*!
 * JavaScript Cookie v2.2.0
 * https://github.com/js-cookie/js-cookie
 *
 * Copyright 2006, 2015 Klaus Hartl & Fagner Brack
 * Released under the MIT license
 */
; (function(factory) {
    var registeredInModuleLoader;
    if (typeof define === 'function' && define.amd) {
        define(factory);
        registeredInModuleLoader = true;
    }
    if (typeof exports === 'object') {
        module.exports = factory();
        registeredInModuleLoader = true;
    }
    if (!registeredInModuleLoader) {
        var OldCookies = window.Cookies;
        var api = window.Cookies = factory();
        api.noConflict = function() {
            window.Cookies = OldCookies;
            return api;
        };
    }
}(function() {
    function extend() {
        var i = 0;
        var result = {};
        for (; i < arguments.length; i++) {
            var attributes = arguments[i];
            for (var key in attributes) {
                result[key] = attributes[key];
            }
        }
        return result;
    }

    function init(converter) {
        function api(key, value, attributes) {
            if (typeof document === 'undefined') {
                return;
            }

            // Write

            if (arguments.length > 1) {
                attributes = extend({
                    path: '/'
                }, api.defaults, attributes);

                if (typeof attributes.expires === 'number') {
                    attributes.expires = new Date(new Date() * 1 + attributes.expires * 864e+5);
                }

                // We're using "expires" because "max-age" is not supported by IE
                attributes.expires = attributes.expires ? attributes.expires.toUTCString() : '';

                try {
                    var result = JSON.stringify(value);
                    if (/^[\{\[]/.test(result)) {
                        value = result;
                    }
                } catch (e) { }

                value = converter.write ?
                    converter.write(value, key) :
                    encodeURIComponent(String(value))
                        .replace(/%(23|24|26|2B|3A|3C|3E|3D|2F|3F|40|5B|5D|5E|60|7B|7D|7C)/g, decodeURIComponent);

                key = encodeURIComponent(String(key))
                    .replace(/%(23|24|26|2B|5E|60|7C)/g, decodeURIComponent)
                    .replace(/[\(\)]/g, escape);

                var stringifiedAttributes = '';
                for (var attributeName in attributes) {
                    if (!attributes[attributeName]) {
                        continue;
                    }
                    stringifiedAttributes += '; ' + attributeName;
                    if (attributes[attributeName] === true) {
                        continue;
                    }

                    // Considers RFC 6265 section 5.2:
                    // ...
                    // 3.  If the remaining unparsed-attributes contains a %x3B (";")
                    //     character:
                    // Consume the characters of the unparsed-attributes up to,
                    // not including, the first %x3B (";") character.
                    // ...
                    stringifiedAttributes += '=' + attributes[attributeName].split(';')[0];
                }

                return (document.cookie = key + '=' + value + stringifiedAttributes);
            }

            // Read

            var jar = {};
            var decode = function(s) {
                return s.replace(/(%[0-9A-Z]{2})+/g, decodeURIComponent);
            };
            // To prevent the for loop in the first place assign an empty array
            // in case there are no cookies at all.
            var cookies = document.cookie ? document.cookie.split('; ') : [];
            var i = 0;

            for (; i < cookies.length; i++) {
                var parts = cookies[i].split('=');
                var cookie = parts.slice(1).join('=');

                if (!this.json && cookie.charAt(0) === '"') {
                    cookie = cookie.slice(1, -1);
                }

                try {
                    var name = decode(parts[0]);
                    cookie = (converter.read || converter)(cookie, name) ||
                        decode(cookie);

                    if (this.json) {
                        try {
                            cookie = JSON.parse(cookie);
                        } catch (e) { }
                    }

                    jar[name] = cookie;

                    if (key === name) {
                        break;
                    }
                } catch (e) { }
            }

            return key ? jar[key] : jar;
        }

        api.set = api;
        api.get = function(key) {
            return api.call(api, key);
        };
        api.getJSON = function(key) {
            return api.call({
                json: true
            }, key);
        };
        api.remove = function(key, attributes) {
            api(key, '', extend(attributes, {
                expires: -1
            }));
        };

        api.defaults = {};

        api.withConverter = init;

        return api;
    }

    return init(function() { });
}));

/*** F Object prototype */
(function ($) {
    "use strict";

    /*== F Object prototype ======================*/
    var Fansi = function (option) {
        this.ajax_request = null;
        this.ajax_complete_callback = null;
        this.option = option || {};
        this.bind_state = true;
        this.init();
        // Set some property here later
    };

    Fansi.prototype = {
        init: function () {
            var $this = this
            
            return $this;
        },
        // Create url
        url: function (path) {
            var url = window.location.origin;

            if (typeof path == 'object') {
                url += '/' + this.http_build_query(path);
            }
            else if (typeof path == 'string') {
                if ((/^(http|https)\:\/\//ig).exec(path)) {
                    return path;
                }

                url += ("/" + path).replace(/[\/\\]+/g, "/");
            }
            
            return url;
        },
        redirect: function (path) {
            var url = this.url(path);
            window.location.href = url;
        },
        // Reload page
        reload: function () {
            window.location.reload();
        },
        // Submit form
        submit: function (form, redirect_url) {
            var form = $(form),
                action,
                redirect_url = redirect_url || null;

            if (form.length < 1) {
                if ((form = $(form.closest('form'))).length < 1) {
                    this.AlertError("No form found!");
                    return false;
                }
            }

            /*
            // Set form action
            if (!(action = form.attr('action'))) {
                form.attr('action', action = window.location.href);
            }

            if (redirect_url) {
                form.attr('action', action + (window.location.href.indexOf('?') !== -1 ? '&' : '?') + 'redirect=' + encodeURIComponent(redirect_url));
            }
            */

            // Update elements which has been cotrolled by CKEditor
            if (typeof CKEDITOR != "undefined") {
                for (var instance in CKEDITOR.instances) {
                    CKEDITOR.instances[instance].updateElement();
                }
            }

            // Submit form
            form.submit();
        },
        
        // Request ajax
        ajax: function (ajax_param, confirm, confirm_msg) {
            var $this = this,
                param = {
                    url: this.url(),
                    type: 'get',
                    dataType: 'json'
                },
                confirm = confirm || false,
                confirm_msg = confirm_msg || 'Are you sure you want to do this?';

            if (typeof ajax_param != "object") {
                return false;
            }

            // Check confirmation if required
            if (confirm == true) {
                var ret = $this.confirm(confirm_msg, function () {
                    $this.ajax(ajax_param, false);
                });
                return ret;
            }

            // Set ajax param
            ajax_param = $.extend(param, ajax_param);

            if (!$this.ajax_request) {
                // Do ajax
                $this.ajax_request = $.ajax(ajax_param);
            }
            else {
                $this.ajax_complete_callback = function () {
                    $this.ajax_request = $.ajax(ajax_param);
                };
            }

            return $this;
        },
        // Request ajax in sequence
        ajax_sequence: function (ajax_param, confirm, confirm_msg) {
            var $this = this,
                confirm = confirm || false,
                confirm_msg = confirm_msg || 'Are you sure you want to do this?',
                param = {
                    url: this.url(),
                    type: 'get',
                    dataType: 'json'
                };

            // Check confirmation if required
            if (confirm == true) {
                var ret = $this.confirm(confirm_msg, function () {
                    $this.ajax_sequence(ajax_param, false);
                });
                return ret;
            }

            // Set ajax param
            ajax_param = $.extend(param, ajax_param);

            if ($this.ajax_complete_callback === null || typeof $this.ajax_complete_callback == "function") {
                $this.ajax_complete_callback = [];
                $.ajax(ajax_param);
            }
            else {
                $this.ajax_complete_callback.push(function () {
                    $.ajax(ajax_param);
                });
            }

            return this;
        },
        // Show confirm popup
        confirm: function (msg, callback) {
            var $this = this,
                cbox = $('#confirm-box'),
                msg = msg || 'Are you sure you want to do this?';

            cbox.find('#confirm-msg').text(msg);
            if (!this.confirm_box) {
                // Create confirm box
                this.confirm_box = cbox.inbox({
                    duration: 200,
                    width: window.innerWidth,
                    background: 'rgba(0,0,0,.8)',
                    autoResign: true
                });
            }

            // Open confirm box an waite for user decition
            this.confirm_box.set({
                bootstrap: function (confirm_action, event) {
                    if ($(confirm_action).index()) {
                        callback.call();
                    }
                }
            }).open(true, function () {
                
            });
        },
        alert: function (message) {
            message && alert(message);
        },
        
        render: function (template, data) {
            var urlexp = new RegExp('(http|ftp|https)://[a-z0-9\-_]+(\.[a-z0-9\-_]+)+([a-z0-9\-\.,@\?^=%&;:/~\+#]*[a-z0-9\-@\?^=%&;/~\+#])?', 'gi');
            // Request to get template if template if needed
            if (urlexp.test(template)) {
                //
            }

            return Mustache.render(template, data);
        },
        // Parse string into array of values
        parse_str: function (url) {
            var vars = {},
                parts = url.replace(/[?&]+([^=&]+)=([^&]*)/gi,
                    function (m, key, value) {
                        vars[key] = value;
                    }
                );

            return vars;
        },
        // Generate URL-encoded query string
        http_build_query: function (param) {
            var query_string = '';
            if (typeof param != 'object' || !Object.keys(param).length) {
                return query_string;
            }

            query_string += '?';
            for (var i in param) {
                if (typeof param[i] == 'array' || typeof param[i] == 'object') {
                    param[i] = JSON.stringify(param[i]);
                }
                query_string += i + '=' + param[i] + '&';
            }

            return query_string.slice(0, -1);
        },
        // Add a state to the browsers history
        push_state: function (param, callback, url) {
            var state = {},
                title = '',
                request_url = window.location.href,
                index_q;

            (index_q = request_url.indexOf('?')) > 0 && (request_url = request_url.substr(0, index_q));

            if (typeof param == 'string') {
                param = this.parse_str(param);
            }
            else if (typeof param != 'object') {
                param = {};
            }

            if (typeof callback == 'function') {
                //state.callback = callback;
            }

            state = jQuery.extend(this.parse_str(window.location.href), param);

            // Create a new browser history state
            history.pushState(state, title, request_url + this.http_build_query(state));

            // Set history step
            if (this.history_state == undefined) this.history_state = 0;
            else this.history_state++;

            // Set state callback
            (this.history_state_callback == undefined) && (this.history_state_callback = []);
            if (this.history_state_callback[this.history_state] != undefined) {
                this.history_state_callback[this.history_state] = callback;
            }
            else this.history_state_callback.push(callback);

            return this;
        },
        // Load layout
        layout: function (url) {

        },
        StartLoading: function () {
            $('#page-loading').fadeIn(100);
        },
        StopLoading: function () {
            $('#page-loading').fadeOut(100);
        },
       
        UniqueId: function (length) {
            var d = new Date().getTime().toString(36).toUpperCase();
            var n = d.toString();
            var uniqueId = '';
            var length = parseInt(length > 0 ? length : 32);
            var p = 0;
            var chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';

            for (var i = length; i > 0; --i) {
                uniqueId += ((i & 1) && n.charAt(p) ? n.charAt(p) : chars[Math.floor(Math.random() * chars.length)]);
                if (i & 1) p++;
            };

            return uniqueId;
        },
        IsValidEmail: function (email) {
            var regex = /^(?:[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+\.)*[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+@(?:(?:(?:[a-zA-Z0-9](?:[a-zA-Z0-9\-](?!\.)){0,61}[a-zA-Z0-9]?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9\-](?!$)){0,61}[a-zA-Z0-9]?)|(?:\[(?:(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\.){3}(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\]))$/;
            return regex.test(email);
        }
    };

    // Set F as a global variable
    window.F = new Fansi();

    /*=================================================*/
    /*== F Box ========================================*/
    var Box = function (id) {
        this.id = id || 'undefined';
        this.window = window;
        this.width = 0;
        this.height = 0;
        this.width_scale = this.width / $(this.window).innerWidth();
        this.background = "#fff";
        this.stack = {};
        this.subject = '.fbox-subject';
        this.makeCopy = false;
        this.duration = 100;
        // Add box to a group of boxes
        //Fansi.call(this);
        !F.boxes && (window.F.boxes = {}); F.boxes[id] = this;
    };

    Box.prototype = Object.create(Fansi.prototype);
    Box.prototype.constructor = Box;

    // Box prototype init
    Box.prototype.init = function (subject, options) {
        var $this = this,
            options = typeof options == 'object' ? options : {};
        this.subject = $(subject || this.subject);

        // Set options
        this.setOption(options);

        // Create box
        if (!this.box) {
            this.createBox();
        }

        return this;
    };

    // Box prototype setOption
    Box.prototype.setOption = function (option) {
        var $this = this;

        for (var i in option) {
            this[i] = option[i];
        }

        this.document = this.window.document;

        return this;
    };

    // Box prototype set - Set obect property
    Box.prototype.set = function (key, value, replace) {
        var replace = replace || true;
        if (typeof key == "object" || typeof key == "array") {
            for (var i in key) {
                this.set(i, key[i]);
            }
        }
        else {
            if (!replace && typeof this[key] != "undefined") {
                return this;
            }

            this[key] = value;
        }

        return this;
    };

    // Box prototype get - Get object property
    Box.prototype.get = function (key) {
        return this[key] || null;
    };

    // Box prototype specify - Specify subject which will be showed on box
    Box.prototype.specify = function (elem) {
        if (elem !== undefined) {
            var element;

            if (elem.jquery != 'undefined') {
                element = elem;
            }
            else if ($(elem).length > 0) {
                element = $(elem);
            }

            return $(element);
        }

        return null;
    };

    // Box prototype createBox - Create box content holder
    Box.prototype.createBox = function () {
        // Get subject which will be showed in box
        this.subject = this.makeCopy == true ? $(this.subject).clone() : $(this.subject);
        var width = this.subject.outerWidth() || this.subject.data('box-h');
        var height = this.subject.outerHeight() || this.subject.data('box-h');
        var clone = this.subject.clone();
        $('footer').append(clone);
        height = clone.outerHeight();
        clone.remove();
        
        // Get box height		
        if (!this.height) {
            this.height = height;
            this.top = ($(this.window).innerHeight() - this.height);
            if (this.top > 0) {
                this.top = this.top / 2;
            }
            else {
                this.top = 30;
            }

            // Set box content body height
            if (this.header) {
                this.height += parseInt(this.box.find('.fbox-header').outerHeight());
            }
        }
        else {
            this.top = window.screen.outerHeight >= this.height ? (window.screen.outerHeight - this.height) / 2 : 0;
            // Set box content body height
            if (this.header) {
                this.boxContentWrapper.find('.fbox-content').css({
                    height: this.height - (this.box.find('.fbox-header').height() + 10)
                });
            }
        }

        // Get box width
        if (!this.width) {
            this.width = width;
        }

        // Create box
        this.box = $('<div class="fbox" id="box-' + this.id + '"></div>');
        // Create box background
        if (this.background == true) {
            this.box.append(this.boxBg = $('<div class="fbox-bg" style="position:fixed; left:0; top:0; right:0; bottom:0; z-index: 1; background-color: #222; opacity: 0.6;"></div>'));
        }
        // Create box content
        this.box.append(this.boxContentWrapper = $('<div class="fbox-content-wp"></div>'));
        // Create box content holder
        this.boxContentWrapper.append(this.boxContent = $('<div class="fbox-content-body"></div></div>'));

        // Prepend header if needed
        if (this.header) {
            this.boxContent.prepend('<div class="fbox-header"><i class="fa fa-lg fa-fw fa-times-circle" onclick="get_box(\'' + this.id + '\').close()"></i><i class="fa fa-lg ' + this.header.icon + ' icon-des"></i>' + this.header.title + '</div>');
        }

        // Append box to body
        $(this.document).find('body').append(this.box);

        this.boxContent.css({
            position: 'relative',
            margin: '0 auto'
        }).append(this.subject.css({ margin: '0 auto' }));;
        
        // Style box
        this.box.css({
            position: 'fixed',
            top: 0,
            right: 0,
            left: 0,
            bottom: 0,
            padding: 0,
            display: 'none',
            overflow: 'auto',
            'z-index': this.z_index || 99999999,
        });
        
        // Style box content wrapper
        this.boxContentWrapper.css({
            position: 'relative',
            overflow: 'hidden',
            margin: this.top + 'px auto 0',
            padding: 0,
            border: this.border,
            'z-index': 2
        });
        
        //return this.resize(this.width, this.height);
    };

    // Box prototype open - Open box
    Box.prototype.open = function (display, callback) {
        var display = display || true;
        if (this.subject.isDismiss()) {
            return;
        }

        if (!this.box) {
            // Resize box when window resizing
            this.bindWindowResize();
        }

        // Close box when pressing esc key
        this.bindEscape();

        if (display != false) {
            this.box.fadeIn(this.duration).find('.fbox-content-body > *').show();
        }

        if (typeof callback == "function") {
            callback.call(null, this);
        }

        return this;
    };

    // Box prototype close - Close box opening
    Box.prototype.close = function () {
        this.box.fadeOut(this.duration);

        if (typeof this.onClose == "function") {
            this.onClose.call(null, this);
        }

        return this;
    };

    // Box prototype addNode - Add element to box content
    Box.prototype.addNode = function (elem, parent) {
        var subject = $(this.subject);

        if (this.subject[0].tagName == 'IFRAME') { }

        //console.log(subject);
        if (!parent)
            subject.append(elem);
        else {
            subject.find(parent).append(elem);
        }

        return this;
    };

    // Box prototype clear - Clear box content
    Box.prototype.clear = function () {
        this.boxContent.empty();
        return this;
    };

    // Box prototype bindEscape - Determine closing box wherether or not
    Box.prototype.bindEscape = function () {
        var $this = this;
        $(this.document).unbind('keydown.fbox.' + $this.id).bind('keydown.fbox.' + $this.id, function (e) {
            var keycode = e.charCode || e.keyCode;
            if (keycode == 27) {
                $this.close();
            }
        });

        return $this;
    };

    // Box prototype bindWindowResize
    Box.prototype.bindWindowResize = function () {
        var $this = this;
        $(this.window).resize(function (e) {
            $this.resize(!$this.get('autoResize') ? 0 : $(this).innerWidth() - (parseInt($this.left) * 2), $this.height);
        });
        return $this;
    };

    // Box prototype resize
    Box.prototype.resize = function () {
        var top = ($(this.window).innerHeight() - this.height) / 2 - 50;
        var width, height, margin;

        if (top < 0) {
            margin = '20px auto';
            height = $(this.window).innerHeight() * 0.9;
        }
        else {
            margin = top + 'px auto';
        }

        // Resize box
        this.boxContentWrapper.css({
            height: height || this.height,
            margin: margin,
            overflow: 'auto'
        });

        return this;
    };

    // Assign Box to F
    window.F.box = new Box();

    /*=============================================*/
    //== F Task =========================================/
    var Task = function (option) {
        this.task = {};
        this.list = $('<ul class="task-list" />');
        this.selector = null;

        Fansi.call(this);
        // Add task list to group of task lists
        !window.F.tasks && (window.F.tasks = {});
    };

    Task.prototype = Object.create(Fansi.prototype);
    Task.prototype.constructor = Task;

    // Task prototype init
    Task.prototype.init = function () {
        // Set default tasks
        this.add('delete', 'click', function () { }, 'Delete', true)
            .add('trash', 'click', function () { }, 'Trash', true)
            .add('rename', 'click', function () { }, 'Rename..', true);

        return this;
    };

    // Task prototype get - Get a task
    Task.prototype.get = function (task) {
        return this.task[task] || null;
    };

    // Task prototype add - Add new task
    Task.prototype.add = function (task, event, handler, label, disable, icon, noop) {
        var task_obj = this.task[task];

        if (typeof event == "object") {
            var sample = {
                label: task,
                icon: '',
                event: 'click',
                handler: function () { },
                disable: false,
                noop: false
            };

            sample = $.extend(sample, event);
            this.add(task, sample.event, sample.handler, sample.label, sample.disable, sample.icon, sample.noop);

            return this;
        }

        if (!task_obj) {
            task_obj = {};
        }

        task_obj.name = task;
        task_obj.label = label || task;
        task_obj.icon = icon || '';
        task_obj.event = event || 'click';
        task_obj.handler = typeof handler == "function" ? handler : function () {/*Do nothing*/ };
        task_obj.disable = disable || false;
        task_obj.noop = noop || false;
        this.task[task] = task_obj;

        this.render(task);
        return this;
    };

    // Task prototype update - Updata task
    Task.prototype.update = function (task, option) {
        if (typeof option == "object" && this.task[task]) {
            //console.log(task, option);
            for (var i in option) {
                if (typeof this.task[task][i] != "undefined") {
                    this.task[task][i] = option[i];
                }
            }
            this.render(task);
        }

        return this;
    };

    // Task prototype render - Render task button
    Task.prototype.render = function (task) {
        var $this = this,
            task_obj,
            task_item,
            item,
            disable_class;

        // Remove if task not exists
        if (!(task_obj = this.get(task))) {
            return;
        }

        disable_class = task_obj.disable == true ? 'disabled' : '';
        item = '<li class="task ' + disable_class + '" data-task="' + task + '"><span class="task-icon"><i class="fa fa-sm fa-fw ' + task_obj.icon + '"></i></span><span class="task-label">' + task_obj.label + '</span></li>';

        if ((task_item = this.list.find('li[data-task="' + task + '"]')).length > 0)
            task_item.replaceWith(item);
        else {
            this.list.append(item);
        }

        task_item = this.list.find('li[data-task="' + task + '"]');

        if (!task_obj.disable && typeof task_obj.handler == "function") {
            var event = task_obj.event;
            this.list.find('[data-task="' + task + '"]').unbind(event).bind(event, function (e) {
                //console.log(event);
                task_obj.handler.call(null, $this, task_item);
            });
        }

        if (task_obj.noop == true) {
            task_item.unbind('click').bind('click', function (e) {
                e.preventDefault();
                return false;
            });
        }

        return this;
    };

    // Task prototype clear - Clear all task list
    Task.prototype.clear = function () {
        for (var task in this.task) {
            this.remove(task);
        }

        return this;
    };

    // Task prototype enable - Enable task which was disabled before
    Task.prototype.enable = function (task) {
        if (this.task[task]) {
            this.task[task]['disable'] = false;
            this.render(task);
        }

        return this;
    };

    // Task prototype disable - Disable task
    Task.prototype.disable = function (task) {
        if (this.task[task]) {
            this.task[task]['disable'] = true;
            this.render(task);
        }

        return this;
    };

    // Task prototype remove - Remove task out of task list
    Task.prototype.remove = function (task) {
        if (typeof task == "undefined") {
            task = [];
            for (var t in this.task) {
                task.push(t);
            }
        }

        if (typeof task == "array" || typeof task == "object") {
            for (var i in task) {
                this.remove(task[i]);
            }
            return this;
        }

        if (this.task[task]) {
            this.task[task] = null;
            this.list.find('[data-task="' + task + '"]').remove();
        }

        return this;
    };

    // Assign Task to F object
    window.F.task = new Task();

    //== jQuery extends =================================================/
	/**
	 * Show item on popup
	 */
    $.fn.fbox = function (options) {
        var id = this.get(0).id;
        
        if (id.length == 0) {
            id = F.UniqueId(8);
            $(this).attr('id', id);
        }
        
        if (!F.boxes[id]) {
            F.boxes[id] = new Box(id);
            F.boxes[id].init(this, options);
        }

        return F.boxes[id];
    };

    /**
	 * Dismiss popup to not open in current session
	 */
    $.fn.dismiss = function () {
        var id = this.selector.substr(this.selector.lastIndexOf(' ') + 1).replace(/(\#){1}/gi, '') || this.get(0).id;
        if (id.length > 0) {
            Cookies.set(id + '_dismiss', 1);
            try {
                $(this).fbox().close();
            }
            catch (ex) {}
        };
    };

    /**
	 * Check if popup is dismiss in current session
	 */
    $.fn.isDismiss = function () {
        var id = this.get(0).id;
        var dismiss = Cookies.get(id + '_dismiss');
        
        return (typeof dismiss != "undefined" && dismiss == 1);
    };
    //== jQuery DOM Events ==============================================/
    

    //===================================================================/
})(jQuery);

