https://www.w3schools.com/howto/howto_google_translate.asp
https://codepen.io/csesumonpro/pen/mdJQMGN?fbclid=IwAR2Lkm9WHsNdY88Qq6MT1ZAe6i8DJU4OKfJ3BmD1FrZJo87JanB2G5Oy0r4
<!DOCTYPE html>
<html lang="en-US">
<style>
    .translated-ltr {
        margin-top: -40px;
    }
    .translated-ltr {
        margin-top: -40px;
    }
    .goog-te-banner-frame {
        display: none;
        margin-top: -20px;
    }
    .goog-logo-link {
        display: none !important;
    }
    .goog-te-gadget {
        color: transparent !important;
    }
</style>

<body>

    <h1>My Web Page</h1>
    <p>Hello everybody!</p>
    <p>Translate this page:</p>
    <div id="google_translate_element"></div>
    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'en'
            }, 'google_translate_element');
        }
    </script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</body>
</html>



https://github.com/Stichoza/Google-Translate-PHP
use Stichoza\GoogleTranslate\GoogleTranslate;

$tr = new GoogleTranslate('en'); // Translates into English
echo GoogleTranslate::trans('Hello again', 'ka', 'en');