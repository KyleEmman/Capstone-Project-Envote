/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",   
    "./resources/**/*.js",
    "./resources/**/*.vue", 
  ],
  theme: {
    extend: {
      fontFamily: {
        'cursive': ['Dancing Script'],
        'lobster': ['Lobster'] 
      },
      screens: {
        'navBarHideBug': '993px',
      },
      colors: {
      'greenBPC': '#017106',
      'yellowBPC': '#e2cb00',
      'orangeBPC': '#f5401e',
      'darkGreenBPC': '#034919',
      },
      screens: {
        'vsm': '330px',
        'mlg': '1350px'
      },
    },
  },
  plugins: [
    require('flowbite/plugin'),
    require('@tailwindcss/line-clamp'),
  ],
}
