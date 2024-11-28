import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
        './public/**/*.png',
        './public/**/*.jpg',
        './public/**/*.svg',
    ],
    theme: {
        extend: {
            colors: {
                'primary-blue': '#1D4ED8', // Blue color for branding
                'dark-gray': '#1F2937',   // Dark gray (near black)
                'light-gray': '#F3F4F6',  // Light gray for backgrounds
                'white': '#FFFFFF', 
                'dark-bg': '#2d3748', // Dark background
                'dark-text': '#f7fafc', // Light text for dark theme    
                // White for text or backgrounds
                primary: {
                    "50": "#f0f9ff",
                    "100": "#e0f2fe",
                    "200": "#bae6fd",
                    "300": "#7dd3fc",
                    "400": "#38bdf8",
                    "500": "#0ea5e9",
                    "600": "#0284c7",
                    "700": "#0369a1",
                    "800": "#075985",
                    "900": "#0c4a6e",
                    "950": "#082f49"
                }
            },
            fontFamily: {
                custom: ['CustomFont', 'sans-serif'], // Custom font
                sans: [
                    'Inter', 
                    'ui-sans-serif', 
                    'system-ui', 
                ]
            }
        }
    },
    plugins: [],
};
