const forms = require("@tailwindcss/forms");
const flowbite = require("flowbite/plugin");

/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./app/Views/**/*.{php, html, js}",
    "./node_modules/flowbite/**/*.js",
      //  'darkMode','class',
  ],

  


  darkMode: "class",
  theme: {
    extend: {
      colors: {
        primary: {
          50: "#CDC8F5",
          100: "#CDC8F5",
          200: "#9E95EC",
          300: "#645AC7",
          400: "#352D90",
          500: "#0b0647",
          600: "#08043D",
          700: "#050333",
          800: "#030129",
          900: "#020122",
          950: "#020122",
        },
      },
    },
    fontFamily: {
      body: [
        "Inter",
        "ui-sans-serif",
        "system-ui",
        "-apple-system",
        "system-ui",
        "Segoe UI",
        "Roboto",
        "Helvetica Neue",
        "Arial",
        "Noto Sans",
        "sans-serif",
        "Apple Color Emoji",
        "Segoe UI Emoji",
        "Segoe UI Symbol",
        "Noto Color Emoji",
      ],
      sans: [
        "Inter",
        "ui-sans-serif",
        "system-ui",
        "-apple-system",
        "system-ui",
        "Segoe UI",
        "Roboto",
        "Helvetica Neue",
        "Arial",
        "Noto Sans",
        "sans-serif",
        "Apple Color Emoji",
        "Segoe UI Emoji",
        "Segoe UI Symbol",
        "Noto Color Emoji",
      ],
    },
  },
  plugins: [forms, flowbite],
};
