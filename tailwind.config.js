/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
      ],
  theme: {
    extend: {
        colors:{
            primary: '#3490dc',
            secondary: '#ffcc00',
            tertiary: '#ff6347',
            quaternary: '#808080',
        },
    },
  },
  plugins: [],
}

