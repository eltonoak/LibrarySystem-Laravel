/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
  ],
  theme: {
    extend: {
      backgroundImage: {
        'hero': "url('/public/img/background.jpg')",
        'bg': "url('/public/img/bg.jpg')",
        'back': "url('/public/img/back.jpg')",
      }
    },
  },
  plugins: [],
}
