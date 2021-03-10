module.exports = {
    purge: [
        "*.php"
    ],
    darkMode: false, // or 'media' or 'class'
    theme: {
        extend: {},
    },
    variants: {
        extend: {},
    },
    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography")
    ],
}
