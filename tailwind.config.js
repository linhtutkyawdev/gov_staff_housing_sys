import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./public/assets/js/main.js",
    ],

    theme: {
        extend: {
            inset: {
                100: "100%",
            },

            padding: {
                120: "120px",
            },

            colors: {
                "theme-color": "#361CC1",
                "theme-color-2": "#FE7A7B",
            },
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};
