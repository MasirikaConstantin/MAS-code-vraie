import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import Prism from 'prismjs';
import flowbitePlugin from 'flowbite/plugin';  // Importation du plugin Flowbite

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './node_modules/flowbite/**/*.js',  // Inclure Flowbite dans le contenu scanné

        "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
      "./node_modules/flowbite/**/*.js"
    ],
    darkMode: false,
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...fontFamily.sans],
            },
            
        },
    },

    plugins: [

        forms,
        require('flowbite/plugin')({
            wysiwyg: true,
        }),
        flowbitePlugin,  // Utilisation du plugin Flowbite
        require('flowbite-typography'),
        Prism
    ],
};