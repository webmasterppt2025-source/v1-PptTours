/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./**/*.{html,php}",
    "./js/**/*.js"
  ],
  theme: {
    extend: {
      colors: {
        primary: {
          DEFAULT: '#2D5C2A',
          dark: '#1E3E1C',
          light: '#4A7A47',
        },
        black: {
          DEFAULT: '#1A1A1A',
          light: '#333333',
        }
      },
      fontFamily: {
        'neutraface': ['Neutraface 2 Display', 'sans-serif'],
      }
    },
  },
  plugins: [],
}