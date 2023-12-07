import colors from 'tailwindcss/colors'
import defaultTheme from 'tailwindcss/defaultTheme'
import forms from '@tailwindcss/forms'
import typography from '@tailwindcss/typography'

/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './resources/views/**/*.blade.php'
  ],
  theme: {
    extend: {
      colors: {
        primary: colors.red,
        secondary: colors.neutral,
        danger: colors.red,
        warning: colors.amber
      },
      fontFamily: {
        sans: ['Figtree', ...defaultTheme.fontFamily.sans]
      }
    },
  },
  plugins: [forms, typography],
}

