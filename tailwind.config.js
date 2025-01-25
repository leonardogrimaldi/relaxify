/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/**/*.{html,js,php}"],
  theme: {
    extend: {
      colors : {
        //customcolors
        'darkBlue': '#112D4E',
        'blue': '#3F72AF',
        'lightBlue': '#DBE2EF',
        'white': '#F9F7F7',

        'darkPink': '#FF90BC',
        'pink': '#FFC0D9',
        'yellow': '#F9F9EO',
        'skyBlue': '#8ACDD7',
      },
    },
  },
  plugins: [],
}

