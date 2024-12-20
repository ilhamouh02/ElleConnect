import laravel from 'laravel-vite-plugin';

export default {
  plugins: [
    laravel({
      input: ['resources/css/app.css', 'resources/js/app.js'],
      refresh: true,
    }),
  ],
}
