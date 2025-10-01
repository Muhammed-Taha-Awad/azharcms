(function ($) {
    'use strict';

    function patchSerializeObject() {
        if ($.fn._azharSerializeObjectPatched) {
            return;
        }

        if (typeof $.fn.serializeObject !== 'function') {
            return;
        }

        const originalSerializeObject = $.fn.serializeObject;

        $.fn.serializeObject = function () {
            try {
                syncAllRepeaters(this);
            } catch (error) {
                // Ignore sync errors to preserve original serializeObject behaviour.
            }

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

        $.fn._azharSerializeObjectPatched = true;
    }

    patchSerializeObject();

    function markRepeaterInputs($container) {
        $container.find(':input[name]').each(function () {
            const $input = $(this);

            if ($input.is('[data-azhar-repeater-json]')) {
                return;
            }

            $input.attr('data-azhar-repeater-input', 'true');
        });
    }

    function sanitizeRepeaterJson(value) {
        if (typeof value !== 'string') {
            return '';
        }

        return value
            .replace(/&quot;/g, '"')
            .replace(/&#x27;/g, "'")
            .replace(/&#39;/g, "'");
    }

    function parseRepeaterItems(value) {
        if (typeof value !== 'string') {
            return null;
        }

        const attempts = [value];
        const sanitized = sanitizeRepeaterJson(value);

        if (sanitized !== value) {
            attempts.push(sanitized);
        }

        for (let index = 0; index < attempts.length; index++) {
            const attempt = attempts[index];

            if (!attempt || !attempt.trim().length) {
                continue;
            }

            try {
                const parsed = JSON.parse(attempt);

                if (Array.isArray(parsed)) {
                    return parsed;
                }
            } catch (error) {
                // Ignore JSON parse errors, we'll try the next attempt.
            }
        }

        return null;
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

        let listName = $list.attr('data-repeater-list');

        if (!listName) {
            listName = $list.data('repeaterList') || $list.data('repeater-list');
        }

        if (!listName) {
            return;
        }

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

    function loadInitialRepeaterValues($wrapper, repeater) {
        if (!repeater || typeof repeater.setList !== 'function') {
            return;
        }

        const $target = $wrapper.find('[data-azhar-repeater-json]').first();

        if (!$target.length) {
            return;
        }

        const items = parseRepeaterItems($target.val());

        if (!items || !items.length) {
            return;
        }

        const normalizedItems = items.filter(function (item) {
            return item && typeof item === 'object' && !Array.isArray(item);
        });

        if (!normalizedItems.length) {
            return;
        }

        repeater.setList(normalizedItems);

        markRepeaterInputs($wrapper);

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
    }

    function syncAllRepeaters(context) {
        const $context = context ? $(context) : $(document);

        $context.find('.azhar-repeater').each(function () {
            syncRepeaterData($(this));
        });
    }

    function bindRepeaterEvents($wrapper) {
        $wrapper.on('change.azharRepeater keyup.azharRepeater', ':input', function () {
            syncRepeaterData($wrapper);
        });
    }

    function initRepeaters(context) {
        patchSerializeObject();

        const $context = context ? $(context) : $(document);

        $context.find('.azhar-repeater').each(function () {
            const $wrapper = $(this);

            if ($wrapper.data('azharRepeaterInitialized')) {
                syncRepeaterData($wrapper);
                return;
            }

            $wrapper.data('azharRepeaterInitialized', true);

            markRepeaterInputs($wrapper);

            const repeater = $wrapper.repeater({
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

            loadInitialRepeaterValues($wrapper, repeater);

            bindRepeaterEvents($wrapper);
            syncRepeaterData($wrapper);
        });
    }

    window.AzharShortcodeRepeater = {
        init: initRepeaters,
        syncAll: syncAllRepeaters,
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

    $(document).on('core-shortcode-config-loaded', function (event) {
        initRepeaters(event.target);
    });

    $(document).on('click.azharRepeater', '[data-bb-toggle="shortcode-add-single"]', function () {
        syncAllRepeaters($('.shortcode-data-form'));
    });
})(jQuery);
