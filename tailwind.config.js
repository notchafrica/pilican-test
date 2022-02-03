const defaultTheme = require("tailwindcss/defaultTheme");
const colors = require("tailwindcss/colors");

module.exports = {
    theme: {
        extend: {
            fontFamily: {
                sans: ["Inter var", ...defaultTheme.fontFamily.sans],
            },
            sizing: {
                "w-70": "17rem",
            },
            colors: {
                primary: colors.indigo,
            },
        },
    },
    presets: [require("./vendor/wireui/wireui/tailwind.config.js")],
    variants: {
        extend: {
            backgroundColor: ["active"],
        },
    },

    purge: {
        content: [
            "./app/**/*.php",
            "./resources/**/*.html",
            "./resources/**/*.js",
            "./resources/**/*.jsx",
            "./resources/**/*.ts",
            "./resources/**/*.tsx",
            "./resources/**/*.php",
            "./resources/**/*.vue",
            "./resources/**/*.twig",
            "./vendor/wireui/wireui/resources/**/*.blade.php",
            "./vendor/wireui/wireui/ts/**/*.ts",
            "./vendor/wireui/wireui/src/View/**/*.php",
            "./vendor/rappasoft/laravel-livewire-tables/resources/views/tailwind/**/*.blade.php",
        ],
        options: {
            defaultExtractor: (content) =>
                content.match(/[\w-/.:]+(?<!:)/g) || [],
            whitelistPatterns: [/-active$/, /-enter$/, /-leave-to$/, /show$/],
        },
    },
    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography"),
        //require("daisyui"),
    ],
};
