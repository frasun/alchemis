// https://tailwindcss.com/docs/configuration
module.exports = {
  content: [
    './index.php',
    './app/**/*.php',
    './resources/**/*.{php,vue,js}',
    './patterns/**/*.php',
  ],
  safelist: ['grid', 'grid-cols-3', 'gap-3'],
  theme: {
    colors: {
      dark: '#223728',
      green: '#75B84E',
      grey: '#e3e3e3',
      greyDark: '#808080',
      greyLight: '#FEFEFE',
      white: '#fff',
      'grey-1': '#afafaf',
      'grey-2': '#cbcbcb',
    },
    screens: {
      sm: '640px',
      md: '768px',
      lg: '1024px',
      xl: '1280px',
    },
    fontFamily: {
      sans: ['Poppins', 'sans-serif'],
    },
    spacing: {
      0: '0px',
      1: '1rem', // 16px
      2: '1.5rem', // 20px
      3: '2rem', // 32px
      4: '2.5rem', // 40px
      5: '3.75rem', // 60px
      6: '4.5rem', // 72px
      7: '5rem', // 80px
      8: '7.5rem', // 120px
    },
    lineHeight: {
      tight: '1.25',
      normal: '1.75',
      headings: '0.9',
    },
    fontSize: ({theme}) => ({
      base: ['0.9375rem', {lineHeight: theme('lineHeight.normal')}], // 15px
      md: ['1.125rem'], // 18px
      lg: ['1.375rem'], // 22px
      xl: ['2.5rem'], // 40px
      '2xl': ['3.75rem'], // 60px
    }),
    opacity: {
      80: '0.8',
    },
    borderRadius: {
      DEFAULT: '2.35rem',
      full: '9999px',
    },
    boxShadow: {
      DEFAULT: '4px 4px 15px rgb(0 0 0 / 0.16)',
    },
    extend: {
      backgroundImage: {
        footer: 'url(../images/bg-footer.png)',
      },
    },
    container: ({theme}) => ({
      center: true,
      padding: {
        DEFAULT: theme('spacing.1'),
        lg: theme('spacing.4'),
        xl: theme('spacing.6'),
      },
    }),
  },
  plugins: [],
};
