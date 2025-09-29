@once
    <script src="{{ asset('vendor/azharcms/jquery.repeater.min.js') }}"></script>
    <script src="{{ asset('vendor/azharcms/azhar-shortcode-repeater.js') }}"></script>
    <script>
        document.addEventListener('botble.plugin.shortcode.init', function (event) {
            if (window.AzharShortcodeRepeater) {
                window.AzharShortcodeRepeater.init(event.target);
            }
        });

        if (window.AzharShortcodeRepeater) {
            window.AzharShortcodeRepeater.init(document);
        }
    </script>
@endonce
