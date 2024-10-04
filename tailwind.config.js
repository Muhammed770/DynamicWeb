/** @type {import('tailwindcss').Config} */
export default {
   content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      "colors": {
         silver: '#E6E6E6',
         sand: '#C5A880',
         coffee: '#532E1C',
         onyx: '#0F0F0F',
         slate: '#1c1c1a',
         pearl: '#EDEDED',
      },
      "fontFamily": {
        "display": ['manrope', 'sans-serif'],
      },
    },
  },
  plugins: [],
}

