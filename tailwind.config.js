/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
      './templates/**/*.html.twig',
      './node_modules/tw-elements/dist/js/**/*.js',
  ],
  theme: {
    extend: {
        colors: {
            'brown-gold': '#c36f09',
            'gold-brown' : '#AA8239',
            'gold-ligth': '#EFE6AA',
            'blue-lagoon': '#3B6FB1',
        },
    },
  },
  plugins: [
      require('tw-elements/dist/plugin')
  ],
}
