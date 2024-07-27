import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode:'class',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: {
                  light: '#63b3ed',  // Light blue for backgrounds
                  DEFAULT: '#3182ce',  // Default blue for primary actions
                  dark: '#2b6cb0',  // Dark blue for text and accents
                },
                accent: {
                  light: '#f6ad55',  // Light orange for highlights
                  DEFAULT: '#ed8936',  // Default orange for buttons
                  dark: '#dd6b20',  // Dark orange for text and accents
                },
                neutral: {
                  light: '#f7fafc',  // Light gray for backgrounds
                  DEFAULT: '#edf2f7',  // Default gray for sections
                  dark: '#e2e8f0',  // Dark gray for borders and shadows
                },
              },
        },
    },

    plugins: [forms],
};
