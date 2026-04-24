import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                cream: '#FDFCF7',
                navy: '#1A2B48',
                brick: '#B85C38',
                coffee: {
                    50: '#F9F5F2',
                    100: '#F3EBE5',
                    200: '#E7D7CB',
                    300: '#DBBFB1',
                    400: '#C79A8B',
                    500: '#B37565',
                    600: '#8B4513', // SaddleBrown
                    700: '#6F370F',
                    800: '#53290B',
                    900: '#381C08',
                    950: '#1C0E04',
                },
            },
        },
    },

    plugins: [forms],
};
