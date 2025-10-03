import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

<<<<<<< HEAD
      safelist: [
        'bg-white/10',
        'backdrop-blur-lg',
        'text-white',
        'text-gray-200',
        'text-indigo-300',
        'border-gray-300',
        'placeholder-gray-300',
        'rounded-lg',
        'shadow-lg',
        'focus:ring-2',
        'focus:ring-indigo-500',
        'hover:bg-indigo-700',
    ],


=======
>>>>>>> login-dashboard
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};
