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
      1.5: '1.5rem', // 20px
      2: '2rem', // 32px
      3: '2.5rem', // 40px
      4: '5rem', // 80px
      5: '7.5rem', // 120px
    },
    lineHeight: {
      tight: '1.25',
      normal: '1.75',
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
        xl: theme('spacing.5'),
      },
    }),
  },
  plugins: [],
};
