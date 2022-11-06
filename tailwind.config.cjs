// https://tailwindcss.com/docs/configuration
module.exports = {
  content: [
    './index.php',
    './app/**/*.php',
    './resources/**/*.{php,vue,js}',
    './patterns/**/*.php',
  ],
  theme: {
    colors: {
      dark: '#223728',
      green: '#75B84E',
      grey: '#CBCBCB',
      white: '#fff',
      light: '#FEFEFE',
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
      6: '5rem', // 80px
      7: '7.5rem', // 120px
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
    }),
    opacity: {
      80: '0.8',
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
