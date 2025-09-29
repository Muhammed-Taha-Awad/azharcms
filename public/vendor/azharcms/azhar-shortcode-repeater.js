(function ($) {
    'use strict';

    if (!$.fn._azharSerializeObjectPatched) {
        $.fn._azharSerializeObjectPatched = true;

        const originalSerializeObject = $.fn.serializeObject;

        $.fn.serializeObject = function () {
            const disabled = [];

            this.find('[data-azhar-repeater-input]').each(function () {
                const input = this;

                disabled.push({
                    element: input,
                    disabled: input.disabled,
                });

                input.disabled = true;
            });

            const result = originalSerializeObject.call(this);

            disabled.forEach(({ element, disabled }) => {
                element.disabled = disabled;
            });

            return result;
        };
    }

    function markRepeaterInputs($container) {
        $container.find(':input[name]').each(function () {
            $(this).attr('data-azhar-repeater-input', 'true');
        });
    }

    function getFieldKey(name, listName) {
        const match = name.match(/\[[^\]]+\]$/);

        if (!match) {
            return name;
        }

        return match[0].replace('[', '').replace(']', '');
    }

    function extractItemData($item, listName) {
        const data = {};

        $item.find(':input[name]').each(function () {
            const $input = $(this);
            const name = $input.attr('name');

            if (!name || name === listName) {
                return;
            }

            $input.attr('data-azhar-repeater-input', 'true');

            const key = getFieldKey(name, listName);

            if (!key.length) {
                return;
            }

            let value;

            if ($input.is(':checkbox')) {
                value = $input.prop('checked');
            } else if ($input.is(':radio')) {
                if (!$input.prop('checked')) {
                    return;
                }

                value = $input.val();
            } else {
                value = $input.val();
            }

            data[key] = value;
        });

        return data;
    }

    function syncRepeaterData($wrapper) {
        const $list = $wrapper.find('[data-repeater-list]').first();

        if (!$list.length) {
            return;
        }

        const listName = $list.data('repeater-list');
        const $target = $wrapper.find(`[data-azhar-repeater-json="${listName}"]`).first();

        if (!$target.length) {
            return;
        }

        const items = [];

        $list.find('[data-repeater-item]').each(function () {
            const itemData = extractItemData($(this), listName);

            if (Object.keys(itemData).length) {
                items.push(itemData);
            }
        });

        $target.val(JSON.stringify(items));
    }

    function bindRepeaterEvents($wrapper) {
        $wrapper.on('change.azharRepeater keyup.azharRepeater', ':input', function () {
            syncRepeaterData($wrapper);
        });
    }

    function initRepeaters(context) {
        const $context = context ? $(context) : $(document);

        $context.find('.azhar-repeater').each(function () {
            const $wrapper = $(this);

            if ($wrapper.data('azharRepeaterInitialized')) {
                syncRepeaterData($wrapper);
                return;
            }

            $wrapper.data('azharRepeaterInitialized', true);

            markRepeaterInputs($wrapper);

            $wrapper.repeater({
                initEmpty: false,
                defaultValues: {},
                show: function () {
                    const $item = $(this);
                    $item.hide().slideDown(150, function () {
                        markRepeaterInputs($item);

                        if (window.Botble) {
                            window.Botble.initResources();
                            window.Botble.initMediaIntegrate();
                            window.Botble.initCoreIcon();
                        }

                        if (window.EDITOR && typeof window.EDITOR.init === 'function') {
                            window.EDITOR.init();
                        } else if (window.EditorManagement) {
                            window.EDITOR = new EditorManagement().init();
                        }

                        syncRepeaterData($wrapper);
                    });
                },
                hide: function (deleteElement) {
                    $(this).slideUp(150, function () {
                        deleteElement();
                        syncRepeaterData($wrapper);
                    });
                }
            });

            bindRepeaterEvents($wrapper);
            syncRepeaterData($wrapper);
        });
    }

    window.AzharShortcodeRepeater = {
        init: initRepeaters,
    };

    $(document).ready(function () {
        initRepeaters(document);
    });

    $(document).on('shown.bs.modal', function (event) {
        initRepeaters(event.target);
    });

    $(document).on('botble.plugin.shortcode.init', function (event) {
        initRepeaters(event.target);
    });
})(jQuery);
