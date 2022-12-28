/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./resources/**/*.blade.php", "./storage/framework/views/*.php"],
  theme: {
    extend: {
      fontFamily: {
        sans: ['"Montserrat"', "Arial", "san-serif"],
      },
      colors: {
        primary: {
          600: "#7f56d9",
        },
      },
    },
  },
  plugins: [],
};
