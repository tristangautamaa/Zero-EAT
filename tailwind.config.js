// tailwind.config.js
module.exports = {
  content: [
    './resources/**/*.blade.php',  // Laravel Blade files
    './resources/**/*.js',         // JavaScript files
    './resources/**/*.vue',        // Vue files (if applicable)
    './resources/**/*.jsx',        // React files (if applicable)
  ],
  theme: {
    extend: {},
  },
  plugins: [],
};
