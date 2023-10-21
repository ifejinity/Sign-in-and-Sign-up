/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    'node_modules/flowbite-vue/**/*.{js,jsx,ts,tsx}',
    'node_modules/flowbite/**/*.{js,jsx,ts,tsx}'
  ],
  theme: {
    fontFamily: {
      Inter: 'Inter, sans-serif'
    },
    colors: {
      primary: '#FAFAFA',
      secondary: '#E8F1F5',
      tertiary: '#005691',
      quaternary: '#004A7C'
    },
    extend: {},
  },
  plugins: [
    require('flowbite/plugin')
  ],
}

