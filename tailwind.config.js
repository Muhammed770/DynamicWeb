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
         chestnut: '#532E1C',
         onyx: '#0F0F0F',
      }
    },
  },
  plugins: [],
}

