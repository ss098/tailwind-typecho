let mix = require("laravel-mix")

mix.css("app.css", "app.min.css", [
    require("tailwindcss")
])
.disableSuccessNotifications()