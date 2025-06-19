/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./resources/**/*.ts",
    "./resources/**/*.jsx",
    "./resources/**/*.tsx",
  ],
  theme: {
    extend: {
      // Custom theme di sini
      colors: {
        primary: '#1f2937',
        secondary: '#6b7280',
      },
      fontFamily: {
        'sans': ['Inter', 'ui-sans-serif', 'system-ui'],
      }
    },
  },
  plugins: [
    // Plugin tambahan jika diperlukan
    // require('@tailwindcss/forms'),
    // require('@tailwindcss/typography'),
  ],
}