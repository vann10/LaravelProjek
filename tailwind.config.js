/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
  ],
  theme: {
    extend: {
      colors: {
        // Palet Warna Utama
        'dark-primary': '#101828', // Latar belakang utama yang sangat gelap
        'dark-secondary': '#1D2939', // Warna untuk card dan elemen sekunder
        'dark-tertiary': '#344054', // Warna untuk border, garis pemisah

        // Palet Warna Aksen
        'accent-blue': '#3B82F6', // Biru untuk tombol utama, link, dan focus
        'accent-blue-hover': '#2563EB',
        'accent-gold': '#FBBF24', // Emas untuk highlight, angka penting, dan ikon
        'accent-gold-hover': '#F59E0B',

        // Warna Teks
        'text-light': '#F9FAFB', // Teks utama yang terang
        'text-medium': '#D1D5DB', // Teks sekunder
        'text-dark': '#6B7280',   // Teks hint atau placeholder
      },
      fontFamily: {
        'sans': ['Inter', 'ui-sans-serif', 'system-ui'],
      }
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
}